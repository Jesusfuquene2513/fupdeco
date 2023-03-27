<form action="Contacto/procesar_contacto_index" method="post">
<div class="row container-fluid m-auto  p-1" id="footer" style="">
   
            <div class="row m-auto" style="color:white">
            
                <div class="col-xl-12 col-lg-11 col-md-12 m-auto">
<div class="row">
   
    <div class="col-xl-12 form-group formulario-campos p-1 mt-1 mb-1" style="text-align: center">   
                <h3  style="color:white" >Formulario de Contacto</h3>
<div class="row">    <div class="form-group col-xl-4 col-lg-6  col-md-4 p-1 mt-1 mb-1 formulario-campos">
                        <label for="" style="">Nombre completo</label>
                        <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto">
                        <input type="text" name="peticion" value="35" class="d-none">
                    </div>
                    <div class="form-group col-xl-4 col-lg-6 col-md-4  p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <label for="" style="">Tipo Identificación</label>
                        <select name="tipo_documento" id="sel-documento" class="form-control" style="cursor:pointer">
                            <option value="0">Seleccione tipo de identificación</option>
                            <option value="1">Cedula de ciudadania</option>
                            <option value="2">Cedula extranjera</option>
                            <option value="3">Pasaporte</option>
                            <option value="4">NIT</option>
                        </select>
                    </div>
                    <div class="form-group col-xl-4 col-lg-6  col-md-4 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <label for="" style="">Numéro de identificación</label>
                        <input type="text" name="numero_identificacion" class="form-control" disabled id="documento">
                    </div>
                    <div class="form-group col-xl-6 col-lg-6 col-md-6 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <label for="" style="">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono">
                    </div>
                   
                     <div class="form-group col-xl-6 col-lg-4 col-md-6 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <label for="" style="">Seleccione Departamento</label>
                        <select class="form-control" id="sel-departamento" style="cursor:pointer" name="departamento">

                        </select>
                    </div>
                    <div class="form-group col-xl-6 col-lg-4 col-md-6 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <label for="" style="">Seleccione Municipio</label>
                        <select name="municipio" class="form-control" id="sel-municipio" disabled="disabled" style="cursor:pointer">

                        </select>
                    </div>
                     <div class="form-group col-xl-6 col-lg-4 col-md-6  p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <label for="" style="">Correo electronico</label>
                        <input type="text" class="form-control" id="correo" name="correo">
                    </div>
                    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <textarea name="consulta" id="consulta" rows="3" class="form-control"
                        style="resize:none; height:150px"></textarea>
                    </div>
                    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-1 mt-1 mb-1 formulario-campos" style="float:left">
                        <center>
                            <input type="button" class="btn btn-primary" value="Enviar" id="enviar-peticion-contacto">
                        </center>
                    </div>

                </div>
            </div>
                    
</div>
                    
                </div>
            </div>


        </div>
        </form>