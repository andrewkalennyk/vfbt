<?php

use Illuminate\Database\Seeder;
use App\Models\House;

class UpdateTypeHouses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $houses = House::all();

        foreach ($houses as $house) {
            if (!$house->type) {
                $house->type = $house->is_private == 1 ? House::PRIVATE_TYPE : House::HOUSE_TYPE;
            }
            $house->save();
        }
    }
}
