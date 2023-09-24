@extends('admin.layouts.master')

@section('content')
          <!-- Main Content -->
            <section class="section">
              <div class="section-header">
                <h1>Ustawienia</h1>
              </div>
    
              <div class="section-body">
                
                <div class="row">
                  <div class="col-12 ">
                    <div class="card">

                      <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                              <h4>Metody płatności</h4>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-2">
                                  <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab">PayPal</a>
                                    <a class="list-group-item list-group-item-action" id="list-stripe-list" data-toggle="list" href="#list-stripe" role="tab">Stripe</a>
                                    <a class="list-group-item list-group-item-action" id="list-cod-list" data-toggle="list" href="#list-cod" role="tab">Płatność za pobnaiem</a>
                                    <a class="list-group-item list-group-item-action" id="list-customer-credit-list" data-toggle="list" href="#list-customer-credit" role="tab">Kredyt kupiecki</a>

                                  </div>
                                </div>
                                <div class="col-10">
                                  <div class="tab-content" id="nav-tabContent">

                                    @include('admin.payment-settings.sections.paypal-setting')
        
                                    @include('admin.payment-settings.sections.stripe-setting')

                                    @include('admin.payment-settings.sections.cod')

                                    @include('admin.payment-settings.sections.customer-credit')

                                  </div>
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
            
@endsection
