@extends('admin.layouts.master')

@section('content')
          <!-- Main Content -->
            <section class="section">
              <div class="section-header">
                <h1>Produkt</h1>
              </div>
    
              <div class="section-body">
                
                <div class="row">
                  <div class="col-12 ">
                    <div class="card">
                      <div class="card-header">
                        <h4>Strwórz Marke</h4>
                      </div>
                      <div class="card-body">
                        <form action="{{route('admin.product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                            <div class="form-group">
                                <label>Podgląd Loga</label>
                                <br>
                               <img width="200" src="{{asset($product->thumb_image)}}" alt="">
                            </div>
                            <div class="form-group">
                                <label>Obrazek</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group">
                                <label>Nazwa</label>
                                <input type="text" class="form-control" name="name" value="{{$product->name}}" >
                            </div>

                            <div class = "row">
                              <div class="col-md-3">    
                                  <div class="form-group">
                                    <label for="inputStatus">Kategoria</label>
                                    <select id="inputStatus" class="form-control main_category" name="category">
                                        <option value="">Wybierz</option>
                                        @foreach ($categories as $category)
                                        <option {{$category->id == $product->category_id ? 'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach 
                                    </select>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                    <label for="inputStatus">Pod kategoria</label>
                                    <select id="inputStatus" class="form-control sub_category" name="sub_category">
                                        <option value="">Wybierz</option>
                                        @foreach ($subCategories as $subCategory)
                                        <option {{$subCategory->id == $product->sub_category_id ? 'selected':''}} value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                        @endforeach 
                                    </select>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="inputStatus">Pod pod kategoria</label>
                                  <select id="inputStatus" class="form-control child_category" name="child_category">
                                      <option value="">Wybierz</option>
                                      @foreach ($childCategories as $childCategory)
                                      <option {{$childCategory->id == $product->child_category_id ? 'selected':''}} value="{{$childCategory->id}}">{{$childCategory->name}}</option>
                                      @endforeach 
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
                                      <option {{$brand->id == $product->brand_id ? 'selected':''}}  value="{{$brand->id}}">{{$brand->name}}</option>
                                      @endforeach 
                                  </select>
                                </div>
                              </div>
                                <div class="col-md-4">
                                  <div class="from-group">
                                    <label>SKU</label>
                                    <input type="text" class="form-control" name='sku' value="{{$product->sku}}">
                                  </div>
                                
                              </div>
                            </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="from-group">
                                    <label>Cena Brutto</label>
                                    <input type="text" class="form-control" name='price' value="{{$product->price}}">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="from-group">
                                    <label>Ilość</label>
                                    <input type="number" min="0" class="form-control" name='qty' value="{{$product->qty}}">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="inputStatus">Na zamówienie</label>
                                    <select id="inputStatus" class="form-control" name="backorder">
                                        <option value="">Wybierz</option>
                                        <option {{$product->backorder == 0 ? 'selected': ''}} value="0">Na zamówienie</option>
                                        <option {{$product->backorder == 1 ? 'selected': ''}} value="1">Wycofane</option>
                                        <option {{$product->backorder == 2 ? 'selected': ''}} value="2">4 dni</option>
                                        <option {{$product->backorder == 3 ? 'selected': ''}} value="3">7 dni</option>
                                        <option {{$product->backorder == 4 ? 'selected': ''}} value="4">14 dni</option>
                                    </select>
                                  </div>
                                </div>
                              </div>


                            <div class="row">
                              <div class = "col-md-4">
                            <div class="from-group">
                              <label>Cena Promocyjna</label>
                              <input type="text" class="form-control" name='offer_price' value="{{$product->offer_price}}">
                            </div>
                          </div>
                              <div class = "col-md-4">
                                <div class="from-group">
                                  <label>Od kiedy</label>
                                  <input type="text" class="form-control datepicker" name='offer_start_date' value="{{$product->offer_start_date}}">
                                </div>
                              </div>
                              <div class = "col-md-4">
                                <div class="from-group">
                                  <label>Do kiedy</label>
                                  <input type="text" class="form-control datepicker" name='offer_end_date' value="{{$product->offer_end_date}}">
                                </div>
                              </div>
                            </div>




                          <div class="from-group">
                            <label>Link do wideo</label>
                            <input type="text" class="form-control" name='video_link' value="{{$product->video_link}}">
                          </div>
                          
                          <div class="from-group">
                            <label>Krótki opis</label>
                            <textarea class="summernote" name="short_description" value="">{!!$product->short_description!!}</textarea>
                          </div>

                          <div class="from-group">
                            <label>Długi opis</label>
                            <textarea class="summernote" name="long_description" value="">{!!$product->long_description!!}</textarea>
                          </div>

                                <div class="form-group">
                                  <label for="inputStatus">Typ produktu</label>
                                  <select id="inputStatus" class="form-control" name="product_type">
                                      <option value="">Wybierz</option>
                                      <option {{$product->product_type == 'new_arrival' ? 'selected': ''}} value="new_arrival">Nowość</option>
                                      <option {{$product->product_type == 'featured_product' ? 'selected': ''}} value="featured_product">Wyróżniony</option>
                                      <option {{$product->product_type == 'top_product' ? 'selected': ''}} value="top_product">Top produkt</option>
                                      <option {{$product->product_type == 'best_product' ? 'selected': ''}} value="best_product">Bestseller</option>
                                  </select>
                                </div>

                          <div class="from-group">
                            <label>seo tytuł</label>
                            <input type="text" class="form-control" name='seo_title' value="{{$product->seo_title}}">
                          </div>

                          <div class="from-group">
                            <label>seo opis</label>
                            <textarea class="summernote" name="seo_description" value="">{!! $product->seo_description !!}</textarea>
                          </div>

                        
                            {{-- <div class="form-group">
                                <label for="inputStatus">Pokazuje się</label>
                                <select id="inputStatus" class="form-control" name="is_featured">
                                    <option value="">Wybierz</option>
                                    <option {{$product->is_featured == 1 ? 'selected': ''}} value="1">Tak</option>
                                    <option {{$product->is_featured == 0 ? 'selected': ''}} value="0">Nie</option>
                                </select>
                            </div> --}}

                            <div class="form-group">
                                <label for="inputStatus">Status</label>
                                <select id="inputStatus" class="form-control" name="status">
                                    <option {{$product->status == 1 ? 'selected': ''}} value="1">Aktywny</option>
                                    <option {{$product->status == 0 ? 'selected': ''}} value="0">Nieaktywny</option>
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
                  $('.child_category').html('<option value="">Wybierz</option>')
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