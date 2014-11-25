document.write("<script language=javascript src='/js/page_control.js'></script>");

function add_newsoftware() {

    var name = document.getElementById("nsw_name").value;
    var manu = document.getElementById("nsw_manu").value;
    var price = document.getElementById("nsw_price").value;
    var introd = document.getElementById("nsw_introd").value;
    var req = document.getElementById("nsw_req").value;
    var cate = document.getElementById("nsw_cate").value;
    var image = document.getElementById("nsw_image").value;

    if(name == ""){
        alert("请填写软件名称");
        return;
    }
    if(manu == ""){
        alert("请填写软件发行商");
        return;
    }
    if(price == ""){
        alert("请填写软件价格");
        return;
    }
    if(introd == ""){
        alert("请填写软件介绍");
        return;
    }
    if(req == ""){
        alert("请填写软件配置需求");
        return;
    }
    if(image == ""){
        alert("请上传介绍图片");
        return;
    }

    $.ajaxFileUpload
    (
        {
            url:'add_software.php',
            secureuri:false,
            fileElementId:'nsw_image',
            dataType: 'text',
            data:{s_name:name,s_price:price,s_manufac:manu,s_introd:introd,s_imagepath:image,s_cate:cate,s_requirement:req},
            success: function (resText)
            {
                if(resText == "success")
                {
                    alert("新增商品成功");
                    //$("#add_new_software").
                }
                else
                {
                    alert(resText);
                }
            }
        });
}

function delete_nowsoftware(s_id)
{
    var msg = "您真的确定要删除吗？";
    if(confirm(msg)==false)  return;

    $.ajax({
        type: "POST",
        url: "delsoftware.php",
        data: {s_id:s_id},
        dataType: "text",
        success: function(resText){
            if(resText == "error")
                alert("删除失败");
            else
            {
                alert(resText);
                var div = "software"+s_id;
                $("#"+div).remove();
            }
        }
    });
}

function jumpto_change(btnObj)
{

    $(".nav-bar").attr("class","nav-bar");

	$(".nav-bar").attr("class","nav-bar");

    $(".tab-block").attr("class","tab-block");
    $(document.getElementsByClassName("nav-bar")[2]).attr("class","nav-bar nav-active");
    $(document.getElementsByClassName("tab-block")[2]).attr("class","tab-block active-tab");


    var trObj=$(btnObj.parentNode.parentNode);
    console.log(trObj.children().first());
    var td=trObj.children().first();
    var id=td.text();
    $("#csw_id").val(id);
    td = td.next();
    $("#csw_name").val(td.text());
    td=td.next().next();
    $("#csw_manu").val(td.text());
    td=td.next();
    $("#csw_price").val(td.text());
    td=td.next();
    $("#csw_cate").val(td.text());
    td=td.next();
    $("#csw_introd").val(td.text());
    td=td.next();
    $("#csw_req").val(td.text());
}

function change_nowsoftware() {
	
	var id = document.getElementById("csw_id").value;
	var name = document.getElementById("csw_name").value;
	var manu = document.getElementById("csw_manu").value;
	var price = document.getElementById("csw_price").value;
	var introd = document.getElementById("csw_introd").value;
	var req = document.getElementById("csw_req").value;
	var cate = document.getElementById("csw_cate").value;
	var image = document.getElementById("csw_image").value;

	if(name == ""){
		alert("请填写软件名称");
		return;
	}
	if(manu == ""){
		alert("请填写软件发行商");
		return;
	}
	if(price == ""){
		alert("请填写软件价格");
		return;
	}
	if(introd == ""){
		alert("请填写软件介绍");
		return;
	}
	if(req == ""){
		alert("请填写软件配置需求");
		return;
	}
	if(image == ""){
		alert("请上传介绍图片");
		return;
	}

	$.ajaxFileUpload
	(
		{
			url:'chgsoftware.php',
			secureuri:false,
			fileElementId:'csw_image',
			dataType: 'text',
			data:{s_id:id,s_name:name,s_price:price,s_manufac:manu,s_introd:introd,s_imagepath:image,s_cate:cate,s_requirement:req},
			success: function (resText)
			{
				console.log(resText);
				if(resText == "success")
				{
					alert("修改商品成功");
					//$("#add_new_software").
				}
				else
				{
					alert(resText);
				}
			}
		});
}

function delete_user(u_id)
{
    var msg = "您真的确定要删除吗？";
    if(confirm(msg)==false)  return;

    $.ajax({
        type: "POST",
        url: "deluser.php",
        data: {u_id:u_id},
        dataType: "text",
        success: function(resText){
            if(resText == "error")
                alert("删除失败");
            else
            {
                var div = "user"+u_id;
                $("#"+div).remove();
            }
        }
    });
}

function delete_snumber(sn_id)
{
    var msg = "您真的确定要删除吗？";
    if(confirm(msg)==false)  return;

    $.ajax({
        type: "POST",
        url: "delsnum.php",
        data: {sn_id:sn_id},
        dataType: "text",
        success: function(resText){
            if(resText == "error")
                alert("删除失败");
            else
            {
                var div = "snumber"+sn_id;
                $("#"+div).remove();
            }
        }
    });
}

function add_snnumber()
{
    var sn_number = document.getElementById("add-number-number").value;
    var select = document.getElementById("add-number-software");
    var index = select.selectedIndex;
    var s_id = select.options[index].value;
    var s_name = select.options[index].text;

    if(sn_number == "")
    {
        alert("请输入序列号！");
        return;
    }

    $.ajax({
        type: "POST",
        url: "add_snum.php",
        data: {sn_number:sn_number,s_id:s_id},
        dataType: "text",
        success: function(resText){
            if(resText == "error")
                alert("添加失败");
            else
            {
                var innerHTML = "<tr id='snumber"+resText+"'><td>"+resText+"</td><td>"+sn_number+"</td><td>"+s_name+"</td><td><font color='green'>未使用</font></td><td><span class=\"delete-number\" onclick=\"delete_snumber('"+resText+"')\">删除</span></td></tr>";
                $("#sn_number_head").before(innerHTML);
                alert("添加成功");
            }
        }
    });
}

function changeconfig()
{
    var domain = document.getElementById("change-domain-name").value;
    var remail = document.getElementById("change-receive-email").value;
    var semail = document.getElementById("change-send-email").value;
    var semail_password = document.getElementById("change-send-email-password").value;

    if(domain == "")
    {
        alert("域名不能为空");
        return;
    }
    if(remail == "")
    {
        alert("接收订单邮箱不能为空");
        return;
    }
    if(semail == "")
    {
        alert("发送邮件邮箱不能为空");
        return;
    }
    if(semail_password == "")
    {
        alert("发送邮件邮箱密码不能为空");
        return;
    }

    $.ajax({
        type: "POST",
        url: "chgconfig.php",
        data: {domain:domain,remail:remail,semail:semail,semail_password:semail_password},
        dataType: "text",
        success: function(resText){
            alert(resText);
            if(resText == "error")
                alert("修改失败");
            else
            {
                document.getElementById("change-domain-name").value = domain;
                document.getElementById("change-receive-email").value = remail;
                document.getElementById("change-send-email").value = semail;
                document.getElementById("change-send-email-password").value = semail_password;
                alert("修改成功");
            }
        }
    });
}

function logout()
{
    $.ajax({
        type: "GET",
        url: "logout.php",
        dataType: "text",
        success: function(resText){
            window.location = "index.php";
        }
    });
}