<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        @section('title')
            Chi Tiết Sản Phẩm |
        @endsection
    </title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="{{ asset('client/assets/image/png') }}"
        href="{{ asset('client/assets/images/icons/favicon.png') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('client/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('client/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('client/assets/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('client/assets/fonts/linearicons-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('client/assets/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/vendor/slick/slick.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/vendor/MagnificPopup/magnific-popup.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('client/assets/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/main.css') }}">

    <!--===============================================================================================-->
    @stack('style')
</head>

<body class="animsition">

    <!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
	    @include('client.layout.header')
	</header>

    <!-- Cart -->
    @include('client.layout.cart')


    <!-- breadcrumb -->


    <!-- Product Detail -->

    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                <div class="item-slick3" data-thumb="{{ asset($product->image) }}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{ asset($product->image) }}" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                            href="{{ asset($product->image) }}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $product->name }}
                        </h4>

                        <span class="mtext-106 cl2">
                            ${{ $product->price }}
                        </span>

                        <p class="stext-102 cl3 p-t-23">
                            {{ $product->description }}
                        </p>

                        <!-- Add to cart -->
                        {{-- <div class="p-t-33">
                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Size
                            </div>

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2" name="size">
                                        @foreach ($product->sizes as $size)
                                        <option>{{ $size->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Color
                            </div>

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2" name="color">
                                        @foreach ($product->colors as $color)
                                        <option>{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-204 flex-w flex-m respon6-next">
                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>

                                <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                    Add to cart
                                </button>
                            </div>
                        </div>	
                    </div>

                    <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                        <div class="flex-m bor9 p-r-10 m-r-11">
                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                <i class="zmdi zmdi-favorite"></i>
                            </a>
                        </div>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <div class="tab01">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews ({{ $product->reviews->count() }})</a>
                    </li>
                </ul>

                <div class="tab-content p-t-43">
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                {{ $product->long_description }}
                            </p>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="information" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <ul class="p-lr-28 p-lr-15-sm">
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Weight
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            {{ $product->weight }} kg
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Dimensions
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            {{ $product->dimensions }}
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Materials
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            {{ $product->materials }}
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Color
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            {{ $product->color }}
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Size
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            {{ $product->size }}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm">
                                    <div class="flex-w flex-t p-b-68">
                                        @foreach ($product->reviews as $review)
                                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                            <img src="{{ $review->user->avatar }}" alt="AVATAR">
                                        </div>

                                        <div class="size-207">
                                            <div class="flex-w flex-sb-m p-b-17">
                                                <span class="mtext-107 cl2 p-r-20">
                                                    {{ $review->user->name }}
                                                </span>

                                                <span class="fs-18 cl11">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        @if ($i < $review->rating)
                                                            <i class="zmdi zmdi-star"></i>
                                                        @else
                                                            <i class="zmdi zmdi-star-outline"></i>
                                                        @endif
                                                    @endfor
                                                </span>
                                            </div>

                                            <p class="stext-102 cl6">
                                                {{ $review->content }}
                                            </p>
                                        </div>
                                        @endforeach
                                    </div>

                                    <form class="w-full" action="{{ route('reviews.store', $product->id) }}" method="POST">
                                        @csrf
                                        <h5 class="mtext-108 cl2 p-b-7">
                                            Add a review
                                        </h5>

                                        <p class="stext-102 cl6">
                                            Your email address will not be published. Required fields are marked *
                                        </p>

                                        <div class="flex-w flex-m p-t-50 p-b-23">
                                            <span class="stext-102 cl3 m-r-16">
                                                Your Rating
                                            </span>

                                            <span class="wrap-rating fs-18 cl11 pointer">
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <input class="dis-none" type="number" name="rating">
                                            </span>
                                        </div>

                                        <div class="row p-b-25">
                                            <div class="col-12 p-b-5">
                                                <label class="stext-102 cl3" for="review">Your review</label>
                                                <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                            </div>

                                            <div class="col-sm-6 p-b-5">
                                                <label class="stext-102 cl3" for="name">Name</label>
                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
                                            </div>

                                            <div class="col-sm-6 p-b-5">
                                                <label class="stext-102 cl3" for="email">Email</label>
                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
                                            </div>
                                        </div>

                                        <button class="flex-c-m stext-101 cl0 size-102 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    </section>




    {{-- <!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="{{asset('client/assets/images/product-01.jpg')}}" alt="IMG-PRODUCT">

								<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
									Quick View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										Esprit Ruffle Shirt
									</a>

									<span class="stext-105 cl3">
										$16.64
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="{{asset('client/assets/images/icons/icon-heart-01.png')}}" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('client/assets/images/icons/icon-heart-02.png')}}" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="{{asset('client/assets/images/product-02.jpg')}}" alt="IMG-PRODUCT">

								<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
									Quick View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										Herschel supply
									</a>

									<span class="stext-105 cl3">
										$35.31
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="{{asset('client/assets/images/icons/icon-heart-01.png')}}" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('client/assets/images/icons/icon-heart-02.png')}}" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="{{asset('client/assets/images/product-03.jpg')}}" alt="IMG-PRODUCT">

								<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
									Quick View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										Only Check Trouser
									</a>

									<span class="stext-105 cl3">
										$25.50
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="{{asset('client/assets/images/icons/icon-heart-01.png')}}" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('client/assets/images/icons/icon-heart-02.png')}}" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="{{asset('client/assets/images/product-04.jpg')}}" alt="IMG-PRODUCT">

								<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
									Quick View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										Classic Trench Coat
									</a>

									<span class="stext-105 cl3">
										$75.00
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="{{asset('client/assets/images/icons/icon-heart-01.png')}}" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('client/assets/images/icons/icon-heart-02.png')}}" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="{{asset('client/assets/images/product-05.jpg')}}" alt="IMG-PRODUCT">

								<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
									Quick View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										Front Pocket Jumper
									</a>

									<span class="stext-105 cl3">
										$34.75
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="{{asset('client/assets/images/icons/icon-heart-01.png')}}" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('client/assets/images/icons/icon-heart-02.png')}}" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="{{asset('client/assets/images/product-06.jpg')}}" alt="IMG-PRODUCT">

								<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
									Quick View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										Vintage Inspired Classic 
									</a>

									<span class="stext-105 cl3">
										$93.20
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="{{asset('client/assets/images/icons/icon-heart-01.png')}}" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('client/assets/images/icons/icon-heart-02.png')}}" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="{{asset('client/assets/images/product-07.jpg')}}" alt="IMG-PRODUCT">

								<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
									Quick View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										Shirt in Stretch Cotton
									</a>

									<span class="stext-105 cl3">
										$52.66
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="{{asset('client/assets/images/icons/icon-heart-01.png')}}" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('client/assets/images/icons/icon-heart-02.png')}}" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="{{asset('client/assets/images/product-08.jpg')}}" alt="IMG-PRODUCT">

								<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
									Quick View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										Pieces Metallic Printed
									</a>

									<span class="stext-105 cl3">
										$18.96
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="{{asset('client/assets/images/icons/icon-heart-01.png')}}" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('client/assets/images/icons/icon-heart-02.png')}}" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
		 --}}

    <!-- Footer -->
    @include('client.layout.footer')


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <!-- Modal1 -->
    {{-- <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="{{asset('client/assets/images/icons/icon-close.png')}}" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="{{asset('client/assets/images/product-detail-01.jpg')}}">
										<div class="wrap-pic-w pos-relative">
											<img src="{{asset('client/assets/images/product-detail-01.jpg')}}" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="{{asset('client/assets/images/product-detail-02.jpg')}}">
										<div class="wrap-pic-w pos-relative">
											<img src="{{asset('client/assets/images/product-detail-02.jpg')}}" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{route('client/assets/images/product-detail-02.jpg')}}">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="{{asset('client/assets/images/product-detail-03.jpg')}}">
										<div class="wrap-pic-w pos-relative">
											<img src="{{asset('client/assets/images/product-detail-03.jpg')}}" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{route('client/assets/images/product-detail-03.jpg')}}">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								Lightweight Jacket
							</h4>

							<span class="mtext-106 cl2">
								$58.79
							</span>

							<p class="stext-102 cl3 p-t-23">
								Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
							</p>
							
							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Size S</option>
												<option>Size M</option>
												<option>Size L</option>
												<option>Size XL</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Color
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Red</option>
												<option>Blue</option>
												<option>White</option>
												<option>Grey</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
									</div>
								</div>	
							</div>

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}

    <!--===============================================================================================-->
    <script src="{{ asset('client/assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('client/assets/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('client/assets/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('client/assets/vendor/select2/select2.min.js') }}"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('client/assets/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('client/assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('client/assets/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/slick-custom.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('client/assets/vendor/parallax100/parallax100.js') }}"></script>
    <script>
        $('.parallax100').parallax100();
        {{ asset('') }}
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('client/assets/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('client/assets/vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('client/assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $('.js-addwish-b2').on('click', function(e) {
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function() {
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        /*---------------------------------------------*/

        $('.js-addcart-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to cart !", "success");
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('client/assets/avendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('client/assets/js/main.js') }}"></script>
    @stack('script')

</body>

</html>
