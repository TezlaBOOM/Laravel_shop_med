@extends('vendor.layouts.master')
@section('title')
{{$settings->site_name}} || Panel główny sprzedawcy
@endsection
@section('content')

<section id="wsus__dashboard">
  <div class="container-fluid">
    @include('vendor.layouts.siderbar')
    <div class="row">
      <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
        <div class="dashboard_content">
          <div class="wsus__dashboard">
            <div class="row">
              <div class="col-xl-2 col-6 col-md-4">
                <a class="wsus__dashboard_item red" href="{{route('vendor.orders.index')}}">
                  <i class="fas fa-cart-plus"></i>
                  <p>Dzisiejsze zamówienia</p>
                  <h4 style="color:#ffff">{{$todaysOrder}}</h4>
                </a>
              </div>
              <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="{{route('vendor.orders.index')}}">
                    <i class="fas fa-cart-plus"></i>
                    <p>Dzisiejsze oczekujące zamówienia</p>
                    <h4 style="color:#ffff">{{$todaysPendingOrder}}</h4>
                  </a>
              </div>
              <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="{{route('vendor.orders.index')}}">
                    <i class="fas fa-cart-plus"></i>
                    <p>Wszystkie Zamówienia</p>
                    <h4 style="color:#ffff">{{$totalOrder}}</h4>
                  </a>
              </div>
              <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="{{route('vendor.orders.index')}}">
                    <i class="fas fa-cart-plus"></i>
                    <p>Wszystkie Oczekujące Zamówienia</p>
                    <h4 style="color:#ffff">{{$totalPendingOrder}}</h4>
                  </a>
              </div>
              <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="{{route('vendor.orders.index')}}">
                    <i class="fas fa-cart-plus"></i>
                    <p>Zrealizowane Zamówienia</p>
                    <h4 style="color:#ffff">{{$totalCompleteOrder}}</h4>
                  </a>
              </div>
              <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="{{route('vendor.product.index')}}">
                    <i class="fas fa-cart-plus"></i>
                    <p>Produkty</p>
                    <h4 style="color:#ffff">{{$totalProducts}}</h4>
                  </a>
              </div>
              <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="javascript:;">
                    <i class="fas fa-cart-plus"></i>
                    <p>Dzisiejsze zarobki</p>
                    <h4 style="color:#ffff">{{$todaysEarnings}} {{$settings->currency_icon}}</h4>
                  </a>
              </div>
              <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="javascript:;">
                    <i class="fas fa-cart-plus"></i>
                    <p>Zarobki w tym miesiącu</p>
                    <h4 style="color:#ffff">{{$monthEarnings}} {{$settings->currency_icon}}</h4>
                  </a>
              </div>
              <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="javascript:;">
                    <i class="fas fa-cart-plus"></i>
                    <p>Zarobki w tym roku</p>
                    <h4 style="color:#ffff">{{$yearEarnings}} {{$settings->currency_icon}}</h4>
                  </a>
              </div>

              <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="javascript:;">
                    <i class="fas fa-cart-plus"></i>
                    <p>Suma przychodów</p>
                    <h4 style="color:#ffff">{{$toalEarnings}} {{$settings->currency_icon}}</h4>
                  </a>
              </div>
              <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="{{route('vendor.review.index')}}">
                    <i class="fas fa-cart-plus"></i>
                    <p>Wszystkie recenzje</p>
                    <h4 style="color:#ffff">{{$totalReviews}}</h4>
                  </a>
              </div>
              <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item red" href="{{route('vendor.shop-profile.index')}}">
                    <i class="fas fa-user-shield"></i>
                    <p>Profile sklepu</p>
                    <h4 style="color:#ffff">-</h4>
                  </a>
                </div>

            </div>
        </div>
      </div>
    </div>
  </div>
</section>
  
@endsection