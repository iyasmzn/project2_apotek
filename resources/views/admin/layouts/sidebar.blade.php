<?php 

$menus=[
    'home' => [
        'title' => 'Home',
        'route' => 'admin.home',
        'icon' => 'fa-home',
    ],
    'users' => [
        'title' => 'Users',
        'route' => 'admin.users.index',
        'icon' => 'fa-file-text-o',
        'childrens' => [
            [
                'title' => 'List',
                'route' => 'admin.users.index',
            ],
            [
                'title' => 'Add New User',
                'route' => 'admin.users.index',
            ],
        ],
    ],
    'drugs' => [
        'title' => 'Drugs',
        'route' => 'admin.drugs.index',
        'icon' => 'fa-file-text-o',
        'childrens' => [
            [
                'title' => 'List',
                'route' => 'admin.drugs.index',
            ],
            [
                'title' => 'Add',
                'route' => 'admin.drugs.index',
            ],
        ],
    ],
];

?>

        <nav class="main-menu">
            <ul>
                @foreach($menus as $menu)

                    @if(isset($menu['childrens']))

                        <li class="has-subnav">
                            <a href="javascript:;">
                                <i class="fa {{ $menu['icon'] }} nav_icon" aria-hidden="true"></i>
                                <span class="nav-text">
                                    {{ $menu['title'] }}
                                </span>
                                <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
                            </a>
                            <ul>

                                @foreach($menu['childrens'] as $child)
                                    <li>
                                    <a class="subnav-text" href="{{ route($child['route']) }}">
                                    {{ $child['title'] }}
                                    </a>
                                    </li>
                                @endforeach

                            </ul>
                        </li>

                    @else

                        <li class="">
                            <a href="{{ route($menu['route']) }}">
                                <i class="fa {{ $menu['icon'] }} nav_icon"></i>
                                <span class="nav-text">
                                {{$menu['title']}}
                                </span>
                            </a>
                        </li>
                        
                    @endif

                @endforeach

            </ul>
            <ul class="logout">
                <li>
                <a href="login.html">
                <i class="icon-off nav-icon"></i>
                <span class="nav-text">
                Logout
                </span>
                </a>
                </li>
            </ul>
        </nav>