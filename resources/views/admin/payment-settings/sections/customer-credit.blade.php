<div class="tab-pane fade show" id="list-customer-credit" role="tabpanel" aria-labelledby="list-customer-credit-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.customer-credit-setting.update', 1)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Odroczona płtatność</label>
                    <select name="status" id="" class="form-control">
                        <option {{$customerCreditSettings->status ===0 ?'selected':''}} value="0">Wyłączone</option>
                        <option {{$customerCreditSettings->status ===1 ?'selected':''}} value="1">Włączone</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Zaktualizuj</button>
            </form>
        </div>
    </div>
</div>