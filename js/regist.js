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

function checkinfo()
{
    var u_name = $("#username").val();
    var u_password = $("#password").val();
    var u_pwdagain = $("#password-again").val();
    var u_email = $("#useremail").val();
    var u_telephone = $("#telephone").val();
    var vcode = $("#vcode").val();

    if(vcode == ""){
        warn("注册提示","验证码不能为空","f");
        return;
    }
    if(u_name == ""){
        warn("注册提示","用户名不能为空","f");
        return;
    }
    if(u_password == "" || u_pwdagain == ""){
        warn("注册提示","密码不能为空","f");
        return;
    }
    if(u_email == ""){
        warn("注册提示","邮箱不能为空","f");
        return;
    }
    else
    {
        var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
        if(!reg.test(u_email)){
            warn("注册提示","邮箱格式不正确","f");
            return;
        }

    }
    if(u_password != u_pwdagain){
        warn("注册提示","两次输入的密码不一致","f");
        return;
    }

    $.ajax({
      type: "POST",
      url: "chkcode.php",
      dataType: "text",
      data: {vcode:vcode},
      success: function(resText){
        if(resText == 0)
        {
            warn("注册提示","验证码错误","f");
        }
        else
        { 
            $.ajax({
              type: "POST",
              url: "regchk.php",
              dataType: "text",
              data: {username:u_name,email:u_email,password:u_password,telephone:u_telephone},
              success: function(resText){
                  if(resText == "success")
                  {
                       warn("注册提示","注册成功，请及时激活","s");
                       stepTwo();
                  }
                  else
                  {
                       warn("注册提示",resText,"f");
                  }
              }
            });
        }
      }
    });
}

function stepOne(){
        $("#step2").hide();
        $("#step3").hide();
    }

    function stepTwo() {
        $("#step1").hide();
        $("#step2").show();
        $("#step3").hide();
        $(".step-hr:eq(1)").attr("class","step-hr step-hr-active");
        $(".step:eq(1)").attr("class","step step-active");
        $("#steps>div:eq(1)").attr("class","steps-active");

    }
    function stepThree() {
        $("#step1").hide();
        $("#step2").hide();
        $("#step3").show();
        $(".step-hr:eq(2)").attr("class","step-hr step-hr-active");
        $(".step-hr:eq(3)").attr("class","step-hr step-hr-active");
        $(".step:eq(2)").attr("class","step step-active");
        $("#steps>div:eq(2)").attr("class","steps-active");

    }

function locaemail()
{
    window.location.href="http://www.hao123.com/mail"; 
}