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
                <div class="col-xl-3 col-sm-6 col-lg-4 {{$key}}">
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
                @endforeach


            </div>
        </div>

        <section id="wsus__single_banner" class="home_2_single_banner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="wsus__single_banner_content banner_1">
                            <div class="wsus__single_banner_img">
                                <img src="images/single_banner_44.jpg" alt="banner" class="img-fluid w-100">
                            </div>
                            <div class="wsus__single_banner_text">
                                <h6>sell on <span>35% off</span></h6>
                                <h3>smart watch</h3>
                                <a class="shop_btn" href="#">shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="wsus__single_banner_content single_banner_2">
                                    <div class="wsus__single_banner_img">
                                        <img src="images/single_banner_55.jpg" alt="banner" class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__single_banner_text">
                                        <h6>New Collection</h6>
                                        <h3>kid's fashion</h3>
                                        <a class="shop_btn" href="#">shop now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-lg-4">
                                <div class="wsus__single_banner_content">
                                    <div class="wsus__single_banner_img">
                                        <img src="images/single_banner_66.jpg" alt="banner" class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__single_banner_text">
                                        <h6>sell on <span>42% off</span></h6>
                                        <h3>winter collection</h3>
                                        <a class="shop_btn" href="#">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
</section>