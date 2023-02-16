<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	private $data = array();

	public function __construct(){

		parent::__construct();

		$sid		= $this->session->get_sessionID();
		$this->load->model("Cart_model");

		$cartList = $this->Cart_model->get_where(array(
			'sid' => $sid,
			'is_deleted' => 0,
		));

		$this->data['cartList'] = $cartList;

		$is_login = $this->session->userdata("is_login");

		if(!$is_login) {
			$this->data['is_login'] = false;
		} else {
			$this->data['is_login'] = true;
		}

	}
	// public function index($product_id=1, $product_name=''){		

	// 	$this->load->model("Product_model");

	// 	//SELECT * FROM products WHERE id = '$product_id'
	// 	$productData = $this->Product_model->getOne(array(
	// 		'id' => $product_id,
	// 	));

		
	// 	$this->data['productData'] = $productData;

	// 	$this->load->view('frontend/header', $this->data);
	// 	$this->load->view('frontend/product-detail', $this->data);
	// 	$this->load->view('frontend/footer', $this->data);
	// }



	public function index($page=1)
	{

		$this->load->model("Product_model");

		//how many records this table have
		$total_data = $this->Product_model->record_count();

		//how many data per page
		$limit = 8;

		//how many pages we have
		// 2.5 => 3
		// 3.1 => 4
		$total_pages = ceil($total_data / $limit);

		$start = ($page - 1) * $limit;

		$productList = $this->Product_model->fetch($start, $limit);

		//echo $this->db->last_query();
		//exit;


		$this->load->library('pagination');

		$config['base_url'] = base_url().'/';
		$config['total_rows'] = $total_data;
		$config['per_page'] = $limit;


		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';


		$this->pagination->initialize($config);

		$links = $this->pagination->create_links();

		
		$this->data['productList'] = $productList;
		$this->data['page'] = $page;
		$this->data['total_pages'] = $total_pages;
		$this->data['links'] = $links;

		$this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/index', $this->data);
		$this->load->view('frontend/footer', $this->data);
	}

	public function about(){

		$this->load->view('header');
		$this->load->view('about');
	}

	public function products(){

		$this->load->view('header');
		$this->load->view('products');
	}

	public function product_detail($product_id, $product_name){		

		$this->load->model("Product_model");

		//SELECT * FROM products WHERE id = '$product_id'
		$productData = $this->Product_model->getOne(array(
			'id' => $product_id,
		));

		
		$this->data['productData'] = $productData;

		$this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/product-detail', $this->data);
		$this->load->view('frontend/footer', $this->data);
	}

	public function addcart(){

		$product_id = $this->input->post("product_id", true);
		$qty 		= $this->input->post("qty", true);
		$sid		= $this->session->get_sessionID();

		//echo $sid;
		//exit;

		$this->load->model("Cart_model");
		$this->load->model("Product_model");

		$cartExist = $this->Cart_model->getOne(array(
			'sid' => $sid,
			'product_id' => $product_id,
			'is_deleted' => 0,
		));
		//this product is not yet inside the cart
		if(empty($cartExist)) {

			//we get product price and title from our own database
			$productData = $this->Product_model->getOne(array(
				'id' => $product_id,
			));

			$product_title = $productData['title'];
			$product_price = $productData['price'];


			// INSERT INTO cart (sid, product_id, product_title, product_price, qty, created_date) VALUES ('$sid','$product_id','$product_title','$product_price','$qty','date("Y-m-d H:i:s'));
			$this->Cart_model->insert(array(
				'sid' => $sid,
				'product_id' => $product_id,
				'product_title' => $product_title,
				'product_price' => $product_price,
				'qty' => $qty,
				'created_date' => date("Y-m-d H:i:s"),
			));

		//it is inside the cart
		} else {

			$this->Cart_model->update(array(
				'id' => $cartExist['id'],
			),array(
				'qty' => ($cartExist['qty']+$qty),
				'modified_date' => date("Y-m-d H:i:s"),
			));


		}

		redirect(base_url('cart'));
	
	}

	public function cart(){

		$this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/cart', $this->data);
		$this->load->view('frontend/footer', $this->data);

	}	

	public function checkout(){

		$this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/checkout', $this->data);
		$this->load->view('frontend/footer', $this->data);

	}

	//To generate a purchase order, but with pay_status = 0 (unpaid)
	//And bring user to payment page directly
	public function checkout_submit(){
		
		$firstName = $this->input->post('firstName', true);
		$lastName = $this->input->post('lastName', true);
		$tel = $this->input->post('tel', true);
		$fax = $this->input->post('fax', true);
		$email = $this->input->post('email', true);
		$addr1 = $this->input->post('addr1', true);
		$addr2 = $this->input->post('addr2', true);
		$country = $this->input->post('country', true);
		$city = $this->input->post('city', true);
		$zipcode = $this->input->post('zipcode', true);
		$addiInfo = $this->input->post('addiInfo', true);
		$shipFirstName = $this->input->post('shipFirstName', true);
		$shipLastName = $this->input->post('shipLastName', true);
		$shipTel = $this->input->post('shipTel', true);
		$shipFax = $this->input->post('shipFax', true);
		$shipEmail = $this->input->post('shipEmail', true);
		$shipAddr1 = $this->input->post('shipAddr1', true);
		$shipAddr2 = $this->input->post('shipAddr2', true);
		$shipCountry = $this->input->post('shipCountry', true);
		$shipCity = $this->input->post('shipCity', true);
		$shipZipCode = $this->input->post('shipZipCode', true);
		$shipSameBill = $this->input->post('shipSameBill', true);
		$payment_method  = $this->input->post('payment_method', true);

		$promocode = $this->input->post('promocode', true);


		if(!empty($shipSameBill)) {

			$shipFirstName = $firstName;
			$shipLastName = $lastName;
			$shipTel = $tel;
			$shipFax = $fax;
			$shipEmail = $email;
			$shipAddr1 = $addr1;
			$shipAddr2 = $addr2;
			$shipCountry = $country;
			$shipCity = $city;
			$shipZipCode = $zipcode;

		}

		$this->load->model('Purchase_order_model');
		$this->load->model('Purchase_order_details_model');

		$order_serial = date("YmdHis").rand(100,999);

		$order_id = $this->Purchase_order_model->insert(array(
			'order_serial' => $order_serial,
			'firstName' => $firstName,
			'lastName'	=> $lastName,
			'tel'		=> $tel,
			'fax'		=> $fax,
			'email'		=> $email,
			'addr1'		=> $addr1,
			'addr2'		=> $addr2,
			'country'	=> $country,
			'city'		=> $city,
			'zipcode'	=> $zipcode,
			'addiInfo'	=> $addiInfo,
			'shipFirstName' => $shipFirstName,
			'shipLastName' => $shipLastName,
			'shipTel'		=> $shipTel,
			'shipFax'		=> $shipFax,
			'shipEmail'		=> $shipEmail,
			'shipAddr1'		=> $shipAddr1,
			'shipAddr2'		=> $shipAddr2,
			'shipCountry'	=> $shipCountry,
			'shipCity'		=> $shipCity,
			'shipZipCode'	=> $shipZipCode,
			'payment_method' => $payment_method,
			'created_date'	=> date("Y-m-d H:i:s"),
		));

		$total_amount = 0;
		if(!empty($this->data['cartList'])) {
			foreach($this->data['cartList'] as $v) {

				$total_amount += ($v['product_price']*$v['qty']);

				$this->Purchase_order_details_model->insert(array(
					'order_id' => $order_id,
					'product_id' => $v['product_id'],
					'title' => $v['product_title'],
					'price' => $v['product_price'],
					'qty' => $v['qty'],
					'created_date'	=> date("Y-m-d H:i:s"),
				));		
			}
		}
		$onePromo = '';
		if(!empty($promocode))
		{
			$this->load->model('Promocode_model');
			$onePromo = $this->Promocode_model->getOne([
				'code' => $promocode,
			]);

			if(!empty($onePromo))
			{
				$total_amount = $total_amount - $onePromo['amount'];
			}
		}
		$this->Purchase_order_model->update(array(
			'id' => $order_id,
		),
		array(
			'total_amount' => $total_amount,
			'modified_date' => date("Y-m-d H:i:s"),
		));

		$sid		= $this->session->get_sessionID();

		$cartList = $this->Cart_model->update(array(
			'sid' => $sid,
		), array(
			'is_deleted' => 1,
			'modified_date' => date("Y-m-d H:i:s"),
		));
		
		if($payment_method == "ipay88") {
			redirect(base_url('checkout_payment_ipay88/'.$order_id));
		} else if ($payment_method == "rms") { 
			redirect(base_url('checkout_payment_rms/'.$order_id));
		}

	}	


	public function register(){


		$this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/register', $this->data);
		$this->load->view('frontend/footer', $this->data);

	}

	public function register_submit(){

		try {

			$fullname = $this->input->post("name", true);
			$email = $this->input->post("email", true);
			$password = $this->input->post("password", true);
			$repassword = $this->input->post("repassword", true);


			if(empty($fullname)) {
				throw new Exception("Your fullname cannot be blank");
			}
			if(empty($email)) {
				throw new Exception("Your email cannot be blank");
			}
			if(empty($password)) {
				throw new Exception("Your password cannot be blank");
			}
			if(empty($repassword)) {
				throw new Exception("Your confirm password cannot be blank");
			}

			if($password != $repassword) {
				throw new Exception("Your password is not same as the confirm password");
			}

			if(strlen($password) < 5) {
				throw new Exception("Your password length must be more than 5");
			}


			$this->load->model("User_model");

			$emailExist = $this->User_model->getOne(array(
				'email' => $email,
				'is_deleted' => 0,				
			));

			if(!empty($emailExist)) {
				throw new Exception("This email has been registered");
			}

			$generatedCode = md5(date("YmdHis").rand(1000,9999));

			$user_id = $this->User_model->insert(array(
				'name' => $fullname,
				'type' => "email",
				'password' => sha1($password),
				'email' => $email,
				'verified' => 1,
				'generatedCode' => $generatedCode,
				'created_date' => date("Y-m-d H:i:s")
 			));

 			// $this->load->library("emailer");

			// $html = "";

			// $html .= "Hi ".$fullname.",<br/><br/>";
			// $html .= "You have receive this email becozs you just registered from PC03W03. Please click the link below for email verification: <br/>";

			// $html .= '<a href="'.base_url('verify/'.$email.'/'.$generatedCode).'">Click Here!</a><br/><br/>';

			// $html .= 'Yours sincerely, <br/>';
			// $html .= "PC03W03";

			// $this->emailer->send($email, "[PC03W03] Email Verification", $html);

			redirect(base_url('register_success'));



		} catch (Exception $e) {

			show_error($e->getMessage());

		}

	}

	public function register_success(){


		$this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/register_success', $this->data);
		$this->load->view('frontend/footer', $this->data);

	}


	public function verify($email, $generatedCode) {

		$this->load->model("User_model");
		$userExists = $this->User_model->getOne(array(
			'email' => $email,
			'generatedCode' => $generatedCode,
			'is_deleted' => 0,
			'verified' => 0,
		));
		if(!empty($userExists)) {

			$this->User_model->update(array(
				'id' => $userExists['id'],
			), array(
				'verified' => 1,
				'modified_date' => date("Y-m-d H:i:s"),
			));

			redirect(base_url('login?msg=verifiedSuccess'));

		} else {

			show_error("This user is not exists or his/her account already verified");

		}


	}

	public function login(){


		$this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/login', $this->data);
		$this->load->view('frontend/footer', $this->data);

	}

	public function login_submit(){

		try {

			$email = $this->input->post("email", true);
			$password = $this->input->post("password", true);



			if(empty($email)) {
				throw new Exception("email cannot be blank");
			}

			if(empty($password)) {
				throw new Exception("password cannot be blank");
			}

			$this->load->model("User_model");
			$userExists = $this->User_model->getOne(array(
				'email' => $email,
				'password' => sha1($password),
				'is_deleted' => 0,
			));			


			if(!empty($userExists)) {				

				if( empty($userExists['verified']) ) {
					throw new Exception("Your email has not been verified");
				}
				$this->session->set_userdata("is_login", true);
				$this->session->set_userdata("email", $email);

				redirect(base_url('profile'));

			} else {

				throw new Exception("Invalid Email or password");

			}




		} catch (Exception $e) {

			$this->data['errormsg'] = $e->getMessage();

			$this->load->view('frontend/header', $this->data);
			$this->load->view('frontend/login', $this->data);
			$this->load->view('frontend/footer', $this->data);

		}



	}

	public function profile(){

		$is_login = $this->session->userdata("is_login");
		$email    = $this->session->userdata("email");

		if(!$is_login) {
			redirect(base_url('login'));
		} else {


			$this->load->model("User_model");
			$userdata = $this->User_model->getOne(array(
				'email' => $email,
			));

			$this->data['userdata']= $userdata;


			$this->load->view('frontend/header', $this->data);
			$this->load->view('frontend/profile', $this->data);
			$this->load->view('frontend/footer', $this->data);

		}

	}

	public function profile_submit(){

		try {

			$name = $this->input->post("name", true);
			$email = $this->input->post("email", true);
			$mobile = $this->input->post("mobile", true);

			$password = $this->input->post("password", true);
			$repassword = $this->input->post("repassword", true);

			if(!empty($password)) {

				if($password != $repassword) {	

					throw new Exception("Password and Confirm Password is not same");

				}

			}

			if(empty($name)) {
				throw new Exception("Name cannot be empty");
			}
			if(empty($email)) {
				throw new Exception("email cannot be empty");
			}

			$this->load->model("User_model");

			$session_email = $this->session->userdata("email");

			$userData = $this->User_model->getOne(array(
				'email' => $session_email,
			));

			$email_verified = $userData['verified'];
			if($userData['email'] != $email) {
				$email_verified = 0;
			}

			$mobile_verified = $userData['mobileVerified'];
			if($userData['mobile'] != $mobile) {
				$mobile_verified = 0;
			}

			$generatedCode = "";
			if($email_verified == 0) {
				$generatedCode = md5(date("YmdHis").rand(1000,9999));
			}
			

			$this->User_model->update(array(
				'email' => $session_email,
			), array(
				'name' => $name,
				'email' => $email,
				'mobile' => $mobile,
				'verified' => $email_verified,
				'generatedCode' => $generatedCode,
				'mobileVerified' => $mobile_verified,
				'modified_date' => date("Y-m-d H:i:s"),
			));

			if($email_verified == 0) {

				$this->load->library("emailer");

				$html = "";

				$html .= "Hi ".$fullname.",<br/><br/>";
				$html .= "You have receive this email becozs you just registered from PC03W03. Please click the link below for email verification: <br/>";

				$html .= '<a href="'.base_url('verify/'.$email.'/'.$generatedCode).'">Click Here!</a><br/><br/>';

				$html .= 'Yours sincerely, <br/>';
				$html .= "PC03W03";

				$this->emailer->send($email, "[PC03W03] Email Verification", $html);

			}

			redirect(base_url('profile?updated=User Profile Updated'));


		} catch (Exception $e) {

			$this->data['errormsg'] = $e->getMessage();
			$this->load->view('frontend/header', $this->data);
			$this->load->view('frontend/profile', $this->data);
			$this->load->view('frontend/footer', $this->data);


		}



	}

	public function forgetpassword(){

		$this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/forgetpassword', $this->data);
		$this->load->view('frontend/footer', $this->data);


	}

	public function forgetpassword_submit(){

		$this->load->model("User_model");

		$email = $this->input->post("email", true);

		$userExist = $this->User_model->getOne(array(
			'email' => $email,
			'verified' => 1,
			'is_deleted' => 0,
		));

		if(!empty($userExist)) {

			//We generate a random string pwdRetrievalCode, expiryDate
			$randomString = sha1(date("YmdHis").rand(1000,9999));
			$expiryDate   = date("Y-m-d H:i:s", time()+3600);

			$this->User_model->update(array(
				'id' => $userExist['id'],
			), array(
				'pwdRetrieavalCode' => $randomString,
				'codeExpiryDate'	   => $expiryDate,
				'modified_date'		=> date("Y-m-d H:i:s"),
			));

			$this->load->library("emailer");

			$html = "";

			$html .= "Hi ".$userExist['name'].",<br/><br/>";
			$html .= "You have receive this email becozs you just trying to reset your password PC03W03. Please click the link below to reset your password: <br/>";

			$html .= '<a href="'.base_url('resetpwd/'.$email.'/'.$randomString).'">Click Here!</a><br/><br/>';

			$html .= 'Yours sincerely, <br/>';
			$html .= "PC03W03";

			$this->emailer->send($email, "[PC03W03] Reset Password", $html);

			$this->data['errormsg'] = "Email sent";

			$this->load->view('frontend/header', $this->data);
			$this->load->view('frontend/forgetpassword', $this->data);
			$this->load->view('frontend/footer', $this->data);


		} else {

			$this->data['errormsg'] = "Invalid Email";

			$this->load->view('frontend/header', $this->data);
			$this->load->view('frontend/forgetpassword', $this->data);
			$this->load->view('frontend/footer', $this->data);


		}



	}

	public function resetpwd($email, $randomString) {

		$this->load->model("User_model");

		$userExists = $this->User_model->getOne(array(
			'email' => $email,
			'pwdRetrieavalCode' => $randomString,
			'codeExpiryDate >=' => date("Y-m-d H:i:s"),
			'is_deleted' => 0,
			'verified' => 1,
		));

		if(!empty($userExists)) {

			$this->data['pwdRetrieavalCode'] = $randomString;
			$this->data['email'] = $email;

			$this->load->view('frontend/header', $this->data);
			$this->load->view('frontend/resetpwd', $this->data);
			$this->load->view('frontend/footer', $this->data);


		} else {

			show_error("Invalid Parameter");

		}

	}

	public function resetpassword_submit(){

		$password = $this->input->post("password", true);
		$repassword = $this->input->post("repassword", true);
		$pwdRetrieavalCode = $this->input->post("pwdRetrieavalCode", true);
		$email = $this->input->post("email", true);


		if(empty($password)) {
			show_error("Password cannot be empty");
		}

		if($password != $repassword) {
			show_error("Password is not same as the confirm password");
		}


		$this->load->model("User_model");

		$userExists = $this->User_model->getOne(array(
			'email' => $email,
			'pwdRetrieavalCode' => $pwdRetrieavalCode,
			'codeExpiryDate >=' => date("Y-m-d H:i:s"),
			'is_deleted' => 0,
			'verified' => 1,
		));

		if(!empty($userExists)) {

			$this->User_model->update(array(
				'id' => $userExists['id'],
			), array(
				'password' => sha1($password),
				'modified_date' => date("Y-m-d H:i:s"),
			));

			redirect(base_url('login?reset=Password Reset Successfully'));

		}





	}


	public function logout(){

		$type = $this->session->userdata("type");

		if($type == "google") {

			$this->session->destroy_session();
			redirect(base_url('logoutGoogle'));

		} else {

			$this->session->destroy_session();
			redirect(base_url('login'));

		}

		
	}

	public function logoutGoogle(){
		$this->load->view("frontend/logoutGoogle");
	}

	public function logoutStep2(){
		$this->session->destroy_session();
		redirect(base_url('login'));
	}

	public function verifyMobile($mobile) {

		try {

			if($this->data['is_login']) {

				$email = $this->session->userdata("email");

				$this->load->model("User_model");

				$userdata = $this->User_model->getOne(array(
					'email' => $email,
					'mobileVerified' => 0,
					'mobile' => $mobile,
				));

				$mobileCode = rand(1000,9999);
				$mobileCodeExpiry = date("Y-m-d H:i:s", time()*24*3600);

				$this->User_model->update(array(
					'email' => $email,
				), array(
					'mobileCode' => $mobileCode,
					'mobileCodeExpiryDate' => $mobileCodeExpiry,
					'modified_date' => date("Y-m-d H:i:s"),
				));


				if(strlen($mobile) < 10 && strlen($mobile) > 11) {
					throw new Exception("Mobile number length invalid");
				}

				$this->load->library("sms");

				///uncomment this if you already have isms username and password
				// and also balance > 0
				//$this->sms->sendSms($mobile, "Your mobile verification code:".$mobileCode, 1);

				echo json_encode(array(
					'status' => "OK",
					'result' => "mobile code sent",
  				));


			} else {

				throw new Exception("You need to login first");
				

			}

		} catch (Exception $e) {

			echo json_encode(array(
				'status' => "ERROR",
				'result' => $e->getMesssage(),				
			));
			
		}


	}


	public function verifyMobileCode($code) {


		try {

			if($this->data['is_login']) {

				$email = $this->session->userdata("email");

				$this->load->model("User_model");

				$userdata = $this->User_model->getOne(array(
					'email' => $email,
					'mobileVerified' => 0,
					'mobileCode' => $code,					
					'mobileCodeExpiryDate >=' => date("Y-m-d H:i:s"),
					'is_deleted' => 0,
					'verified' => 1,
				));

				if(!empty($userdata))  {

					$this->User_model->update(array(
						'email' => $email,
					), array(
						'mobileVerified' => 1,
						'modified_date' => date("Y-m-d H:i:s"),
					));

				}				

				echo json_encode(array(
					'status' => "OK",
					'result' => "verified",
  				));


			} else {

				throw new Exception("You need to login first");
				

			}

		} catch (Exception $e) {

			echo json_encode(array(
				'status' => "ERROR",
				'result' => $e->getMesssage(),				
			));
			
		}


	}


	public function googleLogin() {


		try {

			$name = $this->input->post("name", true);
			$avatar = $this->input->post("avatar", true);
			$email = $this->input->post("email", true);
			$googleID = $this->input->post("googleID", true);
			$googleToken = $this->input->post("googleToken", true);

			$this->load->model("User_model");

			$userdata = $this->User_model->getOne(array(
				'email' => $email,
				'is_deleted' => 0,
			));

			if(empty($userdata)) {

				$this->User_model->insert(array(
					'verified' => 1,
					'type' => "google",
					'name' => $name,
					'avatar' => $avatar,
					'email' => $email,
					'googleID' => $googleID,
					'googleToken' => $googleToken,
					'created_date' => date("Y-m-d"),
				));

			} else {

				$this->User_model->update(array(
					'id' => $userdata['id'],
				),array(
					'verified' => 1,
					'name' => $name,
					'avatar' => $avatar,
					'googleToken' => $googleToken,
					'modified_date' => date("Y-m-d"),
				));

			}

			$this->session->set_userdata("type", "google");
			$this->session->set_userdata("is_login", true);
			$this->session->set_userdata("email", $email);
	

			echo json_encode(array(
					'status' => "OK",
					'result' => "login",
  			));


			

		} catch (Exception $e) {

			echo json_encode(array(
				'status' => "ERROR",
				'result' => $e->getMesssage(),				
			));
			
		}


	}




}
