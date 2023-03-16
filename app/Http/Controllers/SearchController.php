<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $query = $request->input('query');

        $goods = Good::where('title', 'LIKE', "%$query")->paginate(9);

//        return view('goods.search', compact('results'));
    }
}
