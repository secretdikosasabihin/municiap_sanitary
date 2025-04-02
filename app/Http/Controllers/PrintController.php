<?php

namespace App\Http\Controllers;
use Spatie\Browsershot\Browsershot;
use Illuminate\Http\Request;
use App\Models\Sanitary;
use App\Models\PrintCode;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class PrintController extends Controller
{
    public function print(Request $request, $id)
    {
        // Retrieve the sanitary inspection data by ID
        $inspection = Sanitary::findOrFail($id);
        $today = Carbon::now()->format('F d, Y');
        $lastDayOfYear = Carbon::now()->endOfYear()->format('F d, Y');
        $currentYear = Carbon::now()->year;
    
        // Mark as confirmed
        $inspection->confirmed = true;
        $inspection->save();
    
        // ✅ Check if the inspection already has a permit code
        if (!empty($inspection->permit_code)) {
            $permitCode = $inspection->permit_code;
        } else {
            // Check if there's already a permit code in the PrintCode table
            $existingPermit = PrintCode::where('permit_code', $inspection->permit_code)->first();
    
            if ($existingPermit) {
                $permitCode = $existingPermit->permit_code;
            } else {
                // Retrieve the last permit for the current year
                $lastPermit = PrintCode::where('year', $currentYear)->orderBy('sequence', 'desc')->first();
    
                // Generate new sequence
                $sequence = $lastPermit ? $lastPermit->sequence + 1 : 1;
                $formattedSequence = str_pad($sequence, 4, '0', STR_PAD_LEFT);
                $permitCode = "SP-{$formattedSequence}";
    
                // ✅ Save the permit code in the PrintCode table
                $newPermit = PrintCode::create([
                    'permit_code' => $permitCode,
                    'year' => $currentYear,
                    'sequence' => $sequence
                ]);
    
                // ✅ Link the new permit code to the sanitary inspection
                $inspection->permit_code = $newPermit->permit_code;
                $inspection->save();
            }
        }
    
        // Generate the HTML from the Blade view
        $html = view('print', compact('inspection', 'today', 'lastDayOfYear', 'permitCode'))->render();
    
        // Generate PDF as binary content
        $pdfContent = Browsershot::html($html)
            ->format('Letter') 
            ->pdf();
    
        // Return response to display in a new tab
        return response($pdfContent, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="sanitary-inspection.pdf"');
    }
    

}
