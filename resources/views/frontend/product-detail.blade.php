@extends('layouts.site')
@section('title', $product_detail->name)

@section('header')
<link rel="stylesheet" href="{{asset('slickslider/slick-theme.min.css')}}"/>
<link rel="stylesheet" href="{{asset('slickslider/slick.min.css')}}"/>

@endsection

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
    <script src = "{{asset('js/product_detail.js')}}"></script>
    <script src="{{asset('slickslider/slick.min.js')}}"></script>
    <script src="{{asset('slickslider/slick.js')}}"></script>

    <script type="text/javascript">
            
            $('.multiple-items').slick({
                infinite: false,
                slidesToShow: 6,
                slidesToScroll: 1
                });

     

    </script>

    <script type="text/javascript">

        let numberValue = document.querySelector('.payment-quantity-number')
        let value = 1
        function qantityHandle(num){
            value = +numberValue.value + num
            if(value <= 1) value = 1
            updateQuantity(value)
        }
        function updateQuantity(value){
            numberValue.value = value
        }

        const checkboxs = document.querySelectorAll('.product__detail--review-comment-icon .review__checkbox input')
        const stars = document.querySelectorAll('.product__detail--review-comment-icon .review__checkbox i')
        const starVal = document.querySelector('.product__detail--review-form .star__value')
        const reviewCount = document.querySelector('.product__detail--rateValue-data')
        var _token = '{{csrf_token()}}';
        
        checkboxs.forEach((check, i) => {
            check.onchange = e => {
                stars.forEach( star => {star.style.color = "#ccc"})
                for(let j = 0; j < i + 1; j++){
                    stars[j].style.color = "yellow"
                    starVal.value = j + 1
                }
            }
        })

        function load_review(){
            const productid = document.querySelector('.product__detail--idValue').textContent
            var _token = '{{csrf_token()}}';

            $.ajax({
                url:"{{route('ajax.loadreview')}}",
                method: 'POST',
                data: {productid : productid, _token : _token},
                success: function(data)
                {
                    let arrayStar = []
                   const htmls = data.map( value => {
                    arrayStar.push(value.star)
                       let starNumber = ''
                       for(let i = 0; i < value.star; i++){
                            starNumber += '<i class="fas fa-star"></i>'
                       }
                       const date =  new Date(value.created_at).toISOString().slice(0, 19).replace('T', ' ');
                       return ` <li class="product__detail--review-comment-items">
                                    <div class="product__detail--review-comment-name">
                                        <span class="product__detail--review-comment-nameValue">${value.name}</span> 
                                        <span class="product__detail--review-comment-rateIcon">${starNumber}</span>
                                    </div>
                                    <div class="product__detail--review-comment-time">
                                        <span>${date}</span>
                                    </div>
                                    <p class="product__detail--review-comment-text">
                                        ${value.content}
                                    </p>
                                </li>`
                   })
                   document.querySelector('.product__detail--review-comment-list').innerHTML = htmls.join('')
                   reviewCount.textContent = data.length
                   const starIconNum = countStar(arrayStar)
                   let starString = ''
                   console.log(arrayStar)

                   if(starIconNum == undefined)
                   {
                        for(let i = 0; i < 5; i++){
                            starString += '<i class="fas fa-star"></i>'
                        }
                   }
                   else
                   {
                        if(starIconNum <= 0){
                            starString = '<i style = "color: #ccc" class="fas fa-star"></i>'
                        }
                        else{
                            for(let i = 0; i < starIconNum; i++){
                                starString += '<i class="fas fa-star"></i>'
                            }
                        }

                   }

                   
                   document.querySelector('.product__detail--rateText-list').innerHTML = starString

                }
            });
        } 
        load_review()

        $('.product__detail--review-button button').click(function(e)
        {
            e.preventDefault();
            send_review();
             document.querySelector('.input__review--content').value = ''
             document.querySelector('.input__review--name').value = ''
             document.querySelector('.input__review--email').value = ''
            
        });

        function send_review()
        {
            var notiComment = document.querySelector('.notiComment_post')
            if(document.querySelector('.input__review--content').value == '')
            {
                notiComment.textContent = "Nội dung không được bỏ trống";
                notiComment.className = 'notiComment_post error'
            }
            else
            {
                if(document.querySelector('.input__review--name').value == '')
                {
                    notiComment.textContent = "Tên không được bỏ trống";
                    notiComment.className = 'notiComment_post error'

                }
                else
                {
                    if(document.querySelector('.input__review--email').value == '')
                    {
                        notiComment.textContent = "Email không được bỏ trống";
                        notiComment.className = 'notiComment_post error'

                    }
                    else
                    {
                        notiComment.className = 'notiComment_post success'
                        notiComment.textContent = "Thêm bình luận thành công";
                        const productid = document.querySelector('.product__detail--idValue').textContent
                        const star = starVal.value;
                        const revContent = document.querySelector('.input__review--content').value;
                        const revName = document.querySelector('.input__review--name').value;
                        const revEmail = document.querySelector('.input__review--email').value;
                        const _token = '{{csrf_token()}}';
                        $.ajax({
                            url:"{{route('ajax.sendreview')}}",
                            method: 'POST',
                            data: {
                                    productid : productid, 
                                    star: star,
                                    revContent: revContent,
                                    revName: revName,
                                    revEmail: revEmail,
                                    _token : _token
                                },
                            success: function(data)
                                {
                                    load_review()
                                }
                        });


                    }
                }
            }
            
        }

        function countStar(array){
            let firstEle = 1
            let lastEle = 0
            let item
            for (let i=0; i<array.length; i++)
            {
                    for (let j=i; j<=array.length; j++)
                    {
                            if (array[i] == array[j])
                            lastEle++;
                            if (firstEle <= lastEle)
                            {
                            firstEle=lastEle; 
                            item = array[i];
                            }
                    }
                    lastEle=0;
            }
            return item;
        }

    </script>
    

@endsection

@section('maincontent')
    
    <section class="product__detail">
        <div class="bread__crumb">
            <div class="grid wide">
                <ul>
                    <li>
                        <a href="{{url('/')}}" class="bread__crumb--link">Trang chủ</a>
                        <span class="arrowBreadcrumb"><i class="fa fa-angle-right"></i></span>
                    </li>
                    <li>
                        @foreach ($list_category as $catbc)
                            @if ($catbc->id == $product_detail->catid)
                            <a href="{{$catbc->slug}}" class="bread__crumb--link">{{$catbc->name}}</a>
                            @endif
                        @endforeach
                        <span class="arrowBreadcrumb"><i class="fa fa-angle-right"></i></span>
                    </li>
                    <li>
                        @foreach ($list_supplier as $suppbc)
                            @if ($suppbc->id == $product_detail->suppid)
                            <a href="{{$suppbc->slug}}" class="bread__crumb--link">{{$suppbc->name}}</a>
                            @endif
                        @endforeach
                        <span class="arrowBreadcrumb"><i class="fa fa-angle-right"></i></span>
                    </li>
                    <li><strong class="currentBreadcrumb">{{$product_detail->name}}</strong></li>
                </ul>
            </div>
        </div>
        <div class="product__detail--container">
            <div class="grid wide">
                <div class="product__detail--top">
                    <h1 class="product__detail--title">{{$product_detail->name}}</h1>
                    <div class="product__detail--idAndRate">
                        <div class="product__detail--id">
                            <p class="product__detail--idText">Mã sản phẩm: <span class="product__detail--idValue">{{$product_detail->id}}</span></p>
                        </div>
                        <div class="product__detail--rate">
                            <p class="product__detail--rateText">
                                <p class="product__detail--rateText-list"></p>
                                <span class="product__detail--rateValue">(Xem <span class="product__detail--rateValue-data">0</span> đánh giá)</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="product__detail--main">
                    <div class="grid">
                        <div class="row">
                            <div class="col l-5">
                                <div class="product__page--imgbox">
                                    <div class="product__page--img"></div>
                                    <div class="grid" style="margin-top: 10px">
                                        <div class="row" style="flex-wrap: wrap;">
                                            <div class="col l-3">
                                                <div class="product__page--imgArchrie active" style="background-image: url('{{asset('images/products/'.$product_detail->img)}}')"></div>
                                            </div>
                                            <div class="col l-3">
                                                <div class="product__page--imgArchrie" style="background-image: url('{{asset('images/products/'.$product_detail->img2)}}')"></div>
                                            </div>
                                            <div class="col l-3">
                                                <div class="product__page--imgArchrie" style="background-image: url('{{asset('images/products/'.$product_detail->img3)}}')"></div>
                                            </div>
                                            <div class="col l-3">
                                                <div class="product__page--imgArchrie" style="background-image: url('{{asset('images/products/'.$product_detail->img4)}}')"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col l-4">
                                <div class="product__page--information">
                                    <div class="product__page--price">
                                        <input type="hidden" class="product__page--price--value" value="{{$product_detail->pricesale > 0 ? $product_detail->pricesale : $product_detail->price}}">
                                        <span>

                                            @if ($product_detail->pricesale > 0)
                                                {{number_format($product_detail->pricesale, 0).'đ'}}
                                            @else
                                                {{number_format($product_detail->price, 0).'đ'}}
                                            @endif

                                        </span>
                                    </div>
                                    <div class="product__page--handle-pricesale">
                                        <p class="product__page--priceOld">
                                            <span class="product__page--priceOldText">Giá thị trường: </span>
                                            @if ($product_detail->pricesale > 0)
                                                <span class="product__page--priceOldValue">{{number_format($product_detail->price, 0).'đ'}}</span>
                                            @else
                                                <span class="product__page--priceOldValue" style="text-decoration: none">{{number_format($product_detail->price, 0).'đ'}}</span>
                                            @endif
                                        </p>
                                        @if ($product_detail->pricesale > 0)
                                            <p class="product__page--priceSale">
                                                <span class="product__page--priceSaleText">Tiết kiệm: </span>
                                                <span class="product__page--priceSaleValue">{{number_format($product_detail->price - $product_detail->pricesale, 0).'đ'}}</span>
                                            </p>
                                        @endif
                                        
                                    </div>

                                    <div class="product__page--status">
                                        <p class="product__page--sttText">Tình trạng: 

                                            @if ($product_detail->quantity > 0)
                                                <span class="product__page--sttValue">Còn hàng</span>
                                            @else
                                                <span class="product__page--sttValue">Hết hàng</span>
                                            @endif

                                        </p>
                                    </div>
                                    <div class="product__page--cateAndSupp">
                                        <p class="product__page--cateText">Loại:
                                            <span class="product__page--cateValue">

                                                @foreach ($list_category as $category)
                                                    @if ($category->id == $product_detail->catid)
                                                        {{$category->name}}
                                                    @endif
                                                @endforeach

                                            </span>
                                        </p>
                                        <p class="product__page--suppText">Thương hiệu:
                                            <span class="product__page--suppValue">

                                                @foreach ($list_supplier as $supplier)
                                                    @if ($supplier->id == $product_detail->suppid)
                                                        {{$supplier->name}}
                                                    @endif
                                                @endforeach

                                            </span>
                                        </p>
                                    </div>
                                    <div class="product__page--promotion">
                                        <p class="product__page--promotion-title">Khuyến mãi đặc biệt (SL có hạn)</p>
                                        <ul class="product__page--promotion-list">
                                            <li class="product__page--promotion-items"><i class="fas fa-dot-circle"></i> Cơ hội trúng Samsung Galaxy S10 mỗi ngày</li>
                                            <li class="product__page--promotion-items"><i class="fas fa-dot-circle"></i> Trả góp 0%</li>
                                            <li class="product__page--promotion-items"><i class="fas fa-dot-circle"></i> Ưu đãi phòng chờ sân bay hạng thương gia</li>
                                            <li class="product__page--promotion-items"><i class="fas fa-dot-circle"></i> Tặng 1 năm bảo hiểm máy rơi vỡ, vào nước</li>
                                            <li class="product__page--promotion-items"><i class="fas fa-dot-circle"></i> Giảm 500,000đ khi thanh toán qua VNPay QR</li>

                                        </ul>
                                    </div>
                                    <div class="product__page--payment">
                                        <div class="product__page--payment-container">
                                            <div class="product__page--payment-quantity">
                                                <span class="button__quantity-btn minus" onclick="qantityHandle(-1)">-</span>
                                                <input type="text" name="" value="1" class="payment-quantity-number" disabled>
                                                <span class="button__quantity-btn plus" onclick="qantityHandle(1)">+</span>
                                            </div>
                                            <div class="product__page--paymentBtn">
                                                <button type="submit" onclick = "addToCartDetailPage({{$product_detail->id}}, this.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement, '{{route('cart.index')}}')">Thêm vào giỏ</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product__page--rules">
                                        <p class="product__page--rules-text">Giảm ngay <strong>250.000đ</strong> cho đơn hàng từ 500.000đ khi thanh toán qua ZaloPay cho khách hàng mới. <a href="" class="product__page--rules-text-link"> Click xem thể lệ</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col l-3">
                                <div class="produuct__page--onlineSupport">
                                    <h2 class="produuct__page--onlineSupport-title">Chúng tôi luôn sẵn sàng giúp đỡ bạn</h2>
                                    <div class="produuct__page--onlineSupport-img">
                                        <img src="{{asset('images/support.jpg')}}" alt="">
                                    </div>
                                    <p class="produuct__page--onlineSupportPhoneText">Để được hổ trợ tốt nhất, hãy gọi: </p>
                                    <a href="tel:12345678" class="produuct__page--onlineSupportPhoneValue">12345678</a>
                                    <div class="produuct__page--onlineSupportMsg">
                                        <span class="produuct__page--onlineSupportMsgText1">HOẶC</span>
                                        <p class="produuct__page--onlineSupportMsgText2">Chat hỗ trợ trực tuyến</p>
                                        <a href="/lien-he" class="produuct__page--onlineSupportMsgLink">Chat với chúng tôi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid" style="margin-top: 20px">
                        <div class="row">
                            <div class="col l-9">
                                <div class="product__detail--textContainer">
                                    <div class="product__detail--textContainer-box">
                                        <ul class="product__detail--textContainer-list">
                                            <li class="product__detail--textContainer-items active">Chi tiết sản phẩm</li>
                                            <li class="product__detail--textContainer-items">Đánh giá sản phẩm</li>
                                            <div class="line"></div>
                                        </ul>
                                    </div>
                                    <div class="product__detail--textContainer-show active">
                                        <p class="product__detail--textContainer-showText">{{$product_detail->detail}}</p>
                                    </div>
                                    <div class="product__detail--textContainer-show">
                                        <div class="product__detail--textContainer-review">
                                            <div class="product__detail--review-top">
                                                <div class="grid">
                                                    <div class="row">
                                                        <div class="col l-3">
                                                            <div class="product__detail--review-titleBox">
                                                                <h2 class="product__detail--review-titleRatio">5/5</h2>
                                                                <div class="product__detail--review-icon">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                                <div class="product__detail--review-countText">
                                                                    <span>(5 lựa chọn đánh giá)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col l-9">
                                                            <div class="product__detail--review-list">
                                                                <span class="product__detail--review-items active">Tất cả</span>
                                                                <span class="product__detail--review-items">5 Sao (2)</span>
                                                                <span class="product__detail--review-items">4 Sao (2)</span>
                                                                <span class="product__detail--review-items">3 Sao (2)</span>
                                                                <span class="product__detail--review-items">2 Sao (2)</span>
                                                                <span class="product__detail--review-items">1 Sao (2)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product__detail--review-comment">
                                                    <p class="product__detail--review-comment-title">Đánh giá sản phẩm của bạn: 
                                                        <span class="product__detail--review-comment-icon">
                                                            <span class="review__checkbox">
                                                                <i class="fas fa-star"></i>
                                                                <input type="radio" name = "star" id = "1" value = "1">
                                                            </span>
                                                            <span class="review__checkbox">
                                                                <i class="fas fa-star"></i>
                                                                <input type="radio" name = "star" id = "2" value = "2">
                                                            </span>
                                                            <span class="review__checkbox">
                                                                <i class="fas fa-star"></i>
                                                                <input type="radio" name = "star" id = "3" value = "3">
                                                            </span>
                                                            <span class="review__checkbox">
                                                                <i class="fas fa-star"></i>
                                                                <input type="radio" name = "star" id = "4" value = "4">
                                                            </span>
                                                            <span class="review__checkbox">
                                                                <i class="fas fa-star"></i>
                                                                <input type="radio" name = "star" id = "5" value = "5">
                                                            </span>
                                                            
                                                        </span>
                                                    </p>
                                                    <form action="" class="product__detail--review-form">
                                                        <input type="hidden" class="star__value" value="0">
                                                        <div class="product__detail--review-comment-content">
                                                            <textarea class="input__review--content" name="" id="" cols="30" placeholder="Nhập nội dung đánh giá của bạn:" rows="5"></textarea>
                                                        </div>
                                                        <div class="grid">
                                                            <div class="row">
                                                                <div class="col l-6">
                                                                    <div class="product__detail--review-comment-inputBox">
                                                                        <input type="text" class="input__review--name" placeholder="Nhập họ tên của bạn...">
                                                                    </div>
                                                                </div>
                                                                <div class="col l-6">
                                                                    <div class="product__detail--review-comment-inputBox">
                                                                        <input class="input__review--email" type="email" placeholder="Nhập email của bạn...">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product__detail--review-button">
                                                            <span class="notiComment_post"></span>
                                                            <button type="submit">Gửi đánh giá</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product__detail--review-comment">
                                            <ul class="product__detail--review-comment-list">
                                               
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col l-3">
                                <div class="product__detail--widgetRight">
                                    <h3 class="product__detail--widget-title"><a href="" class="product__detail--widget-title-link">Sản phẩm mới nhất</a></h3>
                                    <ul class="product__detail--widget-newCat">


                                        @foreach ($list_new_product as $newproducts)
                                            
                                        <li class="product__detail--widget-newCat-items">
                                            <div class="grid">
                                                <div class="row no-gutters">
                                                    <div class="col l-3">
                                                        <div class="product__detail--widget-newCat-imgBox">
                                                            <a href="/{{$newproducts->slug}}" style="background-image: url('{{asset('images/products/'.$newproducts->img)}}')" class="product__detail--widget-newCat-img"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col l-9">
                                                        <div class="product__detail--widget-newCat-infor">
                                                            <a href="{{$newproducts->slug}}" class="product__detail--widget-newCat-name">{{$newproducts->name}}</a>
                                                            <div class="product__detail--widget-newCat-price">
                                                                <span class="product__detail--widget-newCat-newPrice">

                                                                    @if ($newproducts->pricesale > 0)
                                                                        {{$newproducts->pricesale}}
                                                                    @else
                                                                        {{$newproducts->price}}
                                                                    @endif

                                                                </span>
                                                                @if ($newproducts->pricesale > 0)
                                                                    <span class="product__detail--widget-newCat-oldldPrice">{{$newproducts->price}}</span>
                                                                @endif
                                                            </div>
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
                    <div class="grid">
                        <div class="product__detail--sameCat">
                            <h3 class="product__detail--sameCat-title">Sản phẩm cùng loại</h3>
                            @foreach ($list_category as $categoryslug)
                                @if ($categoryslug->id == $product_detail->catid)
                                    <a href="{{$categoryslug->slug}}" class="product__detail--sameCat-seeAll">Xem tất cả</a>
                                @endif
                            @endforeach
                        </div>
                        <div class="product__detail--sameCat-container">
                            <div class="product__container--sliderItems multiple-items" style="width: 1200px; margin: 0 auto;" >
                
                                @foreach ($list_same_product as $samepd)
                                    <div class="product__box">
                                        <div class="product__image" style="background-image: url('{{asset('images/products/'.$samepd->img)}}')">
                                            @if ($samepd->pricesale > 0)
                                                <span class="product__set__sale">- {{sprintf( "%.0f", $samepd->khuyenmai )}}%</span>
                                            @endif
                                        </div>
                                        <div class="product__name">
                                            <h4>{{$samepd->name}}</h4>
                                        </div>
                                        <div class="product__price">
                                            <input type="hidden" value="{{$samepd->pricesale > 0 ? $samepd->pricesale : $samepd->price}}" class="get__price-to-cart" />
                                            <div class="product__priceBox">
                                                <span class="newPrice">
                                                    @if ($samepd->pricesale > 0)
                                                        {{number_format($samepd->pricesale, 0).'đ'}}
                                                    @else
                                                        {{number_format($samepd->price, 0).'đ'}}
                                                    @endif
                                                </span>
                                            </div>
                                            @if ($samepd->pricesale > 0)
                                            <div class="product__priceBox">
                                                <span class="oldPrice">
                                                    {{number_format($samepd->price, 0).'đ'}}
                                                </span>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="product__option">
                                            <div class="option__view" onclick="location.href = '/{{$samepd->slug}}'">
                                                <i class="fas fa-eye"></i>
                                                <div class="handle__note">
                                                    <span>Xem chi tiết</span>
                                                </div>
                                            </div>
                                            <div class="option__cart" onclick="addToCart({{$samepd->id}}, this.parentElement.parentElement)">
                                                <i class="fas fa-cart-plus"></i>
                                                <div class="handle__note">
                                                    <span>Thêm vào giỏ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection