function addRecord() {

    var idproducto = $("#idproducto").val();
    var producto = $("#producto").val();
    var cantidad = $("#cantidad").val();
    var tipo = $("#tipo").val();

    $.post("ajax/anadirDato.php", {
        idproducto: idproducto,
        producto: producto,
        cantidad: cantidad,
		tipo: tipo
    }, function (data, status) {

        $("#add_new_record_modal").modal("hide");

        readRecords();

        $("#idproducto").val("");
        $("#producto").val("");
        $("#cantidad").val("");
        $("#tipo").val("");
    });
}

function readRecords() {
    $.get("ajax/leerDatos.php", {}, function (data, status) {
        $("#records_content").html(data);
    });
}


function DeleteUser(id) {
    var conf = confirm("¿Está seguro de eliminar el registro?");
    if (conf == true) {
        $.post("ajax/elimindarDato.php", {
                id: id
            },
            function (data, status) {
                readRecords();
            }
        );
    }
}

function GetUserDetails(id) {

    $("#hidden_user_id").val(id);
    $.post("ajax/leerDatoSeleccionado.php", {
            id: id
        },
        function (data, status) {
            var user = JSON.parse(data);
            $("#update_idproducto").val(user.idproducto);
            $("#update_producto").val(user.producto);
            $("#update_cantidad").val(user.cantidad);
            $("#update_tipo").val(user.tipo);
        }
    );

    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {

    var idproducto = $("#update_idproducto").val();
    var producto = $("#update_producto").val();
    var cantidad = $("#update_cantidad").val();
    var tipo = $("#update_tipo").val();

    var id = $("#hidden_user_id").val();

    $.post("ajax/actualizarDato.php", {
            idproducto: idproducto,
            producto: producto,
            cantidad: cantidad,
            tipo: tipo
        },
        function (data, status) {
            $("#update_user_modal").modal("hide");
            readRecords();
        }
    );
}

$(document).ready(function () {
    readRecords();
});