@extends('admin.layouts.master')

@section('content')
          <!-- Main Content -->
            <section class="section">
              <div class="section-header">
                <h1>Marka</h1>
              </div>
    
              <div class="section-body">
                
                <div class="row">
                  <div class="col-12 ">
                    <div class="card">
                      <div class="card-header">
                        <h4>Strwórz Marke</h4>
                      </div>
                      <div class="card-body">
                        <form action="{{route('admin.brand.update',$brand->id)}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Podgląd Loga</label>
                                <br>
                                <img width="200" src="{{asset($brand->logo)}}" alt="">
                            </div>
                            <div class="form-group">
                                <label>Logo</label>
                                <input type="file" class="form-control" name="logo" >
                            </div>

                            <div class="form-group">
                                <label>Nazwa</label>
                                <input type="text" class="form-control" name="name" value="{{$brand->name}}">
                            </div>

                        
                            <div class="form-group">
                                <label for="inputStatus">Pokazuje się</label>
                                <select id="inputStatus" class="form-control" name="is_featured">
                                    <option {{$brand->is_featured == 1 ? 'selected': ''}}  value="1">Tak</option>
                                    <option {{$brand->is_featured == 0 ? 'selected': ''}}  value="0">Nie</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Status</label>
                                <select id="inputStatus" class="form-control" name="status">
                                    <option {{$brand->status == 1 ? 'selected': ''}} value="1">Aktywny</option>
                                    <option {{$brand->status == 0 ? 'selected': ''}} value="0">Nieaktywny</option>
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