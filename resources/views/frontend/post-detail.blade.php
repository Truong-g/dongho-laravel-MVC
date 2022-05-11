@extends('layouts.site')
@section('title', $post_detail->title)

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

@section('javascript')
    <script type='text/javascript'>
    $(document).ready(function(){

        load_comment()

        function load_comment(){
            var postid = $('.comment_post-id').val();
            var _token = '{{csrf_token()}}';

            $.ajax({
                url:"{{route('ajax.loadcomment')}}",
                method: 'POST',
                data: {postid : postid, _token : _token},
                success: function(data)
                {
                    $('.comment__container--showAll').html(data);
                }
            });
        }      

        $('.postnews__detail--button button').click(function(e)
        {
            e.preventDefault();
            send_comment();
            
        });
        

        function send_comment()
        {
            var notiComment = document.querySelector('.notiComment_post')
            if(document.querySelector('.postnews__detail--form-content').value == '')
            {
                notiComment.textContent = "Nội dung không được bỏ trống";
                notiComment.className = 'notiComment_post error'
            }
            else
            {
                if(document.querySelector('.postnews__detail--form-inputtext-text').value == '')
                {
                    notiComment.textContent = "Tên không được bỏ trống";
                    notiComment.className = 'notiComment_post error'

                }
                else
                {
                    if(document.querySelector('.postnews__detail--form-inputtext-email').value == '')
                    {
                        notiComment.textContent = "Email không được bỏ trống";
                        notiComment.className = 'notiComment_post error'

                    }
                    else
                    {
                        notiComment.className = 'notiComment_post success'
                        notiComment.textContent = "Thêm bình luận thành công";
                        var postid = $('.comment_post-id').val();
                        var commContent = $('.postnews__detail--form-content').val();
                        var commName = $('.postnews__detail--form-inputtext-text').val();
                        var commEmail = $('.postnews__detail--form-inputtext-email').val();
                        var _token = '{{csrf_token()}}';
                        $.ajax({
                            url:"{{route('ajax.sendcomment')}}",
                            method: 'POST',
                            data: {
                                    postid : postid, 
                                    commContent: commContent,
                                    commName: commName,
                                    commEmail: commEmail,
                                    _token : _token
                                },
                            success: function(data)
                                {
                                    load_comment()
                                    document.querySelector('.postnews__detail--form-content').value = ''
                                }
                        });


                    }
                }
            }
            
        }
       

    })


    </script>


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
                    <li>
                        <a href="/bai-viet" class="bread__crumb--link">Bài viết</a>
                        <span class="arrowBreadcrumb"><i class="fa fa-angle-right"></i></span>
                    </li>
                    <li>
                        @foreach ($list_topic as $topbc)
                            @if ($topbc->id == $post_detail->topid)
                                <a href="{{$topbc->slug}}" class="bread__crumb--link">{{$topbc->name}}</a>
                            @endif
                        @endforeach
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
                        <div class="postnews__detail--created">
                            <span class="postnews__detail--created-at">Đăng bởi: 
                                @foreach ($users as $user)
                                    @if ($user->id == $post_detail->created_by)
                                        <strong>{{$user->fullname}}</strong></span>
                                    @else
                                        <strong>Chưa cập nhập</strong></span>
                                    @endif
                                @endforeach
                                
                            <span class="postnews__detail--created-by">Vào lúc: 
                                @php
                                        $time = strtotime("now") - strtotime($post_detail->created_at);
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
                                            echo $post_detail->created_at->format('d/m/Y');
                                        }
                                    @endphp
                            </span>
                        </div>
                        <div title="adasda" class="postnews__detail--img" style="background-image: url('{{asset('images/posts/'.$post_detail->img)}}')">
                        </div>
                        <div class="postnews__detail--text">
                            <p>{!! $post_detail->content !!}</p> 
                        </div>
                        <div class="postnews__detail--comment">
                            <div class="postnews__detail--comment-show">
                                    @csrf
                                    <input type="hidden" class="comment_post-id" id="comment_post-id" value="{{$post_detail->id}}">
                                    <div class="comment__container--showAll">
                                        
                                    </div>
                                <div class="postnews__detail--comment-input">
                                    <form action="">
                                        <h5 class="title__form--comment">Viết bình luận của bạn</h5>
                                        <p class="required_form--text">Các trường bắt buộc được đánh dấu <strong>*</strong>.</p>
                                        <div class="postnews__detail--textarea">
                                            <label for="" class="postnews__detail--form-text">Nội Dung<strong>*</strong></label>
                                            <textarea name="" id="" cols="30" rows="5" placeholder="Nội dung..." class="postnews__detail--form-content"></textarea>
                                        </div>
                                        <div class="postnews__detail--inputlist">
                                            <div class="grid">
                                                <div class="row">
                                                    <div class="col l-6">
                                                        <div class="postnews__detail--inputitems">
                                                            <label for="" class="postnews__detail--form-text">Họ Tên<strong>*</strong></label>
                                                            <input type="text" placeholder="Nhập tên của bạn" class="postnews__detail--form-inputtext postnews__detail--form-inputtext-text">
                                                        </div>
                                                    </div>
                                                    <div class="col l-6">
                                                        <div class="postnews__detail--inputitems">
                                                            <label for="" class="postnews__detail--form-text">Email<strong>*</strong></label>
                                                            <input type="email" placeholder="Nhập email của bạn" class="postnews__detail--form-inputtext postnews__detail--form-inputtext-email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="postnews__detail--button">
                                                    <span class="notiComment_post"></span>
                                                    <button type="submit">Gửi bình luận</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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