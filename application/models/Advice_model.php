<?php
/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/11/30
 * Time: 14:29
 */
class Advice_model extends CI_Model {

    public $advice_id; //建议id
    public $proposer_id;//发出人id
    public $receiver_id;//接收人id
    public $title;//标题
    public $content;//内容
    public $time;//时间

    public function __construct(){
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database(); // 加载数据库模块
    }

    public function createAdvice($pid,$rid,$title,$content) {
        $query = $this->db->query('select count(*) as lineNum from advice;');
        $row = $query->row();
        $currentTime = date("Y-m-d h:i:s");
        $data = array(
            'proposer_id'=>$pid,
            'receiver_id'=>$rid,
            'title'=>$title,
            'content'=>$content,
            'time'=>$currentTime
        );
        if($this->db->insert('advice',$data)) {
            return "created advice success";
        } else {
            return "failed to create advice!";
        }
    }

    public function getAllAdvices(){
        //return all advices
        $query = $this->db->query('select * from advice');
        return $query->result_array();
    }

    public function getAdvicesByReceiver($receiverId) {
        $query = $this->db->query("select * from advice where receiver_id = $receiverId");
        return $query->result_array();
    }
    public function getAdvicesByProposer($proposerId) {
        $query = $this->db->query("select * from advice where proposer_id = $proposerId");
        return $query->result_array();
    }

    public function deleteAdvice($id){
        $query = $this->db->delete('advice',array('advice_id'=>$id));
        return $this->db->affected_rows();
    }
}