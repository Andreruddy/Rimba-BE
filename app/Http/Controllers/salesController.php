<?php

namespace App\Http\Controllers;

use App\Model\salesModel;
use Illuminate\Http\Request;

class salesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = salesModel::all();

        return view ('pages-sales.index')->with([
            'datas' => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = salesModel::with('customers')->findOrFail($id);

        return view ('pages-sales.show')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = salesModel::findOrfail($id);
        $items->delete();
        return redirect()->route('sales.index');
    }
    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|in:CASH,CREDIT'
        ]);
        $item = salesModel::findOrfail($id);
        $item->type = $request->type;

        $item->save();

        return redirect()->route('sales.index');

    }
}
