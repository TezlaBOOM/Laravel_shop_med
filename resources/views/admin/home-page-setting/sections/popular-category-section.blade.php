@php
    $popularCategorySection = json_decode($popularCategorySection->value);
@endphp

<div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">

    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.popular-category-setting')}}" method="POST">
                @csrf
                @method('PUT')
                <h5>Kategoria 1 </h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Kategoria główna</label>
                            <select name="cat_one" class="form-control main-category">
                                <option value="">wybierz</option>
                                @foreach ( $categories as $category)
                                    <option {{$category->id == $popularCategorySection[0]->category ? 'selected':""}} value="{{$category->id}}">{{$category->name}}</option>  
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $subCategories = \App\Models\SubCategory::where('category_id', $popularCategorySection[0]->category)->get();
                            @endphp
                            <label>Pod kategoria</label>
                            <select name="sub_cat_one" id="" class="form-control sub-category">
                                <option value="">wybierz</option>
                                @foreach ($subCategories as $subCategory)
                                <option {{$subCategory->id == $popularCategorySection[0]->sub_category ? 'selected':""}} value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @php
                        $childCategories = \App\Models\ChildCategory::where('sub_category_id', $popularCategorySection[0]->sub_category)->get();
                        @endphp
                        <div class="form-group">
                            <label>Pod pod kategoria</label>
                            <select name="child_cat_one" id="" class="form-control child-category">
                                <option value="">wybierz</option>
                                @foreach ($childCategories as $childCategory)
                                 <option {{$childCategory->id == $popularCategorySection[0]->child_category ? 'selected':""}} value="{{$childCategory ->id}}">{{$childCategory ->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <h5>Kategoria 2 </h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Kategoria główna</label>
                            <select name="cat_two" class="form-control main-category">
                                <option value="">wybierz</option>
                                @foreach ( $categories as $category)
                                    <option {{$category->id == $popularCategorySection[1]->category ? 'selected':""}} value="{{$category->id}}">{{$category->name}}</option>  
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $subCategories = \App\Models\SubCategory::where('category_id', $popularCategorySection[1]->category)->get();
                            @endphp
                            <label>Pod kategoria</label>
                            <select name="sub_cat_two" id="" class="form-control sub-category">
                                <option value="">wybierz</option>
                                @foreach ($subCategories as $subCategory)
                                <option {{$subCategory->id == $popularCategorySection[1]->sub_category ? 'selected':""}} value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @php
                        $childCategories = \App\Models\ChildCategory::where('sub_category_id', $popularCategorySection[1]->sub_category)->get();
                        @endphp
                        <div class="form-group">
                            <label>Pod pod kategoria</label>
                            <select name="child_cat_two" id="" class="form-control child-category">
                                <option value="">wybierz</option>
                                @foreach ($childCategories as $childCategory)
                                 <option {{$childCategory->id == $popularCategorySection[1]->child_category ? 'selected':""}} value="{{$childCategory ->id}}">{{$childCategory ->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <h5>Kategoria 3 </h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Kategoria główna</label>
                            <select name="cat_three" class="form-control main-category">
                                <option value="">wybierz</option>
                                @foreach ( $categories as $category)
                                    <option {{$category->id == $popularCategorySection[2]->category ? 'selected':""}} value="{{$category->id}}">{{$category->name}}</option>  
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $subCategories = \App\Models\SubCategory::where('category_id', $popularCategorySection[2]->category)->get();
                            @endphp
                            <label>Pod kategoria</label>
                            <select name="sub_cat_three" id="" class="form-control sub-category">
                                <option value="">wybierz</option>
                                @foreach ($subCategories as $subCategory)
                                <option {{$subCategory->id == $popularCategorySection[2]->sub_category ? 'selected':""}} value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @php
                        $childCategories = \App\Models\ChildCategory::where('sub_category_id', $popularCategorySection[2]->sub_category)->get();
                        @endphp
                        <div class="form-group">
                            <label>Pod pod kategoria</label>
                            <select name="child_cat_three" id="" class="form-control child-category">
                                <option value="">wybierz</option>
                                @foreach ($childCategories as $childCategory)
                                 <option {{$childCategory->id == $popularCategorySection[2]->child_category ? 'selected':""}} value="{{$childCategory ->id}}">{{$childCategory ->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <h5>Kategoria 4 </h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Kategoria główna</label>
                            <select name="cat_four" class="form-control main-category">
                                <option value="">wybierz</option>
                                @foreach ( $categories as $category)
                                    <option {{$category->id == $popularCategorySection[3]->category ? 'selected':""}} value="{{$category->id}}">{{$category->name}}</option>  
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $subCategories = \App\Models\SubCategory::where('category_id', $popularCategorySection[3]->category)->get();
                            @endphp
                            <label>Pod kategoria</label>
                            <select name="sub_cat_four" id="" class="form-control sub-category">
                                <option value="">wybierz</option>
                                @foreach ($subCategories as $subCategory)
                                <option {{$subCategory->id == $popularCategorySection[3]->sub_category ? 'selected':""}} value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @php
                        $childCategories = \App\Models\ChildCategory::where('sub_category_id', $popularCategorySection[3]->sub_category)->get();
                        @endphp
                        <div class="form-group">
                            <label>Pod pod kategoria</label>
                            <select name="child_cat_four" id="" class="form-control child-category">
                                <option value="">wybierz</option>
                                @foreach ($childCategories as $childCategory)
                                 <option {{$childCategory->id == $popularCategorySection[3]->child_category ? 'selected':""}} value="{{$childCategory ->id}}">{{$childCategory ->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Zaktualizuj</button>
            </form>
        </div>
    </div>

</div>

@push('scripts')
            <script>
              $(document).ready(function() {
                $('body').on('change', '.main-category', function(e){
                  let id = $(this).val();
                  let row = $(this).closest('.row');
                  $.ajax({
                    method: 'GET',
                    url:"{{route('admin.get-subcategories')}}",
                    data:{
                      id:id
                    },
                    success: function(data){
                      let selector = row.find('.sub-category')
                     selector.html('<option value="">Wybierz</option>')
                      $.each(data, function(i,item){
                        selector.append(`<option value="${item.id}">${item.name}</option>`)
                      })
                    },
                    error: function(xhr, status, error){
                      console.log(error);
                    }
                  })
                })
              })

              $(document).ready(function() {
                $('body').on('change', '.sub-category', function(e){
                  let id = $(this).val();
                  let row = $(this).closest('.row');
                  $.ajax({
                    method: 'GET',
                    url:"{{route('admin.product.get-childcategories')}}",
                    data:{
                      id:id
                    },
                    success: function(data){
                        let selector = row.find('.child-category')
                        selector.html('<option value="">Wybierz</option>')
                      $.each(data, function(i,item){
                        selector.append(`<option value="${item.id}">${item.name}</option>`)
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