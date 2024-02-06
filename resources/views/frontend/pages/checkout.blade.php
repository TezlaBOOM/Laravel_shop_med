@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Zamówienie
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
                        <h4>Zamówienie</h4>
                        <ul>
                            <li><a href="{{route('home')}}">Strona główna</a></li>
                            <li><a href="javascript:;">Zamówienie</a></li>
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
        CHECK OUT PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="wsus__check_form">
                            <div class="d-flex">
                                <h5>Wybierz adres dostawy:</h5>
                            <a href="javascript:;" style="margin-left:auto;" class="common_btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Dodaj nowy adres</a>
                            </div>

                            <div class="row">

                                @foreach ($addresses as $address)

                                    <div class="col-xl-6">
                                        <div class="wsus__checkout_single_address">
                                            <div class="form-check">
                                                <input class="form-check-input shipping_address" data-id="{{$address->id}}" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault">
                                                    <label class="form-check-label" for="flexRadioDefault">
                                                        Wybierz adres
                                                    </label>
                                            </div>
                                                <ul>
                                                    <li><span>Nazwa:</span> {{$address->name}}</li>
                                                    <li><span>Telefon:</span> {{$address->phone}}</li>
                                                    <li><span>NIP:</span> {{$address->nip}}</li>
                                                    <li><span>Ulica/numer domu:</span> {{$address->street}}</li>
                                                    <li><span>Miasto:</span> {{$address->city}}</li>
                                                    <li><span>Kod pocztowy:</span> {{$address->zipCode}}</li>
                                                    <li><span>Kraj:</span> {{$address->country}}</li>
                                                </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="wsus__order_details" id="sticky_sidebar">
                            <p class="wsus__product">Metoda dostawy</p>
                            @foreach ($shippingMethods as $method)
                                @if ($method->type === 'min_cost' && getCartTotal() >= $method->min_cost)
                                    <div class="form-check">
                                        <input class="form-check-input shipping_method" type="radio" name="exampleRadios" id="exampleRadios1"
                                            value="{{$method->id}}" data-id="{{$method->cost}}">
                                        <label class="form-check-label" for="exampleRadios1">
                                            {{$method->name}}
                                            <span>Koszt: ({{$method->cost}} {{$settings->currency_icon}})</span>
                                        </label>
                                    </div>
                                @elseif ($method->type === 'flat_cost')
                                    <div class="form-check">
                                        <input class="form-check-input shipping_method" type="radio" name="exampleRadios" id="exampleRadios1"
                                            value="{{$method->id}}" data-id="{{$method->cost}}">
                                        <label class="form-check-label" for="exampleRadios1">
                                            {{$method->name}}
                                            <span>Koszt: ({{$method->cost}} {{$settings->currency_icon}})</span>
                                        </label>
                                    </div>
                                @endif
                            @endforeach

                            <div class="wsus__order_details_summery">
                                <p>Cena produktów: <span>{{getCartTotal()}} {{$settings->currency_icon}}</span></p>
                                <p>Dostawa: <span id="shipping_fee">0 {{$settings->currency_icon}}</span></p>
                                <p>Rabat: <span>{{getCartDiscount()}} {{$settings->currency_icon}}</span></p>
                                <p><b>Całkowity koszt:</b> <span><b id="total_amount" data-id="{{getMainCartTotal()}}">{{getMainCartTotal()}} {{$settings->currency_icon}}</b></span></p>
                            </div>
                            <div class="terms_area">
                                <div class="form-check">
                                    <input class="form-check-input agree_term" type="checkbox" value="" id="flexCheckChecked3"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked3">
                                        Zapoznałem się z regulaminem sklepu <a href="#">Przeczytaj tu *</a>
                                    </label>
                                </div>
                            </div>
                            <form action="" id="checkOutForm">
                                <input type="hidden" name="shipping_method_id" value="" id="shipping_method_id">
                                <input type="hidden" name="shipping_address_id" value="" id="shipping_address_id">
                            </form>
                            <a href="" id="submitCheckoutForm" class="common_btn">Zamów</a>
                        </div>
                    </div>
                </div>
        </div>
    </section>

    <div class="wsus__popup_address">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Dodaj nowy adres</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="wsus__check_form p-3">
                            <form action="{{route('user.checkout.address.create')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- <div class="wsus__check_single_form">
                                            <select class="select_2" name="type">
                                                <option value="0">Adres Faktury + Adres Dostawy</option>
                                                <option value="1">Adres Faktury</option>
                                                <option value="2">Adres Dostawy</option>
                                            </select>
                                        </div> --}}
                                   
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Nazwa *" name="name" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Telefon *" name="phone" value="{{old('phone')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="NIP *" name="nip" value="{{old('nip')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Adres/Nr domu *" name="street" value="{{old('street')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Miasto*" name="city" value="{{old('city')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="kod pocztowy *" name="zipCode" value="{{old('zipCode')}}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <select class="select_2" name="country">
                                                <option value="">Kraj *</option>
                                                @foreach (config('settings.country_list') as $key => $county)
                                                    <option {{$county === old('country') ? 'selected' : ''}} value="{{$county}}">{{$county}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-xl-12">
                                        <div class="wsus__check_single_form">
                                            <button type="submit" class="btn btn-primary">Zapisz</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============================
        CHECK OUT PAGE END
    ==============================-->
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('input[type="radio"]').prop('checked', false);
        $('#shipping_method_id').val("");
        $('#shipping_address_id').val("");

        $('.shipping_method').on('click', function(){
            let shippingFee = $(this).data('id');
            let currentTotalAmount = $('#total_amount').data('id')
            let totalAmount = currentTotalAmount + shippingFee;

            $('#shipping_method_id').val($(this).val());
            $('#shipping_fee').text(shippingFee+ " {{$settings->currency_icon}}");

            $('#total_amount').text(totalAmount+ " {{$settings->currency_icon}}")
        })

        $('.shipping_address').on('click', function(){
            $('#shipping_address_id').val($(this).data('id'));
        })

        // submit checkout form
        $('#submitCheckoutForm').on('click', function(e){
            e.preventDefault();
            if($('#shipping_method_id').val() == ""){
                toastr.error('Metoda dostawy jest wymagana');
            }else if ($('#shipping_address_id').val() == ""){
                toastr.error('Adres dostawy jest wymagana');
            }else if (!$('.agree_term').prop('checked')){
                toastr.error('Musisz zaakceptować warunki korzystania ze strony internetowej');
            }else {
                $.ajax({
                    url: "{{route('user.checkout.form-submit')}}",
                    method: 'POST',
                    data: $('#checkOutForm').serialize(),
                    beforeSend: function(){
                        $('#submitCheckoutForm').html('<i class="fas fa-spinner fa-spin fa-1x"></i>')
                    },
                    success: function(data){
                        if(data.status === 'success'){
                            $('#submitCheckoutForm').text('Zamów')
                            // redirect user to next page
                            window.location.href = data.redirect_url;
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                })
            }



        })
    })
</script>
@endpush
