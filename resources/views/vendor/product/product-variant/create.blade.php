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
            <h3><i class="far fa-user"></i> Waraint Produktu</h3>
         <div class="mb-3">
            <a href="{{route('vendor.product.index')}}" class="btn btn-primary">Powrót</a>
         </div>
         <div class="card-body">
          <form action="{{route('vendor.product-variant.store')}}" method="POST">
              @csrf

              <div class="form-group wsus__input">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" value="">
              </div>

              <div class="form-group wsus__input">
                  <input type="hidden" class="form-control" name="product" value="{{request()->product}}">
              </div>
              <div class="form-group wsus__input">
                  <label for="inputState">Status</label>
                  <select id="inputState" class="form-control" name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
              </div>
              <button type="submmit" class="btn btn-primary">Create</button>
          </form>
        </div>
        </section>

@endsection


