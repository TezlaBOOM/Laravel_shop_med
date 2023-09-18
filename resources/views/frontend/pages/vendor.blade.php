@extends('frontend.layouts.master')

@section('title')
    {{ $settings->site_name }} || Sprzedawcy
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
                        <h4>Sprzedawcy</h4>
                        <ul>
                            <li><a href="{{ url('/') }}">Stona główna</a></li>
                            <li><a href="javascript:;">Sprzedawcy</a></li>
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
          VENDORS START
        ==============================-->
    <section id="wsus__product_page" class="wsus__vendors">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-8">
                    <div class="row">
                        @foreach ($vendors as $vendor)
                            <div class="col-xl-6 col-md-6">
                                <div class="wsus__vendor_single">
                                    <img src="{{ asset($vendor->banner) }}" alt="vendor" class="img-fluid w-100">
                                    <div class="wsus__vendor_text">
                                        <div class="wsus__vendor_text_center">
                                            <h4>{{ $vendor->shop_name }}</h4>

                                            <a href=""><i class="far fa-phone-alt"></i>
                                                {{ $vendor->phone }}</a>
                                            <a href=""><i class="fa fa-building"></i>
                                                {{ $vendor->nip }}</a>
                                            <a href=""><i class="fal fa-envelope"></i>
                                                {{ $vendor->email }}</a>
                                            <a href="{{route('vendorPage.products', $vendor->id)}}" class="common_btn">Sklep</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
                <div class="col-xl-12">
                    <section id="pagination">
                        @if ($flashSaleItems->hasPages())
                            {{ $flashSaleItems->links() }}
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!--============================
           VENDORS END
        ==============================-->
@endsection