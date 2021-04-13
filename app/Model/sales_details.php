<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class sales_details extends Model
{
    public $table = 'sales_details';
    protected $fillable = [
        'sales_id', 'item_id'
    ];
}
