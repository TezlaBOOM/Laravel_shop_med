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
                            <h4>Wyślij mail o Cenniku</h4>
                        </div>
                        <div class="card-body">
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.subscribers-send-mail-pricelist') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Temat</label>
                                    <input type="text" class="form-control" name="subject">
                                </div>
                                <div class="form-group">
                                    <label>Poczotek przedziału</label>
                                    <input type="text" class="form-control datepicker" name="startDate">
                                </div>
                                <div class="form-group">
                                    <label>Koniec przedziału</label>
                                    <input type="text" class="form-control datepicker" name="endDate">
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
