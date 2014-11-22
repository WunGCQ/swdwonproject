function changeTab(name){
//    this.css({"color":"#005"});
	var name=$("#"+name);
	$(".active-wrap").attr("class","hidden-wrap");
    name.attr("class","active-wrap");
}
function showChangeAddressWindow(btnObj){
    var a_id = btnObj.parentNode.parentNode.id;
    $("#address_id").val(a_id);

    console.log(btnObj.className);
    var AddressAttr=btnObj.parentNode.parentNode.childNodes[1];
    var Name=AddressAttr.childNodes[1].innerHTML;
    var Phone=AddressAttr.childNodes[3].innerHTML;
    var Address=AddressAttr.childNodes[5].innerHTML;
    console.log(Name);
    console.log(Phone);
    console.log(Address);
    $('#change-address input:nth-child(1)').val(Name);
    $('#ctelephone').val(Phone);
    $('#change-address textarea').val(Address);
    $('#change-address').show();
}

function changeAmount(Obj,num){
        var InputObj=$(Obj.parentNode.parentNode.parentNode).find(".amount-number");
        var amount=InputObj.val();
        console.log(amount);
        amount=parseInt(amount);
        if(num==0){
            return amount;
        }
        else if(num==-1){
            if(amount>1){
                if(amount==2){
                    $("#amount-minus").css({"background-color":"#f1f1f1"});
                }
                amount--;
                InputObj.val(amount);
                calculate_price();
            }
            else{
                $("#amount-minus").css({"background-color":"#f1f1f1"});
                return false;
            }
        }
        else if(num==1){
            amount++;
            $("#amount-minus").css({"background-color":"#ddd"});
            InputObj.val(amount);
            calculate_price();
        }
    }
    function calculate_price(){
        var shoppinglist=$(".shoppingcart-list>table");
        var softwares=$(".shoppingcart-list tr");
        var prices=new Array();
        var price_whole=parseFloat(0);
        if(softwares.length>1){
            for(var i=1;i<softwares.length-1;i++){

                var price_single=parseFloat($($(softwares[i]).children()[1]).text()).toFixed(2);

                var amount=parseFloat($(softwares[i]).find(".amount-number").val()).toFixed(2);

                var temp=parseFloat((price_single*amount).toFixed(2));
                $($(softwares[i]).children()[3]).text(temp.toString());
                price_whole+=temp;
            }
            $(softwares[softwares.length-1]).find("td").text(price_whole);
        }
        else{
        }
    }
    function change_tab(TabObj){
        var index= $(TabObj).index();
        $(".nav-bar").attr("class","nav-bar");
        $(TabObj).attr("class","nav-bar active");
        $("#tab-wrap .tab").attr("class","tab");
        $("#tab-wrap .tab:eq("+(index-1).toString()+")").attr("class","tab active");
    }

    function delete_tab(Obj){
        console.log(Obj);
        (Obj.parentNode.parentNode).remove();
        calculate_price();
    }

function changephone(u_id)
{   
    var newphone = $("#newphone").val();
    $.ajax({
        type: "POST",
        url: "chgphone.php",
        data: {u_id:u_id,u_telephone:newphone},
        dataType: "text",
        success: function(resText){
            //
            if(resText == "error"){
                alert("修改失败");
                return;
            }
            else
            {
                alert("修改成功");
            }
            $("#show-phonenumber td:nth-child(2)").text(newphone);
        }
    });
}

function changeemail(u_id)
{   
    var newemail = $("#newemail").val();
    $.ajax({
        type: "POST",
        url: "chgemail.php",
        data: {u_id:u_id,u_email:newemail},
        dataType: "text",
        success: function(resText){
            //
            if(resText == "error"){
                alert("修改失败");
                return;
            }
            else
            {
                alert("修改成功");
            }
            $("#show-email td:nth-child(2)").text(newemail);
        }
    });
}

function changepwd()
{
    var old_password = $("#old-password").val();
    var new_password = $("#new-password").val();
    var password_again = $("#password-again").val();

    if(old_password == ""){
        alert("原密码不能为空");  return;
    } 
    if(new_password == "" || password_again==""){
        alert("新密码不能为空");  return;
    }
    if(new_password != password_again){
        alert("两次输入的密码不一样");  return;
    }

    $.ajax({
        type: "POST",
        url: "chgpwd.php",
        data: {old_password:old_password,new_password:new_password},
        dataType: "text",
        success: function(resText){
            if(resText == "success"){
                alert("修改密码成功");
            }
            else if(resText == "password error")
            {
                alert("原密码错误");
            }
            else{
                alert("修改密码失败");
            }
        }
    });
}

function addAddr(u_id)
{
    var a_name = $('#name').val();
    var a_telephone = $('#telephone').val();
    var a_address = $('#address').val();
    $.ajax({
        type: "POST",
        url: "addaddr.php",
        data: {u_id:u_id,a_name:a_name,a_telephone:a_telephone,a_address:a_address},
        dataType: "text",
        success: function(resText){
            if(resText == "error"){
                alert("添加失败");
                return;
            }

            var innerHTML = "<div id=\""+"haha"+"\" class=\"address\"><div><div class=\"address-name\">"+a_name+"</div><div class=\"address-phone\">"+a_telephone+"</div><div class=\"address-address\">"+a_address+"</div></div><div><div class=\"delete-address\">删除</div><div class=\"change-address\">修改</div></div></div>";
            $(document.getElementById('add_address').parentNode ).before(innerHTML);
        }
    });
}

function deleteAddr(obj)
{   
     var AddressAttr=obj.parentNode.parentNode;
     $.ajax({
        type: "POST",
        url: "deladdr.php",
        data: {a_id:AddressAttr.id},
        dataType: "text",
        success: function(resText){
            //
            if(resText == "error")
                alert("删除失败");
        }
    });
    $(AddressAttr).remove();
}

function changeAddr(obj)
{   
    var a_id = $('#address_id').val();
    var a_name = $('#cname').val();
    var a_telephone = $('#ctelephone').val();
    var a_address = $('#caddress').val();

    $.ajax({
        type: "POST",
        url: "chgaddr.php",
        data: {a_id:a_id,a_name:a_name,a_telephone:a_telephone,a_address:a_address},
        dataType: "text",
        success: function(resText){
            if(resText == "error"){
                alert("修改失败");
                return;
            }
            else
            { 
                //alert("修改成功");
                $('#change-address').hide();
                $("#addr_name").text(a_name);
                $("#addr_telephone").text(a_telephone);
                $("#addr_address").text(a_address);
            }
        }
    });
}





