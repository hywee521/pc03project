<?php
class Emailer {

	private $config = [
        'protocol' => 'smtp',
        'smtp_host' => 'mail.i-tea.com.my',
        'smtp_user' => 'pc03test@i-tea.com.my',
        'smtp_pass' => 'tlrM0e.P)S69',
        'smtp_crypto' => 'tls',
        'newline' => "\r\n", //REQUIRED! Notice the double quotes!
        'smtp_port' => "465",
        'mailtype' => 'html',
        'charset'  => 'utf-8',
        'smtp_timeout' => "30",
    ];

	public function send($to_address, $subject, $content, $bcc="",$replyto="", $attachment=[]){
		
        $CI = &get_instance();
        $CI->load->library('email', $this->config);
        $CI->email->clear(TRUE);
        $CI->email->from('pc03test@i-tea.com.my', "PC03W03");
		$CI->email->to($to_address);
		$CI->email->subject($subject);
        $CI->email->message($content);
		
		if(!empty($bcc)) {
			$CI->email->bcc($bcc);
		}

        if(!empty($replyto)){
            $CI->email->reply_to($replyto);
        }
        
        if (!empty($attachment)) {
            if (is_array($attachment)) {
                foreach ($attachment as $k => $v) {
                    $CI->email->attach($v);
                }
            } else {
                $CI->email->attach($attachment);
            }
        }

		$result = $CI->email->send(false); //1 if success
		return $result;

	}


}

?>