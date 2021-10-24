@extends('backend.layout-concept.app')
@section('content')

<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 co-12">
        <section class="card card-fluid">
            <h5 class="card-header drag-handle"> Nestable List </h5>
            <form id="item_menu_form" action="{{route('backend.itemMenu.delete')}}" method="POST" pjax-container>
                @method('DELETE')
                @csrf
                <input type="hidden" name="menu_id" value="" id='delete_menu_id'>
            <div class="dd" id="nestable">
                <ol class="dd-list">
                    @foreach ($menus as $menu_1)
                    <li class="dd-item" data-id="2">
                        <div class="dd-handle {{isset($select_menu) && $select_menu->id == $menu_1->id ? 'bg-brand':''}}"> <span class="drag-indicator"></span>
                            <div> {{$menu_1->name}}</div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <a href="{{route('backend.itemMenu.edit',$menu_1->id)}}" class="btn btn-secondary">Edit</a>
                                <button class="btn btn-sm btn-light" type="submit" data-menu_id="{{$menu_1->id}}">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                        @foreach ($menu_1->children as $menu_2)
                        <ol class="dd-list">
                            <li class="dd-item" data-id="5">
                                <div class="dd-handle {{isset($select_menu) && $select_menu->id == $menu_2->id ? 'bg-brand':''}}"> <span class="drag-indicator"></span>
                                    <div> {{$menu_2->name}} </div>
                                    <div class="dd-nodrag btn-group ml-auto">
                                        <a href="{{route('backend.itemMenu.edit',$menu_2->id)}}" class="btn btn-secondary">Edit</a>
                                        <button class="btn btn-sm btn-light" type="submit" data-menu_id="{{$menu_2->id}}">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                @foreach ($menu_2->children as $menu_3)
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="6">
                                        <div class="dd-handle {{isset($select_menu) && $select_menu->id == $menu_3->id ? 'bg-brand':''}}"> <span class="drag-indicator"></span>
                                            <div> {{$menu_3->name}}</div>
                                            <div class="dd-nodrag btn-group ml-auto">
                                                <a href="{{route('backend.itemMenu.edit',$menu_3->id)}}" class="btn btn-secondary">Edit</a>
                                                <button class="btn btn-sm btn-light" type="submit" data-menu_id="{{$menu_3->id}}">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                                @endforeach
                            </li>
                        </ol>
                        @endforeach
                    </li>
                    @endforeach
                </ol>
            </div>
            </form>
        </section>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="card">
            <form action="{{route('backend.itemMenu.update')}}" method="POST" pjax-container>
                @csrf
                <div class="card-body">
                    <h3 class="font-16">分類名稱</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="basicInput" placeholder="分類名稱" name="name"
                            value="{{isset($select_menu) ? $select_menu['name'] : ''}}">
                    </div>
                    @if($errors->count())
                    @foreach ($errors->all() as $error)
                    <ul class="parsley-errors-list filled">
                        <li class="parsley-required">{{$error}}</li>
                    </ul>
                    @endforeach
                    @endif
                </div>
                <div class="card-body border-top">
                    <h3 class="font-16">所屬分類</h3>
                    <select class="form-control" name="p_id">
                        <option value=0>頂層</option>
                        @foreach ($menus as $menu_1)
                        <option value="{{$menu_1->id}}" {{isset($select_menu) && $select_menu->p_id == $menu_1->id ? 'selected':''}} {{isset($select_menu) && $select_menu->id == $menu_1->id ? 'disabled':''}}>&nbsp;∟{{$menu_1->name}}</option>
                        @foreach ($menu_1->children as $menu_2)
                            <option value="{{$menu_2->id}}" {{isset($select_menu) && $select_menu->p_id == $menu_2->id ? 'selected':''}} 
                                {{isset($select_menu) && $select_menu->id == $menu_2->id ? 'disabled':''}}
                                {{isset($select_menu) && $select_menu->id == $menu_2->p_id ? 'disabled':''}}>&nbsp;&nbsp;&nbsp;&nbsp;∟{{$menu_2->name}}</option>
                        @endforeach
                        @endforeach
                    </select>
                </div>
                {{-- <div class="card-body border-top">
                    <h3 class="font-16">Influncer Category</h3>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck15"><label
                            class="custom-control-label" for="customCheck15">Business</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck16"><label
                            class="custom-control-label" for="customCheck16">Lifestyle</label>
                    </div>
                </div> --}}

                <div class="card-body border-top">
                    @isset($select_menu)
                        <input type="hidden" name="menu_id" value="{{$select_menu['id']}}">
                        <input type="hidden" name="action_type" value="update">
                        <input type="hidden" name="sort_type" value="" id="sort_type">

                        <button class="btn btn-warning btn-lg btn-block" type="submit" id="up" style="width: 100%;">向上</button>
                        <button class="btn btn-warning btn-lg btn-block" type="submit" id="down" style="width: 100%;">向下</button>
                            
                        
                        <button class="btn btn-secondary btn-lg btn-block" type="submit" style="width: 100%;">更新</button>
                        <a href="{{route('backend.itemMenu.index')}}" class="btn btn-dark btn-lg btn-block">取消</a>
                    @else
                        <input type="hidden" name="action_type" value="create">
                        <button class="btn btn-success btn-lg btn-block" type="submit" style="width: 100%;">新增</button>
                    @endisset
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#up').on('click',function () {
        $('#sort_type').val('up');
    });
    $('#down').on('click',function () {
        $('#sort_type').val('down');
    });

    $('#item_menu_form').on('click','button',function () {
        let menu_id = $(this).data('menu_id');
        $('#delete_menu_id').val(menu_id);
    });
</script>

@endsection
