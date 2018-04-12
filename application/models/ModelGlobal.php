<?php
	class ModelGlobal extends CI_Model {

		function getOptCompany($company_id = null){
            $sql    =  "SELECT * FROM `pouch_mastercompanydata` ORDER BY company_name asc";
            $query  = $this->db->query($sql);
            $optCompany = "";
            if($query->num_rows()>0){
                foreach($query->result() as $row){
                    $slct = "";
                    if($row->company_id == $company_id){
                        $slct = "selected";
                    }
                    $optCompany .= "<option $slct value='$row->company_id'>$row->company_name</option>";
                }
            }
            return $optCompany;
        }

        function getOptLimitPage($limit = null){
            $arrlimit = array("10","50","100","500","1000");
            $optLimit = "";
            for($i = 0; $i<count($arrlimit);$i++){
                $slct = "";
                if($arrlimit[$i] == $limit){
                    $slct = "selected";
                }
                $optLimit .= "<option $slct value='$arrlimit[$i]'>$arrlimit[$i]</option>";
            }
            return $optLimit;
        }
        
        function getOptBank($bank = null){
            $sql    =  "SELECT * FROM `pouch_bankcode` ORDER BY bank_name asc";
            $query  = $this->db->query($sql);
            $optBank = "";
            if($query->num_rows()>0){
                foreach($query->result() as $row){
                    $slct = "";
                    if($row->bank_code == $bank){
                        $slct = "selected";
                    }
                    $optBank .= "<option $slct value='$row->bank_code'>$row->bank_name</option>";
                }
            }
            return $optBank;
        }
        
        function getOptStatus($status = null){
            $arrStatus = array("pending"=>"Pending","approved"=>"Approved","success"=>"Success","failed"=>"Failed");
            $optStatus = "";
            foreach($arrStatus as $val => $status_name){
                $slct = "";
                if($val == $status){
                    $slct = "selected";
                }
                $optStatus .= "<option $slct value='$val'>$status_name</option>";
            }
            return $optStatus;
        }

        function getTransactionTotal($company_id,$status,$dttm1,$dttm2,$bank){
            if($status == ""){
                $status = "pending";
            }
            $vdt    = $dttm1." 00:00:00";
            $vdt2   = $dttm2." 23:59:59";
            $sql    = "SELECT a.*, b.*, c.* FROM `pouch_mastertransactiondetail` as a
                        LEFT JOIN pouch_mastertransaction as b on b.transaction_id = a.transaction_id
                        LEFT JOIN pouch_mastercompanydata as c on c.company_id = b.company_id
                        WHERE a.`status` = ? AND a.transaction_date >= ?
                        AND a.transaction_date <= ?";
                        // echo $company_id.$status.$bank.$vdt.$vdt2;
            $query  = $this->db->query($sql,array($status,$vdt,$vdt2));

            return $query->num_rows();
        }

        function getTransaction($company_id,$status,$dttm1,$dttm2,$bank,$limit,$start){
            if($status == ""){
                $status = "active";
            }
            if($limit == ""){
                $limit = 10;
            }
            $vdt    = $dttm1." 00:00:00";
            $vdt2   = $dttm2." 23:59:59";
            $sql    = "SELECT a.*, b.*, c.* FROM `pouch_mastertransactiondetail` as a
                        LEFT JOIN pouch_mastertransaction as b on b.transaction_id = a.transaction_id
                        LEFT JOIN pouch_mastercompanydata as c on c.company_id = b.company_id
                        WHERE a.`status` = ? AND a.transaction_date >= ?
                        AND a.transaction_date <= ? LIMIT $start, $limit";
                        // echo $company_id.$status.$bank.$vdt.$vdt2;
            $query  = $this->db->query($sql,array($status,$vdt,$vdt2));
            $transaction = "";
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return false;
            }
        }


	}
?>