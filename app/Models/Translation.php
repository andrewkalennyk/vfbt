<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;


class Translation extends Model
{
    protected $table = 'translations';

    protected $fillable = [
        'phrase','translate_ru'
    ];

    public $timestamps = false;

    public function scopeByPhrase($query, $phrase)
    {
        return $query->where('phrase', $phrase);
    }

    public static function getTranslate(string $phrase) :string
    {
        if (!$phrase) {
            return false;
        }
        $locale = config('app.locale');
        $field = 'translate_' . $locale;

        $translation = Cache::rememberForever('trans_phrase_' . $phrase, function () use ($phrase) {
                return Translation::byPhrase($phrase)->first();
        });

        if (!$translation) {
            $translation = Translation::generateTranslation($phrase);
        }

        return $translation ? $translation->$field : '';
    }

    public static function generateTranslation($phrase)
    {

        return Translation::create([
            'phrase' => $phrase,
            'translate_ru' => $phrase
        ]);


    }
}