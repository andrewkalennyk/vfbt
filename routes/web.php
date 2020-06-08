<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/admin');
});

Route::middleware('auth')->group(function () {
    Route::post('/import-general-info','Backend\ImportInfoController@doImport');
    Route::post('/search-citizen','Backend\SearchController@doSearch');
    Route::post('/get-info-for-new','Backend\InfoController@getInfo');
    Route::post('/get-user-role','Backend\InfoController@getUserRole');
    Route::post('/get-promotions','Backend\InfoController@getPromotions');
    Route::post('/save-citizen','Backend\CitizenController@saveCitizen');
    Route::post('/attach-promotion-citizen','Backend\CitizenController@attachPromotionCitizen');

    Route::post('get-related-entities-by-street', 'Backend\SearchController@getEntititesByStreet');
    Route::post('get-related-entities-by-elective-plot', 'Backend\SearchController@getEntititesByElectivePlot');
});

Route::get('/export-handbooks','Backend\ExportHandbookController@doExport');

Route::get('/update-house-citizens-with-null-street', function () {
    $houseCitizens = \App\Models\HouseCitizen::with('house')->whereHas('house')->whereNull('street_id')->get();
    /*foreach ($houseCitizens as $item) {
        $item->street_id = $item->house->street_id;
        $item->save();
        echo 'saved';
    }*/
    dd($houseCitizens);

});

Route::get('/mutators', function () {
    $citizen = \App\Models\Citizen::with('citizen_statuses')->find(93);
    dr($citizen);
});


Route::get('/analytics', function () {
   $streets =\App\Models\Street::with(['electivePlots','houses'])->whereHas('houses')->get();
   $needUpdate = [];
   foreach ($streets as $street) {
       $housesElectivePlots =  $street->houses->pluck('elective_plot_id')->unique()->filter(function ($value, $key) {
           return !empty($value);
       });
       $electivePlotsIds = $street->electivePlots->pluck('id');
       $diff = $housesElectivePlots->diff($electivePlotsIds);
       if ($diff->count()) {
           $housesNeeded = $street->houses->whereIn('elective_plot_id', $diff->toArray())->map(function ($item, $key) {
               return $item->title . '(' . $item->elective_plot->title . '(' . $item->elective_plot_id . ')) ';
           });

           $needUpdate[$street->id]['title'] = $street->title;
           $needUpdate[$street->id]['as'] = $electivePlotsIds->implode(',');
           $needUpdate[$street->id]['need'] = $housesElectivePlots->implode(',');
           $needUpdate[$street->id]['housesNeeded'] = $housesNeeded->implode(',');
       }
   }
   dd($needUpdate);
});


Route::middleware(['nova'])->group(function () {
    Route::get('get-houses-by-street/{street}', 'DependencyController@getHousesByStreet');
    Route::get('get-entities-by-house/{house_id}/{entity_type}', 'DependencyController@getEntityByHouse');
    Route::get('get-is-private-by-house/{house_id}', 'DependencyController@getIsPrivateByHouse');
    Route::get('get-street-by-elective-plot/{elective_plot}', 'DependencyController@getStreetsByElectivePlot');
    Route::get('get-regional-establishment-by-type/{regional_establishment_type_id}', 'DependencyController@getRegionalEstablishmentByType');
    Route::get('get-sub-status-by-status/{citizen_status_id}', 'DependencyController@getCitizenSubStatusByStatus');
});


// todo: go to Controller!!!!!!
Route::get('api/type-list/{type_list}', function($typeId) {
    $messages = \App\Models\BadListReason::where('type', $typeId)->get();

    return $messages->map(function($message) {
        return [ 'value' => $message->id, 'display' => $message->message ];
    });
})->middleware(['nova']);

