<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = DB::table('products')->get();
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        // $this->middleware('auth');
        return view('products.create');
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
        DB::table('products')->insert([
            'name' => $request->name,
            'price' => $request->price
        ]);

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
