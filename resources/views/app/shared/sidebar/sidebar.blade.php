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
                                <span class="text">Trang chủ</span>
                            </a>
                        </div>
                    </li>
                     <li class="{{ request()->is('dashboard/category*')?'active':'' }}">
                        <div class="name-link">
                            <a href="/dashboard/category">
                                <span><i class="fa-brands fa-medium"></i></span>
                                <span class="text">Loại bài đăng</span>
                            </a>
                        </div>
                    </li>
                     <li class="{{ request()->is('dashboard/post*')?'active':'' }}">
                        <div class="name-link">
                            <a href="/dashboard/post">
                                <span><i class="fa-regular fa-images"></i></span>
                                <span class="text">Đăng bài</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>