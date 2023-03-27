$(document).ready(function(){
   
$(".form-control").css("color","black");
   
$("#footer .btn-square").each(function(index){
       $(this).css("width","45px");
        $(this).css("height","45px");
        $(this).css("border","none");
       if(index == 0){
           
           $(this).css("background","#2f7522");
          
          }
       
        if(index == 1){
           
           $(this).css("background","#e4201d");
          
          }
        if(index == 2){
           
           $(this).css("background","#ffde18");
          
          }
       
       if(index == 3){
           
           $(this).css("background","#78b5e4");
          
          }
       
   });


setInterval(function () {
 $.ajax({
			type: "POST",
			url: "../Fecha/reloj",
			data: {
				
				
			}
		}).done(function(n) {
			$("#hora").html(n)
		}).fail(function(n, t, i) {
			$("#sel-municipio").html("The following error occured: " + t + " " + i)
		})
	
}, 1000);

       
    
 
        
});