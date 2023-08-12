@extends('vendor.layouts.master')
@section('title')
{{$settings->site_name}} || Profil sprzedawcy
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
            <h3><i class="far fa-user"></i> profile</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <h4>Informacje</h4>
                 <form method="POST" action="{{route('vendor.profile.update')}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="row">
                    <div class="col-xl-3 col-sm-6 col-md-6">
                      <div class="wsus__dash_pro_img">
                        <img src="{{Auth::user()->image ? asset(Auth::user()->image) : asset('frontend/images/ts-2.jpg')}}" alt="Avatar Użytkowniaka" class="img-fluid w-100">
                        <input type="file" name="image">
                      </div>
                    </div>
                    <div class="col-xl-9">
                      <div class="row">
                        <div class="col-xl-6 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-user-tie"></i>
                            <input id="name" name="name" type="name" value="{{Auth::user()->name}}" placeholder="Nazwa">
                          </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-user-tie"></i>
                            <input id="nip" name="nip" type="text" value="{{Auth::user()->nip}}" maxlength="10" placeholder="NIP">
                          </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="far fa-phone-alt"></i>
                            <input id="phome" name="phone" type="text" value="{{Auth::user()->phone}}" maxlength="9" placeholder="Telefon">
                          </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fal fa-envelope-open"></i>
                            <input id="email" name="email" type="email" value="{{Auth::user()->email}}"  placeholder="Email">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-12">
                      <button class="common_btn mb-4 mt-2" type="submit">Zmień Dane</button>
                    </div>

                </form>
                <form method="POST" action="{{route('vendor.profile.update.password')}}">
                  @csrf
                    <div class="wsus__dash_pass_change mt-2">
                      <div class="row">
                        <h4>Zmiana hasła</h4>
                        <div class="col-xl-4 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-unlock-alt"></i>
                            <input name="current_password" type="password" placeholder="Current Password">
                          </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-lock-alt"></i>
                            <input name="password" type="password" placeholder="New Password">
                          </div>
                        </div>
                        <div class="col-xl-4">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-lock-alt"></i>
                            <input name="password_confirmation" type="password" placeholder="Confirm Password">
                          </div>
                        </div>
                        <div class="col-xl-12">
                          <button class="common_btn" type="submit">Zmień hasło</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </from>
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