<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyProfileController extends MY_Controller {	public $data = '';
	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('user_session'))
			redirect( base_url(), 'refresh');

		$this->load->model('common_model', 'common'); /* LOADING MODEL */

		$this->load->library('paypal');
	}

	public function index() {		
		$user_id						=		$this->session->userdata('user_session')['id'];

		//Get personol information
		$where							=		array('id'=>$user_id);
		$data['user'] 					= 		$this->common->getSingleRecord('user', $where);

		//Get Bussiness information
		$whereid						=		array('user_id'=>$user_id);
		$data['user_bussiness_info'] 	= 		$this->common->getSingleRecord('business_information', $whereid);
		
		//Get State information
		$whereid						=		@array('id'=>$data['user_bussiness_info']->state);
		$state 							= 		$this->common->getSingleRecord('states', $whereid);
		
		//Get city information
		$whereid						=		@array('id'=>$data['user_bussiness_info']->city);
		$city 							= 		$this->common->getSingleRecord('cities', $whereid);
		
		$data['state'] 					= @$state->name;
		$data['city']					= @$city->name;
		
		
		
		$country 						= 		$this->common->getRecord('countries');
		$data['country']  				= 		$country;

		$data['configData']				= 		$this->config->item('work_on_shipment');
		$this->layout->title('MyProfile | Hubway');
		$this->layout->view('myprofile', $data);
		
		
	}
	
	public function saveMyProfile() {	
		$user_id						=		$this->session->userdata('user_session')['id'];

		if($this->input->post('first_name')){  
			$data						=		array(
													'id'=>$user_id, 
													'firstname'=>$this->input->post('first_name'), 
													'lastname'=>$this->input->post('last_name'), 
													'age'=>$this->input->post('age'), 
													'password'=>md5($this->input->post('new_password'))
												);
									
			if($this->input->post('old_password')!='' && $this->input->post('old_password')!=''){
				$wherepass					=		array(
														'password'=> md5($this->input->post('old_password'))
													);

				$user_recordCount			=		$this->common->getRecordCount('user', $wherepass);
				if($user_recordCount>0){
					$where					=		array('id'=>$user_id);
					$lastinid 				= 		$this->common->updateRecord('user', $data, $where);

					$success				=		array('success'=>'password_updated');
					header('Content-type: application/json');
					echo json_encode($success);
				}else{
					$error					=		array('error'=>'password_not_match');
					header('Content-type: application/json');
					echo json_encode($error);
				}
				
			}			
		}

		if($this->input->post('company_name')){ 
		
			$whereuser				=		array('user_id'=>$user_id);
			$recordCount			=		$this->common->getRecordCount('business_information', $whereuser);

			$data			=		array(
											'user_id'=>$user_id, 
											'company_name'=>$this->input->post('company_name'), 
											'address_line_1'=>$this->input->post('address_line_1'), 
											'address_line_2'=>$this->input->post('address_line_2'), 
											'country'=>$this->input->post('country'), 
											'state'=>$this->input->post('state'), 
											'city'=>$this->input->post('city'), 
											'zipcode'=>$this->input->post('zipcode'), 
											'contact_office'=>$this->input->post('contact_office'), 
											'contact_mobile'=>$this->input->post('contact_mobile')
									);
			if($recordCount>0){
				$lastinid 				= 		$this->common->updateRecord('business_information', $data, $whereuser);
				$updated				=		array('updated'=>true);
				header('Content-type: application/json');
				echo json_encode($updated);
			}else{
				$lastInsertid 		= 		$this->common->saveRecord('business_information', $data);
				$save				=		array('save'=>true);
				header('Content-type: application/json');
				echo json_encode($save);
			}
		
		}
	}

	public function selectState(){
		$data = array(
			'country_id'=>$_POST['country_id']
		); 
		$state 					= 		$this->common->getRecord('states',$data);
		
		
		if($state > 0){
			foreach($state as $row){
				echo '<option value="'.$row->id.'">'.$row->name.'</option>';
				
			}
		}else{
			echo '<option value="">State not available</option>';
		}
		
	}
		
	
	public function selectCity(){
		$data = array(
			'state_id'=>$_POST['state_id']
		); 
		$city 					= 		$this->common->getRecord('cities',$data);
		
		
		if($city > 0){
			foreach($city as $row){
				echo '<option value="'.$row->id.'">'.$row->name.'</option>';
				
			}
		}else{
			echo '<option value="">City not available</option>';
		}
		
	}
	 

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */