document.addEventListener('contextmenu', event => event.preventDefault());

$('#adminlogin').submit(function(event) {
    event.preventDefault();

    var form = $('#adminlogin');	
    $("#loginbutton").html('<span class="btn btn-primary btn-block btn-flat">Loading....</span>');

	$.ajax({
		type : 'POST',
		url  : toUrl+"/auth/validation",
		data : form.serialize(),
		// dataType: "json",
		success: function(data){
			if(data =="Sukses"){
				window.location.href=toUrl+"/fronted";
				return;
			}else{
				alert(data);
				$("#loginbutton").html('<button class="btn btn-primary btn-block btn-flat">Login</button>');
				return;
			}
		},error: function(xhr, ajaxOptions, thrownError){            
			alert(xhr.responseText);
			$("#loginbutton").html('<button class="btn btn-primary btn-block btn-flat">Login</button>');
		}
	});
});