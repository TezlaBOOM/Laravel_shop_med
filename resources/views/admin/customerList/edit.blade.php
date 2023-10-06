@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Lista użytkowników</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Wszyscy użytkownicy</h4>
                        </div>
                        <div class="card-body">

                          
                            <form action="{{route('admin.customer.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                               
                                <div class="form-group">
                                    <img src="{{asset($user->image)}}" alt="">
                                    <br>
                                    <label>Obrazek</label>
                                    <input type="file" class="form-control" name="image">
                                </div>

                                <div class="form-group">
                                    <label>nazwa</label>
                                    <input id="name" class="form-control" name="name" type="text"
                                        value="{{ $user->name }}">
                                </div>

                                <div class="form-group">
                                    <label>nazwa użytkownia</label>
                                    <input id="name" class="form-control" name="username" type="text"
                                        value="{{ $user->username }}">
                                </div>

                                <div class="form-group">
                                    <label>nip</label>
                                    <input id="nip" class="form-control" name="nip" type="text"
                                        value="{{ $user->nip }}">
                                </div>
                                <div class="form-group">
                                    <label>telefon</label>
                                    <input id="phome" class="form-control" name="phone" type="text"
                                        value="{{ $user->phone }}">
                                </div>
                                <div class="form-group">
                                    <label>email</label>
                                    <input id="email" class="form-control" name="email" type="email"
                                        value="{{ $user->email }}">
                                </div>


                                <div class="form-group">
                                    <label for="inputState">Role</label>
                                    <select id="inputState" class="form-control" name="role">
                                        
                                      <option {{$user->role == 'user' ? 'selected' : ''}}  value="user">Użytkownik</option>
                                      <option {{$user->role == 'vendor' ? 'selected' : ''}}  value="vendor">Sprzedawca</option>
                                      <option {{$user->role == 'admin' ? 'selected' : ''}}  value="admin">Admin</option>
        
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="inputState">Status</label>

                                        <select id="inputState" class="form-control" name="status">
                                          <option {{$user->status == 1 ? 'selected' : ''}} value="1">Aktywny</option>
                                          <option {{$user->status == 0 ? 'selected' : ''}} value="0">Nie aktywny</option>
                                        </select>
                                
                                </div>



                                <button type="submmit" class="btn btn-primary">Zaktualizuj</button>
                            </form>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Wszyscy użytkownicy</h4>
                                </div>
                                <div class="card-body">

                                    {{-- //{{route('admin.blog.update', $blog->id)}} --}}
                                    <form action="{{route('admin.customer.update.password', $user->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                      

                                        <div class="form-group">
                                            <label>nazwa</label>
                                            <input name="password" class="form-control" type="password"
                                                placeholder="New Password">
                                        </div>


                                        <div class="form-group">
                                            <label>nazwa</label>
                                            <input name="password_confirmation" class="form-control" type="password"
                                                placeholder="Confirm Password">
                                        </div>




                                        <button type="submmit" class="btn btn-primary">Zaktualizuj</button>
                                    </form>

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
