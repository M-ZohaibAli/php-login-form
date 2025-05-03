 
<?php
function inputField($id, $label, $type, $placeholder) {
  return "
  <div class='input-group'>
    <label for='$id'>$label</label>
    <input type='$type' id='$id' name='$id' placeholder='$placeholder' required />
  </div>";
}
?>
