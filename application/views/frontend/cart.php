<!-- breadcrumb start -->
			<!-- ================ -->
			<div class="breadcrumb-container">
				<div class="container">
					<ol class="breadcrumb">
						<li><i class="fa fa-home pr-10"></i><a href="<?=base_url()?>">Home</a></li>
						<li class="active">Shopping Cart</li>
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
							<h1 class="page-title">Shopping Cart</h1>
							<div class="separator-2"></div>
							<!-- page-title end -->

							<table class="table cart table-hover table-colored">
								<thead>
									<tr>
										<th>Product </th>
										<th>Price </th>
										<th>Quantity</th>
										<th> </th>
										<th class="amount">Total </th>
									</tr>
								</thead>
								<tbody>
									<?php
									$total_qty = 0;
									$total_amount = 0;

									if(!empty($cartList)) {
										foreach($cartList as $v) {

											$total_qty += $v['qty'];
											$total_amount += ($v['qty']*$v['product_price']);

									?>
									<tr class="remove-data">
										<td class="product"><a href="<?=base_url('product_detail/'.$v['product_id'].'/'.$v['product_title'])?>"><?=$v['product_title']?></a></td>
										<td class="price">$<?=number_format($v['product_price'],2)?> </td>
										<td class="quantity">
											<div class="form-group">
												<input type="text" class="form-control" value="<?=$v['qty']?>">
											</div>											
										</td>
										<td class="remove"></td>
										<td class="amount">$<?=number_format($v['qty']*$v['product_price'],2)?> </td>
									</tr>
									<?php
										}
									}
									?>
									
									<tr>
										<td class="total-quantity" colspan="4">Total <?=$total_qty?> Items</td>
										<td class="total-amount">$<?=number_format($total_amount,2)?></td>
									</tr>
								</tbody>
							</table>
							<div class="text-right">	
								<!-- <a href="#" class="btn btn-group btn-default">Update Cart</a> -->
								<a href="<?=base_url('checkout')?>" class="btn btn-group btn-default">Checkout</a>
							</div>

						</div>
						<!-- main end -->

					</div>
				</div>
			</section>
			<!-- main-container end -->

			

			