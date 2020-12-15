<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(StoreCategoryRequest $request)
    {

        // dd($request->except('_token'));
        // 1st type

        if ($request->hasFile('image')) {
            // dd($request->image->getClientOriginalName());
            // $newFileName = time() . "_" . rand(10) . "." . $request->image->getClientOriginalExtension();
            $fileName = $request->image->getClientOriginalName();
            $request->image->move('product_images', $fileName);
            // part 2
            // $request->file('image')->store('');
        }


        // dd('file move done');

        $category = new Category();
        $category->name = $request->name;
        $category->price = $request->price;
        $category->image = $fileName;
        $category->save();

        // 2nd type

        // Category::create([
        //     'name' => $request->name,
        //     'price' => $request->price 
        // ]);

        // 3rd type

        // Category::create($request->except('_token'));

        return redirect()->route('categories.index')->with('success', 'category added!');
        // dd($request->all());
    }
    public function edit(Category $category)
    {
        // dd($category);
        // dd($id);
        // $category = Category::find($id);
        // dd($category);
        return view('categories.edit', compact('category'));
    }
    public function update(StoreCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'category updated!');
    }
    public function show($id)
    {
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'category deleted!');
    }
}
