@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
      <h1>Panel</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="{{ route('admin.orders.index') }}">
              <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                      <i class="fas fa-cart-plus"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Dziesiejsze zamówienia</h4>
                      </div>
                      <div class="card-body">
                          {{ $todaysOrder }}
                      </div>
                  </div>
              </div>
          </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="{{ route('admin.pending-orders') }}">
              <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                      <i class="fas fa-cart-plus"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Dziesiejsze oczekujące zamówienia</h4>
                      </div>
                      <div class="card-body">
                          {{ $todaysPendingOrder }}
                      </div>
                  </div>
              </div>
          </a>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="{{ route('admin.orders.index') }}">
              <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                      <i class="fas fa-cart-plus"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Zamówienia</h4>
                      </div>
                      <div class="card-body">
                          {{ $totalOrders }}
                      </div>
                  </div>
              </div>
          </a>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="{{ route('admin.pending-orders') }}">
              <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                      <i class="fas fa-cart-plus"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Oczekujące zamówienina</h4>
                      </div>
                      <div class="card-body">
                          {{ $totalPendingOrders }}
                      </div>
                  </div>
              </div>
          </a>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="{{ route('admin.canceled-orders') }}">
              <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                      <i class="fas fa-cart-plus"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Anulowane zamówienia</h4>
                      </div>
                      <div class="card-body">
                          {{ $totalCanceledOrders }}
                      </div>
                  </div>
              </div>
          </a>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="{{ route('admin.delivered-orders') }}">
              <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                      <i class="fas fa-cart-plus"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Zrealizowane zamówienia</h4>
                      </div>
                      <div class="card-body">
                          {{ $totalCompleteOrders }}
                      </div>
                  </div>
              </div>
          </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="">
              <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                      <i class="fas fa-money-bill-alt"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Zarobki dzisiejsze</h4>
                      </div>
                      <div class="card-body">
                          {{$settings->currency_icon}}{{ $todaysEarnings }}
                      </div>
                  </div>
              </div>
          </a>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="">
              <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                      <i class="fas fa-money-bill-alt"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Zarobki miesięczne</h4>
                      </div>
                      <div class="card-body">
                          {{$settings->currency_icon}}{{ $monthEarnings }}
                      </div>
                  </div>
              </div>
          </a>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="">
              <div class="card card-statistic-1">
                  <div class="card-icon bg-info">
                      <i class="fas fa-money-bill-alt"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Zarobki roczne</h4>
                      </div>
                      <div class="card-body">
                          {{$settings->currency_icon}}{{ $yearEarnings }}
                      </div>
                  </div>
              </div>
          </a>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="{{route('admin.review.index')}}">
              <div class="card card-statistic-1">
                  <div class="card-icon bg-info">
                      <i class="fas fa-star"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Wszystkie opinie</h4>
                      </div>
                      <div class="card-body">
                          {{ $totalReview }}
                      </div>
                  </div>
              </div>
          </a>
      </div>


      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="{{route('admin.brand.index')}}">
              <div class="card card-statistic-1">
                  <div class="card-icon bg-info">
                      <i class="fas fa-copyright"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Wszystkie marki</h4>
                      </div>
                      <div class="card-body">
                          {{ $totalBrands }}
                      </div>
                  </div>
              </div>
          </a>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="{{route('admin.category.index')}}">
              <div class="card card-statistic-1">
                  <div class="card-icon bg-info">
                      <i class="fas fa-list"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Wszystkie kategorie</h4>
                      </div>
                      <div class="card-body">
                          {{ $totalCategories }}
                      </div>
                  </div>
              </div>
          </a>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
         <a href="{{route('admin.blog.index')}}">
          <div class="card card-statistic-1">
              <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
              </div>
              <div class="card-wrap">
                  <div class="card-header">
                      <h4>Wszystkie blogi</h4>
                  </div>
                  <div class="card-body">
                      {{$totalBlogs}}
                  </div>
              </div>
          </div>
      </a>
      </div>

      
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="{{route('admin.subscribers.index')}}">
           <div class="card card-statistic-1">
               <div class="card-icon bg-warning">
                   <i class="far fa-file"></i>
               </div>
               <div class="card-wrap">
                   <div class="card-header">
                       <h4>Liczba subskrybentów</h4>
                   </div>
                   <div class="card-body">
                       {{$totalSubscriber}}
                   </div>
               </div>
           </div>
       </a>
       </div>

       <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="{{route('admin.vendor-list.index')}}">
           <div class="card card-statistic-1">
               <div class="card-icon bg-warning">
                   <i class="far fa-file"></i>
               </div>
               <div class="card-wrap">
                   <div class="card-header">
                       <h4>Liczba sprzedawców</h4>
                   </div>
                   <div class="card-body">
                       {{$totalVendors}}
                   </div>
               </div>
           </div>
       </a>
       </div>

       <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="{{route('admin.customers.index')}}">
           <div class="card card-statistic-1">
               <div class="card-icon bg-warning">
                   <i class="far fa-file"></i>
               </div>
               <div class="card-wrap">
                   <div class="card-header">
                       <h4>Liczba użytkowników</h4>
                   </div>
                   <div class="card-body">
                       {{$totalUsers}}
                   </div>
               </div>
           </div>
       </a>
       </div>

  </div>


  
  </section>

@endsection