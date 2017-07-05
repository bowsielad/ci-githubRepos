<?php

class Pages extends CI_Controller{
	
		public function view($page = 'home'){
			
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			
			
			$myData = array('title' => $data['title'] = $page, 'bar' => $this->Repo_model->get_links());
			
			$this->load->view('templates/header',$myData);
			$this->load->view('pages/'.$page, $myData);
			$this->load->view('templates/footer');
		}
		
		
		
// Log in user
		public function user_login_process(){
			$data['title'] = 'Sign In';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				
				$this->load->view('templates/header');
				$this->load->view('pages/login', $data);
				$this->load->view('templates/footer');
				
				
			} else {
				
				// Get username
				$username = $this->input->post('username');
				// Get and encrypt the password
				$password = md5($this->input->post('password'));
				
				//$this->load->model('User_model'); 

				// Login user
				$user_id = $this->User_model->login($username, $password);

				if($user_id){
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					// Set message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in');

					redirect('repos');
					
					echo'login success';
					
				} else {
					// Set message
					$this->session->set_flashdata('login_failed', 'Login is invalid');

					redirect('home');
					
					echo'login failed';
				}		
			}
		}
		
		
		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');

			redirect('home');
		}
		
}