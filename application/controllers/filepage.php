<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class filepage extends CI_Controller {

    public $salt = "sadshufhjfhskjnfjdkfnsjdkf";

    public function __construct(){

        parent::__construct();
        $this->load->helper("url");
        $this->load->helper("security");
        $this->load->helper("download");
        $this->load->library('session');
        $this->load->model('file_model');
        $this->load->model('user_model');

        if(!$this->session->userdata("login")){

            $this->session->set_flashdata('alertbox',"You must be login first.");
            $this->session->set_flashdata('color',"red");
            redirect(base_url());

        }

    }

    public function index(){

        $fetchfile = $this->file_model->fetchFile($this->session->userdata('userid'));
        $data['fetchfile'] = $fetchfile;
        $data['page'] = '';
        $this->load->view('file',$data);

    }

    public function profile(){

        $data['page'] = 'profile';
        $data['name'] = $this->session->userdata('username');
        $this->load->view('layout3/layout3',$data);

    }

    public function chk_profile(){



    }


    public function logout(){

        $this->session->sess_destroy();
        redirect("/");

    }

    public function upload(){

        $userid = $this->session->userdata('userid');

        if(!is_dir("store/".$userid)){
            mkdir("store/".$userid);
            $this->uploadAct();
        }else{
            $this->uploadAct();
        }

    }

    public function fetchFileList(){

        echo $this->uri->segment(2);

    }

    public function download(){

        $file = $this->file_model->getFile($this->uri->segment(2), $this->session->userdata('userid'));


        $data['hash'] = $file[0]->hash;
        $data['name'] = $file[0]->filename;
        $data['filesize'] = $file[0]->filesize;
        $data['userid'] = $file[0]->user_id;
        $data['date'] = $file[0]->date;
        $data['filepath'] = $file[0]->filepath;
        $data['page'] = 'dl';


        $user = $this->user_model->getUserFormID($file[0]->user_id);
        $data['username'] = $user[0]->username;

        $this->load->view('layout3/layout3',$data);


    }

    public function tofile(){

        $userid = $this->session->userdata('userid');
        $file = $this->file_model->getFile($this->uri->segment(2), $userid);

        $a = explode('/',$_SERVER['REQUEST_URI'],5);
        $path =  $a[4];;

        header("Content-Type:".$file[0]->type);
        header("Content-Disposition: attachment; filename=".$file[0]->filename);

        ob_clean();
        flush();
        readfile($path);

    }

    public function delFile(){

        $file = $this->file_model->getFileById($this->uri->segment(2));
        unlink("store/".$this->session->userdata('userid')."/".$file[0]->filename);
        $this->file_model->delFile($this->uri->segment(2));

//        echo base_url()."store/".$this->session->userdata('userid')."/".$file[0]->filename;


        redirect(base_url());

    }

//////////////////////PRIVATE//////////////////////

    private function uploadAct(){

        $userid = $this->session->userdata('userid');
        $filename = str_replace(' ','%20',$_FILES['god']['name']);
        $filename = str_replace('/','-',$filename);
        $path = "store/".$userid."/".$filename;
        if($_FILES["god"]["error"] == UPLOAD_ERR_OK){
            move_uploaded_file( $_FILES["god"]["tmp_name"], $path);
        }



        $filesize = $this->formatBytes($_FILES['god']['size'],2);

        $this->file_model->insertFile($filename,$filesize,$userid,do_hash($_FILES['god']['name'].$this->salt),$_FILES['god']['type'],$path,$_FILES['god']['size']);

        echo $_FILES['god']['name']." was uploaded!!!";

    }

    private function formatBytes($bytes, $precision = 2) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
         $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }


}
