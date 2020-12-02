<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Foundation\Auth\RedirectsUsers;

// use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        // dd($products);
        return view('products.index', ['products' => $products]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $product  = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        // return Redirect::to('/products');
        return redirect()->to('/products');
        // return redirect()->back();
    }
    public function edit($id)
    {
        // dd($id);
        $product = Product::find($id);
        // dd($product);
        return view('products.edit', ['product' => $product]);
    }
    public function update(Request $request, $id)
    {
        // dump($id);
        // dd($request->all());
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return redirect()->to('/products');
    }
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->back();
    }
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', ['product' => $product]);
    }
}
