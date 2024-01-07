@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Blog</h1>

          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Blog</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.blog.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Obrazek</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group">
                            <label>Tytuł</label>
                            <input type="text" class="form-control" name="title" value="{{old('title')}}">
                        </div>


                        <div class="form-group">
                            <label for="inputState">Kategoria</label>
                            <select id="inputState" class="form-control main-category" name="category">
                                <option value="">Wybierz</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Opis</label>
                            <textarea name="description" class="form-control summernote"></textarea>
                        </div>



                        <div class="form-group">
                            <label>Seo tytuł</label>
                            <input type="text" class="form-control" name="seo_title" value="{{old('seo_title')}}">
                        </div>

                        <div class="form-group">
                            <label>Seo opis</label>
                            <textarea name="seo_description" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                              <option value="1">Aktywny</option>
                              <option value="0">Nieaktywny</option>
                            </select>
                        </div>
                        <button type="submmit" class="btn btn-primary">Stwórz</button>
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

    </script>
@endpush
