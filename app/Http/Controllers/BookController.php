<?php

namespace App\Http\Controllers;

use App\Models\Bookinfo;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Bookinfo::paginate(5);
        
        return view('admin.dashboard',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
        ]);
        
        Bookinfo::create($request->all());
        
        return redirect()->route('admin.index')
        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bookinfo  $bookinfo
     * @return \Illuminate\Http\Response
     */
    public function show(Bookinfo $item)
    {
        return view('admin.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bookinfo  $bookinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookinfo $item)
    {
        return view('admin.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bookinfo  $bookinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bookinfo $item)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        
        $product->update($request->all());
        
        return redirect()->route('admin.index')
        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bookinfo  $bookinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookinfo $item)
    {
        $item->delete();
        
        return redirect()->route('admin.index')
        ->with('success','Product deleted successfully');
    }
}
