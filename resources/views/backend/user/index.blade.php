@extends('backend.layout.app')
@section('content')
<div class="page-heading">
    <h3>User</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table with outer spacing</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <form action="{{route('backend.user.index')}}" method="get" pjax-container>
                                <div class="col-md-6 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                        <input value="{{$request->search}}" type="text" name="search" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg table-hover table-striped ">
                                    <thead>
                                        <tr>
                                            <th>名稱</th>
                                            <th>信箱</th>
                                            <th>帳號</th>
                                            <th>動作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td class="text-bold-500">{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td class="text-bold-500">{{$user->account}}</td>
                                            <td>
                                                <i class="fa-solid fa-user"></i>
                                                <article id="edit"
                                                class="icon col-6 col-md-3 col-lg-2 pr4 pb2 pt2 bb bw1 b--gray1 hover-black bw0-pr db fl-pr">
                                                <dl class="dt w-100 ma0 pa0">
                                                    <span class="fa-fw select-all fas"></span>
                                                </dl>
                                                <!---->
                                                </article>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div class="col-md-12">

<h3 class="title-5 m-b-35">data table</h3>
<div class="table-data__tool">
<div class="table-data__tool-left">
<div class="rs-select2--light rs-select2--md">
<select class="js-select2 select2-hidden-accessible" name="property" tabindex="-1" aria-hidden="true">
<option selected="selected">All Properties</option>
<option value="">Option 1</option>
<option value="">Option 2</option>
</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 125px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-property-aj-container"><span class="select2-selection__rendered" id="select2-property-aj-container" title="All Properties">All Properties</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
<div class="dropDownSelect2"></div>
</div>
<div class="rs-select2--light rs-select2--sm">
<select class="js-select2 select2-hidden-accessible" name="time" tabindex="-1" aria-hidden="true">
<option selected="selected">Today</option>
<option value="">3 Days</option>
<option value="">1 Week</option>
</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 75px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-time-9o-container"><span class="select2-selection__rendered" id="select2-time-9o-container" title="Today">Today</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
<div class="dropDownSelect2"></div>
</div>
<button class="au-btn-filter">
<i class="zmdi zmdi-filter-list"></i>filters</button>
</div>
<div class="table-data__tool-right">
<button class="au-btn au-btn-icon au-btn--green au-btn--small">
<i class="zmdi zmdi-plus"></i>add item</button>
<div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
<select class="js-select2 select2-hidden-accessible" name="type" tabindex="-1" aria-hidden="true">
<option selected="selected">Export</option>
<option value="">Option 1</option>
<option value="">Option 2</option>
</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 89px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-type-ap-container"><span class="select2-selection__rendered" id="select2-type-ap-container" title="Export">Export</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
<div class="dropDownSelect2"></div>
</div>
</div>
 </div>
<div class="table-responsive table-responsive-data2">
<table class="table table-data2">
<thead>
<tr>
<th>
<label class="au-checkbox">
<input type="checkbox">
<span class="au-checkmark"></span>
</label>
</th>
<th>name</th>
<th>email</th>
<th>description</th>
<th>date</th>
<th>status</th>
<th>price</th>
<th></th>
</tr>
</thead>
<tbody>
<tr class="tr-shadow">
<td>
<label class="au-checkbox">
<input type="checkbox">
<span class="au-checkmark"></span>
</label>
</td>
<td>Lori Lynch</td>
<td>
<span class="block-email">lori@example.com</span>
</td>
<td class="desc">Samsung S8 Black</td>
<td>2018-09-27 02:12</td>
<td>
<span class="status--process">Processed</span>
</td>
<td>$679.00</td>
<td>
<div class="table-data-feature">
<button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send">
<i class="zmdi zmdi-mail-send"></i>
</button>
<button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
<i class="zmdi zmdi-edit"></i>
</button>
<button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
<i class="zmdi zmdi-delete"></i>
</button>
<button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="More">
<i class="zmdi zmdi-more"></i>
</button>
</div>
</td>
</tr>
<tr class="spacer"></tr>
<tr class="tr-shadow">
<td>
<label class="au-checkbox">
<input type="checkbox">
<span class="au-checkmark"></span>
</label>
</td>
<td>Lori Lynch</td>
<td>
<span class="block-email">john@example.com</span>
</td>
<td class="desc">iPhone X 64Gb Grey</td>
<td>2018-09-29 05:57</td>
<td>
<span class="status--process">Processed</span>
</td>
<td>$999.00</td>
<td>
<div class="table-data-feature">
<button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send">
<i class="zmdi zmdi-mail-send"></i>
</button>
<button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
<i class="zmdi zmdi-edit"></i>
</button>
<button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
<i class="zmdi zmdi-delete"></i>
</button>
<button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="More">
<i class="zmdi zmdi-more"></i>
</button>
</div>
</td>
</tr>
<tr class="spacer"></tr>
<tr class="tr-shadow">
<td>
<label class="au-checkbox">
<input type="checkbox">
<span class="au-checkmark"></span>
</label>
</td>
<td>Lori Lynch</td>
<td>
<span class="block-email">lyn@example.com</span>
</td>
<td class="desc">iPhone X 256Gb Black</td>
<td>2018-09-25 19:03</td>
<td>
<span class="status--denied">Denied</span>
</td>
<td>$1199.00</td>
<td>
<div class="table-data-feature">
<button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send">
<i class="zmdi zmdi-mail-send"></i>
</button>
<button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
<i class="zmdi zmdi-edit"></i>
</button>
<button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
<i class="zmdi zmdi-delete"></i>
</button>
<button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="More">
<i class="zmdi zmdi-more"></i>
</button>
</div>
</td>
</tr>
<tr class="spacer"></tr>
<tr class="tr-shadow">
<td>
<label class="au-checkbox">
<input type="checkbox">
<span class="au-checkmark"></span>
</label>
</td>
<td>Lori Lynch</td>
<td>
<span class="block-email">doe@example.com</span>
</td>
<td class="desc">Camera C430W 4k</td>
<td>2018-09-24 19:10</td>
<td>
<span class="status--process">Processed</span>
</td>
<td>$699.00</td>
<td>
<div class="table-data-feature">
<button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send">
<i class="zmdi zmdi-mail-send"></i>
</button>
<button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
<i class="zmdi zmdi-edit"></i>
</button>
<button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
<i class="zmdi zmdi-delete"></i>
</button>
<button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="More">
<i class="zmdi zmdi-more"></i>
</button>
</div>
</td>
</tr>
</tbody>
</table>
 </div>

</div>
        </div>
    </section>
</div>
<script>

    
</script>

@endsection