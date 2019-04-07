<?php
namespace App\Http\Controllers\Backend;

use App\Imports\GeneralInfoImport;
use App\Imports\GeneralInfoImportModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportInfoController extends \App\Http\Controllers\Controller
{
    public function doImport(Request $request)
    {
        $file = $request->file;
        $folderPath = 'storage/offices/';
        $fileName = $file->getClientOriginalName();
        $fileExtension = $file->getClientOriginalExtension();

        if (!in_array($fileExtension, array('xls', 'xlsx', '.xls', '.xlsx'))) {
            return ['status' => false];
        }

        $file->move($folderPath, $fileName);
        $citizens = Excel::toCollection(new GeneralInfoImport(), $folderPath . $fileName);
        Excel::import(new GeneralInfoImportModel($citizens), $folderPath . $fileName);

        return[
          'message' => 'Імпорт пройшов успішно!'
        ];

    }
}