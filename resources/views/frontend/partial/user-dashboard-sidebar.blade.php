<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{asset('storage/user/'.Auth::user('web')->image)}}" width="48" height="48" alt="User"/>
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user('web')->username}}</div>
                <div class="email">{{Auth::user('web')->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{route('user.profile.view')}}"><i class="material-icons">person</i>Profile
                            </a></li>
                    <li><a href="{{route('user.profile.setting')}}"><i class="material-icons">settings</i>
                        Setting
                            </a></li>
                        <li role="separator" class="divider"></li>
                        <li><a
                            onclick="
                            event.preventDefault();
                            document.getElementById('userLogout').submit();
                            "
                             href=""><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <form id="userLogout" action="{{route('logout')}}" method="POST">
            @csrf
        </form>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="{{Request::is('frontend/user/dashboard') ? 'active' : ''}}">
                    <a href="{{route('user.dashboard')}}">
                        <i class="material-icons">home</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{Request::is('frontend/user/dashboard/userPost*') ? 'active':''}}">
                    <a href="{{route('userPost.index')}}">
                        <i class="material-icons">text_fields</i>
                        <span>Posts</span>
                    </a>
                </li>
                <li class="{{Request::is('frontend/comment/show/user/post/comment*') ? 'active' : ''}}">
                    <a href="{{route('show.user.post.comment')}}">
                        <i class="material-icons">layers</i>
                        <span>Comment</span>
                    </a>
                </li>
                <li class="{{Request::is('frontend/favorite/post*') ? 'active' : ''}}">
                    <a href="{{route('favorite.post.list')}}">
                        <i class="material-icons">update</i>
                        <span>Favorite post</span>
                    </a>
                </li>
                <li class="header">LABELS</li>
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
</section>