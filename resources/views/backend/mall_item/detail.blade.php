<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 detail_div">
    <div class="card card-figure add_detail" style="{{isset($the_detail) ? 'display: none' : ''}}">
        <a href="##" class="btn btn-rounded btn-success add_detail_icon"><i class="fas fa-plus-circle"></i>  新增品項</a>
    </div>
    <div class="card card-figure detail_data" style="{{isset($the_detail) ? '' : 'display: none'}}">
        <!-- .card-figure -->
        <figure class="figure">
            <!-- .figure-img -->
            <div class="figure-img" style="min-height: 80px">
                <input type="hidden" name="detail_id[]" value="{{$the_detail->id ?? 0}}" {{isset($the_detail) ? '' : 'disabled'}}>
                <input type="hidden" name="photo[]" value="{{$the_detail->photo ?? ''}}" {{isset($the_detail) ? '' : 'disabled'}}>
                <img class="img-fluid detail_img" src="{{isset($the_detail) && $the_detail->photo ? asset($the_detail->photo):asset('img/detail_1_1.png')}}" alt="Card image cap">
                {{-- <div class="figure-tools">
                    <a href="#" class="tile tile-circle tile-sm mr-auto">
                                    <span class="oi-data-transfer-download"></span></a>
                    <span class="badge badge-danger">Illustration</span>
                </div> --}}
                <div class="figure-action">
                    <a href="#" class="btn btn-block btn-sm btn-primary">圖片</a>
                    <input class="form-control" type="file" id="formFile" name="image[]" onchange="readURL(this);">
                </div>
            </div>
        </figure>
        <!-- /.card-figure -->
        <div class="card-body">
            <div class="form-group">
                <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">品項名稱</span></span>
                    @if($request->language == 'en')
                    <input type="text" placeholder="品項名稱(英文)" class="form-control" name="name_en[]" value="{{$the_detail->name_en ?? ''}}" {{isset($the_detail) ? '' : 'disabled'}}>
                    <input type="hidden" name="name_tw[]" value="{{$the_detail->name_tw ?? ''}}" {{isset($the_detail) ? '' : 'disabled'}}>
                    @else
                    <input type="text" placeholder="品項名稱" class="form-control" name="name_tw[]" value="{{$the_detail->name_tw ?? ''}}" {{isset($the_detail) ? '' : 'disabled'}}>
                    <input type="hidden" name="name_en[]" value="{{$the_detail->name_en ?? ''}}" {{isset($the_detail) ? '' : 'disabled'}}>
                    @endif
                </div>
                <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">庫存</span></span>
                    <input type="number" min="0" step=1 placeholder="庫存" class="form-control" name="stock[]" value="{{$the_detail->stock ?? ''}}" {{isset($the_detail) ? '' : 'disabled'}}>
                </div>
                <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">已購買量</span></span>
                    <input type="number" min="0" step=1 placeholder="已購買量" class="form-control" name="buy_stock[]" value="{{$the_detail->buy_stock ?? ''}}" {{isset($the_detail) ? '' : 'disabled'}}>
                </div>
            </div>
        </div>
        <a href="##" class="btn btn-danger delete_detail">刪除</a>
    </div>
</div>