<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmController extends Controller
{
    public function confirm(Request $request)
{
    $inputs = $request->all();

    // カテゴリー名を取得（Category モデルがある前提）
    $category = \App\Models\Category::find($inputs['category_id']);
    $category_name = $category ? $category->content : '';

    return view('contacts.confirm', [
        'inputs' => $inputs,
        'category_name' => $category_name,
    ]);
}
    //
}
