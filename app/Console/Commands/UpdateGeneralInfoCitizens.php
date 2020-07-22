<?php

namespace App\Console\Commands;

use App\Models\Citizen;
use App\Models\GeneralInfoCitizen;
use App\Models\House;
use Illuminate\Console\Command;

class UpdateGeneralInfoCitizens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:general-info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $generalInfoCitizenIds = \App\Models\GeneralInfoCitizen::pluck('citizen_id');
        $citizenIds = \App\Models\Citizen::whereHas('house_citizens')->pluck('id');
        $diff = $citizenIds->diff($generalInfoCitizenIds);
        dd($citizenIds->count());
        /*if ($diff->count()) {
            foreach ($diff as $citizenId) {
                $citizen = Citizen::with('house_citizens')->whereHas('house_citizens')->find($citizenId);
                dd($citizen);
            }
        }*/

        /*$generalInfoCitizens = GeneralInfoCitizen::with('citizen.house_citizens')->get();
        foreach ($generalInfoCitizens as $generalInfoCitizen) {
            $generalInfoCitizen = $this->checkIfCitizenHouse($generalInfoCitizen);
            $generalInfoCitizen = $this->checkRightStreet($generalInfoCitizen);
            $generalInfoCitizen = $this->checkRightElectivePlot($generalInfoCitizen);
            $generalInfoCitizen = $this->checkRightOffice($generalInfoCitizen);
            $generalInfoCitizen->save();
        }*/
    }

    public function checkIfCitizenHouse($generalCitizen)
    {
        $citizen = $generalCitizen->citizen;
        if ($citizen) {
            $houseCitizens = $citizen->house_citizens;
            $generalCitizen->house_id = $houseCitizens ? $houseCitizens->house_id : $generalCitizen->house_id;
        }

        return $generalCitizen;
    }

    public function checkRightStreet($generalCitizen)
    {
        $house = House::with('street')->find($generalCitizen->house_id);
        if ($house) {
            $street = $house->street;
            $generalCitizen->street_id = $street ? $street->id : $generalCitizen->street_id;
        }
        return $generalCitizen;
    }

    public function checkRightElectivePlot($generalCitizen)
    {
        $house = House::with('elective_plot')->find($generalCitizen->house_id);
        if ($house) {
            $electivePlot = $house->elective_plot;
            $generalCitizen->elective_plot_id = $electivePlot ? $electivePlot->id : $generalCitizen->elective_plot_id;
        }
        return $generalCitizen;
    }

    public function checkRightOffice($generalCitizen)
    {
        $house = House::with('elective_plot.office')->find($generalCitizen->house_id);
        if ($house) {
            $electivePlot = $house->elective_plot;
            if ($electivePlot) {
                $office = $electivePlot->office;
                $generalCitizen->office_id = $office ? $office->id : $generalCitizen->elective_plot_id;
            }
        }
        return $generalCitizen;
    }
}
