@extends('layouts.master')

@section('title')
Brighter Lives | Association Name Here | Product Name Here
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
<section class="inner-page switch">
	<div class="container">
		<div class="row">
			<div class="content col-md-9">
				<div class="post">
					<div class="single-product-page">
						<div class="row">
							<div class="col-md-5">
								<img src="http://placehold.it/370x370" alt="" /><!-- Post Image -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="post-image-list">
                                            <a href="images/blank-image.jpg" class="html5lightbox" title="">
                                                <img src="/images/header.jpg" class="img img-responsive img-fluid" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="post-image-list">
                                            <a href="images/blank-image.jpg" class="html5lightbox" title="">
                                                <img src="/images/header.jpg" class="img img-responsive img-fluid" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="post-image-list">
                                            <a href="images/blank-image.jpg" class="html5lightbox" title="">
                                                <img src="/images/header.jpg" class="img img-responsive img-fluid" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
							</div>
							<div class="col-md-7">
								<h1>Product Name Here...</h1>
                                <h3><strong>XAF</strong> 23,500</h3>
								<div class="post-desc">
									<p>Product short description here ...que, blandit mi ipsum, ut pharetrnisi vestibulblandit mi ipsum, ut pharetrnisi vestibulblandit mi ipsum, ut pharetrnisi vestibulblandit mi ipsum, ut pharetrnisi vestibul mum ornare. Lorie ipsum dol stamet, cons ctetur adipiscing elit. Donec et libero quis erat commodo suscipit. Mae elit a,  eleifend leo. Phase llus ut pharetra  cons ctetur adipiscing elit. Donec et libero quis erat commodo suscipit. Mae elit a,  eleifend leo ...</p>
									<p href="" title=""><i class="icon-calendar-empty"></i><span> September</span> 1,2013 </p>
                                    <p href="" title=""><i class="icon-user"></i> By James Gomaz</p>
                                    <HR />
                                    <div class="row">
										<div class="col-md-6">
											<div id="quantity-field">
												<button id="up" onclick="setQuantity('up');">+</button>
												<input type="text" id="quantity" value="01">
												<button id="down" onclick="setQuantity('down');">-</button>
											</div>
										</div>
										<div class="col-md-6">
											<a class="cart-btn" href="" data-toggle="modal" data-target="#checkoutModal" title=""><span><i class="fa fa-money"></i></span> Pay Now</a>
										</div>
									</div>
								</div>
							</div>					
						</div>					
					</div>
                    <h5>Long Description</h5>
					<p>Donec et libero quis erat commodo suscipit. Mae elit a,  eleifend leo. Phase llus ut pharetra mi, ctor diam. id iarciet spen idisse rhoncus id arcet porta. Aenean blandit mi ipsum, ut pharetrnisi vestibul mum ornare.Lorie ipsum dolor stamet, cons ctetur adipiscing elit. Duis non scelerisque esit, aliquiam ligula.Aenean blamp esum. Lorem ipsum dolor sit amet, consec tietuer adipiscing elit. Phasellus hendrerit. Pellent iesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor ucnibh. Nullam mollis. Ut justo. Suspendisse potenti. Ut convallis, sem sit amet interdum conis ectetuer, odio augue aliquam leo, nec dapibus tortor nibh sed augue. Integer eu magna sit amet metus fermentum posuere. Morbi sit amet nulla sed dolor elementum imperdiet.</p>
									
					<div class="cloud-tags">
						<h3 class="sub-head">Tags</h3>
						<a title="" href="#">Uncategorized</a>
						<a title="" href="#">Susipit</a>
						<a title="" href="#">Diam</a>
						<a title="" href="#">Diam</a>
						<a title="" href="#">Susipit</a>
					</div><!-- Tags -->	

					<div class="comments">
						<h3 class="sub-head">02 Comments <a href="#rateForm" class="btn btn-success btn-xs" title="">Rate </a></h3>
						<ul>
							<li>
								<div class="comment">
									<img src="http://placehold.it/73x74" alt="" />
									<a href="#" class="reply" title=""><span class="fa fa-star text-success"></span><span class="fa fa-star text-success"></span><span class="fa fa-star text-success"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
									<span></a>
									<h5>Thoms Gomz Britian</h5>
                                    <br>
                                    <i><span>September</span> 24, 2013  at  1:05 <span>pm</span></i>
									<p>Aenean blamp esum. erat commodo suscipit. Mae elit a,  eleifend leo. Phase llus ut pharetra mi, ctor diam. id iarciet spen dis se rhoncus idarciret porta. Aenean blandit mi ipsum, ut pharetrnisi vestibul mum ornare.</p>
								</div><!-- Comment -->
									
							</li>
							<li>
								<div class="comment">
									<img src="http://placehold.it/73x74" alt="" />
									<a href="#" class="reply" title=""><span class="fa fa-star text-success"></span><span class="fa fa-star text-success"></span><span class="fa fa-star text-success"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
									<span></a>
									<h5>Thoms Gomz Britian</h5>
                                    <br>
                                    <i><span>September</span> 24, 2013  at  1:05 <span>pm</span></i>
									<p>Aenean blamp esum. erat commodo suscipit. Mae elit a,  eleifend leo. Phase llus ut pharetra mi, ctor diam. id iarciet spen dis se rhoncus idarciret porta. Aenean blandit mi ipsum, ut pharetrnisi vestibul mum ornare.</p>
								</div><!-- Comment -->
									
							</li>
						
						</ul>
					</div>
					<div id="rateForm" class="form">
						<h3 class="sub-head">Leave a review</h3>
						
						<form>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Rating<span>*</span></label>
							        <select class="form-control input-field">
                                        <option value="1">1 Star</option>
                                        <option value="2">2 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="5">5 Stars</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Full name <span>*</span></label>
                                    <input type="text" class="form-control input-field" />
                                </div>
                            </div>
							
							<!-- <label>Email Address <span>*</span></label>
							<input type="email" class="form-control input-field" /> -->
							<label>Comment <span>*</span></label>
							<textarea rows="3" class="form-control input-field"></textarea>
							<input type="submit" class="form-button" value="SEND REVIEW" />
						</form>
					
					</div><!-- Form -->
						
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
						<a href="#" title="">Susipit</a>
						<a href="#" title="">Diam</a>
						<a href="#" title="">Diam</a>
						<a href="#" title="">Susipit</a>
						<a href="#" title="">Diam</a>
						<a href="#" title="">Susipit</a>
						<a href="#" title="">Uncategorized</a>
						<a href="#" title="">Susipit</a>
					</div>
				</div><!-- Tags Clouds -->
			</div>

		</div>
	</div>


</section>
@endsection

@section('page-js')
<script>
	function setQuantity(upordown) {
	var quantity = document.getElementById('quantity');
	if (quantity.value > 1) {
		if (upordown == 'up'){++document.getElementById('quantity').value;}
		else if (upordown == 'down'){--document.getElementById('quantity').value;}}
	else if (quantity.value == 1) {
		if (upordown == 'up'){++document.getElementById('quantity').value;}}
	else
		{document.getElementById('quantity').value=1;}
}
</script>
@endsection
