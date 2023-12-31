@extends('admin.layouts.master')

@section('content')
          <!-- Main Content -->
            <section class="section">
              <div class="section-header">
                <h1>Ustawienia strony głównej</h1>
              </div>
    
              <div class="section-body">
                
                <div class="row">
                  <div class="col-12 ">
                    <div class="card">

                      <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                              <h4>JavaScript Behavior</h4>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-2">
                                  <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab">Popularne kategorie</a>
                                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab">Slider kategori 1</a>
                                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab">Slider kategori 2</a>
                                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-slider-three" role="tab">Slider kategori 3</a>

                                  </div>
                                </div>
                                <div class="col-10">
                                  <div class="tab-content" id="nav-tabContent">
                                      @include('admin.home-page-setting.sections.popular-category-section')
                                      @include('admin.home-page-setting.sections.product-slider-section-one')
                                      @include('admin.home-page-setting.sections.product-slider-section-two')
                                      @include('admin.home-page-setting.sections.product-slider-section-three')
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
