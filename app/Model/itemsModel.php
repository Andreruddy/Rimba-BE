<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class itemsModel extends Model
{
    protected $table = 'items';
    protected $fillable = [
        'nama_item', 'unit', 'stok', 'harga_satuan', 'harga_grosir', 'image'
    ];

    public function getimageAttribute($value)
    {

        return url('storage/' . $value);
    }
}
