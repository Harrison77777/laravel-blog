<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{asset('storage/admin/'.Auth::user('admin')->image)}}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->username}}</div>
                <div class="email">{{Auth::user()->email}}</div>
                @if (Auth::user()->role == 1)
                    <small style='color:white;'>Super admin</small>
                 @elseif (Auth::user()->role == 2)
                 <small style='color:white;'>Admin</small>
                 @elseif (Auth::user()->role == 3)
                 <small style='color:white;'>Checker</small>
                @endif
              
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{route('admin-profile.view')}}"><i class="material-icons">person</i>Profile</a></li>
                        <li><a href="{{route('admin-profile.setting')}}"><i class="material-icons">settings</i>Settings</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="{{route('admin.logout')}}"><i class="material-icons">input</i>Sign Out</a>
                            <form action="{{route('admin.logout')}}" method="POST">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="{{Request::is('backend/dashboard*') ? 'active' : ''}}">
                    <a href="{{route('dashboard')}}">
                        <i class="material-icons">home</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::is('backend/tag*') ? 'active' : '' }}"  >
                    <a href="{{route('tag.index')}}">
                        <i class="material-icons">text_fields</i>
                        <span>Tags</span>
                    </a>
                </li>
                <li class="{{ Request::is('backend/category*') ? 'active' : '' }}">
                    <a href="{{route('category.index')}}">
                        <i class="material-icons">category</i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="{{ Request::is('backend/post*') ? 'active' : '' }}" >
                    <a href="{{route('post.index')}}">
                        <i class="material-icons">library_books</i>
                        <span>Posts</span>
                    </a>
                </li>
                <li class="{{ Request::is('backend/user/approval*') ? 'active' : '' }}" >
                    <a href="{{route('approval.index')}}">
                        <i class="material-icons">rotate_90_degrees_ccw</i>
                        <span>Approval</span>
                    </a>
                </li>
                <li class="{{ Request::is('backend/subscribe*') ? 'active' : '' }}" >
                    <a href="{{route('subscribe.index')}}">
                        <i class="material-icons">subscriptions</i>
                        <span>subscription</span>
                    </a>
                </li>
                <li class="header">LABELS</li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="material-icons col-red">donut_large</i>
                        <span>Important</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->

    
    <!-- #END# Right Sidebar -->
</section>