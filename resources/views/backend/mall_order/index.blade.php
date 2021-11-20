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
    $(document).pjax('#order a:not(a[target="_blank"])', '#pjax-order_detail');
    // $(document).on("pjax:timeout", function(event) {
    //     // 阻止超時導致連結跳轉事件發生
    //     event.preventDefault()
    // });
    // $(document).on('submit', 'form[pjax-container]', function (event) {
    //     $.pjax.submit(event, '#pjax-container')
    // });
    // $(document).on('pjax:start', function() { NProgress.start(); });
    // $(document).on('pjax:end',   function() { NProgress.done();  });
</script>
@endsection
