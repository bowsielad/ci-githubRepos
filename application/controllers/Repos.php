<?php

class Repos extends CI_Controller{
		public function index(){
			
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('home');
			}
			
			$myData = array('title' => 'my repos', 'bar' => $this->Repo_model->get_links());
			
			
			$data['repos_Data'] = $this->Repo_model->get_repo();
			
			
			$this->load->view('templates/header',$myData);
			$this->load->view('repos/index', $data);
			$this->load->view('templates/footer');
		}
		
		public function view($slug = NULL){
			
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('home');
			}
			
			$data['repos_Data'] = $this->Repo_model->get_repo($slug);
			
			if(empty($data['repos_Data'])){
				show_404();
				
				
				}
				
				$myData = array('title' => 'my repos', 'bar' => $this->Repo_model->get_links());
				
				$data['title'] = $data['repos_Data']['title'];
				
				$this->load->view('templates/header',$myData);
				$this->load->view('repos/view',$data);
				$this->load->view('templates/footer');
			
		}
		
		public function create(){
			
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('home');
			}

			$data['title'] = 'create repo';
			
			$myData = array('title' => 'create repo', 'bar' => $this->Repo_model->get_links());
			

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header',$myData);
				$this->load->view('repos/create', $data);
				$this->load->view('templates/footer');
			} else {
				
				
				$this->Repo_model->create_repo();

				redirect('repos');
			}
		}
		
		public function delete($id){
			
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('home');
			}
			
			$this->Repo_model->delete_repo($id);
			redirect('repos');
		}
		
		
		
		public function edit($slug){
			
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('home');
			}
			
			$data['repos_Data'] = $this->Repo_model->get_repo($slug);
			
			if(empty($data['repos_Data'])){
				show_404();
				
				}
				
				$data['title'] = 'edit repo';
				$myData = array('title' => 'edit repo', 'bar' => $this->Repo_model->get_links());
				
				$this->load->view('templates/header', $myData);
				$this->load->view('repos/edit', $data);
				$this->load->view('templates/footer');
			
		}
		
		public function update(){
			
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('home');
			}
			
			
			$this->Repo_model->update_repo();
			redirect('repos');

		}
		

}