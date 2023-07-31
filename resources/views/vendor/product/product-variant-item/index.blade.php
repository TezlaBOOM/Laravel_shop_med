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
            <div class="mb-3">
              <a href="{{route('vendor.product-variant.index', ['product' => $product->id])}}" class="btn btn-primary">Back</a>
            </div>
          <div class="row">
            <div class="col-12 ">
              <div class="card">
                <div class="card-header">
                  <h4>Lista Wariantów: {{$variant->name}}</h4>
                  <div class="card-header-action">
                      <a href="{{route('vendor.product-variant-item.create', ['productId'=>$product->id,'variantId'=>$variant->id])}}" class="btn btn-primary">Dodaj Wariant</a>
                  </div>
                </div>
                <div class="card-body">
                 {{$dataTable->table()}} 
                </div>

              </div>
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
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function(){
            $('body').on('click', '.change-status', function(){
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{route('vendor.product-variant-item.chages-status')}}",
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