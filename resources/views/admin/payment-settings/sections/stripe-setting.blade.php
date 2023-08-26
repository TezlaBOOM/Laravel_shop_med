<div class="tab-pane fade show" id="list-stripe" role="tabpanel" aria-labelledby="list-stripe-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.stripe-setting.update', 1)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Stripe Status</label>
                    <select name="status" id="" class="form-control">
                        <option {{$stripeSettings->status ===0 ?'selected':''}} value="0">Wyłączone</option>
                        <option {{$stripeSettings->status ===1 ?'selected':''}}value="1">Włączone</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Typ konta</label>
                    <select name="mode" id="" class="form-control">
                        <option {{$stripeSettings->mode ===0 ?'selected':''}} value="0">Sandbox</option>
                        <option {{$stripeSettings->mode ===1 ?'selected':''}} value="1">Produkcja</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kraj</label>
                    <select name="country_name" id="" class="form-control select2">
                        <option value="">Wybierz</option>
                        @foreach (config('settings.country_list') as $country)
                        <option {{$country === $stripeSettings->country_name ?'selected':''}} value="{{$country}}">{{$country}}</option> 
                        @endforeach
                       
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Waluta</label>
                    <select name="currency_name" id="" class="form-control select2">
                        <option value="">Wybierz</option>
                        @foreach (config('settings.currecy_list') as $key => $currency)
                        <option {{$currency === $stripeSettings->currency_name  ?'selected':''}} value="{{$currency}}">{{$key}}</option> 
                        @endforeach
                       
                    </select>
                </div>

                <div class="form-group">
                    <label>Kurs waluty (do {{$settings->currency_name}})</label>
                    <input type="text" class="form-control" name="currency_rate" value="{{$stripeSettings->currency_rate }}">
                </div>

                <div class="form-group">
                    <label>Stripe id kilenta</label>
                    <input type="text" class="form-control" name="client_id" value="{{$stripeSettings->client_id }}">
                </div>

                <div class="form-group">
                    <label>Stripe sekretny klucz<</label>
                    <input type="text" class="form-control" name="secret_key" value="{{$stripeSettings->secret_key }}">
                </div>


                <button type="submit" class="btn btn-primary">Zaktualizuj</button>
            </form>
        </div>
    </div>




</div>