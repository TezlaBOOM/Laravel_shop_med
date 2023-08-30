@php
    $address = json_decode($order->order_address);
    $shipping = json_decode($order->shpping_method);
    $coupon = json_decode($order->coupon);

@endphp
@extends('vendor.layouts.master')
@section('title')
{{$settings->site_name}} || Zamówienie
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
                                                        <h6>{{$order->user->username}}<br></h6>
                                                        <p>Nazwa:{{$order->user->name}}<br></p>
                                                        <p>NIP:{{$order->user->nip}}<br></p>
                                                        <p>Email:{{$order->user->email}}<br></p>
                                                        <p>Tel.{{$order->user->phone}}</p>
                                                      </address>
                                                  </div>
                                              </div>
                                              <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                                  <div class="wsus__invoice_single text-md-center">
                                                    <address>
                                                      <h5>Adres dostawy</h5><br>
                                                      <h6>{{$address->name}}<br></h6>
                                                      <p>{{$address->street}}<br></p>
                                                      <p>{{$address->zipCode}} {{$address->city}}<br></p>
                                                      <p>Tel.{{$address->phone}}<br></p>
                                                      <p>Kraj:{{$address->country}}</p>
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
                                                      @if ($product->vendor_id === Auth::user()->vendor->id)
                                                          @php
                                                              $variants = json_decode($product->variants);
                                                              $total = 0;
                                                              $total += $product->unit_price * $product->qty;
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
                                                                          {{ @$item->price }} {{ $settings->currency_icon }}
                                                                          )</span>
                                                                  @endforeach
                                                              </td>
                                                              <td class="amount">
                                                                  {{ $product->vendor->shop_name }}
                                                              </td>
                                                              <td class="amount">
                                                                @foreach ($variants as $key => $item)
                                                                @if ($key == 'main')
                                                                  @switch($item->backorder)
                                                                      @case(0)
                                                                      @if ($item->storage - $product->qty >0)
                                                                      <b>Dostępne</b>
                                                                      @else
                                                                      <b>Na zamówienie1</b>
                                                                      @endif
                                                                          
                                                                          @break
                                                                      @case(2)
                                                                        <b>Na zamówienie2</b>
                                                                          @break
                                                                      @default
                                                                        <b>Na zamówienie3</b> 
                                                                  @endswitch
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
                                                      @endif
                                                  @endforeach

                                              </table>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="wsus__invoice_footer">

                                      <p><span>Całość:</span> {{ $total }} {{ $settings->currency_icon }}</p>
                                  </div>
                              </div>
                          </div>
                      </section>
                      <!--============================
                      INVOICE PAGE END
                  ==============================-->

                      <div class="row">
                          <div class="col-md-4">
                              <form action="{{ route('vendor.orders.status', $order->id) }}">
                                  <div class="form-group mt-5">
                                      <label for="" class="mb-2">Status zamówienia</label>
                                      <select name="status" id="" class="form-control">
                                          @foreach (config('order_status.order_status_vendor') as $key => $status)
                                              <option {{ $key === $order->order_status ? 'selected' : '' }}
                                                  value="{{ $key }}">{{ $status['status'] }}</option>
                                          @endforeach
                                      </select>
                                      <button class="btn btn-primary mt-3" type="submit">Zapisz</button>
                                  </div>
                              </form>
                          </div>
                          <div class="col-md-8">
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

