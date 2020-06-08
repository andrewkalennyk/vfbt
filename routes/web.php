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

Route::get('/update-birthdays', function () {
    $citizensIdsDate1 = [
        16728,
        16727,
        16726,
        16725,
        16724,
        16723,
        16722,
        16721,
        16720,
        16707,
        16705,
        16702,
        16700,
        16697,
        16696,
        16694,
        16691,
        16690,
        16688,
        16687,
        16686,
        16685,
        16682,
        16679,
        16678,
        16677,
        16676,
        16669,
        16668,
        16666,
        16665,
        16664,
        16663,
        16662,
        16661,
        16660,
        16656,
        16655,
        16654,
        16653,
        16652,
        16651,
        16650,
        16649,
        16648,
        16647,
        16646,
        16645,
        16643,
        16642,
        16627,
        16626,
        16625,
        16624,
        16623,
        16598,
        16597,
        16596,
        16594,
        16593,
        16592,
        16591,
        16590,
        16588,
        16587,
        16586,
        16585,
        16584,
        16583,
        16580,
        16579,
        16578,
        16577,
        16576,
        16574,
        16573,
        16572,
        16571,
        16570,
        16569,
        16568,
        16567,
        16565,
        16564
    ];
    $citizensIdsDate2 = [
        16641,
        16640,
        16639,
        16638,
        16637,
        16636,
        16635,
        16634,
        16633,
        16632,
        16631,
        16630,
        16628,
        16595,
        16589,
        16582,
        16581,
        16575,
        16566
    ];
    $citizensId = [
        16728,
        16727,
        16726,
        16725,
        16724,
        16723,
        16722,
        16721,
        16720,
        16707,
        16705,
        16702,
        16700,
        16697,
        16696,
        16694,
        16691,
        16690,
        16688,
        16687,
        16686,
        16685,
        16682,
        16679,
        16678,
        16677,
        16676,
        16669,
        16668,
        16666,
        16665,
        16664,
        16663,
        16662,
        16661,
        16660,
        16656,
        16655,
        16654,
        16653,
        16652,
        16651,
        16650,
        16649,
        16648,
        16647,
        16646,
        16645,
        16643,
        16642,
        16641,
        16640,
        16639,
        16638,
        16637,
        16636,
        16635,
        16634,
        16633,
        16632,
        16631,
        16630,
        16628,
        16627,
        16626,
        16625,
        16624,
        16623,
        16598,
        16597,
        16596,
        16595,
        16594,
        16593,
        16592,
        16591,
        16590,
        16589,
        16588,
        16587,
        16586,
        16585,
        16584,
        16583,
        16582,
        16581,
        16580,
        16579,
        16578,
        16577,
        16576,
        16575,
        16574,
        16573,
        16572,
        16571,
        16570,
        16569,
        16568,
        16567,
        16566,
        16565,
        16564
    ];
    $citizens = \App\Models\Citizen::whereIn('id', $citizensId)->pluck('date_birth')->toArray();
    dd($citizens);
    /*$citizens = \App\Models\Citizen::whereIn('id', $citizensIdsDate2)->get();
    foreach ($citizens as $citizen) {
        $birth = explode('-', $citizen->date_birth);
        $year = $birth[0] . $birth[1];
        $month = substr($birth[2], 0, 2);
        $day = substr($birth[2], 2);

        $citizen->date_birth = $day . '-' . $month . '-' . $year;
        $citizen->save();

        echo $citizen->id . '---' . $citizen->date_birth . '<br>';
    }*/

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

