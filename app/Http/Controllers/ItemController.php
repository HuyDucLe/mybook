<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookinfo;


class ItemController extends Controller
{
    public function index($id)
    {
        $item = Bookinfo::where('id', '=', $id)
        ->join('categories', 'bookinfo.category_id', '=', 'categories.category_id')
        ->first();
        return view('item', compact('item'));
    }
}
