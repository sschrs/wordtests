<?php
class Tests extends CI_Controller{
    public $viewFolder;

    public function __construct(){
        parent::__construct();
        $user = $this->session->userdata("user");
        if (!$user){
            redirect(base_url("login"));
        }
        $this->viewFolder = "tests_v";
        $this->load->model("words_model");
        $this->load->model("lists_model");
        $this->load->model("complated_model");
        $this->load->model("users_model");
        $this->load->model("evolution_model");
    }

    public function index($id,$reverse){
        if ($reverse == "reverse"){
            $complatedList = $this->complated_model->get_all(array("idList" => $id,"reverse" => 1));
        }else{
            $complatedList = $this->complated_model->get_all(array("idList" => $id,"reverse" => 0));
        }

        $words = $this->words_model->get_all(array("idList" => $id));
        if (count($words)<5){
            $alert = array(
                "title"     => "Kelime Sayısı!",
                "message"   => "Test Yapabilmek İçin Listenizde en az 5 Kelime olmalıdır...",
                "bgColor"   => "#F44336",
                "color"     => "white",
                "position"  => "topCenter"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("lists"));
        }
        $wordsList = array();
        $idComplated = array();
        if (count($words) -1 == count($complatedList)){
            foreach ($complatedList as $item){
                $this->complated_model->delete(array("id" => $item->id));
            }
        }
        foreach ($complatedList as $item){
            array_push($idComplated,$item->idWord);
        }
        foreach ($words as $word){
            if (!(in_array($word->id,$idComplated))){
                array_push($wordsList,$word);
            }
        }
        $sayi = rand(1,count($wordsList));
        $viewData = new stdClass();
        $viewData->list = $this->lists_model->get(array("id" => $id));
        $viewData->reverse = $reverse;
        $viewData->word = $wordsList[$sayi -1 ];
        $viewData->total = count($words);
        $viewData->score = count($complatedList);
        $this->load->view("$this->viewFolder/index.php",$viewData);
    }

    public function control($idWord,$idList,$reverse){
        if ($reverse == "reverse"){
            $response = $this->input->post("mean");
            $word = $this->words_model->get(array("id" => $idWord));
            if (strtolower($response) == strtolower($word->mean)){
                $complated = $this->complated_model->add(array(
                    "idWord"    => $idWord,
                    "idList"    => $idList,
                    "idUser"    => $this->session->userdata("user")->id,
                    "reverse"   => 1,
                    "createdAt" => date("Y-m-d H:i:s")
                ));
                $user_score= $this->users_model->get(array("id" => $this->session->userdata("user")->id))->score;
                $this->users_model->update(
                    array("id" => $this->session->userdata("user")->id),
                    array("score" => $user_score + 2)
                );
                $user = $this->users_model->get(array("id" => $this->session->userdata("user")->id));
                $this->session->unset_userdata("user");
                $this->session->set_userdata("user",$user);
                $this->evolution_model->add(array(
                    "idUser"        => $this->session->userdata("user")->id,
                    "idList"        => $idList,
                    "type"          => "correct",
                    "createdAt"     => date("Y-m-d H:i:s")
                ));
                $alert = array(
                    "title"     => "TEBRİKLER",
                    "message"   => "Doğru Cevap",
                    "bgColor"   => "#009688",
                    "color"     => "white",
                    "position"  => "topCenter"
                );
                $this->session->set_flashdata("alert",$alert);
                redirect("tests/index/$idList/reverse");
            }else{
                $this->evolution_model->add(array(
                    "idUser"        => $this->session->userdata("user")->id,
                    "idList"        => $idList,
                    "type"          => "false",
                    "createdAt"     => date("Y-m-d H:i:s")
                ));
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
                $this->session->set_flashdata("alert",$alert);
                redirect("tests/index/$idList/reverse");
            }
        }else{
            $response_word      = $this->input->post("mean");
            $response_artikel   = $this->input->post("artikel");
            $response_plural    = $this->input->post("plural");
            if (!(isset($response_artikel))){
                $response_artikel = "";
            }
            if (!(isset($response_plural))){
                $response_plural = "";
            }
            $word = $this->words_model->get(array("id" => $idWord));

            if (!((strtolower($word->word) == strtolower($response_word)) && (strtolower($word->artikel) == strtolower($response_artikel)) && (strtolower($word->plural) == strtolower($response_plural)))){
                $alert = array(
                    "title"     => "Maalesef Yanlış",
                    "message"   => "Doğrusu - " . $word->artikel . " " . $word->word .  "  " . $word->plural . " - olacaktı...",
                    "bgColor"   => "#F44336",
                    "color"     => "white",
                    "position"  => "center"
                );
                $this->evolution_model->add(array(
                    "idUser"        => $this->session->userdata("user")->id,
                    "idList"        => $idList,
                    "type"          => "false",
                    "createdAt"     => date("Y-m-d H:i:s")
                ));
                $user_score= $this->users_model->get(array("id" => $this->session->userdata("user")->id))->score;
                $this->users_model->update(
                    array("id" => $this->session->userdata("user")->id),
                    array("score" => $user_score -1)
                );
                $user = $this->users_model->get(array("id" => $this->session->userdata("user")->id));
                $this->session->unset_userdata("user");
                $this->session->set_userdata("user",$user);
                $this->session->set_flashdata("alert",$alert);
                redirect("tests/index/$idList/normal");
            }else{
                $complated = $this->complated_model->add(array(
                    "idWord"    => $idWord,
                    "idList"    => $idList,
                    "idUser"    => $this->session->userdata("user")->id,
                    "reverse"   => 0,
                    "createdAt" => date("Y-m-d H:i:s")
                ));
                $user_score= $this->users_model->get(array("id" => $this->session->userdata("user")->id))->score;
                $this->users_model->update(
                    array("id" => $this->session->userdata("user")->id),
                    array("score" => $user_score + 2)
                );
                $user = $this->users_model->get(array("id" => $this->session->userdata("user")->id));
                $this->session->unset_userdata("user");
                $this->session->set_userdata("user",$user);
                $this->evolution_model->add(array(
                    "idUser"        => $this->session->userdata("user")->id,
                    "idList"        => $idList,
                    "type"          => "correct",
                    "createdAt"     => date("Y-m-d H:i:s")
                ));
                $alert = array(
                    "title"     => "TEBRİKLER",
                    "message"   => "Doğru Cevap",
                    "bgColor"   => "#009688",
                    "color"     => "white",
                    "position"  => "topCenter"
                );
                $this->session->set_flashdata("alert",$alert);
                redirect("tests/index/$idList/normal");
            }

        }
    }


}