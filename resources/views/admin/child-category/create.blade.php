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
                        <form action="{{route('admin.child-category.store')}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            
                            <div class="form-group">
                              <label for="inputStatus">Kategorie</label>
                              <select id="inputStatus" class="form-control main-category" name="main_category">
                                  <option value="">Wybierz</option>
                                  @foreach ($categories as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                  @endforeach

                              </select>
                              <label for="inputStatus">Pod Kategorie</label>
                              <select id="inputStatus" class="form-control sub-category" name="sub_category">
                                  <option value="">Wybierz</option>
                                  
                                

                              </select>
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

@push('scripts')
            <script>
              $(document).ready(function() {
                $('body').on('change', '.main-category', function(e){
                  let id = $(this).val();
                  $.ajax({
                    method: 'GET',
                    url:"{{route('admin.get-subcategories')}}",
                    data:{
                      id:id
                    },
                    success: function(data){
                      console.log(data);
                      $('.sub-category').html('<option value="">Wybierz</option>')
                      $.each(data, function(i,item){
                        $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`)
                      })
                    },
                    error: function(xhr, status, error){
                      console.log(error);
                    }
                  })
                })
              })
            </script>
  
@endpush