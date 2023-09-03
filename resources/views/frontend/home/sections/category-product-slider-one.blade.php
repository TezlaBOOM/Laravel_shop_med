@php
    $categoryProductSliderSectionOne = json_decode($categoryProductSliderSectionOne->value);
    $lastKey = [];

    foreach($categoryProductSliderSectionOne as $key => $category){
        if($category === null ){
            break;
        }
        $lastKey = [$key => $category];
    }

    if(array_keys($lastKey)[0] === 'category'){
        $category = \App\Models\Category::find($lastKey['category']);
        $products = \App\Models\Product::where('category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
    }elseif(array_keys($lastKey)[0] === 'sub_category'){
        $category = \App\Models\SubCategory::find($lastKey['sub_category']);
        $products = \App\Models\Product::where('sub_category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();

    }else {
        $category = \App\Models\ChildCategory::find($lastKey['child_category']);
        $products = \App\Models\Product::where('child_category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();

    }
@endphp
<section id="wsus__electronic">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header">
                    <h3>{{$category->name}}</h3>
                    <a class="see_btn" href="#">Zobacz więcej <i class="fas fa-caret-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row flash_sell_slider">
            @foreach ($products as $product)
            <div class="col-xl-3 col-sm-6 col-lg-4">
                <div class="wsus__product_item">
                    <span class="wsus__new">{{productType($product->product_type)}}</span>
                    @if (checkDiscount($product) == true)
                    <span class="wsus__minus">-{{calculateDicCountProcent($product->price,$product->offer_price )}}%</span>   
                    @endif
                    
                    <a class="wsus__pro_link" href="{{route('product-detail',$product->slug)}}">
                        <img src="{{asset($product->thumb_image)}}" alt="product" class="img-fluid w-100 img_1" />
                        <img src="
                        @if (isset($product->productImageGalleries[0]->image))
                            {{asset($product->productImageGalleries[0]->image)}}
                        @else
                            {{asset($product->thumb_image)}}
                        @endif
                        
                        " alt="product" class="img-fluid w-100 img_2" />
                    </a>
                    <ul class="wsus__single_pro_icon">
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$product->id}}"><i
                                    class="far fa-eye"></i></a></li>
                        <li><a href="#"><i class="far fa-heart"></i></a></li>
                        <li><a href="#"><i class="far fa-random"></i></a>
                    </ul>
                    <div class="wsus__product_details">
                        <a class="wsus__category" href="{{route('product-detail',$product->slug)}}">{{$product->category->name}} </a>
                        <p class="wsus__pro_rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>(69 review)</span>
                        </p>
                        <a class="wsus__pro_name" href="{{route('product-detail',$product->slug)}}">{{$product->name}}</a>
                            @if(checkDiscount($product))
                                <p class="wsus__price">{{$product->offer_price}} PLN<del>{{$product->price}} PLN</del></p>
                            @else
                            <p class="wsus__price">{{$product->price}} PLN</p>
                            @endif

                            <a class="add_cart" href="{{route('product-detail',$product->slug)}}">Sprawdź</a>

                    </div>
                </div>
            </div>     
            @endforeach

        </div>
    </div>
</section>

