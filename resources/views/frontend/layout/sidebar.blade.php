<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    @foreach (App\Models\Backend\ItemMenu::getMenuTree() as $i => $menu1)
    
                    <li class="nav-item">
                        <a class="nav-link" href="{{asset('product_list')}}/{{$menu1->id}}" data-toggle="collapse" aria-expanded="false" data-target="#submenu-{{$i}}" aria-controls="submenu-{{$i}}"><i class="fas fa-f fa-folder"></i>{{$menu1->name_tw}}</a>
                        @if(count($menu1->children))
                        <div id="submenu-{{$i}}" class="collapse submenu show" style="">
                            <ul class="nav flex-column">
                                @foreach ($menu1->children as $j=> $menu2)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{asset('product_list')}}/{{$menu2->id}}" data-toggle="collapse" aria-expanded="false" data-target="#submenu-{{$i}}-{{$j}}" aria-controls="submenu-{{$i}}-{{$j}}">{{$menu2->name_tw}}</a>
                                    @if(count($menu2->children))
                                    <div id="submenu-{{$i}}-{{$j}}" class="collapse submenu show" style="">
                                        <ul class="nav flex-column">
                                            @foreach ($menu2->children as $menu3)
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{asset('product_list')}}/{{$menu3->id}}">{{$menu3->name_tw}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</div>