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

    // Condicion para mostrar la tabla si esta en la ruta productos.php
    if (window.location.pathname == '/tienda_php/productos.php') {
        mostrar_tabla()
    }

});

// Funcion con peticion AJAX para mostrar la tabla de productos
function mostrar_tabla() {
    $.ajax({
        url: 'assets/php/mostrar_tabla.php',
        type: 'GET',
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
                    mostrar_tabla();

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