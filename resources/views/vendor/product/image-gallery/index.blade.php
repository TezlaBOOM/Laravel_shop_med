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
         <div class="mb-3">
            <a href="{{route('vendor.product.index')}}" class="btn btn-primary">Powrót</a>
         </div>
          <div class="section-body">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Prdukt: {{$product->name}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('vendor.product-image-gallery.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Obrazek <code>(Można dodąć wiele obrazków na raz!)</code></label>
                                <input type="file" name="image[]" class="form-control" multiple>
                                <input type="hidden" name="product" value="{{$product->id}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Dodaj</button>
                        </form>
                    </div>

                  </div>
                </div>
              </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Wszystkie obrazki</h4>
                  </div>
                  <div class="card-body">
                    {{ $dataTable->table() }}
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush