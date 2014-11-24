/**
 * Created by WunG on 2014/10/23.
 */
function _init() {
    setSizes();
//    setUserName();
//        loadUserIcon();
    setUsernameClicklistener();
    bindTabChange();
}
function setContainerSize(){
    var bodyHeight=document.body.offsetHeight;
    var Container=document.getElementById('container');
    Container.style.height=bodyHeight+"px";
    console.log(bodyHeight);
}
function setTopbarWidth() {
    var windowWidth=document.body.clientWidth;
    var TopBar=document.getElementById("top-bar");
    Topbar.style.width=(windowWidth-160).toString()+"px";
}

function setTabBlockSize(){
    var windowWidth=document.body.clientWidth;
    var windowHeight=document.body.clientHeight;
    var tabBlock=document.getElementById("right-tab-block");
    if(windowWidth>768){
        tabBlock.style.width=(windowWidth-160).toString()+"px";
    }
    else{
        tabBlock.style.width=(windowWidth-60).toString()+"px";
    }
    tabBlock.style.minHeight=(windowHeight-100).toString()+"px";

}

function setSizes() {
//    setTopbarWidth();
    setTabBlockSize();
//    setContainerSize();
}

function setUserName() {
    var UserName="用户名称 user";
    document.getElementById("username").innerHTML='<span class="fa fa-user"></span>'+UserName+'<span class="fa fa-sort-down"></span>';
}

function loadUserIcon(src){
//    AJAX
    var iconImg=new Image();
    iconImg.src="img/hpcp.jpg";
    iconImg.className="user-icon";
    iconImg.alt="头像";
    var UserIconBlock= document.getElementsByClassName("user-icon-block")[0];
    console.log(UserIconBlock);
    UserIconBlock.appendChild(iconImg);
}

function setUsernameClicklistener() {
    var UserName=document.getElementsByClassName('user-info-block')[0];
    UserName.addEventListener("mouseover",showListMenu);
    UserName.addEventListener("mouseout",hideListMenu);
}

function showListMenu(){
    var ListMenu=document.getElementById('list-menu');
    ListMenu.style.display="block";
}

function hideListMenu(){
    var ListMenu=document.getElementById('list-menu');
    ListMenu.style.display="none";
}

function bindTabChange() {
    var LeftNav = new Array();
    LeftNav = document.getElementsByClassName('nav-bar');
//    for (var counter = 0; counter < LeftNav.length; counter++) {
//        var LeftBar = LeftNav[counter];
//        LeftBar.addEventListener("click", changeTabByLeftBar);
//    }
    $(".nav-bar").click(function(){changeTabByLeftBar(this)});
    $(".circle-nav").click(function(){changeTabByCircleNav(this)});
    $("#top-bar-msg").click(function () {
        $(".tab-block").attr("class", "tab-block hidden-tab");
        $("#user-msg-tab").attr("class", "tab-block active-tab");
    });
}
//    if(LeftObj.id=="top-bar-msg"){
//
//    }
//    else
//        }
function changeTabByCircleNav(obj){
//    var LeftObj=window.event.target;
    var CircleNavObj=obj;
    if(CircleNavObj.className=="circle-nav"){
        var CircleNavObj=$(CircleNavObj);
        var index=$('.circle-nav').index(CircleNavObj)+1;
        $(".tab-block").attr("class","tab-block hidden-tab");
        $(document.getElementsByClassName("tab-block")[index]).attr("class","tab-block active-tab");
        console.log(document.getElementsByClassName("tab-block")[index].id);
        $(".nav-bar").attr("class","nav-bar");
        $(document.getElementsByClassName("nav-bar")[index]).attr("class","nav-bar nav-active");
    }
}
function changeTabByLeftBar(obj){
//    var LeftObj=window.event.target;
    LeftObj=obj;

    if(LeftObj.className=="nav-bar nav-active"){
        var JQLeftObj=$(LeftObj);
        //console.log(JQLeftObj);
    }
    else if(LeftObj.className=="nav-bar"){
        $(".nav-bar").attr("class","nav-bar");
        LeftObj.className="nav-bar nav-active";
        var TabName=LeftObj.id+"-tab";
        $(".tab-block").attr("class","tab-block hidden-tab");
        $("#"+TabName).attr("class","tab-block active-tab");
    }
}

