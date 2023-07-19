<aside id="sidebar">
    <div class="toggle-nav">
        <i class="fa-regular fa-circle hidden"></i>
        <i class="fa-regular fa-circle-dot block"></i>
    </div>
    <div class="container">
        <div class="logo">
            <img class="logo-big" src="{{ asset('assets/logo/logo.png') }}" alt="" />
            <img class="logo-mini" src="{{ asset('assets/logo/logo-mini.png') }}" alt="" />
        </div>
        <div class="nav-links">
            <div class="wrapper">
                <ul class="item-link">
                    <li class="{{ request()->is('dashboard')?'active':'' }}">
                        <div class="name-link">
                            <a href="/dashboard">
                                <span><i class="fa-solid fa-house"></i></span>
                                <span class="text">Home</span>
                            </a>
                        </div>
                    </li>
                     <li class="{{ request()->is('dashboard/posttype')?'active':'' }}">
                        <div class="name-link">
                            <a href="/dashboard/posttype">
                                <span><i class="fa-brands fa-medium"></i></span>
                                <span class="text">Post type</span>
                            </a>
                        </div>
                    </li>
                     <li class="{{ request()->is('dashboard/post')?'active':'' }}">
                        <div class="name-link">
                            <a href="/dashboard/post">
                                <span><i class="fa-regular fa-images"></i></span>
                                <span class="text">Post</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>