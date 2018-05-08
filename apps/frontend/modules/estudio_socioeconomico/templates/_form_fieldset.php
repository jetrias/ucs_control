<div id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?>" class="ui-corner-all">
  <table>
    <?php 
  $count=0;
  foreach ($fields as $name => $field): ?>
    <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
    <?php 
     if ($count==0){echo '<tr><td>';}
    include_partial('estudio_socioeconomico/form_field', array(
      'name'       => $name,
      'attributes' => $field->getConfig('attributes', array()),
      'label'      => $field->getConfig('label'),
      'help'       => $field->getConfig('help'),
      'form'       => $form,
      'field'      => $field,
      'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_form_field_'.$name,
    ));
    if ($count%2==0){echo '</td><td>';}else{echo '</td></tr><tr><td>';}$count++;
    ?>
  <?php endforeach; ?>
      </td></tr></table>
</div>
