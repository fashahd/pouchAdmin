<?php
	class ModelAuth extends CI_Model {

		function validation($username,$password){
            $encrypted_pwd = $this->aes->encrypt_aes256($_POST["password"]);
            $sql    = " SELECT * FROM `pouch_useradmincredential`"
                    . " WHERE username = ? AND password = ? AND status = ?";
            // return $sql;
            $query  = $this->db->query($sql,array($username,$encrypted_pwd,"active"));
            if($query->num_rows()>0){
                $row    = $query->row();
                $username   = $row->username;
                $full_name  = $row->full_name;
                $role   = $row->role;
                $status = $row->status;
                $data = array(
                    "status"    => "sukses",
                    "username"  => $username,
                    "full_name" => $full_name,
                    "role"      => $role
                );
            }else{
                $data = array(
                    "status"    => "error"
                );
            }
            return json_encode($data);
        }

        function xrequest($url,$jsonDataEncoded){
            $arrheader =  array(
                'Content-Type: Application/json'
            );
            $session = curl_init($url);
            curl_setopt($session, CURLOPT_HTTPHEADER, $arrheader);
            curl_setopt($session, CURLOPT_POST, 1);
            curl_setopt($session, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            curl_setopt($session, CURLOPT_RETURNTRANSFER, TRUE);
            
            $response = curl_exec($session);
            return $response;
        }

        function createCompanyID(){
            $initiatx = "CMP".date("m");
            $month   = date("m");
            $day     = date("d");
            $year    = date("y");
            $sql    = "SELECT left(a.company_id,2) as fmonth, mid(a.company_id,3,2) as fday," 
                    . " mid(a.company_id,5,2) as fyear, mid(a.company_id,7,5) as initiat,"
                    . " right(a.company_id,4) as fno FROM pouch_mastercompanydata AS a"
                    . " where left(a.company_id,2) = '$month' and mid(a.company_id,3,2) = '$day'"
                    . " and mid(a.company_id,5,2) = '$year' and mid(a.company_id,7,5)= '$initiatx'"
                    . " order by fmonth desc, CAST(fno AS SIGNED) DESC LIMIT 1";
                 
            $result = $this->db->query($sql);	
                
            if($result->num_rows($result) > 0) {
                $row = $result->row();
                $initiat = $row->initiat;
                $fyear = $row->fyear;
                $fmonth = $row->fmonth;
                $fday = $row->fday;
                $fno = $row->fno;
                $fno++;
            } else {
                $initiat = $initiatx;
                $fyear   = $year;
                $fmonth  = $month;
                $fday    = $day;
                $fno     = 0;
                $fno++;
            }
            if (strlen($fno)==1){
                $strfno = "000".$fno;
            } else if (strlen($fno)==2){
                $strfno = "00".$fno;
            } else if (strlen($fno)==3){
                $strfno = "0".$fno;
            } else if (strlen($fno)==4){
                $strfno = $fno;
            }
            
            $company_id = $month.$day.$year.$initiat.$strfno;
    
            return $company_id;
        }

        function createUserID(){
            $initiatx = "MPC";
            $month   = date("m");
            $day     = date("d");
            $year    = date("y");
            $sql    = "SELECT left(a.userID,2) as fmonth, mid(a.userID,3,2) as fday," 
                    . " mid(a.userID,5,2) as fyear, mid(a.userID,7,3) as initiat,"
                    . " right(a.userID,4) as fno FROM POUCH_MasterEmployeeCredential AS a"
                    . " where left(a.userID,2) = '$month' and mid(a.userID,3,2) = '$day'"
                    . " and mid(a.userID,5,2) = '$year' and mid(a.userID,7,3)= '$initiatx'"
                    . " order by fmonth desc, CAST(fno AS SIGNED) DESC LIMIT 1";
                 
            $result = $this->db->query($sql);	
                
            if($result->num_rows($result) > 0) {
                $row = $result->row();
                $initiat = $row->initiat;
                $fyear = $row->fyear;
                $fmonth = $row->fmonth;
                $fday = $row->fday;
                $fno = $row->fno;
                $fno++;
            } else {
                $initiat = $initiatx;
                $fyear   = $year;
                $fmonth  = $month;
                $fday    = $day;
                $fno     = 0;
                $fno++;
            }
            if (strlen($fno)==1){
                $strfno = "000".$fno;
            } else if (strlen($fno)==2){
                $strfno = "00".$fno;
            } else if (strlen($fno)==3){
                $strfno = "0".$fno;
            } else if (strlen($fno)==4){
                $strfno = $fno;
            }
            
            $userID = $month.$day.$year.$initiat.$strfno;
    
            return $userID;
        }
	}
?>