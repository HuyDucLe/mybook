<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookinfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_name',
        'category_id',
        'author',
        'description',
        'rate',        
        'promote'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
    
    protected $table = "bookinfo";
    
    protected function fullTextWildcards($term)
    {
        // removing symbols used by MySQL
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $term = str_replace($reservedSymbols, '', $term);
        
        $words = explode(' ', $term);
        
        foreach ($words as $key => $word) {
            /*
             * applying + operator (required word) only big words
             * because smaller ones are not indexed by mysql
             */
            if (strlen($word) >= 1) {
                $words[$key] = '+' . $word  . '*';
            }
        }
        
        $searchTerm = implode(' ', $words);
        
        return $searchTerm;
    }
    
    public function scopeFullTextSearch($query, $columns, $term)
    {
        $query->whereRaw("MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)", $this->fullTextWildcards($term));
        
        return $query;
    }
}
