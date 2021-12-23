@extends('layouts.master')

@section('title')
Brighter Lives | Changing lives for a brighter tomorrow
@endsection

@section('header')
<div id="layerslider-container-fw">
	<div id="layerslider" style="width: 100%; height: 530px; margin: 0px auto; ">

		<div class="ls-slide" data-ls="transition3d:07;timeshift:-1000;">			
			<img src="/images/home-slider/3.jpg" class="ls-bg" alt="Slide background">
				<h3 class="ls-l slide3" style="top:196px; left:100px; font-family: roboto; color: #FFFFFF; line-height:22px; font-size:32px; background:rgba(0,0,0,0.85); padding:18px 30px; border-radius:3px;" data-ls="offsetxin:0; scalexin:0; scaleyin:0; offsetxout:0; offsetyout:top; durationin:1500; durationout:800; showuntil:2000; fadeout:false;"> 
						HELP <i>US</i> TO HELP OTHERS</h3>
						
				<h4 class="ls-l slide3" style="top:265px; left:100px; background:rgba(152,212,96,0.85); font-family: roboto; color: #FFFFFF; font-size:28px; line-height:26px; padding:10px 20px; border-radius:3px;" data-ls="offsetxin:0; scalexin:0; scaleyin:0; offsetxout:0; offsetyout:top; durationin:1500; durationout:800; delayin:500; showuntil:2500;fadeout:false;">
						RESPONSIVE <span>TEMPLATE</span></h4>
			
				<h5 class="ls-l slide3" style="top:319px; left:100px; background:rgba(255,255,255,0.85); color:#595858; font-family:roboto; font-size:24px; line-height: 20px; padding:10px 20px; border-radius:3px;" data-ls="offsetxin:0; scalexin:0; scaleyin:0; offsetxout:0; offsetyout:top; durationin:1500; durationout:800; delayin:1000; showuntil:3000;fadeout:false;">
						CREATIVE <span>IDEAS</span></h5>
		</div><!-- Slide1 -->
		
		<div class="ls-slide" data-ls="transition3d:07;timeshift:-1000;">			
			<img src="/images/home-slider/2.jpg" class="ls-bg" alt="Slide background">
				<h3 class="ls-l" style="top: 160px; left:160px; font-family:roboto; font-size:72px; font-weight:bold; color:#fff; line-height:60px; text-align:center;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:1000;easingin:easeInOutQuart;fadein:false;scalexin:0;scaleyin:0;offsetxout:0;offsetyout:top;durationout:1000;fadeout:false;" >
                I WANNA SAY <span>SOMETHING</span></h3>
				
				<span class="ls-l slide3-subtitle" style="top: 248px; left:160px; padding:13px; border-radius:3px; color:#fff; font-family:open sans; font-weight:900; font-size:26px; text-transform:uppercase; line-height:20px;" data-ls="offsetxin:0;offsetyin:bottom;durationin:1500;delayin:1200;easingin:easeInOutQuart;fadein:false;scalexin:0;scaleyin:0;offsetxout:0;offsetyout:top;durationout:1000;fadeout:false;">
                Please Feel My <i style="font-style:normal; color:#373737;">Tension</i></span>

				<span class="ls-l slide3-subtitle2" style="top: 248px; left:750px; background:rgba(0,0,0,0.8); padding:13px; border-radius:3px; color:#fff; font-family:open sans; font-weight:900; font-size:26px; text-transform:uppercase; line-height:20px;" data-ls="offsetxin:0;offsetyin:bottom;durationin:1500;delayin:1300;easingin:easeInOutQuart;fadein:false;scalexin:0;scaleyin:0;offsetxout:0;offsetyout:top;durationout:1000;fadeout:false;">
                We <i style="font-style:normal;">Need</i> Your Help</span>
		</div><!-- Slide2 -->

		<div class="ls-slide" data-ls="transition3d:07;timeshift:-1000;">			
			<img src="/images/home-slider/4.jpg" class="ls-bg" alt="Slide background">
			<h3 class="ls-l" style="top:190px; left:50%; color:#FFF; font-family:open sans; font-size:60px; font-weight:300;" data-ls="durationin:1500; delayin:1000; easingin:easeOutQuart; fadein:false; easingout:easeInQuart; rotatexin:-90deg;">
            LET'S BUILD <span style="font-weight:700;">THE WORLD.</span></h3>
			<p class="ls-l" style="top:290px; left:50%; line-height:30px; color:#FFF; font-family:noto sans; font-size:14px; text-align:center;" data-ls="durationin:1500; delayin:1500; easingin:easeOutQuart; fadein:false; easingout:easeInQuart; rotatexin:-90deg;">
            With easy to use Drag and Drop Page Builder build professional looking page with best slider <br />Layer. consectetur</p>
			<div class="ls-l slide-donate2" style="top:370px; left:50%; font-family:open sans; font-size:12px; font-weight:400; color:#FFF; padding:10px 20px; border-radius:3px;" data-ls="durationin:1500; delayin:2000; easingin:easeOutQuart; fadein:false; easingout:easeInQuart; rotatexin:-90deg;">
            <a href="#" title=""  data-toggle="modal" data-target="#donateModal"><i class="icon-heart"></i> DONATE NOW</a>
            <!-- <a  href="#donateModal" data-toggle="modal" data-target="#donateModal" class="strip_list"></div> -->
		</div><!-- Slide2 -->

		
	</div>
</div><!-- Layer Slider -->
@endsection

@section('content')

<!-- SECTION FOR ASSOCIATION LIST -->
<section class="block remove-top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sec-title"><br>
					<h2>@lang('homescreen.our') <span>@lang('homescreen.associations') </span></h2>
				</div>
				<div class="remove-ext">
					<div class="row">
						<div class="col-md-3">
							<div class="our-cause" id="our-cause">
								<div class="our-cause-img" id="our-cause-img">
									<img src="/images/associations/association1.jpg" class="img img-responsive" alt="" />
									<a href="#" title=""><i class="icon-link"></i></a>
								</div>
								<div class="our-cause-detail">
									<h3>Association Name One</h3>
									<span><i class="fa fa-home"></i> <a href="#" title="">Nkambe, NW Region</a></span>
									<p>consectetu pisei ing elit. mi tellus, fringilla intedidum vitae, tempor id lorem. Nunc aliquettndunt conse iquat. Lorem ipsum dolor.</p>
									<a href="/association" title="">VIEW MORE</a>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="our-cause" id="our-cause">
								<div class="our-cause-img" id="our-cause-img">
									<img src="/images/associations/association2.jpg" class="img img-responsive" alt="" />
									<a href="#" title=""><i class="icon-link"></i></a>
								</div>
								<div class="our-cause-detail">
									<h3>Association Name Two</h3>
									<span><i class="fa fa-home"></i> <a href="#" title="">Nkambe, NW Region</a></span>
									<p>pisei ing elit. Pellentesque mi tellus, fringilla intedidum vitae, tempor id lorem. Nunc aliquettndunt conse iquat. Lorem ipsum dolor.</p>
									<a href="/association" title="">VIEW MORE</a>
								</div>
							</div>

						</div>

						<div class="col-md-3">
							<div class="our-cause" id="our-cause">
								<div class="our-cause-img" id="our-cause-img">
									<img src="/images/associations/association1.jpg" alt="" />
									<a href="#" title=""><i class="icon-link"></i></a>
								</div>
								<div class="our-cause-detail">
									<h3>Association Name 3</h3>
									<span><i class="fa fa-home"></i> <a href="#" title="">Nkambe, NW Region</a></span>
									<p>pisei ing elit. Pellentesque mi tellus, fringilla intedidum vitae, tempor id lorem. Nunc aliquettndunt conse iquat. Lorem ipsum dolor.</p>
									<a href="/association" title="">VIEW MORE</a>
								</div>
							</div>

						</div>

                        <div class="col-md-3">
							<div class="our-cause" id="our-cause">
								<div class="our-cause-img" id="our-cause-img">
									<img src="/images/associations/association2.jpg" class="img img-responsive" alt="" />
									<a href="#" title=""><i class="icon-link"></i></a>
								</div>
								<div class="our-cause-detail">
									<h3>Association Name Two</h3>
									<span><i class="fa fa-home"></i> <a href="#" title="">Nkambe, NW Region</a></span>
									<p>pisei ing elit. Pellentesque mi tellus, fringilla intedidum vitae, tempor id lorem. Nunc aliquettndunt conse iquat. Lorem ipsum dolor.</p>
									<a href="/association" title="">VIEW MORE</a>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- SECTION FOR VIEW ALL ASSOCIATIONS -->
<section>
    <div class="row">
        <div class="col-md-12">
            <div class="container">
			<!-- <a href="#" title="">VIEW MORE</a> -->
            </div>
        </div>
    </div>
</section>

<!-- SECTION FOR ASSOCIATION ACTIVITIES -->
<section class="block remove-top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sec-heading">
					<h2><strong>Associations</strong> Activities</h2>
				</div><!-- Section Title -->		
				<div class="stories-carousel">
					<ul class="slides">
						<li>
							<div class="row">
								<div class="col-md-4">
									<div class="story">
										<div class="story-img">
											<img src="http://placehold.it/270x196" alt="" />
											<h5>Billionair Help for Charity Food</h5>
											<a href="/single-activity" title=""><span></span></a>
										</div>
										<p>Lorem ipsum dolor sit amet, condsec adipii ing elit. Pellentesque mi tellus, fring non uontdum vitae, tempor id lorem. Ring nonntedum vitae, tempor id lorem. </p>
										<div class="recent-event">
											<ul>
												<li><a href="#" title=""><i class="icon-user"></i>james goumes</a></li>
												<li><a href="#" title=""><i class="icon-map-marker"></i>South africa</a></li>
												<li><a href="#" title=""><i class="icon-calendar-empty"></i><span>Sept</span> 1, 2013</a></li>
											</ul>
										</div><!-- Latest Event -->
									</div><!-- Story -->
								</div>
								<div class="col-md-4">
									<div class="story">
										<div class="story-img">
											<img src="http://placehold.it/270x196" alt="" />
											<h5>Billionair Help for Charity Food</h5>
											<a href="/single-activity" title=""><span></span></a>
										</div>
										<p>Lorem ipsum dolor sit amet, condsec adipii ing elit. Pellentesque mi tellus, fring non uontdum vitae, tempor id lorem. Ring nonntedum vitae, tempor id lorem. </p>
										<div class="recent-event">
											<ul>
												<li><a href="#" title=""><i class="icon-user"></i>james goumes</a></li>
												<li><a href="#" title=""><i class="icon-map-marker"></i>South africa</a></li>
												<li><a href="#" title=""><i class="icon-calendar-empty"></i><span>Sept</span> 1, 2013</a></li>
											</ul>
										</div><!-- Latest Event -->
									</div><!-- Story -->
								</div>
								<div class="col-md-4">
									<div class="story">
										<div class="story-img">
											<img src="http://placehold.it/270x196" alt="" />
											<h5>Billionair Help for Charity Food</h5>
											<a href="/single-activity" title=""><span></span></a>
										</div>
										<p>Lorem ipsum dolor sit amet, condsec adipii ing elit. Pellentesque mi tellus, fring non uontdum vitae, tempor id lorem. Ring nonntedum vitae, tempor id lorem. </p>
										<div class="recent-event">
											<ul>
												<li><a href="#" title=""><i class="icon-user"></i>james goumes</a></li>
												<li><a href="#" title=""><i class="icon-map-marker"></i>South africa</a></li>
												<li><a href="#" title=""><i class="icon-calendar-empty"></i><span>Sept</span> 1, 2013</a></li>
											</ul>
										</div><!-- Latest Event -->
									</div><!-- Story -->
								</div>
							</div>
						</li>
						<li>
							<div class="row">
								<div class="col-md-4">
									<div class="story">
										<div class="story-img">
											<img src="http://placehold.it/270x196" alt="" />
											<h5>Billionair Help for Charity Food</h5>
											<a href="/single-activity" title=""><span></span></a>
										</div>
										<p>Lorem ipsum dolor sit amet, condsec adipii ing elit. Pellentesque mi tellus, fring non uontdum vitae, tempor id lorem. Ring nonntedum vitae, tempor id lorem. </p>
										<div class="recent-event">
											<ul>
												<li><a href="#" title=""><i class="icon-user"></i>james goumes</a></li>
												<li><a href="#" title=""><i class="icon-map-marker"></i>South africa</a></li>
												<li><a href="#" title=""><i class="icon-calendar-empty"></i><span>Sept</span> 1, 2013</a></li>
											</ul>
										</div><!-- Latest Event -->
									</div><!-- Story -->
								</div>
								<div class="col-md-4">
									<div class="story">
										<div class="story-img">
											<img src="http://placehold.it/270x196" alt="" />
											<h5>Billionair Help for Charity Food</h5>
											<a href="/single-activity" title=""><span></span></a>
										</div>
										<p>Lorem ipsum dolor sit amet, condsec adipii ing elit. Pellentesque mi tellus, fring non uontdum vitae, tempor id lorem. Ring nonntedum vitae, tempor id lorem. </p>
										<div class="recent-event">
											<ul>
												<li><a href="#" title=""><i class="icon-user"></i>james goumes</a></li>
												<li><a href="#" title=""><i class="icon-map-marker"></i>South africa</a></li>
												<li><a href="#" title=""><i class="icon-calendar-empty"></i><span>Sept</span> 1, 2013</a></li>
											</ul>
										</div><!-- Latest Event -->
									</div><!-- Story -->
								</div>
								<div class="col-md-4">
									<div class="story">
										<div class="story-img">
											<img src="http://placehold.it/270x196" alt="" />
											<h5>Billionair Help for Charity Food</h5>
											<a href="/single-activity" title=""><span></span></a>
										</div>
										<p>Lorem ipsum dolor sit amet, condsec adipii ing elit. Pellentesque mi tellus, fring non uontdum vitae, tempor id lorem. Ring nonntedum vitae, tempor id lorem. </p>
										<div class="recent-event">
											<ul>
												<li><a href="#" title=""><i class="icon-user"></i>james goumes</a></li>
												<li><a href="#" title=""><i class="icon-map-marker"></i>South africa</a></li>
												<li><a href="#" title=""><i class="icon-calendar-empty"></i><span>Sept</span> 1, 2013</a></li>
											</ul>
										</div><!-- Latest Event -->
									</div><!-- Story -->
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('page-js')
<script>
$(window).load(function(){
  $('.our-causes').flexslider({
	animation: "slide",
	animationLoop: false,
	controlNav: true,	
    maxItems: 1,
	pausePlay: false,
	mousewheel:true,
	start: function(slider){
	  $('body').removeClass('loading');
	}
	});
	
	
  $('.slideshow').flexslider({
	animation: "fade",
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
<script type="text/javascript">
$(document).ready(function(){
	$(function() {
		$('#carousel').carouFredSel({
			responsive: true,
			circular: false,
			auto: false,
			items: {
				visible: 1,
				width: 20,
			},
			scroll: {
				fx: 'directscroll'
			}
		});
		$('#thumbs').carouFredSel({
			responsive: true,
			circular: false,
			infinite: false,
			auto: false,
			prev: '#prev',
			next: '#next',
			items: {
				visible: {
					min: 1,
					max: 6
				},
				width: 200,
				height: '80%'
			}
		});
		$('#thumbs a').click(function() {
			$('#carousel').trigger('slideTo', '#' + this.href.split('#').pop() );
			$('#thumbs a').removeClass('selected');
			$(this).addClass('selected');
			return false;
		});			
	});
});		
</script>	

<!-- Scripts For Layer Slider  -->
<script src="/layerslider/js/greensock.js" type="text/javascript"></script>
<!-- LayerSlider script files -->
<script src="/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
<script src="/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
jQuery("#layerslider").layerSlider({
	responsive: true,
	responsiveUnder: 1280,
	layersContainer: 1170,
	skin: 'fullwidth',
	hoverPrevNext: true,
	skinsPath: '/layerslider/skins/'
});
});
</script>
<script>
$(window).load(function(){
  $('.stories-carousel').flexslider({
	animation: "slide",
	animationLoop: false,
	controlNav: false,	
    maxItems: 1,
	pausePlay: false,
	mousewheel:true,	
	start: function(slider){
	  $('body').removeClass('loading');
	}
	});
});
</script>
@include('includes.modals')
@endsection
