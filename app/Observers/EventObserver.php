<?php

namespace App\Observers;

use App\Models\Revision;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EventObserver
{
    public function created($obj)
    {
        $this->saveRevision([
            'user_id' => Auth::getUser()->id,
            'model' => get_class($obj),
            'model_id' => $obj->id,
            'type' => 'Создание',
            'new_value' => $obj
        ]);
    }

    public function saved($obj)
    {

    }


    public function saveRevision(array $results)
    {
        Revision::create($results);
    }
}
