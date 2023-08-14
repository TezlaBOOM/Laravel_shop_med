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
            {{-- <div class="mb-3">
            <a href="{{route('vendor.products-variant-item.index',
            ['productId' => $product->id, 'variantId' => $variant->id])}}" class="btn btn-warning mb-4"><i class="fas fa-long-arrow-left"></i> Powrót</a>
          </div> --}}
          <div class="row">
            <div class="col-12 ">
              <div class="card">
                <div class="card-header">
                  <h4>Aktualizacja wariantu produktu</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('vendor.product-variant-item.update', $variantItem->id)}}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="form-group wsus__input">
                          <label>Nazwa wariantu</label>
                          <input type="text" class="form-control" name="variant_name" value="{{$variantItem->productVariant->name}}" readonly>
                      </div>

                      <div class="form-group wsus__input">
                          <label>Nazwa przedmiotu</label>
                          <input type="text" class="form-control" name="name" value="{{$variantItem->name}}">
                      </div>
                      <div class="form-group wsus__input">
                        <label>Sku</label>
                        <input type="text" class="form-control" name="sku" value="{{$variant->sku}}">
                    </div>

                      <div class="form-group wsus__input">
                          <label>Cena <code>(0 oznacza za free)</code></label>
                          <input type="text" class="form-control" name="price" value="{{$variantItem->price}}">
                      </div>

                      <div class="form-group wsus__input">
                          <label for="inputState">domyślna wartość</label>
                          <select id="inputState" class="form-control" name="is_default">
                              <option value="">wybierz</option>
                            <option {{$variantItem->is_default == 1 ? 'selected' : ''}} value="1">Tak</option>
                            <option {{$variantItem->is_default == 0 ? 'selected' : ''}} value="0">Nie</option>
                          </select>
                      </div>

                      <div class="form-group wsus__input">
                          <label for="inputState">Status</label>
                          <select id="inputState" class="form-control" name="status">
                            <option {{$variantItem->status == 1 ? 'selected' : ''}} value="1">Aktywny</option>
                            <option {{$variantItem->status == 0 ? 'selected' : ''}} value="0">Nie Aktywny</option>
                          </select>
                      </div>
                      <button type="submmit" class="btn btn-primary">Zaktualizuj</button>
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
