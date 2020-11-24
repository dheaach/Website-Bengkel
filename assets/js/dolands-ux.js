/***************************************************************************
*						Zolands UX Style JavaScript
***************************************************************************/

function NavMenuBar(){
	document.getElementById("wnavslide-left").classList.toggle('toggle');
}
$(document).ready(function(){
	$("#wnavtransportasi").click(function(){
		$(".wnavmenu-transportasi").addClass("wshow-all");
		$(".wnavmenu-transportasi").toggle(100);
	});
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

function ShowPassword(){
	var s = document.getElementById("wpassword");
	if(s.type === 'password'){
		s.type = 'text';
	} else {	
		s.type = 'password';
	}
}	

function ShowPesanan(){
	$.ajax({
		type: 'post',
		url: '../admin/halaman/dashboard/pemesanan.php',
		success: function (msg){
			$("#pemesanan").html(msg).show();
		}
	});
	return false;
}
setInterval(function(){
	ShowPesanan();
}, 6000);