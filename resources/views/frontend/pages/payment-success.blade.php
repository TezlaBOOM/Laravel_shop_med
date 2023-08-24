@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Płatność
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
                        <h4>Płatność</h4>
                        <ul>
                            <li><a href="{{route('home')}}">Strona główna</a></li>
                            <li><a href="javascript:;">Płatność</a></li>
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
        PAYMENT PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="wsus__pay_info_area">
                <div class="row">
                    <h1>Tranzakcja zakończona sukcesem</h1>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        PAYMENT PAGE END
    ==============================-->




        



@endsection

