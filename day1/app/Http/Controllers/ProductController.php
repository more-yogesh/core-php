<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }
    public function insert(Request $request)
    {
        // dd($request->price);
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
    }
    public function index()
    {
        $products = DB::table('products')->get();
        return view('products.index', ['myProducts' => $products]);
    }
    public function destroy($id)
    {
        DB::table('products')->delete($id);
        //DB::delete(['id' => $id]);
    }

    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->get();
        return view('products.edit', ['myProduct' => $product]);
    }

    public function update(Request $request, $id)
    {
        DB::table('products')->where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price
        ]);
    }
}
