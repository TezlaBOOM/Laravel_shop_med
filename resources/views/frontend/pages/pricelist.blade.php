@extends('frontend.layouts.master')

@section('title')
    {{ $settings->site_name }} || Pricelist
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
                        <h4>Cennik</h4>
                        <ul>
                            <li><a href="{{ url('/') }}">Strona główan</a></li>
                            <li><a href="javascript:;">Cennik</a></li>
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
                BLOGS PAGE START
            ==============================-->
    <section id="wsus__blogs">
        <div class="container">
            {{-- @if (request()->has('search'))
           <h5>Szukaj: {{request()->search}}</h5>
           @endif --}}
            <div class="row">

                <div class="col-xl-12">
                    <table class="table ">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">Kategoria</th>
                                <th scope="col">Nazwa</th>
                                <th scope="col">SKU</th>
                                <th scope="col">Cena Netto</th>
                                <th scope="col">Cena Brutto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr class="table-gray">
                                    <td class="table-active" colspan="5"><a href="{{route('products.index',['category'=>$category->slug])}}">{{$category->name}}</a></td>
                                    {{-- <td ></td> --}}
                                </tr>

                                @foreach ($products as $product)
                                
                                @if($product->category_id == $category->id)
                                    <tr >
                                        <td></td>
                                        <td><a href="{{ route('product-detail', $product->slug) }}">{{ $product->name }}</a>
                                        </td>
                                        <td><a href="{{ route('product-detail', $product->slug) }}">{{ $product->sku }}</td>
                                        <td></td>
                                        <td>{{ $product->price }}</td>
                                    </tr>
                                @endif
                                @endforeach
                            @endforeach


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
    <!--============================
                BLOGS PAGE END
            ==============================-->
@endsection
