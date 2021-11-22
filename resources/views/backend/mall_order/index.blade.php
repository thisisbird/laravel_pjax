@extends('backend.layout-concept.app')
@section('content')
<style>
    #pjax-order_detail{
        position: sticky;
        top: 70px;
        overflow-y: scroll;
        overflow-x: hidden;
        height: 80vh;
    }
</style>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('backend.mallOrder.index')}}" method="GET" pjax-container="">
                    <div class="row">
                        <div class="col-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">訂單編號</span></div>
                                <input class="form-control form-control-lg" type="search" placeholder="訂單編號" aria-label="Search" name="order_code" value="{{$request->order_code}}">
                            </div>
                        </div>
                        <div class="col-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">會員姓名/購買人</span></div>
                                <input class="form-control form-control-lg" type="search" placeholder="會員姓名/購買人" aria-label="Search" name="user_name" value="{{$request->user_name}}">
                            </div>
                        </div>
                        <div class="col-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Email</span></div>
                                <input class="form-control form-control-lg" type="search" placeholder="Email" aria-label="Search" name="email" value="{{$request->email}}">
                            </div>
                        </div>
                        <div class="col-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">收件人</span></div>
                                <input class="form-control form-control-lg" type="search" placeholder="收件人" aria-label="Search" name="name" value="{{$request->name}}">
                            </div>
                        </div>
                        <div class="col-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">電話</span></div>
                                <input class="form-control form-control-lg" type="search" placeholder="電話" aria-label="Search" name="phone" value="{{$request->phone}}">
                            </div>
                        </div>
                        <div class="col-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">配送狀態</span></div>
                                <select class="form-control form-control-lg" name="shipping_type">
                                    <option value="all" {{$request->shipping_type === 'all' ? 'selected':''}}>全部</option>
                                    <option value="1" {{$request->shipping_type === '1' ? 'selected':''}}>已配送</option>
                                    <option value="0" {{$request->shipping_type === '0' ? 'selected':''}}>未配送</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">開始</span></div>
                                <input type="text" autocomplete="off" class="form-control datetimepicker-input" id="datetimepicker_start" data-toggle="datetimepicker" data-target="#datetimepicker_start" name="created_at_start" />
                            </div>
                        </div>
                        <div class="col-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">結束</span></div>
                                <input type="text" autocomplete="off" class="form-control datetimepicker-input" id="datetimepicker_end" data-toggle="datetimepicker" data-target="#datetimepicker_end" name="created_at_end" />
                            </div>
                        </div>
                        <div class="col-3 mb-3">
                            <div class="input-group">
                                <select class="js-example-basic-multiple" multiple="multiple" name="state[]">
                                    @for ($i = 0; $i < 5; $i++)
                                    <option value="{{$i}}" {{is_array($request->state) && in_array($i,$request->state) ? 'selected':''}} >{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">國內外訂單</span></div>
                                <select class="form-control form-control-lg" name="language">
                                    <option value="all" {{$request->language === 'all' ? 'selected':''}}>全部</option>
                                    <option value="tw" {{$request->language === 'tw' ? 'selected':''}}>國內</option>
                                    <option value="en" {{$request->language === 'en' ? 'selected':''}}>國外</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary search-btn" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Data Tables - Print, Excel, CSV, PDF Buttons</h5>
                <p>This example shows DataTables and the Buttons extension being used with the Bootstrap 4 framework providing the styling.</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="order" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>訂單</th>
                                <th>日期</th>
                                <th>顧客</th>
                                <th>來源</th>
                                <th>付款狀態</th>
                                <th>配送狀態</th>
                                <th>配送方式</th>
                                <th>配送時段</th>
                                <th>總金額</th>
                                <th>備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 50; $i++)
                                
                            <tr>
                                <td><a href="mall_order?test={{$i}}">#ID{{$i}}</a></td>
                                <td>2021-11-13 16:36</td>
                                <td>張凱鈞</td>
                                <td>電腦</td>
                                <td>已付款</td>
                                <td>未出貨</td>
                                <td>宅配</td>
                                <td>早上(09:00~13:00)</td>
                                <td>NT$2080</td>
                                <td></td>
                            </tr>
                            @endfor
                            
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>訂單</th>
                                <th>日期</th>
                                <th>顧客</th>
                                <th>來源</th>
                                <th>付款狀態</th>
                                <th>配送狀態</th>
                                <th>配送方式</th>
                                <th>配送時段</th>
                                <th>總金額</th>
                                <th>備註</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
        <div id="pjax-order_detail">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">訂單明細 #ID{{$request->test}}</h5>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">購買品項</th>
                                        <th scope="col">價格/成本價</th>
                                        <th scope="col">數量</th>
                                        <th scope="col">金額/成本小計</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">商品1</th>
                                        <td>180/100</td>
                                        <td>6</td>
                                        <td>1080/600</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">商品2</th>
                                        <td>180/100</td>
                                        <td>6</td>
                                        <td>1080/600</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">商品3</th>
                                        <td>180/100</td>
                                        <td>6</td>
                                        <td>1080/600</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">商品4</th>
                                        <td>180/100</td>
                                        <td>6</td>
                                        <td>1080/600</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">折扣明細</th>
                                        <th scope="col">價格</th>
                                        <th scope="col">數量</th>
                                        <th scope="col">金額</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-secondary">
                                        <th scope="row">折扣後(不含運)</th>
                                        <td></td>
                                        <td></td>
                                        <td>1080</td>
                                    </tr>
                                    <tr class="table-secondary">
                                        <th scope="row">配送費用</th>
                                        <td></td>
                                        <td></td>
                                        <td>100</td>
                                    </tr>
                                    <tr class="table-primary">
                                        <th scope="row">總金額</th>
                                        <td></td>
                                        <td></td>
                                        <td>1080</td>
                                    </tr>

                                </tbody>
                            </table>
                            
                        </div>
                    </div>

                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">貨款</h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">付款方式: 信用卡</li>
                            <li class="list-group-item">付款狀態: 已付款</li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">出貨</h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">指定配送時間: 早上(09:30~12:00)</li>
                            <li class="list-group-item">配送方式: 宅配</li>
                        </ul>
                    </div>
                </div>
    

                
                <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">購買人</h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">帥哥度</li>
                            <li class="list-group-item">地址: 114 高雄市小港區小港路500號</li>
                            <li class="list-group-item">電話: 0910924408</li>
                            <li class="list-group-item">信箱: thisisbirdhead@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">收件人</h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">帥哥度</li>
                            <li class="list-group-item">地址: 114 高雄市小港區小港路500號</li>
                            <li class="list-group-item">電話: 0910924408</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">額外資訊</h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">帳號後五碼</li>
                            <li class="list-group-item">物流訊息</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">訂單來源</h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">手機</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">發票</h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">類型:二聯式發票</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">訂單備註</h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">目前無備註</li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>


<script>
    
    $(document).ready(function () {
        if ($("#datetimepicker_start,#datetimepicker_end").length) {
            $('#datetimepicker_start').datetimepicker({
                format:'YYYY-MM-DD',
                defaultDate: @json($request->created_at_start),
            });
            $('#datetimepicker_end').datetimepicker({
                format:'YYYY-MM-DD',
                defaultDate: @json($request->created_at_end),
            });
        }
        
        $('.js-example-basic-multiple').select2({
            tags: false
        });
    });
    $(document).pjax('#order a:not(a[target="_blank"])', '#pjax-order_detail');

</script>
@endsection
