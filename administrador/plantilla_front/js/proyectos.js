$(document).ready(function(){
//$(".contenido-programa").hide();

$(".fa-plus").click(function(){

	$(this).parent().parent().next().toggle();

});

$(".accordion-button").append("<i class='fa fa-sort-down' style='position:absolute; right:0; margin-right:20px; font-size:20px; '></i>");


contador();





function contador(){
    var contador_visitantes = $(".cinta").attr("id");
cadenaAnalizar = contador_visitantes;
for (var i = 0; i< cadenaAnalizar.length; i++) {
         var caracter = cadenaAnalizar.charAt(i);

         $(".contador").append("<div style='color:white;  border-radius:40px; float:left; text-align: center; font-weight:bolder ' class='conteo parrafo m-auto'><span style='margin:auto' class='num'><span style='margin:auto'>"+caracter+"</span></span></div>");
         console.log(caracter);
       
    }
};




});