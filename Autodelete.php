
<?php

// connect to mongodb
   $m = new MongoClient();
   
   $db = $m->OVS;
   $collection=$db->aadhar_info;

   date_default_timezone_get('Asia/Kolkata');
    $delete_time = strtotime("-10 year", time());
    $time=date('j m Y',$delete_time);




  $search=$collection->find();
  foreach ($search as $document)
  {
   $check_date=date('j m Y',($document["Dob"]->sec));
  $interval = $time->diff($check_date);
  echo $interval->format('%R%a days');   
    if(date('j m Y',($document["Dob"]->sec))>date('j m Y',$delete_time))
    {
    	
    	/*$collection->remove(array("Dob"=>$document["Dob"]));*/
    }

   }
 ?>