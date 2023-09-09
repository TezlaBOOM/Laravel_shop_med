@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Stopka</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Stopka edytuj karte</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.footer-grid-two.update', $footer->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nazwa</label>
                            <input type="text" class="form-control" name="name" value="{{$footer->name}}">
                        </div>

                        <div class="form-group">
                            <label>url</label>
                            <input type="text" class="form-control" name="url" value="{{$footer->url}}">
                        </div>

                        <div class="form-group">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                              <option {{$footer->status === 1 ? 'selected' : ''}} value="1">Aktywny</option>
                              <option {{$footer->status === 0 ? 'selected' : ''}} value="0">Nie aktywny</option>
                            </select>
                        </div>

                        <button type="submmit" class="btn btn-primary">Edytuj</button>
                    </form>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection
