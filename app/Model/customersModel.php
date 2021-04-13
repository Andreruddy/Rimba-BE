<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class customersModel extends Model
{
    public $table = 'customers';
    protected $fillable = [
        'nama', 'contact', 'email', 'alamat', 'diskon', 'image', 'pic'
    ];

    public function sales() {
        return $this->belongsTo(salesModel::class, 'customer_id', 'id');
    }
}
