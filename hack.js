$("#dia").hide();
$(".page01").show();
$(".page341").show();
$(".page561").show();
$(".page781").show();
$(".content").hide();
$("#pageButton01").addClass("pageButtonSel");
$("#pageButton341").addClass("pageButtonSel");
$("#pageButton561").addClass("pageButtonSel");
$("#pageButton781").addClass("pageButtonSel");

$(document).ready(function(){
	$("#login1").hide();
});	

function crossed(){
	$("#trans").css("opacity","1");
	$("#login1").fadeOut("slow");
	
}
function login(){
	$("#trans").css("opacity","0.1");
	$("#login1").fadeIn("slow");
	
}
function logout(){
					
	$("#logout").hide();
	$("#login").show();
	document.getElementById('dia').innerHTML="Successfully logged out!!";
	$("#dia").fadeIn(1000);
	$("#dia").fadeOut(4000);
	jQuery.ajax({"url":"logout.php"});
}

function s34sem(){
	$("#s34sem").addClass("selTab");
	$("#s56sem").removeClass("selTab");
	$("#s78sem").removeClass("selTab");
	$("#s34semNews").show();
	$("#s56semNews").hide();
	$("#s78semNews").hide();
}
function s56sem(){
	$("#s34sem").removeClass("selTab");
	$("#s56sem").addClass("selTab");
	$("#s78sem").removeClass("selTab");
	$("#s34semNews").hide();
	$("#s56semNews").show();
	$("#s78semNews").hide();
}
function s78sem(){
	$("#s34sem").removeClass("selTab");
	$("#s56sem").removeClass("selTab");
	$("#s78sem").addClass("selTab");
	$("#s34semNews").hide();
	$("#s56semNews").hide();
	$("#s78semNews").show();
}
function topicSel(i,j){
	$("#Tex"+j+i).show();
	$("#Topi"+i).css("cursor","text");
}
function contentSel(i,j){
	$("#Tex"+j+i).hide();
	$("#Topi"+j+i).css("cursor","pointer");
	
}
function pageButtonClick(i,j,l){
	for(k=1;k<=j;k++){
		$(".page"+l+k).hide();
		$("#pageButton"+l+k).removeClass("pageButtonSel");
	}
	$("#pageButton"+l+i).addClass("pageButtonSel");
	$(".page"+l+i).show();
}
function popLogin(use){
	var Ele=document.getElementById("dia");
	if(use=='s')
		Ele.innerHTML="Login Successful Student";
	else if(use=='t')
		Ele.innerHTML="Login Successful Teacher";
	else
		Ele.innerHTML="Login UnSuccessful";
	$("#dia").fadeIn(1000);
	$("#dia").fadeOut(3000);
	
}