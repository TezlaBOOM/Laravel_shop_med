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
                        <form action="{{route('admin.brand.store')}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            <div class="form-group">
                                <label>Logo</label>
                                <input type="file" class="form-control" name="logo">
                            </div>

                            <div class="form-group">
                                <label>Nazwa</label>
                                <input type="text" class="form-control" name="name" value="">
                            </div>

                        
                            <div class="form-group">
                                <label for="inputStatus">Pokazuje się</label>
                                <select id="inputStatus" class="form-control" name="is_featured">
                                    <option value="">Wybierz</option>
                                    <option value="1">Tak</option>
                                    <option value="0">Nie</option>
                                </select>
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