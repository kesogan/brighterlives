@extends('layouts.master')

@section('title')
Brighter Lives | Association Name Here | Our Products
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
        <div class="sec-title">
            <h2>Our <span>Products</span></h2>
        </div><!-- Section Title -->

        <div class="row">
			<div class="left-content col-md-9">
				
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
                                <a href="#" class="" title="" data-toggle="modal" data-target="#checkoutModal"><i class="icon-money"></i> Buy</a>
								<a class="" href="/single-product" title="">View</a>
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
                                <a href="#" class="" title="" data-toggle="modal" data-target="#checkoutModal"><i class="icon-money"></i> Buy</a>
								<a class="" href="/single-product" title="">View</a>
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
                                <a href="#" class="" title="" data-toggle="modal" data-target="#checkoutModal"><i class="icon-money"></i> Buy</a>
								<a class="" href="/single-product" title="">View</a>
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
                                <a href="#" class="" title="" data-toggle="modal" data-target="#checkoutModal"><i class="icon-money"></i> Buy</a>
								<a class="" href="/single-product" title="">View</a>
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
                                <a href="#" class="" title="" data-toggle="modal" data-target="#checkoutModal"><i class="icon-money"></i> Buy</a>
								<a class="" href="/single-product" title="">View</a>
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
                                <a href="#" class="" title="" data-toggle="modal" data-target="#checkoutModal"><i class="icon-money"></i> Buy</a>
								<a class="" href="/single-product" title="">View</a>
							</div>
						</div><!--Product-->
					</div>
				
				</div>
				
			</div>
			<div class="sidebar col-md-3 pull-right">
				<div class="sidebar-widget">
					<div class="sidebar-title">
						<h4>Category <span>List</span></h4>
					</div>
					<ul class="sidebar-list">
						<li><a href="#" title="">Blog (6)</a></li>
						<li><a href="#" title="">Colourful (5)</a></li>
						<li><a href="#" title="">Feature (2)</a></li>
						<li><a href="#" title="">Nature (7)</a></li>
						<li><a href="#" title="">Scenery(3)</a></li>
						<li><a href="#" title="">Uncategorized(1)</a></li>
					</ul>
				</div><!-- Category List -->
                <div class="sidebar-widget">
					<div class="sidebar-title">
						<h4>Tags <span>Clouds</span></h4>
					</div>
					<div class="cloud-tags">
						<a href="#" title="">Uncategorized</a>
						<a href="#" title="">Arts</a>
						<a href="#" title="">Craft</a>
						<a href="#" title="">Wood</a>
						<a href="#" title="">Music</a>
						<a href="#" title="">Uncommon</a>
						<a href="#" title="">Education</a>
						<a href="#" title="">Uncategorized</a>
						<a href="#" title="">Finance</a>
					</div>
				</div><!-- Tags Clouds -->
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
