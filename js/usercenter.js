function changeTab(name){
//    this.css({"color":"#005"});
	var name=$("#"+name);
	$(".active-wrap").attr("class","hidden-wrap");
    name.attr("class","active-wrap");
}
function showChangeAddressWindow(btnObj){
    console.log(btnObj.className);
    var AddressAttr=btnObj.parentNode.parentNode.childNodes[1];
    var Name=AddressAttr.childNodes[1].innerHTML;
    var Phone=AddressAttr.childNodes[3].innerHTML;
    var Address=AddressAttr.childNodes[5].innerHTML;
    console.log(Name);
    console.log(Phone);
    console.log(Address);
    $('#change-address input:nth-child(1)').val(Name);
    $('#change-address input:nth-child(2)').val(Phone);
    $('#change-address textarea').val(Address);
    $('#change-address').show();
}
