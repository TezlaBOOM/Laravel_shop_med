@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>O nas</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product-policy.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Tytuł 1</label>
                                    <input type="text" class="form-control" name="title1" max="100"
                                        value="{!! @$policybox1->title !!}">
                                    <label>Zawartość 1</label>
                                    <textarea name="content1" class="summernote">{!! @$policybox1->content !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tytuł 2</label>
                                    <input type="text" class="form-control" name="title2" max="100"
                                        value="{!! @$policybox2->title !!}">
                                    <label>Zawartość 2</label>
                                    <textarea name="content2" class="summernote">{!! @$policybox2->content !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tytuł 3</label>
                                    <input type="text" class="form-control" name="title3" max="100"
                                        value="{!! @$policybox3->title !!}">
                                    <label>Zawartość 3</label>
                                    <textarea name="content3" class="summernote">{!! @$policybox3->content !!}</textarea>
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
