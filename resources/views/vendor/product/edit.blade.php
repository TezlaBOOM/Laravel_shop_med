

@extends('vendor.layouts.master')

@section('content')


  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
        @include('vendor.layouts.siderbar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Produkty</h3>
            <div class="row">
              <div class="col-12 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Strwórz Produkt</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('vendor.product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                        <div class="form-group wsus__input">
                            <label>Podgląd Loga</label>
                            <br>
                           <img width="200" src="{{asset($product->thumb_image)}}" alt="">
                        </div>
                        <div class="form-group wsus__input">
                            <label>Obrazek</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group wsus__input">
                            <label>Nazwa</label>
                            <input type="text" class="form-control" name="name" value="{{$product->name}}" >
                        </div>


                        <div class = "row">
                          <div class="col-md-3">    
                              <div class="form-group wsus__input">
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
                              <div class="form-group wsus__input">
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
                            <div class="form-group wsus__input">
                              <label for="inputStatus">Pod pod kategoria</label>
                              <select id="inputStatus" class="form-control child_category" name="child_category">
                                  
                                  @foreach ($childCategories as $childCategory)
                                  <option {{$childCategory->id == $product->child_category_id ? 'selected':''}} value="{{$childCategory->id}}">{{$childCategory->name}}</option>
                                  @endforeach 
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group wsus__input">
                              <label for="inputStatus">Marka</label>
                              <select id="inputStatus" class="form-control" name="brand">
                                 
                                  @foreach ($brands as $brand)
                                  <option {{$brand->id == $product->brand_id ? 'selected':''}}  value="{{$brand->id}}">{{$brand->name}}</option>
                                  @endforeach 
                              </select>
                            </div>
                          </div>
                            <div class="col-md-4">
                              <div class="from-group wsus__input">
                                <label>SKU</label>
                                <input type="text" class="form-control" name='sku' value="{{$product->sku}}">
                              </div>
                            
                          </div>
                        </div>
                          <div class="row">
                            <div class="col-md-3">
                              <div class="from-group wsus__input">
                                <label>Cena Brutto</label>
                                <input type="text" class="form-control" name='price' value="{{$product->price}}">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group wsus__input">
                                <label for="inputStatus">Vat:</label>
                                <select id="inputStatus" class="form-control" name="vat">
                                    
                                    <option {{$product->vat == 0 ? 'selected': ''}} value="0">0</option>
                                    <option {{$product->vat == 1 ? 'selected': ''}} value="1">5</option>
                                    <option {{$product->vat == 2 ? 'selected': ''}} value="2">8</option>
                                    <option {{$product->vat == 3 ? 'selected': ''}} value="3">23</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="from-group wsus__input">
                                <label>Ilość</label>
                                <input type="number" min="0" class="form-control" name='qty' value="{{$product->qty}}">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group wsus__input">
                                <label for="inputStatus">Na zamówienie</label>
                                <select id="inputStatus" class="form-control" name="backorder">
                              
                                  @foreach ($backorders as $backorder)
                                  <option {{$product->backorder == $backorder->id ? 'selected': ''}}  value="{{$backorder->id}}">{{$backorder->name}}</option>
                                  @endforeach 
                                </select>
                              </div>
                            </div>
                          </div>


                        <div class="row">
                          <div class = "col-md-4">
                        <div class="from-group wsus__input">
                          <label>Cena Promocyjna</label>
                          <input type="text" class="form-control" name='offer_price' value="{{$product->offer_price}}">
                        </div>
                      </div>
                          <div class = "col-md-4">
                            <div class="from-group wsus__input">
                              <label>Od kiedy</label>
                              <input type="text" class="form-control datepicker" name='offer_start_date' value="{{$product->offer_start_date}}">
                            </div>
                          </div>
                          <div class = "col-md-4">
                            <div class="from-group wsus__input">
                              <label>Do kiedy</label>
                              <input type="text" class="form-control datepicker" name='offer_end_date' value="{{$product->offer_end_date}}">
                            </div>
                          </div>
                        </div>




                      <div class="from-group wsus__input">
                        <label>Link do wideo</label>
                        <input type="text" class="form-control" name='video_link' value="{{$product->video_link}}">
                      </div>
                      
                      <div class="from-group wsus__input">
                        <label>Krótki opis</label>
                        <textarea class="summernote" name="short_description" value="">{!!$product->short_description!!}</textarea>
                      </div>

                      <div class="from-group wsus__input">
                        <label>Długi opis</label>
                        <textarea class="summernote" name="long_description" value="">{!!$product->long_description!!}</textarea>
                      </div>


                      <div class="from-group wsus__input">
                        <label>seo tytuł</label>
                        <input type="text" class="form-control" name='seo_title' value="{{$product->seo_title}}">
                      </div>

                      <div class="from-group wsus__input">
                        <label>seo opis</label>
                        <textarea class="summernote" name="seo_description" value="">{!! $product->seo_description !!}</textarea>
                      </div>


                        <div class="form-group wsus__input">
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
            <div class="wsus__dashboard_profile">
              <div class="card-body">
               
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->



@endsection


@push('scripts')
            <script>
              $(document).ready(function() {
                $('body').on('change', '.main_category', function(e){
                  $('.child_category').html('<option value="">Wybierz</option>')
                  let id = $(this).val();
                  $.ajax({
                    method: 'GET',
                    url:"{{route('vendor.product.get-subcategories')}}",
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
                    url:"{{route('vendor.product.get-childcategories')}}",
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