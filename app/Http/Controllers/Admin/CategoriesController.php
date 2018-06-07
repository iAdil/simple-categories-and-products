<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $categories = $category::all();
        return view('admin.categories.index')
            ->with('categories', $categories);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        $categories = $category::all();

        return view('admin.categories.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'required'
        ]);

        $parentCategory = Category::find($request->parent_id);

        if(! is_null($parentCategory)){
            $parentCategory->children()->create([
                'name' => $request->name
            ]);
        }else{
            Category::create([
                'name' => $request->name
            ]);
        }



        return redirect()->route('admin.categories.index')->with('success', 'Category created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $category = Category::find($id);

        return view('admin.categories.edit')
            ->with('categories', $categories)
            ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'required'
        ]);


        $category = Category::find($id);
        $parentCategory = Category::find($request->parent_id);

        if(! is_null($parentCategory)){
            $category->makeChildOf($parentCategory);
        }else{
            $category->makeRoot();
        }

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted');
    }
}
