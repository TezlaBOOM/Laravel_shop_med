<section id="wsus__flash_sell" class="wsus__flash_sell_2">
    @php
        $today = date("Y-m-d");
    @endphp
@if ($today <= $flashSaleDate->end_date)
    

    <div class=" container">
        <div class="row">
            <div class="col-xl-12">
                <div class="offer_time" style="background: url({{asset('frontend/images/flash_sell_bg.jpg')}})">
                    <div class="wsus__flash_coundown">
                        <span class=" end_text">Wyprzedaż</span>
                        <div class="simply-countdown simply-countdown-one-"></div>
                        <a class="common_btn" href="{{route('flash-sale')}}">Zobacz więcej <i class="fas fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row flash_sell_slider">
            @foreach ($flashSaleItems as $item)
                @php
                $product = \App\Models\Product::find($item->product_id);
                @endphp 
            
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
                        <li><a href="" class="add_to_wishlist" data-id="{{$product->id}}"><i class="far fa-heart"></i></a></li>
                        {{-- <li><a href="#"><i class="far fa-random"></i></a> --}}
                    </ul>
                    <div class="wsus__product_details">
                        <a class="wsus__category" href="{{route('product-detail',$product->slug)}}">{{$product->category->name}} </a>
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
    @endif
</section>

    <!--==========================
      PRODUCT MODAL VIEW START
    ===========================-->
    @foreach ($flashSaleItems as $item)
    @php
        $product = \App\Models\Product::find($item->product_id);
    @endphp 
    <section class="product_popup_modal">
        <div class="modal fade" id="exampleModal-{{$product->id}}" tabindex="-1" aria-hidden="true">
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
                                <h6>{{$product->vat}}% Vat</h6>

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
                                            
                                            <li><a href=""class="add_to_wishlist" data-id="{{$product->id}}"><i class="fal fa-heart"></i></a></li>
                                            {{-- <li><a href="#"><i class="far fa-random"></i></a></li> --}}
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
    <!--==========================
      PRODUCT MODAL VIEW END
    ===========================-->










@push('scripts')
<script>
$(document).ready(function(){
    simplyCountdown('.simply-countdown-one-', {
        year: {{date('Y',strtotime($flashSaleDate->end_date))}},
        month: {{date('m',strtotime($flashSaleDate->end_date))}},
        day: {{date('d',strtotime($flashSaleDate->end_date))}},
    });
});    
</script>


    

@endpush