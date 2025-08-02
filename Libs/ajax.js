function reporteG_areas() {
    var fd = new FormData();
    $.ajax({
        type: 'POST',
        url: 'reportes/r_areas.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (data) {
            $('#visor').attr('src', data);
            $('#reporteModal').modal('show');
        })
        .fail(function () {
            alert("error al procesar la informacion del reporte");
        });
    return false;
}

function ajax_buscar_areas(vldato)
{
    var fd= new FormData();
    fd.append('valor', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/buscar_areas.php',
        data:fd,
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(data){
        $("#tabla").html(data);
    })
    .fail(function ()
    {
        alert("error al procesar la informacion");
    });
    return false;
}

function ajax_eli_area(vldato) {
    $("#txt_codigo").val(vldato);

    var fd = new FormData();
    fd.append('codigo', vldato);

    $.ajax({
        type: 'POST',
        url: '../php/cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json"
    })
    .done(function (data) {
        console.log("Respuesta:", data);

        if (data.error) {
            alert("Error: " + data.error);
            return;
        }

        $("#txt_nombre").val(data.v_nombre);
        $("#txt_observ").val(data.v_observ);
    })
    .fail(function () {
        alert("Error al procesar la información");
    });

    return false;
}




function ajax_buscar_secciones(vldato)
{
    var fd= new FormData();
    fd.append('valor', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/buscar_secciones.php',
        data:fd,
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(data){
        $("#tabla").html(data);
    })
    .fail(function ()
    {
        alert("error al procesar la informacion");
    });
    return false;
}

function ajax_eli_seccion(vldato) {
    $("#txt_codigo").val(vldato);
    
    var fd = new FormData();
    fd.append('codigo', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (data) {
            var datos = JSON.parse(data);
            //print (datos)
            $("#txt_nombre").val(datos.v_nombre);
            $("#txt_observ").val(datos.v_observ);
            //$row['alu_nombre']
        })
        .fail(function () {
            alert("Error al procesar la informacion");
        });
    return false;
}



function ajax_buscar_estudiantes(vldato)
{
    var fd= new FormData();
    fd.append('valor', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/buscar_estudiantes.php',
        data:fd,
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(data){
        $("#tabla").html(data);
    })
    .fail(function ()
    {
        alert("error al procesar la informacion");
    });
    return false;
}
function ajax_buscar_cedula(vldato)
{
    $("#txt_codigo").val(vldato);
    
    var fd = new FormData();
    fd.append('codigo', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
    })
        .done(function (datos) {
            //var datos = JSON.parse(data);
            // Validar si existe la cédula
            if (datos.v_cedula && datos.v_cedula !== '') {
                // La cédula existe en la base de datos
                alert("Esta cédula ya está registrada: " + datos.v_cedula);
                $("#txt_cedula").val(''); // Limpia la caja de texto
                $("#txt_cedula").focus(); // Opcional: vuelve a enfocar el campo
            } else {
                // La cédula no existe, puedes continuar
                
            }

           
        })
        

        .fail(function (xhr, status, error) {
            console.error("Error al procesar la información:", xhr.responseText);
            alert("Error al procesar la información.");
        });
    return false;
   
}

function ajax_eli_estudiante(vldato) {
    $("#txt_codigo").val(vldato);
    
    var fd = new FormData();
    fd.append('codigo', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (data) {
            var datos = JSON.parse(data);
          
            $("#txt_nombre").val(datos.v_nombre);
            $("#txt_cedula").val(datos.v_cedula);
           
        })
        .fail(function () {
            alert("Error al procesar la informacion");
        });
    return false;
}

function ajax_buscar_representantes(vldato)
{
    var fd= new FormData();
    fd.append('valor', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/buscar_representantes.php',
        data:fd,
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(data){
        $("#tabla").html(data);
    })
    .fail(function ()
    {
        alert("error al procesar la informacion");
    });
    return false;
}

function ajax_buscar_correo_representante(vlcorreo,vlcodigo)
{
    //$("#txt_codigo").val(vldato);
    var fd = new FormData();
    fd.append('correo', vlcorreo);
    fd.append('codigo', vlcodigo);
    if (vlcorreo != '') {
        $.ajax({
            type: 'POST',
            url: '../php/cargardatos_correo.php',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
        })
    
        .done(function (datos) {
            if (datos.v_contador >= 1) {
                // La correo existe en la base de datos
                alert("Esta correo ya está registrado: ");
                $("#txt_correo").val(''); // Limpia la caja de texto
                $("#txt_correo").focus(); // Opcional: vuelve a enfocar el campo
            }
        })
        .fail(function (xhr, status, error) {
            console.error("Error al procesar la información:", xhr.responseText);
            alert("Error al procesar la información.");
        });
    }
    return false;
}

function ajax_eli_representante(vldato) {
    $("#txt_codigo").val(vldato);
    
    var fd = new FormData();
    fd.append('codigo', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
    })
        .done(function (datos) {
            //var datos = JSON.parse(data);
            $("#txt_cedula").val(datos.v_cedula);
            $("#txt_apenom").val(datos.v_apenom);
           
        })
        .fail(function () {
            alert("Error al procesar la informacion");
        });
    return false;
}

function ajax_edi_representante(vldato) {
    $("#txt_codigo").val(vldato);
    var fd = new FormData();
    fd.append('codigo', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
    })
        .done(function (datos) {
            //var datos = JSON.parse(data);
            $("#txt_cedula").val(datos.v_cedula);
            $("#txt_apenom").val(datos.v_apenom);
            $("#txt_fecnac").val(datos.v_fecnac);
            //$("#rad_sexo").val(datos.v_sexo);  
            $("#cmb_estciv").val(datos.v_estciv);  
            $("#txt_domici").val(datos.v_domici);  
            $("#txt_teldom").val(datos.v_teldom);  
            $("#txt_trabaj").val(datos.v_trabaj);  
            $("#txt_dirtra").val(datos.v_dirtra);  
            $("#txt_teltra").val(datos.v_teltra);  
            $("#txt_profes").val(datos.v_profes);  
            $("#txt_fecing").val(datos.v_fecing);  
            $("#txt_nacion").val(datos.v_nacion);  
            $("#txt_correo").val(datos.v_correo);                        
            $("#txt_movilw").val(datos.v_movilw);  
            $("#txt_contac").val(datos.v_contac);  
            $("#txt_telcon").val(datos.v_telcon);  
            $("#txt_observ").val(datos.v_observ);  
            //console.log("Valor de sexo:", datos.v_sexo);
            if (datos.v_sexo == 1) {
                document.getElementById("rad_masculino").checked = true;
            } else if (datos.v_sexo == 2) {
                document.getElementById("rad_femenino").checked = true;

            }
 
        })
        .fail(function () {
            alert("Error al procesar la informacion");
        });
        
    return false;
}

function ajax_buscar_repres_cedula(vldato)
{
    $("#txt_codigo").val(vldato);
    var fd = new FormData();
    fd.append('codigo', vldato);
    $.ajax({
        type: 'POST',
        url: '../../representantes_/php/cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
    })
        .done(function (datos) {
            //var datos = JSON.parse(data);
            // Validar si existe la cédula
            if (datos.v_cedula && datos.v_cedula !== "") {
                // La cédula existe en la base de datos
                //alert("Esta cédula si está registrada: " + datos.v_cedula);
                $("#cmb_codrpr").val(datos.v_codigo);
                $("#txt_cedrpr").val(datos.v_cedula);
                //$("#cmb_codrpr").focus(); // Opcional: vuelve a enfocar el campo
            } else {
                // La cédula no existe, puedes continuar
                alert("Esta cédula no está registrada: " + datos.v_cedula + "Por favor dar click en Nuevo");
                $("#txt_cedrpr").val(""); // Limpia la caja de texto
            }

           
        })
        .fail(function () {
            alert("Error al procesar la informacion");
        });
    return false;
   
}


function ajax_buscar_especialidades(vldato)
{
    var fd= new FormData();
    fd.append('valor', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/buscar_especialidades.php',
        data:fd,
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(data){
        $("#tabla").html(data);
    })
    .fail(function ()
    {
        alert("error al procesar la informacion");
    });
    return false;
}

function ajax_eliminar_especialidad(vldato) {
    $("#txt_codigo").val(vldato);
    
    var fd = new FormData();
    fd.append('codigo', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (data) {
            var datos = JSON.parse(data);
          
            $("#txt_nombre").val(datos.v_nombre);
            $("#txt_titulo").val(datos.v_titulo);
            $("#txt_observ").val(datos.v_observ);
           
        })
        .fail(function () {
            alert("Error al procesar la informacion");
        });
    return false;
    }



function ajax_buscar_cursos(vldato)
{
    var fd= new FormData();
    fd.append('valor', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/buscar_cursos.php',
        data:fd,
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(data){
        $("#tabla").html(data);
    })
    .fail(function ()
    {
        alert("error al procesar la informacion");
    });
    return false;
}

function ajax_eli_curso(vldato) {
    $("#txt_codigo").val(vldato);
    
    var fd = new FormData();
    fd.append('codigo', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (data) {
            var datos = JSON.parse(data);
          
            $("#txt_nombre").val(datos.v_nombre);
            $("#txt_observ").val(datos.v_observ);
         })
        .fail(function () {
            alert("error al procesar la informacion");
        });
    return false;
}



function ajax_buscar_ciclos(vldato)
{
    var fd= new FormData();
    fd.append('valor', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/buscar_ciclos.php',
        data:fd,
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(data){
        $("#tabla").html(data);
    })
    .fail(function ()
    {
        alert("error al procesar la informacion");
    });
    return false;
}

function ajax_eli_ciclo(vldato) {
    $("#txt_codigo").val(vldato);
    
    var fd = new FormData();
    fd.append('codigo', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (data) {
            var datos = JSON.parse(data);
            $("#txt_nombre").val(datos.v_nombre);
            $("#txt_observ").val(datos.v_observ);
            })
        .fail(function () {
            alert("error al procesar la informacion");
        });
    return false;
}


function ajax_buscar_paralelos(vldato)
{
    var fd= new FormData();
    fd.append('valor', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/buscar_paralelos.php',
        data:fd,
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(data){
        $("#tabla").html(data);
    })
    .fail(function ()
    {
        alert("error al procesar la informacion");
    });
    return false;
}

function ajax_eli_paralelo(vldato) {
    $("#txt_codigo").val(vldato);
    
    var fd = new FormData();
    fd.append('codigo', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (data) {
            var datos = JSON.parse(data);
            $("#txt_nombre").val(datos.v_nombre);
            $("#txt_observ").val(datos.v_observ);
            })
        .fail(function () {
            alert("error al procesar la informacion");
        });
    return false;
}

function ajax_buscar_personal(vldato)
{
    var fd= new FormData();
    fd.append('valor', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/buscar_personal.php',
        data:fd,
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(data){
        $("#tabla").html(data);
    })
    .fail(function ()
    {
        alert("error al procesar la informacion");
    });
    return false;
}

function ajax_eli_personal(vldato) {
    $("#txt_codigo").val(vldato);
    var fd = new FormData();
    fd.append('codigo', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
    })
        .done(function (datos) {
            //var datos = JSON.parse(data);
            $("#txt_cedula").val(datos.v_cedula);
            $("#txt_apenom").val(datos.v_apenom);
            })
        .fail(function () {
            alert("Error al procesar la informacion");
        });
    return false;
}

function ajax_buscar_fcursos(vldato)
{
    var fd= new FormData();
    fd.append('valor', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/buscar_fcursos.php',
        data:fd,
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(data){
        $("#tabla").html(data);
    })
    .fail(function ()
    {
        alert("error al procesar la informacion");
    });
    return false;
}

function ajax_eli_fcursos(vldato) {
    $("#txt_codigo").val(vldato);
    
    var fd = new FormData();
    fd.append('codigo', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (data) {
            var datos = JSON.parse(data);
            $("#txt_descripcion").val(datos.v_descripcion);
            $("#txt_profesor").val(datos.v_profesor);
            })
        .fail(function () {
            alert("error al procesar la informacion");
        });
    return false;
}

function ajax_editar_fcursos(idcurso) {
    window.location.href = "vista_ingresar_fcursos.html?id=" + idcurso;
}

function ajax_buscar_asignaturas(vldato)
{
    var fd= new FormData();
    fd.append('valor', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/buscar_asig.php',
        data:fd,
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(data){
        $("#tabla").html(data);
    })
    .fail(function ()
    {
        alert("error al procesar la informacion");
    });
    return false;
}

function ajax_eli_asig(vldato) {
    $("#txt_codigo").val(vldato);
    
    var fd = new FormData();
    fd.append('codigo', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (data) {
            var datos = JSON.parse(data);
            //print (datos)
            $("#txt_nombre").val(datos.v_nombre);
            $("#txt_observ").val(datos.v_observ);
            //$row['alu_nombre']
        })
        .fail(function () {
            alert("Error al procesar la informacion");
        });
    return false;
}

function reporteG_materias() {
    var fd = new FormData();
    $.ajax({
        type: 'POST',
        url: 'reportes/r_materias.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (data) {
            $('#visor').attr('src', data);
            $('#reporteModal').modal('show');
        })
        .fail(function () {
            alert("error al procesar la informacion del reporte");
        });
    return false;
}

function ajax_buscar_materias(vldato)
{
    var fd= new FormData();
    fd.append('valor', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/buscar_mate.php',
        data:fd,
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(data){
        $("#tabla").html(data);
    })
    .fail(function ()
    {
        alert("error al procesar la informacion");
    });
    return false;
}

function ajax_eli_mate(vldato) {
    $("#txt_codigo").val(vldato);
    
    var fd = new FormData();
    fd.append('codigo', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (data) {
            var datos = JSON.parse(data);
            //print (datos)
            $("#txt_fcurso").val(datos.v_fcurso);
            $("#txt_asignatura").val(datos.v_asignatura);
            $("#txt_docente").val(datos.v_docente);
            //$row['alu_nombre']
        })
        .fail(function () {
            alert("Error al procesar la informacion");
        });
    return false;
}

function ajax_buscar_usuarios(vldato)
{
    var fd= new FormData();
    fd.append('valor', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/buscar_usuarios.php',
        data:fd,
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(data){
        $("#tabla").html(data);
    })
    .fail(function ()
    {
        alert("error al procesar la informacion");
    });
    return false;
}

function ajax_eliminar_usuarios(vldato) {
    $("#txt_codigo").val(vldato);
    
    var fd = new FormData();
    fd.append('codigo', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/cargardatos.php', 
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json'
    })
        .done(function (datos) {
            $("#txt_nombre").val(datos.v_nombre);
            $("#txt_observ").val(datos.v_observ);
        })
        .fail(function () {
            alert("Error al procesar la informacion");
        });
    return false;
}

function ajax_institucion() {
    var fd = new FormData();
     $.ajax({
        url: 'php/cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function (data) {
            var datos = JSON.parse(data);
            $("#txt_titul1").val(datos.v_titul1);
            $("#txt_titul2").val(datos.v_titul2);
            $("#txt_titul3").val(datos.v_titul3);
            $("#txt_titul4").val(datos.v_titul4);
            $("#txt_titul5").val(datos.v_titul5);
            $("#txt_ruc").val(datos.v_ruc);
            $("#txt_desano").val(datos.v_desano);
            $("#txt_ordina").val(datos.v_ordina);
            $("#txt_fecini").val(datos.v_fecini);
            $("#txt_provin").val(datos.v_provin);
            $("#txt_fecgra").val(datos.v_fecgra);
            $("#txt_sigrec").val(datos.v_sigrec);
            $("#txt_rector").val(datos.v_rector);
            $("#txt_sigvr").val(datos.v_sigvr);
            $("#txt_vicere").val(datos.v_vicere);
            $("#txt_sigpv").val(datos.v_sigpv);
            $("#txt_privoc").val(datos.v_privoc);
            $("#txt_sigsv").val(datos.v_sigsv);
            $("#txt_segvoc").val(datos.v_segvoc);
            $("#txt_sigtv").val(datos.v_sigtv);
            $("#txt_tervoc").val(datos.v_tervoc);
            $("#txt_sigsec").val(datos.v_sigsec);
            $("#txt_secret").val(datos.v_secret);
            $("#txt_sigins").val(datos.v_sigins);
            $("#txt_inspec").val(datos.v_inspec);
            $("#txt_sigcol").val(datos.v_sigcol);
            $("#txt_colec").val(datos.v_colec);
            

        })
        .fail(function () {
            alert("Error al procesar la informacion");
        });
    return false;
}


function ajax_registro_buscar(vldato)
{
    var fd= new FormData();
    fd.append('valor', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/registro_buscar.php',
        data:fd,
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(data){
        $("#tabla").html(data);
    })
    .fail(function ()
    {
        alert("error al procesar la informacion");
    });
    return false;
}

function ajax_regnouut_eli(vldato) {
    $("#txt_codigo").val(vldato);
    var fd = new FormData();
    fd.append('codigo', vldato);
     alert(vldato);
    $.ajax({
        type: 'POST',
        url: '../php/registro_cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json'
    })
        .done(function (datos) {
            console.log("Datos recibidos:", datos); // 👉 Muestra el objeto en consola
            alert("Nombre: " + datos.v_nombre + "\nDescripción: " + datos.v_descri); 
            $("#txt_nombre").val(datos.v_nombre);
            $("#txt_descri").val(datos.v_descri);
            
        })
        .fail(function () {
            alert("Error al procesar la informacion");
        });
    return false;
}

function ajax_regnot_eli(vldato) {
    $("#txt_codigo").val(vldato);
    var fd = new FormData();
    fd.append('codigo', vldato);
     alert(vldato);
    $.ajax({
        type: 'POST',
        url: '../php/registro_cargardatos.php',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json'
    })
    .done(function (datos) {
        console.log("Datos recibidos:", datos); // 👉 Muestra el objeto en consola
        alert("Nombre: " + datos.v_nombre + "\nDescripción: " + datos.v_descri); // 👉 Muestra en ventana emergente
        $("#txt_nombre").val(datos.v_nombre);
        $("#txt_descri").val(datos.v_descri);
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        console.error("Error:", textStatus, errorThrown); // Muestra el error en consola
        console.log("Respuesta completa:", jqXHR.responseText); // Muestra el texto de respuesta
        alert("❌ Error al procesar la información");
    });

    return false;
}
