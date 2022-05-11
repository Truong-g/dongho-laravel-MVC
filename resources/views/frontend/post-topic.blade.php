@extends('layouts.site')
@section('title', $topic->name)

@section('footer')
    
<footer class="footer">
    <div class="grid wide">
        <div class="row">
            
            <x-footer-menu1 />
            
            <x-footer-menu2 />

            <x-footer-menu3 />

            <div class="col l-3">
                <div class="widget__footer">
                    <h2 class="widget__footer--title">Hệ thống cửa hàng</h2>
                    <ul class="widget__footer--list">
                        <li class="widget__footer--items">Cơ sở 1: Phan Rang - Tháp Chàm<a href=""></a></li>
                        <li class="widget__footer--items">Cơ sở 2: Tỉnh Ninh Thuận<a href=""></a></li>
                        <li class="widget__footer--items">Cơ sở 3: Quận 9, Tp HCM<a href=""></a></li>
                        <li class="widget__footer--items">Hotline mua hàng: <a href="tel:012345678">012345678</a></li>
                        <li class="widget__footer--items">Hotline bảo hành: <a href="tel:012345678">012345678</a></li>
                        <li class="widget__footer--items">Email hỗ trợ: <a href="mailto:dongho@gmail.com">dongho@gmail.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            
            <x-footer-menu4 />

            <div class="col l-8">
                <div class="mail__footer--subcribe">
                    <form class="form" method="">
                        <div class="input__group">
                            <div class="input__editText">
                                <input type="text" placeholder="Nhập tên của bạn">
                                <input type="email" placeholder="Nhập email của bạn">
                            </div>
                            <div class="input__button" >
                                <button>Nhận tin <i class="fas fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__copyright">
        <div class="grid wide">
            <p>Bản quyền thuộc về <span>Nguyễn Tuấn Trường</span> | Mã số sinh viên <span>2119110097</span></p>
        </div>
    </div>
</footer>

@endsection

@section('maincontent')

    <section class="post__showAll">

        <div class="bread__crumb">
            <div class="grid wide">
                <ul>
                    <li>
                        <a href="" class="bread__crumb--link">Trang chủ</a>
                        <span class="arrowBreadcrumb"><i class="fa fa-angle-right"></i></span>
                    </li>
                    <li>
                        <a href="/bai-viet" class="bread__crumb--link">Bài viết</a>
                        <span class="arrowBreadcrumb"><i class="fa fa-angle-right"></i></span>
                    </li>
                    <li><strong class="currentBreadcrumb">{{$topic->name}}</strong></li>
                </ul>
            </div>
        </div>

        <div class="postnews__container">
            <div class="grid wide">
                <div class="row">
                    <div class="col l-9">
                        <div class="post__container--left">
                            <div class="post__showAll--header">
                                <span>{{$topic->name}} mới nhất</span>
                            </div>
                            @if (count($list_news_post) > 0)
                                <div class="post__showAll--container">
                                    <div class="grid">

                                        @foreach ($list_news_post as $newsPost)

                                            <div class="row" style="margin-bottom: 30px">
                                                <div class="col l-4">
                                                    <a href="{{ $newsPost->slug }}" class="post__showAll--img" style="background-image: url('{{asset('images/posts/'.$newsPost->img)}}')"></a>
                                                </div>
                                                <div class="col l-8">
                                                    <div class="post__showAll--content">
                                                        <h3 class="post__showAll--title">
                                                            <a href="{{ $newsPost->slug }}" class="post__showAll--title-link">
                                                                {{ $newsPost->title }}
                                                            </a>
                                                        </h3>
                                                        <div class="post__timeAndType">
                                                            <a href="{{$newsPost->slugtop}}" class="post__type">{{ $newsPost->name }}</a>
                                                            <span class="post__time">
                                                                <i class="far fa-clock"></i>
                                
                                                                @php
                                                                    $time = strtotime("now") - strtotime($newsPost->created_at);
                                                                    $hour = 0;
                                                                    $minute = 0;
                                                                    $second =0;
                                                                    if($time <= 86400)
                                                                    {
                                                                        if($time < 3600)
                                                                        {
                                                                            if($time < 60)
                                                                            {
                                                                                for($k = 0; $k <= 60; $k++)
                                                                                {
                                                                                    if($time < $k)
                                                                                    {
                                                                                        $time = $k;
                                                                                        $second++;
                                                                                    }
                                                                                }
                                                                                echo 60 - $second. " giây trước";
                                                                            }
                                                                            else
                                                                            {
                                                                                for($j = 0; $j <= 3600; $j+=60)
                                                                                {
                                                                                    if($time < $j)
                                                                                    {
                                                                                        $time = $j;
                                                                                        $minute++;
                                                                                    }
                                                                                }
                                                                                echo 60 - $minute. " phút trước";
                                                                            }
                                                                        }
                                                                        else 
                                                                        {
                                                                            for($i = 0; $i <= 86400; $i+=3600)
                                                                            {
                                                                                if($time < $i)
                                                                                {
                                                                                    $time = $i;
                                                                                    $hour++;
                                                                                }
                                                                                
                                                                            }
                                                                            echo 24 - $hour." giờ trước";
                                                                        }
                                                                        
                                                                    }
                                                                    else 
                                                                    {
                                                                        echo $newsPost->created_at->format('d/m/Y');
                                                                    }
                                                                @endphp
                                                            </span>
                                                        </div>
                                                        <div class="post__showAll--detail">
                                                            <p>{{ $newsPost->content }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                        
                                    </div>
                                </div>
                                <div class="pagination__container">
                                    <span>{{ $list_news_post->links('vendor.pagination.default')}}</span>
                                </div>
                            @else
                                <p class="empty__items--confirmNumber">Không có bài viết nào</p>
                                
                            @endif
                            
                        </div>
                        
                    </div>
                    <div class="col l-3">

                        <div class="post__container--right">
                            <div class="post__container--right-box">
                                <div class="post__container--right-widget">
                                    <span>Danh mục sản phẩm</span>
                                </div>
                                <ul class="post__container--right-widget-list">
                                    
                                    @foreach ($list_category as $category)
                                        <li class="post__container--right-widget-items">
                                            <a href="{{$category->slug}}" class="post__container--right-widget-link">{{$category->name}}</a>
                                        </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                            <div class="post__container--right-box">
                                <div class="post__container--right-widget">
                                    <span>Chủ đề bài viết</span>
                                </div>
                                <ul class="post__container--right-widget-list">
    
                                    @foreach ($list_topic as $topic)
                                    <li class="post__container--right-widget-items">
                                        <a href="{{$topic->slug}}" class="post__container--right-widget-link">{{$topic->name}}</a>
                                    </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                            <div class="post__container--right-box">
                                <div class="post__container--right-widget">
                                    <span>Bài viết hot nhất</span>
                                </div>
                                <ul class="post__container--right-hotpost-list">

                                    @foreach ($list_hot_post as $hotpost)
                                        <li class="post__container--right-hotpost-items" style="margin-bottom: 15px">
                                            <div class="grid">
                                                <div class="row no-gutters">
                                                    <div class="col l-3">
                                                        <a href="{{$hotpost->slug}}" style="background-image: url('{{asset('images/posts/'.$hotpost->img)}}')" class="post__container--right-hotpost-img"></a>
                                                    </div>
                                                    <div class="col l-9">
                                                    <div class="post__container--right-hotpost-detail">
                                                            <a href="{{$hotpost->slug}}" class="post__container--right-hotpost-title">{{$hotpost->title}}}</a>
                                                            <span class="post__time">
                                                                <i class="far fa-clock"></i>
                                
                                                                @php
                                                                    $time = strtotime("now") - strtotime($hotpost->created_at);
                                                                    $hour = 0;
                                                                    $minute = 0;
                                                                    $second =0;
                                                                    if($time <= 86400)
                                                                    {
                                                                        if($time < 3600)
                                                                        {
                                                                            if($time < 60)
                                                                            {
                                                                                for($k = 0; $k <= 60; $k++)
                                                                                {
                                                                                    if($time < $k)
                                                                                    {
                                                                                        $time = $k;
                                                                                        $second++;
                                                                                    }
                                                                                }
                                                                                echo 60 - $second. " giây trước";
                                                                            }
                                                                            else
                                                                            {
                                                                                for($j = 0; $j <= 3600; $j+=60)
                                                                                {
                                                                                    if($time < $j)
                                                                                    {
                                                                                        $time = $j;
                                                                                        $minute++;
                                                                                    }
                                                                                }
                                                                                echo 60 - $minute. " phút trước";
                                                                            }
                                                                        }
                                                                        else 
                                                                        {
                                                                            for($i = 0; $i <= 86400; $i+=3600)
                                                                            {
                                                                                if($time < $i)
                                                                                {
                                                                                    $time = $i;
                                                                                    $hour++;
                                                                                }
                                                                                
                                                                            }
                                                                            echo 24 - $hour." giờ trước";
                                                                        }
                                                                        
                                                                    }
                                                                    else 
                                                                    {
                                                                        echo $hotpost->created_at->format('d/m/Y');
                                                                    }
                                                                @endphp
                                                                    
                                                            </span>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection