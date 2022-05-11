<div class="header__top--title confirm">
    <div class="header__top--title-confirm">
        <i class="fas fa-bell bell"></i>
        <span class="number--confirm">11</span>
    </div>
    <span>Thông báo của tôi</span>
    <div class="header__top--noti-container">
        @if (count($list_confirm)<=0)
            <div class="header__top--noti-emty">
                <span class="noti-empty">Không có thông báo nào</span>
            </div>
        @else
            <ul class="header__top--list-noti">

                @foreach ($list_confirm as $confirm)
                <li class="header__top--items-noti" onclick="location.href = '/{{$confirm->slug}}'">
                    <div class="row no-gutters">
                        <div class="col l-3">
                            <div class="header__top--noti-img" onclick="location.href = '/{{$confirm->slug}}'"  style="background-image: url('{{asset('images/posts/'.$confirm->img)}}')"></div>
                        </div>
                        <div class="col l-9">
                            <h3 class="header__top--noti-title" onclick="location.href = '/{{$confirm->slug}}'">{{$confirm->title}}</h3>
                            <p class="header__top--noti-time">
                                <i class="far fa-clock noti-icon"></i>
                                
                                @php
                                    $time = strtotime("now") - strtotime($confirm->created_at);
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
                                        echo $confirm->created_at->format('d/m/Y');
                                    }
                                @endphp

                            </p>
                        </div>
                    </div>
                </li>
                @endforeach
                
            </ul>
            <div class="header__top--seeAll-noti">
                <a href="/bai-viet" class="seeAll-noti-link">Xem tất cả</a>
            </div>
        @endif
    </div>
</div>