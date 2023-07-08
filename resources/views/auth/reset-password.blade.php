@extends('frontend.layouts.master')
@section('content')
        <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>change password</h4>
                        <ul>
                            <li><a href="#">login</a></li>
                            <li><a href="#">change password</a></li>
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
        CHANGE PASSWORD START
    ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-10 col-lg-7 m-auto">
                    <form method="POST" action="{{route('password.store')}}">
                        @csrf
                        <div class="wsus__change_password">
                            <h4>Zmiana hasła</h4>
                            <input type="hidden" name="token" value="{{$request->route('token')}}"">
                            
                            <div class="wsus__single_pass">
                                <label>Podaj Email</label>
                                <input id="email" name="email" value="{{old('email',$request->email)}}" type="email" placeholder="Email">
                            </div>
                            <div class="wsus__single_pass">
                                <label>Podaj nowe hasło</label>
                                <input id="password" name="password" type="password" placeholder="Nowe hasło">
                            </div>
                            <div class="wsus__single_pass">
                                <label>Powtórz nowe hasło</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Powtórz hasło">
                            </div>
                            <button class="common_btn" type="submit">Zmień</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        CHANGE PASSWORD END
    ==============================-->

@endsection