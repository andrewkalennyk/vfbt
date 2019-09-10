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


class RegionalEstablishment extends Model
{
    use RevisionMaker;

    protected $table = 'regional_establishments';

    protected $fillable = [
        'title'
    ];

    protected $transcript = [
        'fields' => [
            'id' => 'ID',
            'title' => 'Назва',
        ],
        'name' => 'Районний заклад',
        'slug' => 'regional-establishments'
    ];

    public function regionalEstablishmentType()
    {
        return $this->belongsTo('App\Models\RegionalEstablishmentType');
    }

    public function street()
    {
        return $this->belongsTo('App\Models\Street');
    }

    public function house()
    {
        return $this->BelongsTo('App\Models\House');
    }

    public function citizens()
    {
        return $this->belongsToMany(Citizen::class, 'citizen_citizen_statuses', 'regional_establishment_id', 'citizen_id');
    }

    public function getPhoneIndexAttribute()
    {
        return implode(',<br>', array_filter([
            $this->phone, $this->phone_second, $this->phone_third
        ]));
    }

}