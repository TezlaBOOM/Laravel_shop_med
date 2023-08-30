@php
    $address = json_decode($order->order_address);
    $shipping = json_decode($order->shpping_method);
    $coupon = json_decode($order->coupon);

@endphp
@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Orders</h1>
          </div>

          <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="invoice-title">
                        <h2>Zamówienie {{$order->id}}</h2>
                        <div class="invoice-number"></div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-6">
                          <address>
                            <strong>Dane kontaktowe:</strong><br>
                            {{$order->user->username}}<br>
                            Nazwa:{{$order->user->name}}<br>
                            NIP:{{$order->user->nip}}<br>
                            Email:{{$order->user->email}}<br>
                            Tel.{{$order->user->phone}}
                          </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                          <address>
                            <strong>Adres dostawy:</strong><br>
                            {{$address->name}}<br>
                            {{$address->street}}<br>
                            {{$address->zipCode}} {{$address->city}}<br>
                            Tel.{{$address->phone}}<br>
                            country:{{$address->country}}
                          </address>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <address>
                            <strong>Metoda płatności:</strong><br>
                            <b>Metoda:</b> {{$order->payment_method}}<br>
                            <b>ID tranzakcji:</b> {{@$order->transaction->transaction_id}}<br>
                            <b>Status:</b> {{$order->payment_status===1 ? 'Zatwierdzony' : 'Oczekujący'}}
                          </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                          <address>
                            <strong>Data zamówienia:</strong><br>
                            {{date('h:m:s, d F,Y',strtotime($order->created_at))}}<br><br>
                          </address>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row mt-4">
                    <div class="col-md-12">
                      <div class="section-title">Lista produktów</div>
                      <p class="section-lead"></p>
                      <div class="table-responsive">
                        <table class="table table-striped table-hover table-md">
                          <tr>
                            <th data-width="40">#</th>
                            
                            <th>Nazwa</th>
                            <th class="text-center">Wariant</th>
                            <th class="text-center">Sprzedawca</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Cena szt.</th>
                            <th class="text-center">Ilość</th>
                            <th class="text-right">Całkowita</th>
                          </tr>
                          @foreach ($order->orderProducts as $product)
                          @php
                              $variant = json_decode($product->variants);
                              // dd($variant );
                          @endphp
                              <tr>
                              <td>{{++$loop->index}}</td>
                              
                              @if (isset($product->product->slug))
                              <td><a target="_blank" href="{{route('product-detail', $product->product->slug)}}">{{$product->product_name}}</a></td>
                              @else
                                  <td>{{$product->product_name}}</td>
                              @endif
                              <td>
                                  @foreach ($variant as $key => $variantt)
                                    @if ($key == 'main')
                                    @break
                                    @endif
                                      <b>{{$key}}:</b> {{@$variantt->name}} ( {{@$variantt->price}} {{$settings->currency_icon}})<br>

                                  @endforeach
                            </td>
                            <td class="text-center">{{$product->vendor->shop_name}}</td>
                            <td class="text-center">
                              @foreach ($variant as $key => $variantt)
                                @if ($key == 'main')
                                  @switch($variantt->backorder)
                                      @case(0)
                                      @if ($variantt->storage - $product->qty >0)
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
                            <td class="text-center">{{$product->unit_price}} {{$settings->currency_icon}}</td>
                            <td class="text-center">{{$product->qty}}</td>
                            <td class="text-right">{{($product->unit_price*$product->qty)+($product->variant_total*$product->qty)}} {{$settings->currency_icon}}</td>
                          </tr>
                          @endforeach


                        </table>
                      </div>
                      <div class="row mt-4">
                        <div class="col-lg-8">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="">Metoda płatności</label>
  
                                  <select name="" id="payment_status" class="form-control" data-id="{{$order->id}}">
                                      <option {{$order->payment_status === 0 ? 'selected': ''}} value="0">Oczekująca</option>
                                      <option {{$order->payment_status === 1 ? 'selected': ''}} value="1">Zfinalizowana</option>
                                  </select>
                              </div>
  
                              <div class="form-group">
                                  <label for="">Status zamówienia</label>
                                  <select name="order_status" id="order_status" data-id="{{$order->id}}" class="form-control">
                                      @foreach (config('order_status.order_status_admin') as $key => $orderStatus)
                                          <option {{$order->order_status === $key ? 'selected' : ''}} value="{{$key}}">{{$orderStatus['status']}}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                        </div>
                        <div class="col-lg-4 text-right">
                          <div class="invoice-detail-item">
                            <div class="invoice-detail-name">Cena produktów Brutto</div>
                            <div class="invoice-detail-value">{{$settings->currency_icon}} {{$order->sub_total}}</div>
                          </div>
                          <div class="invoice-detail-item">
                            <div class="invoice-detail-name">Dostawa</div>
                            <div class="invoice-detail-value">{{$settings->currency_icon}} {{@$shipping->cost}}</div>
                          </div>
                          <div class="invoice-detail-item">
                              <div class="invoice-detail-name">Kupon</div>
                              <div class="invoice-detail-value">{{$settings->currency_icon}} {{@$coupon->discount ? @$coupon->discount : 0}}</div>
                            </div>
                          <hr class="mt-2 mb-2">
                          <div class="invoice-detail-item">
                            <div class="invoice-detail-name">Suma</div>
                            <div class="invoice-detail-value invoice-detail-value-lg">{{$settings->currency_icon}} {{$order->amount}}</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="text-md-right">
                  <button class="btn btn-warning btn-icon icon-left print_invoice"><i class="fas fa-print"></i> Drukuj</button>
                </div>
              </div>
          </div>
        </section>

@endsection

@push('scripts')
    <script>
        $(document).ready(function(){

            $('#order_status').on('change', function(){
                let status = $(this).val();
                let id = $(this).data('id');

                $.ajax({
                    method: 'PUT',
                    url: "{{route('admin.order.status')}}",
                    data: {status: status, id:id},
                    success: function(data){
                        if(data.status === 'success'){
                            toastr.success(data.message)
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                })
            })

            $('#payment_status').on('change', function(){
                let status = $(this).val();
                let id = $(this).data('id');

                $.ajax({
                    method: 'GET',
                    url: "{{route('admin.payment.status')}}",
                    data: {status: status, id:id},
                    success: function(data){
                        if(data.status === 'success'){
                            toastr.success(data.message)
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                })
            })

            $('.print_invoice').on('click', function(){
                let printBody = $('.invoice-print');
                let originalContents = $('body').html();

                $('body').html(printBody.html());

                window.print();

                $('body').html(originalContents);

            })
        })
    </script>
@endpush
