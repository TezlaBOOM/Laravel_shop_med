@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Footer</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Stopka social media</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.footer-socials.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Icon</label>
                             <div>
                                <button class="btn btn-primary" data-icon="" data-selected-class="btn-danger"
                                data-unselected-class="btn-info" role="iconpicker" name="icon"></button>
                             </div>

                        </div>
                        <div class="form-group">
                            <label>Nazwa</label>
                            <input type="text" class="form-control" name="name" value="">
                        </div>
                        <div class="form-group">
                            <label>url</label>
                            <input type="text" class="form-control" name="url" value="">
                        </div>
                        <div class="form-group">
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
        </section>

@endsection
