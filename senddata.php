<?php
class senddata{
 public $link='';
 function __construct($daya, $tegangan, $arus, $mac_address){
  $this->connect();
  $this->storeInDB($daya, $tegangan, $arus, $mac_address);
 }

 function connect(){
  $this->link = mysqli_connect('datapanel.cr6lyivcapaw.us-east-1.rds.amazonaws.com','admin','interfacepanelsurya') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'data_panel1') or die('Cannot select the DB');
 }
 /* function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'panel') or die('Cannot select the DB');
 } */
 
 function storeInDB($daya, $tegangan, $arus, $mac_address){
  $query = "insert into logdata set arus='".$arus."', tegangan='".$tegangan."', daya='".$daya."', mac_address='".$mac_address."'";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
 
}
if($_GET['daya'] != '' and  $_GET['tegangan'] != '' and  $_GET['arus'] != '' and  $_GET['mac_address'] != ''){
 $senddata=new senddata($_GET['daya'],$_GET['tegangan'],$_GET['arus'],$_GET['mac_address']);
}


?>
