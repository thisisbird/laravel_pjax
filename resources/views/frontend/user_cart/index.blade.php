@extends('frontend.layout.app')
@section('content')
<section class="cd-timeline js-cd-timeline">
    <div class="cd-timeline__container">
        <div class="cd-timeline__block js-cd-block">
            <div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
                <img src="{{asset('concept')}}/assets/vendor/timeline/img/cd-icon-picture.svg" alt="Picture">
            </div>
            <!-- cd-timeline__img -->
            <div class="cd-timeline__content js-cd-content" style="width:100%">
                <h3>購物車內容</h3>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>商品明細</th>
                                    <th>單價</th>
                                    <th>數量</th>
                                    <th>小計</th>
                                    <th>移除</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($get_cart as $cart)
                                <tr>
                                    <td>
                                        <img class="mr-3 user-avatar-lg rounded" src="{{asset('concept')}}/assets/images/avatar-1.jpg" alt="Generic placeholder image">
                                        {{$cart['detail']['name']}} {{$cart['detail']['detail_name']}} {{$cart['detail']['code']}}
                                    </td>
                                    <td>{{$cart['price']}}</td>
                                    <td>
                                        <div class="quantity">
                                            <input type="number" min="1" max="{{$cart['detail']['detail_max_stock']}}" step="1" value="{{$cart['qty']}}"><div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>
                                        <i class="fas fa-trash-alt delete_cart" data-detail_id="{{$cart['mall_item_detail_id']}}" style="cursor: pointer"></i>
                                    </td>
                                </tr>
                                @endforeach
                               
                        </table>
                    </div>
                </div>
            </div>
            <!-- cd-timeline__content -->
        </div>
        <!-- cd-timeline__block -->
        @if(count($get_cart))
        <form id="validationform" data-parsley-validate="" novalidate="" method="POST" action="{{route('frontend.userCart.createOrder')}}">
            @csrf
        <div class="cd-timeline__block js-cd-block">
            <div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
                <img src="{{asset('concept')}}/assets/vendor/timeline/img/cd-icon-movie.svg" alt="Movie">
            </div>
            <!-- cd-timeline__img -->
            <div class="cd-timeline__content js-cd-content">
                <h3>會員專區</h3>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">快速登入</label>
                    <a href="/fb/auth" class="btn btn-primary mr-2">FB</a>
                    <a href="/google/auth" class="btn btn-secondary mr-2">GOOGLE</a>
                    {{-- <a href="##" class="btn btn-success mr-2">Line</a> --}}
                    <a href="{{route('frontend.user.login')}}" class="btn btn-light mr-2">會員登入</a>

                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">非會員</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input type="text" required="" name="email" data-parsley-type="email" placeholder="Email" class="form-control">
                    </div>
                </div>
                {{-- <p>快速登入 fb google 會員登入</p> --}}
                {{-- <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">手機號碼</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input type="text" required="" data-parsley-length="[10,10]" placeholder="Text between 5 - 10 chars length" class="form-control">
                    </div>
                </div> --}}
            </div>
            <!-- cd-timeline__content -->
        </div>
        <!-- cd-timeline__block -->
        <div class="cd-timeline__block js-cd-block">
            <div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
                <img src="{{asset('concept')}}/assets/vendor/timeline/img/cd-icon-picture.svg" alt="Picture">
            </div>
            <!-- cd-timeline__img -->
            <div class="cd-timeline__content js-cd-content">
                <h3>付款運送方式</h3>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">請選擇物流</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <select name="shipping_type" id="" class="form-control">
                            <option value="1">宅配</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">付款方式</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <select name="payment_type" id="" class="form-control">
                            <option value="1">信用卡</option>
                            <option value="2">ATM</option>
                            <option value="3">貨到付款</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">備註</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input type="text" name="tip" placeholder="Type something" class="form-control">
                    </div>
                </div>
            </div>
            <!-- cd-timeline__content -->
        </div>
        <!-- cd-timeline__block -->
        @if(false)
        <div class="cd-timeline__block js-cd-block">
            <div class="cd-timeline__img cd-timeline__img--location js-cd-img">
                <img src="{{asset('concept')}}/assets/vendor/timeline/img/cd-icon-location.svg" alt="Location">
            </div>
            <!-- cd-timeline__img -->
            <div class="cd-timeline__content js-cd-content">
                <h3>購買人資訊</h3>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">購買人姓名</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input type="text" required="" placeholder="Type something" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">手機</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input type="text" required="" data-parsley-length="[10,10]" placeholder="Text between 5 - 10 chars length" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">購買人地址</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input type="text" required="" placeholder="地址" class="form-control">
                    </div>
                </div>
            </div>
            <!-- cd-timeline__content -->
        </div>
        @endif
        <!-- cd-timeline__block -->
        <div class="cd-timeline__block js-cd-block">
            <div class="cd-timeline__img cd-timeline__img--location js-cd-img">
                <img src="{{asset('concept')}}/assets/vendor/timeline/img/cd-icon-location.svg" alt="Location">
            </div>
            <!-- cd-timeline__img -->
            <div class="cd-timeline__content js-cd-content">
                <h3>電子發票</h3>
                <p>會員載具(個人)</p>
                <p>公司用(統編)</p>
                <p>手機載具</p>
                <p>自然人憑證</p>
                <p>捐贈碼</p>
            </div>
            <!-- cd-timeline__content -->
        </div>
        <div class="cd-timeline__block js-cd-block">
            <div class="cd-timeline__img cd-timeline__img--location js-cd-img">
                <img src="{{asset('concept')}}/assets/vendor/timeline/img/cd-icon-location.svg" alt="Location">
            </div>
            <!-- cd-timeline__img -->
            <div class="cd-timeline__content js-cd-content">
                <h3>收件人資訊
                <label class="custom-control custom-checkbox">
                    <input id="ck1" type="checkbox" data-parsley-multiple="groups" value="bar" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" checked class="custom-control-input"><span class="custom-control-label">同購買人</span>
                </label></h3>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">收件人姓名</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input type="text" name="name" required="" placeholder="Type something" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">聯絡電話</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input type="text" name="phone" required="" data-parsley-length="[10,10]" placeholder="Text between 5 - 10 chars length" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">收件地址</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input type="text" name="address" required="" placeholder="地址" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">配送時段</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <select name="" id="" class="form-control">
                            <option value="">all</option>
                            <option value="">1</option>
                            <option value="">2</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- cd-timeline__content -->
        </div>
        <!-- cd-timeline__block -->
        <div class="cd-timeline__block js-cd-block">
            <div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
                <img src="{{asset('concept')}}/assets/vendor/timeline/img/cd-icon-movie.svg" alt="Movie">
            </div>
            <!-- cd-timeline__img -->
            <div class="cd-timeline__content js-cd-content">
                <h3>送出訂單</h3>
                <label class="custom-control custom-checkbox">
                    <input type="checkbox" data-parsley-multiple="groups" value="bar" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" checked class="custom-control-input"><span class="custom-control-label">同意會員責任規範及個資聲明與商家會員條款</span>
                </label>
                <label class="custom-control custom-checkbox">
                    <input type="checkbox" data-parsley-multiple="groups" value="bar" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" checked class="custom-control-input"><span class="custom-control-label">為保障彼此之權益，賣家在收到您的訂單後仍保有決定是否接受訂單及出貨與否之權利</span>
                </label>
                <button type="submit" class="btn btn-space btn-primary btn-lg">立即結帳</button>
            </div>
            <!-- cd-timeline__content -->
        </div>
        <!-- cd-timeline__block -->
        </form>
        @endif
    </div>
</section>

<script>
    // jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function() {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = input.attr('min'),
            max = input.attr('max');

        btnUp.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

    });
    </script>
     <script>
        $('.delete_cart').on('click',function () {
            self = $(this);
            tr = self.closest('tr');
            detail_id = self.data('detail_id');
            var data = {
                            "_token" : "{{ csrf_token() }}",
                            "_method": 'DELETE',
                            "mall_item_detail_id":detail_id,
                        }
            $.ajax({
                        type: 'post',
                        url: "{{route('frontend.userCart.deleteCart')}}",
                        dataType : 'json', // 預期從server接收的資料型態
                        contentType : 'application/json; charset=utf-8', // 要送到server的資料型態
                        data: JSON.stringify(data),

                        success: function (data) {
                            Toastify({
                                text: data.msg,
                                duration: 3000,
                                close:true,
                                gravity:"bottom",
                                position: "center",
                                backgroundColor: "#4fbe87",
                            }).showToast();
                            tr.hide('slow', function(){ tr.remove(); });
                            if(data.is_clear) $('#validationform').hide();
                        },
                        error: function (data) {
                            Toastify({
                                text: data.responseJSON,
                                duration: 3000,
                                close:true,
                                gravity:"bottom",
                                position: "center",
                                backgroundColor: "#ef172c",
                            }).showToast();
                        }
            });
        });
    </script>
@endsection
