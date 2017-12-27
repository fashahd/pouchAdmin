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
                $status = "pending";
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
                $no = $start + 1;
                foreach($query->result() as $row){
                    $transaction .= "
                        <tr>
                            <td>$no</td>
                            <td>$row->transaction_date</td>
                            <td>$row->company_name</td>
                            <td>".number_format($row->amount)."</td>
                            <td>$row->bank_code</td>
                            <td>$row->account_holder_name</td>
                            <td>$row->status</td>
                        </tr>
                    ";
                    $no++;
                }
            }
            return $transaction;
        }
	}
?>