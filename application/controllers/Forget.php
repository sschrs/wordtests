<?php
class Forget extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("users_model");
    }

    public function index(){
        $this->load->view("forget_password_v/index.php");
    }

    public function send_mail(){
        $email = $this->input->post("email");
        $user = $this->users_model->get(array("mail" => $email));
        if (!(isset($user))){
            $alert = array(
                "title"     => "Hata",
                "message"   => "Sistemde Böyle Bir Mail Adresi Yok",
                "bgColor"   => "red",
                "color"     => "white",
                "position"  => "topCenter"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("login"));
        }
        $pass = rand(1000000,999999999);
        $config = array(
            "protocol"      => "smtp",
            "smtp_host"     => "smtp.gmail.com",
            "smtp_port"     => "587",
            "smtp_user"     => "wordtestsplatform@gmail.com",
            "smtp_pass"     => "Suleyman1711!",
            "charset"       => "utf-8",
            "mailtype"      => "html",
            "wordwrap"      => true,
            "newline"       => "\r\n",
            "starttls"      => true,
            'smtp_crypto'   => 'tls',
        );
        $this->load->library("email",$config);
        $this->email->from("wordtestsplatform@gmail.com", "WordTests Lanuage Learning Platform");
        $this->email->to($email);
        $this->email->subject("Password Reset");
        $this->email->message("Your Temporary Password:" . $pass);
        $send = $this->email->send();
        if ($send){
            $update = $this->users_model->update(
                array("mail" => $email),
                array("password" => $pass)
            );
            $alert = array(
                "title"     => "İşlem Başarılı",
                "message"   => "Email adresinize geçici bir şifre gönderildi. Bu şifreyi kullanarak şifrenizi resetleyebilirsiniz.",
                "bgColor"   => "#009688",
                "color"     => "white",
                "position"  => "topCenter"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("forget/reset"));
        }else{
            print_r($this->email->print_debugger());
        }
    }

    public function reset(){
        $this->load->view("reset_v/index.php");
    }

    public function reset_pass(){
        $email = $this->input->post("email");
        $old = $this->input->post("old");
        $new = $this->input->post("new");

        $user = $this->users_model->get(array("mail" => $email));
        if (isset($user)){
            if ($old == $user->password){
                $update = $this->users_model->update(
                    array("id" => $user->id),
                    array("password" => md5($new))
                );
                if ($update){
                    $alert = array(
                        "title"     => "İşlem Başarılı",
                        "message"   => "Şifreniz Başarıyla Değiştirldi. Giriş Yapabilirsiniz",
                        "bgColor"   => "#009688",
                        "color"     => "white",
                        "position"  => "topCenter"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url("login"));
                }else{
                    $alert = array(
                        "title"     => "Hata",
                        "message"   => "Bir hata oluştu. Bu durum için özür dileriz. Lütfen tekrar deneyin.",
                        "bgColor"   => "#F44336",
                        "color"     => "white",
                        "position"  => "topCenter"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect("forget/reset");
                }
            }else{
                $alert = array(
                    "title"     => "Hata",
                    "message"   => "Geçici Şifre Doğru Değil",
                    "bgColor"   => "#F44336",
                    "color"     => "white",
                    "position"  => "topCenter"
                );
                $this->session->set_flashdata("alert",$alert);
                redirect("forget/reset");
            }
        }else{
            $alert = array(
                "title"     => "Hata",
                "message"   => "Böyle bir Mail adresi bulunamadı.",
                "bgColor"   => "#F44336",
                "color"     => "white",
                "position"  => "topCenter"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect("forget/reset");
        }
    }
}