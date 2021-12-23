@extends('layouts.master')

@section('title')
Brighter Lives | Associations
@endsection

@section('header')
<div class="top-image" id="associatioTop" style="background-image: url('/images/header.jpg')">
<br><br>
    <h3 class="text-center assoc-name"><strong>BrighterLives</strong> - Creative Associations</h3>
</div><!--Page Top Image-->
@endsection

@section('content')
<section class="inner-page">
	<div class="container">
		<div class="page-title bold">
			<h1 class="">Our <span>Associations</span></h1>
		</div><!--Page Title-->
		<div class="remove-ext">
			<div class="row">
				<div class="col-md-4">
					<div class="fancy-cause">
						<img alt="" src="/images/associations/association1.jpg">
						<div class="fancy-cause-intro">
							<i>in <a title="" href="#">Nkambe, NW Region</a></i>
							<h3>ASSOCIATION NAME ONE</h3>
							<span><span class="icon-phone"></span> 680714610</span>
						</div>
						<div class="fancy-cause-hover">
							<p>Lorem ipsum dolor sit amet, consectetu pisei ing elit. Pellentesque mi tellus, fringilla intedidum vitae, tempor id lorem. Nunc aliquettndunt conse iquat. Lorem ipsum dolor sit amet, consectetu.</p>
							<span><a title="" href="#" data-toggle="modal" data-target="#mydonateModal">Donate Now</a><a title="" href="/association">Know More</a></span>											
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="fancy-cause">
						<img alt="" src="/images/associations/association1.jpg">
						<div class="fancy-cause-intro">
							<i>in <a title="" href="#">Nkambe, NW Region</a></i>
							<h3>ASSOCIATION NAME ONE</h3>
							<!-- <span><span class="icon-phone"></span> 680714610</span> -->
						</div>
						<div class="fancy-cause-hover">
							<p>Lorem ipsum dolor sit amet, consectetu pisei ing elit. Pellentesque mi tellus, fringilla intedidum vitae, tempor id lorem. Nunc aliquettndunt conse iquat. Lorem ipsum dolor sit amet, consectetu.</p>
							<span><a title="" href="#" data-toggle="modal" data-target="#mydonateModal">Donate Now</a><a title="" href="/association">Know More</a></span>											
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="fancy-cause">
						<img alt="" src="/images/associations/association1.jpg">
						<div class="fancy-cause-intro">
							<i>in <a title="" href="#">Nkambe, NW Region</a></i>
							<h3>ASSOCIATION NAME ONE</h3>
							<!-- <span><span class="icon-phone"></span> 680714610</span> -->
						</div>
						<div class="fancy-cause-hover">
							<p>Lorem ipsum dolor sit amet, consectetu pisei ing elit. Pellentesque mi tellus, fringilla intedidum vitae, tempor id lorem. Nunc aliquettndunt conse iquat. Lorem ipsum dolor sit amet, consectetu.</p>
							<span><a title="" href="#" data-toggle="modal" data-target="#mydonateModal">Donate Now</a><a title="" href="/association">Know More</a></span>											
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="fancy-cause">
						<img alt="" src="/images/associations/association1.jpg">
						<div class="fancy-cause-intro">
							<i>in <a title="" href="#">Nkambe, NW Region</a></i>
							<h3>ASSOCIATION NAME ONE</h3>
							<!-- <span><span class="icon-phone"></span> 680714610</span> -->
						</div>
						<div class="fancy-cause-hover">
							<p>Lorem ipsum dolor sit amet, consectetu pisei ing elit. Pellentesque mi tellus, fringilla intedidum vitae, tempor id lorem. Nunc aliquettndunt conse iquat. Lorem ipsum dolor sit amet, consectetu.</p>
							<span><a title="" href="#" data-toggle="modal" data-target="#mydonateModal">Donate Now</a><a title="" href="/association">Know More</a></span>											
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="fancy-cause">
						<img alt="" src="/images/associations/association1.jpg">
						<div class="fancy-cause-intro">
							<i>in <a title="" href="#">Nkambe, NW Region</a></i>
							<h3>ASSOCIATION NAME ONE</h3>
							<!-- <span><span class="icon-phone"></span> 680714610</span> -->
						</div>
						<div class="fancy-cause-hover">
							<p>Lorem ipsum dolor sit amet, consectetu pisei ing elit. Pellentesque mi tellus, fringilla intedidum vitae, tempor id lorem. Nunc aliquettndunt conse iquat. Lorem ipsum dolor sit amet, consectetu.</p>
							<span><a title="" href="#" data-toggle="modal" data-target="#mydonateModal">Donate Now</a><a title="" href="/association">Know More</a></span>											
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="fancy-cause">
						<img alt="" src="/images/associations/association1.jpg">
						<div class="fancy-cause-intro">
							<i>in <a title="" href="#">Nkambe, NW Region</a></i>
							<h3>ASSOCIATION NAME ONE</h3>
							<!-- <span><span class="icon-phone"></span> 680714610</span> -->
						</div>
						<div class="fancy-cause-hover">
							<p>Lorem ipsum dolor sit amet, consectetu pisei ing elit. Pellentesque mi tellus, fringilla intedidum vitae, tempor id lorem. Nunc aliquettndunt conse iquat. Lorem ipsum dolor sit amet, consectetu.</p>
							<span><a title="" href="#" data-toggle="modal" data-target="#mydonateModal">Donate Now</a><a title="" href="/association">Know More</a></span>											
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="pagination-area">
			<!-- pagination here -->
		</div><!--Pagination-->		
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
