<?php
/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/12/5
 * Time: 20:45
 */
class Message_model extends CI_Model {
    public function __construct(){
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database(); // 加载数据库模块
    }

    public function createMessage($pid,$rid,$content) {
        $currentTime = date("Y-m-d h:i:s");
        $data = array(
            'proposer_id'=>$pid,
            'receiver_id'=>$rid,
            'content'=>$content,
            'time'=>$currentTime
        );
        if($this->db->insert('messages',$data)) {
            return "created message success";
        } else {
            return "failed to create message!";
        }
    }
    public function getMessagesByReceiver($receiverId) {
        $query = $this->db->query("select * from messages where receiver_id = $receiverId");
        return $query->result_array();
    }
    public function getMessagesByProposer($proposerId) {
        $query = $this->db->query("select * from messages where proposer_id = $proposerId");
        return $query->result_array();
    }
}