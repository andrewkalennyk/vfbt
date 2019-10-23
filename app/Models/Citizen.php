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
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Calculation\Category;


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
        'is_certificate',
        'is_in_black'
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

    protected $searchExcludeFields = [
        'last_name',
        'first_name',
        'patronymic_name',
        'elective_plot_id',
        'street_id',
        'house_id'
    ];

    /*public function citizens_category()
    {
        return $this->BelongsTo('App\Models\CitizensCategory');
    }*/

    public function general_info()
    {
        return $this->hasOne('App\Models\GeneralInfoCitizen');
    }

    public function bad_list()
    {
        return $this->hasOne('App\Models\BadList');
    }

    public function house_citizens()
    {
        return $this->hasOne('App\Models\HouseCitizen');
    }

    public function bad_list_reason()
    {
        return $this->belongsTo('App\Models\BadListReason');
    }

    public function citizen_statuses()
    {
        return $this->hasMany('App\Models\CitizenCitizenStatus');
    }

    public function getIndexCategoryAttribute()
    {
        return $this->categories->pluck('title')->implode(',<br>');
    }

    public function getIndexStatusAttribute()
    {
        $statuses = $this->citizen_statuses;
        $indexStatuses = [];
        foreach ($statuses as $status) {
            $citStatus = $status->citizen_status->title ?? '';
            $citSubStatus = $status->citizen_sub_status->title ?? $status->details;
            $indexStatuses[] = $citStatus . '(' . $citSubStatus . ')';
        }
        return implode($indexStatuses, ',<br>');
    }


    public static function importCitizen($item)
    {
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

    public function categories()
    {
        return $this->belongsToMany(CitizensCategory::class,
            'citizen_citizen_categories',
            'citizen_id',
            'citizens_category_id');
    }

    public function isBlack()
    {
        return $this->is_in_black == 1 ? 'Так ' : '';
    }

    public function scopeSearch($query, $searchValues)
    {
        if (!empty($searchValues['last_name'])) {
            $query = $query->where('last_name', 'like', '%' . $searchValues['last_name'] . '%');
        }

        if (!empty($searchValues['first_name'])) {
            $query = $query->where('first_name', 'like', '%' . $searchValues['first_name'] . '%');
        }

        if (!empty($searchValues['patronymic_name'])) {
            $query = $query->where('patronymic_name', 'like', '%' . $searchValues['patronymic_name'] . '%');
        }

        if (!empty($searchValues['elective_plot_id']) && empty($searchValues['street_id'])) {
            $electivePlot = ElectivePlot::with('streets')->find($searchValues['elective_plot_id']);
            $streets = Street::with('houses')->whereIn('id', $electivePlot->streets->pluck('id'))->get();
            $houses = House::whereIn('street_id', $streets->pluck('id'))->get();
            $citizenIds = HouseCitizen::whereIn('house_id', $houses->pluck('id'))->pluck('citizen_id');
            $query = $query->whereIn('id', $citizenIds);
        }

        if (!empty($searchValues['street_id']) && empty($searchValues['house_id'])) {
            $street = Street::with('houses')->find($searchValues['street_id']);
            $houses = House::whereIn('id', $street->houses->pluck('id'))->get();
            $citizenIds = HouseCitizen::whereIn('house_id', $houses->pluck('id'))->pluck('citizen_id');
            $query = $query->whereIn('id', $citizenIds);
        }

        if (!empty($searchValues['house_id'])) {
            $house = House::with('citizens')->find($searchValues['house_id']);
            $query = $query->whereIn('id', $house->citizens->pluck('id'));
        }

        if (is_array($searchValues) && count($searchValues)) {
            foreach ($searchValues as $key => $value) {
                if (!in_array($key, $this->searchExcludeFields) && $value) {
                    $query = $query->where($key, $value);
                }
            }
        }

        return $query;
    }

    public function scopeByFullName($query, $input)
    {
        $query->where('last_name', 'like', $input['last_name'])
            ->where('first_name', 'like', $input['first_name'])
            ->where('patronymic_name', 'like', $input['patronymic_name']);
    }

}