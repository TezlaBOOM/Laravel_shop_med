<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ChildCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\HomePageSettings;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChildCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.child-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::all();
        return view('admin.child-category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'main_category' =>['required'],
            'sub_category' =>['required'],
            'name'=>['required','max:200','unique:child_categories,name'],
            'status'=>['required']
        ]);
        $childCategory= new ChildCategory();

        $childCategory->category_id= $request->main_category;
        $childCategory->sub_category_id= $request->sub_category;
        $childCategory->name = $request->name;
        $childCategory->slug = Str::slug($request->name);
        $childCategory->status = $request->status;
        $childCategory->save();

        toastr('Pod pod kategoria utworzona','success');

        return redirect()->route('admin.child-category.index');
        
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
        $childCategory = ChildCategory::findOrFail($id);
        $subCategories = SubCategory::where('category_id',$childCategory->category_id)->get();
        return view('admin.child-category.edit',compact('childCategory','categories','subCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $request->validate([
            'main_category' =>['required'],
            'sub_category' =>['required'],
            'name'=>['required','max:200','unique:child_categories,name,'.$id],
            'status'=>['required']
        ]);
        $childCategory= ChildCategory::findOrFail($id);

        $childCategory->category_id= $request->main_category;
        $childCategory->sub_category_id= $request->sub_category;
        $childCategory->name = $request->name;
        $childCategory->slug = Str::slug($request->name);
        $childCategory->status = $request->status;
        $childCategory->save();

        toastr('Pod pod kategoria zaktualizowano','success');

        return redirect()->route('admin.child-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $childCategory = childCategory::findOrFail($id);
        if(Product::where('child_category_id', $childCategory->id)->count() > 0){
            return response(['status' => 'error', 'message' =>'Kategoria posiada jest połączony z produktem']);
        }
        $homeSettings = HomePageSettings::all();

        foreach($homeSettings as $item){
            $array = json_decode($item->value, true);
            $collection = collect($array);
            if($collection->contains('child_category', $childCategory->id)){
                return response(['status' => 'error', 'message' => 'Kategoria posiada jest połączony z produktem']);
            }
        }
       
        $childCategory->delete();

        return response(['status' => 'success', 'message' =>'Usunięto pod pod kategorie']);
    }
    public function changeStatus(Request $request)
    {
        $childCategory = childCategory::findOrFail($request->id);
        $childCategory -> status = $request -> status == 'true' ? 1 : 0;
        $childCategory -> save();

        return response(['message' =>'Zaktualizowano status']);
    }


    public function getSubCategory(Request $request)
    {
        $subCategories =SubCategory::where('category_id', $request->id)->where('status',1)->get();   
        return $subCategories;
    }

    public function moveUp($id)
    {
        $childCategory = childCategory::find($id);
        if ($childCategory->sort==null) {
            
            $childCategory->sort = $childCategory->id;
            $childCategory->save();
        }
        if ($childCategory) {
            $childCategory->decrement('sort');
        }
        
        return redirect()->back();
    }

    public function moveDown($id)
    {
        $childCategory = childCategory::find($id);
        if ($childCategory->sort==null) {
            $childCategory->sort = $childCategory->id;
            $childCategory->save();
        }
        if ($childCategory) {
            $childCategory->increment('sort');
        }
        return redirect()->back();
    }
}
