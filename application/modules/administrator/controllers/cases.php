<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cases extends Admin_Controller {
	public $data = null;

	public function __construct() {
		parent::__construct();
		$this->load->library('Sendgrid');
		if(!$this->session->userdata('admin_session')){
			redirect(base_url(), 'refresh');
		}
	
		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	}

	public function index(){
		
		// table name
		$table_name = 'ticket_system';
		
		//$data = $this->session->userdata("admin_session")["admin_id"];
		//$result  = $this->common->getRecordOrderTicket($data);

		$result  = $this->common->getRecordOrderTicketByAdmin();
		
		$data = "";
		foreach($result as $key){
			$data[] = $key; 
		
		}
		$data['result'] = $data;
	
		$this->layout->title('Ticket | Hubway');
		$this->layout->view('ticketdetailadmin', $data);
		
	}
	
	public function addTicket(){
		
		$this->layout->title('Ticket | Hubway');
		$this->layout->view('addTicketDetailsadmin', $this->data);
	
	}
	
	public function addTicketSave(){

		
		$this->session->userdata("admin_session")["admin_id"];
		
		if(!empty($this->input->post('priority') && $this->input->post('category') && $this->input->post('subject') && $this->input->post('body'))){
			
			// table name
			$table_name1 = 'ticket_system';
			$table_name2 = 'ticket_sytem_log';
			$name = "HUBTKT100";
			
			
			$data1 = array(
				'priority_id'=>$this->input->post('priority'),
				'user_id'=>$this->session->userdata("admin_session")["admin_id"],
				'category_id'=>$this->input->post('category'),
				'subject'=>$this->input->post('subject'),
				'status' =>'0'
			);

			$lastInsertid1 = $this->common->saveRecord($table_name1, $data1);
			
			$data3 = array(
				'ticketID'=> "HUBTKT100".+$lastInsertid1
			);
			$where = array(
				'ticket_system_id'=>$lastInsertid1
			);
			
			$saveTicketID = $this->common->updateRecord($table_name1, $data3 , $where);
			
			$data2 = array(
				'ticket_system_id'=>$lastInsertid1,
				'ticketID'=> "HUBTKT100".+$lastInsertid1,
				'user_id'=>$this->session->userdata("admin_session")["admin_id"],
				'ticket_txt'=>$this->input->post('body'),
				'date_time_entered' =>date('d-m-Y H:i:s')
			);
			$lastInsertid2 = $this->common->saveRecord($table_name2, $data2);
			
			
			$encoded = urlencode( base64_encode( $lastInsertid1 ) );
			
			
			echo $encoded;
			
		} else {
			
			echo 1;
		}
	}
	
	
	
	public function supportThreads(){
		$str = $this->uri->segment(4);
		$decoded = base64_decode( urldecode( $str ) );
		if($decoded){
			
			$table_name = 'ticket_sytem_log';
			$data = array(
				'ticket_system_id' =>$decoded
			);	
			
			$getData  = $this->common->getRecord($table_name, $data);
			$data['result'] 	= @$getData;
			$data['ticketID'] 	= @$getData[0]->ticketID;
			
			
			$table_name1 = 'ticket_system';
			$data1 = array(
				'ticket_system_id' =>$decoded
			);	
			$result  = $this->common->getRecord($table_name1, $data1);

			$data['subject'] 	= @$result[0]->subject;
			$data['status'] 	= @$result[0]->status;
			$data['email'] 		= @$result[0]->email;
			$data['phone'] 		= @$result[0]->phone;
			$data['category_id'] 		= @$result[0]->category_id;
			$data['priority_id'] 		= @$result[0]->priority_id;

			$table_name3 = 'user';
			$data3 = array(
				'id' =>$getData[0]->user_id
			);	

			$result1  = $this->common->getRecord($table_name3, $data3);	
			$data['firstname'] 	= $result1[0]->firstname;
			$data['lastname'] 	= $result1[0]->lastname;
			
			

	
			
			$this->layout->title('Ticket | Hubway');
			$this->layout->view('supportThreadadmin', $data);
	
		} else {
			$data['result'] = 'Nomessage';
			
			$this->layout->title('Ticket | Hubway');
			$this->layout->view('supportThreadadmin', $data);	
		}

		
	}
	
	public function addChatTicketSave(){
	
		if(!empty($this->input->post('ticket_system_id') && $this->input->post('body') && $this->input->post('user_id'))){
			
			// table name
			$table_name2 = 'ticket_sytem_log';
			
			$data1 = array(
				'user_id'=>$this->session->userdata("admin_session")["admin_id"],
				'ticket_system_id'=>$this->input->post('ticket_system_id'),
				'ticketID'=>$this->input->post('ticketID'),
				'ticket_txt'=>$this->input->post('body'),
				'date_time_entered' =>date('d-m-Y H:i:s')
			);

			$lastInsertSaveRecord = $this->common->saveRecord($table_name2, $data1);
			
			$table_name3 = 'user';
			$data3 = array(
				'id' =>$this->input->post('user_id')
			);	

			$result1  = $this->common->getRecord($table_name3, $data3);	
			
			
			
			
			/*$email 		= $result1[0]->email;
			$subject	 = 'Welcome to Hubway';
			$from = 'Hubway';			
			if($email){

				$data['HUB']		= $this->input->post('ticketID');
				$data['firstname'] 	= $result1[0]->firstname;
				$data['lastname'] 	= $result1[0]->lastname;
				$data['encoded']    = urlencode( base64_encode( $this->input->post('ticket_system_id') ) );
	
				$this->load->library('email');
				$to = $email;
				$subject 	= 'Response on Case #'.$this->input->post('ticketID');
				$message    =  $this->load->view('admin_reply',$data, true);
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
				$headers .= 'From: Hubway <Hubway@Hubway.com>' . "\r\n";
				$headers .= 'Reply-To: Hubway@Hubway.com' . "\r\n";
				mail($to,$subject,$message,$headers);

			}*/
			
			
			$data['HUB']		= $this->input->post('ticketID');
			$data['firstname'] 	= $result1[0]->firstname;
			$data['lastname'] 	= $result1[0]->lastname;
			$data['encoded']    = urlencode( base64_encode( $this->input->post('ticket_system_id') ) );
			
			$to = $result1[0]->email;
			$json_string = array('to' => array($to));
			$subject 	= 'Response on Case #'.$this->input->post('ticketID');
			$text = '';
			$message    =  $this->load->view('admin_reply',$data, true);
			$from = 'From: Hubway <Hubway@Hubway.com>' . "\r\n";
			$this->sendgrid->sendmail($to, $json_string, $subject, $text, $message, $from);
			
			echo 0;
			
		} else {
			
			echo 1;
		}
		
	}
	
	public function updateStatusTicket(){ 
		$table_name = 'ticket_system';
		
		$data = array(
			'status'=> '1'
		);
		$where = array(
			'ticketID'=>$_POST['ticketid']
		);
		
		$saveTicketID = $this->common->updateRecord($table_name, $data , $where);
		
		$row  = $this->common->getRecord($table_name, $data , $where);
		
		
		$table_name3 = 'user';
		$data3 = array(
			'id' =>$row[0]->user_id
		);	

		$result1  = $this->common->getRecord($table_name3, $data3);
		
		
		/*$email 			= $result1[0]->email;
		$subject	 	= 'Resolved::Case #'.$_POST["ticketid"].' Marked as resolved';
		$from 			= 'Hubway';			
		if($email){

			$data['HUB']		= $_POST['ticketid'];
			$data['firstname'] 	= $result1[0]->firstname;
			$data['lastname'] 	= $result1[0]->lastname;
			$data['encoded']    = urlencode( base64_encode( $row[0]->ticket_system_id ) );

			$this->load->library('email');
			$to = $email;
			$subject 	= 'Resolved::Case #'.$_POST["ticketid"].'Marked as resolved';
			$message    =  $this->load->view('close_ticket',$data, true);
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			$headers .= 'From: Hubway <Hubway@Hubway.com>' . "\r\n";
			$headers .= 'Reply-To: Hubway@Hubway.com' . "\r\n";
			mail($to,$subject,$message,$headers);
			
 
		}*/
		
		$data['HUB']		= $_POST['ticketid'];
		$data['firstname'] 	= $result1[0]->firstname;
		$data['lastname'] 	= $result1[0]->lastname;
		$data['encoded']    = urlencode( base64_encode( $row[0]->ticket_system_id ) );
		
		$to = $result1[0]->email;
		$json_string = array('to' => array($to));
		$subject 	= 'Resolved::Case #'.$_POST["ticketid"].' Marked as resolved';
		$text = '';
		$message    =  $this->load->view('close_ticket',$data, true);
		$from = 'From: Hubway <Hubway@Hubway.com>' . "\r\n";
		$this->sendgrid->sendmail($to, $json_string, $subject, $text, $message, $from);
		
		echo 1;
	}

	
	public function updateStatusTicketActive(){
		$table_name = 'ticket_system';
		$table_name2 = 'ticket_sytem_log';
		$data = array(
			'status'=> '0'
		);
		$data2 = array(
			'ticketID'=>$_POST['ticketid']
		);
		$where = array(
			'ticketID'=>$_POST['ticketid']
		);
		
		$saveTicketID = $this->common->updateRecord($table_name, $data , $where);
		
		
		$row  = $this->common->getRecord($table_name2, $data2 , $where);
		
		
		$table_name3 = 'user';
		$data3 = array(
			'id' =>$row[0]->user_id
		);	

		$result1  = $this->common->getRecord($table_name3, $data3);
		

		/*$email 			= $result1[0]->email;;
		$subject	 	= 'Resolved::Case #'.$_POST["ticketid"].' Marked as resolved';
		$from 			= 'Hubway';			
		if($email){

			$data['HUB']		= $_POST['ticketid'];
			$data['firstname'] 	= $result1[0]->firstname;
			$data['lastname'] 	= $result1[0]->lastname;
			$data['encoded']    = urlencode( base64_encode( $row[0]->ticket_system_id ) );

			$this->load->library('email');
			$to = $email;
			$subject 	= 'Reopened:: Case #'.$_POST["ticketid"].'Re-opened';
			$message    =  $this->load->view('reopen_reply',$data, true);
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			$headers .= 'From: Hubway <Hubway@Hubway.com>' . "\r\n";
			$headers .= 'Reply-To: Hubway@Hubway.com' . "\r\n";
			mail($to,$subject,$message,$headers);
 
		}*/
		
		
		$data['HUB']		= $_POST['ticketid'];
		$data['firstname'] 	= $result1[0]->firstname;
		$data['lastname'] 	= $result1[0]->lastname;
		$data['encoded']    = urlencode( base64_encode( $row[0]->ticket_system_id ) );
			
		$to = $result1[0]->email;
		$json_string = array('to' => array($to));
		$subject 	= 'Reopened:: Case #'.$_POST["ticketid"].' Re-opened';
		$text = '';
		$message    =  $this->load->view('reopen_reply',$data, true);
		$from = 'From: Hubway <Hubway@Hubway.com>' . "\r\n";
		$this->sendgrid->sendmail($to, $json_string, $subject, $text, $message, $from);
		
		
		echo 1;
	}
	
}

/* End of file warehouse.php */
/* Location: ./application/controllers/warehouse.php */