<?php

namespace App\Http\Controllers;

use App\Models\Death;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

use Illuminate\Support\Facades\Validator;

class DeathController extends Controller
{
    public function death(Request $request)
    {
        $query = Death::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('first_name', 'like', '%' . $request->search . '%')
                ->orWhere('middle_name', 'like', '%' . $request->search . '%')
                ->orWhere('last_name', 'like', '%' . $request->search . '%')
                ->orWhere('informant_name', 'like', '%' . $request->search . '%')
                ->orWhere('name_of_mother', 'like', '%' . $request->search . '%')
                ->orWhere('name_of_father', 'like', '%' . $request->search . '%')
                ->orWhere('informant_name', 'like', '%' . $request->search . '%')
                ->orWhere('date', 'like', '%' . $request->search . '%')
                ->orWhere('prepared_by_name', 'like', '%' . $request->search . '%');
        }

        $deaths = $query->orderBy('created_at', 'desc')->paginate(10);

        return view("death.death", compact("deaths"));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'province' => 'nullable|string',
            'municipality' => 'nullable|string',
            'first_name' => 'nullable|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'sex' => 'nullable|string',
            'date_of_death' => 'nullable|date',
            'birthdate' => 'nullable|date',
            'age' => 'nullable|string',
            'place_of_death' => 'nullable|string',
            'civil_status' => 'nullable|string',
            'religion' => 'nullable|string',
            'citizenship' => 'nullable|string',
            'residence' => 'nullable|string',
            'occupation' => 'nullable|string',
            'address' => 'nullable|string',
            'cause_of_death_a' => 'nullable|string',
            'cause_of_death_b' => 'nullable|string',
            'cause_of_death_c' => 'nullable|string',
            'doctor' => 'nullable|string',
            'reviewed_by' => 'nullable|string',
            'informant_name' => 'nullable|string',
            'relationship' => 'nullable|string',
            'informant_address' => 'nullable|string',
            'prepared_by_name' => 'nullable|string',
            'prepared_by_position' => 'nullable|string',
            'remarks' => 'nullable|string',
            'date' => 'nullable|date',
            'doctor_position' => 'nullable|string',
            'reviewed_position' => 'nullable|string',
            'name_of_father' => 'nullable|string',
            'name_of_mother' => 'nullable|string',
            'gender' => 'nullable|string',

        ]);

        Death::create($validatedData);


        return redirect()->back()->with('success', 'Death record created successfully');
    }


    public function generatePdf(Request $request)
    {
        $selectedIds = $request->input('selected_deaths', []);

        if (empty($selectedIds)) {
            return back()->withErrors(['error' => 'No death records selected for PDF generation.']);
        }

        // Fetch selected death records
        $deaths = Death::whereIn('id', $selectedIds)->get();


        // Define PDF Path
        $pdfPath = storage_path('app/public/death_records.pdf');

        // Generate PDF using Browsershot (Legal size: 8.5x13 inches)
        $html = view('death.printDeath', compact('deaths'))->render();

        Browsershot::html($html)
            ->ignoreHttpsErrors()
            ->format('LEGAL') // Set correct dimensions
            ->showBackground()
            ->savePdf($pdfPath);

        // Return PDF inline
        return response()->file($pdfPath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="death_records.pdf"',
        ]);
    }

    public function update(Request $request, $id)
    {
        // Find the death record by ID
        $death = Death::findOrFail($id);

        // Validate input data
        $validatedData = $request->validate([
            'province' => 'nullable|string',
            'municipality' => 'nullable|string',
            'first_name' => 'nullable|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'sex' => 'nullable|string',
            'date_of_death' => 'nullable|date',
            'birthdate' => 'nullable|date',
            'age' => 'nullable|string',
            'place_of_death' => 'nullable|string',
            'civil_status' => 'nullable|string',
            'religion' => 'nullable|string',
            'citizenship' => 'nullable|string',
            'residence' => 'nullable|string',
            'occupation' => 'nullable|string',
            'address' => 'nullable|string',
            'cause_of_death_a' => 'nullable|string',
            'cause_of_death_b' => 'nullable|string',
            'cause_of_death_c' => 'nullable|string',
            'doctor' => 'nullable|string',
            'reviewed_by' => 'nullable|string',
            'informant_name' => 'nullable|string',
            'relationship' => 'nullable|string',
            'informant_address' => 'nullable|string',
            'prepared_by_name' => 'nullable|string',
            'prepared_by_position' => 'nullable|string',
            'remarks' => 'nullable|string',
            'date' => 'nullable|date',
            'doctor_position' => 'nullable|string',
            'reviewed_position' => 'nullable|string',
            'name_of_father' => 'nullable|string',
            'name_of_mother' => 'nullable|string',
            'gender' => 'nullable|string',
        ]);

        // Update the death record
        $death->update($validatedData);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Death record updated successfully');
    }

}
