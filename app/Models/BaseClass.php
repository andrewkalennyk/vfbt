<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseClass extends Model
{

    public function scopeOrderByTitleAsc($query)
    {
        return $query->orderBy('title', 'asc');
    }

}