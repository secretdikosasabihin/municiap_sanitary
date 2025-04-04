<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\HealthCard;
use Spatie\Browsershot\Browsershot;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;


class HealthCardController extends Controller
{
    public function healthCard(Request $request)
    {
        $search = $request->input('search');
        $employmentType = $request->input('employment_type');
        $healthCardType = $request->input('health_card_type');
        $confirmed = $request->input('confirmed');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $query = HealthCard::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('place_of_employment', 'like', "%{$search}%")
                    ->orWhere('full_name', 'like', "%{$search}%")
                    ->orWhere('health_card_type', 'like', "%{$search}%");
            });
        }

        if ($employmentType) {
            $query->where('place_of_employment', 'like', "%{$employmentType}%");
        }

        if ($healthCardType) {
            $query->where('health_card_type', $healthCardType);
        }

        if (!is_null($confirmed)) {
            $query->where('confirmed', $confirmed);
        }

        if ($dateFrom && $dateTo) {
            $query->whereBetween('created_at', [$dateFrom, $dateTo]);
        } elseif ($dateFrom) {
            $query->whereDate('created_at', '>=', $dateFrom);
        } elseif ($dateTo) {
            $query->whereDate('created_at', '<=', $dateTo);
        }

        $healthCard = $query->orderBy("created_at", "desc")->paginate(50)->appends(request()->query());

        $filteredQuery = function ($q) use ($search) {
            if ($search) {
                $q->where('place_of_employment', 'like', "%{$search}%")
                    ->orWhere('full_name', 'like', "%{$search}%");
            }
        };

        $nonFood = HealthCard::where('health_card_type', 'non_food')
            ->where($filteredQuery)
            ->orderBy("created_at", "desc")
            ->paginate(50)
            ->appends(request()->query());

        $food = HealthCard::where('health_card_type', 'food')
            ->where($filteredQuery)
            ->orderBy("created_at", "desc")
            ->paginate(50)
            ->appends(request()->query());

        $others = HealthCard::where('health_card_type', 'others')
            ->where($filteredQuery)
            ->orderBy("created_at", "desc")
            ->paginate(50)
            ->appends(request()->query());

        $printed = HealthCard::where('confirmed', true)
            ->where($filteredQuery)
            ->orderBy("created_at", "desc")
            ->paginate(50)
            ->appends(request()->query());

        $notprinted = HealthCard::where('confirmed', false)
            ->where($filteredQuery)
            ->orderBy("created_at", "desc")
            ->paginate(50)
            ->appends(request()->query());

        return view("healthCard.healthCard", compact('healthCard', 'nonFood', 'food', 'others', 'notprinted', 'printed', 'search', 'employmentType', 'healthCardType', 'confirmed', 'dateFrom', 'dateTo'));
    }


    public function newHealthCard(Request $request)
    {
        $request->validate([
            'full_name' => 'required|max:255',
            'health_card_type' => 'required|max:255',
            'age' => 'max:255',
            'gender' => 'nullable|max:15',
            'place_of_employment' => 'required|max:255',
            'designation' => 'max:255',
            'barangay' => 'nullable|max:255',
            'inspector_name' => 'nullable|max:255',
            'date_of_issuance' => 'required|date',
        ]);

        // Generate Print Code
        $printCode = HealthCard::generatePrintCode();

        // Calculate Expiration Date
        $issuanceDate = Carbon::parse($request->date_of_issuance);
        $expirationDate = null;

        if ($request->health_card_type === 'non_food') {
            $expirationDate = $issuanceDate->copy()->addMonths(12);
        } elseif ($request->health_card_type === 'food') {
            $expirationDate = $issuanceDate->copy()->addMonths(6);
        } elseif ($request->health_card_type === 'others') {
            $expirationDate = Carbon::now()->endOfYear(); // Always sets to December 31 of the current year
        }

        // Create Health Card
        $healthCard = HealthCard::create([
            'full_name' => $request->full_name,
            'health_card_type' => $request->health_card_type,
            'age' => $request->age,
            'gender' => $request->gender,
            'place_of_employment' => $request->place_of_employment,
            'designation' => $request->designation,
            'barangay' => $request->inspector_name,
            'inspector_name' => $request->inspector_name,
            'date_of_issuance' => $issuanceDate,
            'date_of_expiration' => $expirationDate,
            'print_code' => $printCode,
        ]);

        return redirect()->back()->with('success', 'Health card added successfully');
    }

    public function updateHealthCard(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|max:255',
            'health_card_type' => 'max:255',
            'age' => 'max:255',
            'gender' => 'nullable|max:15',
            'place_of_employment' => 'max:255',
            'designation' => 'max:255',
            'barangay' => 'nullable|max:255',
            'inspector_name' => 'nullable|max:255',
            'date_of_issuance' => 'required|date',
        ]);

        $issuanceDate = Carbon::parse($request->date_of_issuance);
        $expirationDate = null;

        // Determine expiration date based on health card type
        if ($request->health_card_type === 'non_food') {
            $expirationDate = $issuanceDate->copy()->addMonths(12); // 12 months from issuance
        } elseif ($request->health_card_type === 'food') {
            $expirationDate = $issuanceDate->copy()->addMonths(6); // 6 months from issuance
        } elseif ($request->health_card_type === 'others') {
            $expirationDate = Carbon::now()->endOfYear(); // Always sets to December 31 of the current year
        }

        try {
            $health = HealthCard::findOrFail($id);
            $health->update([
                'full_name' => $request->full_name,
                'health_card_type' => $request->health_card_type,
                'age' => $request->age,
                'gender' => $request->gender,
                'place_of_employment' => $request->place_of_employment,
                'designation' => $request->designation,
                'barangay' => $request->barangay,
                'inspector_name' => $request->inspector_name,
                'date_of_issuance' => $request->date_of_issuance,
                'date_of_expiration' => $expirationDate, // ✅ Now updating expiration date
            ]);

            session()->flash('success', 'Health Card updated successfully');

            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to update health card. Please try again.']);
        }
    }


    public function generatePdf(Request $request)
    {
        $selectedIds = $request->input('selected_health_cards', []);

        if (empty($selectedIds)) {
            return back()->withErrors(['error' => 'No health cards selected for PDF generation.']);
        }

        // Fetch selected health cards
        $healthCards = HealthCard::whereIn('id', $selectedIds)->get();

        // ✅ Correct way to update all models
        foreach ($healthCards as $card) {
            $card->confirmed = true;
            $card->save();
        }

        // Alternatively, you can update all records in one query:
        // HealthCard::whereIn('id', $selectedIds)->update(['confirmed' => true]);

        // Convert Blade view to HTML
        $html = view('healthCard.printHealth', compact('healthCards'))->render();

        // Temporary PDF Path
        $pdfPath = storage_path('app/public/health_cards.pdf');

        // Generate PDF using Browsershot
        Browsershot::html($html)
            ->format('A4')
            ->orientation('landscape')
            ->savePdf($pdfPath);

        // Show the PDF in the browser without downloading
        return response()->file($pdfPath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="health_cards.pdf"',
        ]);
    }



}
