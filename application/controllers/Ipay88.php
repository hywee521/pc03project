<?php
class Ipay88 extends CI_Controller {

    private $data = [];

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
        
        $this->data['MerchantCode'] = "M06919";
        $this->data['MerchantKey'] = "oIGuAJiXEv";

    }


    public function iPay88_signature($source)
	{
	  return base64_encode($this->hex2bin(sha1($source)));
	}


	private function hex2bin($hexSource)
	{		
		 $bin = "";
			for ($i=0;$i<strlen($hexSource);$i=$i+2)
			{
			  $bin .= chr(hexdec(substr($hexSource,$i,2)));
			}
		  return $bin;
	} 

    public function checkout_payment_ipay88($po_id){

        $this->load->model("Purchase_order_model");

        $poData = $this->Purchase_order_model->getOne([
            'id'         => $po_id,
            'pay_status' => 0,
            'is_deleted' => 0,
        ]);

        if(empty($poData)) {
            show_error("This Purchase Order is not exists");
        }

        $this->data['poData'] = $poData;


        //Generata Signature
        $amount = str_replace(".", "", $poData['total_amount']);
        $signature = $this->data['MerchantKey'].$this->data['MerchantCode'].$poData['order_serial'].$amount."MYR";
        //$signature = $this->iPay88_signature($signature);
        $signature = hash('sha256', $signature);

        $this->data['signature'] = $signature;


        $this->load->view("frontend/header", $this->data);
        $this->load->view("frontend/checkout_payment_ipay88", $this->data);
        $this->load->view("frontend/footer", $this->data);



    }


    public function checkout_completed_ipay88($po_id) {

        $this->load->model("Purchase_order_model");

        $poData = $this->Purchase_order_model->getOne(array(
			'id' => $po_id,			
			'is_deleted' => 0,
		));

		if(empty($poData)) {
			show_error("This Purchase order is not exists");
		}

		$this->data['poData'] = $poData;

		$this->load->view('frontend/header', $this->data);
		$this->load->view('frontend/checkout_completed_ipay88', $this->data);
		$this->load->view('frontend/footer', $this->data);



    }

    public function checkout_callback_ipay88() {

        $merchantcode = $_REQUEST["MerchantCode"];
		$paymentid = $_REQUEST["PaymentId"];
		$refno = $_REQUEST["RefNo"];
		$amount = $_REQUEST["Amount"];
		$ecurrency = $_REQUEST["Currency"];
		$remark = $_REQUEST["Remark"];
		$transid = $_REQUEST["TransId"];
		$authcode = $_REQUEST["AuthCode"];
		$estatus = $_REQUEST["Status"];
		$errdesc = $_REQUEST["ErrDesc"];
        $signature = $_REQUEST["Signature"];	
        
        $amount = str_replace(".", "", $amount);        

        $mysignature = hash('sha256', $this->data['MerchantKey'].$merchantcode.$paymentid.$refno.$amount.$ecurrency.$estatus);

        if($signature == $mysignature) {

            $this->load->model("Purchase_order_model");
            
            $this->Purchase_order_model->update([
                'order_serial' => $refno,
            ],[
                'pay_status' => 1,
                'modified_date' => date("Y-m-d H:i:s"),
            ]);
            echo "RECEIVEOK";

        } else {
            echo "Signature Not OK";
        }



        
    }

    public function checkout_retry_ipay88($po_id) {

        $this->load->model("Purchase_order_model");

		$poData = $this->Purchase_order_model->getOne(array(
			'pay_status' => 0,
			'id' => $po_id,			
			'is_deleted' => 0,
		));

		if(empty($poData)) {
			show_error("This Purchase order is not exists");
		} else {

			$this->Purchase_order_model->update(array(
				'id' => $po_id,	
			), array(
				'order_serial' => date("YmdHis").rand(100,999),
				'modified_date' => date("Y-m-d H:i:s"),
			));

		}

		redirect(base_url('checkout_payment_ipay88/'.$po_id));

    }


}
?>