@extends('admin.layouts.master')

@section('content')
          <!-- Main Content -->
          <section class="section">
            <div class="section-header">
              <h1>Subskrybencji</h1>
            </div>
    
            <div class="section-body">
    
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Wyślij mail do wszystkich</h4>
                    </div>
                    <div class="card-body">

                </div>
                    <div class="card-body">
                     <form action="{{route('admin.subscribers-send-mail')}}" method="POST"enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Temat</label>
                            <input type="text" class="form-control" name="subject">
                        </div>
                          <div class="form-group">
                              <label>Obrazek</label>
                              <input type="file" class="form-control" name="image">
                          </div>
                          <div class="form-group">
                              <label>Tekst alternatywny</label>
                              <input type="text" class="form-control" name="alttext" >
                          </div>
                          <div class="form-group">
                            <label for="">Url obrazka</label>
                            <input type="text" class="form-control" name="image_url">
                        </div>
                        <div class="form-group">
                          <label for="">Url oferty</label>
                          <input type="text" class="form-control" name="offer_url">
                      </div>
                        <div class="form-group">
                            <label for="">Wiadomość Html</label>
                            <textarea name="message"  class="form-control"></textarea>
                        </div>
                        <button class="btn btn-primary" style="submit">Wyślij</button>
                     </form>
                    </div>
    
                  </div>
                </div>
              </div>
    
            </div>
          </section>
    
            
@endsection
