<script ...></script>
<script>
 function listbox_dblclick() {
   $('input[name="displayitem"]').trigger('click');
 }


 function button_click(target) {
   var userConfirmed = true;
   if (target == 1) {
     userConfirmed = confirm("Are you sure you want to remove this item?");
   }
   if (userConfirmed) {
     var $form = $('form[name="items"]');
     if (target == 0) $form.attr('action', 'index.php?content=displayitem');
     if (target == 1) $form.attr('action', 'index.php?content=removeitem');
     if (target == 2) $form.attr('action', 'index.php?content=updateitem');
   } else {
     alert("Action canceled.");
   }
 }
</script>
<?php
require_once("item.php");
$items = Item::getItems();
if ($items) {
?>
<h2>Select Item</h2>
 <form name="items" method="post">
  <select name="itemID" size="20">
      <?php
      foreach ($items as $item) {
          $itemID = $item->itemID;
          $itemName = $item->itemName;
          $itemPrice = $item->listPrice;
          $option = $itemID . " - " . $itemName .  " - " . $itemPrice;
          echo "<option value=\"$itemID\">$option</option>\n";
      }
      ?>
  </select>
  <br>
  <input type="submit" name="displayitem" value="View Item">
  <input type="submit" name="deleteitem" value="Delete Item">
  <input type="submit" name="updateitem" value="Update Item">
</form>
<?php
} else {
 echo "<h2>No items found.</h2>";
}
?>
<script>
 jQuery(document).ready(function() {
   $('select[name="itemID"]').on('dblclick', listbox_dblclick);
   $('input[name="displayitem"]').on('click', function() {
     button_click(0);
   });
   $('input[name="deleteitem"]').on('click', function() {
     button_click(1);
   });
   $('input[name="updateitem"]').on('click', function() {
     button_click(2);
   });
 });
 function selectFirstItem() {
   var $select = $('select[name="itemID"]');
   if ($select.length && $select[0].options.length > 0) {
     $select.prop('selectedIndex', 0);
   }
 }
 selectFirstItem();
</script>