@extends('backend.layout-concept.app')
@section('content')
<div class="ecommerce-widget">

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Total Revenue</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">$12099</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                    </div>
                </div>
                <div id="sparkline-revenue"><canvas width="348" height="100" style="display: inline-block; width: 348.25px; height: 100px; vertical-align: top;"></canvas></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Affiliate Revenue</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">$12099</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                    </div>
                </div>
                <div id="sparkline-revenue2"><canvas width="348" height="100" style="display: inline-block; width: 348.25px; height: 100px; vertical-align: top;"></canvas></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Refunds</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">0.00</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                        <span>N/A</span>
                    </div>
                </div>
                <div id="sparkline-revenue3"><canvas width="348" height="100" style="display: inline-block; width: 348.25px; height: 100px; vertical-align: top;"></canvas></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Avg. Revenue Per User</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">$28000</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                        <span>-2.00%</span>
                    </div>
                </div>
                <div id="sparkline-revenue4"><canvas width="348" height="100" style="display: inline-block; width: 348.25px; height: 100px; vertical-align: top;"></canvas></div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- ============================================================== -->
  
        <!-- ============================================================== -->

                      <!-- recent orders  -->
        <!-- ============================================================== -->
        <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Recent Orders</h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Image</th>
                                    <th class="border-0">Product Name</th>
                                    <th class="border-0">Product Id</th>
                                    <th class="border-0">Quantity</th>
                                    <th class="border-0">Price</th>
                                    <th class="border-0">Order Time</th>
                                    <th class="border-0">Customer</th>
                                    <th class="border-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="m-r-10"><img src="{{asset('concept')}}/assets/images/product-pic.jpg" alt="user" class="rounded" width="45"></div>
                                    </td>
                                    <td>Product #1 </td>
                                    <td>id000001 </td>
                                    <td>20</td>
                                    <td>$80.00</td>
                                    <td>27-08-2018 01:22:12</td>
                                    <td>Patricia J. King </td>
                                    <td><span class="badge-dot badge-brand mr-1"></span>InTransit </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="m-r-10"><img src="{{asset('concept')}}/assets/images/product-pic-2.jpg" alt="user" class="rounded" width="45"></div>
                                    </td>
                                    <td>Product #2 </td>
                                    <td>id000002 </td>
                                    <td>12</td>
                                    <td>$180.00</td>
                                    <td>25-08-2018 21:12:56</td>
                                    <td>Rachel J. Wicker </td>
                                    <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <div class="m-r-10"><img src="{{asset('concept')}}/assets/images/product-pic-3.jpg" alt="user" class="rounded" width="45"></div>
                                    </td>
                                    <td>Product #3 </td>
                                    <td>id000003 </td>
                                    <td>23</td>
                                    <td>$820.00</td>
                                    <td>24-08-2018 14:12:77</td>
                                    <td>Michael K. Ledford </td>
                                    <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <div class="m-r-10"><img src="{{asset('concept')}}/assets/images/product-pic-4.jpg" alt="user" class="rounded" width="45"></div>
                                    </td>
                                    <td>Product #4 </td>
                                    <td>id000004 </td>
                                    <td>34</td>
                                    <td>$340.00</td>
                                    <td>23-08-2018 09:12:35</td>
                                    <td>Michael K. Ledford </td>
                                    <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
                                </tr>
                                <tr>
                                    <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end recent orders  -->


        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- customer acquistion  -->
        <!-- ============================================================== -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Customer Acquisition</h5>
                <div class="card-body">
                    <div class="ct-chart ct-golden-section" style="height: 354px;"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line x1="50" x2="50" y1="15" y2="319" class="ct-grid ct-horizontal"></line><line x1="131.66666666666669" x2="131.66666666666669" y1="15" y2="319" class="ct-grid ct-horizontal"></line><line x1="213.33333333333334" x2="213.33333333333334" y1="15" y2="319" class="ct-grid ct-horizontal"></line><line x1="295" x2="295" y1="15" y2="319" class="ct-grid ct-horizontal"></line><line y1="319" y2="319" x1="50" x2="295" class="ct-grid ct-vertical"></line><line y1="281" y2="281" x1="50" x2="295" class="ct-grid ct-vertical"></line><line y1="243" y2="243" x1="50" x2="295" class="ct-grid ct-vertical"></line><line y1="205" y2="205" x1="50" x2="295" class="ct-grid ct-vertical"></line><line y1="167" y2="167" x1="50" x2="295" class="ct-grid ct-vertical"></line><line y1="129" y2="129" x1="50" x2="295" class="ct-grid ct-vertical"></line><line y1="91" y2="91" x1="50" x2="295" class="ct-grid ct-vertical"></line><line y1="53" y2="53" x1="50" x2="295" class="ct-grid ct-vertical"></line><line y1="15" y2="15" x1="50" x2="295" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><path d="M50,319L50,281C77.222,230.333,104.444,129,131.667,129C158.889,129,186.111,243,213.333,243C240.556,243,267.778,167,295,129L295,319Z" class="ct-area"></path><path d="M50,281C77.222,230.333,104.444,129,131.667,129C158.889,129,186.111,243,213.333,243C240.556,243,267.778,167,295,129" class="ct-line"></path></g><g class="ct-series ct-series-b"><path d="M50,319L50,243C77.222,230.333,104.444,217.667,131.667,205C158.889,192.333,186.111,187.267,213.333,167C240.556,146.733,267.778,65.667,295,15L295,319Z" class="ct-area"></path><path d="M50,243C77.222,230.333,104.444,217.667,131.667,205C158.889,192.333,186.111,187.267,213.333,167C240.556,146.733,267.778,65.667,295,15" class="ct-line"></path></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="50" y="324" width="81.66666666666667" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 82px; height: 20px;">Mon</span></foreignObject><foreignObject style="overflow: visible;" x="131.66666666666669" y="324" width="81.66666666666667" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 82px; height: 20px;">Tue</span></foreignObject><foreignObject style="overflow: visible;" x="213.33333333333334" y="324" width="81.66666666666666" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 82px; height: 20px;">Wed</span></foreignObject><foreignObject style="overflow: visible;" x="295" y="324" width="30" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 30px; height: 20px;"></span></foreignObject><foreignObject style="overflow: visible;" y="281" x="10" height="38" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 38px; width: 30px;">0</span></foreignObject><foreignObject style="overflow: visible;" y="243" x="10" height="38" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 38px; width: 30px;">1</span></foreignObject><foreignObject style="overflow: visible;" y="205" x="10" height="38" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 38px; width: 30px;">2</span></foreignObject><foreignObject style="overflow: visible;" y="167" x="10" height="38" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 38px; width: 30px;">3</span></foreignObject><foreignObject style="overflow: visible;" y="129" x="10" height="38" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 38px; width: 30px;">4</span></foreignObject><foreignObject style="overflow: visible;" y="91" x="10" height="38" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 38px; width: 30px;">5</span></foreignObject><foreignObject style="overflow: visible;" y="53" x="10" height="38" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 38px; width: 30px;">6</span></foreignObject><foreignObject style="overflow: visible;" y="15" x="10" height="38" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 38px; width: 30px;">7</span></foreignObject><foreignObject style="overflow: visible;" y="-15" x="10" height="30" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">8</span></foreignObject></g></svg></div>
                    <div class="text-center">
                        <span class="legend-item mr-2">
                                <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Returning</span>
                        </span>
                        <span class="legend-item mr-2">

                                <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">First Time</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end customer acquistion  -->
        <!-- ============================================================== -->
    </div>
    <div class="row">
        <!-- ============================================================== -->
                                  <!-- product category  -->
        <!-- ============================================================== -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header"> Product Category</h5>
                <div class="card-body">
                    <div class="ct-chart-category ct-golden-section" style="height: 315px;"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-donut" style="width: 100%; height: 100%;"><g class="ct-series ct-series-a"><path d="M155,287.5A130,130,0,0,0,155,27.5" class="ct-slice-donut" ct:value="60" style="stroke-width: 40px;" stroke-dasharray="408.464599609375px 408.464599609375px" stroke-dashoffset="-408.464599609375px"><animate attributeName="stroke-dashoffset" id="anim0" dur="1000ms" from="-408.464599609375px" to="0px" fill="freeze" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate></path></g><g class="ct-series ct-series-b"><path d="M25,157.5A130,130,0,0,0,155.454,287.499" class="ct-slice-donut" ct:value="30" style="stroke-width: 40px;" stroke-dasharray="204.65780639648438px 204.65780639648438px" stroke-dashoffset="-204.65780639648438px"><animate attributeName="stroke-dashoffset" id="anim1" dur="1000ms" from="-204.65780639648438px" to="0px" fill="freeze" begin="anim0.end" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate></path></g><g class="ct-series ct-series-c"><path d="M155,27.5A130,130,0,0,0,25.001,157.954" class="ct-slice-donut" ct:value="30" style="stroke-width: 40px;" stroke-dasharray="204.65780639648438px 204.65780639648438px" stroke-dashoffset="-204.65780639648438px"><animate attributeName="stroke-dashoffset" id="anim2" dur="1000ms" from="-204.65780639648438px" to="0px" fill="freeze" begin="anim1.end" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate></path></g></svg></div>
                    <div class="text-center m-t-40">
                        <span class="legend-item mr-3">
                                <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full "></i></span><span class="legend-text">Man</span>
                        </span>
                        <span class="legend-item mr-3">
                            <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Woman</span>
                        </span>
                        <span class="legend-item mr-3">
                            <span class="fa-xs text-info mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Accessories</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end product category  -->
               <!-- product sales  -->
        <!-- ============================================================== -->
        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <!-- <div class="float-right">
                            <select class="custom-select">
                                <option selected>Today</option>
                                <option value="1">Weekly</option>
                                <option value="2">Monthly</option>
                                <option value="3">Yearly</option>
                            </select>
                        </div> -->
                    <h5 class="mb-0"> Product Sales</h5>
                </div>
                <div class="card-body">
                    <div class="ct-chart-product ct-golden-section"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-bar" style="width: 100%; height: 100%;"><g class="ct-grids"><line x1="50" x2="50" y1="15" y2="315.546875" class="ct-grid ct-horizontal"></line><line x1="206.25" x2="206.25" y1="15" y2="315.546875" class="ct-grid ct-horizontal"></line><line x1="362.5" x2="362.5" y1="15" y2="315.546875" class="ct-grid ct-horizontal"></line><line x1="518.75" x2="518.75" y1="15" y2="315.546875" class="ct-grid ct-horizontal"></line><line y1="315.546875" y2="315.546875" x1="50" x2="675" class="ct-grid ct-vertical"></line><line y1="285.4921875" y2="285.4921875" x1="50" x2="675" class="ct-grid ct-vertical"></line><line y1="255.4375" y2="255.4375" x1="50" x2="675" class="ct-grid ct-vertical"></line><line y1="225.3828125" y2="225.3828125" x1="50" x2="675" class="ct-grid ct-vertical"></line><line y1="195.328125" y2="195.328125" x1="50" x2="675" class="ct-grid ct-vertical"></line><line y1="165.2734375" y2="165.2734375" x1="50" x2="675" class="ct-grid ct-vertical"></line><line y1="135.21875" y2="135.21875" x1="50" x2="675" class="ct-grid ct-vertical"></line><line y1="105.1640625" y2="105.1640625" x1="50" x2="675" class="ct-grid ct-vertical"></line><line y1="75.109375" y2="75.109375" x1="50" x2="675" class="ct-grid ct-vertical"></line><line y1="45.0546875" y2="45.0546875" x1="50" x2="675" class="ct-grid ct-vertical"></line><line y1="15" y2="15" x1="50" x2="675" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><line x1="128.125" x2="128.125" y1="315.546875" y2="219.371875" class="ct-bar" ct:value="800000" style="stroke-width: 40px"></line><line x1="284.375" x2="284.375" y1="315.546875" y2="171.284375" class="ct-bar" ct:value="1200000" style="stroke-width: 40px"></line><line x1="440.625" x2="440.625" y1="315.546875" y2="147.240625" class="ct-bar" ct:value="1400000" style="stroke-width: 40px"></line><line x1="596.875" x2="596.875" y1="315.546875" y2="159.2625" class="ct-bar" ct:value="1300000" style="stroke-width: 40px"></line></g><g class="ct-series ct-series-b"><line x1="128.125" x2="128.125" y1="219.371875" y2="195.328125" class="ct-bar" ct:value="200000" style="stroke-width: 40px"></line><line x1="284.375" x2="284.375" y1="171.284375" y2="123.19687500000003" class="ct-bar" ct:value="400000" style="stroke-width: 40px"></line><line x1="440.625" x2="440.625" y1="147.240625" y2="87.13125" class="ct-bar" ct:value="500000" style="stroke-width: 40px"></line><line x1="596.875" x2="596.875" y1="159.2625" y2="123.19687499999998" class="ct-bar" ct:value="300000" style="stroke-width: 40px"></line></g><g class="ct-series ct-series-c"><line x1="128.125" x2="128.125" y1="195.328125" y2="183.30624999999998" class="ct-bar" ct:value="100000" style="stroke-width: 40px"></line><line x1="284.375" x2="284.375" y1="123.19687500000003" y2="99.15312500000005" class="ct-bar" ct:value="200000" style="stroke-width: 40px"></line><line x1="440.625" x2="440.625" y1="87.13125" y2="39.04375000000002" class="ct-bar" ct:value="400000" style="stroke-width: 40px"></line><line x1="596.875" x2="596.875" y1="123.19687499999998" y2="51.06562499999998" class="ct-bar" ct:value="600000" style="stroke-width: 40px"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="50" y="320.546875" width="156.25" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 156px; height: 20px;">Q1</span></foreignObject><foreignObject style="overflow: visible;" x="206.25" y="320.546875" width="156.25" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 156px; height: 20px;">Q2</span></foreignObject><foreignObject style="overflow: visible;" x="362.5" y="320.546875" width="156.25" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 156px; height: 20px;">Q3</span></foreignObject><foreignObject style="overflow: visible;" x="518.75" y="320.546875" width="156.25" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 156px; height: 20px;">Q4</span></foreignObject><foreignObject style="overflow: visible;" y="285.4921875" x="10" height="30.0546875" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">0k</span></foreignObject><foreignObject style="overflow: visible;" y="255.4375" x="10" height="30.0546875" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">250k</span></foreignObject><foreignObject style="overflow: visible;" y="225.3828125" x="10" height="30.0546875" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">500k</span></foreignObject><foreignObject style="overflow: visible;" y="195.328125" x="10" height="30.0546875" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">750k</span></foreignObject><foreignObject style="overflow: visible;" y="165.2734375" x="10" height="30.0546875" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">1000k</span></foreignObject><foreignObject style="overflow: visible;" y="135.21875" x="10" height="30.0546875" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">1250k</span></foreignObject><foreignObject style="overflow: visible;" y="105.1640625" x="10" height="30.0546875" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">1500k</span></foreignObject><foreignObject style="overflow: visible;" y="75.109375" x="10" height="30.0546875" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">1750k</span></foreignObject><foreignObject style="overflow: visible;" y="45.0546875" x="10" height="30.0546875" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">2000k</span></foreignObject><foreignObject style="overflow: visible;" y="15" x="10" height="30.0546875" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">2250k</span></foreignObject><foreignObject style="overflow: visible;" y="-15" x="10" height="30" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">2500k</span></foreignObject></g></svg></div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end product sales  -->
        <!-- ============================================================== -->
        <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
            <!-- ============================================================== -->
            <!-- top perfomimg  -->
            <!-- ============================================================== -->
            <div class="card">
                <h5 class="card-header">Top Performing Campaigns</h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table no-wrap p-table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">Campaign</th>
                                    <th class="border-0">Visits</th>
                                    <th class="border-0">Revenue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Campaign#1</td>
                                    <td>98,789 </td>
                                    <td>$4563</td>
                                </tr>
                                <tr>
                                    <td>Campaign#2</td>
                                    <td>2,789 </td>
                                    <td>$325</td>
                                </tr>
                                <tr>
                                    <td>Campaign#3</td>
                                    <td>1,459 </td>
                                    <td>$225</td>
                                </tr>
                                <tr>
                                    <td>Campaign#4</td>
                                    <td>5,035 </td>
                                    <td>$856</td>
                                </tr>
                                <tr>
                                    <td>Campaign#5</td>
                                    <td>10,000 </td>
                                    <td>$1000</td>
                                </tr>
                                <tr>
                                    <td>Campaign#5</td>
                                    <td>10,000 </td>
                                    <td>$1000</td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <a href="#" class="btn btn-outline-light float-right">Details</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end top perfomimg  -->
            <!-- ============================================================== -->
        </div>
    </div>

    <div class="row">
        <!-- ============================================================== -->
        <!-- sales  -->
        <!-- ============================================================== -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Sales</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">$12099</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end sales  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- new customer  -->
        <!-- ============================================================== -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">New Customer</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">1245</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">10%</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end new customer  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- visitor  -->
        <!-- ============================================================== -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Visitor</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">13000</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5%</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end visitor  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- total orders  -->
        <!-- ============================================================== -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Total Orders</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">1340</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                        <span class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light "><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1">4%</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end total orders  -->
        <!-- ============================================================== -->
    </div>
    <div class="row">
        <!-- ============================================================== -->
        <!-- total revenue  -->
        <!-- ============================================================== -->

        
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- category revenue  -->
        <!-- ============================================================== -->
        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Revenue by Category</h5>
                <div class="card-body">
                    <div id="c3chart_category" style="height: 420px; max-height: 420px; position: relative;" class="c3"><svg width="563.328125" height="420" style="overflow: hidden;"><defs><clipPath id="c3-1629610791915-clip"><rect width="563.328125" height="392"></rect></clipPath><clipPath id="c3-1629610791915-clip-xaxis"><rect x="-31" y="-20" width="625.328125" height="44"></rect></clipPath><clipPath id="c3-1629610791915-clip-yaxis"><rect x="-29" y="-4" width="20" height="416"></rect></clipPath><clipPath id="c3-1629610791915-clip-grid"><rect width="563.328125" height="392"></rect></clipPath><clipPath id="c3-1629610791915-clip-subchart"><rect width="563.328125" height="0"></rect></clipPath></defs><g transform="translate(0.5,4.5)"><text class="c3-text c3-empty" text-anchor="middle" dominant-baseline="middle" x="281.6640625" y="196" style="opacity: 0;"></text><g clip-path="url(http://pjax.test/concept/index.html#c3-1629610791915-clip)" class="c3-regions" style="visibility: hidden;"></g><g clip-path="url(http://pjax.test/concept/index.html#c3-1629610791915-clip-grid)" class="c3-grid" style="visibility: hidden;"><g class="c3-xgrid-focus"><line class="c3-xgrid-focus" x1="-10" x2="-10" y1="0" y2="392" style="visibility: hidden;"></line></g></g><g clip-path="url(http://pjax.test/concept/index.html#c3-1629610791915-clip)" class="c3-chart"><g class="c3-chart-bars"><g class="c3-chart-bar c3-target c3-target-Men" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Men c3-bars c3-bars-Men" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Women" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Women c3-bars c3-bars-Women" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Accessories" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Accessories c3-bars c3-bars-Accessories" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Children" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Children c3-bars c3-bars-Children" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Apperal" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Apperal c3-bars c3-bars-Apperal" style="cursor: pointer;"></g></g></g><g class="c3-chart-lines"><g class="c3-chart-line c3-target c3-target-Men" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Men c3-lines c3-lines-Men"></g><g class=" c3-shapes c3-shapes-Men c3-areas c3-areas-Men"></g><g class=" c3-selected-circles c3-selected-circles-Men"></g><g class=" c3-shapes c3-shapes-Men c3-circles c3-circles-Men" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-Women" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Women c3-lines c3-lines-Women"></g><g class=" c3-shapes c3-shapes-Women c3-areas c3-areas-Women"></g><g class=" c3-selected-circles c3-selected-circles-Women"></g><g class=" c3-shapes c3-shapes-Women c3-circles c3-circles-Women" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-Accessories" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Accessories c3-lines c3-lines-Accessories"></g><g class=" c3-shapes c3-shapes-Accessories c3-areas c3-areas-Accessories"></g><g class=" c3-selected-circles c3-selected-circles-Accessories"></g><g class=" c3-shapes c3-shapes-Accessories c3-circles c3-circles-Accessories" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-Children" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Children c3-lines c3-lines-Children"></g><g class=" c3-shapes c3-shapes-Children c3-areas c3-areas-Children"></g><g class=" c3-selected-circles c3-selected-circles-Children"></g><g class=" c3-shapes c3-shapes-Children c3-circles c3-circles-Children" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-Apperal" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Apperal c3-lines c3-lines-Apperal"></g><g class=" c3-shapes c3-shapes-Apperal c3-areas c3-areas-Apperal"></g><g class=" c3-selected-circles c3-selected-circles-Apperal"></g><g class=" c3-shapes c3-shapes-Apperal c3-circles c3-circles-Apperal" style="cursor: pointer;"></g></g></g><g class="c3-chart-arcs" transform="translate(281.6640625,191)"><text class="c3-chart-arcs-title" style="text-anchor: middle; opacity: 1;"></text><g class="c3-chart-arc c3-target c3-target-Men"><g class=" c3-shapes c3-shapes-Men c3-arcs c3-arcs-Men"><path class=" c3-shape c3-shape c3-arc c3-arc-Men" transform="scale(1,1)" style="fill: rgb(89, 105, 255); cursor: pointer;" d="M1.1110608085264361e-14,-181.45A181.45,181.45,0,0,1,150.18416871556778,101.82739301000427L90.11050122934067,61.09643580600257A108.86999999999999,108.86999999999999,0,0,0,6.666364851158616e-15,-108.86999999999999Z"></path></g><text dy=".35em" class="" transform="translate(128.2506083717847,-67.99416925198153)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text></g><g class="c3-chart-arc c3-target c3-target-Women"><g class=" c3-shapes c3-shapes-Women c3-arcs c3-arcs-Women"><path class=" c3-shape c3-shape c3-arc c3-arc-Women" transform="scale(1,1)" style="fill: rgb(255, 64, 123); cursor: pointer;" d="M150.18416871556778,101.82739301000427A181.45,181.45,0,0,1,-124.7830668089536,131.7318820094521L-74.86984008537216,79.03912920567126A108.86999999999999,108.86999999999999,0,0,0,90.11050122934067,61.09643580600257Z"></path></g><text dy=".35em" class="" transform="translate(15.6945567144194,144.30906586052683)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text></g><g class="c3-chart-arc c3-target c3-target-Accessories"><g class=" c3-shapes c3-shapes-Accessories c3-arcs c3-arcs-Accessories"><path class=" c3-shape c3-shape c3-arc c3-arc-Accessories" transform="scale(1,1)" style="fill: rgb(37, 213, 242); cursor: pointer;" d="M-124.7830668089536,131.7318820094521A181.45,181.45,0,0,1,-174.83614614261302,-48.54301702612699L-104.90168768556781,-29.125810215676193A108.86999999999999,108.86999999999999,0,0,0,-74.86984008537216,79.03912920567126Z"></path></g><text dy=".35em" class="" transform="translate(-139.8689169140904,38.834413620901756)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text></g><g class="c3-chart-arc c3-target c3-target-Children"><g class=" c3-shapes c3-shapes-Children c3-arcs c3-arcs-Children"><path class=" c3-shape c3-shape c3-arc c3-arc-Children" transform="scale(1,1)" style="fill: rgb(255, 199, 80); cursor: pointer;" d="M-174.83614614261302,-48.54301702612699A181.45,181.45,0,0,1,-76.18887747811006,-164.67955989929513L-45.71332648686603,-98.80773593957707A108.86999999999999,108.86999999999999,0,0,0,-104.90168768556781,-29.125810215676193Z"></path></g><text dy=".35em" class="" transform="translate(-110.63544392232775,-93.97459309893004)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text></g><g class="c3-chart-arc c3-target c3-target-Apperal"><g class=" c3-shapes c3-shapes-Apperal c3-arcs c3-arcs-Apperal"><path class=" c3-shape c3-shape c3-arc c3-arc-Apperal" transform="scale(1,1)" style="fill: rgb(46, 197, 81); cursor: pointer;" d="M-76.18887747811006,-164.67955989929513A181.45,181.45,0,0,1,-3.333182425579308e-14,-181.45L-1.9999094553475848e-14,-108.86999999999999A108.86999999999999,108.86999999999999,0,0,0,-45.71332648686603,-98.80773593957707Z"></path></g><text dy=".35em" class="" transform="translate(-31.20510910103229,-141.76623986687616)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text></g></g><g class="c3-chart-texts"><g class="c3-chart-text c3-target c3-target-Men  " style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Men"></g></g><g class="c3-chart-text c3-target c3-target-Women  " style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Women"></g></g><g class="c3-chart-text c3-target c3-target-Accessories  " style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Accessories"></g></g><g class="c3-chart-text c3-target c3-target-Children  " style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Children"></g></g><g class="c3-chart-text c3-target c3-target-Apperal  " style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Apperal"></g></g></g><g class="c3-event-rects" style="fill-opacity: 0;"><rect class="c3-event-rect" x="0" y="0" width="563.328125" height="392"></rect></g></g><g clip-path="url(http://pjax.test/concept/index.html#c3-1629610791915-clip-grid)" class="c3-grid c3-grid-lines"><g class="c3-xgrid-lines"></g><g class="c3-ygrid-lines"></g></g><g class="c3-axis c3-axis-x" clip-path="url(http://pjax.test/concept/index.html#c3-1629610791915-clip-xaxis)" transform="translate(0,392)" style="visibility: visible; opacity: 0;"><text class="c3-axis-x-label" transform="" style="text-anchor: end;" x="563.328125" dx="-0.5em" dy="-0.5em"></text><g class="tick" transform="translate(282, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">0</tspan></text></g><path class="domain" d="M0,6V0H563.328125V6"></path></g><g class="c3-axis c3-axis-y" clip-path="url(http://pjax.test/concept/index.html#c3-1629610791915-clip-yaxis)" transform="translate(0,0)" style="visibility: visible; opacity: 0;"><text class="c3-axis-y-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="1.2em"></text><g class="tick" transform="translate(0,360)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">20</tspan></text></g><g class="tick" transform="translate(0,319)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">30</tspan></text></g><g class="tick" transform="translate(0,278)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">40</tspan></text></g><g class="tick" transform="translate(0,238)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">50</tspan></text></g><g class="tick" transform="translate(0,197)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">60</tspan></text></g><g class="tick" transform="translate(0,156)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">70</tspan></text></g><g class="tick" transform="translate(0,116)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">80</tspan></text></g><g class="tick" transform="translate(0,75)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">90</tspan></text></g><g class="tick" transform="translate(0,34)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">100</tspan></text></g><path class="domain" d="M-6,1H0V392H-6"></path></g><g class="c3-axis c3-axis-y2" transform="translate(563.328125,0)" style="visibility: hidden; opacity: 0;"><text class="c3-axis-y2-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="-0.5em"></text><g class="tick" transform="translate(0,392)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0</tspan></text></g><g class="tick" transform="translate(0,353)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.1</tspan></text></g><g class="tick" transform="translate(0,314)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.2</tspan></text></g><g class="tick" transform="translate(0,275)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.3</tspan></text></g><g class="tick" transform="translate(0,236)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.4</tspan></text></g><g class="tick" transform="translate(0,197)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.5</tspan></text></g><g class="tick" transform="translate(0,158)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.6</tspan></text></g><g class="tick" transform="translate(0,119)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.7</tspan></text></g><g class="tick" transform="translate(0,80)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.8</tspan></text></g><g class="tick" transform="translate(0,41)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.9</tspan></text></g><g class="tick" transform="translate(0,1)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">1</tspan></text></g><path class="domain" d="M6,1H0V392H6"></path></g></g><g transform="translate(0.5,420.5)" style="visibility: hidden;"><g clip-path="url(http://pjax.test/concept/index.html#c3-1629610791915-clip-subchart)" class="c3-chart"><g class="c3-chart-bars"></g><g class="c3-chart-lines"></g></g><g clip-path="url(http://pjax.test/concept/index.html#c3-1629610791915-clip)" class="c3-brush" fill="none" pointer-events="all" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><rect class="overlay" pointer-events="all" cursor="crosshair" x="0" y="0" width="563.328125" height="0"></rect><rect class="selection" cursor="move" fill="#777" fill-opacity="0.3" stroke="#fff" shape-rendering="crispEdges" style="display: none;"></rect><rect class="handle handle--e" cursor="ew-resize" style="display: none;"></rect><rect class="handle handle--w" cursor="ew-resize" style="display: none;"></rect></g><g class="c3-axis-x" transform="translate(0,0)" clip-path="url(http://pjax.test/concept/index.html#c3-1629610791915-clip-xaxis)" style="opacity: 0;"><g class="tick" transform="translate(282, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">0</tspan></text></g><path class="domain" d="M0,6V0H563.328125V6"></path></g></g><g transform="translate(0,396)"><g class="c3-legend-item c3-legend-item-Men" style="visibility: visible; cursor: pointer;"><text x="109.015625" y="9" style="pointer-events: none;">Men</text><rect class="c3-legend-item-event" x="95.015625" y="-5" width="52.953125" height="24" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="93.015625" y1="4" x2="103.015625" y2="4" stroke-width="10" style="stroke: rgb(89, 105, 255); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Women" style="visibility: visible; cursor: pointer;"><text x="161.96875" y="9" style="pointer-events: none;">Women</text><rect class="c3-legend-item-event" x="147.96875" y="-5" width="73.796875" height="24" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="145.96875" y1="4" x2="155.96875" y2="4" stroke-width="10" style="stroke: rgb(255, 64, 123); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Accessories" style="visibility: visible; cursor: pointer;"><text x="235.765625" y="9" style="pointer-events: none;">Accessories</text><rect class="c3-legend-item-event" x="221.765625" y="-5" width="103.171875" height="24" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="219.765625" y1="4" x2="229.765625" y2="4" stroke-width="10" style="stroke: rgb(37, 213, 242); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Children" style="visibility: visible; cursor: pointer;"><text x="338.9375" y="9" style="pointer-events: none;">Children</text><rect class="c3-legend-item-event" x="324.9375" y="-5" width="78.765625" height="24" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="322.9375" y1="4" x2="332.9375" y2="4" stroke-width="10" style="stroke: rgb(255, 199, 80); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Apperal" style="visibility: visible; cursor: pointer;"><text x="417.703125" y="9" style="pointer-events: none;">Apperal</text><rect class="c3-legend-item-event" x="403.703125" y="-5" width="64.609375" height="24" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="401.703125" y1="4" x2="411.703125" y2="4" stroke-width="10" style="stroke: rgb(46, 197, 81); pointer-events: none;"></line></g></g><text class="c3-title" x="281.6640625" y="0"></text></svg><div class="c3-tooltip-container" style="position: absolute; pointer-events: none; display: none;"></div></div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end category revenue  -->
        <!-- ============================================================== -->

        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header"> Total Revenue</h5>
                <div class="card-body">
                    <div id="morris_totalrevenue" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="342" version="1.1" width="817" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.328125px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="54.9375" y="305" text-anchor="end" font-family="Circular Std Book" font-size="13px" stroke="none" fill="#71748d" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: &quot;Circular Std Book&quot;; font-size: 13px; font-weight: normal;" font-weight="normal"><tspan dy="4.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#e6e6f2" d="M67.4375,305.5H791.656" stroke-width="0.8" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="54.9375" y="235" text-anchor="end" font-family="Circular Std Book" font-size="13px" stroke="none" fill="#71748d" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: &quot;Circular Std Book&quot;; font-size: 13px; font-weight: normal;" font-weight="normal"><tspan dy="4.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">10,000</tspan></text><path fill="none" stroke="#e6e6f2" d="M67.4375,235.5H791.656" stroke-width="0.8" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="54.9375" y="165" text-anchor="end" font-family="Circular Std Book" font-size="13px" stroke="none" fill="#71748d" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: &quot;Circular Std Book&quot;; font-size: 13px; font-weight: normal;" font-weight="normal"><tspan dy="4.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">20,000</tspan></text><path fill="none" stroke="#e6e6f2" d="M67.4375,165.5H791.656" stroke-width="0.8" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="54.9375" y="95" text-anchor="end" font-family="Circular Std Book" font-size="13px" stroke="none" fill="#71748d" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: &quot;Circular Std Book&quot;; font-size: 13px; font-weight: normal;" font-weight="normal"><tspan dy="4.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30,000</tspan></text><path fill="none" stroke="#e6e6f2" d="M67.4375,95.5H791.656" stroke-width="0.8" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="54.9375" y="25" text-anchor="end" font-family="Circular Std Book" font-size="13px" stroke="none" fill="#71748d" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: &quot;Circular Std Book&quot;; font-size: 13px; font-weight: normal;" font-weight="normal"><tspan dy="4.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">40,000</tspan></text><path fill="none" stroke="#e6e6f2" d="M67.4375,25.5H791.656" stroke-width="0.8" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="699.5271090985678" y="317.5" text-anchor="middle" font-family="Circular Std Book" font-size="13px" stroke="none" fill="#71748d" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: &quot;Circular Std Book&quot;; font-size: 13px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,9)"><tspan dy="4.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2019</tspan></text><text x="476.8314456613311" y="317.5" text-anchor="middle" font-family="Circular Std Book" font-size="13px" stroke="none" fill="#71748d" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: &quot;Circular Std Book&quot;; font-size: 13px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,9)"><tspan dy="4.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2018</tspan></text><text x="254.13578222409436" y="317.5" text-anchor="middle" font-family="Circular Std Book" font-size="13px" stroke="none" fill="#71748d" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: &quot;Circular Std Book&quot;; font-size: 13px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,9)"><tspan dy="4.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2017</tspan></text><path fill="#a3abfa" stroke="none" d="M67.4375,305C81.47037742207246,291.875,109.53613226621735,256.89890710382514,123.56900968828981,252.5C193.27580296967145,230.64890710382514,332.6893895324347,221.8909671532847,402.3961828138163,200C416.2765289595619,195.64096715328466,444.03722125105304,151.875,457.91756739679863,147.5C527.3192981255265,125.625,666.1227595829823,120.4741773308958,735.5244903117102,95C749.5573677337827,89.8491773308958,777.6231225779275,42.5,791.656,25L791.656,305L67.4375,305Z" fill-opacity="0.8" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.8;"></path><path fill="none" stroke="#5969ff" d="M67.4375,305C81.47037742207246,291.875,109.53613226621735,256.89890710382514,123.56900968828981,252.5C193.27580296967145,230.64890710382514,332.6893895324347,221.8909671532847,402.3961828138163,200C416.2765289595619,195.64096715328466,444.03722125105304,151.875,457.91756739679863,147.5C527.3192981255265,125.625,666.1227595829823,120.4741773308958,735.5244903117102,95C749.5573677337827,89.8491773308958,777.6231225779275,42.5,791.656,25" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="67.4375" cy="305" r="7" fill="#5969ff" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="123.56900968828981" cy="252.5" r="4" fill="#5969ff" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="402.3961828138163" cy="200" r="4" fill="#5969ff" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="457.91756739679863" cy="147.5" r="4" fill="#5969ff" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="735.5244903117102" cy="95" r="4" fill="#5969ff" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="791.656" cy="25" r="4" fill="#5969ff" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 33.6406px; top: 221px;"><div class="morris-hover-row-label">2016 Q1</div><div class="morris-hover-point" style="color: #5969ff">
Y:
0
</div></div></div>
                </div>
                <div class="card-footer">
                    <p class="display-7 font-weight-bold"><span class="text-primary d-inline-block">$26,000</span><span class="text-success float-right">+9.45%</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12">
            <!-- ============================================================== -->
            <!-- social source  -->
            <!-- ============================================================== -->
            <div class="card">
                <h5 class="card-header"> Sales By Social Source</h5>
                <div class="card-body p-0">
                    <ul class="social-sales list-group list-group-flush">
                        <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle facebook-bgcolor mr-2"><i class="fab fa-facebook-f"></i></span><span class="social-sales-name">Facebook</span><span class="social-sales-count text-dark">120 Sales</span>
                        </li>
                        <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle twitter-bgcolor mr-2"><i class="fab fa-twitter"></i></span><span class="social-sales-name">Twitter</span><span class="social-sales-count text-dark">99 Sales</span>
                        </li>
                        <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle instagram-bgcolor mr-2"><i class="fab fa-instagram"></i></span><span class="social-sales-name">Instagram</span><span class="social-sales-count text-dark">76 Sales</span>
                        </li>
                        <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle pinterest-bgcolor mr-2"><i class="fab fa-pinterest-p"></i></span><span class="social-sales-name">Pinterest</span><span class="social-sales-count text-dark">56 Sales</span>
                        </li>
                        <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle googleplus-bgcolor mr-2"><i class="fab fa-google-plus-g"></i></span><span class="social-sales-name">Google Plus</span><span class="social-sales-count text-dark">36 Sales</span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn-primary-link">View Details</a>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end social source  -->
            <!-- ============================================================== -->
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
            <!-- ============================================================== -->
            <!-- sales traffice source  -->
            <!-- ============================================================== -->
            <div class="card">
                <h5 class="card-header"> Sales By Traffic Source</h5>
                <div class="card-body p-0">
                    <ul class="traffic-sales list-group list-group-flush">
                        <li class="traffic-sales-content list-group-item "><span class="traffic-sales-name">Direct</span><span class="traffic-sales-amount">$4000.00  <span class="icon-circle-small icon-box-xs text-success ml-4 bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1 text-success">5.86%</span></span>
                        </li>
                        <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Search<span class="traffic-sales-amount">$3123.00  <span class="icon-circle-small icon-box-xs text-success ml-4 bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1 text-success">5.86%</span></span>
                            </span>
                        </li>
                        <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Social<span class="traffic-sales-amount ">$3099.00  <span class="icon-circle-small icon-box-xs text-success ml-4 bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1 text-success">5.86%</span></span>
                            </span>
                        </li>
                        <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Referrals<span class="traffic-sales-amount ">$2220.00   <span class="icon-circle-small icon-box-xs text-danger ml-4 bg-danger-light"><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1 text-danger">4.02%</span></span>
                            </span>
                        </li>
                        <li class="traffic-sales-content list-group-item "><span class="traffic-sales-name">Email<span class="traffic-sales-amount">$1567.00   <span class="icon-circle-small icon-box-xs text-danger ml-4 bg-danger-light"><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1 text-danger">3.86%</span></span>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn-primary-link">View Details</a>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end sales traffice source  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- sales traffic country source  -->
        <!-- ============================================================== -->
        <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Sales By Country Traffic Source</h5>
                <div class="card-body p-0">
                    <ul class="country-sales list-group list-group-flush">
                        <li class="country-sales-content list-group-item"><span class="mr-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> </span>
                            <span class="">United States</span><span class="float-right text-dark">78%</span>
                        </li>
                        <li class="list-group-item country-sales-content"><span class="mr-2"><i class="flag-icon flag-icon-ca" title="ca" id="ca"></i></span><span class="">Canada</span><span class="float-right text-dark">7%</span>
                        </li>
                        <li class="list-group-item country-sales-content"><span class="mr-2"><i class="flag-icon flag-icon-ru" title="ru" id="ru"></i></span><span class="">Russia</span><span class="float-right text-dark">4%</span>
                        </li>
                        <li class="list-group-item country-sales-content"><span class=" mr-2"><i class="flag-icon flag-icon-in" title="in" id="in"></i></span><span class="">India</span><span class="float-right text-dark">12%</span>
                        </li>
                        <li class="list-group-item country-sales-content"><span class=" mr-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i></span><span class="">France</span><span class="float-right text-dark">16%</span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn-primary-link">View Details</a>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end sales traffice country source  -->
        <!-- ============================================================== -->
    </div>
</div>
{{-- <script src="{{asset('concept')}}/assets/vendor/jquery/jquery-3.3.1.min.js"></script> --}}
<!-- bootstap bundle js -->
<script src="{{asset('concept')}}/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->
<script src="{{asset('concept')}}/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="{{asset('concept')}}/assets/libs/js/main-js.js"></script>
<!-- chart chartist js -->
<script src="{{asset('concept')}}/assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
<!-- sparkline js -->
<script src="{{asset('concept')}}/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
<!-- morris js -->
<script src="{{asset('concept')}}/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="{{asset('concept')}}/assets/vendor/charts/morris-bundle/morris.js"></script>
<!-- chart c3 js -->
<script src="{{asset('concept')}}/assets/vendor/charts/c3charts/c3.min.js"></script>
<script src="{{asset('concept')}}/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
<script src="{{asset('concept')}}/assets/vendor/charts/c3charts/C3chartjs.js"></script>
<script src="{{asset('concept')}}/assets/libs/js/dashboard-ecommerce.js"></script>
<script>
   
    
</script>

@endsection