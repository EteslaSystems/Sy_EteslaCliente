<?php $__env->startSection('content'); ?>

    <?php echo $__env->yieldContent('cotizadores'); ?>

    <?php $__env->startSection('scripts'); ?>
        <?php if(session('modal-fail')): ?>
            <script type="text/javascript">
                $("#modal-agregarcliente").modal("show");
            </script>
        <?php endif; ?>

        <script type="text/javascript">
            // Función invocada en los inputs tipo number, no permite insertar datos que no sean numéricos.
            $('#form-group-inputs input[type="number"]').keydown(function(event) {
                if (event.shiftKey) {
                    event.preventDefault();
                }

                if (event.keyCode != 46 && event.keyCode != 8 && event.keyCode != 37 && event.keyCode != 39) {
                    if($(this).val().length >= 11) {
                        event.preventDefault();
                    }
                }

                if (event.keyCode < 48 || event.keyCode > 57) {
                    if (event.keyCode < 96 || event.keyCode > 105) {
                        if(event.keyCode != 46 && event.keyCode != 8 && event.keyCode != 37 && event.keyCode != 39) {
                            event.preventDefault();
                        }
                    }
                }
            });

            // Función invocada en los inputs, no permite pegar datos.
            $('#form-group-inputs input[type="number"]').on('paste', function(e){
                e.preventDefault();
            });

            // Función invocada en los inputs, no permite copiar datos.
            $('#form-group-inputs input[type="number"]').on('copy', function(e){
                e.preventDefault();
            });

            // Función invocada mediante el select, muestra/oculta secciones.
            $("#tarifa-actual").change(function () {
                $("#tarifa-actual option:selected").each(function () {
                    $('#fm-mensual').collapse("show");
                });
            });

            // Función invocada mediante el checkbox, modifica valores/propiedades de inputs.
            $("#switch-2").change(function () {
                if ($('#switch-2').prop('checked')) {

                    for (var count = 2; count <= 12; count++) {
                        $("#men-val-" + count).attr("readonly", "readonly");
                        $("#men-val-" + count + "a").attr("readonly", "readonly");

                        var value1 = $("#men-val-1").val();
                        var value2 = $("#men-val-1a").val();

                        $("#men-val-" + count).val(value1);
                        $("#men-val-" + count + "a").val(value2);
                    }
                } else {
                    for (var count = 2; count <= 12; count++) {
                        $("#men-val-" + count).removeAttr("readonly", "readonly");
                        $("#men-val-" + count + "a").removeAttr("readonly", "readonly");
                    }
                }
            });

            // Función invocada por el input, agrega su valor a los demás.
            $("#men-val-1").keyup(function () {
                if ($('#switch-2').prop('checked')) {
                    for (var count = 2; count <= 12; count++) {
                        var value = $(this).val();

                        $("#men-val-" + count).val(value);
                    }
                }
            });

            $("#men-val-1a").keyup(function () {
                if ($('#switch-2').prop('checked')) {
                    for (var count = 2; count <= 12; count++) {
                        var value = $(this).val();

                        $("#men-val-" + count + "a").val(value);
                    }
                }
            });
        </script>

        <script type="text/javascript">
            function filterFloat(evt,input){
                // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
                var key = window.Event ? evt.which : evt.keyCode;
                var chark = String.fromCharCode(key);
                var tempValue = input.value+chark;
                if(key >= 48 && key <= 57) {
                    if(filter(tempValue)=== false) {
                        return false;
                    } else {
                        return true;
                    }
                } else {
                    if(key == 8 || key == 13 || key == 0) {
                        return true;
                    } else if(key == 46) {
                        if(filter(tempValue)=== false) {
                            return false;
                        } else {
                            return true;
                        }
                    } else {
                        return false;
                    }
                }
            }
            function filter(__val__){
                var preg = /^([0-9]+\.?[0-9]{0,2})$/;
                if(preg.test(__val__) === true) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('roles/seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sy_EteslaCliente\resources\views/roles/seller/cotizador/cotizador.blade.php ENDPATH**/ ?>