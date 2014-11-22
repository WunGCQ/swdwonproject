/**
 * Created by WunG on 2014/11/22.
 */
function warn(title,content,color){

    if($("#warning").length==0){
        $("body").append("<div id=\"warning\"><div id=\"warning-window\"><div id=\"warning-title\"></div><div id=\"warning-close\"onclick=\"$(\'#warning\').hide()\">×</div><div id=\"warning-wrap\"><div id=\"warning-content\"></div></div></div></div>");
    }
    $("#warning-title").text(title);
    $("#warning-content").text(content);
//    修改样式
    if(color!=null || color!=""){
        if(color=="f"){
            color="#a00"
        }
        else if(color=="s"){
            color="#264D7B"
        }
        $("#warning-title").css({"background-color":color});
        $("#warning-close").css({"background-color":color});
        $("#warning-content").css({"color":color});
        $("#warning-wrap").css({"border-color":color});
    }
    var windowHeight=document.documentElement.clientHeight;
    $("#warning-window").css({"margin-top":(Math.floor((windowHeight-150)/2)).toString()+"px"});
    $("#warning").show();

}