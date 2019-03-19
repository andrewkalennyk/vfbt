<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CitizensCategory extends Model
{
    protected $table = 'citizens_categories';

    protected $fillable = [
        'title'
    ];

}