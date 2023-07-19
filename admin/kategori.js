// JavaScript Document
$(document).ready(function(e) {
    $('#kategori').bind('change', altKategoriGetir);
	$('#cboUcretsiz').bind('change', Ucretsiz);
	$('#kampanya').bind('change', Kampanya);
	
	Kampanya();
	Ucretsiz();

});

function Ucretsiz(){
	
	var val=$('#cboUcretsiz').val();

	if(val==1){
		$('#div-kampanya').slideUp("fast");
		/*$('#div-kampanyaFiyat').slideUp("fast");*/
		$('#div-scriptUcret').slideUp("fast");				
		}else{
		$('#div-kampanya').slideDown("fast");
		/*$('#div-kampanyaFiyat').slideDown("fast");*/
		$('#div-scriptUcret').slideDown("fast");	
		}
	}
	
	function Kampanya(){
		var val=$('#kampanya').val();
	
		if(val==0){
			$('#div-kampanyaFiyat').slideUp("fast");
			$('#kampanyali_fiyati').val("");
			}else{
				$('#div-kampanyaFiyat').slideDown("fast");
				
				}
		
		}

function altKategoriGetir(){
	
	if($('#kategori').val() !=0){
			$.post('altkategori.php',{kategoriId: $('#kategori').val() }, function(output){
			$("#xxx").empty();
				
				
				$("#xxx").append(output);
				});
				
		}
		else
		{
			$('#altkategori option').remove();
			$('#altkategori option').append('<option value="0">Önce Kategoriyi Seçiniz</option>');
			alert("boş");
			}
	
	}