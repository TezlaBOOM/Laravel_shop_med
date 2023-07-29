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
                        <h4>Strwórz Sprzedawce</h4>
                      </div>
                      <div class="card-body">
                        <form action="{{route('admin.vendor-profile.store')}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            <div class="form-group">
                              <label>Podgląd</label>
                              <br>
                              <img width="200px" type="file" src="{{asset($profile->banner)}}" alt="" />
                          </div>
                            <div class="form-group">
                                <label>Baner</label>
                                <input type="file" class="form-control" name="banner">
                            </div>
                            <div class="form-group wsus__input">
                              <label>Nazwa sklepu</label>
                              <input type="text" class="form-control" name="shop_name" value="{{$profile->shop_name}}">
                          </div>
                            <div class="form-group">
                                <label>Telefon</label>
                                <input type="text" class="form-control" name="phone" value="{{$profile->phone}}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{$profile->email}}">
                            </div>
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" class="form-control" name="nip" value="{{$profile->nip}}">
                            </div>
                            <div class="form-group">
                                <label>adres</label>
                                <input type="text" class="form-control" name="address" value="{{$profile->address}}">
                            </div>
                            <div class="form-group">
                                <label>Opis</label>
                                <textarea class="summernote" name="description">{{$profile->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="text" class="form-control" name="fb_link" value="{{$profile->fb_link}}">
                            </div>
                            <div class="form-group">
                                <label>twiter</label>
                                <input type="text" class="form-control" name="tw_link" value="{{$profile->tw_link}}">
                            </div>
                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="text" class="form-control" name="inst_link" value="{{$profile->inst_link}}">
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