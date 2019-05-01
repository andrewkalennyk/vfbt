<?php
namespace App\Http\Controllers\Backend;

use App\Exports\HandbookExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ExportHandbookController extends Controller
{
    public function doExport(Request $request)
    {
        return Excel::download(new HandbookExport(), 'handbook.xlsx');
    }
}