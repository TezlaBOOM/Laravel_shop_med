<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>
        @yield('title')
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="icon" type="image/png" href="{{ $logoSetting->favicon }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.nice-number.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/add_row_custon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/mobile_menu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.exzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/multiple-image-video.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/ranger_style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.classycountdown.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    @if ($settings->layout === 'RTL')
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/rtl.css') }}">
    @endif
</head>

<body>

    <!--============================
        HEADER START
    ==============================-->
    @include('frontend.layouts.header')
    <!--============================
        HEADER END
    ==============================-->


    <!--============================
        MENU START
    ==============================-->
    @include('frontend.layouts.menu')
    <!--============================
         MENU END
    ==============================-->


    <!--==========================
        POP UP START
    ===========================-->
    <section id="wsus__pop_up" style="display:none;">
        <div class="wsus__pop_up_center">
            <div class="wsus__pop_up_text">

                <h5>ZAWARTOŚĆ STRONY ZAWIERA REKLAMY WYROBÓW MEDYCZNYCH PRZEZNACZONYCH DLA PROFESJONALNYCH UŻYTKOWNIKÓW.
                </h5>

                <p>STRONA PRZEZNACZONA JEST WYŁĄCZNIE DLA OSÓB WYKONUJĄCYCH ZAWODY MEDYCZNE LUB ZAJMUJĄCYCH SIĘ
                    UŻYWANIEM LUB OBROTEM WYROBAMI MEDYCZNYMI W RAMACH CZYNNOŚCI ZAWODOWYCH. WEJŚCIE NA STRONE MOŻLIWE
                    JEST WYŁĄCZNIE PO ZŁOŻENIU PONIŻSZEGO OŚWIADCZENIA: <br>OŚWIADCZAM, ŻE WYKONUJĘ ZAWÓD MEDYCZNY LUB
                    ZAJMUJĘ SIĘ UŻYWANIEM LUB OBROTEM WYROBAMI MEDYCZNYMI W RAMACH CZYNNOŚCI ZAWODOWYCH.</p>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="common_btn" id="unconfirmButton">NIE JESTEM - OPÓŚĆ
                            STRONE</button>
                    </div>
                    <div class="col">
                        <button type="submit" class="common_btn" id="confirmButton">OŚWIADCZAM – PRZEJDŹ DALEJ</button>
                    </div>



                </div>


            </div>
    </section>




    <!--==========================
        POP UP END
    ===========================-->


    <!--============================
        Main Content
    ==============================-->
    @yield('content')
    <!--============================
        Main Content END
    ==============================-->


    <!--============================
        FOOTER PART START
    ==============================-->
    @include('frontend.layouts.footer')
    <!--============================
        FOOTER PART END
    ==============================-->


    <!--============================
        SCROLL BUTTON START
    ==============================-->
    <div class="wsus__scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--============================
        SCROLL BUTTON  END
    ==============================-->


    <!--jquery library js-->
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('frontend/js/Font-Awesome.js') }}"></script>
    <!--select2 js-->
    <script src="{{ asset('frontend/js/select2.min.js') }}"></script>
    <!--slick slider js-->
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <!--simplyCountdown js-->
    <script src="{{ asset('frontend/js/simplyCountdown.js') }}"></script>
    <!--product zoomer js-->
    <script src="{{ asset('frontend/js/jquery.exzoom.js') }}"></script>
    <!--nice-number js-->
    <script src="{{ asset('frontend/js/jquery.nice-number.min.js') }}"></script>
    <!--counter js-->
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.countup.min.js') }}"></script>
    <!--add row js-->
    <script src="{{ asset('frontend/js/add_row_custon.js') }}"></script>
    <!--multiple-image-video js-->
    <script src="{{ asset('frontend/js/multiple-image-video.js') }}"></script>
    <!--sticky sidebar js-->
    <script src="{{ asset('frontend/js/sticky_sidebar.js') }}"></script>
    <!--price ranger js-->
    <script src="{{ asset('frontend/js/ranger_jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/ranger_slider.js') }}"></script>
    <!--isotope js-->
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <!--venobox js-->
    <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
    <!--classycountdown js-->
    <script src="{{ asset('frontend/js/jquery.classycountdown.js') }}"></script>
    <!--toasters js-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!--main/custom js-->
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>
    <script>
        $(document).ready(function() {
            $('.auto_click').click();
        })
    </script>
        <script>
            // Funkcja do pokazywania komunikatu - function showing popup
            function showPolicyModal() {
                var modal = document.getElementById("wsus__pop_up");
                modal.style.display = "block";
            }
    
            // Funkcja do ukrywania komunikatu - function hiding popup 
            function hidePolicyModal() {
                var modal = document.getElementById("wsus__pop_up");
                modal.style.display = "none";
            }
    
            // Obsługa naciśnięcia przycisku "Tak, jestem specialistą"  - function button "I m doctor"
            var confirmButton = document.getElementById("confirmButton");
            confirmButton.addEventListener("click", function() {
                hidePolicyModal();
    
            });
    
            // Obsługa naciśnięcia przycisku "Tak, jestem specialistą"- function button "I m not doctor"
            var unconfirmButton = document.getElementById("unconfirmButton");
            unconfirmButton.addEventListener("click", function() {
                window.history.back();
    
            });
    
            // Pokaż komunikat po załadowaniu strony - function load popup
            window.addEventListener("load", function() {
                var hasPopupBeenShown = sessionStorage.getItem("popupShown");
    
                if (!hasPopupBeenShown) {
                    showPolicyModal();
                    sessionStorage.setItem("popupShown", "true");
                }
            });
        </script>
    @include('frontend.layouts.scripts')
    @stack('scripts')
</body>

</html>
