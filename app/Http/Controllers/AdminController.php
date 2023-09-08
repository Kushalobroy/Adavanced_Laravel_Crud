<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function create()
    {
        $data = Category::all();
        return view('create', compact('data'));
    }
    public function createProduct()
    {
        $data = Category::all();
        return view('createProduct', compact('data'));
    }
    public function createCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->post());
        Session::flash('category_add', 'Category Created Successfully');
        return redirect()->route('create');
    }
    public function createProducts(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);
        Session::flash('product_add', 'Product Added Succesfully');
        Product::create($request->post());
        return redirect()->route('home');
    }
    public function updateProduct($id)
    {
        $data = Product::find($id);
        $da = Category::all();
        return view('updateProduct', compact('data', 'da'));
    }
    public function updateProducts(Request $request, $id)
    {
        $prod = Product::find($id);
        $prod->name = $request->name;
        $prod->category_id = $request->category_id;
        $prod->save();
        Session::flash('update_message', 'Updated Successfully');
        return redirect()->route('home');
    }
    public function delete($id)
    {
        Product::destroy($id);
        Session::flash('delete_message', 'Deleted Successfully');
        return back();
    }
    public function deleteCategory($id)
    {
        Category::destroy($id);
        Session::flash('delete_message', 'Deleted Successfully');
        return back();
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|max:191',
                'category_id' => 'required|max:191',
            ]
        );
        $prod = Product::find($id);
        if ($prod) {
            $prod->name = $request->name;
            $prod->category_id = $request->category_id;
            $prod->update();
            return response()->json(['message' => 'Product Updated Successfully'], 200);
        } else {
            return response()->json(['message' => 'No Product found'], 400);
        }
    }
}
