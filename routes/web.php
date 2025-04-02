<?php

use App\Http\Controllers\DeathController;
use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;
use App\Models\Sanitary;
use Illuminate\Http\Request;

use App\Http\Controllers\SanitaryController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\HealthCardController;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', function () {
    return view('profile.show');
});


Route::post('/new-permit', [SanitaryController::class, 'newPermit'])->name('sanitary');
Route::put('/sanitary/update/{id}', [SanitaryController::class, 'updatePermit'])->name('sanitary.update');

Route::post('/sanitary/renewal/{id}', [SanitaryController::class, 'renewalPermit'])->name('sanitary.updateRenewal');

Route::post('/sanitary/update-completed/{id}', [SanitaryController::class, 'statusUpdateCompleted'])->name('sanitary.updateCompleted');

Route::post('/sanitary/update-close/{id}', [SanitaryController::class, 'statusUpdateClose'])->name('sanitary.updateClose');
Route::post('/sanitary/update-inspection/{id}', [SanitaryController::class, 'statusUpdateInspection'])->name('sanitary.updateInspection');

Route::post('/sanitary/update-restore/{id}', [SanitaryController::class, 'statusUpdateRestore'])->name('sanitary.updateRestore');

Route::post('/sanitary/update-restore-inspection/{id}', [SanitaryController::class, 'statusUpdateRestoreInspection'])->name('sanitary.updateRestoreInspection');


// print
Route::get('/print/{id}', [PrintController::class, 'print'])->name('print');

Route::middleware([
    'admin',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function (Request $request) {
        
    //     $selectedYear = $request->input('renewal_year', date('Y'));
    //     $sanitary = Sanitary::where('renewal_year', $selectedYear)->where('status', 'new')->get();

    //     $inspections = Sanitary::where('renewal_year', $selectedYear)->where('status', 'inspection')->get();

    //     $permits = Sanitary::where('renewal_year', $selectedYear)->where('status', 'completed')->get();

    //     $archives = Sanitary::where('renewal_year', $selectedYear)->orWhere('status',  'close')->get();

    //     // Get the search query
    // $searchQuery = $request->input('search');

    // // Base query
    // $query = Sanitary::query();

    // // If search query exists, filter results strictly
    // if ($searchQuery) {
    //     $query->where('name_of_establishment', 'LIKE', "%$searchQuery%")
    //           ->orWhere('renewal_year', 'LIKE', "%$searchQuery%");
    // }
    
    //     return view('dashboard', compact('sanitary', 'selectedYear', 'archives', 'inspections', 'permits', 'searchQuery'));
    // })->name('dashboard');
    
    Route::get('/dashboard', function (Request $request) {
        $searchQuery = $request->input('search');
        $selectedYear = $request->input('renewal_year', date('Y')); // Default to current year if not provided
        $ownerName = $request->input('owner_name');
        $barangay = $request->input('barangay');
        $lineOfBusiness = $request->input('line_of_business');
    
        // Base query (without year restriction initially)
        $query = Sanitary::query();
    
        // Apply general search (searches across all years)
        if ($searchQuery) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('name_of_establishment', 'LIKE', "%$searchQuery%")
                    ->orWhere('name_of_owner', 'LIKE', "%$searchQuery%")
                    ->orWhere('barangay', 'LIKE', "%$searchQuery%")
                    ->orWhere('line_of_business', 'LIKE', "%$searchQuery%");
            });
        } else {
            // Apply advanced filters only if no general search is provided
            $query->where('renewal_year', $selectedYear);
    
            if ($ownerName) {
                $query->where('name_of_owner', 'LIKE', "%$ownerName%");
            }
    
            if ($barangay) {
                $query->where('barangay', 'LIKE', "%$barangay%");
            }
    
            if ($lineOfBusiness) {
                $query->where('line_of_business', 'LIKE', "%$lineOfBusiness%");
            }
        }
    
        // Append all filters to pagination
        $paginationParams = [
            'search' => $searchQuery,
            'renewal_year' => $selectedYear,
            'owner_name' => $ownerName,
            'barangay' => $barangay,
            'line_of_business' => $lineOfBusiness,
        ];
    
        // Fetch paginated data categorized by status
        $sanitary = (clone $query)->where('status', 'new')->orderBy('created_at', 'desc')->paginate(50)->appends($paginationParams);
        $inspections = (clone $query)->where('status', 'inspection')->orderBy('created_at', 'desc')->paginate(50)->appends($paginationParams);
        $permits = (clone $query)->where('status', 'completed')->orderBy('created_at', 'desc')->paginate(50)->appends($paginationParams);
        $archives = (clone $query)->where('status', 'close')->orderBy('created_at', 'desc')->paginate(50)->appends($paginationParams);
        $prints = (clone $query)->where('confirmed', true)->orderBy('created_at', 'desc')->paginate(50)->appends($paginationParams);
    
        // Retrieve records with the latest status
        $sanitaryRecords = $query->with('latestStatus')
            ->get()
            ->sortByDesc(fn ($record) => $record->latestStatus ? $record->latestStatus->changed_at : $record->renewed_at);
    
        return view('dashboard', compact('sanitary', 'selectedYear', 'archives', 'inspections', 'permits', 'searchQuery', 'prints', 'sanitaryRecords'));
    })->name('dashboard')->middleware('auth');
    
    

});


Route::get('/health-card', [HealthCardController::class,'healthCard'])->middleware('auth')->name('healthCard');
Route::post('/new-health-card', [HealthCardController::class,'newHealthCard'])->middleware('auth')->name('new.healthCard');
Route::put('/health-card/update/{id}', [HealthCardController::class, 'updateHealthCard'])->name('healthCard.update');
Route::post('/generate-pdf', [HealthCardController::class, 'generatePdf'])->name('generate.pdf');



Route::post('/health-card/generate-pdf', [HealthCardController::class, 'generatePdf'])->name('healthCard.generatePdf');


Route::get('/guest', [HomeController::class,'index'])->middleware('auth');

// DEATH
Route::get('/death-certificate', [DeathController::class,'death'])->middleware('auth')->name('death');
Route::post('/death-certificate', [DeathController::class,'store'])->middleware('auth')->name('death.store');
Route::post('/death/generate-pdf', [DeathController::class, 'generatePdf'])->name('deaths.generatePdf');
Route::post('/deaths/{id}', [DeathController::class, 'update'])->name('deaths.update');



Route::get('maps', [MapController::class, 'index']);
                                                                        

