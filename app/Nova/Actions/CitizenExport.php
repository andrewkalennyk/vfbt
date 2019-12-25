<?php

namespace App\Nova\Actions;

use App\Models\Citizen;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CitizenExport extends ExportFromView implements FromView, ShouldAutoSize
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $withoutConfirmation = true;

    public $name = 'Експорт громадян';


    public function view(): View
    {
        $citizens = $this->getCitizens();

        return view('export.citizen.citizens', compact('citizens'));
    }

    public function getCitizens()
    {
        $ids = explode(',', $this->request->get('resources'));
        if (Arr::first($ids) == 'all') {
            $filters = $this->request->filters();
            return Citizen::exportCitiesFilter($filters)->get();
        }

        return Citizen::whereIn('id', $ids)->get();
    }

}
