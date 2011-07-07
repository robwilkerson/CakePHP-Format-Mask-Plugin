<?php
$model     = isset( $model ) ? $model : $this->model;
$area_code = isset( $this->data[$model][$field][0] ) ? $this->data[$model][$field][0] : null;
$exchange  = isset( $this->data[$model][$field][1] ) ? $this->data[$model][$field][1] : null;
$number    = isset( $this->data[$model][$field][2] ) ? $this->data[$model][$field][2] : null;
?>

<div class="input text phonenumber<?php echo isset( $required ) && $required ? ' required' : '' ?>">
  <?php echo $this->Form->input( $model . '.phone_number', array( 'name' => 'data[' . $model . '][' . $field . '][]', 'value' => $area_code, 'div' => false, 'label' => isset( $label ) ? $label : 'Phone Number', 'class' => 'area-code', 'maxlength' => 3, 'after' => ' - ' ) ) ?>
  <?php echo $this->Form->input( $model . '.phone_number', array( 'name' => 'data[' . $model . '][' . $field . '][]', 'value' => $exchange, 'div' => false, 'label' => false, 'class' => 'exchange', 'maxlength' => 3, 'after'     => ' - ' ) ) ?>
  <?php echo $this->Form->input( $model . '.phone_number', array( 'name' => 'data[' . $model . '][' . $field . '][]', 'value' => $number, 'div' => false, 'label' => false, 'class' => 'number', 'maxlength' => 4 ) ) ?>
</div>
