<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\itemsModel;
use Illuminate\Http\Request;

class itemsController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $nama_item = $request->input('nama_item');
        $limit = $request->input('limit', 6);
        $harga_satuan = $request->input('harga_satuan');
        $harga_grosir = $request->input('harga_grosir');

        if($id)
        {
            $items = itemsModel::find($id);

            if($items)
                return responseFormatter::success($items, 'Data Berhasil diambil');
            else
                return responseFormatter::error(null, 'data tidak ada !', 404);
        }

        if($nama_item)
        {
            $product = itemsModel::where('nama_item', $nama_item)->first();

            if($product)
                return responseFormatter::success($product, 'Data Berhasil diambil');
            else
                return responseFormatter::error(null, 'data tidak ada !', 404);
        }

        $product = itemsModel::all();

        if($nama_item)
            $product->where('nama_item', 'like', '%'. $nama_item .'%');
        if($harga_satuan)
            $product->where('harga_satuan', '>=', $harga_satuan);
        if($harga_grosir)
            $product->where('harga_grosir', '>=', $harga_grosir);

        return responseFormatter::success(
            $product->get($limit),
            'Data berhasil diambil'
        );
    }
}
