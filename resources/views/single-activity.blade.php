@extends('layouts.master')

@section('title')
Brighter Lives | Association Name Here | Activity Name Here
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
        <div class="row">
			<div class="left-content col-md-9">
				<div class="post">
					<img src="http://placehold.it/870x374" alt="" /><!-- Post Image -->
                    <div class="post-image-list">
						<a href="images/blank-image.jpg" class="html5lightbox post-image" title="">
							<img src="http://placehold.it/870x374" alt="" />
						</a>
						<a href="images/blank-image.jpg" class="html5lightbox post-image" title="">
							<img src="http://placehold.it/870x374" alt="" />
						</a>
						<a href="images/blank-image.jpg" class="html5lightbox post-image" title="">
							<img src="http://placehold.it/870x374" alt="" />
						</a>						
                    </div><!-- Post Images -->
                    <!-- <span class="category">In <a href="#" title="">Home</a>, <a href="#" title="">Blog</a>, <a href="#" title="">Charity</a></span>Categories -->
                    <h1>Lifeline team helped the norcotics addicts to recover in Asia</h1>
					<ul class="post-meta">
						<li><a href="" title=""><i class="icon-calendar-empty"></i><span>September</span> 1,2013 </a></li>
						<li><a href="" title=""><i></i>To 	<span>June</span> 1,2013 </a></li>
						<li><a href="" title=""><i class="icon-user"></i>By James Gomaz</a></li>
						<li><a href="" title=""><i class="icon-map-marker"></i>In South Africa</a></li>
						<li>
							<p><span>$</span> 85920</p>
							<span>Needed Donation</span>
						</li>
						
					</ul>
					<div class="post-desc">
						<p>Donec et libero quis erat commodo suscipit. Mae elit a,  eleifend leo. Phase llus ut pharetra mi, ctor diam. id iarciet spen idisse rhoncus id arcet porta. Aenean blandit mi ipsum, ut pharetrnisi vestibul mum ornare.Lorie ipsum dolor stamet, cons ctetur adipiscing elit. Duis non scelerisque est, quis aliquiam ligula.Aenean blamp esum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellent iesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti. Ut convallis, sem sit amet interdum conis ectetuer, odio augue aliquam leo, nec dapibus tortor nibh sed augue. Integer eu magna sit amet metus fermentum posuere. Morbi sit amet nulla sed dolor elementum imperdiet. Quisque fermentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque adipiscing eros ut libero. Ut condimen itumi vel tellus. Suspendisse laoreet. Fusce ut est sed dolor gravida convallis. Morbi vitae ante. Vivamus ultrices lucinunc. Suspen disse et dolor. Etiam dignissim. Proin malesu iada adipiscing lacus. Donec metus. </p>						
					</div>
				</div>
				
				
				

			</div>
			
			<div class="sidebar col-md-3 pull-right">
                <div class="sidebar-widget">
					<div class="sidebar-title">
						<h4>Donate <span>Us</span></h4>
					</div>
					<div class="donate-us">
						<h3>Give Your Donations</h3>
						<span><i class="icon-phone"></i>1 (123) 12345678</span>
						
						<div class="d-now">
							<center><a title="" class="btn donate-btn btn-warning btn-block" href="#" data-toggle="modal" data-target="#mydonateModal">Donate Now</a></center>
						</div>
					</div>
				</div><!--Donate Us -->
				<div class="sidebar-widget">
					<div class="sidebar-title">
						<h4>Other <span>Activities</span></h4>
					</div>
					<div class="popular-post">
						<img src="http://placehold.it/270x103" alt="" />
						<div class="popular-post-title">
							<h6><a href="#" title="">Quisque Sit Amet Unte</a></h6>
							<span>May 3,2013 / 02 comments</span>
						</div>
					</div>
					<div class="popular-post">
						<img src="http://placehold.it/270x103" alt="" />
						<div class="popular-post-title">
							<h6><a href="#" title="">Quisque Sit Amet Unte</a></h6>
							<span>May 3,2013 / 02 comments</span>
						</div>
					</div>

                </div><!-- Popular Posts -->
			</div>

		</div>
	</div>


</section>
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
