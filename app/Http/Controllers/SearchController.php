<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookinfo;

class SearchController extends Controller
{
    public function search()
    {
        return view('search');
    }
    
    public function searchFullText(Request $request)
    {
        // Get the search value from the request
        $search = $request->get('search');
        
        // Search in the title and body columns from the posts table
        if ($search != ''){
            $items = Bookinfo::FullTextSearch('book_name, author', $search)
                ->paginate(12);
        
            // Return the search view with the resluts compacted
            return view('search', compact('search', 'items'));
        }
        else return view('search');
    }
}