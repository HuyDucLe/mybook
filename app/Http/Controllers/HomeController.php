<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $news = DB::table('bookinfo')        
        ->select('*')
        ->orderBy('id')
        ->take(8)
        ->get();

        $combos = DB::table('bookinfo')        
        ->select('*')
        ->where('book_name', 'like', '%combo%')
        ->orderBy('rate')
        ->take(8)
        ->get();

        $releases = DB::table('bookinfo')        
        ->select('*')
        ->inRandomOrder()
        ->take(4)
        ->get();
        return view('home', compact('news','combos','releases'));
    }
}
