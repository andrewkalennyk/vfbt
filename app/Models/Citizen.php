<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use App\Models\Pivots\CitizenPromotion;
use App\Traits\PrepareFindInfo;
use App\Traits\RevisionMaker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Log;


class Citizen extends Model
{
    use RevisionMaker, PrepareFindInfo;

    protected $table = 'citizens';

    protected $fillable = [
        'citizens_category_id',
        'last_name',
        'first_name',
        'patronymic_name',
        'phone',
        'certificate_number',
        'date_birth',
        'is_in_black'
    ];

    protected $casts = [
        'date_birth' => 'date',
    ];

    protected $transcript = [
        'fields' => [
            'id' => 'ID',
            'citizens_category_id' => 'Категорія',
            'last_name' => 'Прізвище',
            'first_name' => "Ім'я",
            'patronymic_name' => 'По батькові',
            'phone' => 'Телефон',
            'certificate_number' => '# посв',
            'date_birth' => 'Дата народження'
        ],
        'name' => 'Громадяни',
        'slug' => 'citizens'
    ];

    public function citizens_category()
    {
        return $this->BelongsTo('App\Models\CitizensCategory');
    }

    public function general_info()
    {
        return $this->hasOne('App\Models\GeneralInfoCitizen');
    }

    public function house_citizens()
    {
        return $this->hasOne('App\Models\HouseCitizen');
    }

    public static function importCitizen($item) {
        return Citizen::updateOrCreate(
            [
                'last_name' => $item['prizvishche'],
                'first_name' => $item['imya'],
                'patronymic_name' => $item['po_batkovi'],
                'phone' => $item['telefon']
            ],
            [
                'citizens_category_id' => $item['kat'],
                'certificate_number' => $item['posv'],
                //'date_birth' => $item['prizvishche'],
            ]
        );
    }

    public function promotions(): BelongsToMany
    {
        return $this->belongsToMany(Promotion::class,
            'citizens_promotions',
            'citizen_id',
            'promotion_id')
            ->using(CitizenPromotion::class);
    }

    public function isBlack()
    {
        return $this->is_in_black == 1 ? 'Так' : '';
    }

    public function scopeSearchByName($query, $input)
    {

        $query = $query->where('last_name', 'like', '%' . $input['last_name'] . '%');

        if (!empty($initials['first_name'])) {
            $query = $query->where('first_name', 'like', '%' . $input['first_name'] . '%');
        }

        if (!empty($initials['patronymic_name'])) {
            $query = $query->where('patronymic_name', 'like', '%' . $input['patronymic_name'] . '%');
        }
        return $query;
    }

}