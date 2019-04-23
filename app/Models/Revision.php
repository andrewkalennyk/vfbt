<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Revision extends Model
{
    protected $table = 'revision_logs';

    protected $fillable = [
        'user_id', 'model', 'model_id','class_name','link', 'type', 'old_value', 'new_value'
    ];



    public function user()
    {
        return $this->BelongsTo(User::class);
    }


}