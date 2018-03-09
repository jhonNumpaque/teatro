$().ready(function(){
    //Estructura de tablas
    try {
        $('#table').DataTable({
            "pageLength":5,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No Existen Registros...",
                "info": "Página _PAGE_ de _PAGES_ ",
                "infoEmpty": "No existen datos",
                "infoFiltered": "(Filtrado de _MAX_ registros)",
                "sInfo":"Mostrando _START_ - _END_ de _TOTAL_ registros","sInfoEmpty":"Mostrando 0 - 0 de 0 registros",
                "sSearch":"Buscar",
                "paginate":{
                    "sPrevious": "Anterior",
                    "sNext": "Siguiente",
                    "sFirst": "Primero",
                    "sLast": "Ultimo"
                },
                "sEmptyTable": "No hay registros.",
                "columnDefs":[{
                    "targets":0,
                    "searchable":false,
                    "orderable":false,
                    "className": "dt-body-center"
                }]
            },
            "aLengthMenu":[1, 5, 10, 15, 25, 50, 100]
        });
    }catch(err) {}
    //Validacion para formulario
    $("#form").validate({
        ignore:       "",
        errorElement: "span",
        errorPlacement: function(error, element){
            error.addClass('text-danger');
            error.insertBefore(element);
        },
        highlight: function(element, errorClass, validClass){
            var e = $(element);
            $(element).addClass('is-invalid').removeClass('is-valid');
            $("#"+e.attr("id")+"_chosen").addClass('text-danger').removeClass('text-success');
            $("#"+e.attr("id")+"_chosen").addClass('borde-error');
            if($(element).is(":checkbox")){
                $(element.form).find("input[type=checkbox]").each(function(which){
                    $(element.form).find("label[for=" + this.id + "]").addClass("text-danger");
                    $(this).addClass("text-danger");
                });
            }
        },
        unhighlight:function(element, errorClass, validClass){
            var e = $(element);
            $(element).addClass('is-valid').removeClass('is-invalid');
            $("#"+e.attr("id")+"_chosen").addClass('text-success').removeClass('text-danger');
            $("#"+e.attr("id")+"_chosen").removeClass('borde-error');
        }
    });
    //Validación para formulario en linea
    $("#form-inline").validate({
        ignore:       "",
        errorElement:"span",
        rules:{
            sltTercero:{required:true},
            txtParticipacion:{required:true},
            optPropietario:{required:true},
            sltTercero_chosen:{required:true}
        },
        messages:{
            sltTercero:"Seleccione un tercero",
            sltTercero_chosen:"Seleccione un tercero",
            txtParticipacion:"Ingrese porcentaje de participación",
            optPropietario:"Seleccione apropiación"
        },
        errorPlacement: function(error, element) {
            element.addClass('text-danger');
        },
        highlight: function(element, errorClass, validClass){
            var e = $(element);
            $(element).addClass('is-invalid').removeClass('is-valid');
            $("#"+e.attr("id")+"_chosen").addClass('text-danger').removeClass('text-success');
            $("#"+e.attr("id")+"_chosen").addClass('borde-error');
            if($(element).is(":checkbox")){
                $(element.form).find("input[type=checkbox]").each(function(which){
                    $(element.form).find("label[for=" + this.id + "]").addClass("text-danger");
                    $(this).addClass("text-danger");
                });
            }
        },
        unhighlight:function(element, errorClass, validClass){
            var e = $(element);
            $(element).addClass('is-valid').removeClass('is-invalid');
            $("#"+e.attr("id")+"_chosen").removeClass('text-danger');
            $("#"+e.attr("id")+"_chosen").removeClass('borde-error');
            $("#"+e.attr("id")).removeClass('text-danger');
            if($(element).is(":radio")){
                $(element.form).find("input[type=radio]").each(function(which){
                    $(element.form).find("label[for=" + this.id + "]").removeClass('text-danger');
                    $(this).removeClass("text-danger");
                });
            }
        }
    });
    //Validación para formulario sin mensaje
    $("#form-update").validate({
        ignore:       "",
        errorElement:"span",
        rules:{
            sltTercero:{required:true},
            txtParticipacion:{required:true},
            optPropietario:{required:true},
            sltTercero_chosen:{required:true}
        },
        messages:{
            sltTercero:"Seleccione un tercero",
            sltTercero_chosen:"Seleccione un tercero",
            txtParticipacion:"Ingrese porcentaje de participación",
            optPropietario:"Seleccione apropiación"
        },
        errorPlacement: function(error, element) {
            element.addClass('text-danger');
        },
        highlight: function(element, errorClass, validClass){
            var e = $(element);
            $(element).addClass('is-invalid').removeClass('is-valid');
            $("#"+e.attr("id")+"_chosen").addClass('text-danger').removeClass('text-success');
            $("#"+e.attr("id")+"_chosen").addClass('borde-error');
            if($(element).is(":radio")){
                $(element.form).find("input[type=radio]").each(function(which){
                    $(element.form).find("label[for=" + this.id + "]").addClass("text-danger");
                    $(this).addClass("text-danger");
                });
            }
        },
        unhighlight:function(element, errorClass, validClass){
            var e = $(element);
            $(element).addClass('is-valid').removeClass('is-invalid');
            $("#"+e.attr("id")+"_chosen").removeClass('borde-error');
            $("#"+e.attr("id")+"_chosen").addClass('text-success').removeClass('text-danger');
            $("#"+e.attr("id")).removeClass('text-danger');
        }
    });
    //Definición de combobox con campo de consulta
    $('.select').chosen({
        no_results_text: "Sin resultados para ",
        placeholder_text_single: "Seleccione una opción",
        placeholder_text_multiple: "Seleccione mas opciones"
    });
});
//Cargue de modal flash
$("#flash-overlay-modal").modal("show");

$("#txtAnno, .anno").datepicker({
    format: " yyyy",
    viewMode: "years",
    minViewMode: "years",
    autoclose:true,
    showButtonPanel: true,
    clearBtn: true,
    language:"es",
});

$("#txtFecha, .fecha").datepicker({
    showOtherMonths:true,
    changeYear: true,
    showButtonPanel: true,
    language:"es",
    autoclose:true,
    format:"dd/mm/yyyy"
});

function restarFechas(f1, f2){
    var aFecha1 = f1.split("/"); var aFecha2 = f2.split("/");
    var fFecha1 = Date.UTC(aFecha1[2], aFecha1[1]-1, aFecha1[0]);
    var fFecha2 = Date.UTC(aFecha2[2], aFecha2[1]-1, aFecha2[0]);
    var dif  = fFecha2 - fFecha1;
    var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
    return dias;
}

// formatea un numero según una mascara dada ej: "-$###,###,##0.00"
//
// elm   = elemento html <input> donde colocar el resultado
// n     = numero a formatear
// mask  = mascara ej: "-$###,###,##0.00"
// force = formatea el numero aun si n es igual a 0
//
// La función devuelve el numero formateado
function MASK(form, n, mask, format) {
    if (format == "undefined") format = false;
    if (format || NUM(n)) {
        dec = 0, point = 0;
        x = mask.indexOf(".")+1;
        if (x) { dec = mask.length - x; }
        if (dec) {
            n = NUM(n, dec)+"";
            x = n.indexOf(".")+1;
            if (x) { point = n.length - x; } else { n += "."; }
        } else {
            n = NUM(n, 0)+"";
        }
        for (var x = point; x < dec ; x++) {
            n += "0";
        }
        x = n.length, y = mask.length, XMASK = "";
        while ( x || y ) {
            if ( x ) {
                while ( y && "#0.".indexOf(mask.charAt(y-1)) == -1 ) {
                    if ( n.charAt(x-1) != "-")
                        XMASK = mask.charAt(y-1) + XMASK;
                    y--;
                }
                XMASK = n.charAt(x-1) + XMASK, x--;
            } else if ( y && "$0".indexOf(mask.charAt(y-1))+1 ) {
                XMASK = mask.charAt(y-1) + XMASK;
            }
            if ( y ) { y-- }
        }
    } else {
        XMASK="";
    }
    if (form) {
        form.value = XMASK;
        if (NUM(n)<0) {
            form.style.color="#FF0000";
        } else {
            form.style.color="#000000";
        }
    }
    return XMASK;
}

// Convierte una cadena alfanumérica a numérica (incluyendo formulas aritméticas)
//
// s   = cadena a ser convertida a numérica
// dec = numero de decimales a redondear
//
// La función devuelve el numero redondeado

function NUM(s, dec) {
    for (var s = s+"", num = "", x = 0 ; x < s.length ; x++) {
        c = s.charAt(x);
        if (".-+/*".indexOf(c)+1 || c != " " && !isNaN(c)) { num+=c; }
    }
    if (isNaN(num)) { num = eval(num); }
    if (num == "")  { num=0; } else { num = parseFloat(num); }
    if (dec != undefined) {
        r=.5; if (num<0) r=-r;
        e=Math.pow(10, (dec>0) ? dec : 0 );
        return parseInt(num*e+r) / e;
    } else {
        return num;
    }
}

$.fn.limitarCheckbox = function(num){
    var check = this;

    this.click(function(){ return (check.filter(":checked").length<=num); });
}

//Bloqueo de teclas y menu contextual
$(document).keydown(function(event){
    if(event.keyCode==123){
        return false;
    }
    else if (event.ctrlKey && event.shiftKey && event.keyCode==73){
             return false;
    }
});

$(document).on("contextmenu",function(e){
   e.preventDefault();
});