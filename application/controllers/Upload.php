<?php


/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/12/1
 * Time: 20:08
 */
class Upload extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();// 加载数据库模块
        $this->load->helper(array('form','url'));
    }

    public function index() {
        $this->load->view('upload_form');
    }
    public function handleJsonData() {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data = json_decode(file_get_contents("php://input"));
            $data=(array)$data;
            $data=$data['Sheet1'];
            $dataRowCount = 0;
            //for each begin
            foreach($data as $row){
                $record = (array) $row;
                if(isset($record['proposer_id']) && isset($record['receiver_id']) &&
                    isset($record['title']) && isset($record['content'])){
                    //valid data
                    $insertData = array(
                        'proposer_id'=>$record['proposer_id'],
                        'receiver_id'=>$record['receiver_id'],
                        'title'=>$record['title'],
                        'content'=>$record['content'],
                        'time'=>date("Y-m-d h:i:s")
                    );
                    if($this->db->insert('advice',$insertData)) {
                        $dataRowCount++;
                    } else {
                        print json_encode(array("status"=>"false","message"=>"insert data failed"));
                    }
                }

            }
            //for each end
            print json_encode(array("status"=>"success","message"=>"insert $dataRowCount rows"));
        }
    }
    public function handleXmlData() {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $xml = simplexml_load_string(file_get_contents("php://input"));
            $json = json_encode($xml);
            $data = json_decode($json,TRUE);
            $dataRowCount = 0;
            //print_r($data);
            //for each begin
            foreach($data['sleep'] as $row){
                $record = (array) $row;
                //insert sleep data
                if(isset($record['sleep_id']) && isset($record['user_id']) &&
                    isset($record['sleep_begin']) && isset($record['sleep_end'])
                    && isset($record['sleep_eff_time'])){
                    //valid data
                    $insertData = array(
                        'sleep_id'=>$record['sleep_id'],
                        'user_id'=>$record['user_id'],
                        'sleep_begin'=>$record['sleep_begin'],
                        'sleep_end'=>$record['sleep_end'],
                        'sleep_eff_time'=>$record['sleep_eff_time']
                    );
                    if($this->db->insert('sleep',$insertData)) {
                        $dataRowCount++;
                    } else {
                        print json_encode(array("status"=>"false","message"=>"insert data failed"));
                    }
                }



            }
            //for each end

            //insert sport data
            foreach($data['sport'] as $row){
                $record = (array) $row;
                //insert sleep data
                //for each end
                if(isset($record['user_id']) &&
                    isset($record['time']) && isset($record['distance'])
                    && isset($record['calorie'])  && isset($record['avgspeed'])  && isset($record['topspeed'])
                    && isset($record['createdat'])){
                    //valid data
                    $insertData = array(
                        'user_id'=>$record['user_id'],
                        'time'=>$record['time'],
                        'distance'=>$record['distance'],
                        'calorie'=>$record['calorie'],
                        'avgspeed'=>$record['avgspeed'],
                        'topspeed'=>$record['topspeed'],
                        'createdat'=>$record['createdat']
                    );
                    if($this->db->insert('sport',$insertData)) {
                        $dataRowCount++;
                    } else {
                        print json_encode(array("status"=>"false","message"=>"insert data failed"));
                    }
                }
            }

            print json_encode(array("status"=>"success","message"=>"insert $dataRowCount rows"));
        }
    }
    public function do_upload() {
        $config['upload_path']='./Upload/';
        $config['allowed_types']='xml|xls';
        $config['max_size']='1000000';

        $this->load->library('upload',$config);
        if(!$this->upload->do_upload('userfile')){
            $error=array('error'=>$this->upload->display_errors());
            $this->load->view('upload_form',$error);
        }else{
            $data=array('upload_data'=>$this->upload->data());
            $this->load->view('upload_success',$data);
        }
    }
}