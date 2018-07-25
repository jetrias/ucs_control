<script type="text/javascript" src="/control/sfAdminThemejRollerPlugin/js/jquery.min.js"></script>
<style>
    body {
        font-family: Arial,sans-serif;
        font-size: 10px;
    }
    select{
        width: 300px;
    }
</style>
<script language="javascript">
    jQuery(function($){
        $(document).ready(function() {
//        $("#estado").change(function() {
//            estado = "estado=" + document.getElementById('estado').value;
//            $.ajax({
//                data: estado,
//                url: '/control/index.php/util/option',
//                type: 'post',
//                beforeSend: function() {
//                    $("#ieu").html("<option>Procesando, espere por favor...</option>");
//                },
//                success: function(data) {
//                    $("#ieu").html(data);
//                },
//                error: function() {
//                    $("#ieu").html("<option>ocurrio un error</option>");
//                }
//            });
//        });
        $("#Subir").click(function() {
            archivo = document.getElementById('archivo').value;
            parametros = 'archivo=' + archivo;
            if (archivo === '') {
                alert('Debe completar todos los campos!!!');
                return false;
            } else {
                $("#incluir").submit();
            }
        });
    });
});
</script>
<form name="incluir" id="incluir" enctype="multipart/form-data" action="" method="post">
    <table>
        <tr><td>Archivo:</td><td><input type="file" name="archivo" id="archivo"/></td></tr>
        
        <tr><td colspan="2"><center><input type="submit" id='Subir' name='Subir' value="Subir"/></center></td></tr>
    </table>
</form>
<div id="info" name="info"><?php echo $mensaje;?><br/></div>