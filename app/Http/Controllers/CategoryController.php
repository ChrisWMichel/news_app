<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/categories');
    }


    public function getCategories()
    {
        $categories = Category::all();

        return response()->json(['categories' => $categories]);
    }


    public function addCategory(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|min:4',
        ]);

        Category::create(['name' => $request->name, 'font' => $request->font]);
    }


    public function updateCategory(Request $request, $id)
    {
        $this->validate($request, [
          'name' => 'required'
        ]);

        $category = Category::find($id);

        $category->name = $request->name;
        $category->font = $request->font;
        $category->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
