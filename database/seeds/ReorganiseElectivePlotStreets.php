<?php

use Illuminate\Database\Seeder;
use \App\Models\Street;

class ReorganiseElectivePlotStreets extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $streets = Street::all();
        foreach ($streets as $street) {
            if ($street->elective_plot_id) {
                $street->electivePlots()->sync([$street->elective_plot_id]);
            }
        }
    }
}
