function getDataDisbursement(){
    var dttm1   = $("#dttm1").val();
    var dttm2   = $("#dttm2").val();
    var company = $("#company").val();
    var status  = $("#status").val();
    var bank    = $("#bank").val();
    var limit   = $("#limit").val();
    var page    = $("#page").val();
    $.ajax({
		type : 'POST',
		url  : toUrl+"/disbursements/getDisbursements",
		data : {dttm1:dttm1,dttm2:dttm2,company:company,status:status,bank:bank,page:page,limit:limit},
		// dataType: "json",
		success: function(data){
			$("#dataTransaction").html(data);
		},error: function(xhr, ajaxOptions, thrownError){            
			alert(xhr.responseText);
			$("#loginbutton").html('<button class="btn btn-primary btn-block btn-flat">Login</button>');
		}
	});
}

$("#showdisburse").click(function(){
    getDataDisbursement();
})