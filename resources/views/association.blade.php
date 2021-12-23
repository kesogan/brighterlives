@extends('layouts.master')

@section('title')
Brighter Lives | Association Name Here
@endsection

@section('header')
<div class="top-image text-center" id="associatioTop" style="background-image: url('/images/header.jpg')">
    <!-- <img src="/images/header.jpg" alt="" /> -->
    <h2 class="text-center assoc-name">ASSOCIATION NAME HERE ...</h2>
    <p class="assoc-motto">" Association's motto if any. "</p>
	<p class="assoc-address"><i class="icon-map-marker"></i> Nkambe, Northwest Region</p>
	@include('includes.assoc_inner_nav')
</div><!--Page Top Image-->
@endsection

@section('content')
            <!-- <div class="page-title">
				<h1>Successful <span>Stories</span></h1>
            </div> -->
            <!--Page Title-->
<section class="inner-page">
	<div class="container">
        <div class="sidebar-title">
            <h4>Our <span>Activities</span></h4>
        </div><!-- Section Title -->
						
        <div class="row">
            <div class="col-md-3">
                <div class="story">
                    <div class="story-img">
                        <img src="http://placehold.it/270x196" alt="" />
                        <h5>Billionair Help for Charity Food</h5>
                        <a href="/single-activity" title=""><span></span></a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, condsec adipii ing elit. Pellentesque mi tellus, fring non uontdum vitae, tempor id lorem. Ring nonntedum vitae, tempor id lorem. </p>
                    <p><a href="/single-activity">View More</a></p>
                </div><!--Story-->
            </div>
            <div class="col-md-3">
                <div class="story">
                    <div class="story-img">
                        <img src="http://placehold.it/270x196" alt="" />
                        <h5>Billionair Help for Charity Food</h5>
                        <a href="/single-activity" title=""><span></span></a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, condsec adipii ing elit. Pellentesque mi tellus, fring non uontdum vitae, tempor id lorem. Ring nonntedum vitae, tempor id lorem. </p>
                    <p><a href="/single-activity">View More</a></p>
                </div><!--Story-->
            </div>
            <div class="col-md-3">
                <div class="story">
                    <div class="story-img">
                        <img src="http://placehold.it/270x196" alt="" />
                        <h5>Billionair Help for Charity Food</h5>
                        <a href="/single-activity" title=""><span></span></a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, condsec adipii ing elit. Pellentesque mi tellus, fring non uontdum vitae, tempor id lorem. Ring nonntedum vitae, tempor id lorem. </p>
                    <p><a href="/single-activity">View More</a></p>
                </div><!--Story-->
            </div>
            <div class="col-md-3">
                <div class="story">
                    <div class="story-img">
                        <img src="http://placehold.it/270x196" alt="" />
                        <h5>Billionair Help for Charity Food</h5>
                        <a href="/single-activity" title=""><span></span></a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, condsec adipii ing elit. Pellentesque mi tellus, fring non uontdum vitae, tempor id lorem. Ring nonntedum vitae, tempor id lorem. </p>
                    <p><a href="/single-activity">View More</a></p>
                </div><!--Story-->
            </div>
        </div>

        <div class="sidebar-title">
            <h4>Our <span>Products</span></h4>
        </div><!-- Section Title -->

        <div class="row">
			<div class="left-content col-md-12">
				
				<div class="featured-products">
					<h3 class="sub-head">Buy these products to help raise donations for the poor</h3>				
					<div class="row">
						<div class="col-md-4">
							<img src="http://placehold.it/270x200" alt="" />
							<h4>Beautiful Cane chair</h4>
								<div class="ratings">
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star-empty"></i>
								<i class="icon-star-empty"></i>
								<i class="icon-star-empty"></i>
							</div>
							<div class="product-price">
								<!-- <span>$1090</span> -->
								<p>23,500 XAF</p>
                                <a href="#" class="btn btn-warning" title=""><i class="icon-money"></i> Buy</a><a class="btn btn-warning" href="#" title="">View</a>
							</div>
						</div><!--Product-->
						<div class="col-md-4">
							<img src="http://placehold.it/270x200" alt="" />
							<h4>Beautiful Cane chair</h4>
							<div class="ratings">
								<i class="icon-star"></i>
								<i class="icon-star-empty"></i>
								<i class="icon-star-empty"></i>
								<i class="icon-star-empty"></i>
								<i class="icon-star-empty"></i>
							</div>
							<div class="product-price">
								<!-- <span>$1090</span> -->
								<p>23,500 XAF</p>
                                <a href="#" class="btn btn-warning" title=""><i class="icon-money"></i> Buy</a><a class="btn btn-warning" href="#" title="">View</a>
							</div>
						</div><!--Product-->
						<div class="col-md-4">
							<img src="http://placehold.it/270x200" alt="" />
							<div class="ratings">
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star-empty"></i>
							</div>
							<h4>Beautiful Cane chair</h4>
							<div class="product-price">
								<!-- <span>$1090</span> -->
								<p>23,500 XAF</p>
                                <a href="#" class="btn btn-warning" title=""><i class="icon-money"></i> Buy</a><a class="btn btn-warning" href="#" title="">View</a>
							</div>
						</div><!--Product-->
						<div class="col-md-4">
							<img src="http://placehold.it/270x200" alt="" />
							<div class="ratings">
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star"></i>
							</div>
							<h4>Beautiful Cane chair</h4>
							<div class="product-price">
								<!-- <span>$1090</span> -->
								<p>23,500 XAF</p>
                                <a href="#" class="btn btn-warning" title=""><i class="icon-money"></i> Buy</a><a class="btn btn-warning" href="#" title="">View</a>
							</div>
						</div><!--Product-->
						<div class="col-md-4">
							<img src="http://placehold.it/270x200" alt="" />
							<h4>Beautiful Cane chair</h4>
							<div class="ratings">
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star-empty"></i>
							</div>
							<div class="product-price">
								<!-- <span>$1090</span> -->
								<p>23,500 XAF</p>
                                <a href="#" class="btn btn-warning" title=""><i class="icon-money"></i> Buy</a><a class="btn btn-warning" href="#" title="">View</a>
							</div>
						</div><!--Product-->
						<div class="col-md-4">
							<img src="http://placehold.it/270x200" alt="" />
							<h4>Beautiful Cane chair</h4>
							<div class="ratings">
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star-empty"></i>
							</div>
							<div class="product-price">
								<!-- <span>$1090</span> -->
								<p>23,500 XAF</p>
                                <a href="#" class="btn btn-warning" title=""><i class="icon-money"></i> Buy</a><a class="btn btn-warning" href="#" title="">View</a>
							</div>
						</div><!--Product-->
					</div>
				
				</div>
				
			</div>

		</div>
	</div>
</section>
@endsection

@section('page-js')
<script>
$(window).load(function(){
	$('.footer_carousel').flexslider({
		animation: "slide",
		animationLoop: false,
		slideShow:false,
		controlNav: true,	
	    maxItems: 1,
		pausePlay: false,
		mousewheel:true,
		start: function(slider){
		  $('body').removeClass('loading');
		}
	});
});
</script>
@endsection
