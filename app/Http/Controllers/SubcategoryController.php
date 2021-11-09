<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategoryController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory = Subcategory::select('category.name as category_name', 'subcategory.*')
            ->leftJoin('category', 'category.id', '=', 'subcategory.category_id')
            ->paginate(10);

        return view('admin.subcategory.index', compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.subcategory.create', compact('category'));
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
            'name' => 'required|unique:category',
        ]);

        Subcategory::create($request->all());

        return redirect()->back()
            ->with('success', 'Subcategory was created.');
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
    public function edit(Subcategory $subcategory)
    {
        $category = Category::all();
        return view('admin.subcategory.edit', compact('subcategory', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required:subcategory',
            'category_id' => 'required:subcategory',
        ]);

        Subcategory::where('id', $id)
        ->update([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id')
        ]);

        return redirect()->back()
            ->with('success', 'Subcategory was updated.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Subcategory::findOrFail($id);
        if ($category->delete()) {
            return response()->json([
                'status' =>  'success',
                'message' => 'Subcategory was deleted.'
            ], 200);
        }

        return response()->json([
            'status' =>  'error',
            'message' => 'Deleting Subcategory failed.'
        ], 200);
    }
}