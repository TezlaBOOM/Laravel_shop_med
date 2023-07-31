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
            <h3><i class="far fa-user"></i> Waiant</h3>
            <div class="mb-3">
              <a href="{{route('vendor.product-variant.index', ['product' => $product->id])}}" class="btn btn-primary">Back</a>
            </div>
          <div class="row">
            <div class="col-12 ">
              <div class="card">
                <div class="card-header">
                  <h4>Tworzenie wariantu produktu</h4>
                </div>
                <form action="{{route('vendor.product-variant-item.store')}}" method="POST">
                  @csrf

                  <div class="form-group wsus__input">
                      <label>Nazwa wariantu</label>
                      <input type="text" class="form-control" name="variant_name" value="{{$variant->name}}" readonly>
                  </div>

                  <div class="form-group wsus__input">
                      <input type="hidden" class="form-control" name="variant_id" value="{{$variant->id}}">
                  </div>
                  <div class="form-group wsus__input">
                      <input type="hidden" class="form-control" name="product_id" value="{{$product->id}}">
                  </div>

                  <div class="form-group wsus__input">
                      <label>Nazwa przedmiotu</label>
                      <input type="text" class="form-control" name="name" value="">
                  </div>

                  <div class="form-group wsus__input">
                      <label>Cena <code>(0 oznacza za free)</code></label>
                      <input type="text" class="form-control" name="price" value="">
                  </div>

                  <div class="form-group wsus__input">
                      <label for="inputState">Podstawowy</label>
                      <select id="inputState" class="form-control" name="is_default">
                          <option value="">Wybierz</option>
                        <option value="1">Tak</option>
                        <option value="0">Nie</option>
                      </select>
                  </div>

                  <div class="form-group wsus__input">
                      <label for="inputState">Status</label>
                      <select id="inputState" class="form-control" name="status">
                        <option value="1">Aktywny</option>
                        <option value="0">Nie aktywny</option>
                      </select>
                  </div>
                  <button type="submmit" class="btn btn-primary">Stwórz</button>
              </form>

              </div>
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


