@extends('frontend.layouts.master')

@section('title')
    {{ $settings->site_name }} || List zakupowa
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
                        <h4>wishlist</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">peoduct</a></li>
                            <li><a href="#">wishlist</a></li>
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
                <div class="col-12">
                    <div class="wsus__cart_list wishlist">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                           Zdjęcie
                                        </th>

                                        <th class="wsus__pro_name" style="width:500px">
                                            Nazwa
                                        </th>

                                        <th class="wsus__pro_status">
                                            Dostępność
                                        </th>



                                        <th class="wsus__pro_tk"  style="width:236px">
                                            Cena
                                        </th>

                                        <th class="wsus__pro_icon">
                                            Akcja
                                        </th>
                                    </tr>
                                    @foreach ($wishlistProducts as $item)
                                        <tr class="d-flex">
                                            <td class="wsus__pro_img"><img src="{{ asset($item->product->thumb_image) }}"
                                                    alt="product" class="img-fluid w-100">
                                                <a href="{{ route('user.wishlist.destory', $item->id) }}"><i
                                                        class="far fa-times"></i></a>
                                            </td>

                                            <td class="wsus__pro_name" style="width:500px">
                                                <p>{{ $item->product->name }}</p>
                                            </td>

                                            <td class="wsus__pro_status">
                                                @if ($item->product->qty > 0)
                                                    @switch($item->product->backorder)
                                                        @case(0)
                                                            <p>Na magazynie: <b style="color:green"> {{ $item->product->qty }}</b>
                                                                <br> Pozostałe : <u>Na zamówienie</u><</p>

                                                            @break

                                                            @case(1)
                                                                Na magazynie: <b style="color:green">{{ $item->product->qty }} </b>
                                                                Produkt:<u>Wycofane</u>
                                                                </p>
                                                            @break

                                                            @default
                                                            <p>Na magazynie: <b style="color:green"> {{ $item->product->qty }}</b>
                                                                <br> Pozostałe : <u>Ustalenia indiwidualne</u><</p>
                                                                </p>
                                                        @endswitch
                                                    @elseif ($item->product->qty === 0)
                                                        @switch($item->options->variants['main']['backorder'])
                                                            @case(0)
                                                                <p class="wsus__stock_area"><span class="in_stock">Na
                                                                        zamówienie</span></p>
                                                            @break

                                                            @case(1)
                                                                <p class="wsus__stock_area"><span class="stock_out">Wycofany</span>
                                                                </p>
                                                            @break

                                                            @default
                                                                <p class="wsus__stock_area"><span class="in_stock">Ustalana
                                                                        indywidualnie</span></p>
                                                        @endswitch
                                                @endif
                                            </td>

                                            <td class="wsus__pro_tk" style="width:236px">
                                                <h6>
                                                    {{ $settings->currency_icon }}{{ $item->product->price }}
                                                </h6>
                                            </td>

                                            <td class="wsus__pro_icon">
                                                <a class="common_btn"
                                                    href="{{ route('product-detail', $item->product->slug) }}">Zobacz produkt
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
