<!-- breadcrumb start -->
			<!-- ================ -->
			<div class="breadcrumb-container">
				<div class="container">
					<ol class="breadcrumb">
						<li><i class="fa fa-home pr-10"></i><a href="index.html">Home</a></li>
						<li class="active">Checkout</li>
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
							<h1 class="page-title">Checkout</h1>
							<div class="separator-2"></div>
							<!-- page-title end -->

							<table class="table cart">
								<thead>
									<tr>
										<th>Product </th>
										<th>Price </th>
										<th>Quantity</th>
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
									<tr>
										<td class="product"><a href="<?=base_url('product_detail/'.$v['product_id'].'/'.$v['product_title'])?>"><?=$v['product_title']?></a></td>
										<td class="price">$<?=number_format($v['product_price'],2)?> </td>
										<td class="quantity">
											<div class="form-group">
												<input type="text" class="form-control" value="<?=$v['qty']?>" disabled>
											</div>											
										</td>
										<td class="amount">$<?=number_format($v['qty']*$v['product_price'],2)?> </td>
									</tr>
									<?php
										}
									}
									?>
									
									<tr>
										<td class="total-quantity" colspan="3">Total <?=$total_qty?> Items</td>
										<td class="total-amount">$<?=number_format($total_amount,2)?></td>
									</tr>
								</tbody>
							</table>
							<div class="space-bottom"></div>
							<form role="form" method="post" action="<?=base_url('checkout_submit')?>" class="form-horizontal" id="billing-information">
							<fieldset>
								<legend>Billing information</legend>
								
									<div class="row">
										<div class="col-lg-3">
											<h3 class="title">Personal Info</h3>
										</div>
										<div class="col-lg-8 col-lg-offset-1">
											<div class="form-group">
												<label for="billingFirstName" class="col-md-2 control-label">First Name<small class="text-default">*</small></label>
												<div class="col-md-10">
													<input type="text" name="firstName" class="form-control" id="billingFirstName" value="First Name">
												</div>
											</div>
											<div class="form-group">
												<label for="billingLastName" class="col-md-2 control-label">Last Name<small class="text-default">*</small></label>
												<div class="col-md-10">
													<input type="text" name="lastName" class="form-control" id="billingLastName" value="Last Name">
												</div>
											</div>
											<div class="form-group">
												<label for="billingTel" class="col-md-2 control-label">Telephone<small class="text-default">*</small></label>
												<div class="col-md-10">
													<input type="text" name="tel" class="form-control" id="billingTel" value="Telephone">
												</div>
											</div>
											<div class="form-group">
												<label for="billingFax" class="col-md-2 control-label">Fax</label>
												<div class="col-md-10">
													<input type="text" name="fax" class="form-control" id="billingFax" value="Fax">
												</div>
											</div>
											<div class="form-group">
												<label for="billingemail" class="col-md-2 control-label">Email<small class="text-default">*</small></label>
												<div class="col-md-10">
													<input type="email" name="email" class="form-control" id="billingemail" value="Email@gmail.com">
												</div>
											</div>
										</div>
									</div>
									<div class="space"></div>
									<div class="row">
										<div class="col-lg-3">
											<h3 class="title">Your Address</h3>
										</div>
										<div class="col-lg-8 col-lg-offset-1">
											<div class="form-group">
												<label for="billingAddress1" class="col-md-2 control-label">Address 1<small class="text-default">*</small></label>
												<div class="col-md-10">
													<input type="text" name="addr1" class="form-control" id="billingAddress1" value="Address 1">
												</div>
											</div>
											<div class="form-group">
												<label for="billingAddress2" class="col-md-2 control-label">Address 2</label>
												<div class="col-md-10">
													<input type="text" name="addr2" class="form-control" id="billingAddress2" value="Address 2">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Country<small class="text-default">*</small></label>
												<div class="col-md-10">
													<select class="form-control" name="country">
														<option value="AF">Afghanistan</option>
														<option value="AX">Aland Islands</option>
														<option value="AL">Albania</option>
														<option value="DZ">Algeria</option>
														<option value="AS">American Samoa</option>
														<option value="AD">Andorra</option>
														<option value="AO">Angola</option>
														<option value="AI">Anguilla</option>
														<option value="AQ">Antarctica</option>
														<option value="AG">Antigua and Barbuda</option>
														<option value="AR">Argentina</option>
														<option value="AM">Armenia</option>
														<option value="AW">Aruba</option>
														<option value="AU">Australia</option>
														<option value="AT">Austria</option>
														<option value="AZ">Azerbaijan</option>
														<option value="BS">Bahamas</option>
														<option value="BH">Bahrain</option>
														<option value="BD">Bangladesh</option>
														<option value="BB">Barbados</option>
														<option value="BY">Belarus</option>
														<option value="BE">Belgium</option>
														<option value="BZ">Belize</option>
														<option value="BJ">Benin</option>
														<option value="BM">Bermuda</option>
														<option value="BT">Bhutan</option>
														<option value="BO">Bolivia</option>
														<option value="BA">Bosnia and Herzegovina</option>
														<option value="BW">Botswana</option>
														<option value="BV">Bouvet Island</option>
														<option value="BR">Brazil</option>
														<option value="IO">British Indian Ocean Territory</option>
														<option value="VG">British Virgin Islands</option>
														<option value="BN">Brunei</option>
														<option value="BG">Bulgaria</option>
														<option value="BF">Burkina Faso</option>
														<option value="BI">Burundi</option>
														<option value="KH">Cambodia</option>
														<option value="CM">Cameroon</option>
														<option value="CA">Canada</option>
														<option value="CV">Cape Verde</option>
														<option value="BQ">Caribbean Netherlands</option>
														<option value="KY">Cayman Islands</option>
														<option value="CF">Central African Republic</option>
														<option value="TD">Chad</option>
														<option value="CL">Chile</option>
														<option value="CN">China</option>
														<option value="CX">Christmas Island</option>
														<option value="CC">Cocos (Keeling) Islands</option>
														<option value="CO">Colombia</option>
														<option value="KM">Comoros</option>
														<option value="CG">Congo (Brazzaville)</option>
														<option value="CD">Congo (Kinshasa)</option>
														<option value="CK">Cook Islands</option>
														<option value="CR">Costa Rica</option>
														<option value="HR">Croatia</option>
														<option value="CU">Cuba</option>
														<option value="CW">Cura??ao</option>
														<option value="CY">Cyprus</option>
														<option value="CZ">Czech Republic</option>
														<option value="DK">Denmark</option>
														<option value="DJ">Djibouti</option>
														<option value="DM">Dominica</option>
														<option value="DO">Dominican Republic</option>
														<option value="EC">Ecuador</option>
														<option value="EG">Egypt</option>
														<option value="SV">El Salvador</option>
														<option value="GQ">Equatorial Guinea</option>
														<option value="ER">Eritrea</option>
														<option value="EE">Estonia</option>
														<option value="ET">Ethiopia</option>
														<option value="FK">Falkland Islands</option>
														<option value="FO">Faroe Islands</option>
														<option value="FJ">Fiji</option>
														<option value="FI">Finland</option>
														<option value="FR">France</option>
														<option value="GF">French Guiana</option>
														<option value="PF">French Polynesia</option>
														<option value="TF">French Southern Territories</option>
														<option value="GA">Gabon</option>
														<option value="GM">Gambia</option>
														<option value="GE">Georgia</option>
														<option value="DE">Germany</option>
														<option value="GH">Ghana</option>
														<option value="GI">Gibraltar</option>
														<option value="GR">Greece</option>
														<option value="GL">Greenland</option>
														<option value="GD">Grenada</option>
														<option value="GP">Guadeloupe</option>
														<option value="GU">Guam</option>
														<option value="GT">Guatemala</option>
														<option value="GG">Guernsey</option>
														<option value="GN">Guinea</option>
														<option value="GW">Guinea-Bissau</option>
														<option value="GY">Guyana</option>
														<option value="HT">Haiti</option>
														<option value="HM">Heard Island and McDonald Islands</option>
														<option value="HN">Honduras</option>
														<option value="HK">Hong Kong S.A.R., China</option>
														<option value="HU">Hungary</option>
														<option value="IS">Iceland</option>
														<option value="IN">India</option>
														<option value="ID">Indonesia</option>
														<option value="IR">Iran</option>
														<option value="IQ">Iraq</option>
														<option value="IE">Ireland</option>
														<option value="IM">Isle of Man</option>
														<option value="IL">Israel</option>
														<option value="IT">Italy</option>
														<option value="CI">Ivory Coast</option>
														<option value="JM">Jamaica</option>
														<option value="JP">Japan</option>
														<option value="JE">Jersey</option>
														<option value="JO">Jordan</option>
														<option value="KZ">Kazakhstan</option>
														<option value="KE">Kenya</option>
														<option value="KI">Kiribati</option>
														<option value="KW">Kuwait</option>
														<option value="KG">Kyrgyzstan</option>
														<option value="LA">Laos</option>
														<option value="LV">Latvia</option>
														<option value="LB">Lebanon</option>
														<option value="LS">Lesotho</option>
														<option value="LR">Liberia</option>
														<option value="LY">Libya</option>
														<option value="LI">Liechtenstein</option>
														<option value="LT">Lithuania</option>
														<option value="LU">Luxembourg</option>
														<option value="MO">Macao S.A.R., China</option>
														<option value="MK">Macedonia</option>
														<option value="MG">Madagascar</option>
														<option value="MW">Malawi</option>
														<option value="MY">Malaysia</option>
														<option value="MV">Maldives</option>
														<option value="ML">Mali</option>
														<option value="MT">Malta</option>
														<option value="MH">Marshall Islands</option>
														<option value="MQ">Martinique</option>
														<option value="MR">Mauritania</option>
														<option value="MU">Mauritius</option>
														<option value="YT">Mayotte</option>
														<option value="MX">Mexico</option>
														<option value="FM">Micronesia</option>
														<option value="MD">Moldova</option>
														<option value="MC">Monaco</option>
														<option value="MN">Mongolia</option>
														<option value="ME">Montenegro</option>
														<option value="MS">Montserrat</option>
														<option value="MA">Morocco</option>
														<option value="MZ">Mozambique</option>
														<option value="MM">Myanmar</option>
														<option value="NA">Namibia</option>
														<option value="NR">Nauru</option>
														<option value="NP">Nepal</option>
														<option value="NL">Netherlands</option>
														<option value="AN">Netherlands Antilles</option>
														<option value="NC">New Caledonia</option>
														<option value="NZ">New Zealand</option>
														<option value="NI">Nicaragua</option>
														<option value="NE">Niger</option>
														<option value="NG">Nigeria</option>
														<option value="NU">Niue</option>
														<option value="NF">Norfolk Island</option>
														<option value="MP">Northern Mariana Islands</option>
														<option value="KP">North Korea</option>
														<option value="NO">Norway</option>
														<option value="OM">Oman</option>
														<option value="PK">Pakistan</option>
														<option value="PW">Palau</option>
														<option value="PS">Palestinian Territory</option>
														<option value="PA">Panama</option>
														<option value="PG">Papua New Guinea</option>
														<option value="PY">Paraguay</option>
														<option value="PE">Peru</option>
														<option value="PH">Philippines</option>
														<option value="PN">Pitcairn</option>
														<option value="PL">Poland</option>
														<option value="PT">Portugal</option>
														<option value="PR">Puerto Rico</option>
														<option value="QA">Qatar</option>
														<option value="RE">Reunion</option>
														<option value="RO">Romania</option>
														<option value="RU">Russia</option>
														<option value="RW">Rwanda</option>
														<option value="BL">Saint Barth??lemy</option>
														<option value="SH">Saint Helena</option>
														<option value="KN">Saint Kitts and Nevis</option>
														<option value="LC">Saint Lucia</option>
														<option value="MF">Saint Martin (French part)</option>
														<option value="PM">Saint Pierre and Miquelon</option>
														<option value="VC">Saint Vincent and the Grenadines</option>
														<option value="WS">Samoa</option>
														<option value="SM">San Marino</option>
														<option value="ST">Sao Tome and Principe</option>
														<option value="SA">Saudi Arabia</option>
														<option value="SN">Senegal</option>
														<option value="RS">Serbia</option>
														<option value="SC">Seychelles</option>
														<option value="SL">Sierra Leone</option>
														<option value="SG">Singapore</option>
														<option value="SX">Sint Maarten</option>
														<option value="SK">Slovakia</option>
														<option value="SI">Slovenia</option>
														<option value="SB">Solomon Islands</option>
														<option value="SO">Somalia</option>
														<option value="ZA">South Africa</option>
														<option value="GS">South Georgia and the South Sandwich Islands</option>
														<option value="KR">South Korea</option>
														<option value="SS">South Sudan</option>
														<option value="ES">Spain</option>
														<option value="LK">Sri Lanka</option>
														<option value="SD">Sudan</option>
														<option value="SR">Suriname</option>
														<option value="SJ">Svalbard and Jan Mayen</option>
														<option value="SZ">Swaziland</option>
														<option value="SE">Sweden</option>
														<option value="CH">Switzerland</option>
														<option value="SY">Syria</option>
														<option value="TW">Taiwan</option>
														<option value="TJ">Tajikistan</option>
														<option value="TZ">Tanzania</option>
														<option value="TH">Thailand</option>
														<option value="TL">Timor-Leste</option>
														<option value="TG">Togo</option>
														<option value="TK">Tokelau</option>
														<option value="TO">Tonga</option>
														<option value="TT">Trinidad and Tobago</option>
														<option value="TN">Tunisia</option>
														<option value="TR">Turkey</option>
														<option value="TM">Turkmenistan</option>
														<option value="TC">Turks and Caicos Islands</option>
														<option value="TV">Tuvalu</option>
														<option value="VI">U.S. Virgin Islands</option>
														<option value="UG">Uganda</option>
														<option value="UA">Ukraine</option>
														<option value="AE">United Arab Emirates</option>
														<option value="GB">United Kingdom</option>
														<option value="US" selected="selected">United States</option>
														<option value="UM">United States Minor Outlying Islands</option>
														<option value="UY">Uruguay</option>
														<option value="UZ">Uzbekistan</option>
														<option value="VU">Vanuatu</option>
														<option value="VA">Vatican</option>
														<option value="VE">Venezuela</option>
														<option value="VN">Vietnam</option>
														<option value="WF">Wallis and Futuna</option>
														<option value="EH">Western Sahara</option>
														<option value="YE">Yemen</option>
														<option value="ZM">Zambia</option>
														<option value="ZW">Zimbabwe</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="billingCity" class="col-md-2 control-label">City<small class="text-default">*</small></label>
												<div class="col-md-10">
													<input type="text" name="city" class="form-control" id="billingCity" value="City">
												</div>
											</div>
											<div class="form-group">
												<label for="billingPostalCode" class="col-md-2 control-label">Zip Code<small class="text-default">*</small></label>
												<div class="col-md-10">
													<input type="text" name="zipcode" class="form-control" id="billingPostalCode" value="Postal Code">
												</div>
											</div>
										</div>
									</div>
									<div class="space"></div>
									<div class="row">
										<div class="col-lg-3">
											<h3 class="title">Additional Info</h3>
										</div>
										<div class="col-lg-8 col-lg-offset-1">
											<div class="form-group">
												<div class="col-md-12">
													<textarea class="form-control" name="addiInfo" rows="4"></textarea>
												</div>
											</div>
										</div>
									</div>
								
							</fieldset>
							<fieldset>
								<legend>Shipping information</legend>
								
									<div id="shipping-information" class="space-bottom">
										<div class="row">
											<div class="col-lg-3">
												<h3 class="title">Personal Info</h3>
											</div>
											<div class="col-lg-8 col-lg-offset-1">
												<div class="form-group">
													<label for="shippingFirstName" class="col-md-2 control-label">First Name<small class="text-default">*</small></label>
													<div class="col-md-10">
														<input type="text" class="form-control" name="shipFirstName" id="shippingFirstName" value="First Name">
													</div>
												</div>
												<div class="form-group">
													<label for="shippingLastName" class="col-md-2 control-label">Last Name<small class="text-default">*</small></label>
													<div class="col-md-10">
														<input type="text" class="form-control" name="shipLastName" id="shippingLastName" value="Last Name">
													</div>
												</div>
												<div class="form-group">
													<label for="shippingTel" class="col-md-2 control-label">Telephone<small class="text-default">*</small></label>
													<div class="col-md-10">
														<input type="text" class="form-control" name="shipTel" id="shippingTel" value="Telephone">
													</div>
												</div>
												<div class="form-group">
													<label for="shippingFax" class="col-md-2 control-label">Fax</label>
													<div class="col-md-10">
														<input type="text" class="form-control" name="shipFax" id="shippingFax" value="Fax">
													</div>
												</div>
												<div class="form-group">
													<label for="shippingemail" class="col-md-2 control-label">Email<small class="text-default">*</small></label>
													<div class="col-md-10">
														<input type="email" class="form-control" name="shipEmail" id="shippingemail" value="Email@email.com">
													</div>
												</div>
											</div>
										</div>
										<div class="space"></div>
										<div class="row">
											<div class="col-lg-3">
												<h3 class="title">Your Address</h3>
											</div>
											<div class="col-lg-8 col-lg-offset-1">
												<div class="form-group">
													<label for="shippingAddress1" class="col-md-2 control-label">Address 1<small class="text-default">*</small></label>
													<div class="col-md-10">
														<input type="text" class="form-control" name="shipAddr1" id="shippingAddress1" value="Address 1">
													</div>
												</div>
												<div class="form-group">
													<label for="shippingAddress2" class="col-md-2 control-label">Address 2</label>
													<div class="col-md-10">
														<input type="text" class="form-control" name="shipAddr2" id="shippingAddress2" value="Address 2">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Country<small class="text-default">*</small></label>
													<div class="col-md-10">
														<select class="form-control" name="shipCountry">
															<option value="AF">Afghanistan</option>
															<option value="AX">Aland Islands</option>
															<option value="AL">Albania</option>
															<option value="DZ">Algeria</option>
															<option value="AS">American Samoa</option>
															<option value="AD">Andorra</option>
															<option value="AO">Angola</option>
															<option value="AI">Anguilla</option>
															<option value="AQ">Antarctica</option>
															<option value="AG">Antigua and Barbuda</option>
															<option value="AR">Argentina</option>
															<option value="AM">Armenia</option>
															<option value="AW">Aruba</option>
															<option value="AU">Australia</option>
															<option value="AT">Austria</option>
															<option value="AZ">Azerbaijan</option>
															<option value="BS">Bahamas</option>
															<option value="BH">Bahrain</option>
															<option value="BD">Bangladesh</option>
															<option value="BB">Barbados</option>
															<option value="BY">Belarus</option>
															<option value="BE">Belgium</option>
															<option value="BZ">Belize</option>
															<option value="BJ">Benin</option>
															<option value="BM">Bermuda</option>
															<option value="BT">Bhutan</option>
															<option value="BO">Bolivia</option>
															<option value="BA">Bosnia and Herzegovina</option>
															<option value="BW">Botswana</option>
															<option value="BV">Bouvet Island</option>
															<option value="BR">Brazil</option>
															<option value="IO">British Indian Ocean Territory</option>
															<option value="VG">British Virgin Islands</option>
															<option value="BN">Brunei</option>
															<option value="BG">Bulgaria</option>
															<option value="BF">Burkina Faso</option>
															<option value="BI">Burundi</option>
															<option value="KH">Cambodia</option>
															<option value="CM">Cameroon</option>
															<option value="CA">Canada</option>
															<option value="CV">Cape Verde</option>
															<option value="BQ">Caribbean Netherlands</option>
															<option value="KY">Cayman Islands</option>
															<option value="CF">Central African Republic</option>
															<option value="TD">Chad</option>
															<option value="CL">Chile</option>
															<option value="CN">China</option>
															<option value="CX">Christmas Island</option>
															<option value="CC">Cocos (Keeling) Islands</option>
															<option value="CO">Colombia</option>
															<option value="KM">Comoros</option>
															<option value="CG">Congo (Brazzaville)</option>
															<option value="CD">Congo (Kinshasa)</option>
															<option value="CK">Cook Islands</option>
															<option value="CR">Costa Rica</option>
															<option value="HR">Croatia</option>
															<option value="CU">Cuba</option>
															<option value="CW">Cura??ao</option>
															<option value="CY">Cyprus</option>
															<option value="CZ">Czech Republic</option>
															<option value="DK">Denmark</option>
															<option value="DJ">Djibouti</option>
															<option value="DM">Dominica</option>
															<option value="DO">Dominican Republic</option>
															<option value="EC">Ecuador</option>
															<option value="EG">Egypt</option>
															<option value="SV">El Salvador</option>
															<option value="GQ">Equatorial Guinea</option>
															<option value="ER">Eritrea</option>
															<option value="EE">Estonia</option>
															<option value="ET">Ethiopia</option>
															<option value="FK">Falkland Islands</option>
															<option value="FO">Faroe Islands</option>
															<option value="FJ">Fiji</option>
															<option value="FI">Finland</option>
															<option value="FR">France</option>
															<option value="GF">French Guiana</option>
															<option value="PF">French Polynesia</option>
															<option value="TF">French Southern Territories</option>
															<option value="GA">Gabon</option>
															<option value="GM">Gambia</option>
															<option value="GE">Georgia</option>
															<option value="DE">Germany</option>
															<option value="GH">Ghana</option>
															<option value="GI">Gibraltar</option>
															<option value="GR">Greece</option>
															<option value="GL">Greenland</option>
															<option value="GD">Grenada</option>
															<option value="GP">Guadeloupe</option>
															<option value="GU">Guam</option>
															<option value="GT">Guatemala</option>
															<option value="GG">Guernsey</option>
															<option value="GN">Guinea</option>
															<option value="GW">Guinea-Bissau</option>
															<option value="GY">Guyana</option>
															<option value="HT">Haiti</option>
															<option value="HM">Heard Island and McDonald Islands</option>
															<option value="HN">Honduras</option>
															<option value="HK">Hong Kong S.A.R., China</option>
															<option value="HU">Hungary</option>
															<option value="IS">Iceland</option>
															<option value="IN">India</option>
															<option value="ID">Indonesia</option>
															<option value="IR">Iran</option>
															<option value="IQ">Iraq</option>
															<option value="IE">Ireland</option>
															<option value="IM">Isle of Man</option>
															<option value="IL">Israel</option>
															<option value="IT">Italy</option>
															<option value="CI">Ivory Coast</option>
															<option value="JM">Jamaica</option>
															<option value="JP">Japan</option>
															<option value="JE">Jersey</option>
															<option value="JO">Jordan</option>
															<option value="KZ">Kazakhstan</option>
															<option value="KE">Kenya</option>
															<option value="KI">Kiribati</option>
															<option value="KW">Kuwait</option>
															<option value="KG">Kyrgyzstan</option>
															<option value="LA">Laos</option>
															<option value="LV">Latvia</option>
															<option value="LB">Lebanon</option>
															<option value="LS">Lesotho</option>
															<option value="LR">Liberia</option>
															<option value="LY">Libya</option>
															<option value="LI">Liechtenstein</option>
															<option value="LT">Lithuania</option>
															<option value="LU">Luxembourg</option>
															<option value="MO">Macao S.A.R., China</option>
															<option value="MK">Macedonia</option>
															<option value="MG">Madagascar</option>
															<option value="MW">Malawi</option>
															<option value="MY">Malaysia</option>
															<option value="MV">Maldives</option>
															<option value="ML">Mali</option>
															<option value="MT">Malta</option>
															<option value="MH">Marshall Islands</option>
															<option value="MQ">Martinique</option>
															<option value="MR">Mauritania</option>
															<option value="MU">Mauritius</option>
															<option value="YT">Mayotte</option>
															<option value="MX">Mexico</option>
															<option value="FM">Micronesia</option>
															<option value="MD">Moldova</option>
															<option value="MC">Monaco</option>
															<option value="MN">Mongolia</option>
															<option value="ME">Montenegro</option>
															<option value="MS">Montserrat</option>
															<option value="MA">Morocco</option>
															<option value="MZ">Mozambique</option>
															<option value="MM">Myanmar</option>
															<option value="NA">Namibia</option>
															<option value="NR">Nauru</option>
															<option value="NP">Nepal</option>
															<option value="NL">Netherlands</option>
															<option value="AN">Netherlands Antilles</option>
															<option value="NC">New Caledonia</option>
															<option value="NZ">New Zealand</option>
															<option value="NI">Nicaragua</option>
															<option value="NE">Niger</option>
															<option value="NG">Nigeria</option>
															<option value="NU">Niue</option>
															<option value="NF">Norfolk Island</option>
															<option value="MP">Northern Mariana Islands</option>
															<option value="KP">North Korea</option>
															<option value="NO">Norway</option>
															<option value="OM">Oman</option>
															<option value="PK">Pakistan</option>
															<option value="PW">Palau</option>
															<option value="PS">Palestinian Territory</option>
															<option value="PA">Panama</option>
															<option value="PG">Papua New Guinea</option>
															<option value="PY">Paraguay</option>
															<option value="PE">Peru</option>
															<option value="PH">Philippines</option>
															<option value="PN">Pitcairn</option>
															<option value="PL">Poland</option>
															<option value="PT">Portugal</option>
															<option value="PR">Puerto Rico</option>
															<option value="QA">Qatar</option>
															<option value="RE">Reunion</option>
															<option value="RO">Romania</option>
															<option value="RU">Russia</option>
															<option value="RW">Rwanda</option>
															<option value="BL">Saint Barth??lemy</option>
															<option value="SH">Saint Helena</option>
															<option value="KN">Saint Kitts and Nevis</option>
															<option value="LC">Saint Lucia</option>
															<option value="MF">Saint Martin (French part)</option>
															<option value="PM">Saint Pierre and Miquelon</option>
															<option value="VC">Saint Vincent and the Grenadines</option>
															<option value="WS">Samoa</option>
															<option value="SM">San Marino</option>
															<option value="ST">Sao Tome and Principe</option>
															<option value="SA">Saudi Arabia</option>
															<option value="SN">Senegal</option>
															<option value="RS">Serbia</option>
															<option value="SC">Seychelles</option>
															<option value="SL">Sierra Leone</option>
															<option value="SG">Singapore</option>
															<option value="SX">Sint Maarten</option>
															<option value="SK">Slovakia</option>
															<option value="SI">Slovenia</option>
															<option value="SB">Solomon Islands</option>
															<option value="SO">Somalia</option>
															<option value="ZA">South Africa</option>
															<option value="GS">South Georgia and the South Sandwich Islands</option>
															<option value="KR">South Korea</option>
															<option value="SS">South Sudan</option>
															<option value="ES">Spain</option>
															<option value="LK">Sri Lanka</option>
															<option value="SD">Sudan</option>
															<option value="SR">Suriname</option>
															<option value="SJ">Svalbard and Jan Mayen</option>
															<option value="SZ">Swaziland</option>
															<option value="SE">Sweden</option>
															<option value="CH">Switzerland</option>
															<option value="SY">Syria</option>
															<option value="TW">Taiwan</option>
															<option value="TJ">Tajikistan</option>
															<option value="TZ">Tanzania</option>
															<option value="TH">Thailand</option>
															<option value="TL">Timor-Leste</option>
															<option value="TG">Togo</option>
															<option value="TK">Tokelau</option>
															<option value="TO">Tonga</option>
															<option value="TT">Trinidad and Tobago</option>
															<option value="TN">Tunisia</option>
															<option value="TR">Turkey</option>
															<option value="TM">Turkmenistan</option>
															<option value="TC">Turks and Caicos Islands</option>
															<option value="TV">Tuvalu</option>
															<option value="VI">U.S. Virgin Islands</option>
															<option value="UG">Uganda</option>
															<option value="UA">Ukraine</option>
															<option value="AE">United Arab Emirates</option>
															<option value="GB">United Kingdom</option>
															<option value="US" selected="selected">United States</option>
															<option value="UM">United States Minor Outlying Islands</option>
															<option value="UY">Uruguay</option>
															<option value="UZ">Uzbekistan</option>
															<option value="VU">Vanuatu</option>
															<option value="VA">Vatican</option>
															<option value="VE">Venezuela</option>
															<option value="VN">Vietnam</option>
															<option value="WF">Wallis and Futuna</option>
															<option value="EH">Western Sahara</option>
															<option value="YE">Yemen</option>
															<option value="ZM">Zambia</option>
															<option value="ZW">Zimbabwe</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label for="shippingCity" class="col-md-2 control-label">City<small class="text-default">*</small></label>
													<div class="col-md-10">
														<input type="text" class="form-control" name="shipCity" id="shippingCity" value="City">
													</div>
												</div>
												<div class="form-group">
													<label for="shippingPostalCode" class="col-md-2 control-label">Zip Code<small class="text-default">*</small></label>
													<div class="col-md-10">
														<input type="text" class="form-control" id="shippingPostalCode" value="Postal Code" name="shipZipCode">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="checkbox padding-top-clear">
										<label>
											<input type="checkbox" name="shipSameBill" id="shipping-info-check" checked> My Shipping information is the same as my Billing information.
										</label>
									</div>
								
							</fieldset>
							<fieldset>
								<legend>Promocode</legend>
								<div class="padding-top-clear">
										<label>
												<div class="form-group">
													<label for="promocode" class="col-md-2 control-label"></label>
													<div class="col-md-10">
														<input type="text" class="form-control" id="promocode"  name="promocode" placeholder='Enter Promocode, if any'>
													</div>
												</div>
										</label>
									</div>
							</fieldset>
							<fieldset>
								<legend>Payment Method</legend>
								<div class="padding-top-clear">
										<label>
											
											<!-- <input type="radio" name="payment_method" value="ipay88" /> ipay88 -->
											<input type="radio" name="payment_method" value="rms" checked/> rms
										</label>
									</div>
							</fieldset>
							<div class="text-right">	
								<a href="<?=base_url('cart')?>" class="btn btn-group btn-default"><i class="icon-left-open-big"></i> Go Back To Cart</a>
								<button type="submit" class="btn btn-group btn-default">Next Step <i class="icon-right-open-big"></i></button>
							</div>
							</form>

						</div>
						<!-- main end -->

					</div>
				</div>
			</section>
			<!-- main-container end -->

			