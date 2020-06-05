<?php
class Register extends CI_Controller{
    public $viewFolder;
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "register_v";
        $this->load->model("users_model");
    }

    public function index(){
        $this->load->view("$this->viewFolder/index.php");
    }

    public function register(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("username","Kullanıcı Adı","required|trim");
        $this->form_validation->set_rules("password","Parola","required|trim");
        $this->form_validation->set_rules("email","Email","required|trim");
        $this->form_validation->set_rules("name","İsim","required|trim");
        $this->form_validation->set_rules("surname","Soyisim","required|trim");
        $this->form_validation->set_message(array(
            "required" => "{field} alanı doldurulmalıdır"
        ));
        $validation = $this->form_validation->run();
        if ($validation){
            $username = $this->input->post("username");
            $email = $this->input->post("email");
            $usernameList = array();
            $emailList = array();
            $users = $this->users_model->get_all();
            foreach ($users as $user){
                array_push($usernameList,$user->username);
                array_push($emailList,$user->mail);
            }
            if (in_array($username,$usernameList)){
                $alert = array(
                    "title"     => "İşlem Başarısız",
                    "message"   => "Kullanıcı Adı Daha Önce Alınmış. Başka Bir Tane Deneyin.",
                    "position"  => "topCenter",
                    "bgColor"   => "#E91E63",
                    "color"     => "white"
                );
                $this->session->set_flashdata("alert",$alert);
                $viewData = new stdClass();
                $viewData->name = $this->input->post("name");
                $viewData->surname = $this->input->post("surname");
                $viewData->email = $this->input->post("email");
                $this->load->view("$this->viewFolder/index.php",$viewData);
            }elseif (in_array($email,$emailList)){
                $alert = array(
                    "title"     => "İşlem Başarısız",
                    "message"   => "Bu Email Adresi Zaten Kayıtlı. Giriş Yapabilirsiniz!",
                    "position"  => "topCenter",
                    "bgColor"   => "#E91E63",
                    "color"     => "white"
                );
                $this->session->set_flashdata("alert",$alert);
                redirect(base_url("login"));
            }else{
                $register = $this->users_model->add(array(
                    "username"  => $this->input->post("username"),
                    "name"      => $this->input->post("name"),
                    "surname"   => $this->input->post("surname"),
                    "mail"      => $this->input->post("email"),
                    "password"  => md5($this->input->post("password")),
                    "score"     => 0,
                    "createdAt" => date("Y-m-d H:i:s")
                ));
                if ($register){
                    $alert = array(
                        "title"     => "İşlem Başarılı",
                        "message"   => "Kaydınız Başarıyla Tamamlandı. Giriş Yapabilirsiniz",
                        "position"  => "topCenter",
                        "bgColor"   => "#FF9800",
                        "color"     => "white"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect("login");
                }else{
                    $alert = array(
                        "title"     => "İşlem Başarısız",
                        "message"   => "Kayıt Olurken Bir Hata Oluştu! Lütfen tekrar deneyiniz...",
                        "position"  => "topCenter",
                        "bgColor"   => "#E91E63",
                        "color"     => "white"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect("register");
                }
            }

        }else{
            $alert = array(
                "title"     => "İşlem Başarısız",
                "message"   => "Lütfen tüm alanları doğru şekilde doldurun!",
                "position"  => "topCenter",
                "bgColor"   => "#E91E63",
                "color"     => "white"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect("register");
        }
    }
}