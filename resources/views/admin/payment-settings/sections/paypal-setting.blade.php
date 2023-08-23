<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">

    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.paypal-setting.update',1)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Paypal Status</label>
                    <select name="status" id="" class="form-control">
                        <option {{$paypalSettings->status ===0 ?'selected':''}} value="0">Wyłączone</option>
                        <option {{$paypalSettings->status ===1 ?'selected':''}}value="1">Włączone</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Typ konta</label>
                    <select name="mode" id="" class="form-control">
                        <option {{$paypalSettings->mode ===0 ?'selected':''}} value="0">Sandbox</option>
                        <option {{$paypalSettings->mode ===1 ?'selected':''}} value="1">Produkcja</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kraj</label>
                    <select name="country_name" id="" class="form-control select2">
                        <option value="">Wybierz</option>
                        @foreach (config('settings.country_list') as $country)
                        <option {{$country === $paypalSettings->country_name ?'selected':''}} value="{{$country}}">{{$country}}</option> 
                        @endforeach
                       
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Waluta</label>
                    <select name="currency_name" id="" class="form-control select2">
                        <option value="">Wybierz</option>
                        @foreach (config('settings.currecy_list') as $key => $currency)
                        <option {{$currency === $paypalSettings->currency_name  ?'selected':''}} value="{{$currency}}">{{$key}}</option> 
                        @endforeach
                       
                    </select>
                </div>

                <div class="form-group">
                    <label>Kurs waluty (do PLN)</label>
                    <input type="text" class="form-control" name="currency_rate" value="{{$paypalSettings->currency_rate }}">
                </div>

                <div class="form-group">
                    <label>Paypal id kilenta</label>
                    <input type="text" class="form-control" name="client_id" value="{{$paypalSettings->client_id }}">
                </div>

                <div class="form-group">
                    <label>Paypal sekretny klucz<</label>
                    <input type="text" class="form-control" name="secret_key" value="{{$paypalSettings->secret_key }}">
                </div>


                <button type="submit" class="btn btn-primary">Zaktualizuj</button>
            </form>
        </div>
    </div>




</div>