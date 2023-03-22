<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function index($id)
    {
        if($id > 25) $id = 25; // csdl chưa có cate_id > 25
        $cate_name = DB::table('categories')        
        ->where('category_id', '=', $id)
        ->first()->category_name;
        
        $items = DB::table('bookinfo')
        //->where('category_id', '=', $id)
        ->paginate(12);
        return view('group', compact('cate_name','items'));
    }
    
    public function news()
    {
        $cate_name = 'Mới nhất';     
        $items = DB::table('bookinfo')
        ->select('*')
        ->orderBy('id')
        ->paginate(12);
        return view('group', compact('cate_name','items'));
    }
    
    public function combos()
    {
        $cate_name = 'Combo sách';
        $items = DB::table('bookinfo')
        ->where('book_name', 'like', '%combo%')
        ->orderBy('rate')
        ->paginate(12);
        return view('group', compact('cate_name','items'));
    }
    
    public function releases()
    {
        $cate_name = 'Sắp phát hành';
        $items = DB::table('bookinfo')
        ->where('id', '<', '21')
        ->inRandomOrder()
        ->paginate(12);
        return view('group', compact('cate_name','items'));
    }
}