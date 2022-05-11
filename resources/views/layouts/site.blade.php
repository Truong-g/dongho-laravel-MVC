<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('header')
    <link href="{{ asset('css/grid_system.css') }}" rel="stylesheet">
	<link href="{{ asset('css/fontawesome-free-5.15.2/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style_mobile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animation.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
    <header class="header"><!--header-->
		<div class="header__top">
			<div class="grid wide">
				<div class="row">
					<div class="col l-7">
						<div class="row no-gutters">
							<div class="col l-4">
								<span class="header__top--title">Cửa hàng đồng hồ chất lượng</span>
							</div>
							<div class="col l-4">
								<span class="header__top--title"><i class="far fa-envelope"></i> Hỗ trợ: <a class="header-top-link" href="mailto:dienthoai@gmail.com">dienthoai@gmail.com</a></span>
							</div>
						</div>
					</div>
					<div class="col l-5">
						<x-confirm-show />
					</div>
				</div>
			</div>

		</div>
		<div class="header__center">
			<div class="grid wide">
				<div class="row">
					<div class="col l-3">
						<div class="logo__container">
							<a href="http://nguyentuantruonglar.test:81/" class="logo__link">
							<img src="{{ asset('images/logo/logo1.png') }}" alt="logo">
							</a>
						</div>
					</div>
					<div class="col l-5">

						<form action="{{route('search.index')}}" method="GET" enctype="multipart/form-data">
							<div class="search_container">
								<input type="text" name="tu_khoa" placeholder="Bạn cần tìm gì?" class="search__container--input">
								<button><i class="fas fa-search"></i></button>
								<div class="search_container--box">
									<ul class="product__detail--widget-newCat" style="margin: 0; padding: 0">
                                        <li class="product__detail--widget-newCat-items">
                                            <div class="grid">
                                                <div class="row no-gutters">
                                                    <div class="col l-2">
                                                        <div class="product__detail--widget-newCat-imgBox">
                                                            <a href="/" style="background-image: url('{{asset('images/products/cat__women.jpg')}}')" class="product__detail--widget-newCat-img"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col l-7">
                                                        <div class="product__detail--widget-newCat-infor">
                                                            <a href="" class="product__detail--widget-newCat-name">đâsd</a>
                                                            
                                                        </div>
                                                    </div>
													<div class="col l-3">
                                                        <div class="product__detail--widget-newCat-infor">
                                                            <div class="product__detail--widget-newCat-price">
                                                                <span class="product__detail--widget-newCat-newPrice">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
								</div>
							</div>
						</form>
					</div>
					<div class="col l-4">
						<div class="action__container">
							<div class="row no-gutters">
								<div class="col l-4">
									<div class="action__box phone">
										<div class="action__box--phone-icon">
											<div class="action__box--phone-box">
												<i class="fas fa-phone"></i>
											</div>
										</div>
										<div class="action__box--phone-text">
											<a href="tel:+012345678">012345678</a>
										</div>
									</div>
								</div>
								<div class="col l-5">
									<div class="action__box account">
										<div class="action__box--account-icon">
											<i class="fas fa-user"></i>
										</div>
										@if (Auth::check())
										<div class="action__box--account-text">
											<div class="action__box--account-text texttop">
												<a class="account-link" href="{{route('account.index')}}" >{{Auth::user()->fullname}}</a>
											</div>
											<div class="action__box--account-text textbot">
												<span>Xin chào</span>
											</div>
										</div>
										@else
										<div class="action__box--account-text">
											<div class="action__box--account-text texttop">
												<span>TÀI KHOẢN</span>
											</div>
											<div class="action__box--account-text textbot">
												<span>Của bạn</span>
											</div>
										</div>
										@endif
										
										@if (Auth::check())
										<div class="account__container">
											<ul class="account__container--list">
												<li class="account__container--item"><a href="{{route('site.logout')}}">Đăng xuất</a></li>
											</ul>
										</div>
										@else
										<div class="account__container">
											<ul class="account__container--list">
												<li class="account__container--item"><a href="{{route('site.formlogin')}}">Đăng nhập</a></li>
												<li class="account__container--item"><a href="{{route('site.formregister')}}">Đăng ký</a></li>
											</ul>
										</div>
										@endif

										
									</div>
								</div>
								<div class="col l-3">
									<div class="action__box cart">
										<div class="action__box--cart-icon">
											<i class="fas fa-shopping-bag"></i>
											<div class="count--item-cart">
												<span>0</span>
											</div>
											<div class="action__box--listcart-mode">
												<ul class="action__box--listcart">
													
												</ul>
												<div class="action__box--goto-cart">
													<a href="{{route('cart.index')}}" class="action__box--goto-cart-text">Đi tới giỏ hàng!</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="header__bottom mainmenu">
			<div class="grid wide">
				<div class="row">
					<div class="col l-3">
						<x-brand-show />
					</div>
					<div class="col l-9">

						<x-main-menu/>
						
					</div>
				</div>
			</div>
		</div>
	</header>
	<header class="header_mb">
		<div class="header_mb_top">
			<span class="header_mb_top_text">Cửa hàng đồng hồ chất lượng</span>
		</div>
		<div class="header_mb_center">
			<img src="{{ asset('images/logo/logo1.png') }}" alt="" class="header_mb_center_logo">
		</div>
		<div class="header_mb_bottom">
			<button class="header_mb_bottom_baricon"><i class="fas fa-bars"></i></button>
			<div class="header_mb_bottom_center">
				<div class="header_mb_bottom_form_search">
					<input type="search" name="search" class="header_mb_bottom_form_search_input" placeholder="Nhập tên sản phẩm">
					<button class="header_mb_bottom_form_search_btn"><i class="fas fa-search"></i></button>
				</div>
			</div>
			<button class="header_mb_bottom_cart"><i class="fas fa-shopping-cart"></i></button>
		</div>
		<div class="header_mb_navbar">
			<div class="header_mb_navbar_close">
				<button class="header_mb_navbar_close_icon"><i class="fas fa-times"></i></button>
			</div>
			<ul class="header_mb_navbar_list">
				<li class="header_mb_navbar_item">
					<span class="header_mb_navbar_item_text">Trang chủ</span>
				</li>
				<li class="header_mb_navbar_item">
					<span class="header_mb_navbar_item_text">Sản phẩm</span>
				</li>
				<li class="header_mb_navbar_item">
					<span class="header_mb_navbar_item_text">Bài viết</span>
				</li>
				<li class="header_mb_navbar_item">
					<span class="header_mb_navbar_item_text">Về chúng tôi</span>
				</li>
				<li class="header_mb_navbar_item">
					<span class="header_mb_navbar_item_text">Liên hệ</span>
				</li>
				<li class="header_mb_navbar_item">
					<span class="header_mb_navbar_item_text">Chính sách mua hàng</span>
				</li>
			</ul>
		</div>
		<div class="header_mb_back_drop">

		</div>
	</header>

	{{-- ----kết thúc phần header---------- --}}


	{{-- ------------Phần main content--------- --}}
	@yield('maincontent')
	{{-- -------------Kết thúc main content------------- --}}



	@yield('footer')
	<span class="goto__top--btn"><i class="fas fa-arrow-up"></i></span>
	<div class="modal__container"></div>

	<script src="{{asset('js/redux.min.js')}}"></script>
	<script src="{{asset('js/site.js')}}"></script>
	<script type = "text/javascript">
		const gotoTopBtn = document.querySelector('.goto__top--btn')
		window.onscroll = () => {
			if(window.pageYOffset >= 200){
				gotoTopBtn.classList.add('active')
				document.querySelector('.header').classList.add('fixed')
			}
			else{
				gotoTopBtn.classList.remove('active')
				document.querySelector('.header').classList.remove('fixed')

			}
		}

		gotoTopBtn.onclick = () => {
			window.scroll({top: 0, behavior: 'smooth'})
		}


		const searchInput = document.querySelector('.search__container--input')
		const containerSearch = document.querySelector('.search_container--box')
		const backDrop = document.querySelector('.modal__container')
		if(searchInput){
			searchInput.oninput = (e) => {
				listSearch(e.target.value)
				containerSearch.classList.add('active')
				backDrop.classList.add('active')
			}
		}

		function listSearch(keywords) {
            var _token = '{{csrf_token()}}';
			$.ajax({
				url:"{{route('ajax.search')}}",
				method: 'POST',
				data: {
						keywords: keywords,
						_token : _token
					},
				success: function(data)
					{
						const listSearch = document.querySelector('.product__detail--widget-newCat')
						if(listSearch) {
							listSearch.innerHTML = ''
							if(data.length > 0){
								const htmls = data.map(item => {
								return `<li class="product__detail--widget-newCat-items">
                                            <div class="grid">
                                                <div class="row no-gutters">
                                                    <div class="col l-2">
                                                        <div class="product__detail--widget-newCat-imgBox">
                                                            <a href="/${item.slug}" style="background-image: url('http://nguyentuantruonglar.test:81/images/products/${item.img}')" class="product__detail--widget-newCat-img"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col l-7">
                                                        <div class="product__detail--widget-newCat-infor">
                                                            <a href="/${item.slug}" class="product__detail--widget-newCat-name">${item.name}</a>
                                                        </div>
                                                    </div>
													<div class="col l-3">
                                                        <div class="product__detail--widget-newCat-infor">
                                                            <div class="product__detail--widget-newCat-price">
                                                                <span class="product__detail--widget-newCat-newPrice">${item.pricesale > 0 ? item.pricesale : item.price}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>`
							})
							listSearch.innerHTML = htmls.join('')
							}else{
								backDrop.classList.remove('active')
								containerSearch.classList.remove('active')
							}
							
						}
					}
			});
		}


		if(backDrop){
			backDrop.onclick = () => {
			backDrop.classList.remove('active')
			containerSearch.classList.remove('active')
			}
		}


	</script>
    <script src="{{asset('slickslider/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('js/home.js')}}"></script>


	{{-- ------------kết thúc phần footer----------- --}}
</body>

@yield('javascript')
</html>