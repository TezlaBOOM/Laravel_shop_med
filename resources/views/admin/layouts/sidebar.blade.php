
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown active">
          <a href="{{route('admin.dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>

        </li>
        <li class="menu-header">Starter</li>

        <li class="dropdown {{ setActive([
          'admin.category.*',
          'admin.sub-category.*',
          'admin.child-category.*'

        ])}}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Zarządzanie Kategoriami</span></a>
          <ul class="dropdown-menu">
            <li class="{{setActive(['admin.category.*'])}}"><a class="nav-link" href="{{route('admin.category.index')}}">Kategorie</a></li>
            <li class="{{setActive(['admin.sub-category.*'])}}"><a class="nav-link" href="{{route('admin.sub-category.index')}}">Pod Kategorie</a></li>
            <li class="{{setActive(['admin.child-category.*'])}}"><a class="nav-link" href="{{route('admin.child-category.index')}}">Pod pod Kategorie</a></li>
          </ul>
        </li>

        <li class="dropdown {{ setActive([
          'admin.orders.*',
          'admin.pending-orders',
          'admin.processed-orders',
          'admin.shipped-orders',
          'admin.out-for-delivery-orders',
          'admin.delivered-orders',
          'admin.canceled-orders'


        ])}}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Sprzedaż</span></a>
          <ul class="dropdown-menu">
            <li class="{{setActive(['admin.orders.*'])}}"><a class="nav-link" href="{{route('admin.orders.index')}}">Zamówienia</a></li>
            <li class="{{setActive(['admin.pending-orders'])}}"><a class="nav-link" href="{{route('admin.pending-orders')}}">Oczekujące</a></li>
            <li class="{{setActive(['admin.processed-orders'])}}"><a class="nav-link" href="{{route('admin.processed-orders')}}">Obrobione</a></li>
            <li class="{{setActive(['admin.dropped-off-orders'])}}"><a class="nav-link" href="{{route('admin.dropped-off-orders')}}">Odrzucone</a></li>
            <li class="{{setActive(['admin.shipped-orders'])}}"><a class="nav-link" href="{{route('admin.shipped-orders')}}">Wysłane</a></li>
            <li class="{{setActive(['admin.out-for-delivery-orders'])}}"><a class="nav-link" href="{{route('admin.out-for-delivery-orders')}}">W drodze</a></li>
            <li class="{{setActive(['admin.delivered-orders'])}}"><a class="nav-link" href="{{route('admin.delivered-orders')}}">Dostarczone</a></li>
            <li class="{{setActive(['admin.canceled-orders'])}}"><a class="nav-link" href="{{route('admin.canceled-orders')}}">Anulowane</a></li>
          </ul>
        </li>

        <li><a class="{{setActive(['admin.transaction'])}}" href="{{route('admin.transaction')}}"><i class="far fa-square"></i> <span>Transadcje</span></a></li>


        <li class="dropdown {{setActive([
          'admin.brand.*',
          'admin.product.*',
          'admin.product-image-gallery.*',
          'admin.product-variant.*',
          'admin.product-variant-item.*',
          'admin.seller-product.*',
          'admin.seller-pending-product.*'
        ])}}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Menadrzer produktów</span></a>
          <ul class="dropdown-menu">
            <li class="{{setActive(['admin.brand.*'])}}"><a class="nav-link" href="{{route('admin.brand.index')}}">Marki</a></li>
            <li class="{{setActive([
              'admin.product.*',
              'admin.product-image-gallery.*',
              'admin.product-variant.*',
              'admin.product-variant-item.*'
              ])}}"><a class="nav-link" href="{{route('admin.product.index')}}">Produkty </a></li>
            <li class="{{setActive(['admin.seller-product.*'])}}"><a class="nav-link" href="{{route('admin.seller-product.index')}}">Produkty Sprdzeawców</a></li>
            <li class="{{setActive(['admin.seller-pending-product.*'])}}"><a class="nav-link" href="{{route('admin.seller-pending-product.index')}}">Produkty oczekujące</a></li>

          </ul>
        </li>

        <li class="dropdown {{setActive([
          'admin.vendor-profile.*',
          'admin.flash-sale.*',
          'admin.coupons.*',
          'admin.shipping-rule.*',
          'admin.payment-setting.*'
          
        ])}}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>E-Commmers</span></a>
          <ul class="dropdown-menu">
            <li class="{{setActive(['admin.vendor-profile.*'])}}"><a class="nav-link" href="{{route('admin.vendor-profile.index')}}">Sprzedawcy</a></li>
            <li class="{{setActive(['admin.flash-sale.*'])}}"><a class="nav-link" href="{{route('admin.flash-sale.index')}}">Wyprzedarże</a></li>
            <li class="{{setActive(['admin.coupons.*'])}}"><a class="nav-link" href="{{route('admin.coupons.index')}}">Kupony</a></li>
            <li class="{{setActive(['admin.shipping-rule.*'])}}"><a class="nav-link" href="{{route('admin.shipping-rule.index')}}">Zasady dostawy</a></li>
            <li class="{{setActive(['admin.payment-setting.*'])}}"><a class="nav-link" href="{{route('admin.payment-setting.index')}}">Metody płatności</a></li>

          </ul>
        </li>

        <li class="dropdown {{setActive([
          'admin.slider.*',
          'admin.home-page-setting.*'
        ])}}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Zarządzanie Stroną</span></a>
          <ul class="dropdown-menu">
            <li class="{{setActive(['admin.slider.*'])}}"><a class="nav-link" href="{{route('admin.slider.index')}}">Slider</a></li>
            <li class="{{setActive(['admin.home-page-setting.*'])}}"><a class="nav-link" href="{{route('admin.home-page-setting')}}">Ustawienia strony głównej</a></li>

          </ul>
        </li>

        <li><a class="nav-link" href="{{route('admin.settings.index')}}"><i class="far fa-square"></i> <span>Ustawienia</span></a></li>


        {{-- <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
            <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
          </ul>
        </li> --}}
        {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}
 

      </aside>
  </div>
