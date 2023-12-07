<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('email')) {
      switch ($this->session->userdata('role_id')) {
        case 1:
          redirect('admin');
          break;
        case 2:
          redirect('dashboard');
          break;
        case 3:
          redirect('profile');
          break;
      }
    }

		$data['title']= 'SignIn';
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template_login', 'auth/login', $data);
		}else{
			$this->_signIn();
		}
	}

	private function _signIn()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      if (password_verify($password, $user['password'])) {
        $data = [
          'email' => $user['email'],
          'role_id' => $user['role_id']
        ];
        $this->session->set_userdata($data);
        if ($user['role_id'] == 1) {
            redirect('admin');
					}else{
						redirect('user');
					}
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Wrong password!</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
      Email Not Found</div>');
      redirect('auth');
    }

    if ($user) {
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password or Invalid email!</div>');
      redirect('auth');
    }
  }


	public function registration()
	{
		$data['title']= 'Signup';
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
			'min_length' => 'Password too short',
			'matches' => 'Password does not match',
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template_login', 'auth/registration', $data);
		}else{
			$data= array(
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			);

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Congratulation!</strong> Your account have been created.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
			redirect('auth');
		}
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>SignOut!</strong> Your account have been signOut.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>',
		'</div>');
		redirect('auth');
	}

	public function blocked()
  {
    $d['title'] = 'Access Blocked';
    $this->load->view('auth/blocked', $d);
  }
}
