<div class="tab-pane fade show" id="list-cod" role="tabpanel" aria-labelledby="list-cod-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.cod-setting.update', 1)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Płatność za pobnaiem</label>
                    <select name="status" id="" class="form-control">
                        <option {{$codSettings->status ===0 ?'selected':''}} value="0">Wyłączone</option>
                        <option {{$codSettings->status ===1 ?'selected':''}} value="1">Włączone</option>
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Zaktualizuj</button>
            </form>
        </div>
    </div>
</div>