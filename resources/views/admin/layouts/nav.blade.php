<section class="title-bar">
            <div class="logo">
                <h1><a href="{{ route('admin.home') }}"><img src="/colored/images/logo.png" alt="" /><!-- KAOPET --><!-- COLORED -->ngobat</a></h1>
            </div>
            <div class="full-screen">
                <section class="full-top">
                    <!-- <button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>     -->
                </section>
            </div>
            <div class="w3l_search">
                <form action="#" method="post">
                    <!-- <input type="text" name="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required=""> -->
                    <!-- <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button> -->
                </form>
            </div>
            <div class="header-right">
                <div class="profile_details_left">
                    <div class="header-right-left">
                        <h1 style="text-transform: capitalize;color: rgb(91,192,222)">{{ auth()->user()->name }}</h1>
                    </div>  
                    <div class="profile_details">       
                        <ul>
                            <li class="dropdown profile_details_drop">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <!-- <div style="width: 50px;height: 50px;background-image: url('/img/profile_img/{{ Auth::user()->photo }}');"></div> -->
                                    <div class="profile_img">   
                                        <span class="prfil-img"><i class="fa fa-user" aria-hidden="true"></i></span> 
                                        <div class="clearfix"></div>    
                                    </div>  
                                </a>
                                <ul class="dropdown-menu drp-mnu">
                                    <li> <a href="/admin/users/edit/{{ Auth::user()->id }}"><i class="fa fa-cog"></i> Settings</a> </li> 
                                    <li> <a href="/admin/users/view/{{ Auth::user()->id }}"><i class="fa fa-user"></i> Profile</a> </li> 
                                    <li> 
                                        <span>
                                            <form id="navLogoutForm" action="{{ route('logout') }}" method="post" style="color: rgb(153,153,153);transform: translateX(15px);">
                                                @csrf
                                                <i class="fa fa-sign-out"></i>
                                                <input type="submit" value="Logout" style="background-color: white;border: none;">
                                            </form>
                                        </span> 
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </section>