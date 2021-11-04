@extends('backend.layout-concept.app')
@section('content')
<style>
    .note-editable{
        background-color: #ffffff;
    }
    .add_detail_icon{
        font-size: 25px;
    }
</style>

<div class="row">
    
    <!-- ============================================================== -->
    <!-- search bar  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('backend.mallItem.index')}}" method="GET" pjax-container>
                    <input class="form-control form-control-lg" type="search" placeholder="Search" aria-label="Search"
                        name="search" value="{{$request->search}}">
                    <button class="btn btn-primary search-btn" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end search bar  -->
    <!-- ============================================================== -->
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <!-- ============================================================== -->
        <!-- card influencer one -->
        <!-- ============================================================== -->
        @foreach ($datas as $data)
        {{-- @dd($data) --}}
        <div class="card {{isset($select_data) && $select_data->id == $data->id ? 'bg-brand':''}}">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="user-avatar float-xl-left pr-4 float-none">
                            <img src="{{asset('concept')}}/assets/images/avatar-1.jpg" alt="User Avatar"
                                class="rounded-circle user-avatar-xl">
                        </div>
                        <div class="pl-xl-3">
                            <div class="m-b-0">
                                <div class="user-avatar-name d-inline-block">
                                    <h2 class="font-24 m-b-10">{{$data->name}}</h2>
                                </div>
                                <div class="rating-star d-inline-block pl-xl-2 mb-2 mb-xl-0">
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <p class="d-inline-block text-dark">14 Reviews </p>
                                </div>
                            </div>
                            <div class="user-avatar-address">
                                <p class="mb-2"><i class="fa fa-map-marker-alt mr-2  text-primary"></i>{{$data->info->where('language',$request->language)->first()->name ?? 'N/A'}} 
                                    <span class="m-l-10">{{$data->code}}
                                        <span class="m-l-20">庫存:{{$data->detail->sum('stock')}}</span>
                                        <span class="m-l-20">購買量:{{$data->detail->sum('buy_stock')}}</span>
                                        {{-- <span class="m-l-20">{{$data->account}}</span> --}}
                                    </span>
                                </p>
                                <div class="mt-3">
                                    <a href="##" class="mr-1 badge badge-light">{{$data->is_display ? '顯示':'不顯示'}}</a>
                                    <a href="##" class="mr-1 badge badge-light">{{$data->is_shopping?'可購買':'不可購買'}}</a>
                                    <a href="##" class="mr-1 badge badge-light">{{$data->is_new?'新品':''}}</a>
                                    <a href="##" class="badge badge-light">{{$data->is_hot?'熱銷':''}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="float-xl-right float-none mt-xl-0 mt-4">
                            {{-- <a href="#" class="btn-wishlist m-r-10"><i class="far fa-star"></i></a> --}}
                            <a href="{{route('backend.mallItem.edit',$data->id)}}?language=en{{$request->search ? '&search='.$request->search:''}}" class="btn {{isset($select_data) ? $select_data->id == $data->id && $request->language == 'en' ? 'btn-secondary' :'btn-outline-secondary' :'btn-outline-secondary'}}">編輯英文</a>
                            <a href="{{route('backend.mallItem.edit',$data->id)}}?language=tw{{$request->search ? '&search='.$request->search:''}}" class="btn {{isset($select_data) ? $select_data->id == $data->id && $request->language == 'tw' ? 'btn-secondary' :'btn-outline-secondary' :'btn-outline-secondary'}}">編輯中文</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-top user-social-box">
                <div class="user-social-media d-xl-inline-block "><span class="mr-2 twitter-color"> <i
                            class="fab fa-twitter-square"></i>原價</span><span>{{$data->info->where('language',$request->language)->first()->o_price ?? 0}}</span></div>
                <div class="user-social-media d-xl-inline-block"><span class="mr-2  pinterest-color"> <i
                            class="fab fa-pinterest-square"></i>售價</span><span>{{$data->info->where('language',$request->language)->first()->price ?? 0}}</span></div>
                <div class="user-social-media d-xl-inline-block"><span class="mr-2 instagram-color"> <i
                            class="fab fa-instagram"></i>成本</span><span>{{$data->info->where('language',$request->language)->first()->cost ?? 0}}</span></div>
                {{-- <div class="user-social-media d-xl-inline-block"><span class="mr-2  facebook-color"> <i
                            class="fab fa-facebook-square "></i></span><span>92,920</span></div>
                <div class="user-social-media d-xl-inline-block"><span class="mr-2 medium-color"> <i
                            class="fab fa-medium"></i></span><span>291</span></div>
                <div class="user-social-media d-xl-inline-block"><span class="mr-2 youtube-color"> <i
                            class="fab fa-youtube"></i></span><span>1291</span></div> --}}
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <div id="pjax-container2">
        <form action="{{route('backend.mallItem.update')}}" method="POST" pjax-container>
            @csrf
            <input type="hidden" name="language" value="{{$request->language}}">

            @if($errors->count())
                @foreach ($errors->all() as $error)
                <ul class="parsley-errors-list filled"><li class="parsley-required">{{$error}}</li></ul>
                @endforeach
            @endif
            <div class="email-head">
                <div class="email-head-title">商品資訊<span class="icon mdi mdi-edit"></span></div>
            </div>

            <div class="email-compose-fields">
                <div class="subject">
                    <div class="form-group row pt-2">
                        <label class="col-md-1 control-label">商品名稱</label>
                        <div class="col-md-11">
                            <input class="form-control" type="text" name="name" value="{{isset($select_data) ? ($select_data->info->where('language',$request->language)->first()->name ?? '') : old('name')}}">
                        </div>
                    </div>
                </div>
                <div class="subject">
                    <div class="form-group row pt-2">
                        <label class="col-md-1 control-label">商品編號</label>
                        <div class="col-md-11">
                            <input class="form-control" type="text" name="code" value="{{isset($select_data) ? $select_data->code : old('code')}}">
                        </div>
                    </div>
                </div>
                <div class="menu">
                    <div class="form-group row pt-0">
                        <label class="col-md-1 control-label">分類</label>
                        <div class="col-md-11">
                            <select class="js-example-basic-multiple" multiple="multiple" name="menu[]">
                                @foreach ($menus as $menu_1)
                                <option value="{{$menu_1->id}}" {{old('menu') && in_array($menu_1->id,old('menu')) ? 'selected':'' }} {{isset($select_data) && in_array($menu_1->id,$select_data->menu->pluck('id')->toArray())  ? 'selected':''}}>&nbsp;∟{{$menu_1->name_tw}}({{$menu_1->name_en}})</option>
                                @foreach ($menu_1->children as $menu_2)
                                    <option value="{{$menu_2->id}}" {{old('menu') && in_array($menu_2->id,old('menu')) ? 'selected':'' }} {{isset($select_data) && in_array($menu_2->id,$select_data->menu->pluck('id')->toArray()) ? 'selected':''}}>&nbsp;&nbsp;&nbsp;&nbsp;∟{{$menu_2->name_tw}}({{$menu_2->name_en}})</option>
                                    @foreach ($menu_2->children as $menu_3)
                                        <option value="{{$menu_3->id}}" {{old('menu') && in_array($menu_3->id,old('menu')) ? 'selected':'' }} {{isset($select_data) && in_array($menu_3->id,$select_data->menu->pluck('id')->toArray()) ? 'selected':''}}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;∟{{$menu_3->name_tw}}({{$menu_3->name_en}})</option>
                                    @endforeach
                                @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="subject">
                    <div class="form-group row pt-2">
                        <label class="col-md-1 control-label">原價 {{$request->language == 'en' ? 'US$':'NT$'}}</label>
                        <div class="col-md-11">
                            <input class="form-control" type="number" step={{$request->language == 'en' ? 0.01:1}} name="o_price" value="{{isset($select_data) ? ($select_data->info->where('language',$request->language)->first()->o_price ?? 0) : old('o_price')}}">
                        </div>
                    </div>
                </div>
                <div class="subject">
                    <div class="form-group row pt-2">
                        <label class="col-md-1 control-label">售價 {{$request->language == 'en' ? 'US$':'NT$'}}</label>
                        <div class="col-md-11">
                            <input class="form-control" type="number" step={{$request->language == 'en' ? 0.01:1}} name="price" value="{{isset($select_data) ? ($select_data->info->where('language',$request->language)->first()->price ?? 0) : old('price')}}">
                        </div>
                    </div>
                </div>
                <div class="subject">
                    <div class="form-group row pt-2">
                        <label class="col-md-1 control-label">成本 {{$request->language == 'en' ? 'US$':'NT$'}}</label>
                        <div class="col-md-11">
                            <input class="form-control" type="number" step={{$request->language == 'en' ? 0.01:1}} name="cost" value="{{isset($select_data) ? ($select_data->info->where('language',$request->language)->first()->cost ?? 0) : old('cost')}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0" id="checkboxradio">
                <div class="card">
                    <div class="card-body">
                            <label class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" value="1" name="is_display" {{isset($select_data) ? ($select_data->is_display?'checked':'') : (old('is_display')?'checked':'')}} class="custom-control-input"><span class="custom-control-label">是否顯示</span>
                            </label>
                            <label class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" value="1" name="is_shopping" {{isset($select_data) ? ($select_data->is_shopping?'checked':'') : (old('is_shopping')?'checked':'')}} class="custom-control-input"><span class="custom-control-label">可否購買</span>
                            </label>
                            <hr>
                            <label class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" value="1" name="is_hot" {{isset($select_data) ? ($select_data->is_hot?'checked':'') : (old('is_hot')?'checked':'')}} class="custom-control-input"><span class="custom-control-label">熱銷品</span>
                            </label>
                            <label class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" value="1" name="is_new" {{isset($select_data) ? ($select_data->is_new?'checked':'') : (old('is_new')?'checked':'')}} class="custom-control-input"><span class="custom-control-label">新品</span>
                            </label>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 px-0" id="checkboxradio">

            {{-- <form enctype="multipart/form-data"> --}}
                <div class="file-loading">
                    <input id="kv-explorer" type="file" multiple name="cover[]">
                </div>
            {{-- </form> --}}
            </div>
            <div class="row">
                @isset($select_data)
                    @foreach ($select_data->detail as $detail)
                        @include('backend.mall_item.detail',['the_detail'=>$detail])   
                    @endforeach
                @endisset
                @for ($i = 0; $i < 3; $i++)
                    @include('backend.mall_item.detail')
                @endfor
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                
                <div class="tab-regular" id="tabs">
                    <ul class="nav nav-tabs " id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">詳細說明</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">商品特色</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">商品規格</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="email editor">
                                <div class="col-md-12 p-0">
                                    <div class="form-group">
                                        <textarea name="discription" class="form-control summernote" id="summernote" rows="6"
                                            placeholder="Write Descriptions">{{isset($select_data) ? ($select_data->info->where('language',$request->language)->first()->discription ?? '') : old('discription')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="email editor">
                                <div class="col-md-12 p-0">
                                    <div class="form-group">
                                        <textarea name="special" class="form-control summernote" id="summernote"  rows="6"
                                            placeholder="Write Descriptions">{{isset($select_data) ? ($select_data->info->where('language',$request->language)->first()->special ?? '') : old('special')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="email editor">
                                <div class="col-md-12 p-0">
                                    <div class="form-group">
                                        @php
                                            $default_info_str = '<table class="table table-bordered"><tbody><tr><td style="background-color:rgb(247, 248, 250)">規格</td><td>內容</td></tr><tr><td style="background-color:rgb(247, 248, 250)"><br></td><td><br></td></tr></tbody></table>';
                                        @endphp
                                        <textarea name="info" class="form-control summernote" id="summernote" rows="6" placeholder="Write Descriptions">
                                            {{isset($select_data) ? 
                                            ($select_data->info->where('language',$request->language)->first()->info ?? $default_info_str) 
                                            : 
                                            (old('info') ? old('info'):$default_info_str) }}
                                            </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="email editor">
                @isset($select_data)
                <input type="hidden" name="data_id" value="{{$select_data['id']}}">
                <input type="hidden" name="action_type" value="update">
                <div class="email action-send">
                    <div class="col-md-12 ">
                        <div class="form-group">
                            <button class="btn btn-secondary btn-space" type="submit" style="width: 100%;"><i class="icon s7-mail"></i>
                                更新</button>
                            <a href="{{route('backend.mallItem.index')}}" class="btn btn-dark btn-lg btn-block">取消</a>
                        </div>
                    </div>
                </div>
                @else
                <input type="hidden" name="action_type" value="create">
                <button class="btn btn-success btn-lg btn-block" type="submit" style="width: 100%;">新增</button>
                @endisset
            </div>
            {{-- //email --}}

            

        </form>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- end influencer sidebar  -->
    <!-- ============================================================== -->
</div>

<script>
    $( function() {
        $( "#tabs" ).tabs();
    });
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2({
            tags: true
        });
    });

    $('.add_detail').on('click','a',function () {
        $(this).closest('.add_detail').hide('fast');
        $(this).closest('.detail_div').find('.detail_data').show('fast');
        $(this).closest('.detail_div').find('.detail_data').find('input').attr('disabled',false);
    });
    $('.delete_detail').on('click',function () {
        $(this).closest('.detail_data').hide('fast');
        $(this).closest('.detail_data').find('input').attr('disabled',true);
        $(this).closest('.detail_div').find('.add_detail').show('fast');
    });
    function readURL(input) {
            self = $(input);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    self.closest('.detail_data').find('.detail_img').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            tabsize: 2,
            height: 300,
            callbacks: {
                onImageUpload: function(files) {
                    uploadImage(files[0]);
                }
            },
            placeholder: 'type with apple, orange, watermelon and lemon',
            hint: {
                words: ['apple', 'orange', 'watermelon', 'lemon','帥帥帥帥哥哥','handsome','handsome2','handsome3'],
                match: /\b(\w{1,})$/,
                search: function (keyword, callback) {
                    callback($.grep(this.words, function (item) {
                        return item.indexOf(keyword) === 0;
                    }));
                }
            }
        });
        


        // function sendFile(file, editor, welEditable) {
        //     data = new FormData();
        //     data.append("file", file);
        //     data.append("_token", "{{csrf_token()}}");
        //     $.ajax({
        //     data: data,
        //     type: "POST",
        //     url: "{{route('backend.uploadImage')}}",
        //     cache: false,
        //     contentType: false,
        //     processData: false,
        //         success: function(url) {
        //             editor.insertImage(welEditable, url);
        //         }
        //     });
        // }
        function uploadImage(image) {
            var data = new FormData();
            data.append("image", image);
            data.append("_token", "{{csrf_token()}}");
            $.ajax({
                url: '{{route('backend.uploadImage')}}',
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "post",
                success: function(url) {
                    var image = $('<img>').attr('src', url);
                    $('#summernote').summernote("insertNode", image[0]);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
        $("#kv-explorer").fileinput({
            'theme': 'explorer-fas',
            'uploadUrl': '#',
            overwriteInitial: false,
            initialPreviewAsData: true,
            initialPreview: [
                "http://lorempixel.com/1920/1080/nature/1",
                "http://lorempixel.com/1920/1080/nature/2",
                "http://lorempixel.com/1920/1080/nature/3"
            ],
            initialPreviewConfig: [
                {caption: "nature-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1},
                {caption: "nature-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2},
                {caption: "nature-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3}
            ]
        });
    });

</script>
@endsection
