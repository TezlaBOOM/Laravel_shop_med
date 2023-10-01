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
        $products = \App\Models\Product::with('reviews')->where('category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
    }elseif(array_keys($lastKey)[0] === 'sub_category'){
        $category = \App\Models\SubCategory::find($lastKey['sub_category']);
        $products = \App\Models\Product::with('reviews')->where('sub_category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();

    }else {
        $category = \App\Models\ChildCategory::find($lastKey['child_category']);
        $products = \App\Models\Product::with('reviews')->where('child_category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();

    }
@endphp
<section id="wsus__electronic">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header">
                    <h3>{{$category->name}}</h3>
                    <a class="see_btn" href="{{route('products.index', ['category'=> $category->slug])}}">Zobacz więcej <i class="fas fa-caret-right"></i></a>
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
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#product-slider-one-{{$product->id}}"><i
                                    class="far fa-eye"></i></a></li>
                        <li><a href="" class="add_to_wishlist" data-id="{{$product->id}}"><i class="far fa-heart"></i></a></li>
                        <li><a href="#"><i class="far fa-random"></i></a>
                    </ul>
                    <div class="wsus__product_details">
                        <a class="wsus__category" href="{{route('product-detail',$product->slug)}}">{{limitText($product->category->name,53)}} </a>
                        <p class="wsus__pro_rating">
                            @php
                            $avgRating = $product->reviews()->avg('rating');
                            $fullRating = round($avgRating);
                            @endphp

                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $fullRating)
                                <i class="fas fa-star"></i>
                                @else
                                <i class="far fa-star"></i>
                                @endif
                            @endfor

                            <span>({{count($product->reviews)}} review)</span>
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
@foreach ($products as $product)
<section class="product_popup_modal">
    <div class="modal fade" id="product-slider-one-{{$product->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="far fa-times"></i></button>
                    <div class="row">
                        <div class="col-xl-6 col-12 col-sm-10 col-md-8 col-lg-6 m-auto display">
                            <div class="wsus__quick_view_img">
                                @if ($product->video_link)
                                    <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                    href="{{$product->video_link}}">
                                    <i class="fas fa-play"></i>
                                    </a>
                                @endif
                                <div class="row modal_slider">
                                    <div class="col-xl-12">
                                        <div class="modal_slider_img">
                                            <img src="{{asset($product->thumb_image)}}" alt="Zdjęcie produktu" class="img-fluid w-100">
                                        </div>
                                    </div>

                                    @if (count($product->productImageGalleries)===0)
                                    <div class="col-xl-12">
                                        <div class="modal_slider_img">
                                            <img src="{{asset($product->thumb_image)}}" alt="Zdjęcie produktu" class="img-fluid w-100">
                                        </div>
                                    </div>  
                                    @endif

                                    @foreach ( $product->productImageGalleries as $ProductImage )
                                        <div class="col-xl-12">
                                            <div class="modal_slider_img">
                                                <img src="{{asset($ProductImage->image)}}" alt="Zdjęcie produktu" class="img-fluid w-100">
                                            </div>
                                        </div>
                                    @endforeach



                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="wsus__pro_details_text">
                                <a class="title" href="#">{{$product->name}}</a>

                                <p class="wsus__pro_rating">
                                    @php
                                    $avgRating = $product->reviews()->avg('rating');
                                    $fullRating = round($avgRating);
                                    @endphp

                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $fullRating)
                                        <i class="fas fa-star"></i>
                                        @else
                                        <i class="far fa-star"></i>
                                        @endif
                                    @endfor

                                    <span>({{count($product->reviews)}} review)</span>
                                </p>

                                
                                @if (checkDiscount($product))
                                <h4>{{$product->offer_price}} {{$settings->currency_icon}}<del>{{$product->price}} {{$settings->currency_icon}}</del></h4>

                            @else
                                <h4>{{$product->price}} {{$settings->currency_icon}}</h4>
                            @endif
                            @switch($product->vat)
                                @case(0)
                                    <h6>0% Vat</h6>
                                @break
                                @case(1)
                                    <h6>5% Vat</h6>
                                @break
                                @case(2)
                                    <h6>8% Vat</h6>
                                @break
                                @case(3)
                                    <h6>23% Vat</h6>
                                @break
                            
                                @default
                                
                            @endswitch

                                <p class="description">{!!$product->short_description!!}</p>

                                    
                                @foreach ($backorders as $backordered)
                                @if ($product->backorder == $backordered->id)
                                    @if ( $product->qty > 0)
                                        <p class="wsus__stock_area">
                                            <span class="in_stock"> Dostępność:</span> <br>
                                            Na magazynie: <b style="color:green"> {{$product->qty}}</b><br>
                                            Zamówienia powyżej <b style="color:orange"> {{$product->qty}}</b>: <u>{{$backordered->name}}</u>
                                        </p>
                                    @else
                                        <p class="wsus__stock_area">
                                            <span class="in_stock"> Dostępność:</span> <br>
                                            Na magazynie: <b style="color:green"> {{$product->qty}}</b><br>
                                            Zamówienia powyżej <b style="color:orange"> {{$product->qty}}</b>: <u>{{$backordered->name}} </u>
                                        </p>
                                    @endif
                                @elseif($product->backorder == 0)
                                    <b>Korekta status</b>
                                @break;
                            @endif
                        @endforeach

                                {{-- @switch($product->backorder)
                                    @case(0)
                                    <p class="wsus__stock_area">
                                       <span class="in_stock"> Dostępność:</span> <br>
                                       Na magazynie: <b style="color:green"> {{$product->qty}}</b><br>
                                       Zamówienia powyżej <b style="color:green"> {{$product->qty}}</b>: <u>Na zamówienie</u>
                                   </p>
   
                                    @break
                                    @case(1)
                                    <p class="wsus__stock_area">
                                       <span class="in_stock"> Dostępność:</span> <br>
                                       Na magazynie: <b style="color:green"> {{$product->qty}}</b><br>
                                       Produkt:<u>Wycofane</u>
                                   </p>
   
                                    @break
                                    @default
                                    <p class="wsus__stock_area">
                                       <span class="in_stock"> Dostępność:</span> <br>
                                       Na magazynie: <b style="color:green"> {{$product->qty}}</b><br>
                                       Zamówienia powyżej <b style="color:green"> {{$product->qty}}</b>: <u>Ustalana indywidualnie </u>
                                   </p>
   
                                @endswitch
                            @elseif($product->qty === 0)
                                    @switch($product->backorder)
                                    @case(0)
                                    <p class="wsus__stock_area"><span class="in_stock">Na zamówienie</span></p>
                                    @break
                                    @case(1)
                                    <p class="wsus__stock_area"><span class="stock_out">Wycofany</span></p>
   
                                    @break
                                    @default
                                    <p class="wsus__stock_area"><span class="in_stock">Ustalana indywidualnie</span></p>
   
                                    @endswitch
                            @endif --}}


                                <form class="shopping-cart-form" method="post">
                                    @csrf
                                    <div class="wsus__selectbox">
                                        <div class="row">
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            @foreach ($product->variants as $variant)
                                            @if ($variant->status != 0)
                                                <div class="col-xl-6 col-sm-6">
                                                    <h5 class="mb-2">{{$variant->name}}: </h5>
                                                    <select class="select_2" name="variants_items[]">
                                                        @foreach ($variant->productVariantItems as $variantItem)
                                                            @if ($variantItem->status != 0)
                                                                <option value="{{$variantItem->id}}" {{$variantItem->is_default == 1 ? 'selected' : ''}}>{{$variantItem->name}} ({{$variantItem->price}} ZŁ)</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif
                                            @endforeach
    
    
    
        
                                        </div>
                                    </div>
                                    <div class="wsus__quentity">
                                        <h5>Ilość :</h5>
                                        <div class="select_number">
                                            <input class="number_area" name="qty" type="text" min="1" max="100" value="1" />
                                        </div>
                                        
                                    </div>
                                    <ul class="wsus__button_area">
                                        <li><button type="submit" class="add_cart" href="#">Dodaj do koszyka</button></li>
                                        <li><a class="buy_now" href="#">Kup teraz</a></li>
                                        <li><a href="" class="add_to_wishlist" data-id="{{$product->id}}"><i class="fal fa-heart"></i></a></li>
                                        <li><a href="#"><i class="far fa-random"></i></a></li>
                                    </ul>
    
                                </form>
                                
                                <p class="brand_model"><span>SKU :</span> {{$product->sku}}</p>
                                <p class="brand_model"><span>Marka :</span> {{$product->brand->name}}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
@endforeach
