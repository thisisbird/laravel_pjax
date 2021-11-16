@extends('backend.layout-concept.app')
@section('content')


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
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 50; $i++)
                                
                            <tr>
                                <td><a href="mall_order?test={{$i}}">Tiger Nixon</a></td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                            @endfor
                            
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
        <div id="pjax-container2" style="position: fixed">
        {{$request->test}}
        </div>
    </div>
</div>

<script>
    $(document).pjax('#order a:not(a[target="_blank"])', '#pjax-container2');
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
