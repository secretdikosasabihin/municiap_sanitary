<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Sanitary;
use Illuminate\Http\Request;

class SanitaryController extends Controller
{
    public function newPermit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_of_establishment' => 'required|max:255',
            'name_of_owner' => 'required|max:255',
            'contact_number' => 'nullable|max:15',
            'barangay' => 'required|max:255',
            'line_of_business' => 'required|max:255',
             'inspector_name' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $newSanitary = new Sanitary();
        $newSanitary->name_of_establishment = $request->name_of_establishment;
        $newSanitary->name_of_owner = $request->name_of_owner;
        $newSanitary->contact_number = $request->contact_number;
        $newSanitary->barangay = $request->barangay;
        $newSanitary->line_of_business = $request->line_of_business;
        $newSanitary->inspector_name = $request->inspector_name;
        $newSanitary->renewal_year = date('Y'); // Set the current year for renewal_year
        $newSanitary->save();

        session()->flash('success', 'Permit successfully created'); // Flash message

        return redirect()->back();
    }

    // updating
    public function updatePermit(Request $request, $id)
    {
        $request->validate([
            'name_of_establishment' => 'required|string|max:255',
            'name_of_owner' => 'required|string|max:255',
            'contact_number' =>  'nullable|max:15',
            'barangay' => 'required|string|max:255',
            'line_of_business' => 'required|string|max:255',
            'inspector_name' => 'required|string|max:255'
           
        ]);
    
        try {
            $permit = Sanitary::findOrFail($id);
            $permit->update([
                'name_of_establishment' => $request->name_of_establishment,
                'name_of_owner' => $request->name_of_owner,
                'contact_number' => $request->contact_number,
                'barangay' => $request->barangay,
                'line_of_business' => $request->line_of_business,
                'inspector_name' => $request->inspector_name,
               
            ]);
            
            session()->flash('success','Permit updated successfully');

            return redirect()->back();
    
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to update permit. Please try again.']);
        }
    }
    



    // renewal
    public function renewalPermit($id)
    {
        // Find the permit record by ID
        $sanitary = Sanitary::findOrFail($id);
        $currentYear = date('Y');
    
        // Check if the permit has already been renewed this year
        if ($sanitary->renewal_year == $currentYear) {
            session()->flash('warning', 'This permit has already been renewed for the current year.');
            return redirect()->back();
        }
    
        // Update the renewal year to the current year
        $sanitary->renewal_year = $currentYear;
        $sanitary->renewed_at = now(); // Update the renewal timestamp
        $sanitary->status = 'new';
        $sanitary->confirmed = false;
    
        // Save the changes
        $sanitary->save();
    
        session()->flash('success', 'Permit successfully renewed!');
    
        return redirect()->back();
    }
    

    public function statusUpdateClose($id)
    {
        // Find the record by ID
        $sanitary = Sanitary::findOrFail($id);

        // Update the status to 'renewal'
        $sanitary->status = 'close';
        $sanitary->save();

        session()->flash('success','Status updated to Closed Business.');
        // Redirect with success message
        return redirect()->back();
    }

    public function statusUpdateInspection($id)
    {
        // Find the record by ID
        $sanitary = Sanitary::findOrFail($id);

        // Update the status to 'renewal'
        $sanitary->status = 'inspection';
        $sanitary->save();

        session()->flash('success','Status updated to inspection done.');
        // Redirect with success message
        return redirect()->back();
    }


    public function statusUpdateCompleted($id)
    {
        // Find the record by ID
        $sanitary = Sanitary::findOrFail($id);

        // Update the status to 'renewal'
        $sanitary->status = 'completed';
        $sanitary->save();

        session()->flash('success','Status updated to permit recieved');
        // Redirect with success message
        return redirect()->back();
    }

    public function statusUpdateRestore($id)
    {
        // Find the record by ID
        $sanitary = Sanitary::findOrFail($id);

        // Update the status to 'renewal'
        $sanitary->status = 'new';
        // $sanitary->renewal_year = null;
        $sanitary->save();

        session()->flash('success','Status updated to restored');
        // Redirect with success message
        return redirect()->back();
    }

    public function statusUpdateRestoreInspection($id)
    {
        // Find the record by ID
        $sanitary = Sanitary::findOrFail($id);

        // Update the status to 'renewal'
        $sanitary->status = 'inspection';
        $sanitary->save();

        session()->flash('success','Status updated to restored');
        // Redirect with success message
        return redirect()->back();
    }


    public function history()
    {
        $sanitaryRecords = Sanitary::orderBy('renewed_at', 'desc')->get(); // Fetch records sorted by renewal date

        return view('dashboard', compact('sanitaryRecords'));
    }

}
