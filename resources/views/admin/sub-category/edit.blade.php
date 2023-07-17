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
                        <h4>Zaktualizuj pod kategorie</h4>
                      </div>
                      <div class="card-body">
                        <form action="{{route('admin.sub-category.update',$subCategory->id)}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                              <label for="inputStatus">Kategorie</label>
                              <select id="inputStatus" class="form-control" name="category">
                                  <option value="">Wybierz</option>
                                  @foreach ($categories as $category)
                                  <option {{$category->id == $subCategory->category_id ? 'selected': ''}}
                                     value="{{$category->id}}">{{$category->name}}</option>
                                  @endforeach

                              </select>
                          <div class="form-group">
                            <label>Nazwa</label>
                            <input type="text" class="form-control" name="name" value="{{$subCategory->name}}"">
                        </div>
                        <div class="form-group">
                          <label for="inputStatus">Status</label>
                          <select id="inputStatus" class="form-control" name="status">
                            <option {{$subCategory->status == 1 ? 'selected': ''}} value="1">Aktywny</option>
                            <option {{$subCategory->status == 0 ? 'selected': ''}} value="0">Nieaktywny</option>
                          </select>
                      </div>
                            <button type="submit" class="btn btn-primary">Zaktualizuj</button>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>

              </div>
            </section>
@endsection