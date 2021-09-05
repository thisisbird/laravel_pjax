@inject('sidebar', 'App\Http\Controllers\Backend\Controller')
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    @foreach ($sidebar->sidebar() as $key => $item)
                    @if(isset($item['type']) && $item['type'] == 'divider')
                    <li class="nav-divider">
                        {{$item['title']}}
                    </li>
                    @else
                    <li class="nav-item ">
                        @if(isset($item['submenu']) && count($item['submenu']))
                        <a class="nav-link" href="{{$item['url']}}" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-{{$key}}" aria-controls="submenu-{{$key}}"><i
                                class="{{$item['icon']}}"></i>{{$item['title']}} <span
                                class="badge badge-success">6</span></a>
                        <div id="submenu-{{$key}}" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                @foreach ($item['submenu'] as $key2 => $item_submenu)
                                <li class="nav-item">
                                    @if(isset($item_submenu['submenu']) && count($item_submenu['submenu']))
                                    <a class="nav-link" href="{{$item_submenu['url']}}" data-toggle="collapse"
                                        aria-expanded="false" data-target="#submenu-{{$key}}-{{$key2}}"
                                        aria-controls="submenu-{{$key}}-{{$key2}}">{{$item_submenu['title']}}</a>
                                    <div id="submenu-{{$key}}-{{$key2}}" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            @foreach ($item_submenu['submenu'] as $key3 => $item_submenu2)
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{$item_submenu2['url']}}">{{$item_submenu2['title']}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @else
                                    <a class="nav-link" href="{{$item_submenu['url']}}">{{$item_submenu['title']}}</a>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @else
                        <a class="nav-link" href="{{$item['url']}}"><i
                                class="fa fa-fw fa-user-circle"></i>{{$item['title']}} <span
                                class="badge badge-success">6</span></a>
                        @endif
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</div>

<script>
    $(document).ready(function () {
        var selectedMenu = "{!! url()->current() !!}";
        var selector = $('#navbarNav').find('a[href="' + selectedMenu + '"]');
        selector.addClass('active');
        selector.closest('.submenu').addClass('show');
        selector.closest('.submenu').parents('.submenu').addClass('show');
        // selector.parent().addClass('active');
        // selector.parents('ul.treeview-menu').css('display', 'block');
        // selector.parents('li.treeview').addClass('menu-open');
        $('.nav-link').click(function () {
            if ($(this).attr('href') != '#') {
                $('.nav-link').removeClass('active');
            }
            $(this).addClass('active')
        });
    });

</script>
