@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || About
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
                        <h4>Skontaktuj się z nami </h4>
                        <ul>
                            <li><a href="{{url('/')}}">Strona głowna</a></li>
                            <li><a href="javascript:;">Skontaktuj się z nami</a></li>
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
        CONTACT PAGE START
    ==============================-->
    <section id="wsus__contact">
        <div class="container">
            <div class="wsus__contact_area">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="row">
                            @if ($settings->contact_email)

                            <div class="col-xl-12">
                                <div class="wsus__contact_single">
                                    <i class="fal fa-envelope"></i>
                                    <h5>Email adres</h5>
                                    <a href="mailto:example@gmail.com">{{@$settings->contact_email}}</a>
                                    <span><i class="fal fa-envelope"></i></span>
                                </div>
                            </div>
                            @endif
                            @if ($settings->contact_phone)
                            <div class="col-xl-12">
                                <div class="wsus__contact_single">
                                    <i class="far fa-phone-alt"></i>
                                    <h5>Numer telefonu</h5>
                                    <a href="macallto:{{@$settings->contact_phone}}">{{@$settings->contact_phone}}</a>
                                    <span><i class="far fa-phone-alt"></i></span>
                                </div>
                            </div>
                            @endif
                            @if ($settings->contact_address)

                            <div class="col-xl-12">
                                <div class="wsus__contact_single">
                                    <i class="fal fa-map-marker-alt"></i>
                                    <h5>Kontakt adres</h5>
                                    <a href="javascript:;">{{@$settings->contact_address}}</a>
                                    <span><i class="fal fa-map-marker-alt"></i></span>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="wsus__contact_question">
                            <h5>Napisz do nas</h5>
                            <form id="contact-form">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <input type="text" placeholder="Nazwa/imie" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <input type="email" placeholder="Email" name="email">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <input type="text" placeholder="Temat" name="subject">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <textarea cols="3" rows="5" placeholder="Wiadomość" name="message"></textarea>
                                        </div>
                                        <button type="submit" class="common_btn" id="form-submit">Wyślij</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-xl-12">
                        <div class="wsus__con_map">
                            <iframe
                                src="{{$settings->map}}"
                                width="1600" height="450" style="border:0;" allowfullscreen="100"
                                loading="lazy"></iframe>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </section>
    <!--============================
        CONTACT PAGE END
    ==============================-->
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#contact-form').on('submit', function(e){
                e.preventDefault();
                let data = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: "{{route('handle-contact-form')}}",
                    data: data,
                    beforeSend: function(){
                        $('#form-submit').text('Wysyłanie..');
                        $('#form-submit').attr('disabled', true);
                    },
                    success: function(data){
                        if(data.status == 'success'){
                            toastr.success(data.message);
                            $('#contact-form')[0].reset();
                            $('#form-submit').text('Wyślij')
                            $('#form-submit').attr('disabled', false);
                        }
                    },
                    error: function(data){
                        let errors = data.responseJSON.errors;

                        $.each(errors, function(key, value){
                            toastr.error(value);
                        })

                        $('#form-submit').text('Wyślij');
                        $('#form-submit').attr('disabled', false);
                    }
                })
            })
        })
    </script>
@endpush