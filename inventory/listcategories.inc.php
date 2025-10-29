<?php
require_once("category.php");
$categories = Category::getCategories();
if ($categories) {
?>
 <h2>Select Category</h2>
  <form name="categories" method="post">
   <select name="categoryID" size="20">
       <?php
       foreach ($categories as $category) {
           $categoryID = $category->categoryID;
           $name = $categoryID . " - " . $category->categoryCode . ", " . $category->categoryName;
           echo "<option value=\"$categoryID\">$name</option>\n";
       }
       ?>
   </select>
  </form>
<?php
} else {
  echo "<h2>No categories found.</h2>";
}
?>