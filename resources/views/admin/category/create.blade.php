@extends('admin.layouts.master')

@section('content')
          <!-- Main Content -->
            <section class="section">
              <div class="section-header">
                <h1>Table</h1>
              </div>
    
              <div class="section-body">
                
                <div class="row">
                  <div class="col-12 ">
                    <div class="card">
                      <div class="card-header">
                        <h4>Strwórz Kategorie</h4>
                      </div>
                      <div class="card-body">
                        <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            
                            <div class="form-group">
                              <label>Icon</label>
                              <div>
                                 <button class="btn btn-primary" data-selected-class="btn-danger"
                                 data-unselected-class="btn-info" role="iconpicker" name="icon"></button>
                              </div>
                          </div>
                          <div class="form-group">
                            <label>Nazwa</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                          <label for="inputStatus">Status</label>
                          <select id="inputStatus" class="form-control" name="status">
                              <option value="1">Aktywny</option>
                              <option value="0">Nieaktywny</option>
                          </select>
                      </div>
                            <button type="submit" class="btn btn-primary">Stwórz</button>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>

              </div>
            </section>
@endsection