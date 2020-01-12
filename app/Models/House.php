<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use App\Traits\RevisionMaker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;


class House extends BaseClass
{
    use RevisionMaker;

    const HOUSE_TYPE = 'house';
    const PRIVATE_TYPE = 'private';
    const DISTRICT_TYPE = 'district';
    const SPECIAL_SECTION_TYPE = 'special_section';

    protected $table = 'houses';

    protected $fillable = [
        'street_id',
        'elective_plot_id',
        'title',
        'type',
        'entrances_number',
        'floors_number',
        'flat_number',
    ];

    protected $transcript = [
        'fields' => [
            'id' => 'ID',
            'title' => 'Назва',
            'entrances_number' => "кількість під'їздів",
            'floors_number' => 'кількість поверхів',
            'flat_number' => 'кількість квартир',
            'street_id' => 'ID Вулиці',
            'elective_plot_id' => 'ID Дільниці',
        ],
        'name' => 'Будинки',
        'slug' => 'houses'
    ];

    protected $typeLabel = [
        self::HOUSE_TYPE => '',
        self::PRIVATE_TYPE => '(П/C)',
        self::DISTRICT_TYPE => '',
        self::SPECIAL_SECTION_TYPE => '(Спец)',
    ];

    public function street()
    {
        return $this->belongsTo('App\Models\Street');
    }

    public function citizens()
    {
        return $this->belongsToMany('App\Models\Citizen', 'houses_citizens')->withPivot('citizen_status_id');
    }

    public function house_citizens()
    {
        return $this->hasMany('App\Models\HouseCitizen');
    }

    public function elective_plot()
    {
        return $this->belongsTo('App\Models\ElectivePlot');
    }

    public function citizenCitizenStatuses()
    {
        return $this->hasMany(CitizenCitizenStatus::class, 'house_id', 'id')->with('citizen');
    }

    public function getTypeLabel()
    {
        return Arr::get($this->typeLabel, $this->type, '');
    }

    public function getIndexTitleAttribute()
    {
        return $this->title . ' ' . $this->getTypeLabel();
    }

    public function getResponsibleAttribute()
    {
        $citizens = $this->citizenCitizenStatuses->pluck('citizen.full_name', 'citizen.id');
        $html = '';
        if ($citizens->count()) {
            foreach ($citizens as $id => $citizen) {
                $html .= '<a href="/admin/resources/citizens/' . $id . '" class="no-underline font-bold dim text-primary">' . $citizen . '</a><br>';
            }
        }

        return $html;
    }

    public function scopeByStreet($query, $id)
    {
        return $query->where('street_id', $id);
    }

    public function scopeFilter($query, $filters)
    {

        if (Arr::get($filters, 'street_id')) {
            $query = $query->where('street_id', Arr::get($filters, 'street_id'));
        }
        return $query;
    }
}
