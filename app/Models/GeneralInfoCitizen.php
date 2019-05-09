<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class GeneralInfoCitizen extends Model
{
    protected $table = 'general_info_citizens';

    protected $fillable = [
        'office_id','elective_plot_id','street_id','house_id','citizen_id','flat_number','house_citizen_id'
    ];

    public function office()
    {
        return $this->belongsTo('App\Models\Office');
    }

    public function elective_plot()
    {
        return $this->belongsTo('App\Models\ElectivePlot');
    }

    public function street()
    {
       return $this->belongsTo('App\Models\Street');
    }

    public function house()
    {
        return $this->BelongsTo('App\Models\House');
    }

    public function citizen()
    {
        return $this->BelongsTo('App\Models\Citizen');
    }

    public function house_citizen()
    {
        return $this->BelongsTo('App\Models\HouseCitizen');
    }

    public function promotions()
    {
        return $this->belongsToMany('App\Models\Promotion','general_info_citizens_promotions');
    }

    public function scopeByCitizen($query, $id)
    {
        return $query->where('citizen_id', $id);
    }

    public function preparePromotions($filters)
    {
        $promotionFilter = $this->getPromotionFilter($filters);
        $promotion = $this->promotions;

        if ($promotionFilter) {
            $promotion = $promotion->where('id', $promotionFilter);
        }
        return $promotion->implode('title', ',');
    }

    public function getPromotionFilter($filters)
    {
        foreach ($filters as $filter) {
            if ($filter->filter->name == 'Акції') {
               return $filter->value;
            }
        }
        return '';
    }

}