@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
      <section class="section">
        <div class="section-header">
          <h1>Lista użytkowników</h1>
        </div>
        <div class="mb-3">
          <a href="{{route('admin.customers.index')}}" class="btn btn-primary">Powrót</a>
       </div>
        <div class="section-body">
          
          <div class="row">
            <div class="col-12 ">
              <div class="card">
                <div class="card-header">
                  <h4>Wszyscy adresy użytkownika</h4>
                  
                  <div class="card-header-action">
                    <a href="{{route('admin.customer.address.create',$addresses->id)}}" class="btn btn-primary">Dodaj adres</a>
                </div>
              </div>
                  <div class="card-body">
                    {{ $dataTable->table() }}
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
