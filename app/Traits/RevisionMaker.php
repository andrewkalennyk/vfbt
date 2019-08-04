<?php

namespace App\Traits;

use App\Models\Revision;
use Fico7489\Laravel\Pivot\Traits\PivotEventTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

trait RevisionMaker
{
    use PrepareInfo, PivotEventTrait;

    public static function bootRevisionMaker()
    {
        static::created(function ($object) {
            static::saveRevision([
                'user_id' => Auth::getUser() ? Auth::getUser()->id : Null,
                'class_name' => $object->prepareObjectClassName(),
                'model' => get_class($object),
                'model_id' => $object->id,
                'link' => $object->prepareLink($object->id),
                'type' => 'Створення',
                'new_value' => $object->prepareObject()
            ]);
        });

        static::saving(function ($object) {
            $model = get_class($object);
            $oldObject = $model::find($object->id);
            if ($oldObject) {
                static::saveRevision([
                    'user_id' => Auth::getUser() ? Auth::getUser()->id : Null,
                    'class_name' => $object->prepareObjectClassName(),
                    'model' => get_class($object),
                    'model_id' => $object->id,
                    'type' => 'збереження / зміна',
                    'link' => $object->prepareLink($object->id),
                    'old_value' => $oldObject->prepareObject(),
                    'new_value' => $object->prepareObject()
                ]);
            }
        });

        static::deleted(function ($object) {
            static::saveRevision([
                'user_id' => Auth::getUser()->id,
                'class_name' => $object->prepareObjectClassName(),
                'model' => get_class($object),
                'model_id' => $object->id,
                'type' => 'Видалення',
                'old_value' => $object->prepareObject()
            ]);
        });


    }

    public static function saveRevision(array $results)
    {
        Revision::create($results);
    }

}
