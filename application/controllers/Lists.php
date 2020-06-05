<?php
class Lists extends CI_Controller{
    public $user;
    public $viewFolder;
    public function __construct(){
        parent::__construct();
        $user = $this->session->userdata("user");
        if (!$user){
            redirect(base_url("login"));
        }
        $this->viewFolder = "lists";
        $this->load->model("users_model");
        $this->load->model("lists_model");
        $this->load->model("complated_model");
    }

    public function index(){
        $viewData = new stdClass();
        $viewData->lists = $this->lists_model->get_all(array("idUser" => $this->session->userdata("user")->id));
        $this->load->view("$this->viewFolder/list/index.php",$viewData);
    }

    public function add(){
        $viewData = new stdClass();
        $this->load->view("$this->viewFolder/add/index.php");
    }

    public function save(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title","Başlık","required|trim");
        $this->form_validation->set_rules("firstLang","Birincil Dil","required|trim");
        $this->form_validation->set_rules("secondLang","İkincil Dil","required|trim");
        $this->form_validation->set_message(array(
            "required"  => "{field} alanı doldurulmalıdır!"
        ));
        $validation = $this->form_validation->run();
        if ($validation){
            $artikel = $this->input->post("artikel");
            $plural = $this->input->post("plural");
            if (!isset($artikel)){
                $artikel = 0;
            }
            if (!isset($plural)){
                $plural = 0;
            }
            $insert =  $this->lists_model->add(array(
                "title"         => $this->input->post("title"),
                "idUser"        => $this->session->userdata("user")->id,
                "langFirst"      => $this->input->post("firstLang"),
                "langSecond"    => $this->input->post("secondLang"),
                "artikel"       => $artikel,
                "plural"        => $plural,
                "situation"     => 0,
                "createdAt"     => date("Y-m-d H:i:s")
            ));
            if ($insert){
                $alert = array(
                    "title"     => "İşlem Başarılı",
                    "message"   => "Listeniz Başarıyla Oluşturuldu",
                    "bgColor"   => "#009688",
                    "color"     => "white",
                    "position"  => "topCenter"
                );
                $this->session->set_flashdata("alert",$alert);
                redirect("lists");
            }else{
                $alert = array(
                    "title"     => "Hata",
                    "message"   => "Kayıt yapılırken bir hata oluştu. Bu durum için özür dileriz. Lütfen tekrar deneyin.",
                    "bgColor"   => "#F44336",
                    "color"     => "white",
                    "position"  => "topCenter"
                );
                $this->session->set_flashdata("alert",$alert);
                redirect("lists/add");
            }
        }else{
            $alert = array(
                "title"     => "Hata",
                "message"   => "Lütfen tüm alanları doğru şekilde doldurunuz",
                "bgColor"   => "red",
                "color"     => "white",
                "position"  => "topCenter"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("lists/add"));
        }
    }

    public function delete_confirm($id){
        $deleteAlert = $id;
        $this->session->set_flashdata("deleteAlert",$deleteAlert);
        redirect("lists");
    }

    public function delete($id){
        $delete = $this->lists_model->delete(array("id" => $id));
        if ($delete){
            $alert = array(
                "title"     => "İşlem Başarılı",
                "message"   => "Listeniz başarıyla silindi...",
                "bgColor"   => "#009688",
                "color"     => "white",
                "position"  => "topCenter"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("lists"));
        }else{
            $alert = array(
                "title"     => "Hata",
                "message"   => "Listeniz silinirken bir hata oluştu. Bu durum için özür dileriz. Lütfen tekrar deneyin.",
                "bgColor"   => "#F44336",
                "color"     => "white",
                "position"  => "topCenter"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("lists"));
        }
    }

    public function update_form($id){
        $viewData = new stdClass();
        $viewData->list = $this->lists_model->get(array("id" => $id));
        $this->load->view("$this->viewFolder/update/index.php",$viewData);
    }

    public function update($id){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title","Başlık","required|trim");
        $this->form_validation->set_rules("firstLang","Birincil Dil","required|trim");
        $this->form_validation->set_rules("secondLang","İkincil Dil","required|trim");
        $this->form_validation->set_message(array(
            "required"  => "{field} alanı doldurulmalıdır!"
        ));
        $validation = $this->form_validation->run();
        if ($validation){
            $artikel = $this->input->post("artikel");
            $plural = $this->input->post("plural");
            if (!isset($artikel)){
                $artikel = 0;
            }
            if (!isset($plural)){
                $plural = 0;
            }
            $insert =  $this->lists_model->update(
                array("id" => $id),
                array(
                "title"         => $this->input->post("title"),
                "idUser"        => $this->session->userdata("user")->id,
                "langFirst"      => $this->input->post("firstLang"),
                "langSecond"    => $this->input->post("secondLang"),
                "artikel"       => $artikel,
                "plural"        => $plural,
                "situation"     => 0,
                "createdAt"     => date("Y-m-d H:i:s")
            ));
            if ($insert){
                $alert = array(
                    "title"     => "İşlem Başarılı",
                    "message"   => "Listeniz Başarıyla Güncellendi",
                    "bgColor"   => "#009688",
                    "color"     => "white",
                    "position"  => "topCenter"
                );
                $this->session->set_flashdata("alert",$alert);
                redirect("lists");
            }else{
                $alert = array(
                    "title"     => "Hata",
                    "message"   => "Kayıt yapılırken bir hata oluştu. Bu durum için özür dileriz. Lütfen tekrar deneyin.",
                    "bgColor"   => "#F44336",
                    "color"     => "white",
                    "position"  => "topCenter"
                );
                $this->session->set_flashdata("alert",$alert);
                redirect("lists/add");
            }
        }else{
            $alert = array(
                "title"     => "Hata",
                "message"   => "Lütfen tüm alanları doğru şekilde doldurunuz",
                "bgColor"   => "red",
                "color"     => "white",
                "position"  => "topCenter"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("lists/add"));
        }
    }

    public function situationSetter($id){
        $situation = $this->input->post("data");
        if ($situation == "false"){
            $this->lists_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "situation" => 0
                )
            );
        }else{
            $this->lists_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "situation" => 1
                )
            );
        }

    }
}