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


class Promotion extends Model
{
    use RevisionMaker;

    protected $table = 'promotions';

    protected $fillable = [
        'title','start_date','finish_date'
    ];

    protected $casts = [
        'start_date' => 'date',
        'finish_date' => 'date',
    ];

    protected $transcript = [
        'fields' => [
            'id' => 'ID',
            'title' => 'Назва',
            'start_date' => 'Дата старту',
            'finish_date' => 'Дата фінішу',
            'description' => 'Опис',
        ],
        'name' => 'Акції',
        'slug' => 'promotions'
    ];


    public function citizens()
    {
        return $this->belongsToMany('App\Models\Citizen', 'citizens_promotions');
    }
}