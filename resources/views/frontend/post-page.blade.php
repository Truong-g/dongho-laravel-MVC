@extends('layouts.site')
@section('title', 'Tìm kiếm')


@section('footer')
<footer class="footer">
    <div class="grid wide">
        <div class="row">
            <div class="col l-3">
                <div class="widget__footer">
                    <h2 class="widget__footer--title">Chính sách cửa hàng</h2>
                    <ul class="widget__footer--list">
                        <li class="widget__footer--items"><a href="">Trang chủ</a></li>
                        <li class="widget__footer--items"><a href="">Sản phẩm</a></li>
                        <li class="widget__footer--items"><a href="">Liên hệ</a></li>
                        <li class="widget__footer--items"><a href="">Về chúng tôi</a></li>
                        <li class="widget__footer--items"><a href="">Tin tức</a></li>
                        <li class="widget__footer--items"><a href="">Chính sách</a></li>
                    </ul>
                </div>
            </div>
            <div class="col l-3">
                <div class="widget__footer">
                    <h2 class="widget__footer--title">Hỗ trợ online</h2>
                    <ul class="widget__footer--list">
                        <li class="widget__footer--items"><a href="">Trang chủ</a></li>
                        <li class="widget__footer--items"><a href="">Sản phẩm</a></li>
                        <li class="widget__footer--items"><a href="">Liên hệ</a></li>
                        <li class="widget__footer--items"><a href="">Về chúng tôi</a></li>
                        <li class="widget__footer--items"><a href="">Tin tức</a></li>
                        <li class="widget__footer--items"><a href="">Chính sách</a></li>
                    </ul>
                </div>
            </div>
            <div class="col l-3">
                <div class="widget__footer">
                    <h2 class="widget__footer--title">Bảo hành chính hãng</h2>
                    <ul class="widget__footer--list">
                        <li class="widget__footer--items"><a href="">Trang chủ</a></li>
                        <li class="widget__footer--items"><a href="">Sản phẩm</a></li>
                        <li class="widget__footer--items"><a href="">Liên hệ</a></li>
                        <li class="widget__footer--items"><a href="">Về chúng tôi</a></li>
                        <li class="widget__footer--items"><a href="">Tin tức</a></li>
                        <li class="widget__footer--items"><a href="">Chính sách</a></li>
                    </ul>
                </div>
            </div>

            <div class="col l-3">
                <div class="widget__footer">
                    <h2 class="widget__footer--title">Hệ thống cửa hàng</h2>
                    <ul class="widget__footer--list">
                        <li class="widget__footer--items">Cơ sở 1: Trường Cao Đẳng Công Thương<a href=""></a></li>
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
            <div class="col l-4">
                <div class="footer__social">
                    <a href="" class="footer__social--link">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="footer__social--link">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="footer__social--link">
                        <i class="fab fa-google-plus-g"></i>
                    </a>
                    <a href="" class="footer__social--link">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="" class="footer__social--link">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

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
    <section class="postnews__detail">
        <div class="bread__crumb">
            <div class="grid wide">
                <ul>
                    <li>
                        <a href="{{url('/')}}" class="bread__crumb--link">Trang chủ</a>
                        <span class="arrowBreadcrumb"><i class="fa fa-angle-right"></i></span>
                    </li>
                    <li><strong class="currentBreadcrumb">{{$post_detail->title}}</strong></li>
                </ul>
            </div>
        </div>
        <div class="postnews__detail--container">
            <div class="grid wide">
                <div class="row">
                    <div class="col l-9">
                        <div class="postnews__detail--title">
                            <h1>{{$post_detail->title}}</h1>
                        </div>
                        <div class="postnews__detail--text">
                            <p>{!! $post_detail->content !!}</p> 
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
                                                        <a href="{{$hotpost->slug}}" class="post__container--right-hotpost-title">{{$hotpost->title}}</a>
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
                            <div class="post__container--right-box">
                                <div class="post__container--right-widget">
                                    <span>Bài viết mới nhất</span>
                                </div>
                                <ul class="post__container--right-hotpost-list">

                                    @foreach ($list_new_post as $newpost)
                                    <li class="post__container--right-hotpost-items" style="margin-bottom: 15px">
                                        <div class="grid">
                                            <div class="row no-gutters">
                                                <div class="col l-3">
                                                    <a href="{{$newpost->slug}}" style="background-image: url('{{asset('images/posts/'.$newpost->img)}}')" class="post__container--right-hotpost-img"></a>
                                                </div>
                                                <div class="col l-9">
                                                   <div class="post__container--right-hotpost-detail">
                                                        <a class="post__container--right-hotpost-title">{{$newpost->title}}</a>
                                                        <span class="post__time">
                                                            <i class="far fa-clock"></i>
                            
                                                              @php
                                                                  $time = strtotime("now") - strtotime($newpost->created_at);
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
                                                                      echo $newpost->created_at->format('d/m/Y');
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