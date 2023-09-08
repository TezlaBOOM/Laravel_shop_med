@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Stopka</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Stopka Info</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.footer-info.update', 1) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <img src="{{ asset(@$footerInfo->logo) }}" width="150px" alt="">
                                    <br>
                                    <label>Stopka Logo</label>
                                    <input type="file" class="form-control" name="logo">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Telefon</label>
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ @$footerInfo->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input type="text" class="form-control" name="nip"
                                                value="{{ @$footerInfo->nip }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email"
                                        value="{{ @$footerInfo->email }}">
                                </div>


                                <div class="form-group">
                                    <label>Adres</label>
                                    <input type="text" class="form-control" name="address"
                                        value="{{ @$footerInfo->address }}">
                                </div>

                                <div class="form-group">
                                    <label>copyright</label>
                                    <input type="text" class="form-control" name="copyright"
                                        value="{{ @$footerInfo->copyright }}">
                                </div>

                                <button type="submmit" class="btn btn-primary">Zaktualizuj</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
