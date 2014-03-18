<?php

class file_model extends CI_Model  {

    function __construct(){

        parent::__construct();

    }

    function insertFile($filename,$filesize,$userid,$hash,$type,$path,$rawsize){

        $data = array(
            'filename' => $filename,
            'filesize' => $filesize,
            'user_id' => $userid,
            'date' => time(),
            'hash' => $hash,
            'type' => $type,
            'filepath' => $path,
            'raw_filesize' => $rawsize
        );

        $this->db->insert('file',$data);

    }

    function fetchFile($userid){

        $this->db->from('file');
        $this->db->where('user_id',$userid);
        $this->db->order_by('date','desc');
        $res = $this->db->get();
        return $res->result();

    }

    function getFile($hash,$userid){

        $this->db->from('file');
        $this->db->where('user_id',$userid)->where('hash',$hash);
        $res = $this->db->get();
        return $res->result();

    }

    function delFile($id){

        $this->db->delete('file', array('id' => $id));

    }


    function getFileById($id){

        $this->db->from('file');
        $this->db->where('id',$id);
        $res = $this->db->get();
        return $res->result();

    }

}
