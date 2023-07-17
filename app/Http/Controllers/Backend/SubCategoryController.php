<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable $dataTable)
    {

        return $dataTable->render('admin.sub-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::all();
        return view('admin.sub-category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' =>['required'],
            'name'=>['required','max:200','unique:sub_categories,name'],
            'status'=>['required']
        ]);
        $subCategory= new SubCategory();

        $subCategory->category_id= $request->category;
        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);
        $subCategory->status = $request->status;
        $subCategory->save();

        toastr('Pod kategoria utworzona','success');

        return redirect()->route('admin.sub-category.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $subCategory = subCategory::findOrFail($id);
        return view('admin.sub-category.edit',compact('subCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' =>['required'],
            'name'=>['required','max:200','unique:sub_categories,name,'.$id],
            'status'=>['required']
        ]);
        $subCategory= SubCategory::findOrFail($id);

        $subCategory->category_id= $request->category;
        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);
        $subCategory->status = $request->status;
        $subCategory->save();

        toastr('Pod kategoria zaktualizowana','success');

        return redirect()->route('admin.sub-category.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory = subCategory::findOrFail($id);
        $subCategory->delete();

        return response(['status' => 'success', 'message' =>'Usunięto pod kategorie']);
    }
    public function changeStatus(Request $request)
    {
        $subCategory = subCategory::findOrFail($request->id);
        $subCategory -> status = $request -> status == 'true' ? 1 : 0;
        $subCategory -> save();

        return response(['message' =>'Zaktualizowano status']);
    }

}
