<?php

namespace App\Nova\Actions;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class GeneralInfoAction extends DownloadExcel implements ShouldAutoSize
{

    public $name = 'Експорт';

}
