<div class="post__container">
    <div class="grid wide">
        <div class="post__container--header">
            <h2>Bài Viết</h2>
        </div>
        <p class="post__container--note">Những tin tức chất lượng được cập nhập liên tục thuân lợi cho mua sắm online của bạn.</p>
        <div class="post__container--main">
            <div class="row">
                @foreach ($list_news as $news)
                <div class="col l-4">
                    <div class="post__box">
                        <div class="post__img" style="background-image: url('images/posts/{{$news->img}}')" onclick="location.href='/{{$news->slug}}'"></div>
                        <div class="post__title">
                            <h3><a href="/{{$news->slug}}">{{$news->title}}</a></h3>
                        </div>
                        <div class="post__timeAndType">
                            <a href="{{$news->slugtop}}" class="post__type">{{$news->name}}</a>
                            <span class="post__time">
                                <i class="far fa-clock"></i>

                                  @php
                                      $time = strtotime("now") - strtotime($news->created_at);
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
                                          echo $news->created_at->format('d/m/Y');
                                      }
                                  @endphp

                            </span>
                        </div>
                        <div class="post__detail">
                            <p>{{ html_entity_decode(strip_tags($news->content), ENT_QUOTES, 'UTF-8');}}</p>
                        </div>
                        <div class="post__seeMore">
                            <a href="/{{$news->slug}}">Xem thêm <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                

            </div>
        </div>
    </div>
</div>