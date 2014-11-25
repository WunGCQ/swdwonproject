function changeAmount(Obj,num){
        var InputObj=$(Obj.parentNode.parentNode.parentNode).find(".amount-number");
        var amount=InputObj.val();
        var id=InputObj.attr('id').substring(3);

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

        $.ajax({
            type: "POST",
            url: "chg_cart_sw.php",
            data: {s_id:id,s_amount:amount},
            dataType: "text",
            success: function(resText){
                if(resText != "success"){

                    alert("修改失败");

                }
            }
        });

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
    function setAddress(AddressObj){
        var selectedAddress=$(AddressObj);
        $(".address").attr("class","address");
        selectedAddress.attr("class","address selected-address");
        id=AddressObj.id;
        //TODO
        //在这里获取id~~和后续操作
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
                var innerHTML="<div id='addr"+resText+"' class=\"address\" onclick=\"setAddress(this)\"><div><div class=\"address-name\">"+a_name+"</div><div class=\"address-phone\">"+a_telephone+"</div><div class=\"address-address\">"+a_address+"</div></div>"
                $(document.getElementById('add-address-btn')).before(innerHTML);
                setAddress($(document.getElementById("addr"+resText)));
                $("#add-address").hide();
            }
        });
    }

function makeorder(u_id)
{
	var id_list = document.getElementsByClassName("software");
	var amt_list = document.getElementsByClassName("amount-number");
	var aid = document.getElementsByClassName("selected-address")[0];
	if(typeof(aid) =="undefined")
	{
		alert("你还没有选择配送地址呢～");
		return;
	}
	if(id_list.length <= 0)
	{
		alert("你还没有添加商品呢~");
		return;
	}
	var jsonstr = prodjson(u_id,aid,id_list,amt_list);
	$.ajax({
            type: "POST",
            url: "makeorder.php",
            data: {jsonstr:jsonstr},
            dataType: "text",
            success: function(resText){
            	if(resText != "success")
            	{
            		alert(resText);
            	}
            	else
            	{
            		window.location = "success.php";
            	}

            }
        });
}

function prodjson(u_id,aid,id_list,amt_list)
{
	var jsonstr = "{ \"products\": [";
	for(var i = 0;i < id_list.length;i++)
	{
		if(i > 0) jsonstr += ",";

		jsonstr += "{ \"s_id\": ";
		jsonstr += "\""+id_list[i].getAttribute("id").substring(4)+"\"";
		jsonstr += ", \"s_amount\": ";
		jsonstr += "\""+$(amt_list[i]).val()+"\"";
		jsonstr += ", \"s_price\": ";
		jsonstr += "\""+id_list[i].cells[1].innerText+"\"";
		jsonstr += ", \"s_name\": ";
		jsonstr += "\""+id_list[i].cells[0].getElementsByTagName("span")[0].innerText+"\"";
		jsonstr += " }";
	}
	jsonstr += "],";
	jsonstr += "\"user_id\": \"" + u_id + "\",";
	jsonstr += "\"addr_id\": \"" + aid.id.substring(4) + "\"}";

	return jsonstr;
}