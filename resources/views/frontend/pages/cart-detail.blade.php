@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Koszyk produktów
@endsection

@section('content')

    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>cart View</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">peoduct</a></li>
                            <li><a href="#">cart view</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        CART VIEW PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="wsus__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                           Zdjęcie
                                        </th>

                                        <th class="wsus__pro_name">
                                            Produkt
                                        </th>

                                        <th class="wsus__pro_name">
                                            Stan
                                        </th>

                                        <th class="wsus__pro_select">
                                            Ilość
                                        </th>
                                        <th class="wsus__pro_tk">
                                            Cena 
                                        </th>

                                        <th class="wsus__pro_icon">
                                            <a href="#" class="common_btn clear_cart">Wyczyść</a>
                                        </th>
                                    </tr>
                                    @foreach($cartItems as $item)
                                    <tr class="d-flex">
                                        <td class="wsus__pro_img"><img src="{{asset($item->options->image)}}" alt="product"
                                                class="img-fluid w-100">
                                        </td>

                                        <td class="wsus__pro_name">
                                            <p>{!! $item->name!!}</p>
                                            @foreach ($item->options->variants as $key=>$variant) 
                                            <span>{{$key}}: {{$variant['name']}} ({{$settings->currency_icon.$variant['price']}})</span>
                                            @endforeach          
                                        </td>

                                        <td class="wsus__pro_name">
                                                        @if ($item->qty > 0)
                                                                @switch($item->backorder)
                                                                    @case(0)
                                                                    <p>Na magazynie: <b style="color:green"> {{$item->qty}}</b></p>
                                                                    <span>Pozostałe : <u>Na zamówienie</u></span>
                                                                </p>
                                
                                                                    @break
                                                                    @case(1)

                                                                    Na magazynie: <b style="color:green"> {{$item->qty}}</b>
                                                                    Produkt:<u>Wycofane</u>
                                                                </p>
                                
                                                                    @break
                                                                    @default
                                                                    <p>Na magazynie: <b style="color:green"> {{$item->qty}}</b></p>
                                                                    <span>Pozostałe : <u>Ustalana indywidualnie</u></span>
                                                                </p>
                                
                                                                @endswitch
                                                        @elseif($item->qty === 0)
                                                                @switch($item->backorder)
                                                                    @case(0)
                                                                    <p class="wsus__stock_area"><span class="in_stock">Na zamówienie</span></p>
                                                                    @break
                                                                    @case(1)
                                                                    <p class="wsus__stock_area"><span class="stock_out">Wycofany</span></p>
                                
                                                                    @break
                                                                    @default
                                                                    <p class="wsus__stock_area"><span class="in_stock">Ustalana indywidualnie</span></p>
                                
                                                                @endswitch
                                                        @endif
                                        </td>

                                        <td class="wsus__pro_select">
                                            <div class="product_qty_wrapper">
                                                <button class="btn btn-danger product-decrement">-</button>
                                                <input class="product-qty" data-rowid="{{$item->rowId}}" type="text" min="1" max="100" value="{{$item->qty}}" readonly />
                                                <button class="btn btn-success product-increment">+</button>
                                            </div>
                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6 id="{{$item->rowId}}">{{($item->price+ $item->options->variantTotalAmount)*$item->qty}} {{$settings->currency_icon  }}</h6>
                                        </td>


                                        <td class="wsus__pro_icon">
                                            <a href="{{route('cart.remove-product', $item->rowId)}}"><i class="far fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    @if (count($cartItems) === 0)
                                        <tr class="d-flex" >
                                            <td class="wsus__pro_icon" rowspan="2" style="width:100%">
                                                Koszyk jest pusty.
                                            </td>
                                        </tr>

                                    @endif
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="wsus__cart_list_footer_button" id="sticky_sidebar">
                        <h6>Podsumowanie:</h6>
                        <p>Produkty: <span id="sub_total">{{getCartTotal()}} {{$settings->currency_icon}}</span></p>
                        <p>Dostawa: <span>{{$settings->currency_icon}}</span></p>
                        <p>Rabat: <span>{{$settings->currency_icon}}</span></p>
                        <p class="total"><span>Suma:</span> <span>{{$settings->currency_icon}}</span></p>

                        <form>
                            <input type="text" placeholder="Coupon Code">
                            <button type="submit" class="common_btn">apply</button>
                        </form>
                        <a class="common_btn mt-4 w-100 text-center" href="check_out.html">checkout</a>
                        <a class="common_btn mt-1 w-100 text-center" href="product_grid_view.html"><i
                                class="fab fa-shopify"></i> go shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="wsus__single_banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content">
                        <div class="wsus__single_banner_img">
                            <img src="images/single_banner_2.jpg" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>sell on <span>35% off</span></h6>
                            <h3>smart watch</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content single_banner_2">
                        <div class="wsus__single_banner_img">
                            <img src="images/single_banner_3.jpg" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>New Collection</h6>
                            <h3>Cosmetics</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
          CART VIEW PAGE END
    ==============================-->



@endsection

