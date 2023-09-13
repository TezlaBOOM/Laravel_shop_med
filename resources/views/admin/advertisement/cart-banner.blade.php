<div class="tab-pane fade" id="list-cart" role="tabpanel" aria-labelledby="list-cart-list">
<div class="card border">
    <div class="card-body">
        <form action="{{route('admin.cart-banner')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <h3>Banner 1</h3>
                <label for="">Status</label>
                <br>
                <label class="custom-switch mt-2">
                
                    <input type="checkbox" {{@$cart_banner->banner_one->status == 1 ? 'checked':''}} name="banner_one_status" class="custom-switch-input" >
                    <span class="custom-switch-indicator"></span>
                </label>
            </div>
            <div class="form-group">
                <img src="{{asset(@$cart_banner->banner_one->banner_image)}}" alt="" width="150px">
            </div>
            <div class="form-group">

                <label>Banner</label>
                <input type="file" class="form-control" name="banner_one_banner_image" value="">
                <input type="hidden" class="form-control" name="banner_one_banner_old_image" value="{{@$cart_banner->banner_one->banner_image}}">
            </div>
            <div class="form-group">
                <label>Banner url</label>
                <input type="text" class="form-control" name="banner_one_banner_url" value="{{@$cart_banner->banner_one->banner_url}}">
            </div>

            <div class="form-group">
                <h3>Banner 2</h3>
                <label for="">Status</label>
                <br>
                <label class="custom-switch mt-2">
                
                    <input type="checkbox" {{@$cart_banner->banner_two->status == 1 ? 'checked':''}} name="banner_two_status" class="custom-switch-input" >
                    <span class="custom-switch-indicator"></span>
                </label>
            </div>
            <div class="form-group">
                <img src="{{asset(@$cart_banner->banner_two->banner_image)}}" alt="" width="150px">
            </div>
            <div class="form-group">

                <label>Banner</label>
                <input type="file" class="form-control" name="banner_two_banner_image" value="">
                <input type="hidden" class="form-control" name="banner_two_banner_old_image" value="{{@$cart_banner->banner_two->banner_image}}">
            </div>
            <div class="form-group">
                <label>Banner url</label>
                <input type="text" class="form-control" name="banner_two_banner_url" value="{{@$cart_banner->banner_two->banner_url}}">
            </div>


            <button type="submit" class="btn btn-primary">Zaktualizuj</button>
        </form>
    </div>
</div>
</div>
