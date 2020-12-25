<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Product;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $products = DB::table('products')->get();
        $products = Product::with('category1')->get();
        // dd($products);
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:10|unique:products',
            'price' => 'required|numeric|digits:6'
        ];
        $request->validate($rules, [
            'required' => 'Please enter :attribute.',
            'unique' => 'This :attribute is already exist.'
        ]);
        // dd($request->all());
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = 'default.png';
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product added successfully!');

        // dd($request->all());
    }

    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->get();
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        DB::table('products')
            ->where(['id' => $id])
            ->update([
                'name' => $request->name,
                'price' => $request->price
            ]);
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function show($id)
    {
        return 'i am show';
    }

    public function destroy($id)
    {
        DB::table('products')->delete($id);
        return redirect()->route('products.index')->with('danger', 'Product deleted successfully!');
    }
}
