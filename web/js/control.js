/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function ($) {
    $( "#ui-datepicker-div" ).removeClass( "ui-helper-hidden-accessible" );
    jQuery("input, textarea").keyup(function () {
        this.value = this.value.toUpperCase();
    });
    $('.solo-numero').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
      });
    jQuery("#tabs").tabs();
    jQuery("div.error").show("slow");
    jQuery(".sf_admin_form_field_profesion_jefe_id").addClass( "ui-corner-all" );
    jQuery(".sf_admin_form_field_instruccion_madre_id").addClass( "ui-corner-all" );
    jQuery(".sf_admin_form_field_ingreso_familiar_id").addClass( "ui-corner-all" );
    jQuery(".sf_admin_form_field_condicion_vivienda_id").addClass( "ui-corner-all" );
    //base de mision
    if ($('select[name="otra_informacion[base_mision]"]').val() == '' || $('select[name="otra_informacion[base_mision]"]').val() == 'NO') {
        $('div.sf_admin_form_field_det_base_mision').hide();
        
    }
    if ($('select[name="otra_informacion[base_mision]"]').val() == 'SI') {
        $('div.sf_admin_form_field_det_base_mision').show();
    }
    $("#otra_informacion_base_mision").change(function() {
        if ($('select[name="otra_informacion[base_mision]"]').val() == '' || $('select[name="otra_informacion[base_mision]"]').val() == 'NO') {
            $('div.sf_admin_form_field_det_base_mision').hide("slow");
        }
        if ($('select[name="otra_informacion[base_mision]"]').val() == 'SI') {
            $('div.sf_admin_form_field_det_base_mision').show("slow");
        }
    });
    
    
        //org deportiva
    if ($('select[name="otra_informacion[org_dep]"]').val() == '' || $('select[name="otra_informacion[org_dep]"]').val() == 'NO') {
        $('div.sf_admin_form_field_det_org_deportiva').hide();
        
    }
    if ($('select[name="otra_informacion[org_dep]"]').val() == 'SI') {
        $('div.sf_admin_form_field_det_org_deportiva').show();
    }
    $("#otra_informacion_org_dep").change(function() {
        if ($('select[name="otra_informacion[org_dep]"]').val() == '' || $('select[name="otra_informacion[org_dep]"]').val() == 'NO') {
            $('div.sf_admin_form_field_det_org_deportiva').hide("slow");
        }
        if ($('select[name="otra_informacion[org_dep]"]').val() == 'SI') {
            $('div.sf_admin_form_field_det_org_deportiva').show("slow");
        }
    });
       //org deportiva
    if ($('select[name="otra_informacion[org_cultural]"]').val() == '' || $('select[name="otra_informacion[org_cultural]"]').val() == 'NO') {
        $('div.sf_admin_form_field_det_org_cultural').hide();
        
    }
    if ($('select[name="otra_informacion[org_cultural]"]').val() == 'SI') {
        $('div.sf_admin_form_field_det_org_cultural').show();
    }
    $("#otra_informacion_org_cultural").change(function() {
        if ($('select[name="otra_informacion[org_cultural]"]').val() == '' || $('select[name="otra_informacion[org_cultural]"]').val() == 'NO') {
            $('div.sf_admin_form_field_det_org_cultural').hide("slow");
        }
        if ($('select[name="otra_informacion[org_cultural]"]').val() == 'SI') {
            $('div.sf_admin_form_field_det_org_cultural').show("slow");
        }
    });
      //org ecologista
    if ($('select[name="otra_informacion[org_ecologista]"]').val() == '' || $('select[name="otra_informacion[org_ecologista]"]').val() == 'NO') {
        $('div.sf_admin_form_field_det_org_ecologista').hide();
        
    }
    if ($('select[name="otra_informacion[org_ecologista]"]').val() == 'SI') {
        $('div.sf_admin_form_field_det_org_ecologista').show();
    }
    $("#otra_informacion_org_ecologista").change(function() {
        if ($('select[name="otra_informacion[org_ecologista]"]').val() == '' || $('select[name="otra_informacion[org_ecologista]"]').val() == 'NO') {
            $('div.sf_admin_form_field_det_org_ecologista').hide("slow");
        }
        if ($('select[name="otra_informacion[org_ecologista]"]').val() == 'SI') {
            $('div.sf_admin_form_field_det_org_ecologista').show("slow");
        }
    });
     //org productiva
    if ($('select[name="otra_informacion[org_productiva]"]').val() == '' || $('select[name="otra_informacion[org_productiva]"]').val() == 'NO') {
        $('div.sf_admin_form_field_det_org_productiva').hide();
        
    }
    if ($('select[name="otra_informacion[org_productiva]"]').val() == 'SI') {
        $('div.sf_admin_form_field_det_org_productiva').show();
    }
    $("#otra_informacion_org_productiva").change(function() {
        if ($('select[name="otra_informacion[org_productiva]"]').val() == '' || $('select[name="otra_informacion[org_productiva]"]').val() == 'NO') {
            $('div.sf_admin_form_field_det_org_productiva').hide("slow");
        }
        if ($('select[name="otra_informacion[org_productiva]"]').val() == 'SI') {
            $('div.sf_admin_form_field_det_org_productiva').show("slow");
        }
    });
     //mil bolivariana
    if ($('select[name="otra_informacion[mil_bolivariana]"]').val() == '' || $('select[name="otra_informacion[mil_bolivariana]"]').val() == 'NO') {
        $('div.sf_admin_form_field_det_mil_bolivariana').hide();
        
    }
    if ($('select[name="otra_informacion[mil_bolivariana]"]').val() == 'SI') {
        $('div.sf_admin_form_field_det_mil_bolivariana').show();
    }
    $("#otra_informacion_mil_bolivariana").change(function() {
        if ($('select[name="otra_informacion[mil_bolivariana]"]').val() == '' || $('select[name="otra_informacion[mil_bolivariana]"]').val() == 'NO') {
            $('div.sf_admin_form_field_det_mil_bolivariana').hide("slow");
        }
        if ($('select[name="otra_informacion[mil_bolivariana]"]').val() == 'SI') {
            $('div.sf_admin_form_field_det_mil_bolivariana').show("slow");
        }
    });
    //org politica estudiantil
    if ($('select[name="otra_informacion[org_politica_estudiantil]"]').val() == '' || $('select[name="otra_informacion[org_politica_estudiantil]"]').val() == 'NO') {
        $('div.sf_admin_form_field_det_org_politica_estudiantil').hide();
        
    }
    if ($('select[name="otra_informacion[org_politica_estudiantil]"]').val() == 'SI') {
        $('div.sf_admin_form_field_det_org_politica_estudiantil').show();
    }
    $("#otra_informacion_org_politica_estudiantil").change(function() {
        if ($('select[name="otra_informacion[org_politica_estudiantil]"]').val() == '' || $('select[name="otra_informacion[org_politica_estudiantil]"]').val() == 'NO') {
            $('div.sf_admin_form_field_det_org_politica_estudiantil').hide("slow");
        }
        if ($('select[name="otra_informacion[org_politica_estudiantil]"]').val() == 'SI') {
            $('div.sf_admin_form_field_det_org_politica_estudiantil').show("slow");
        }
    });
});

