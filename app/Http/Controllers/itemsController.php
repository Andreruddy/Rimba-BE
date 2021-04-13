<?php

namespace App\Http\Controllers;

use App\Http\Requests\itemRequest;
use App\Model\itemsModel;
use Illuminate\Http\Request;

class itemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = itemsModel::all();

        return view('pages-item.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('pages-item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(itemRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/items', 'public'
        );

        itemsModel::create($data);
        return redirect()->route('items.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = itemsModel::findorfail($id);

        return view('pages-item.edit')->with([
            'items' => $items
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(itemRequest $request, $id)
    {
        $items = $request->all();
        $items['image'] = $request->file('image')->store(
            'assets/items', 'public'
        );

        $item = itemsModel::findorfail($id);
        $item->update($items);
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = itemsModel::findorfail($id);
        $items->delete();

        return redirect()->route('items.index');
    }
}
