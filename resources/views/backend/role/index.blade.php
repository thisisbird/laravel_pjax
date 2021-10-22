@extends('backend.layout-concept.app')
@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- search bar  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('backend.role.index')}}" method="GET" pjax-container>
                    <input class="form-control form-control-lg" type="search" placeholder="Search" aria-label="Search" name="search" value="{{$request->search}}">
                    <button class="btn btn-primary search-btn" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end search bar  -->
    <!-- ============================================================== -->
    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12">
        <!-- ============================================================== -->
        <!-- card influencer one -->
        <!-- ============================================================== -->
        @foreach ($roles as $role)
        <div class="card">
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
                                    <h2 class="font-24 m-b-10">{{$role->name}}</h2>
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
                                <p class="mb-2"><i class="fa fa-map-marker-alt mr-2  text-primary"></i>Salt Lake City,
                                    UT <span class="m-l-10">Male<span class="m-l-20">29 Year Old</span><span class="m-l-20">{{$role->email}}</span><span class="m-l-20">{{$role->account}}</span></span>
                                </p>
                                <div class="mt-3">
                                    <a href="#" class="mr-1 badge badge-light">Fitness</a><a href="#"
                                        class="mr-1 badge badge-light">Life Style</a><a href="#"
                                        class="mr-1 badge badge-light">Gym</a><a href="#"
                                        class="badge badge-light">Crossfit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="float-xl-right float-none mt-xl-0 mt-4">
                            <a href="#" class="btn-wishlist m-r-10"><i class="far fa-star"></i></a>
                            <a href="{{route('backend.role.edit',$role->id)}}" class="btn btn-secondary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-top user-social-box">
                <div class="user-social-media d-xl-inline-block "><span class="mr-2 twitter-color"> <i
                            class="fab fa-twitter-square"></i></span><span>13,291</span></div>
                <div class="user-social-media d-xl-inline-block"><span class="mr-2  pinterest-color"> <i
                            class="fab fa-pinterest-square"></i></span><span>84,019</span></div>
                <div class="user-social-media d-xl-inline-block"><span class="mr-2 instagram-color"> <i
                            class="fab fa-instagram"></i></span><span>12,300</span></div>
                <div class="user-social-media d-xl-inline-block"><span class="mr-2  facebook-color"> <i
                            class="fab fa-facebook-square "></i></span><span>92,920</span></div>
                <div class="user-social-media d-xl-inline-block"><span class="mr-2 medium-color"> <i
                            class="fab fa-medium"></i></span><span>291</span></div>
                <div class="user-social-media d-xl-inline-block"><span class="mr-2 youtube-color"> <i
                            class="fab fa-youtube"></i></span><span>1291</span></div>
            </div>
        </div>
        @endforeach

        <!-- ============================================================== -->
        <!-- end card influencer one -->
        <!-- ============================================================== -->


    </div>
    <!-- ============================================================== -->
    <!-- influencer sidebar  -->
    <!-- ============================================================== -->
    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="card">
            <form action="{{route('backend.role.update')}}" method="POST" pjax-container>
                @csrf
            <div class="card-body">
                <h3 class="font-16">建立角色</h3>
                <div class="form-group">
                    <label for="basicInput">角色名稱</label>
                    <input type="text" class="form-control" id="basicInput" placeholder="角色名稱" name="name" value="{{isset($select_role) ? $select_role['name'] : ''}}">
                </div>
            </div>

            <div class="card-body border-top">
                <h3 class="font-16">權限</h3>
                @foreach (App\Models\Backend\Permissions::sidebar() as $roles)
                @if(@$roles['type'] != 'divider')
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck{{$roles['id']}}" name="permissions_id[]" value="{{$roles['id']}}" {{isset($select_role) && in_array($roles['id'], $select_role->permissions->pluck('permissions_id')->toArray()) ? 'checked':'' }}>
                        <label class="custom-control-label" for="customCheck{{$roles['id']}}">{{$roles['title']}}</label>
                        @if(@$roles['submenu'])
                            @foreach ($roles['submenu'] as $roles_submenu)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck{{$roles_submenu['id']}}" name="permissions_id[]" value="{{$roles_submenu['id']}}" {{isset($select_role) && in_array($roles_submenu['id'], $select_role->permissions->pluck('permissions_id')->toArray()) ? 'checked':'' }}>
                                <label class="custom-control-label" for="customCheck{{$roles_submenu['id']}}">{{$roles_submenu['title']}}</label>
                                @if(@$roles_submenu['submenu'])
                                    @foreach ($roles_submenu['submenu'] as $roles_submenu_submenu)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck{{$roles_submenu_submenu['id']}}" name="permissions_id[]" value="{{$roles_submenu_submenu['id']}}" {{isset($select_role) && in_array($roles_submenu_submenu['id'], $select_role->permissions->pluck('permissions_id')->toArray()) ? 'checked':'' }}>
                                        <label class="custom-control-label" for="customCheck{{$roles_submenu_submenu['id']}}">{{$roles_submenu_submenu['title']}}</label>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                            @endforeach
                        @endif
                    </div>
                @endif
                @endforeach
            </div>

            <div class="card-body border-top">
                {{-- <a href="#" class="btn btn-success btn-lg btn-block">新增</a> --}}
                @isset($select_role)
                    <input type="hidden" name="role_id" value="{{$select_role['id']}}">
                    <input type="hidden" name="action_type" value="update">
                    <button class="btn btn-secondary btn-lg btn-block" type="submit" style="width: 100%;">更新</button>
                    <a href="{{route('backend.role.index')}}" class="btn btn-dark btn-lg btn-block">取消</a>
                @else
                    <input type="hidden" name="action_type" value="create">
                    <button class="btn btn-success btn-lg btn-block" type="submit">新增</button>
                @endisset
            </div>
            </form>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end influencer sidebar  -->
    <!-- ============================================================== -->
</div>

@endsection