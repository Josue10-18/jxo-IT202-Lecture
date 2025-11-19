<?php
ob_start();
include("category.php");
include("item.php");
// Fetch values using the static methods from category.php and item.php
$totalCategories = Category::getTotalCategories();
$totalItems = Item::getTotalItems();
$listpricetotal = Item::getTotalListPrice();
$doc = new DOMDocument("1.0");
$inventoryElement = $doc->createElement("inventory");
$inventoryElement = $doc->appendChild($inventoryElement);
// Add <categories> XML element with value
$categoriesElement = $doc->createElement("categories", $totalCategories);
$categoriesElement = $inventoryElement->appendChild($categoriesElement);
// Add <items> XML element with value
$itemsElement = $doc->createElement("items", $totalItems);
$itemsElement = $inventoryElement->appendChild($itemsElement);
// Add <listpricetotal> XML element with value
$listpricetotalElement = $doc->createElement("listpricetotal", $listpricetotal);
$listpricetotalElement = $inventoryElement->appendChild($listpricetotalElement);
$output = $doc->saveXML();
header("Content-type: application/xml");
ob_end_clean();
echo $output;
?>

