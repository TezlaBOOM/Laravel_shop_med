@php
    $address = json_decode($order->order_address);
    $shipping = json_decode($order->shpping_method);
    $coupon = json_decode($order->coupon);
    
@endphp
@extends('vendor.layouts.master')
@section('title')
    {{ $settings->site_name }} || Zamówienie
@endsection
@section('content')
    <!--=============================
        DASHBOARD START
      ==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.siderbar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> Zamówienie</h3>
                        <div class="wsus__dashboard_profile">
                            <!--============================
                                INVOICE PAGE START
                            ==============================-->
                            <section id="" class="invoice-print">
                                <div class="">
                                    <div class="wsus__invoice_area">
                                        <div class="wsus__invoice_header">
                                            <div class="wsus__invoice_content">
                                                <div class="row">
                                                    <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                                        <div class="wsus__invoice_single">

                                                            <address>
                                                                <h5>Dane kontaktowe:</h5><br>
                                                                <h6>{{ $order->user->username }}<br></h6>
                                                                <p>Nazwa:{{ $order->user->name }}<br></p>
                                                                <p>NIP:{{ $order->user->nip }}<br></p>
                                                                <p>Email:{{ $order->user->email }}<br></p>
                                                                <p>Tel.{{ $order->user->phone }}</p>
                                                            </address>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                                        <div class="wsus__invoice_single text-md-center">
                                                            <address>
                                                                <h5>Adres dostawy</h5><br>
                                                                <h6>{{ $address->name }}<br></h6>
                                                                <p>{{ $address->street }}<br></p>
                                                                <p>{{ $address->zipCode }} {{ $address->city }}<br></p>
                                                                <p>Tel.{{ $address->phone }}<br></p>
                                                                <p>Kraj:{{ $address->country }}</p>
                                                            </address>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-4">
                                                        <div class="wsus__invoice_single text-md-end">
                                                            <h5>Zamówienie id: #{{ $order->id }}</h5>
                                                            <h6>Status zamówienia:
                                                                {{ config('order_status.order_status_admin')[$order->order_status]['status'] }}
                                                            </h6>
                                                            <p>Metoda płatności: {{ $order->payment_method }}</p>
                                                            <p>Status płatności: {{ $order->payment_status }}</p>
                                                            <p>Tranzakcja id: {{ $order->transaction->transaction_id }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wsus__invoice_description">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <th class="name">
                                                                Produkt
                                                            </th>
                                                            <th class="amount">
                                                                Sprzedawca
                                                            </th>
                                                            <th class="amount">
                                                                Dostępność
                                                            </th>

                                                            <th class="amount">
                                                                Cena za szt.
                                                            </th>

                                                            <th class="quentity">
                                                                Ilość
                                                            </th>
                                                            <th class="total">
                                                                Suma
                                                            </th>
                                                        </tr>
                                                        @foreach ($order->orderProducts as $product)
                                                            @php
                                                                $variants = json_decode($product->variants);
                                                            @endphp
                                                            <tr>
                                                                <td class="name">
                                                                    <p>{{ $product->product_name }}</p>
                                                                    @foreach ($variants as $key => $item)
                                                                        @if ($key == 'main')
                                                                        @break

                                                                    @endif
                                                                    <span>{{ $key }} :
                                                                        {{ @$item->name }}(
                                                                        {{ @$item->price }}
                                                                        {{ $settings->currency_icon }}
                                                                        )</span>
                                                                @endforeach
                                                            </td>
                                                            <td class="amount">
                                                                {{ $product->vendor->shop_name }}
                                                            </td>
                                                            <td class="amount">
                                                                @foreach ($variants as $key => $item)
                                                                    @if ($key == 'main')
                                                                    @foreach ($backorders as $backordered)
                                                                    
                                                                    @if ($item->backorder == $backordered->id)
                                                                        @if ($item->storage > 0)
                                                                                    <b>Dostępne</b>
                                                                                @else
                                                                                    <b>{{ $backordered->name }}:
                                                                                        brakuje
                                                                                        {{ $item->storage - $product->qty }}
                                                                                        z
                                                                                        {{ $item->storage }} </b>
                                                                                    
                                                                                @endif
                                                                            @elseif($item->backorder == 0)
                                                                                <b>Korekta status</b>
                                                                            @break;
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                </td>


                                                <td class="amount">
                                                    {{ $settings->currency_icon }}
                                                    {{ $product->unit_price }}
                                                </td>

                                                <td class="quentity">
                                                    {{ $product->qty }}
                                                </td>
                                                <td class="total">
                                                    {{ $settings->currency_icon }}
                                                    {{ $product->unit_price * $product->qty }}
                                                </td>
                                                </tr>

                                                @endforeach

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="wsus__invoice_footer">


                                    <p><span>Cena:</span> {{ @$order->sub_total }} {{ @$settings->currency_icon }}
                                    </p>
                                    <p><span>Dostawa:</span>{{ @$shipping->cost }} {{ @$settings->currency_icon }}
                                    </p>
                                    <p><span>Kupon:</span>{{ @$coupon->discount ? $coupon->discount : 0 }}
                                        {{ @$settings->currency_icon }} </p>
                                    <p><span>Całość:</span>{{ @$order->amount }} {{ @$settings->currency_icon }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--============================
                  INVOICE PAGE END
              ==============================-->

                    <div class="row">

                        <div class="col-md-12">
                            <div class="mt-5 float-end">
                                <button class="btn btn-warning print_invoice">Drukuj</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!--=============================
DASHBOARD START
==============================-->
@endsection
@push('scripts')
<script>
    $('.print_invoice').on('click', function() {
        let printBody = $('.invoice-print');
        let originalContents = $('body').html();

        $('body').html(printBody.html());

        window.print();

        $('body').html(originalContents);

    })
</script>
@endpush
