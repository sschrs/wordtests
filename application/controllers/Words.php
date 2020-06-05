<?php
class Words extends CI_Controller{
    public $viewFolder;
    public function __construct(){
        parent::__construct();
        $user = $this->session->userdata("user");
        if (!$user){
            redirect(base_url("login"));
        }
        $this->viewFolder = "words_v";
        $this->load->model("lists_model");
        $this->load->model("words_model");
        $this->load->model("complated_model");
        $this->load->model("users_model");
        $this->load->model("evolution_model");
    }

    public function index(){
        $user = $this->session->userdata("user");
        $lists = $this->lists_model->get_all(array("idUser" => $user->id));
        $idList = array();
        $wordList = array();
        foreach ($lists as $list){
            array_push($idList,$list->id);
        }
        foreach ($idList as $id){
            foreach ($this->words_model->get_all(array("idList" => $id)) as $word){
                array_push($wordList,$word);
            }
        }
        $viewData = new stdClass();
        $viewData->words = $wordList;
        $this->load->view("$this->viewFolder/list/index.php",$viewData);
    }

    public function add($id){
        $list = $this->lists_model->get(array("id" => $id));
        if ($list->idUser != $this->session->userdata("user")->id){
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
        $viewData = new stdClass();
        $viewData->idList = $id;
        $viewData->list = $list;
        $viewData->words = $this->words_model->get_all(array("idList" => $id));
        $this->load->view("$this->viewFolder/add/index.php",$viewData);
    }

    public function save($id){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("word","Kelime","required|trim");
        $this->form_validation->set_rules("mean","Anlam","required|trim");
        $this->form_validation->set_message(array(
            "required" => "{field} alanı boş bırakılamaz..."
        ));
        $validation = $this->form_validation->run();
        if ($validation){
            $artikel = $this->input->post("artikel");
            $plural = $this->input->post("plural");
            if (!isset($artikel)){
                $artikel = "";
            }
            if (!isset($plural)){
                $plural = "";
            }

            $insert = $this->words_model->add(array(
                "word"      => $this->input->post("word"),
                "mean"      => $this->input->post("mean"),
                "artikel"   => $artikel,
                "plural"    => $plural,
                "idList"    => $id,
                "createdAt" => date("Y-m-d H:i:s")
            ));

            if ($insert){
                $alert = array(
                    "title"     => "İşlem Başarılı",
                    "message"   => "Kaydınız Başarıyla Gerçekleştirildi...",
                    "bgColor"   => "#009688",
                    "color"     => "white",
                    "position"  => "topCenter"
                );
                $this->session->set_flashdata("alert",$alert);
                redirect(base_url("words/add/$id"));
            }else{
                $alert = array(
                    "title"     => "Hata",
                    "message"   => "Kayıt yapılırken bir hata oluştu. Bu durum için üzgünüz. Lütfen tekrar deneyin.",
                    "bgColor"   => "#F44336",
                    "color"     => "white",
                    "position"  => "topCenter"
                );
                $this->session->set_flashdata("alert",$alert);
                redirect(base_url("words/add/$id"));
            }

        }else{
            echo validation_errors();
        }
    }

    public function delete_confirm($id,$idPage){
        $deleteAlertWords = new stdClass();
        $deleteAlertWords->id = $id;
        $deleteAlertWords->idPage = $idPage;
        $this->session->set_flashdata("deleteAlertWords",$deleteAlertWords);
        redirect("words/add/$idPage");
    }

    public function delete($id,$idPage){
        $delete = $this->words_model->delete(array("id" => $id));
        if ($delete){
            $alert = array(
                "title"     => "İşlem Başarılı",
                "message"   => "Silme İşlemi Başarıyla Gerçekleştirildi...",
                "bgColor"   => "#009688",
                "color"     => "white",
                "position"  => "topCenter"
            );
            redirect(base_url("words/add/$idPage"));
        }else{
            $alert = array(
                "title"     => "Hata",
                "message"   => "Silme işlemi gerçekleştirilemedi. Bu durum için üzgünüz. Lütfen tekrar deneyin.",
                "bgColor"   => "#F44336",
                "color"     => "white",
                "position"  => "topCenter"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("words/add/$idPage"));
        }
    }

    public function delete_confirm_words($id){
        $deleteAlertWords = new stdClass();
        $deleteAlertWords->id = $id;
        $this->session->set_flashdata("deleteAlertWords2",$deleteAlertWords);
        redirect("words");
    }

    public function delete_words($id){
        $delete = $this->words_model->delete(array("id" => $id));
        if ($delete){
            $alert = array(
                "title"     => "İşlem Başarılı",
                "message"   => "Silme İşlemi Başarıyla Gerçekleştirildi...",
                "bgColor"   => "#009688",
                "color"     => "white",
                "position"  => "topCenter"
            );
            redirect(base_url("words"));
        }else{
            $alert = array(
                "title"     => "Hata",
                "message"   => "Silme işlemi gerçekleştirilemedi. Bu durum için üzgünüz. Lütfen tekrar deneyin.",
                "bgColor"   => "#F44336",
                "color"     => "white",
                "position"  => "topCenter"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("words"));
        }
    }

    public function test($reverse){
        $words = array();
        $idList = array();
        foreach ($this->lists_model->get_all(array("idUser" => $this->session->userdata("user")->id)) as $item){
            array_push($idList,$item->id);
        }
        foreach ($idList as $id){
            $wordList = $this->words_model->get_all(array("idList" => $id));
            foreach ($wordList as $word){
                array_push($words,$word);
            }
        }
        $count = rand(1,count($words));
        $viewData = new stdClass();
        $viewData->word = $words[$count-1];
        $viewData->reverse = $reverse;
        $this->load->view("$this->viewFolder/test/index.php" , $viewData);

    }

    public function control($id,$reverse){
        $word = $this->words_model->get(array("id" => $id));
        if ($reverse == "reverse"){
            $response_word = $this->input->post("mean");
            if ($word->mean = $response_word){
                $alert = array(
                    "title"     => "TEBRİKLER",
                    "message"   => "Doğru Cevap",
                    "bgColor"   => "#009688",
                    "color"     => "white",
                    "position"  => "topCenter"
                );
                $this->session->set_flashdata("alert",$alert);
                $user_score= $this->users_model->get(array("id" => $this->session->userdata("user")->id))->score;
                $this->users_model->update(
                    array("id" => $this->session->userdata("user")->id),
                    array("score" => $user_score + 2)
                );
                $user = $this->users_model->get(array("id" => $this->session->userdata("user")->id));
                $this->session->unset_userdata("user");
                $this->session->set_userdata("user",$user);
                redirect(base_url("words/test/reverse"));
            }else{
                $alert = array(
                    "title"     => "Maalesef Yanlış",
                    "message"   => "Doğrusu - " . $word->mean . " - olacaktı...",
                    "bgColor"   => "#F44336",
                    "color"     => "white",
                    "position"  => "center"
                );
                $user_score= $this->users_model->get(array("id" => $this->session->userdata("user")->id))->score;
                $this->users_model->update(
                    array("id" => $this->session->userdata("user")->id),
                    array("score" => $user_score - 1)
                );
                $user = $this->users_model->get(array("id" => $this->session->userdata("user")->id));
                $this->session->unset_userdata("user");
                $this->session->set_userdata("user",$user);
                redirect(base_url("words/test/reverse"));
            }
        }else{
            $response_word = $this->input->post("mean");
            $response_artikel = $this->input->post("artikel");
            $response_plural = $this->input->post("plural");
            if (!(isset($response_artikel))){
                $response_artikel = "";
            }
            if (!(isset($response_plural))){
                $response_plural = "";
            }

            if (($word->word == $response_word) && ($word->artikel == $response_artikel) && ($word->plural == $response_plural)){
                $this->evolution_model->add(array(
                    "idUser"        => $this->session->userdata("user")->id,
                    "type"          => "correct",
                    "createdAt"     => date("Y-m-d H:i:s")
                ));
                $user_score= $this->users_model->get(array("id" => $this->session->userdata("user")->id))->score;
                $this->users_model->update(
                    array("id" => $this->session->userdata("user")->id),
                    array("score" => $user_score + 2)
                );
                $user = $this->users_model->get(array("id" => $this->session->userdata("user")->id));
                $this->session->unset_userdata("user");
                $this->session->set_userdata("user",$user);
                $alert = array(
                    "title"     => "TEBRİKLER",
                    "message"   => "Doğru Cevap",
                    "bgColor"   => "#009688",
                    "color"     => "white",
                    "position"  => "topCenter"
                );
                $this->session->set_flashdata("alert",$alert);
                redirect(base_url("words/test/normal"));
            }else{
                $this->evolution_model->add(array(
                    "idUser"        => $this->session->userdata("user")->id,
                    "type"          => "false",
                    "createdAt"     => date("Y-m-d H:i:s")
                ));
                $user_score= $this->users_model->get(array("id" => $this->session->userdata("user")->id))->score;
                $this->users_model->update(
                    array("id" => $this->session->userdata("user")->id),
                    array("score" => $user_score - 1)
                );
                $user = $this->users_model->get(array("id" => $this->session->userdata("user")->id));
                $this->session->unset_userdata("user");
                $this->session->set_userdata("user",$user);
                $alert = array(
                    "title"     => "Maalesef Yanlış",
                    "message"   => "Doğrusu - " . $word->artikel . " " . $word->word .  "  " . $word->plural . " - olacaktı...",
                    "bgColor"   => "#F44336",
                    "color"     => "white",
                    "position"  => "center"
                );
                $this->session->set_flashdata("alert",$alert);
                redirect(base_url("words/test/normal"));
            }
        }
    }

}