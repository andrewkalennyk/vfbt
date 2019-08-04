<?php

use Illuminate\Database\Seeder;
use App\Models\HouseCitizen;

class UpdateHouseCitizensStreetId extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $houseCitizens = HouseCitizen::with('house.street')->get();

        foreach ($houseCitizens as $relation) {
            if (!$relation->streetId) {
                if ($relation->house && !empty($relation->house->street)) {
                    $relation->street_id = $relation->house->street->id;
                    $relation->save();
                }

            }
        }

    }
}
