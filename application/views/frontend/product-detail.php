<!-- breadcrumb start -->
			<!-- ================ -->
			<div class="breadcrumb-container">
				<div class="container">
					<ol class="breadcrumb">
						<li><i class="fa fa-home pr-10"></i><a href="<?=base_url()?>">Home</a></li>
						<li class="active"><?=$productData['title']?></li>
					</ol>
				</div>
			</div>
			<!-- breadcrumb end -->

			<!-- main-container start -->
			<!-- ================ -->
			<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-12">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"><?=$productData['title']?></h1>
							<div class="separator-2"></div>
							<!-- page-title end -->

							<div class="row">
								<div class="col-md-4">
									<!-- pills start -->
									<!-- ================ -->
									<!-- Nav tabs -->
									<ul class="nav nav-pills" role="tablist">
										<li class="active"><a href="#pill-1" role="tab" data-toggle="tab" title="images"><i class="fa fa-camera pr-5"></i> Photo</a></li>
										<li><a href="#pill-2" role="tab" data-toggle="tab" title="video"><i class="fa fa-video-camera pr-5"></i> Video</a></li>
									</ul>
									<!-- Tab panes -->
									<div class="tab-content clear-style">
										<div class="tab-pane active" id="pill-1">
											<div class="owl-carousel content-slider-with-large-controls">
												<div class="overlay-container overlay-visible">
													<img src="<?=$productData['pic1']?>" alt="">
													<a href="<?=$productData['pic1']?>" class="popup-img overlay-link" title="image title"><i class="icon-plus-1"></i></a>
												</div>
												<div class="overlay-container overlay-visible">
													<img src="<?=$productData['pic2']?>" alt="">
													<a href="<?=$productData['pic2']?>" class="popup-img overlay-link" title="image title"><i class="icon-plus-1"></i></a>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="pill-2">
											<div class="embed-responsive embed-responsive-16by9">
												<iframe class="embed-responsive-item" src="//player.vimeo.com/video/29198414?byline=0&amp;portrait=0"></iframe>
												<p><a href="http://vimeo.com/29198414">Introducing Vimeo Music Store</a> from <a href="http://vimeo.com/staff">Vimeo Staff</a> on <a href="https://vimeo.com">Vimeo</a>.</p>
											</div>
										</div>
									</div>
									<!-- pills end -->
								</div>
								<div class="col-md-8 pv-30">
									<h2>Description</h2>
									
									<p><?=$productData['brief']?></p>
									<hr class="mb-10">
									<div class="clearfix mb-20">
										<span>
											<i class="fa fa-star text-default"></i>
											<i class="fa fa-star text-default"></i>
											<i class="fa fa-star text-default"></i>
											<i class="fa fa-star text-default"></i>
											<i class="fa fa-star"></i>
										</span>
										<a href="#" class="wishlist"><i class="fa fa-heart-o pl-10 pr-5"></i>Wishlist</a>
										<ul class="pl-20 pull-right social-links circle small clearfix margin-clear animated-effect-1">
											<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
											<li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
											<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
										</ul>
									</div>
									<form method="post" action="<?=base_url('addcart')?>" role="form" class="clearfix">
										<div class="row grid-space-10">
											
												<div class="col-md-4">
													<div class="form-group">
														<label>Quantity</label>
														<input type="hidden" name="product_id" value="<?=$productData['id']?>" />
														<input type="text" name="qty" class="form-control" value="1">
													</div>
												</div>
												
												<div class="col-md-12 text-right">
													
												</div>
											
										</div>
										<div class="light-gray-bg p-20 bordered clearfix">
											<span class="product price"><i class="icon-tag pr-10"></i>$<?=number_format($productData['price'],2)?></span>
											<div class="product elements-list pull-right clearfix">
												<input type="submit" value="Add to Cart" class="margin-clear btn btn-default">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- main end -->

					</div>
				</div>
			</section>
			<!-- main-container end -->

			

			
