<!-- breadcrumb start -->
			<!-- ================ -->
			<div class="breadcrumb-container">
				<div class="container">
					<ol class="breadcrumb">
						<li><i class="fa fa-home pr-10"></i><a href="index.html">Home</a></li>
						<li class="active">Checkout Payment</li>
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
							<h1 class="page-title">Checkout Payment</h1>
							<div class="separator-2"></div>
							<!-- page-title end -->
							
							<form method="post" action="<?=$endpoint?>">
								<fieldset>
									<legend>Payment</legend>

                                    <INPUT type="hidden" name="amount" value="<?=$amount?>">
                                    <INPUT type="hidden" name="orderid" value="<?=$orderid?>">
                                    <INPUT type="hidden" name="bill_name" value="<?=$bill_name?>">
                                    <INPUT type="hidden" name="bill_email" value="<?=$bill_email?>">
                                    <INPUT type="hidden" name="bill_mobile" value="<?=$bill_mobile?>">
                                    <INPUT type="hidden" name="bill_desc" value="<?=$bill_desc?>">
                                    <INPUT type="hidden" name="country" value="<?=$country?>">
                                    <INPUT type="hidden" name="vcode" value="<?=$vcode?>">


                                    <INPUT type="hidden" name="returnurl" value="<?=$returnurl?>">
                                    <INPUT type="hidden" name="cancelurl" value="<?=$cancelurl?>">
                                    <INPUT type="hidden" name="callbackurl" value="<?=$callbackurl?>">
                                    
                                    <INPUT type="hidden" name="currency" value="MYR">

																	
								</fieldset>
								<div class="text-right">										
									<button type="submit" class="btn btn-group btn-default">Proceed to Payment Gateway <i class="icon-right-open-big"></i></button>
								</div>
							</form>

						</div>
						<!-- main end -->

					</div>
				</div>
			</section>
			<!-- main-container end -->

			