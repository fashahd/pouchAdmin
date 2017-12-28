<?php
	class ModelGlobal extends CI_Model {

		function getOptCompany(){
            $sql    =  "SELECT * FROM `pouch_mastercompanydata` ORDER BY company_name asc";
            $query  = $this->db->query($sql);
            $optCompany = "";
            if($query->num_rows()>0){
                foreach($query->result() as $row){
                    $optCompany .= "<option value='$row->company_id'>$row->company_name</option>";
                }
            }
            return $optCompany;
        }

        function getTransaction($company_id,$status,$dttm1,$dttm2,$bank){
            $vdt    = $dttm1." 00:00:00";
            $vdt2   = $dttm2." 23:59:59";
            $sql    = "SELECT a.*, b.* FROM `pouch_mastertransactiondetail` as a
                        LEFT JOIN pouch_mastertransaction as b on b.transaction_id = a.transaction_id
                        WHERE a.company_id = ? AND a.`status` = ? AND a.bank_code = ? AND a.transaction_date >= ?
                        AND a.transaction_date <= ?";
            $query  = $this->db->query($sql,array($company_id,$status,$bank,$vdt,$vdt2));
            $transaction = "";
            if($query->num_rows()>0){
                foreach($query->result() as $row){
                    $transaction .= "
                        <tr>
                            <td>$row->reference</td>
                        </tr>
                    ";
                }
            }
            return $transaction;
        }
	}
?>