<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search;
use Illuminate\Database\QueryException;

class SearchController extends Controller
{
    public function search(Request $request, $search = "")
    {
        try
        {
            if($request->wantsJson())
            {
                return view('pages.productpage', [
                    'product' => response()->json(Search::search($search)) // Fuzzy Search Item
                ]);
            }
        }
        catch(QueryException)
        {
            return abort(404); // Return for Searches that do not exist
        }
    }
}
