@extends('admin.layouts.master')

@section('content')
          <!-- Main Content -->
            <section class="section">
              <div class="section-header">
                <h1>Szybkie wyprzedaże</h1>
              </div>
    
              <div class="section-body">                
                <div class="row">
                  <div class="col-12 ">
                    <div class="card">
                      <div class="card-header">
                        <h4>Koniec oferty</h4>
                      </div>
                      <div class="card-body">
                        <form action="{{route('admin.flash-sale.update')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="">
                                <div class="form-group">
                                    <label>Sale End Date</label>
                                    <input type="text" class="form-control datepicker" name="end_date" value="{{@$flashSaleDate->end_date}}">
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="section-body">

                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4>Dodawanie produktów</h4>
    
                      </div>
                      <div class="card-body">
                        <form action="{{route('admin.flash-sale.add-product')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Dodaj produkt</label>
                                <select name="product" id="" class="form-control select2">
                                    <option value="">Wybierz</option>
                                    @foreach ($products as $product)
                                    <option value="{{$product->id}}">{{$product->sku}} | {{$product->name}}</option>
                                    @endforeach
    
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ma się pokazywać na stronie głównej?</label>
                                        <select name="show_at_home" id="" class="form-control">
                                            <option value="">Wybierz</option>
                                            <option value="1">Tak</option>
                                            <option value="0">Nie</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="">Wybierz</option>
                                            <option value="1">Aktywny</option>
                                            <option value="0">Nie aktywny</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Zapisz</button>
    
                        </form>
                      </div>
    
                    </div>
                  </div>
                </div>
              
              <div class="section-body">                
                <div class="row">
                  <div class="col-12 ">
                    <div class="card">
                      <div class="card-header">
                        <h4>Wszystkie produkty na wyprzedaż Produktów</h4>
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

    <script>
        $(document).ready(function(){
            // chage the flash sale status
            $('body').on('click', '.change-status', function(){
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{route('admin.flash-sale-status')}}",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success: function(data){
                        toastr.success(data.message)
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                })

            })

            // chage show at home status
            $('body').on('click', '.change-at-home-status', function(){
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{route('admin.flash-sale.show-at-home.change-status')}}",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success: function(data){
                        toastr.success(data.message)
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                })

            })
        })
    </script>
@endpush
