<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class salesModel extends Model
{
    public $table = 'sales';
    protected $fillable = [
        'customer_id', 'kode_transaksi', 'tgl_transaksi', 'qty', 'type', 'total_diskon', 'total_harga', 'total_bayar'
    ];

    public function customers() {
        return $this->hasMany(customersModel::class, 'customer_id');

    }
}
