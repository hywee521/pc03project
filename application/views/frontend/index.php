<!-- banner start -->
			

			<div id="page-start"></div>

			<!-- section start -->
			<!-- ================ -->
			<section class="section light-gray-bg clearfix">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<!-- pills start -->
							<!-- ================ -->
							<!-- Nav tabs -->
							<ul class="nav nav-pills" role="tablist">
								<li class="active"><a href="#pill-1" role="tab" data-toggle="tab" title="Latest Arrivals"><i class="icon-star"></i> Latest Arrivals</a></li>
								<li><a href="#pill-2" role="tab" data-toggle="tab" title="Featured"><i class="icon-heart"></i> Featured</a></li>
								<li><a href="#pill-3" role="tab" data-toggle="tab" title="Top Sellers"><i class=" icon-up-1"></i> Top Sellers</a></li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content clear-style">
								<div class="tab-pane active" id="pill-1">
									<div class="row masonry-grid-fitrows grid-space-10">
										<?php
										if(!empty($productList)) {
											foreach($productList as $v) {
										?>
										<div class="col-md-3 col-sm-6 masonry-grid-item">
											<div class="listing-item white-bg bordered mb-20">
												<div class="overlay-container">
													<img src="<?=$v['pic1']?>" alt="">
													<a class="overlay-link popup-img-single" href="<?=$v['pic1']?>"><i class="fa fa-search-plus"></i></a>
													
													<div class="overlay-to-top links">
														<span class="small">
															<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
															<a href="<?=base_url('product_detail/'.$v['id'].'/'.$v['title'])?>" class="btn-sm-link"><i class="icon-link pr-5"></i>View Details</a>
														</span>
													</div>
												</div>
												<div class="body">
													<h3><a href="<?=base_url('product_detail/'.$v['id'].'/'.$v['title'])?>"><?=$v['title']?></a></h3>
													<p class="small"><?=substr($v['brief'],0,100)."..."?></p>
													<div class="elements-list clearfix">
														<span class="price"><del>$<?=number_format($v['ori_price'],2)?></del> $<?=number_format($v['price'],2)?></span>
														<a href="<?=base_url('product_detail/'.$v['id'].'/'.$v['title'])?>" class="pull-right margin-clear btn btn-sm btn-default-transparent btn-animated">Add To Cart<i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
											</div>
										</div>
										<?php
											}
										}
										?>
									</div>
								</div>
								<div class="tab-pane" id="pill-2">
									<div class="row masonry-grid-fitrows grid-space-10">
										<?php
										if(!empty($productList)) {
											foreach($productList as $v) {
										?>
										<div class="col-md-3 col-sm-6 masonry-grid-item">
											<div class="listing-item white-bg bordered mb-20">
												<div class="overlay-container">
													<img src="<?=$v['pic1']?>" alt="">
													<a class="overlay-link popup-img-single" href="<?=$v['pic1']?>"><i class="fa fa-search-plus"></i></a>
													
													<div class="overlay-to-top links">
														<span class="small">
															<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
															<a href="<?=base_url('product_detail/'.$v['id'].'/'.$v['title'])?>" class="btn-sm-link"><i class="icon-link pr-5"></i>View Details</a>
														</span>
													</div>
												</div>
												<div class="body">
													<h3><a href="<?=base_url('product_detail/'.$v['id'].'/'.$v['title'])?>"><?=$v['title']?></a></h3>
													<p class="small"><?=substr($v['brief'],0,100)."..."?></p>
													<div class="elements-list clearfix">
														<span class="price"><del>$<?=number_format($v['ori_price'],2)?></del> $<?=number_format($v['price'],2)?></span>
														<a href="<?=base_url('product_detail/'.$v['id'].'/'.$v['title'])?>" class="pull-right margin-clear btn btn-sm btn-default-transparent btn-animated">Add To Cart<i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
											</div>
										</div>
										<?php
											}
										}
										?>
									</div>
								</div>
								<div class="tab-pane" id="pill-3">
									<div class="row masonry-grid-fitrows grid-space-10">
										<?php
										if(!empty($productList)) {
											foreach($productList as $v) {
										?>
										<div class="col-md-3 col-sm-6 masonry-grid-item">
											<div class="listing-item white-bg bordered mb-20">
												<div class="overlay-container">
													<img src="<?=$v['pic1']?>" alt="">
													<a class="overlay-link popup-img-single" href="<?=$v['pic1']?>"><i class="fa fa-search-plus"></i></a>
													
													<div class="overlay-to-top links">
														<span class="small">
															<a href="#" class="btn-sm-link"><i class="fa fa-heart-o pr-10"></i>Add to Wishlist</a>
															<a href="<?=base_url('product_detail/'.$v['id'].'/'.$v['title'])?>" class="btn-sm-link"><i class="icon-link pr-5"></i>View Details</a>
														</span>
													</div>
												</div>
												<div class="body">
													<h3><a href="<?=base_url('product_detail/'.$v['id'].'/'.$v['title'])?>"><?=$v['title']?></a></h3>
													<p class="small"><?=substr($v['brief'],0,100)."..."?></p>
													<div class="elements-list clearfix">
														<span class="price"><del>$<?=number_format($v['ori_price'],2)?></del> $<?=number_format($v['price'],2)?></span>
														<a href="<?=base_url('product_detail/'.$v['id'].'/'.$v['title'])?>" class="pull-right margin-clear btn btn-sm btn-default-transparent btn-animated">Add To Cart<i class="fa fa-shopping-cart"></i></a>
													</div>
												</div>
											</div>
										</div>
										<?php
											}
										}
										?>
									</div>
								</div>
							</div>
							<!-- pills end -->
						</div>
					</div>
				</div>
			</section>
			<!-- section end -->

			<!-- section start -->
			<!-- ================ -->
			<section class="section dark-translucent-bg background-img-2" style="background-position: 50% 52%;">
				

				<?=$links?>

				<!-- pagination start -->
							<!--<div class="text-center">
								<ul class="pagination">
									<?php
									if($page > 1) {
									?>
									<li><a href="<?=base_url($page-1)?>" aria-label="Previous"><i class="fa fa-angle-left"></i></a></li>
									<?php
									}

									for($i = 1; $i <= $total_pages; $i++) {
									?>
									<li <?=$page == $i?'class="active"':''?>><a href="<?=base_url($i)?>"><?=$i?></a></li>
									<?php
									}
									?>									
									<?php
									if($page < $total_pages) {
									?>
									<li><a href="<?=base_url($page+1)?>" aria-label="Next"><i class="fa fa-angle-right"></i></a></li>
									<?php
									}
									?>
								</ul>
							</div>-->
							<!-- pagination end -->




			</section>
			<!-- section end -->

			

			

			