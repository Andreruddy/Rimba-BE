<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\checkoutRequest as APICheckoutRequest;
use App\Model\customersModel;
use App\Model\itemsModel;
use App\Model\sales_details;
use App\Model\salesModel;

class checkoutController extends Controller
{
    public function checkout(APICheckoutRequest $request)
    {
        $data = $request->except('sales_details');
        $data['kode_transaksi'] = 'RMB' .mt_rand(10000, 99999) .mt_rand(100, 999);
        // dd($data);

        $transaction = salesModel::create($data);
        foreach ($request->sales_details as $item) 
        {
            $details[] = new sales_details([
                'sales_id' => $transaction->id,
                'item_id' => $item
            ]);

            itemsModel::find($item)->decrement('stok');
        }

        $transaction->detail()->saveMany($details);

        return responseFormatter::success($transaction);
    }
}
