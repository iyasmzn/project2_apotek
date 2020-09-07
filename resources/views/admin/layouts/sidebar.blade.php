<?php 

$menus=[
    'home' => [
        'title' => 'Home',
        'route' => 'admin.home',
        'icon' => 'fa fa-home',
        'add_class' => '',

    ],
    'users' => [
        'title' => 'Users',
        'route' => 'admin.users.index',
        'icon' => 'fa fa-users',
        'add_class' => 'wreckClass',
        'childrens' => [
            [
                'title' => 'List',
                'route' => 'admin.users.index',
            ],
            [
                'title' => 'Add New User',
                'route' => 'admin.users.create',
            ],
        ],
    ],
    'drugs' => [
        'title' => 'Drugs',
        'route' => 'admin.drugs.index',
        'icon' => 'fa fa-ambulance',
        'add_class' => 'wreckClass',
        'childrens' => [
            [
                'title' => 'List',
                'route' => 'admin.drugs.index',
            ],
            [
                'title' => 'Add Drug',
                'route' => 'admin.drugs.create',
            ],
        ],
    ],
    'tags' => [
        'title' => 'Tags',
        'route' => 'admin.tags.index',
        'icon' => 'fa fa-tag',
        'add_class' => 'wreckClass',
        'childrens' => [
            [
                'title' => 'List',
                'route' => 'admin.tags.index',
            ],
            [
                'title' => 'Add Tag',
                'route' => 'admin.tags.index',
            ],
        ],
    ],
    'orders' => [
        'title' => 'Orders',
        'route' => 'admin.order.index',
        'icon' => 'fa fa-file-text-o',
        'add_class' => '',
        'childrens' => [
            [
                'title' => 'List',
                'route' => 'admin.order.index',
            ],
            [
                'title' => 'Order',
                'route' => 'admin.order.create',
            ],
        ],
    ],
];

?>

        <nav class="main-menu">
            <ul>
                @foreach($menus as $menu)

                    @if(isset($menu['childrens']))

                        <li class="has-subnav {{ request()->routeIs("$menu[route]*") ? 'active' : '' }}">
                            <a href="javascript:;">
                                <i class="{{ $menu['add_class'] }} {{ $menu['icon'] }} nav_icon" aria-hidden="true"></i>
                                <span class="nav-text">
                                    {{ $menu['title'] }}
                                </span>
                                <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
                            </a>
                            <ul>

                                @foreach($menu['childrens'] as $child)
                                    <li class="{{ request()->routeIs("$child[route]*") ? 'active' : '' }}">
                                    <a class="subnav-text" href="{{ route($child['route']) }}">
                                    {{ $child['title'] }}
                                    </a>
                                    </li>
                                @endforeach

                            </ul>
                        </li>

                    @else

                        <li class="{{ request()->routeIs("$menu[route]*") ? 'active' : '' }}">
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
                    <form action="{{ route('logout') }}" method="post"> 
                        @csrf
                <button style="background-color: rgb(0,188,212);border: none;color: white;">
                <i class="icon-off nav-icon"></i>
                <span class="nav-text">
                Logout
                </span>
                </button>

                    </form>
                </li>
            </ul>
        </nav>