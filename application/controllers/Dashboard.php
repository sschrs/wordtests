<?php

class Dashboard extends CI_Controller{
    public $viewFolder;
    public $user;
    public function __construct(){
        parent::__construct();
        $user = $this->session->userdata("user");
        if (!$user){
            redirect(base_url("login"));
        }
        $this->load->model("lists_model");
        $this->load->model("words_model");
        $this->load->model("complated_model");
        $this->load->model("users_model");
        $this->load->model("evolution_model");
        $this->viewFolder = "dashboard_v";
    }

    public function index(){
        $lists = $this->lists_model->get_all(array("idUser" => $this->session->userdata("user")->id));
        $words = array();
        foreach ($lists as $list){
            $wordList = $this->words_model->get_all(array("idList" => $list->id));
            foreach ($wordList as $item){
                array_push($words,$item);
            }
        }
        $viewData = new stdClass();
        $viewData->words = $words;
        $viewData->lists = $lists;
        $viewData->complated = $this->complated_model->get_all(array("idUser" => $this->session->userdata("user")->id));
        $viewData->user = $this->user;
        $viewData->evolution = $this->evolution_model->get_all(array("idUser" => $this->session->userdata("user")->id));
        $this->load->view("$this->viewFolder/index.php",$viewData);
    }


}
