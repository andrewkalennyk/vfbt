<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CitizenCitizenStatus extends Model
{

    protected $table = 'citizen_citizen_statuses';

    protected $fillable = [
        'citizen_id',
        'citizens_status_id',
        'citizens_sub_status_id',
    ];

    protected $statusTypesMethods = [
        'responsible' => 'prepareResponsibleDetails',
        'parent_committee' => 'prepareParentCommitteeDetails'
    ];


    public function citizen()
    {
        return $this->BelongsTo('App\Models\Citizen');
    }

    public function citizen_status()
    {
        return $this->BelongsTo('App\Models\CitizensStatus');
    }

    public function citizen_sub_status()
    {
        return $this->BelongsTo('App\Models\CitizensSubStatus');
    }

    public function street()
    {
        return $this->belongsTo('App\Models\Street');
    }

    public function house()
    {
        return $this->BelongsTo('App\Models\House');
    }

    public function regionalEstablishmentType()
    {
        return $this->belongsTo('App\Models\RegionalEstablishmentType');
    }

    public function regionalEstablishment()
    {
        return $this->belongsTo('App\Models\RegionalEstablishment');
    }

    public function getDetailsAttribute()
    {
        $type = $this->citizen_status->type;

        if ($type) {
            $method = $this->statusTypesMethods[$type];
            return $this->$method();
        }

        return ' - ';
    }

    public function prepareResponsibleDetails()
    {
        return $this->street->title . ' ' . $this->house->title . ' (' . $this->entrance. " під'їзд)";
    }

    public function prepareParentCommitteeDetails()
    {
        return $this->regionalEstablishmentType->title . ' ' .$this->regionalEstablishment->title;
    }

}