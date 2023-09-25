<div class="dashboard_sidebar">
    <span class="close_icon">
      <i class="far fa-bars dash_bar"></i>
      <i class="far fa-times dash_close"></i>
    </span>
    <a href="{{route('vendor.dashboard')}}" class="dash_logo"><img src="{{asset($logoSetting->logo)}}" alt="logo" class="img-fluid"></a>
    <ul class="dashboard_link">
      <li><a  href="{{url('/')}}"><i class="fas fa-home"></i>Strona główna</a></li>
      @if (auth()->user()->role === 'user')
      <li><a class="{{setActive(['user.dashboard'])}}" href="{{route('user.dashboard')}}"><i class="fas fa-tachometer"></i>Panel Sprzedaawcy</a></li>
      @endif
      <li><a class="{{setActive(['vendor.dashboard'])}}" href="{{route('vendor.dashboard')}}"><i class="fas fa-tachometer"></i>Dashboard</a></li>
      <li><a class="{{setActive(['vendor.orders.index'])}}" href="{{route('vendor.orders.index')}}"><i class="fas fa-box"></i> Zamówienia</a></li>
      <li><a class="{{setActive(['vendor.review.index'])}}" href="{{route('vendor.review.index')}}"><i class="fas fa-star"></i> Opinie</a></li>
      <li><a class="{{setActive(['vendor.product.index'])}}" href="{{route('vendor.product.index')}}"><i class="fa-cart-plus"></i> Produkty</a></li>
      <li><a class="{{setActive(['vendor.shop-profile.index'])}}" href="{{route('vendor.shop-profile.index')}}"><i class="far fa-user"></i> Profil sprzedawcy</a></li>
      <li><a class="{{setActive(['vendor.profile'])}}" href="{{route('vendor.profile')}}"><i class="far fa-user"></i> Profil</a></li><li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="route('logout')" onclick="event.preventDefault();
                this.closest('form').submit();">
                <i class="far fa-sign-out-alt"></i> Log out</a>
      </li>

    </form>
    </ul>
  </div>