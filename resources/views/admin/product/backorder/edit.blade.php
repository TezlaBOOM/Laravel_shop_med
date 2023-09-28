@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
      <section class="section">
        <div class="section-header">
          <h1>Backorder</h1>
        </div>

        <div class="section-body">

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Edycja Backorder</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.backorder.update', $backorder->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nazwa</label>
                            <input type="text" class="form-control" name="name" value="{{$backorder->name}}" readonly>
                        </div>
                        
                        <div class="form-group">
                          <label for="inputStatus">Sprzedawać</label>
                          <select id="inputStatus" class="form-control" name="sell">
                              <option {{$backorder->sell == 1 ? 'selected': ''}} value="1">Tak</option>
                              <option {{$backorder->sell == 0 ? 'selected': ''}} value="0">Nie</option>
                          </select>
                      </div>

                        <button type="submmit" class="btn btn-primary">Zapisz</button>
                    </form>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection
