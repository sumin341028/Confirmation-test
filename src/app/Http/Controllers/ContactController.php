<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        
        return view('contacts.index', compact('categories'));
    }

    public function back(Request $request)
{
    $categories = Category::all();
    $inputs = $request->all();

    return view('contacts.index', [
        'categories' => $categories,
        'inputs' => $inputs
    ]);
}

    public function confirm(ContactRequest $request)
{
    $inputs = $request->validated();
    $request->session()->put($inputs);

    $category = Category::find($inputs['category_id']);
    $categoryName = $category ? $category->content : '未分類';

    return view('contacts.confirm', compact('inputs', 'categoryName'));
}

public function store(ContactRequest $request)
{
    $inputs = $request->validated(); // ← ここを data じゃなくて inputs に統一！

    // 電話番号を結合
    $tel = $inputs['tel1'] . $inputs['tel2'] . $inputs['tel3'];
    $inputs['tel'] = $tel;

    Contact::create([
        'last_name' => $inputs['last_name'],
        'first_name' => $inputs['first_name'],
        'gender' => $inputs['gender'],
        'email' => $inputs['email'],
        'tel' => $inputs['tel'],
        'address' => $inputs['address'],
        'building' => $inputs['building'],
        'category_id' => $inputs['category_id'],
        'detail' => $inputs['detail'],
    ]);

    return view('contacts.thanks');
}
}