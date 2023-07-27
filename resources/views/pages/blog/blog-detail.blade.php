@extends('pages.layouts.page')
@section('pageTitle',"Blog Detail")
@section('pageId','page-blog-detail')

@section('content')
<main>
    <div class="content-detail">
        <div class="container">
            <div class="wrapper">
                <div class="content">
                    <div class="time-up"><span>{{ $data->created_at->format('d/m/Y') }} - </span><span>{{ $data->created_at->diffForHumans() }}</span></div>
                    <h1 class="title-content">
                        <span class="tName-Company">{{ $data->name }}
                    </h1>
                    <h3 class="article-title">{{ $data->title }}</h3>
                    <div class="article-content">
                       {!! $data->content !!}
                    </div>
                    <div class="interacts">
                        <div class="interact-icon">
                            <ul>
                                <li class="interact-like">
                                    <span><i class="fa-regular fa-thumbs-up"></i></span>0
                                </li>
                                <li class="interact-comment">
                                    <span><i class="fa-regular fa-message"></i></span>0
                                </li>
                                <li class="interact-share">
                                    <i class="fa-solid fa-share"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-comment">
        <div class="container">
            <div class="wrapper">
               <div class="comment-wrapper">
                <h1>Bình Luận</h1>
                
                <div class="box-wrapper">
                    <div class="box">
                        <div class="avatar">
                            <div class="no-data-avatar"></div>
                        </div>
                        <div class="comment">
                            <div class="username">namesurname</div>
                            <div class="content-cmt">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                nibh<br />euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                            </div>
                            <div class="rates">
                                <div class="rate">
                                    <svg
                                        width="151"
                                        height="26"
                                        viewBox="0 0 151 26"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M13.1841 0.891113L17.2216 7.60006L24.8498 9.36677L19.7169 15.2798L20.3939 23.0807L13.1841 20.0262L5.97423 23.0807L6.65124 15.2798L1.51831 9.36677L9.14655 7.60006L13.1841 0.891113Z"
                                            fill="#F5D739"
                                        />
                                        <path
                                            d="M44.4067 0.891113L48.4442 7.60006L56.0725 9.36677L50.9395 15.2798L51.6165 23.0807L44.4067 20.0262L37.1969 23.0807L37.8739 15.2798L32.741 9.36677L40.3692 7.60006L44.4067 0.891113Z"
                                            fill="#F5D739"
                                        />
                                        <path
                                            d="M75.6294 0.891113L79.6669 7.60006L87.2951 9.36677L82.1622 15.2798L82.8392 23.0807L75.6294 20.0262L68.4195 23.0807L69.0966 15.2798L63.9636 9.36677L71.5919 7.60006L75.6294 0.891113Z"
                                            fill="#F5D739"
                                        />
                                        <path
                                            d="M106.852 0.891113L110.89 7.60006L118.518 9.36677L113.385 15.2798L114.062 23.0807L106.852 20.0262L99.6422 23.0807L100.319 15.2798L95.1863 9.36677L102.815 7.60006L106.852 0.891113Z"
                                            fill="#F5D739"
                                        />
                                        <path
                                            d="M138.075 0.891113L142.112 7.60006L149.74 9.36677L144.608 15.2798L145.285 23.0807L138.075 20.0262L130.865 23.0807L131.542 15.2798L126.409 9.36677L134.037 7.60006L138.075 0.891113Z"
                                            fill="#F5D739"
                                        />
                                    </svg>
                                </div>
                                <div class="time">26/05/2023 lúc 09:15 AM</div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="avatar">
                            <div class="no-data-avatar"></div>
                        </div>
                        <div class="comment">
                            <div class="username">namesurname</div>
                            <div class="content-cmt">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                nibh<br />euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                            </div>
                            <div class="rates">
                                <div class="rate">
                                    <svg
                                        width="151"
                                        height="26"
                                        viewBox="0 0 151 26"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M13.1841 0.891113L17.2216 7.60006L24.8498 9.36677L19.7169 15.2798L20.3939 23.0807L13.1841 20.0262L5.97423 23.0807L6.65124 15.2798L1.51831 9.36677L9.14655 7.60006L13.1841 0.891113Z"
                                            fill="#F5D739"
                                        />
                                        <path
                                            d="M44.4067 0.891113L48.4442 7.60006L56.0725 9.36677L50.9395 15.2798L51.6165 23.0807L44.4067 20.0262L37.1969 23.0807L37.8739 15.2798L32.741 9.36677L40.3692 7.60006L44.4067 0.891113Z"
                                            fill="#F5D739"
                                        />
                                        <path
                                            d="M75.6294 0.891113L79.6669 7.60006L87.2951 9.36677L82.1622 15.2798L82.8392 23.0807L75.6294 20.0262L68.4195 23.0807L69.0966 15.2798L63.9636 9.36677L71.5919 7.60006L75.6294 0.891113Z"
                                            fill="#F5D739"
                                        />
                                        <path
                                            d="M106.852 0.891113L110.89 7.60006L118.518 9.36677L113.385 15.2798L114.062 23.0807L106.852 20.0262L99.6422 23.0807L100.319 15.2798L95.1863 9.36677L102.815 7.60006L106.852 0.891113Z"
                                            fill="#F5D739"
                                        />
                                        <path
                                            d="M138.075 0.891113L142.112 7.60006L149.74 9.36677L144.608 15.2798L145.285 23.0807L138.075 20.0262L130.865 23.0807L131.542 15.2798L126.409 9.36677L134.037 7.60006L138.075 0.891113Z"
                                            fill="#F5D739"
                                        />
                                    </svg>
                                </div>
                                <div class="time">26/05/2023 lúc 09:15 AM</div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="avatar">
                            <div class="no-data-avatar"></div>
                        </div>
                        <div class="comment">
                            <div class="username">namesurname</div>
                            <div class="content-cmt">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                nibh<br />euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                            </div>
                            <div class="rates">
                                <div class="rate">
                                    <svg
                                        width="151"
                                        height="26"
                                        viewBox="0 0 151 26"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M13.1841 0.891113L17.2216 7.60006L24.8498 9.36677L19.7169 15.2798L20.3939 23.0807L13.1841 20.0262L5.97423 23.0807L6.65124 15.2798L1.51831 9.36677L9.14655 7.60006L13.1841 0.891113Z"
                                            fill="#F5D739"
                                        />
                                        <path
                                            d="M44.4067 0.891113L48.4442 7.60006L56.0725 9.36677L50.9395 15.2798L51.6165 23.0807L44.4067 20.0262L37.1969 23.0807L37.8739 15.2798L32.741 9.36677L40.3692 7.60006L44.4067 0.891113Z"
                                            fill="#F5D739"
                                        />
                                        <path
                                            d="M75.6294 0.891113L79.6669 7.60006L87.2951 9.36677L82.1622 15.2798L82.8392 23.0807L75.6294 20.0262L68.4195 23.0807L69.0966 15.2798L63.9636 9.36677L71.5919 7.60006L75.6294 0.891113Z"
                                            fill="#F5D739"
                                        />
                                        <path
                                            d="M106.852 0.891113L110.89 7.60006L118.518 9.36677L113.385 15.2798L114.062 23.0807L106.852 20.0262L99.6422 23.0807L100.319 15.2798L95.1863 9.36677L102.815 7.60006L106.852 0.891113Z"
                                            fill="#F5D739"
                                        />
                                        <path
                                            d="M138.075 0.891113L142.112 7.60006L149.74 9.36677L144.608 15.2798L145.285 23.0807L138.075 20.0262L130.865 23.0807L131.542 15.2798L126.409 9.36677L134.037 7.60006L138.075 0.891113Z"
                                            fill="#F5D739"
                                        />
                                    </svg>
                                </div>
                                <div class="time">26/05/2023 lúc 09:15 AM</div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="commnent-body">
                    <div class="show-all-cmt">
                        <a href="#">Xem tất cả bình luận</a>
                    </div>
                    <form action="" method="POST">
                      <div class="box-fm-cmt-body">
                        <div class="avatar"></div>
                        <div class="fm-box-cmt">
                            <input type="text" name="comment" id="comment" class="comment">
                            <button type="submit">
                                <img src="{{ asset('assets/icon-send.png') }}" alt="Bình luận">
                            </button>
                       </div>
                      </div>
                    </form>
                </div>
               </div>
            </div>
        </div>
    </div>
    <div class="cards">
        <div class="container">
            <div class="wrapper">
                <div class="card-item">
                    <div class="items">
                        @foreach($dataRelatedPosts as $item)
                            <div class="item">
                                <div class="thumbnail background-cover">
                                    <img src="{{ asset('storage/post/'.$item->image) }}" alt="" />
                                </div>
                                <div class="item-content">
                                    <div class="content_info">
                                        <span class="flag">{{ $item->name_category }}</span>
                                        <span class="time">{{ $item->created_at->diffForHumans() }}</span>
                                    </div>
                                    <h2 class="title text-hide">
                                        {{ $item->name }}
                                    </h2>
                                    <div class="content text-hide">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta
                                        mollitia quam rerum debitis aliquam consequatur enim tempora, sed quasi
                                        numquam maxime et aspernatur illo, pariatur vel neque. Fuga, nostrum
                                        aperiam? reiciendis provident fuga?
                                    </div>
                                </div>
                                <div class="btn-readmore">
                                    <a href="{{ route('blog.detail.slug',$item->slug) }}"
                                        >Read more <span><i class="fa-solid fa-chevron-right"></i></span
                                    ></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($dataRelatedPosts->count() > 6)
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
    @endif

</main>

@endsection