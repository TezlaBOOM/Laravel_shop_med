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
                        <h4>Edytuj Slider</h4>
                      </div>
                      <div class="card-body">
                        <form action="{{route('admin.category.update', $category->id)}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            @method('PUT')
                            @csrf
                            
                            <div class="form-group">
                              <label>Icon</label>
                              <div>
                                 <button class="btn btn-primary" data-icon="{{$category->icon}}"data-selected-class="btn-danger"
                                 data-unselected-class="btn-info" role="iconpicker" name="icon"></button>
                              </div>
                          </div>
                          <div class="form-group">
                            <label>Nazwa</label>
                            <input type="text" class="form-control" name="name" value="{{$category->name}}">
                        </div>
                        <div class="form-group">
                          <label for="inputStatus">Status</label>
                          <select id="inputStatus" class="form-control" name="status">
                            <option {{$category->status == 1 ? 'selected': ''}} value="1">Aktywny</option>
                            <option {{$category->status == 0 ? 'selected': ''}} value="0">Nieaktywny</option>
                          </select>
                      </div>
                            <button type="submit" class="btn btn-primary">Aktualizuj</button>
                        </form>

                      </div>

                    </div>
                  </div>
                </div>

              </div>
            </section>
@endsection