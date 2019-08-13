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
    Route::post('/save-citizen','Backend\CitizenController@saveCitizen');
});

Route::get('/export-handbooks','Backend\ExportHandbookController@doExport');

Route::get('/test', function () {
    $generalInfo = \App\Models\GeneralInfoCitizen::all();
    $userIds = \App\Models\Citizen::whereNotIn('id', $generalInfo->pluck('citizen_id'))->pluck('id');
    $officeId = 1;
    $usersOffice = $generalInfo->where('office_id', $officeId)->pluck('citizen_id');
    $ids = $userIds->merge($usersOffice);
    dr($ids);
});

Route::get('/mutators', function () {
    $citizen = \App\Models\Citizen::with('citizen_statuses')->find(93);
    dr($citizen);
});



Route::middleware(['nova'])->group(function () {
    Route::get('get-houses-by-street/{street}', 'DependecyController@getHousesByStreet');
    Route::get('get-entities-by-house/{house_id}/{entity_type}', 'DependecyController@getEntityByHouse');
    Route::get('get-is-private-by-house/{house_id}', 'DependecyController@getIsPrivateByHouse');
    Route::get('get-street-by-elective-plot/{elective_plot}', 'DependecyController@getStreetsByElectivePlot');
});


// todo: go to Controller!!!!!!
Route::get('api/type-list/{type_list}', function($typeId) {
    $messages = \App\Models\BadListReason::where('type', $typeId)->get();

    return $messages->map(function($message) {
        return [ 'value' => $message->id, 'display' => $message->message ];
    });
})->middleware(['nova']);

