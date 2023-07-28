@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Product Variant</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Variant</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.product-variant-item.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>nazwa wariantu</label>
                            <input type="text" class="form-control" name="variant_name" value="{{$variant->name}}" readonly>
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="variant_id" value="{{$variant->id}}">
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="product_id" value="{{$product->id}}">
                        </div>
                        <div class="form-group">
                          <label>nazwa przedmiotu</label>
                          <input type="text" class="form-control" name="name" value="">
                      </div>
                      <div class="form-group">
                        <label>Cena <code>(0 oznacze za free)</label>
                        <input type="text" class="form-control" name="price" value="">
                    </div>
                        <div class="form-group">
                          <label for="inputState">Domyślna wartość</label>
                          <select id="inputState" class="form-control" name="is_default">
                            <option value="1">tak</option>
                            <option value="0">nie</option>
                          </select>
                      </div>

                        <div class="form-group">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                              <option value="1">aktywny</option>
                              <option value="0">nie aktuwny</option>
                            </select>
                        </div>
                        <button type="submmit" class="btn btn-primary">Stwórz</button>
                    </form>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection
