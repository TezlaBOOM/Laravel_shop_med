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
                    <div class="container">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="card-body">
                                  <a href="{{route('admin.subscribers.newsletter')}}" class="btn btn-block btn-primary">newsletter</a>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="card-body">

                                  <a href="{{route('admin.subscribers.pricelist')}}" class="btn btn-block btn-primary">Cennik</a>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>

    
                  </div>
                </div>
              </div>
    
            </div>
          </section>
            <section class="section">
              <div class="section-header">
                <h1>Subskrybencji</h1>
              </div>
    
              <div class="section-body">
                
                <div class="row">
                  <div class="col-12 ">
                    <div class="card">
                      <div class="card-header">
                        <h4>Lista subskrybentów</h4>
                      </div>
                      <div class="card-body">
                       {{$dataTable->table()}} 
                      </div>

                    </div>
                  </div>

                </div>
              </div>
            </section>
            
            
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush