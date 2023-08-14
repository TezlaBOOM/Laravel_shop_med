

@extends('vendor.layouts.master')

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
            <h3><i class="far fa-user"></i> Produkty</h3>
            <div class="row">
              <div class="col-12 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Strwórz Produkt</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('vendor.product-variant.update', $variant->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nazwa</label>
                            <input type="text" class="form-control" name="name" value="{{$variant->name}}">
                        </div>

                        <div class="form-group">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                              <option {{$variant->status == 1 ? 'selected' : ''}} value="1">aktywny</option>
                              <option {{$variant->status == 0 ? 'selected' : ''}} value="0">nie aktywny</option>
                            </select>
                        </div>
                        <button type="submmit" class="btn btn-primary">aktualizuj</button>
                    </form>
                  </div>
            
                </div>
              </div>
            </div>
            <div class="wsus__dashboard_profile">
              <div class="card-body">
               
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






