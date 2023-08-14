@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Wariant produktu</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Aktualizacja wariantu produktu</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.product-variant-item.update', $variantItem->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nazwa wariantu</label>
                            <input type="text" class="form-control" name="variant_name" value="{{$variantItem->productVariant->name}}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Nazwa przedmiotu</label>
                            <input type="text" class="form-control" name="name" value="{{$variantItem->name}}">
                        </div>
                        <div class="form-group">
                          <label>sku</label>
                          <input type="text" class="form-control" name="sku" value="{{$variantItem->sku}}"max="200">
                      </div>

                        <div class="form-group">
                            <label>Cena <code>(0 oznacza za free)</code></label>
                            <input type="text" class="form-control" name="price" value="{{$variantItem->price}}">
                        </div>

                        <div class="form-group">
                            <label for="inputState">domyślna wartość</label>
                            <select id="inputState" class="form-control" name="is_default">
                                <option value="">wybierz</option>
                              <option {{$variantItem->is_default == 1 ? 'selected' : ''}} value="1">Tak</option>
                              <option {{$variantItem->is_default == 0 ? 'selected' : ''}} value="0">Nie</option>
                            </select>
                        </div>

                        <div class="form-group">
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
        </section>

@endsection
