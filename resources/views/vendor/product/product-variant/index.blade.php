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
          <div class="mb-3">
            <a href="{{route('vendor.product.index')}}" class="btn btn-primary">Powrót</a>
         </div>
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Wariant produktu</h3>
            <h6>Produkt: {{$product->name}}</h6>
            <div class="create_button">
                <a href="{{route('vendor.product-variant.create', ['product' => $product->id])}}" class="btn btn-primary"><i class="fas fa-plus"></i> Create Variant</a>
            </div>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                {{ $dataTable->table() }}
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
                    url: "{{route('vendor.products-variant.change-status')}}",
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

