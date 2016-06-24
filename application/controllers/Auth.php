<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

    public function index()
    {
        if( $this->verify_min_level(1) )
        {
            redirect('app');
        }

        if( strtolower( $_SERVER['REQUEST_METHOD'] ) == 'post' )
        {
            $this->require_min_level(1);
        }
        
        $this->setup_login_form(TRUE);
        
        $this->load->view('header');
        $this->load->view('pages/login');
        $this->load->view('footer');
    }

    public function logout()
    {
        $this->authentication->logout();

        // Set redirect protocol
        $redirect_protocol = USE_SSL ? 'https' : NULL;

        redirect( site_url( LOGIN_PAGE . '?logout=1', $redirect_protocol ) );
    }

    public function registerPost()
    {
        // Customize this array for your user
        $user_data = [
            'username'   => $this->input->post('username'),
            'passwd'     => $this->input->post('register-password'),
            'email'      => $this->input->post('register-email'),
            'auth_level' => '1', // 9 if you want to login @ examples/index.
        ];

        $this->is_logged_in();

        echo $this->load->view('examples/page_header', '', TRUE);

        // Load resources
        $this->load->model('examples_model');
        $this->load->model('validation_callables');
        $this->load->library('form_validation');

        $this->form_validation->set_data( $user_data );

        $validation_rules = [
            [
                'field' => 'username',
                'label' => 'username',
                'rules' => 'max_length[12]|is_unique[' . config_item('user_table') . '.username]',
                'errors' => [
                    'is_unique' => 'Username already in use.'
                ]
            ],
            [
                'field' => 'passwd',
                'label' => 'passwd',
                'rules' => [
                    'trim',
                    'required',
                    [
                        '_check_password_strength',
                        [ $this->validation_callables, '_check_password_strength' ]
                    ]
                ],
                'errors' => [
                    'required' => 'The password field is required.'
                ]
            ],
            [
                'field'  => 'email',
                'label'  => 'email',
                'rules'  => 'trim|required|valid_email|is_unique[' . config_item('user_table') . '.email]',
                'errors' => [
                    'is_unique' => 'Email address already in use.'
                ]
            ],
            [
                'field' => 'auth_level',
                'label' => 'auth_level',
                'rules' => 'required|integer|in_list[1,6,9]'
            ]
        ];

        $this->form_validation->set_rules( $validation_rules );

        if( $this->form_validation->run() )
        {
            $user_data['passwd']     = $this->authentication->hash_passwd($user_data['passwd']);
            $user_data['user_id']    = $this->examples_model->get_unused_id();
            $user_data['created_at'] = date('Y-m-d H:i:s');

            // If username is not used, it must be entered into the record as NULL
            if( empty( $user_data['username'] ) )
            {
                $user_data['username'] = NULL;
            }

            $this->db->set($user_data)
                ->insert(config_item('user_table'));

            if( $this->db->affected_rows() == 1 )
                echo '<h1>Congratulations</h1>' . '<p>User ' . $user_data['username'] . ' was created.</p>';
            }
            else
            {
                echo '<h1>User Creation Error(s)</h1>' . validation_errors();
            }

        echo $this->load->view('examples/page_footer', '', TRUE);
    }

}
