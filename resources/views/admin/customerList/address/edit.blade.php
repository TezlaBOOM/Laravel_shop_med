@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Lista użytkowników</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Wszyscy użytkownicy</h4>
                        </div>
                        <div class="card-body">

                          
                          <form action="{{route('admin.customer.address.update',$address->id)}}" method="POST">
                            @csrf
                     
                            <div class="row">

                              <div class="col-xl-6 col-md-12">
                                <div class="wsus__add_address_single">
                                  <label>Nazwa: <b>*</b></label>
                                  <input class="form-control" type="text" name="name" value="{{$address->name}}" required>
                                </div>
                              </div>
                              <div class="col-xl-6 col-md-6">
                                <div class="wsus__add_address_single">
                                  <label>Telefon:<b>*</b></label>
                                  <input class="form-control" type="text" name="phone" max="12" value="{{$address->phone}}" required>
                                </div>
                              </div>
                              
                              <div class="col-xl-6 col-md-6">
                                <div class="wsus__add_address_single">
                                  <label>NIP:<b>*</b></label>
                                  <input class="form-control" type="text" name="nip" max="10" value="{{$address->nip}}" required>
                                </div>
                              </div>
                              <div class="col-xl-6 col-md-6">
                                <div class="wsus__add_address_single">
                                  <label>Ulica/nr domu:<b>*</b></label>
                                  <input class="form-control" type="text" name="streat" value="{{$address->street}}" required>
                                </div>
                              </div>
    
                              <div class="col-xl-6 col-md-6">
                                <div class="wsus__add_address_single">
                                  <label>Kod pocztowy:<b>*</b></label>
                                  <input class="form-control" type="text" name="zipCode" max="10" value="{{$address->zipCode}}" required>
                                </div>
                              </div>
                              <div class="col-xl-6 col-md-6">
                                <div class="wsus__add_address_single">
                                  <label>Miasto:<b>*</b></label>
                                  <input class="form-control" type="text" name="city" value="{{$address->city}}" required>
                                </div>
                              </div>
                              <div class="col-xl-12 col-md-12">
                                <div class="wsus__add_address_single">
                                  <label>Kraj: <b>*</b></label>
                                  <div class="wsus__topbar_select">
                                    <select class="form-control" name="country" required>
                                      <option>Wybierz</option>
                                        @foreach (config('settings.country_list') as $country)
                                        <option {{$country == $address->country ? 'selected':" "}} value="{{$country}}">{{$country}}</option> 
                                        @endforeach
                                    </select>
                                  </div>
                                </div>
                          
                                <button type="submit" class="btn btn-primary">Zapisz</button>
                              </div>
                            </div>
                          </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>


        </div>


    </section>
@endsection


