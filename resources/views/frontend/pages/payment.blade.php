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
                            <li><a href="{{url('/')}}">Strona główna</a></li>
                            <li><a href="#">Płatność</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            BREADCRUMB END
        ==============================-->




        



@endsection

