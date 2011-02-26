<?php $model = isset( $model ) ? $model : $this->model; ?>

<div class="input text phonenumber<?php echo isset( $required ) && $required ? ' required' : '' ?>">
  <?php echo $this->Form->input( $model . '.phone_number', array( 'name' => 'data[' . $model . '][' . $field . '][]', 'value' => $this->data[$model][$field][0], 'div' => false, 'label' => isset( $label ) ? $label : 'Phone Number', 'class' => 'area-code', 'maxlength' => 3, 'after' => ' - ' ) ) ?>
  <?php echo $this->Form->input( $model . '.phone_number', array( 'name' => 'data[' . $model . '][' . $field . '][]', 'value' => $this->data[$model][$field][1], 'div' => false, 'label' => false, 'class' => 'exchange', 'maxlength' => 3, 'after'     => ' - ' ) ) ?>
  <?php echo $this->Form->input( $model . '.phone_number', array( 'name' => 'data[' . $model . '][' . $field . '][]', 'value' => $this->data[$model][$field][2], 'div' => false, 'label' => false, 'class' => 'number', 'maxlength' => 4 ) ) ?>
</div>
