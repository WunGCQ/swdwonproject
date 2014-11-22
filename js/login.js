function vcode_onclick()
{
    $.ajax({
        type: "GET",
        url: "code_num.php",
        dataType: "text",
        success: function(resText){
            var vcode = $("#vimage");
            vcode.attr("src",'code_num.php?' + Math.random());
        }
    });
}

function check_vcode()
{
	var vcode = $("#vcode").val();

	$.ajax({
        type: "POST",
        url: "chkcode.php",
        dataType: "text",
        data: {vcode:vcode},
        success: function(resText){
            if(resText == 0)
            	alert("验证码错误");
            else
           	{
           		var formobj = document.getElementById("reg");
           		//var formdata = new FormData(formobj);
           		formobj.submit();
           	}
        }
    });
}