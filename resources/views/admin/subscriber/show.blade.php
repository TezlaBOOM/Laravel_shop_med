@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Mail</h1>
          </div>

          <div class="section-body">
            <div class="invoice">
              <div class="invoice-print">
                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-md">
                            <tr>
                              <td>Nazwa użytkownika: </td>
                              <td>{{$mail->email}}</td>
                            </tr>
                            <tr>
                                <td>Temat: </td>
                                <td>{{$mail->title}}</td>
                            </tr>
                            <tr>
                                <td>Obrazek: </td>
                                <td>
                                    
                                    <img width="100px" src="{{asset($mail->image)}}" alt="{{$mail->alt}}">
                                </td>
                            
                              
                            </tr>
                            <tr>
                                <td>Zawartość: </td>
                                <td>{{$mail->content}}</td>
                            </tr>
                            <tr>
                                <td>Wysłane przez: </td>
                                <td>Wysłane przez {{$mail->user->name}}</td>
                            </tr>
                          </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </section>

@endsection