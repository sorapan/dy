<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public $url;

    public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');

        if($this->session->userdata("login")){

            redirect(base_url()."filepage/");

        }

    }

    public function index(){

        $this->load->view('home');

    }

    public function createUser(){

        if($_POST['pass'] == $_POST['pass2']){

            $this->session;
            $this->load->model('user_model');
            $this->user_model->insert($_POST['user'],$_POST['pass'],$_POST['email']);
            $this->session->set_flashdata('alertbox',"Successful.");
            $this->session->set_flashdata('color',"green");
            redirect("/");

        }else{

            $this->session->set_flashdata('alertbox',"Login is incorrect.");
            $this->session->set_flashdata('color',"red");
            redirect("/");

        }

    }

    public function checklogin(){

        $this->load->model('user_model');
        $a = $this->user_model->checkLogin($_POST['lg_user'],$_POST['lg_pass']);
        if(empty($a)){

            $this->session->set_flashdata('alertbox',"Login is incorrect.");
            $this->session->set_flashdata('color',"red");
            redirect("/");

        }else{

            foreach($a as $row){
                $this->session->set_userdata('login',true);
                $this->session->set_userdata('userid',$row->id);
                $this->session->set_userdata('username',$row->username);
                $this->session->set_userdata('email',$row->email);
            }
            redirect("filepage");

        }

    }

}

/* End of file home.php */
/* Location: ./application/controllers/welcome.php */