<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Backorder;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\HistoryPrice;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Models\ProductVariant;
use App\Models\SubCategory;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class ProductController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $backorders = Backorder::all();
        return view('admin.product.create', compact('categories','brands','backorders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'image' =>['required','image','max:300'],
            'name' =>['required','max:200'],
            'category' =>['required'],
            'brand' =>['required'],
            'price' =>['required'],
            'vat' =>['required'],
            'qty' =>['required'],
            'backorder'=>['required'],
            'short_description' =>['required','max:600'],
            'seo_description' =>['required'],
            'product_type' =>['required'],
        ]);


        $imagePath = $this->uploadImage($request, 'image', 'uploads');
        //dd($request->sub_category);
        $product = new Product();
        $product->thumb_image = $imagePath;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->vendor_id = Auth::user()->vendor->id;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->child_category_id = $request->child_category;
        $product->brand_id = $request->brand;
        $product->qty = $request->qty;
        $product->vat = $request->vat;
        $product->backorder = $request->backorder;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->video_link = $request->video_link;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->offer_start_date = $request->offer_start_date;
        $product->offer_end_date = $request->offer_end_date;
        $product->product_type = $request->product_type;
        $product->status = $request->status;
        $product->is_approved = 1;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        //dd($request->category);
        $product->save();


        $history = new HistoryPrice();
        $history->product_id=$product->id;
        $history->action="create";
        $history->old_price="";
        $history->new_price=$product->price;
        $history->save();

        toastr('Created Successfully!', 'success');

        return redirect()->route('admin.product.index');


        
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
        $product = Product::findOrFail($id);
        $subCategories = SubCategory::where('category_id', $product->category_id)->get();
        $childCategories = ChildCategory::where('sub_category_id', $product->sub_category_id)->get();
        $categories = Category::all();
        $brands = Brand::all();
        $backorders = Backorder::all();
        return view('admin.product.edit', compact('product', 'categories', 'brands', 'subCategories', 'childCategories','backorders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

            $request->validate([
                'image' => ['nullable', 'image', 'max:3000'],
                'name' => ['required', 'max:200'],
                'category' => ['required'],
                'brand' => ['required'],
                'price' => ['required'],
                'vat' => ['required'],
                'qty' => ['required'],
                'backorder'=>['required'],
                'short_description' => ['required', 'max: 600'],
                'long_description' => ['required'],
                'seo_title' => ['nullable','max:200'],
                'seo_description' => ['nullable'],
                'status' => ['required']
            ]);
    
            

    
            $product = Product::findOrFail($id);

            $val1 = (int) $request->price;
            $val2 = (int) $product->price;
            
            if($val1 !== $val2){
                $history = new HistoryPrice();
                $history->product_id=$product->id;
                $history->action="edit";
                $history->old_price=$product->price;
                $history->new_price=$request->price;
                $history->save();
            }

    
            /** Handle the image upload */
            $imagePath = $this->updateImage($request, 'image', 'uploads', $product->thumb_image);
    
            $product->thumb_image = empty(!$imagePath) ? $imagePath : $product->thumb_image;
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->category_id = $request->category;
            $product->sub_category_id = $request->sub_category;
            $product->child_category_id = $request->child_category;
            $product->brand_id = $request->brand;
            $product->qty = $request->qty;
            $product->vat = $request->vat;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->video_link = $request->video_link;
            $product->sku = $request->sku;
            $product->price = $request->price;
            $product->backorder = $request->backorder;
            $product->offer_price = $request->offer_price;
            $product->offer_start_date = $request->offer_start_date;
            $product->offer_end_date = $request->offer_end_date;
            $product->product_type = $request->product_type;
            $product->status = $request->status;
            $product->seo_title = $request->seo_title;
            $product->seo_description = $request->seo_description;
            $product->save();

            
    
            toastr('Zaktualizowano', 'success');
    
            return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Product::findOrFail($id);
        if(OrderProduct::where('product_id', $product->id)->count() >0 ){
            return response(['status' => 'error', 'message' =>'Produkt jest w zamówienu']);
        }
        /** Delte the main product image */
        $this->deleteImage($product->thumb_image);

        /** Delete product gallery images */
        $galleryImages = ProductImageGallery::where('product_id', $product->id)->get();
        foreach($galleryImages as $image){
            $this->deleteImage($image->image);
            $image->delete();
        }

        /** Delete product variants if exist */
        $variants = ProductVariant::where('product_id', $product->id)->get();

        foreach($variants as $variant){
            $variant->productVariantItems()->delete();
            $variant->delete();
        }

        $product->delete();

        return response(['status' => 'success', 'message' => 'usunięto']);
    }

        /**
     * Get all product sub categories.
     */
    public function getSubCategories(Request $request)
    {
        $subcategories = SubCategory::where('category_id',$request->id)->get();
        return $subcategories;
    }
    
    public function getChildCategories(Request $request)
    {
        $childcategories = ChildCategory::where('sub_category_id',$request->id)->get();
        return $childcategories;
    }
    public function changeStatus(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product -> status = $request -> status == 'true' ? 1 : 0;
        $product -> save();

        return response(['message' =>'Zaktualizowano status']);
    }

    
}
