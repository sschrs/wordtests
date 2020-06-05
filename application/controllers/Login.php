<?php
class Login extends CI_Controller{
    public $viewFolder;
    public function __construct(){
        parent::__construct();
        $this->load->model("users_model");
        $this->viewFolder = "login_v";
    }

    public function index(){
        $this->load->view("$this->viewFolder/index");
    }

    public function login(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("username","Username","required|trim");
        $this->form_validation->set_rules("password","Password","required|trim");
        $this->form_validation->set_message(array(
            "required"  => "{field} alanı doldurulmalıdır!"
        ));
        $validation = $this->form_validation->run();
        if ($validation){
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            $user = $this->users_model->get(array(
                "username" => $username,
                "password" => md5($password)
            ));
            if ($user){
                $this->session->set_userdata("user",$user);
                redirect(base_url("dashboard"));
            }else{
                $alert = array(
                    "title"     => "Hatalı Giriş",
                    "message"   => "Kullanıcı Adı veya Şifreniz Yanlış. Lütfen Tekrar Deneyin.",
                    "bgColor"   => "#009688",
                    "color"     => "white",
                    "position"  => 'topCenter'
                );
                $this->session->set_flashdata("alert",$alert);
                redirect(base_url("login"));
            }
        }else{
            echo validation_errors();
        }
    }

    public function logout(){
        $this->session->unset_userdata("user");
        redirect(base_url("login"));
    }


}