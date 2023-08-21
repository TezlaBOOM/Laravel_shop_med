@extends('frontend.dashboard.layouts.master')

@section('content')

<section id="wsus__dashboard">
  <div class="container-fluid">
    @include('frontend.dashboard.layouts.siderbar')
    <div class="row">
      <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
        <div class="dashboard_content">
          <div class="wsus__dashboard">

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                  <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="fal fa-gift-card"></i>Dodawnie adresu</h3>
                    <div class="wsus__dashboard_add wsus__add_address">
                      <form action="{{route('user.address.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            {{-- <div class="col-xl-6 col-md-12">
                                <div class="wsus__add_address_single">
                                  <label>Typ adresu: <b>*</b></label>
                                  <div class="wsus__topbar_select">
                                    <select class="select_2" name="type" required>
                                      <option value="0">Adres fakturowy + Adres dostawy</option>
                                      <option value="1">Adres fakturowy</option>
                                      <option value="2">Adres dostawy</option>
                                    </select>
                                  </div>
                                </div>
                              </div> --}}
                          <div class="col-xl-6 col-md-12">
                            <div class="wsus__add_address_single">
                              <label>Nazwa: <b>*</b></label>
                              <input type="text" name="name" required>
                            </div>
                          </div>
                          <div class="col-xl-6 col-md-6">
                            <div class="wsus__add_address_single">
                              <label>Telefon:<b>*</b></label>
                              <input type="text" name="phone" max="12" required>
                            </div>
                          </div>
                          <div class="col-xl-6 col-md-6">
                            <div class="wsus__add_address_single">
                              <label>NIP:<b>*</b></label>
                              <input type="text" name="nip" max="10" required>
                            </div>
                          </div>
                          <div class="col-xl-6 col-md-6">
                            <div class="wsus__add_address_single">
                              <label>Ulica/nr domu:<b>*</b></label>
                              <input type="text" name="streat" required>
                            </div>
                          </div>

                          <div class="col-xl-6 col-md-6">
                            <div class="wsus__add_address_single">
                              <label>Kod pocztowy:<b>*</b></label>
                              <input type="text" name="zipCode" max="10" required>
                            </div>
                          </div>
                          <div class="col-xl-6 col-md-6">
                            <div class="wsus__add_address_single">
                              <label>Miasto:<b>*</b></label>
                              <input type="text" name="city" required>
                            </div>
                          </div>
                          <div class="col-xl-6 col-md-6">
                            <div class="wsus__add_address_single">
                              <label>Kraj: <b>*</b></label>
                              <div class="wsus__topbar_select">
                                <select class="select_2" name="country" required>
                                  <option>Wybierz</option>
                                    @foreach (config('settings.country_list') as $country)
                                    <option value="{{$country}}">{{$country}}</option> 
                                    @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-6">
                            <button type="submit" class="common_btn">Zapisz</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

        </div>
      </div>
    </div>
  </div>
</section>
  
@endsection