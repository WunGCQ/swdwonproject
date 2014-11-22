function add_in_cart_onclick()
{
    var amount = $("#amount-number").val();
    var s_id = $("#softw_id").val();
    var total = $("#s_total").val();

    if(total < amount){
        alert("你选购的数量超出了库存的数量!");
        return;
    }   

    $.ajax({
        type: "POST",
        url: "add_into_cart.php",
        data: {amount:amount,s_id:s_id},
        dataType: "text",
        success: function(resText){
            //
        }
    });
}

function buy_now()
{
    var amount = $("#amount-number").val();
    var s_id = $("#softw_id").val();
    var total = $("#s_total").val();

    if(total < amount){
        alert("你选购的数量超出了库存的数量!");
        return;
    }

    $.ajax({
        type: "POST",
        url: "add_into_cart.php",
        data: {amount:amount,s_id:s_id},
        dataType: "text",
        success: function(resText){
            window.location.href="index.php";
        }
    });
}