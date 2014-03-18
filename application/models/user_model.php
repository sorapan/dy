<?php


class User_model extends CI_Model  {

    function __construct(){
        parent::__construct();
    }

    function insert($user,$pass,$email){

        $data = array(
            'username'=>$user,
            'password'=>$pass,
            'email'=>$email
        );
        $this->db->insert('user',$data);

    }

    function checkLogin($user,$pass){

        $this->db->from('user');
        $this->db->where("username",$user)->where("password",$pass);
        $aa = $this->db->get();
        return $aa->result();

    }

    function getUserFormID($userid){

        $this->db->from('user');
        $this->db->where("id",$userid);
        $aa = $this->db->get();
        return $aa->result();

    }

    function checkPassword($pass){

        $this->db->from('user');
        $this->db->where("password",$pass);
        $aa = $this->db->get();
        $arr = $aa->result();
        if(!empty($arr)){

            return true;

        }else{

            return false;

        }

    }

    function updatePassword($userid,$pass){

        $data = array(
            'password' => $pass,
        );
        $this->db->where('id', $userid);
        $this->db->update('user', $data);

    }

} 