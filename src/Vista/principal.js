var idDocumento = null;

$(document).ready(function () {
  cargarTabla();
  cargarSelectProceso();
  cargarSelectTipoDocumento();
  $("#btnGuardar").click(function () {
    guardarDocumento();
  });

  $("#btnBuscar").click(function () {
    buscarDocumentoPorCodigo();
  });

  $("#btnSalir").click(function () {
    cerrarSession();
  });

});

function cargarTabla() {
  $.ajax({
    url: "../Controlador/DocumentoControlador.php",
    type: "POST",
    data: {
      accion: "mostrar",
    },
    dataType: "json",
    success: function (json) {

      // Limpiar la tabla
      $("#tblDocumentacion tbody").empty();
      $.each(json.datos, function (index, documento) {
        // Crear una nueva fila
        var row = $("<tr>");

        // Agregar las columnas de la tabla
        row.append($("<td>").text(documento.DOC_NOMBRE));
        row.append($("<td>").text(documento.DOC_CODIGO));
        row.append($("<td>").text(documento.DOC_CONTENIDO));
        row.append($("<td>").text(documento.PRO_NOMBRE));
        row.append($("<td>").text(documento.TIP_NOMBRE));
        // Agregar columna de Acción con opciones de editar y eliminar
        var accionColumn = $("<td>");
        var editarBtn = $("<button>").text("Editar");
        var eliminarBtn = $("<button>").text("Eliminar");

        // Agregar eventos a los botones de editar y eliminar
        editarBtn.on("click", function () {
          // Acción para editar
          editarDocumento(documento.DOC_ID);
        });

        eliminarBtn.on("click", function () {
          // Acción para eliminar
          eliminarDocumento(documento.DOC_ID);
        });

        // Agregar los botones a la columna de Acción
        accionColumn.append(editarBtn);
        accionColumn.append(eliminarBtn);

        // Agregar la columna de Acción a la fila
        row.append(accionColumn);

        // Agregar la fila a la tabla
        $("#tblDocumentacion tbody").append(row);
      });
    },
    error: function () {
      console.log("Error al obtener los documentos");
    },
  });
}

function cargarSelectProceso() {
  $.ajax({
    url: "../Controlador/ProcesoControlador.php",
    data: { accion: "mostrar" },
    type: "post",
    dataType: "json",
    cache: false,
    success: function (json) {
      if (json.datos != null) {
        $.each(json.datos, function (id, value) {
          $("#selProceso").append(
            '<option value="' + value.PRO_ID +'"   data-proceso_prefijo="' + value.PRO_PREFIJO +'">' +value.PRO_NOMBRE +"</option>"
          );
        });
      }
    },
    error: function (ex) {
      console.log(ex.responseText);
    },
  });
}

function cargarSelectTipoDocumento() {
  $.ajax({
    url: "../Controlador/TipoDocumentoControlador.php",
    data: { accion: "mostrar" },
    type: "post",
    dataType: "json",
    cache: false,
    success: function (json) {
      if (json.datos != null) {
        $.each(json.datos, function (id, value) {
          $("#selTipoDocumento").append(
            '<option value="' + value.TIP_ID +'"   data-tipo_documento_prefijo="' + value.TIP_PREFIJO +'">' +value.TIP_NOMBRE +"</option>"
          );
        });
      }
    },
    error: function (ex) {
      console.log(ex.responseText);
    },
  });
}

function guardarDocumento() {
  $.ajax({
    url: "../Controlador/DocumentoControlador.php",
    type: "POST",
    data: {
      accion: "guardar",
      idDocumento: idDocumento,
      nombre: $("#txtNombre").val(),
      contenido: $("#txtContenido").val(),
      idTipoDocumento: $("#selTipoDocumento").val(),
      tipoDocumentoPrefijo: $("#selTipoDocumento").find("option:selected").data("tipo_documento_prefijo"),
      procesoPrefijo:$("#selProceso").find("option:selected").data('proceso_prefijo'),
      idProceso: $("#selProceso").val(),
    },
    dataType: "json",
    success: function (json) {
        cargarTabla();
        idDocumento = null;
    },
    error: function () {
      console.log("Error al guardar los documentos");
    },
  });
}


function eliminarDocumento(id){
    $.ajax({
        url: "../Controlador/DocumentoControlador.php",
        type: "POST",
        data: {
          accion: "eliminar",
          idDocumento: id,
        },
        dataType: "json",
        success: function (json) {
            cargarTabla();
        },
        error: function () {
          console.log("Error al eliminar el documento seleccionado");
        },
      });
}

function editarDocumento(id){
    mostrarDocumentoPorId(id);
    idDocumento = id;
}

function mostrarDocumentoPorId(id){
    $.ajax({
        url: "../Controlador/DocumentoControlador.php",
        type: "POST",
        data: {
          accion: "mostrarPorId",
          idDocumento: id,
        },
        dataType: "json",
        success: function (json) {
            $("#liGuardar").find(".nav-link")[0].click();
            $("#txtNombre").val(json.datos[0].DOC_NOMBRE);
            $("#txtContenido").val(json.datos[0].DOC_CONTENIDO);
            $("#selTipoDocumento").val(json.datos[0].DOC_ID_TIPO);
            $("#selProceso").val(json.datos[0].DOC_ID_TIPO);
        },
        error: function () {
          console.log("Error al eliminar el documento seleccionado");
        },
      });
}


function buscarDocumentoPorCodigo() {
    $.ajax({
      url: "../Controlador/DocumentoControlador.php",
      type: "POST",
      data: {
        accion: "buscarPorCodigo",
        codigo: $("#txtCodigoBuscar").val()
      },
      dataType: "json",
      success: function (json) {
        $("#tblDocumentacion tbody").empty();
        $.each(json.datos, function (index, documento) {
          // Crear una nueva fila
          var row = $("<tr>");
  
          // Agregar las columnas de la tabla
          row.append($("<td>").text(documento.DOC_NOMBRE));
          row.append($("<td>").text(documento.DOC_CODIGO));
          row.append($("<td>").text(documento.DOC_CONTENIDO));
          row.append($("<td>").text(documento.PRO_NOMBRE));
          row.append($("<td>").text(documento.TIP_NOMBRE));
          // Agregar columna de Acción con opciones de editar y eliminar
          var accionColumn = $("<td>");
          var editarBtn = $("<button>").text("Editar");
          var eliminarBtn = $("<button>").text("Eliminar");
  
          // Agregar eventos a los botones de editar y eliminar
          editarBtn.on("click", function () {
            // Acción para editar
            editarDocumento(documento.DOC_ID);
          });
  
          eliminarBtn.on("click", function () {
            // Acción para eliminar
            eliminarDocumento(documento.DOC_ID);
          });
  
          // Agregar los botones a la columna de Acción
          accionColumn.append(editarBtn);
          accionColumn.append(eliminarBtn);
  
          // Agregar la columna de Acción a la fila
          row.append(accionColumn);
  
          // Agregar la fila a la tabla
          $("#tblDocumentacion tbody").append(row);
        });
      },
      error: function () {
        console.log("Error al guardar los documentos");
      },
    });
  }


function cerrarSession(){
    $.ajax({
        url: "../Controlador/SesionControlador.php",
        type: "POST",
        data: {},
        dataType: "json",
        success: function (json) {
            window.location.href = json.datos.rutaLogin;
        },
        error: function () {
          console.log("Error al cerrar session");
        },
      });
}