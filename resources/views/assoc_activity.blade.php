@extends('layouts.master')

@section('title')
Brighter Lives | Association Name Here | Our Activities
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
            <h2>Our <span>Activities</span></h2>
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
