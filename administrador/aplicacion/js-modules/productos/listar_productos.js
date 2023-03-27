$(document).ready(function(){

    

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
var filtro;

filtro = 1;
    listar_productos(filtro);
// filtrar por orden del id
    $("#filtro_id_1").click(function(){
var estado = $(this).attr("rel");

if(estado == 1){
    $(this).attr("rel","2");
    //$(this).removeClass("fa-sort-asc");
    //$(this).addClass("fa-sort-desc");
   // $(this).css("top","-3px");
    listar_productos(2);
    const tooltip = bootstrap.Tooltip.getInstance(this) // Returns a Bootstrap tooltip instance

// setContent example
tooltip.setContent({ '.tooltip-inner': 'Ordenar Por Codigo' })
}else{
    listar_productos(1);
    $(this).attr("rel","1");
   // $(this).removeClass("fa-sort-desc");
   // $(this).addClass("fa-sort-asc");
    //$(this).css("top","3px");
    const tooltip = bootstrap.Tooltip.getInstance(this) // Returns a Bootstrap tooltip instance

// setContent example
tooltip.setContent({ '.tooltip-inner': 'Ordenar Por codigo' })
}
    });


    // filtrar por NOmbre
    $("#filtro_id_2").click(function(){
        var estado = $(this).attr("rel");
        
        if(estado == 3){
            $(this).attr("rel","4");
           // $(this).removeClass("fa-sort-alpha-asc");
           // $(this).addClass("fa-sort-alpha-desc");
            //$(this).css("top","-3px");
            listar_productos(3);
            const tooltip = bootstrap.Tooltip.getInstance(this) // Returns a Bootstrap tooltip instance
        
        // setContent example
        tooltip.setContent({ '.tooltip-inner': 'Ordenar alfabeticamente' })
        }else{
            listar_productos(4);
            $(this).attr("rel","3");
          //  $(this).removeClass("fa-sort-alpha-desc");
          //  $(this).addClass("fa-sort-alpha-asc");
            //$(this).css("top","3px");
            const tooltip = bootstrap.Tooltip.getInstance(this) // Returns a Bootstrap tooltip instance
        
        // setContent example
        tooltip.setContent({ '.tooltip-inner': 'Ordenar alfabeticamente' })
        }
            });


             // filtrar por CAtegoria
            $("#filtro_id_3").click(function(){
                var estado = $(this).attr("rel");
                
                if(estado == 5){
                    $(this).attr("rel","6");
                 //   $(this).removeClass("fa-sort-alpha-asc");
                  //  $(this).addClass("fa-sort-alpha-desc");
                    //$(this).css("top","-3px");
                    listar_productos(5);
                    const tooltip = bootstrap.Tooltip.getInstance(this) // Returns a Bootstrap tooltip instance
                
                // setContent example
                tooltip.setContent({ '.tooltip-inner': 'Ordenar alfabeticamente' })
                }else{
                    listar_productos(6);
                    $(this).attr("rel","5");
                 //   $(this).removeClass("fa-sort-alpha-desc");
                 //   $(this).addClass("fa-sort-alpha-asc");
                    //$(this).css("top","3px");
                    const tooltip = bootstrap.Tooltip.getInstance(this) // Returns a Bootstrap tooltip instance
                
                // setContent example
                tooltip.setContent({ '.tooltip-inner': 'Ordenar alfabeticamente' })
                }
                    });


                     // filtrar por SubCAtegoria
            $("#filtro_id_4").click(function(){
                var estado = $(this).attr("rel");
                
                if(estado == 7){
                    $(this).attr("rel","8");
                   // $(this).removeClass("fa-sort-alpha-asc");
                   // $(this).addClass("fa-sort-alpha-desc");
                    //$(this).css("top","-3px");
                    listar_productos(7);
                    const tooltip = bootstrap.Tooltip.getInstance(this) // Returns a Bootstrap tooltip instance
                
                // setContent example
                tooltip.setContent({ '.tooltip-inner': 'Ordenar alfabeticamente' })
                }else{
                    listar_productos(8);
                    $(this).attr("rel","7");
                  //  $(this).removeClass("fa-sort-alpha-desc");
                  //  $(this).addClass("fa-sort-alpha-asc");
                    //$(this).css("top","3px");
                    const tooltip = bootstrap.Tooltip.getInstance(this) // Returns a Bootstrap tooltip instance
                
                // setContent example
                tooltip.setContent({ '.tooltip-inner': 'Ordenar alfabeticamente' })
                }
                    });

                            // filtrar por Precio
            $("#filtro_id_5").click(function(){
                var estado = $(this).attr("rel");
                
                if(estado == 9){
                    $(this).attr("rel","10");
                  //  $(this).removeClass("fa fa-sort-numeric-asc");
                  //  $(this).addClass("fa fa-sort-numeric-desc");
                    //$(this).css("top","-3px");
                    listar_productos(9);
                    const tooltip = bootstrap.Tooltip.getInstance(this) // Returns a Bootstrap tooltip instance
                
                // setContent example
                tooltip.setContent({ '.tooltip-inner': 'Ordena por valor o cantidad' })
                }else{
                    listar_productos(10);
                    $(this).attr("rel","9");
                  //  $(this).removeClass("fa fa-sort-numeric-desc");
                  //  $(this).addClass("fa fa-sort-numeric-asc");
                    //$(this).css("top","3px");
                    const tooltip = bootstrap.Tooltip.getInstance(this) // Returns a Bootstrap tooltip instance
                
                // setContent example
                tooltip.setContent({ '.tooltip-inner': 'Ordena por valor o cantidad' })
                }
                    });


    function listar_productos(filtro){
        var arg_peticion = 5;
        var arg_filtro = filtro;
        $.ajax({
         type: 'POST',  // Envío con método POST
         url: 'aplicacion/controllers/routes/routes.php',  // Fichero destino (el PHP que trata los datos)
         data: {  peticion: arg_peticion , filtro:arg_filtro } // Datos que se envían
         }).done(function( msg ) {  // Función que se ejecuta si todo ha ido bien
        $("#productos-table").html(msg); 
        $("td").each(function(index){

            if(index > -1){
    
             $(this).css("vertical-align","middle");
             
             
    
            }
    
           });
        
        // Escribimos en el div consola el mensaje devuelto
         }).fail(function (jqXHR, textStatus, errorThrown){ // Función que se ejecuta si algo ha ido mal
         // Mostramos en consola el mensaje con el error que se ha producido
         $("#respuesta").html("The following error occured: "+ textStatus +" "+ errorThrown); 
        });
    }
    $("#filtro_id_2 , #filtro_id_1 , #filtro_id_3 , #filtro_id_4 , #filtro_id_5 , #filtro_id_6 , #filtro_id_7 , #filtro_id_8 , #filtro_id_9 , #filtro_id_10").click();
});