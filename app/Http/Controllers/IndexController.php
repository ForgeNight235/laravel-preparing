<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Good;

class IndexController extends Controller
{
    public function home(Request $request)

    {
        $goods = Good::query()->where('is_published', '=', '1');
        if ($request->get('search'))
        {
            $searched_items = $request->get('search');
            $goods = $goods
                ->where('title', 'LIKE', '%$searched_items%');
        }
    }
}
