/***************************************************************************
*						Zolands UX Style JavaScript
***************************************************************************/

function ShowNavMenu(){
	document.getElementById("wnavslide-left").classList.toggle('toggle');
}
function ShowPassword(){
	var s = document.getElementById("wpassword");
	if(s.type === 'password'){
		s.type = 'text';
	} else {	
		s.type = 'password';
	}
}	
$(document).ready(function(){
	$("#wnavproduk").click(function(){
		$(".wnavmenu-produk").addClass("wshow-all");
		$(".wnavmenu-produk").toggle(100);
	});
	$("#wnavmenu-profil").click(function(){
		
		$(".wnavmenu-profilthems").addClass("wshow-all");
		$(".wnavmenu-profilthems").toggle(100);
	});
	return false;
});