<?php

/**
 * Created by PhpStorm.
 * User: fulinhua
 * Date: 2016/11/4
 * Time: 14:04
 */
class Sport
{
    public $id;
    public $db;
    public $today;
    public $friendlist;

    function __construct($id, $dbaddr)
    {
        $this->id = $id;
        $this->db = new PDO($dbaddr);
        $this->today = date('Y-m-d');

    }

    public function getRankMySelf()
    {
        $step = "select steps  from sports s where date='$this->today' and uid='$this->id'";
        $step = $this->db->query($step)->fetchAll()[0][0];
        $sql = "select count(*)+1 as pm from sports 
            where date='$this->today'and steps >'$step'";
        $myRank = $this->db->query($sql)->fetchAll()[0][0];
        $myRank = array($myRank, $step);
        return $myRank;
    }

    public function getRankAll()
    {
        return $this->db->query("select sports.* ,userinfo.name from sports ,userinfo 
              where sports.date='$this->today' and sports.uid = userinfo.id 
              order by steps desc limit 10 ")->fetchAll();

    }

    public function getRankFriend()
    {

    }

    public function getSportGraph()
    {

        return $this->db->query("select * from sports where uid='$this->id'")->fetchAll();
    }


    public function getSport($date)
    {
        return $this->db->query("select * from sports where uid='$this->id' and date='$date'")->fetchAll()[0];
    }

    public function getBody($date)
    {
        //   echo "select * from body where uid='$this->id'and update_time='$date'";
        return $this->db->query("select * from body where uid='$this->id'and update_time='$date'")->fetchAll()[0];

    }

    public function getSleep($date)
    {
        //  echo "select * from sleep where uid='$this->id'and date='$date'";
        return $this->db->query("select * from sleep where uid='$this->id'and date='$date'")->fetchAll()[0];
    }

    public function getSleepGraph($date)
    {
        //  echo "select * from sleep where uid='$this->id'and date='$date'";
        $res = $this->db->query("select * from sleep where uid='$this->id'")->fetchAll()[0];

        $data = $res['detail'];
        $data = str_replace('[', '', $data);
        $data = str_replace(']', '', $data);
        $arraytemp = explode(',', $data);
        $array2 = array();
        for ($i = 0; $i < 72; $i++) {
            array_push($array2, $arraytemp[$i]);
//            array_push($array2,22);

        }
        $startTime = "00:00";
        $time = array($startTime);
        for ($i = 0; $i < 71; $i++) {
            $temp = date('H:i', $startTime);
            $startTime = strtotime("$temp +20 min");
            //echo date("H:i",$startTime);
            array_push($time, date("H:i", $startTime));
        }
        return array("time" => $time, "value" => $array2);
    }


    public function getSleepTable()
    {
        //  echo "select * from sleep where uid='$this->id'and date='$date'";
        return $this->db->query("select * from sleep where uid='$this->id' order by date desc")->fetchAll();

    }

    public function getBodyTable()
    {
        return $this->db->query("select * from body where uid='$this->id' group by update_time order by update_time desc")->fetchAll();
    }

    public function updateHeight($h, $w)
    {
        $today = date('Y-m-d');
        if ($this->db->query("select * from body where uid='$this->id'and update_time='$today'") == '') {
            $this->db->exec("update body set height='$h',weight='$w',update_time='$today' where uid='$this->id'");
        } else {
            $this->db->exec("insert into body(uid,height,weight,heart,update_time) values ('$this->id','$h','$w','75','$today')");
        }
    }

    public function getSportsType()
    {
        return $this->db->query("select count(*) as count,type from sport_type where uid='$this->id' group by type ")->fetchAll();
    }



    function getSportsData()
    {
        return $this->db->query("select uid,calories,meters,steps,minutes,date from sports")->fetchAll();
    }

    function importSportData($uid,$calories,$meters,$steps,$minutes,$date)
    {
        return $this->db->exec("insert into sports (uid,calories,meters,steps,minutes,date) values ('$uid','$calories','$meters','$steps','$minutes','$date');");
    }
    function importSleepData($uid,  $deep_minutes,$light_minutes,$total_minutes,$sleep_complete,$detail,$date)
    {
        return $this->db->exec("insert into sleep (uid,deep_minutes,light_minutes,total_minutes,sleep_complete,detail,date) values ('$uid','$deep_minutes','$light_minutes','$total_minutes','$sleep_complete','$detail','$date');");
    }

}



