@extends('frontend.layouts.master')

@section('title')
    {{ $settings->site_name }} || Śledzieni zamówienia
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
                        <h4>Śledzenie zamówienia</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">Stona głowna</a></li>
                            <li><a href="javascript:;">Śledzenie zamówienia</a></li>
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
            TRACKING ORDER START
        ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="wsus__track_area">
                <div class="row">
                    <div class="col-xl-5 col-md-10 col-lg-8 m-auto">

                        <form class="tack_form" action="{{ route('product-traking.index') }}" method="GET">

                            <h4 class="text-center">Śledzenie zamówienia</h4>
                            <p class="text-center">Sprawdź gdzie jest twoje zamówienie</p>
                            <div class="wsus__track_input">
                                <label class="d-block mb-2">invoice id*</label>
                                <input type="text" placeholder="" name="tracker" value="{{ @$order->invocie_id }}">
                            </div>
                            <button type="submit" class="common_btn">Śledź</button>
                        </form>
                    </div>
                </div>
                @if (isset($order))
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="wsus__track_header">
                                <div class="wsus__track_header_text">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-lg-3">
                                            <div class="wsus__track_header_single">
                                                <h5>Data zamówieniea </h5>
                                                <p>{{ date('d M Y', strtotime(@$order->created_at)) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-lg-3">
                                            <div class="wsus__track_header_single">
                                                <h5>Kupione przez:</h5>
                                                <p>{{ @$order->user->name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-lg-3">
                                            <div class="wsus__track_header_single">
                                                <h5>status:</h5>
                                                @if (@$order->order_status == 'canceled')
                                                    <p>Anuloanie</p>
                                                @else
                                                @if (@$order->order_status == 'pending')
                                                <p>Oczekujące</p>
                                                @endif
                                                    @if (
                                                        @$order->order_status == 'processed_and_ready_to_ship' ||
                                                            @$order->order_status == 'dropped_off' ||
                                                            @$order->order_status == 'shipped' )
                                                        <p>Przygotowywanie</p>
                                                        @endif

                                                        @if (@$order->order_status == 'out_for_delivery')
                                                        <p>W drodze</p>
                                                        @endif
                                                        

                                                        @if (@$order->order_status == 'delivered')
                                                        <p>Dostarczone</p>
                                                        @endif
                                                        
                                                    @endif

                                                    
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-lg-3">
                                            <div class="wsus__track_header_single border_none">
                                                <h5>ID śledzenia:</h5>
                                                <p>{{ @$order->invocie_id }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <ul class="progtrckr" data-progtrckr-steps="4">

                                <li class="progtrckr_done icon_one check_mark">Oczekujące</li>

                                @if (@$order->order_status == 'canceled')
                                    <li class="icon_four red_mark">Anuloanie</li>
                                @else
                                    <li
                                        class="progtrckr_done icon_two
                            @if (
                                @$order->order_status == 'processed_and_ready_to_ship' ||
                                    @$order->order_status == 'dropped_off' ||
                                    @$order->order_status == 'shipped' ||
                                    @$order->order_status == 'out_for_delivery' ||
                                    @$order->order_status == 'delivered') check_mark @endif">
                                        Przygotowywanie</li>
                                    <li
                                        class="icon_three
                            @if (@$order->order_status == 'out_for_delivery' || @$order->order_status == 'delivered') check_mark @endif
                            ">
                                        W drodze</li>
                                    <li
                                        class="icon_four
                            @if (@$order->order_status == 'delivered') check_mark @endif
                            ">
                                        Dostarczone</li>
                                @endif

                            </ul>
                        </div>
                        <div class="col-xl-12">
                            <a href="{{ url('/') }}" class="common_btn"><i class="fas fa-chevron-left"></i> Powrót do strony głownej</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!--============================
            TRACKING ORDER END
        ==============================-->
@endsection
