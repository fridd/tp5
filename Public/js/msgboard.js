// JavaScript Document
function remainWords(){
	var addMsgContent=document.getElementById("add_msg_content");
	var remainWords=document.getElementById("remain_words");
	if(addMsgContent.value.length<=200){
		remainWords.innerHTML=addMsgContent.value.length;
	}else{
		addMsgContent.value=addMsgContent.value.substr(0,200);
		remainWords.innerHTML=200;
	}  
}
function add_msg(){
	var addMsg=document.getElementById("add_msg");
	var bg=document.getElementById("bg");
	addMsg.style.display="block";
	bg.style.display="block";
	getLocation();
}
function msg_close(){
	var closeMsg=document.getElementById("close");
	var bg=document.getElementById("bg");
	closeMsg.parentNode.style.display="none";
	bg.style.display="none";
}
function submit_form(){
	var addMsgContent=document.getElementById("add_msg_content");
	var addMsgName=document.getElementById("add_msg_name");
	var submitMsgBtn=document.getElementById("submit_msg_btn");
	var bg=document.getElementById("bg");
	if(!addMsgContent.value){
		alert("请填写留言内容！");
		return false;
	}else if(addMsgContent.value.length<10){
		alert("留言内容至少10个汉字！");
		return false;
	}
	if(!addMsgName.value){
		alert("请填写留言人！");
		return false;
	}
	document.getElementById("msg_form").submit();
	submitMsgBtn.parentNode.parentNode.style.display="none";
	bg.style.display="none";
}
function getLocation(){ 
    if (navigator.geolocation){ 
        navigator.geolocation.getCurrentPosition(showPosition,showError); 
    }else{ 
        alert("浏览器不支持地理定位。"); 
    } 
} 
function showError(error){ 
    $("#baidu_geo").val("火星");
	$("default_addr").html("火星");
    /*switch(error.code) { 
        case error.PERMISSION_DENIED: 
            alert("定位失败,用户拒绝请求地理定位"); 
            break; 
        case error.POSITION_UNAVAILABLE: 
            alert("定位失败,位置信息是不可用"); 
            break; 
        case error.TIMEOUT: 
            alert("定位失败,请求获取用户位置超时"); 
            break; 
        case error.UNKNOWN_ERROR: 
            alert("定位失败,定位系统失效"); 
            break; 
    } */
}
//baidu 
function showPosition(position){
	var defalutAddr=document.getElementById("default_addr");
    var latlon = position.coords.latitude+','+position.coords.longitude; 
    var url = "http://api.map.baidu.com/geocoder/v2/?ak=C93b5178d7a8ebdb830b9b557abce78b&callback=renderReverse&location="+latlon+"&output=json&pois=0"; 
    $.ajax({  
        type: "GET",  
        dataType: "jsonp",  
        url: url, 
        success: function (json) {  
            if(json.status==0){
				var addr=json.result.formatted_address;
				var full_addr=addr.substring(0,addr.indexOf("省"));
				full_addr+=addr.substring(addr.indexOf("省")+1,addr.indexOf("市"));
				if($("#baidu_geo").css("checked")=="checked"){
					$("#baidu_geo").val("中国"+full_addr);
					$("default_addr").html("中国"+full_addr);
				}else{
					$("#baidu_geo").val("火星");
					$("default_addr").html("火星");
				}
            } 
        }, 
        error: function (XMLHttpRequest, textStatus, errorThrown) {  
            $("#baidu_geo").val("火星");  
        } 
    }); 
}