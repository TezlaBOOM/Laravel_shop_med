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
                  <div class="dashboard_content">
                    <h3><i class="fal fa-gift-card"></i> Adresy</h3>
                    <div class="wsus__dashboard_add">
                      <div class="row">
                        @foreach ($addresses as $address)
                        <div class="col-xl-6">
                            <div class="wsus__dash_add_single">
                                @switch($address->type)
                                    @case(0)
                                        <h4>Typ adresu:<span>Adres fakturowy + Adres dostawy</span></h4>
                                        @break
                                    @case(1)
                                        <h4>Typ adresu:<span>Adres fakturowy </span></h4>
                                        @break
                                    @case(2)
                                        <h4>Typ adresu:<span>Adres dostawy</span></h4>
                                        @break
                                
                                    @default
                                    <h4>Typ adresu:<span></span></h4>  
                                @endswitch
                              
                              <ul>
                                <li><span>Nazwa :</span> {{$address->name}}</li>
                                <li><span>Telefon :</span> {{$address->phone}}</li>
                                <li><span>NiP :</span> {{$address->nip}}</li>
                                <li><span>Ulica/Nr domu :</span> {{$address->street}}</li>
                                <li><span>Kod pocztowy :</span> {{$address->zipCode}}</li>
                                <li><span>Miast :</span> {{$address->city}}</li>
                                <li><span>Kraj :</span> {{$address->country}}</li>
                              </ul>
                              <div class="wsus__address_btn">
                                <a href="{{route('user.address.edit', $address->id)}}" class="edit"><i class="fal fa-edit"></i> Edytuj</a>
                                <a href="{{route('user.address.destroy', $address->id)}}" class="del delete-item"><i class="fal fa-trash-alt"></i> Usuń</a>
                              </div>
                            </div>
                          </div>
                        @endforeach


                        <div class="col-12">
                          <a href="{{route('user.address.create')}}" class="add_address_btn common_btn"><i class="far fa-plus"></i>
                            Dodaj nowy adres</a>
                        </div>
                      </div>
                    </div>
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
@push('name')
    
@endpush