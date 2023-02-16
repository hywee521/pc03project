<?php
class Rms extends CI_Controller {

    private $data = array();
    
    public function __construct(){
        parent::__construct();

        $sid		= $this->session->get_sessionID();
		$this->load->model("Cart_model");

		$cartList = $this->Cart_model->get_where(array(
			'sid' => $sid,
			'is_deleted' => 0,
		));

        $merchantID = "SB_i-tea";
        $this->data['merchantID'] = $merchantID;
		$this->data['endpoint'] = "https://sandbox.merchant.razer.com/RMS/pay/".$merchantID."/";
		$this->data['verifyKey'] = "aca98125043dfda0aa1178e0a72175b0";
		$this->data['secretKey'] = "cd256670cc2ff18d7c2992c7e6109ef4";
		
		$this->data['cartList'] = $cartList;

		$is_login = $this->session->userdata("is_login");

		if(!$is_login) {
			$this->data['is_login'] = false;
		} else {
			$this->data['is_login'] = true;
		}

    }


    public function checkout_payment_rms($order_id) {

        $this->load->model('Purchase_order_model');
		$this->load->model('Purchase_order_details_model');

		$poData = $this->Purchase_order_model->getOne(array(
			'id' => $order_id,
			'pay_status' => 0,
			'is_deleted' => 0,
		));

		if(empty($poData)) {
			show_error("This Purchase order is not exists");
		}

		$poDetails = $this->Purchase_order_details_model->get_where(array(
			'order_id' => $order_id,
			'is_deleted' => 0,
		));

		$productDesc = [];
		if(!empty($poDetails)) {
			foreach($poDetails as $v) {
				$productDesc[] = $v['title'];
			}
		}

		

		$this->data['poData'] = $poData;


    
        $this->data['amount'] = $poData['total_amount'];
        $this->data['orderid'] = $poData['order_serial'];
        $this->data['bill_name'] = $poData['firstName']." ".$poData['lastName'];
        $this->data['bill_email'] = $poData['email'];
        $this->data['bill_mobile'] = $poData['tel'];
        $this->data['bill_desc'] = substr(implode(",",$productDesc),0,100);
        $this->data['country'] = "MY";

        $this->data['returnurl'] = base_url('checkout_completed_rms/'.$order_id);
        $this->data['cancelurl'] = base_url('checkout_retry_rms/'.$order_id);
        $this->data['callbackurl'] = base_url('checkout_callback_rms');

        $vcode = md5($this->data['amount'].$this->data['merchantID'].$this->data['orderid'].$this->data['verifyKey']);

        /*
        $amount = “27.60”;
$merchantID = “ACME”;
$orderid = “OD8842”;
$verifykey = “xxxxxxxxxxxxxxxxxx”;
// Replace xxxxxxxxxxxxxxxxxx with your Verify Key
// vcode formula
$vcode = md5( $amount.$merchantID.$orderid.$verifykey );
// output of the vcode based on above information equals to :
$vcode = “ec7f2c6e85769728a5e9b75893ee6bc1”;
        */

        $this->data['vcode'] = $vcode;



		$this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/checkout_payment_rms', $this->data);
		$this->load->view('frontend/footer', $this->data);


    }

    public function checkout_callback_rms(){

        try{			
			
			$vkey       =  $this->data['secretKey'] ; 
			//print_r( $vkey);exit;
			$_POST['treq'] = 1;
			$tranID     = $_POST['tranID'];
			$orderid    = $_POST['orderid'];
			$status     = $_POST['status'];
			$domain     = $_POST['domain'];
			$amount     = $_POST['amount'];
			$currency   = $_POST['currency'];
			$appcode    = $_POST['appcode'];
			$paydate    = $_POST['paydate'];
			$skey       = $_POST['skey'];
		   // All undeclared variables below are coming from POST method
			$key0 = md5( $tranID.$orderid.$status.$domain.$amount.$currency );
			$key1 = md5( $paydate.$domain.$key0.$appcode.$vkey );
			$_POST['key1'] = $key1;
		 
			if( $skey != $key1 ){ 
				
				$status= -1;
				throw new Exception($key1." verify error Payment Fail");
			} // invalid transaction

			
			if ( $status == "00" ){
				$code = explode("-",$orderid);
				$this->load->model("Purchase_order_model");

				$this->Purchase_order_model->update([
					'id' => $code[0]
				], [
					'pay_status' => 1,
					'modified_date' => date("Y-m-d H:i:s")
				]);                
                //update payment status

			}else{
				throw new Exception("Payment Fail");
			}
			return true;
			
		} catch (Exception $e) {
			//Send Email
			$html = $e->getMessage();
			return false;
		}		


    }

    public function checkout_retry_rms($order_id){

		$this->load->model("Purchase_order_model");

		$poData = $this->Purchase_order_model->getOne(array(
			'pay_status' => 0,
			'id' => $order_id,			
			'is_deleted' => 0,
		));

		if(empty($poData)) {
			show_error("This Purchase order is not exists");
		} else {

			$this->Purchase_order_model->update(array(
				'id' => $order_id,	
			), array(
				'order_serial' => date("YmdHis").rand(100,999),
				'modified_date' => date("Y-m-d H:i:s"),
			));

		}

		redirect(base_url('checkout_payment_rms/'.$order_id));



    }
    
    //last step
	public function checkout_completed_rms($order_id){

		$this->load->model("Purchase_order_model");

		$poData = $this->Purchase_order_model->getOne(array(
			'id' => $order_id,			
			'is_deleted' => 0,
		));

		if(empty($poData)) {
			show_error("This Purchase order is not exists");
		}

		$this->data['poData'] = $poData;

		$this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/checkout_completed_rms', $this->data);
		$this->load->view('frontend/footer', $this->data);

	}

}
?>