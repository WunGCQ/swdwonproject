/**
 * Created by WunG on 2014/11/23.
 */
function change_tab(TabObj){
    var index= $(TabObj).index();
    $(".nav-bar").attr("class","nav-bar");
    $(TabObj).attr("class","nav-bar active");
    $("#tab-wrap .tab").attr("class","tab");
    $("#tab-wrap .tab:eq("+(index-1).toString()+")").attr("class","tab active");
}
