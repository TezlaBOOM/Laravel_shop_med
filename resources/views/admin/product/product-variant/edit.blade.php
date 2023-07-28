@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Warianty przedmiotu<</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Aktuwalizacja wariantu</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.product-variant.update', $variant->id)}}" method="POST">
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

          </div>
        </section>

@endsection
