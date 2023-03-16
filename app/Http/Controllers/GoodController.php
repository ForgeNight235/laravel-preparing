<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoodStoreRequest;
use App\Models\Good;
use Dotenv\Validator;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    public function store(GoodStoreRequest$request)
    {
        $validated = $request -> validated();
        if ($request->file('photo')){
            $validated['image_path']=$request->file('photo')->store('public/images');
        }
        $good = Good::query()->create($validated);
        return redirect()->route('mainPage');
    }

    public function createForm()
    {
        return view('goods.create');
    }
}
