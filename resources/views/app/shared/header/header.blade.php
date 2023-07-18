<header id="header-nav">
    <div class="container">
        <div class="box-profile">
            <div class="profile">
                <div class="name">Hi, {{ Auth::user()->name }}
                </div>
                <div class="thumb">
                    <img src="{{ asset('storage/user/admin.png') }}"
                        alt="" />
                </div>
            </div>
            <ul class="action">
                <li>
                    <a href="/dashboard/account-info">
                        <i class="fa-regular fa-user"></i>
                        <span class="text">Thông tin chi tiết</span>
                    </a>
                </li>
                <li>
                    <a href="/logout">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> <span class="text">Thoát</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>