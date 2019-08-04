<?php

namespace App\Observers;

use App\Models\BadList;

class BadListCitizensObserver
{
    public function saving($object)
    {
        if ($object->is_in_black == 1) {
            BadList::updateOrCreate([
                'citizen_id' => $object->id,
                'type' => $object->type_list,
            ], [
                'bad_list_reason_id' => $object->message
            ]);

            unset($object->type_list);
            unset($object->message);
        }

    }
}
