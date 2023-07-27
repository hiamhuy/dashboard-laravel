@extends('pages.layouts.page')
@section('pageTitle',"Blog")
@section('pageId','page-blog')

@section('content')
<main>
    <div class="tabs-content">
        <div class="container">
            <div class="wrapper">
                <div id="card_one_content" class="tab-content">
                </div>
            </div>
        </div>
    </div>
    <div class="banners">
        <div class="container">
            <div class="wrapper">
                <div class="banner-info">
                    <h3 class="name-company">
                        Công ty công nghệ <span class="tName-Company">Hachitech Solution</span>
                    </h3>
                    <div class="info-company">
                        Chúng tôi là công ty chuyên gia công nghệ hàng đầu cung cấp các dịch vụ Phần mềm/
                        Phát triển website/Outsource cao cấp và tối ưu hóa các giải pháp quảng cáo đa nền
                        tảng. Được xây dụng với đội ngũ nhân viên trẻ, nhiệt huyết và đầy tham vọng, mang
                        đến năng suất làm việc tối đa để mang đến dịch vụ tốt nhất cho khách hàng.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cards">
        <div class="container">
            <div class="wrapper">
                <div class="card-item">
                    <div class="items" id="grid_data_1">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banners-company">
        <div class="container">
            <div class="wrapper">
                <div class="banner-comp">
                    <div class="thumbnail background-cover">
                        <img src="{{ asset('assets/blog-detail.png') }}" alt="" />
                    </div>
                    <div class="content-ban">
                        <h3 class="title-banner">
                            <span class="tName-Company">Hachitech Solution</span> cung cấp giải pháp phát
                            triển phần mềm
                        </h3>
                        <div class="content-banner">
                            Hidemium giúp bạn tạo một số lượng lớn hồ sơ và mỗi hồ sơ sẽ có dấu vân tay kỹ
                            thuật số riêng. Các hồ sơ này không trùng lặp với nhau, vì vậy các trang web sẽ
                            không cấm tài khoản của bạn
                        </div>
                        <div class="gotoweb">
                            <a class="text-hide" href="#">
                                <span><i class="fa-solid fa-globe"></i></span>
                                Đi đến trang web
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cards">
        <div class="container">
            <div class="wrapper">
                <div class="card-item">
                    <div class="items" id="grid_data_2">
                       
                           
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="gridview">
        <div class="gird-items">
            <div class="grid">
                <div class="item">
                    <div class="title">Lorem ipsum</div>
                    <div class="foot-grid">
                        <div class="content text-hide">
                            A wonderful serenity has taken possession of my entire soul, like these sweet
                            mornings of spring which I enjoy with my whole heart. I am alone, and feel the
                            charm of existence in this spot, which was created for the bliss of souls like
                            mine.
                        </div>
                        <div class="action">
                            <a href="#">Learn more</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="title">Lorem ipsum</div>
                    <div class="foot-grid">
                        <div class="content text-hide">
                            I throw myself down among the tall grass by the trickling stream; and, as I lie
                            close to the earth, a thousand unknown plants are noticed by me.
                        </div>
                        <div class="action">
                            <a href="#">Learn more</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="title">Lorem ipsum</div>
                    <div class="foot-grid">
                        <div class="content text-hide">
                            A small river named Duden flows by their place and supplies it with the
                            necessary regelialia. It is a paradisematic country, in which roasted parts of
                            sentences fly into your mouth.
                        </div>
                        <div class="action">
                            <a href="#">Learn more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination">
        <div class="container">
            <div class="wrapper">
                <div class="page">
                    <ul class="listPage">
                        <li>
                            <a><i class="fa-solid fa-angle-left"></i></a>
                        </li>
                        <li class="active-page">1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>
                            <a><i class="fa-solid fa-angle-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection