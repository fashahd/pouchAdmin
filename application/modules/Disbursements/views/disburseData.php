<?php    
    $ret = '
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Date Uploaded</th>
                <th>Company</th>
                <th>Amount</th>
                <th>Bank</th>
                <th>Account Name</th>
                <th>Status</th>
            </tr>
        </thead><tbody>';
    if($transaction > 0){
        $no = $start + 1;
        foreach($transaction as $row){
            $ret .= "
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
    $ret .='</tbody></table>';

    echo $ret;
?>