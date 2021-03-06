<?php
/**
 * Created by PhpStorm.
 * User: sun rise
 * Date: 4/12/2017
 * Time: 12:41 PM
 */
class Join_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function insertUser($data)
    {
        $row=$this->db->select('*')->from('users')->WHERE('referal_id',$data['refer_id'])->get()->row();
        if(!empty($row)){
            $user=array(
                'email' => $data['email'],
                'password' => sha1(md5($data['password'])),
                'name' => $data['name'],
                'phone' => $data['phone'],
                'refer_id' => $data['refer_id'],
                'referal_id' => substr(md5(sha1($data['refer_id'])),0,9)
            );

            $this->db->insert('users',$user);
            $id=$this->db->insert_id();

        }
        else
        {
            return false;
        }

    }

}