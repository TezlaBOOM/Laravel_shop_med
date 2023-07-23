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
                        <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            <div class="form-group">
                                <label>Obrazek</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group">
                                <label>Nazwa</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>

                            <div class = "row">
                              <div class="col-md-3">    
                                  <div class="form-group">
                                    <label for="inputStatus">Kategoria</label>
                                    <select id="inputStatus" class="form-control main_category" name="category">
                                        <option value="">Wybierz</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach 
                                    </select>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                    <label for="inputStatus">Pod kategoria</label>
                                    <select id="inputStatus" class="form-control sub_category" name="sub_category">
                                        <option value="">Wybierz</option>

                                    </select>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="inputStatus">Pod pod kategoria</label>
                                  <select id="inputStatus" class="form-control child_category" name="child_category">
                                      <option value="">Wybierz</option>

                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="inputStatus">Marka</label>
                                  <select id="inputStatus" class="form-control" name="brand">
                                      <option value="">Wybierz</option>
                                      @foreach ($brands as $brand)
                                      <option value="{{$brand->id}}">{{$brand->name}}</option>
                                      @endforeach 
                                  </select>
                                </div>
                              </div>
                                <div class="col-md-4">
                                  <div class="from-group">
                                    <label>SKU</label>
                                    <input type="text" class="form-control" name='sku' value="{{old('sku')}}">
                                  </div>
                                
                              </div>
                            </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="from-group">
                                    <label>Cena Brutto</label>
                                    <input type="text" class="form-control" name='price' value="{{old('price')}}">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="from-group">
                                    <label>Ilość</label>
                                    <input type="number" min="0" class="form-control" name='qty' value="{{old('qty')}}">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="inputStatus">Na zamówienie</label>
                                    <select id="inputStatus" class="form-control" name="backorder">
                                        <option value="">Wybierz</option>
                                        <option value="0">Na zamówienie</option>
                                        <option value="1">Wycofane</option>
                                        <option value="2">4 dni</option>
                                        <option value="3">7 dni</option>
                                        <option value="4">14 dni</option>
                                    </select>
                                  </div>
                                </div>
                              </div>


                            <div class="row">
                              <div class = "col-md-4">
                            <div class="from-group">
                              <label>Cena Promocyjna</label>
                              <input type="text" class="form-control" name='offer_price' value="{{old('offer_price')}}">
                            </div>
                          </div>
                              <div class = "col-md-4">
                                <div class="from-group">
                                  <label>Od kiedy</label>
                                  <input type="text" class="form-control datepicker" name='offer_start_date' value="{{old('offer_start_date')}}">
                                </div>
                              </div>
                              <div class = "col-md-4">
                                <div class="from-group">
                                  <label>Do kiedy</label>
                                  <input type="text" class="form-control datepicker" name='offer_end_date' value="{{old('offer_end_date')}}">
                                </div>
                              </div>
                            </div>




                          <div class="from-group">
                            <label>Link do wideo</label>
                            <input type="text" class="form-control" name='video_link' value="{{old('video_link')}}">
                          </div>
                          
                          <div class="from-group">
                            <label>Krótki opis</label>
                            <textarea class="summernote" name="short_description" value="{{old('short_description')}}"></textarea>
                          </div>

                          <div class="from-group">
                            <label>Długi opis</label>
                            <textarea class="summernote" name="long_description" value="{{old('long_description')}}"></textarea>
                          </div>

                          <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="inputStatus">Top</label>
                                  <select id="inputStatus" class="form-control" name="is_top">
                                      <option value="">Wybierz</option>
                                      <option value="1">Tak</option>
                                      <option value="0">Nie</option>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="inputStatus">BestSeller</label>
                                  <select id="inputStatus" class="form-control" name="is_best">
                                    <option value="">Wybierz</option>
                                    <option value="1">Tak</option>
                                    <option value="0">Nie</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          <div class="from-group">
                            <label>seo tytuł</label>
                            <input type="text" class="form-control" name='seo_title' value="{{old('seo_title')}}">
                          </div>

                          <div class="from-group">
                            <label>seo opis</label>
                            <textarea class="summernote" name="seo_description" value="{{old('seo_description')}}"></textarea>
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

@push('scripts')
            <script>
              $(document).ready(function() {
                $('body').on('change', '.main_category', function(e){
                  let id = $(this).val();
                  $.ajax({
                    method: 'GET',
                    url:"{{route('admin.product.get-subcategories')}}",
                    data:{
                      id:id
                    },
                    success: function(data){
                      console.log(data);
                      $('.sub_category').html('<option value="">Wybierz</option>')
                      $.each(data, function(i,item){
                        $('.sub_category').append(`<option value="${item.id}">${item.name}</option>`)
                      })
                    },
                    error: function(xhr, status, error){
                      console.log(error);
                    }
                  })
                })
              })
              /**sub category */
              $(document).ready(function() {
                $('body').on('change', '.sub_category', function(e){
                  let id = $(this).val();
                  $.ajax({
                    method: 'GET',
                    url:"{{route('admin.product.get-childcategories')}}",
                    data:{
                      id:id
                    },
                    success: function(data){
                      console.log(data);
                      $('.child_category').html('<option value="">Wybierz</option>')
                      $.each(data, function(i,item){
                        $('.child_category').append(`<option value="${item.id}">${item.name}</option>`)
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