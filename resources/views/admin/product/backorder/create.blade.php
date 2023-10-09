@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Backorder</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Dodanie Backorder</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.backorder.store')}}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label>Nazwa:</label>
                                    <input type="text" class="form-control" name="name" value="">
                                </div>

                                <div class="form-group">
                                  <label for="inputStatus">Sprzedawać</label>
                                  <select id="inputStatus" class="form-control" name="sell">
                                      <option value="1">Tak</option>
                                      <option value="0">Nie</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                <label for="inputStatus">Blokować Sprzedawać poniżej stanu</label>
                                <select id="inputStatus" class="form-control" name="block">
                                    <option value="1">Tak</option>
                                    <option value="0">Nie</option>
                                </select>
                                </div>


                                <button type="submmit" class="btn btn-primary">Zapisz</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
