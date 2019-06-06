<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class NavigationMenuItem extends Model implements Sortable
{
    use SortableTrait;

    protected $table = 'navigation_menu_items';

    protected $fillable = [
        'title','resource'
    ];

    public $sortable = [
        'order_column_name' => 'priority',
        'sort_when_creating' => true,
    ];

}