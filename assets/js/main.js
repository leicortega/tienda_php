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
                console.log(data);
                if (data == 1) {
                    $('#mensajes').html(`
                        <div class="alert alert-success bg-success text-white" role="alert">
                            El producto se creo correctamente.
                        </div>
                    `);
                    $('.bs-example-modal-xl').modal('hide');
                    $('#form_agregar_producto')[0].reset();
                } else {
                    $('#mensajes').html(`
                        <div class="alert alert-danger bg-danger text-white" role="alert">
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

});