<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{  
   // Data Members 
   protected $dataBase = "type"; 
   protected $primaryKey = "id"; // Product ID 

   // Fuzzy Search Method
   public static function search(string $search)
   {
        $column = ["id", "name"]; // Search parameters

        
        if(empty(trim($search))) // Check for Empty Search
        {
            return Product::select($column)->get();
        }
        else // Fuzzy Search if found
        {
            $fuzzysearch = implode("%", str_split(str_replace(" ", "", $search))); // Search String
            $fuzzysearch = "%$fuzzysearch%";

            return Product::select($column)->where("name", "like", $fuzzysearch)->get();
        }
   }
}
