$(document).ready(function () {
    
    // Petcion AJAX para el login
    $('#form_login').submit(function () {
        $.ajax({
            url: 'assets/php/login.php',
            type: 'POST',
            data: $('#form_login').serialize(),
            success: function (data) {
                if (data == 1) {
                    window.location.href = 'index.php';
                } else {
                    $('#text-error-login').removeClass('d-none');
                    $('#password').addClass('is-invalid');
                    $('#identificacion').addClass('is-invalid');
                    $('#form_login')[0].reset();
                }
            }
        })
    
        return false;
    });

    // Peticon AJAX para agregar producto
    $('#form_agregar_producto').submit(function () {
        $.ajax({
            url: 'assets/php/agregar_producto.php',
            type: 'POST',
            data: $('#form_agregar_producto').serialize(),
            success: function (data) {
                if (data == 1) {
                    mostrar_tabla();

                    setTimeout(function() {
                        $(".alert1").fadeOut(1500);
                    },3000);
                     
                    setTimeout(function() {
                        $(".alert2").fadeOut(1500);
                    },15000);

                    $('#mensajes').html(`
                        <div class="alert alert1 alert-success bg-success text-white" role="alert">
                            El producto se creo correctamente.
                        </div>
                    `);
                    $('.bs-example-modal-xl').modal('hide');
                    $('#form_agregar_producto')[0].reset();
                    
                } else {
                    $('#mensajes').html(`
                        <div class="alert alert2 alert-danger bg-danger text-white" role="alert">
                            El producto NO se creo correctamente. Contacte al desarrollador.
                        </div>
                    `);
                    $('.bs-example-modal-xl').modal('hide');
                    $('#form_agregar_producto')[0].reset();
                }
            }
        })
    
        return false;
    });

    // Peticon AJAX para agregar categoria
    $('#form_agregar_categoria').submit(function () {
        $.ajax({
            url: 'assets/php/agregar_categoria.php',
            type: 'POST',
            data: $('#form_agregar_categoria').serialize(),
            success: function (data) {
                if (data == 1) {
                    mostrar_tabla_categorias();

                    setTimeout(function() {
                        $(".alert1").fadeOut(1500);
                    },3000);
                     
                    setTimeout(function() {
                        $(".alert2").fadeOut(1500);
                    },15000);

                    $('#mensajes').html(`
                        <div class="alert alert1 alert-success bg-success text-white" role="alert">
                            La Categoria se creo correctamente.
                        </div>
                    `);
                    $('.bs-example-modal-xl').modal('hide');
                    $('#form_agregar_categoria')[0].reset();
                    
                } else {
                    $('#mensajes').html(`
                        <div class="alert alert2 alert-danger bg-danger text-white" role="alert">
                            La Categoria NO se creo correctamente. Contacte al desarrollador.
                        </div>
                    `);
                    $('.bs-example-modal-xl').modal('hide');
                    $('#form_agregar_categoria')[0].reset();
                }
            }
        })
    
        return false;
    });

    // Peticon AJAX para EDITAR producto
    $('#form_editar_producto').submit(function () {
        $.ajax({
            url: 'assets/php/editar_producto.php',
            type: 'POST',
            data: $('#form_editar_producto').serialize(),
            success: function (data) {
                if (data == 1) {
                    mostrar_tabla();

                    setTimeout(function() {
                        $(".alert1").fadeOut(1500);
                    },3000);

                    $('#mensajes').html(`
                        <div class="alert alert1 alert-success bg-success text-white" role="alert">
                            El producto se edito correctamente.
                        </div>
                    `);
                    $('.modal_editar_productos').modal('hide');
                    $('#form_editar_producto')[0].reset();
                    
                } else {
                    setTimeout(function() {
                        $(".alert2").fadeOut(1500);
                    },15000);

                    $('#mensajes').html(`
                        <div class="alert alert2 alert-danger bg-danger text-white" role="alert">
                            El producto NO se edito correctamente. Contacte al desarrollador.
                        </div>
                    `);
                    $('.modal_editar_productos').modal('hide');
                    $('#form_editar_producto')[0].reset();
                }
            }
        })
    
        return false;
    });

    // Peticon AJAX para EDITAR categoria
    $('#form_editar_categoria').submit(function () {
        $.ajax({
            url: 'assets/php/editar_categoria.php',
            type: 'POST',
            data: $('#form_editar_categoria').serialize(),
            success: function (data) {
                if (data == 1) {
                    mostrar_tabla_categorias();

                    setTimeout(function() {
                        $(".alert1").fadeOut(1500);
                    },3000);

                    $('#mensajes').html(`
                        <div class="alert alert1 alert-success bg-success text-white" role="alert">
                            La Categoria se edito correctamente.
                        </div>
                    `);
                    $('.modal_editar_categoria').modal('hide');
                    $('#form_editar_categoria')[0].reset();
                    
                } else {
                    setTimeout(function() {
                        $(".alert2").fadeOut(1500);
                    },15000);

                    $('#mensajes').html(`
                        <div class="alert alert2 alert-danger bg-danger text-white" role="alert">
                            La Categoria NO se edito correctamente. Contacte al desarrollador.
                        </div>
                    `);
                    $('.modal_editar_categoria').modal('hide');
                    $('#form_editar_categoria')[0].reset();
                }
            }
        })
    
        return false;
    });

    // Condicion para mostrar la tabla si esta en la ruta productos.php
    if (window.location.pathname == '/tienda_php/productos.php') {
        mostrar_tabla(page = 1)
    }
    // Condicion para mostrar la tabla si esta en la ruta productos.php
    if (window.location.pathname == '/tienda_php/categorias.php') {
        mostrar_tabla_categorias()
    }

    // Funcion para enviar respuesta de correo
    $('#form_responder_correo').submit(function () {
        var respuesta = $('#respuesta').html();
        var id = $('#id_correo').val();

        $('#btn-respuesta').attr('disabled', true).html(`
            <div class="spinner-border text-light" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        `);


        $.ajax({
            url: 'assets/php/responder_correo.php',
            type: 'POST',
            data: { id:id, respuesta:respuesta },
            success: function (data) {
                if (data != 1) {
                    setTimeout(function() {
                        $(".alert2").fadeOut(1500);
                    },3000);
                    $('#btn-respuesta').removeAttr('disabled').html(`
                        <span>Enviar</span> <i class="fab fa-telegram-plane ml-1"></i> 
                    `);
                    $('#mensajes').html(`
                        <div class="alert alert2 alert-danger bg-danger text-white" role="alert">
                            ERROR! el correo no fue enviado. Contacte al desarrollador.
                        </div>
                    `);
                } else {
                    window.location.href = 'email-contestados.php';
                }

            }
        });

        return false;
    });

});
//-----------------------------------------------------------------------PRODUCTOS---------------------------------------------------------------
// Funcion con peticion AJAX para mostrar la tabla de productos
function mostrar_tabla(page) {
    $.ajax({
        url: 'assets/php/mostrar_tabla.php',
        type: 'GET',
        data: { page:page },
        success: function (data) {
            $('#div_mostrar_tabla').html(data)
        }
    });
}

// Funcion con peticion AJAX para editar productos
function editar(id) {
    $.ajax({
        url: 'assets/php/mostrar_datos_editar.php',
        type: 'POST',
        dataType: "json",
        data: { id:id },
        success: function (data) {
            $('#id_editar').val(data.result[0].id)
            $('#nombre_editar').val(data.result[0].nombre)
            $('#descripcion_editar').val(data.result[0].descripcion)
            $('#precio_editar').val(data.result[0].precio)
            $('#categoria_editar').val(data.result[0].categoria)
            $('.modal_editar_productos').modal('show');
        }
    })
}

// Funcion con peticion AJAX para eliminar productos
function eliminar(id) {
    if (window.confirm("Seguro que desea eliminar el producto: "+id)) { 
        $.ajax({
            url: 'assets/php/eliminar_producto.php',
            type: 'POST',
            data: { id:id },
            success: function (data) {
                if (data == 1) {
                    mostrar_tabla()

                    setTimeout(function() {
                        $(".alert1").fadeOut(1500);
                    },3000);

                    $('#mensajes').html(`
                        <div class="alert alert1 alert-success bg-success text-white" role="alert">
                            El producto se elimino correctamente.
                        </div>
                    `);
                    
                } else {
                    setTimeout(function() {
                        $(".alert2").fadeOut(1500);
                    },15000);

                    $('#mensajes').html(`
                        <div class="alert alert2 alert-danger bg-danger text-white" role="alert">
                            El producto NO se elimino correctamente. Contacte al desarrollador.
                        </div>
                    `);
                }
            }
        });
    }
}
// ---------------------------------------------------------CATEGORIAS------------------------------------------------------------------------------------
// Funcion con peticion AJAX para mostrar la tabla de categorias
function mostrar_tabla_categorias() {
    var page = 1;
    $.ajax({
        url: 'assets/php/mostrar_tabla_categoria.php',
        type: 'GET',
        data: { page:page },
        success: function (data) {
            $('#div_mostrar_tabla_categoria').html(data)
        }
    });
}

// Funcion con peticion AJAX para editar categorias
function editar_categorias(id) {
    $.ajax({
        url: 'assets/php/mostrar_datos_editar_categoria.php',
        type: 'POST',
        dataType: "json",
        data: { id:id },
        success: function (data) {
            $('#id_editar_categoria').val(data.result[0].id)
            $('#nombre_editar_categoria').val(data.result[0].nombre)
            $('.modal_editar_categoria').modal('show');
        }
    })
}

// Funcion con peticion AJAX para eliminar categorias
function eliminar_categorias(id) {
    if (window.confirm("Seguro que desea eliminar La Categoria: "+id)) { 
        $.ajax({
            url: 'assets/php/eliminar_categoria.php',
            type: 'POST',
            data: { id:id },
            success: function (data) {
                if (data == 1) {
                    mostrar_tabla_categorias()

                    setTimeout(function() {
                        $(".alert1").fadeOut(1500);
                    },3000);

                    $('#mensajes').html(`
                        <div class="alert alert1 alert-success bg-success text-white" role="alert">
                            La categoria se elimino correctamente.
                        </div>
                    `);
                    
                } else {
                    setTimeout(function() {
                        $(".alert2").fadeOut(1500);
                    },15000);

                    $('#mensajes').html(`
                        <div class="alert alert2 alert-danger bg-danger text-white" role="alert">
                            La categoria NO se elimino correctamente. Contacte al desarrollador.
                        </div>
                    `);
                }
            }
        });
    }
}