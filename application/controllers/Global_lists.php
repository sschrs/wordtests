<?php
class Global_lists extends CI_Controller{
    public $viewFolder;
    public function __construct(){
        parent::__construct();
        $this->load->model("lists_model");
        $this->load->model("words_model");
        $this->load->model("users_model");
        $this->viewFolder = "global_lists_v";
    }

    public function index(){
        $viewData = new stdClass();
        $viewData->lists = $this->lists_model->get_all(array("situation" => 1));
        $this->load->view("$this->viewFolder/lists/index.php" , $viewData);
    }

    public function words($id){
        $list = $this->lists_model->get(array("id" => $id));
        if ($list->situation != 1){
            $alert = array(
                "title"     => "Hata",
                "message"   => "Erişim Engellendi",
                "bgColor"   => "#F44336",
                "color"     => "white",
                "position"  => "topCenter"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url());
        }
        $viewData = new stdClass();
        $viewData->words = $this->words_model->get_all(array(
            "idList"    => $id
        ));
        $viewData->list = $list;
        $viewData->user = $this->users_model->get(array("id" => $list->idUser));
        $this->load->view("$this->viewFolder/words/index.php" , $viewData);

    }

    public function add_list($id){
        $list = $this->lists_model->get(array("id" => $id));
        if ($list->situation != 1){
            $alert = array(
                "title"     => "Hata",
                "message"   => "Erişim Engellendi",
                "bgColor"   => "#F44336",
                "color"     => "white",
                "position"  => "topCenter"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("global"));
        }
        $createdAt = date("Y-m-d H:i:s");
        $insertList = $this->lists_model->add(array(
            "title"         => $list->title,
            "idUser"        => $this->session->userdata("user")->id,
            "langFirst"     => $list->langFirst,
            "langSecond"    => $list->langSecond,
            "artikel"       => $list->artikel,
            "plural"        => $list->plural,
            "situation"     => 0,
            "createdAt"     => $createdAt
        ));
        $saveList = $this->lists_model->get(array(
            "idUser"    => $this->session->userdata("user")->id,
            "createdAt" => $createdAt
        ));

        $words = $this->words_model->get_all(array("idList" => $id));
        foreach ($words as $word){
            $insert = $this->words_model->add(array(
                "word"      => $word->word,
                "mean"      => $word->mean,
                "artikel"   => $word->artikel,
                "plural"    => $word->plural,
                "idList"    => $saveList->id,
                "createdAt" => $createdAt
            ));
        }
        if ($insert && $insertList){
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
            redirect("global");
        }
    }
}