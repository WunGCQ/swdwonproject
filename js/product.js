function add_in_cart_onclick()
{
    var amount = $("#amount-number").val();
    var s_id = $("#softw_id").val();

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