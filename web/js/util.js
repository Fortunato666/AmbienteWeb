//Funcion para el inicio de sesión
function acceso() {


    $("#s_msn").html("");
    alert($("#usuario").val());

    var newUrl = $("#verificarusuario").val();

    var parametros = {
        "txt_password": $("#password").val(),
        "txt_usuario": $("#usuario").val(),
    };

    $.ajax({
        data: parametros, //ENVIO LOS PARAMETROS 
        url: newUrl, //PAGINA QUE PROCESA LOS DATOS 
        type: "post",
        beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX 
            //$("#s_msn").html("<img  src='" + $("#loader").val() + "' border='0' width='100px'/>");
        },
        success: function (response) { //FUNCION QUE ME DEVUELVE CUANDO HAYA PROCESADO 
            //alert(response);

            if (response == 1) {
                //alert("Bienvendo "+$("#txt_usuario").val(),'Ingreso correctamente');
                location.href = $("#bienvenido").val();
            }
            else {

                alert('las credenciales son incorrectas');
            }

        },
        error: function () {
            alert("error");
            //location.href = $("#index").val();
        }
    });
}




//Funcion para el inicio de sesión
function saludo() {


    $("#s_msn").html("");
    alert($("#usuario").val());

    var newUrl = $("#saludo").val();

    var parametros = {
        "txt_password": $("#password").val(),
        "txt_usuario": $("#usuario").val(),
    };

    $.ajax({
        data: parametros, //ENVIO LOS PARAMETROS 
        url: newUrl, //PAGINA QUE PROCESA LOS DATOS 
        type: "post",
        beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX 
            //$("#s_msn").html("<img  src='" + $("#loader").val() + "' border='0' width='100px'/>");
        },
        success: function (response) { //FUNCION QUE ME DEVUELVE CUANDO HAYA PROCESADO 
            //alert(response);

            alert(response);

        },
        error: function () {
            alert("error");
            //location.href = $("#index").val();
        }
    });
}





//Funcion para el inicio de sesión
function calcular() {
    var newUrl = $("#calcular").val();

    var parametros = {
        "txt_a": $("#txt_a").val(),
        "txt_b": $("#txt_b").val(),
    };

    $.ajax({
        data: parametros, //ENVIO LOS PARAMETROS 
        url: newUrl, //PAGINA QUE PROCESA LOS DATOS 
        type: "post",
        beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX 
            $("#resultado").html("Calculando.....");
        },
        success: function (response) { //FUNCION QUE ME DEVUELVE CUANDO HAYA PROCESADO 
            //alert(response);

            $("#resultado").html(response);

        },
        error: function () {
            alert("error");
            //location.href = $("#index").val();
        }
    });
}



//Funcion para el inicio de sesión
function Insertarmedicamento() {
    var newUrl = $("#insertarmedicamento").val();

    var parametros = {
        "nombre": $("#nombre").val(),
        "precio": $("#precio").val(),
        "estatus": $("#estatus").val(),
    };

    $.ajax({
        data: parametros, //ENVIO LOS PARAMETROS 
        url: newUrl, //PAGINA QUE PROCESA LOS DATOS 
        type: "post",
        beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX 
            $("#s_msn").html("Guardando");
        },
        success: function (response) { //FUNCION QUE ME DEVUELVE CUANDO HAYA PROCESADO 
            //alert(response);

            $("#s_msn").html('se guardo correctamenre');

        },
        error: function () {
            alert("error");
            //location.href = $("#index").val();
        }
    });
}



//Funcion para el inicio de sesión
function Tblmedicamentos() {
    var newUrl = $("#tblmedicamentos").val();

    var parametros = {
        "": '',
    };

    $.ajax({
        data: parametros, //ENVIO LOS PARAMETROS 
        url: newUrl, //PAGINA QUE PROCESA LOS DATOS 
        type: "post",
        beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX 
            $("#s_tabla").html("..... Consultando");
        },
        success: function (response) { //FUNCION QUE ME DEVUELVE CUANDO HAYA PROCESADO 
            //alert(response);

            $("#s_tabla").html(response);

        },
        error: function () {
            alert("error");
            //location.href = $("#index").val();
        }
    });
}




//Funcion para el inicio de sesión
function DeleteMedicamentos(idmedicamneto) {

    v = confirm('esta seguro de eliminar el medicamento');
    if (!v) {
        return;
    }

    var newUrl = $("#Deletemedicamentos").val();

    var parametros = {
        "idmedicamneto": idmedicamneto,
    };

    $.ajax({
        data: parametros, //ENVIO LOS PARAMETROS 
        url: newUrl, //PAGINA QUE PROCESA LOS DATOS 
        type: "post",
        beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX 
            $("#s_tabla").html("..... Consultando");
        },
        success: function (response) { //FUNCION QUE ME DEVUELVE CUANDO HAYA PROCESADO 
            //alert(response);

            Tblmedicamentos();

        },
        error: function () {
            alert("error");
            //location.href = $("#index").val();
        }
    });
}



//Funcion para el inicio de sesión
function Tblproductos() {
    var newUrl = $("#tblproductos").val();
    var parametros = {
        "idproducto": $('#idproducto').val(),
        "id_factura": $('#id_factura').val(),
        "cantidad": $('#cantidad').val(),
        "descuento": $('#descuento').val(),
    };
    if ($("#cantidad").val().length == 0 || $("#descuento").val().length == 0) {
        parametros = null;
        alert("Datos vacíos");
    } else {
        $.ajax({
            data: parametros, //ENVIO LOS PARAMETROS 
            url: newUrl, //PAGINA QUE PROCESA LOS DATOS 
            type: "post",
            beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX 
                $("#s_factura").html("..... Consultando " + $('#idproducto').val());
            },
            success: function (response) { //FUNCION QUE ME DEVUELVE CUANDO HAYA PROCESADO 
                //alert(response);

                $('#s_factura').html(response);

            },
            error: function (response) {
                alert("error " + $('#idproducto').val());
                //location.href = $("#index").val();
            }
        });
    }
}



//Funcion para el inicio de sesión
function Guardarfactura() {
    var newUrl = $("#guardardetfactura").val();
    var parametros = 0;

    $.ajax({
        data: parametros, //ENVIO LOS PARAMETROS 
        url: newUrl, //PAGINA QUE PROCESA LOS DATOS 
        type: "post",
        beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX 
            $("#s_factura").html("Guardando");
        },
        success: function (response) { //FUNCION QUE ME DEVUELVE CUANDO HAYA PROCESADO 
            //alert(response);

            $('#s_factura').html(response);

        },
        error: function () {
            alert("error");
            
            //location.href = $("#index").val();
        }
    });
}

function Limpiarfactura() {
    var newUrl = $("#limpiarfactura").val();

    $.ajax({
        url: newUrl, //PAGINA QUE PROCESA LOS DATOS 
        type: "post",
        beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX 
            $("#s_factura").html("Borrando la lista");
        },
        success: function (response) { //FUNCION QUE ME DEVUELVE CUANDO HAYA PROCESADO 
            //alert(response);

            $('#s_factura').html(response);

        },
        error: function () {
            alert("error");
            //location.href = $("#index").val();
        }
    });
}

function mttoDepartamentos() {
    //$("#btn-guardaralumno").attr("disabled","true");
    var newUrl = $("#guardardepartamento").val();
    var parametros = {
        "descripcion": $("#descripcion").val(),
    };
    if ($("#descripcion").val().length == 0) {
        parametros = null;
        alert("Datos vacíos");
    } else {
        $.ajax({
            data: parametros, //ENVIO LOS PARAMETROS 
            url: newUrl, //PAGINA QUE PROCESA LOS DATOS 
            type: "post",
            //dataType:"json",
            beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX 
                //$("#s_msn").html("<img  src='"+$("#loader").val()+"' border='0' width='100px'/> " );
                alert("Guardando", "Espere un momento ");
            },

            success: function (response) {
                alert("Se ha guardado el Registro");
            },
            error: function () {
                alert("error");

            }
        });
    }
}

function actualizarDepartamento() {
    //$("#btn-guardaralumno").attr("disabled","true");
    //alert('entro');
    var newUrl = $("#actualizardepartamento").val();
    var parametros = {
        "id_departamento": $("#id_departamento").val(),
        "descripcion": $("#descripcion").val(),

    };
    $.ajax({
        data: parametros, //ENVIO LOS PARAMETROS
        url: newUrl, //PAGINA QUE PROCESA LOS DATOS
        type: "post",
        //dataType:"json",
        beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX
            //$("#s_msn").html("<img src='"+$("#loader").val()+"' border='0' width='100px'/> " );
            alert("Actualizando", "Espere un momento ");
        },

        success: function (response) {
            alert("Se ha guardado el Registro");
        },
        error: function () {
            alert("error");
        }
    });
}

function eliminarDepartamento() {
    //$("#btn-guardaralumno").attr("disabled","true");
    //alert('entro');
    var newUrl = $("#eliminardepartamento").val();
    var parametros = {
        "id_departamento": $("#id_departamento").val(),
    };
    $.ajax({
        data: parametros, //ENVIO LOS PARAMETROS
        url: newUrl, //PAGINA QUE PROCESA LOS DATOS
        type: "post",
        //dataType:"json",
        beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX
            //$("#s_msn").html("<img src='"+$("#loader").val()+"' border='0' width='100px'/> " );
            alert("Eliminando", "Espere un momento ");
        },

        success: function (response) {
            alert("Se ha eliminado el Registro");
        },
        error: function () {
            alert("error");
        }
    });
}

function mttoMunicipios() {
    //$("#btn-guardaralumno").attr("disabled","true");
    alert('entro');
    var newUrl = $("#guardarmunicipio").val();
    var parametros = {
        "descripcion": $("#descripcion").val(),
        "id_departamento": $("#id_departamento").val(),

    };
    if ($("#descripcion").val().length == 0 || $("#id_departamento").val().length == 0) {
        parametros = null;
        alert("Datos vacíos");
    } else {
        $.ajax({
            data: parametros, //ENVIO LOS PARAMETROS 
            url: newUrl, //PAGINA QUE PROCESA LOS DATOS 
            type: "post",
            //dataType:"json",
            beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX 
                //$("#s_msn").html("<img  src='"+$("#loader").val()+"' border='0' width='100px'/> " );
                alert("Guardando", "Espere un momento ");
            },

            success: function (response) {
                alert("Se ha guardado el Registro");
            },
            error: function () {
                alert("error");

            }
        });
    }
}

function actualizarMunicipios() {
    //$("#btn-guardaralumno").attr("disabled","true");
    //alert('entro');
    var newUrl = $("#actualizarmunicipio").val();
    var parametros = {
        "id_municipio": $("#id_municipio").val(),
        "descripcion": $("#descripcion").val(),
        "id_departamento": $("#id_departamento").val(),
    };
    $.ajax({
        data: parametros, //ENVIO LOS PARAMETROS
        url: newUrl, //PAGINA QUE PROCESA LOS DATOS
        type: "post",
        //dataType:"json",
        beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX
            //$("#s_msn").html("<img src='"+$("#loader").val()+"' border='0' width='100px'/> " );
            alert("Actualizando", "Espere un momento ");
        },

        success: function (response) {
            alert("Se ha guardado el Registro");
        },
        error: function () {
            alert("error");
        }
    });
}

function eliminarMunicipios() {
    //$("#btn-guardaralumno").attr("disabled","true");
    //alert('entro');
    var newUrl = $("#eliminarmunicipio").val();
    var parametros = {
        "id_municipio": $("#id_municipio").val(),
    };
    $.ajax({
        data: parametros, //ENVIO LOS PARAMETROS
        url: newUrl, //PAGINA QUE PROCESA LOS DATOS
        type: "post",
        //dataType:"json",
        beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX
            //$("#s_msn").html("<img src='"+$("#loader").val()+"' border='0' width='100px'/> " );
            alert("Eliminando", "Espere un momento ");
        },

        success: function (response) {
            alert("Se ha eliminado el Registro");
        },
        error: function () {
            alert("error");
        }
    });
}

function mttoClientes() {
    //$("#btn-guardaralumno").attr("disabled","true");
    //alert('entro');
    var newUrl = $("#guardarcliente").val();
    var parametros = {
        "nombre_cliente": $("#nombre_cliente").val(),
        "apellido_cliente": $("#apellido_cliente").val(),
        "direccion": $("#direccion").val(),
        "id_municipio": $("#id_municipio").val(),
    };
    if ($("#nombre_cliente").val().length == 0 || $("#apellido_cliente").val().length == 0 ||
        $("#direccion").val().length == 0 || $("#id_municipio").val().length == 0) {
        parametros = null;
        alert("Datos vacíos");
    } else {
        $.ajax({
            data: parametros, //ENVIO LOS PARAMETROS 
            url: newUrl, //PAGINA QUE PROCESA LOS DATOS 
            type: "post",
            //dataType:"json",
            beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX 
                //$("#s_msn").html("<img  src='"+$("#loader").val()+"' border='0' width='100px'/> " );
                alert("Guardando", "Espere un momento ");
            },

            success: function (response) {
                alert("Se ha guardado el Registro");
            },
            error: function () {
                alert("error");

            }
        });
    }
}

function actualizarClientes() {
    //$("#btn-guardaralumno").attr("disabled","true");
    //alert('entro');
    var newUrl = $("#actualizarcliente").val();
    var parametros = {
        "id_cliente": $("#id_cliente").val(),
        "nombre_cliente": $("#nombre_cliente").val(),
        "apellido_cliente": $("#apellido_cliente").val(),
        "direccion": $("#direccion").val(),
        "id_municipio": $("#id_municipio").val(),
    };
    $.ajax({
        data: parametros, //ENVIO LOS PARAMETROS
        url: newUrl, //PAGINA QUE PROCESA LOS DATOS
        type: "post",
        //dataType:"json",
        beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX
            //$("#s_msn").html("<img src='"+$("#loader").val()+"' border='0' width='100px'/> " );
            alert("Actualizando", "Espere un momento ");
        },

        success: function (response) {
            alert("Se ha guardado el Registro");
        },
        error: function () {
            alert("error");
        }
    });
}

function eliminarClientes() {
    //$("#btn-guardaralumno").attr("disabled","true");
    //alert('entro');
    var newUrl = $("#eliminarcliente").val();
    var parametros = {
        "id_cliente": $("#id_cliente").val(),
    };
    $.ajax({
        data: parametros, //ENVIO LOS PARAMETROS
        url: newUrl, //PAGINA QUE PROCESA LOS DATOS
        type: "post",
        //dataType:"json",
        beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX
            //$("#s_msn").html("<img src='"+$("#loader").val()+"' border='0' width='100px'/> " );
            alert("Eliminando", "Espere un momento ");
        },

        success: function (response) {
            alert("Se ha eliminado el Registro");
        },
        error: function () {
            alert("error");
        }
    });
}

function mttoProducto() {
    //$("#btn-guardaralumno").attr("disabled","true");
    //alert('entro');
    var newUrl = $("#guardarproducto").val();
    var parametros = {
        "nombre_producto": $("#nombre_producto").val(),
        "precio": $("#precio").val(),
        "debaja": $("#debaja").val(),

    };
    if ($("#nombre_producto").val().length == 0 || $("#precio").val().length == 0) {
        parametros = null;
        alert("Datos vacíos");
    } else {
        $.ajax({
            data: parametros, //ENVIO LOS PARAMETROS 
            url: newUrl, //PAGINA QUE PROCESA LOS DATOS 
            type: "post",
            //dataType:"json",
            beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX 
                //$("#s_msn").html("<img  src='"+$("#loader").val()+"' border='0' width='100px'/> " );
                alert("Guardando", "Espere un momento ");
            },

            success: function (response) {
                alert("Se ha guardado el Registro");
            },
            error: function () {
                alert("error");
            }
        });
    }
}

function actualizarProductos() {
    //$("#btn-guardaralumno").attr("disabled","true");
    //alert('entro');
    var newUrl = $("#actualizarproducto").val();
    var parametros = {
        "id_producto": $("#id_producto").val(),
        "nombre_producto": $("#nombre_producto").val(),
        "precio": $("#precio").val(),
    };
    $.ajax({
        data: parametros, //ENVIO LOS PARAMETROS
        url: newUrl, //PAGINA QUE PROCESA LOS DATOS
        type: "post",
        //dataType:"json",
        beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX
            //$("#s_msn").html("<img src='"+$("#loader").val()+"' border='0' width='100px'/> " );
            alert("Actualizando", "Espere un momento ");
        },

        success: function (response) {
            alert("Se ha guardado el Registro");
        },
        error: function () {
            alert("error");
        }
    });
}

function eliminarProductos() {
    //$("#btn-guardaralumno").attr("disabled","true");
    //alert('entro');
    var newUrl = $("#eliminarproducto").val();
    var parametros = {
        "id_producto": $("#id_producto").val(),
    };
    $.ajax({
        data: parametros, //ENVIO LOS PARAMETROS
        url: newUrl, //PAGINA QUE PROCESA LOS DATOS
        type: "post",
        //dataType:"json",
        beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX
            //$("#s_msn").html("<img src='"+$("#loader").val()+"' border='0' width='100px'/> " );
            alert("Eliminando", "Espere un momento ");
        },

        success: function (response) {
            alert("Se ha eliminado el Registro");
        },
        error: function () {
            alert("error");
        }
    });
}

function mttoFactura() {
    //$("#btn-guardaralumno").attr("disabled","true");
    //alert('entro');
    var newUrl = $("#guardarfactura").val();
    var parametros = {
        "id_cliente": $("#id_cliente").val(),
        "fecha": $("#fecha").val(),
        "num_factura": $("#num_factura").val(),
        "iva": $("#iva").val(),
        "tipo_factura": $("#tipo_factura").val(),

    };
    if ($("#id_cliente").val().length == 0 || $("#fecha").val().length == 0 ||
        $("#num_factura").val().length == 0 || $("#iva").val().length == 0 || $("#tipo_factura").val().length == 0) {
        parametros = null;
        alert("Datos vacíos");
    } else {
        $.ajax({
            data: parametros, //ENVIO LOS PARAMETROS 
            url: newUrl, //PAGINA QUE PROCESA LOS DATOS 
            type: "post",
            //dataType:"json",
            beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX 
                //$("#s_msn").html("<img  src='"+$("#loader").val()+"' border='0' width='100px'/> " );
                alert("Guardando", "Espere un momento ");
            },

            success: function (response) {
                alert("Se ha guardado el Registro");
            },
            error: function () {
                alert("error");
            }
        });
    }
}

function actualizarFactura() {
    //$("#btn-guardaralumno").attr("disabled","true");
    //alert('entro');
    var newUrl = $("#actualizarfactura").val();
    var parametros = {
        "id_factura": $("#id_factura").val(),
        "fecha": $("#fecha").val(),
        "num_factura": $("#num_factura").val(),
        "tipo_factura": $("#tipo_factura").val(),
    };
    $.ajax({
        data: parametros, //ENVIO LOS PARAMETROS
        url: newUrl, //PAGINA QUE PROCESA LOS DATOS
        type: "post",
        //dataType:"json",
        beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX
            //$("#s_msn").html("<img src='"+$("#loader").val()+"' border='0' width='100px'/> " );
            alert("Actualizando", "Espere un momento ");
        },

        success: function (response) {
            alert("Se ha actualizado el Registro");
        },
        error: function () {
            alert("error");
        }
    });
}

function eliminarFactura() {
    //$("#btn-guardaralumno").attr("disabled","true");
    //alert('entro');
    var newUrl = $("#eliminarfactura").val();
    var parametros = {
        "id_factura": $("#id_factura").val(),
    };
    $.ajax({
        data: parametros, //ENVIO LOS PARAMETROS
        url: newUrl, //PAGINA QUE PROCESA LOS DATOS
        type: "post",
        //dataType:"json",
        beforeSend: function () { //FUNCION QUE HACE LO QUE ANTES DE QUE SE EJECUTE EL AJAX
            //$("#s_msn").html("<img src='"+$("#loader").val()+"' border='0' width='100px'/> " );
            alert("Eliminando", "Espere un momento ");
        },

        success: function (response) {
            alert("Se ha eliminado el Registro");
        },
        error: function () {
            alert("error");
        }
    });
}