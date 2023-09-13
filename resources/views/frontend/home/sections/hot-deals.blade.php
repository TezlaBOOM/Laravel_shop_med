<section id="wsus__hot_deals" class="wsus__hot_deals_2">
    <div class="container">

        <div class="wsus__hot_large_item">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__section_header justify-content-start">
                        <div class="monthly_top_filter2 mb-1">
                            <button class="active auto_click" data-filter=".new_arrival">Nowość</button>
                            <button data-filter=".featured_product">Wyróżniony</button>
                            <button data-filter=".top_product">Top produkt</button>
                            <button data-filter=".best_product">Best Sellet</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row grid2">
                @foreach ($typeBaseProducts as $key => $products)
                    @foreach ($products as $product)
                        <div class="col-xl-3 col-sm-6 col-lg-4 {{ $key }}">
                            <div class="wsus__product_item">
                                <span class="wsus__new">{{ productType($product->product_type) }}</span>
                                @if (checkDiscount($product) == true)
                                    <span
                                        class="wsus__minus">-{{ calculateDicCountProcent($product->price, $product->offer_price) }}%</span>
                                @endif

                                <a class="wsus__pro_link" href="{{ route('product-detail', $product->slug) }}">
                                    <img src="{{ asset($product->thumb_image) }}" alt="product"
                                        class="img-fluid w-100 img_1" />
                                    <img src="
                            @if (isset($product->productImageGalleries[0]->image)) {{ asset($product->productImageGalleries[0]->image) }}
                            @else
                                {{ asset($product->thumb_image) }} @endif
                            
                            "
                                        alt="product" class="img-fluid w-100 img_2" />
                                </a>
                                <ul class="wsus__single_pro_icon">
                                    <li><a href="#" data-bs-toggle="modal"
                                            data-bs-target="#product-type-{{ $product->id }}"><i
                                                class="far fa-eye"></i></a></li>
                                    <li><a href="" class="add_to_wishlist" data-id="{{ $product->id }}"><i
                                                class="far fa-heart"></i></a></li>
                                    <li><a href="#"><i class="far fa-random"></i></a>
                                </ul>
                                <div class="wsus__product_details">
                                    <a class="wsus__category"
                                        href="{{ route('product-detail', $product->slug) }}">{{ $product->category->name }}
                                    </a>
                                    <p class="wsus__pro_rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(69 review)</span>
                                    </p>
                                    <a class="wsus__pro_name"
                                        href="{{ route('product-detail', $product->slug) }}">{{ $product->name }}</a>
                                    @if (checkDiscount($product))
                                        <p class="wsus__price">{{ $product->offer_price }}
                                            PLN<del>{{ $product->price }} PLN</del></p>
                                    @else
                                        <p class="wsus__price">{{ $product->price }} PLN</p>
                                    @endif

                                    <a class="add_cart" href="{{ route('product-detail', $product->slug) }}">Sprawdź</a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach


            </div>
        </div>
        <section id="wsus__single_banner" class="home_2_single_banner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        @if ($homepage_secion_banner_three->banner_one->status == 1)
                            <div class="wsus__single_banner_content banner_1">
                                <a href="{{ $homepage_secion_banner_three->banner_one->banner_url }}">
                                    <img class="img-gluid"
                                        src="{{ asset($homepage_secion_banner_three->banner_one->banner_image) }}"
                                        alt="">
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                @if ($homepage_secion_banner_three->banner_two->status == 1)
                                    <div class="wsus__single_banner_content single_banner_2">
                                        <a href="{{ $homepage_secion_banner_three->banner_two->banner_url }}">
                                            <img class="img-gluid"
                                                src="{{ asset($homepage_secion_banner_three->banner_two->banner_image) }}"
                                                alt="">
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 mt-lg-4">
                                <div class="wsus__single_banner_content">
                                    @if ($homepage_secion_banner_three->banner_three->status == 1)
                                        <a href="{{ $homepage_secion_banner_three->banner_three->banner_url }}">
                                            <img class="img-gluid"
                                                src="{{ asset($homepage_secion_banner_three->banner_three->banner_image) }}"
                                                alt="">
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>







    </div>
</section>

@foreach ($typeBaseProducts as $key => $products)
    @foreach ($products as $product)
        <section class="product_popup_modal">
            <div class="modal fade" id="product-type-{{ $product->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="far fa-times"></i></button>
                            <div class="row">
                                <div class="col-xl-6 col-12 col-sm-10 col-md-8 col-lg-6 m-auto display">
                                    <div class="wsus__quick_view_img">
                                        @if ($product->video_link)
                                            <a class="venobox wsus__pro_det_video" data-autoplay="true"
                                                data-vbtype="video" href="{{ $product->video_link }}">
                                                <i class="fas fa-play"></i>
                                            </a>
                                        @endif
                                        <div class="row modal_slider">
                                            <div class="col-xl-12">
                                                <div class="modal_slider_img">
                                                    <img src="{{ asset($product->thumb_image) }}"
                                                        alt="Zdjęcie produktu" class="img-fluid w-100">
                                                </div>
                                            </div>

                                            @if (count($product->productImageGalleries) === 0)
                                                <div class="col-xl-12">
                                                    <div class="modal_slider_img">
                                                        <img src="{{ asset($product->thumb_image) }}"
                                                            alt="Zdjęcie produktu" class="img-fluid w-100">
                                                    </div>
                                                </div>
                                            @endif

                                            @foreach ($product->productImageGalleries as $ProductImage)
                                                <div class="col-xl-12">
                                                    <div class="modal_slider_img">
                                                        <img src="{{ asset($ProductImage->image) }}"
                                                            alt="Zdjęcie produktu" class="img-fluid w-100">
                                                    </div>
                                                </div>
                                            @endforeach



                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12 col-sm-12 col-md-12 col-lg-6">
                                    <div class="wsus__pro_details_text">
                                        <a class="title" href="#">{{ $product->name }}</a>

                                        <p class="review">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span>20 review</span>
                                        </p>


                                        @if (checkDiscount($product))
                                            <h4>{{ $product->offer_price }}
                                                {{ $settings->currency_icon }}<del>{{ $product->price }}
                                                    {{ $settings->currency_icon }}</del></h4>
                                        @else
                                            <h4>{{ $product->price }} {{ $settings->currency_icon }}</h4>
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

                                        <p class="description">{!! $product->short_description !!}</p>

                                        @if ($product->qty > 0)
                                            @switch($product->backorder)
                                                @case(0)
                                                    <p class="wsus__stock_area">
                                                        <span class="in_stock"> Dostępność:</span> <br>
                                                        Na magazynie: <b style="color:green"> {{ $product->qty }}</b><br>
                                                        Zamówienia powyżej <b style="color:green"> {{ $product->qty }}</b>:
                                                        <u>Na zamówienie</u>
                                                    </p>
                                                @break

                                                @case(1)
                                                    <p class="wsus__stock_area">
                                                        <span class="in_stock"> Dostępność:</span> <br>
                                                        Na magazynie: <b style="color:green"> {{ $product->qty }}</b><br>
                                                        Produkt:<u>Wycofane</u>
                                                    </p>
                                                @break

                                                @default
                                                    <p class="wsus__stock_area">
                                                        <span class="in_stock"> Dostępność:</span> <br>
                                                        Na magazynie: <b style="color:green"> {{ $product->qty }}</b><br>
                                                        Zamówienia powyżej <b style="color:green"> {{ $product->qty }}</b>:
                                                        <u>Ustalana indywidualnie </u>
                                                    </p>
                                            @endswitch
                                        @elseif($product->qty === 0)
                                            @switch($product->backorder)
                                                @case(0)
                                                    <p class="wsus__stock_area"><span class="in_stock">Na zamówienie</span>
                                                    </p>
                                                @break

                                                @case(1)
                                                    <p class="wsus__stock_area"><span class="stock_out">Wycofany</span></p>
                                                @break

                                                @default
                                                    <p class="wsus__stock_area"><span class="in_stock">Ustalana
                                                            indywidualnie</span></p>
                                            @endswitch
                                        @endif


                                        <form class="shopping-cart-form" method="post">
                                            @csrf
                                            <div class="wsus__selectbox">
                                                <div class="row">
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $product->id }}">
                                                    @foreach ($product->variants as $variant)
                                                        @if ($variant->status != 0)
                                                            <div class="col-xl-6 col-sm-6">
                                                                <h5 class="mb-2">{{ $variant->name }}: </h5>
                                                                <select class="select_2" name="variants_items[]">
                                                                    @foreach ($variant->productVariantItems as $variantItem)
                                                                        @if ($variantItem->status != 0)
                                                                            <option value="{{ $variantItem->id }}"
                                                                                {{ $variantItem->is_default == 1 ? 'selected' : '' }}>
                                                                                {{ $variantItem->name }}
                                                                                ({{ $variantItem->price }} ZŁ)</option>
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
                                                    <input class="number_area" name="qty" type="text"
                                                        min="1" max="100" value="1" />
                                                </div>

                                            </div>
                                            <ul class="wsus__button_area">
                                                <li><button type="submit" class="add_cart" href="#">Dodaj do
                                                        koszyka</button></li>
                                                <li><a class="buy_now" href="#">Kup teraz</a></li>
                                                <li><a href="" class="add_to_wishlist"
                                                        data-id="{{ $product->id }}"><i
                                                            class="fal fa-heart"></i></a></li>
                                                <li><a href="#"><i class="far fa-random"></i></a></li>
                                            </ul>

                                        </form>

                                        <p class="brand_model"><span>SKU :</span> {{ $product->sku }}</p>
                                        <p class="brand_model"><span>Marka :</span> {{ $product->brand->name }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endforeach
