<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Good;

class IndexController extends Controller
{
    public function mainPage(Request $request)
    {
        $goods = Good::query()->where('is_published', '=', true);
        if ($request->get('search'))
        {

            $searched_items = $request->get('search');
            $goods = $goods->where('title', 'LIKE', "%$searched_items%");
        }

        $goods = $goods->paginate(9)->withQueryString();
        return view('mainPage', [
            'goods' => $goods
        ]);
    }

    public function signup(){
        return view('signup');
    }
    public function signin(){
        return view('signin');
    }
}
