<!--Index of the rental page--->

<?php
include_once 'classes/rentClass.php';
/* instantiate class object */
$rentals = new Rental();
?>

<?php
      switch($subpage){
                case 'add':
                    require_once 'rental-add.php';
                break;
                case 'edit':
                    require_once 'rental-edit.php';
                break;
                default:
                    require_once 'rental-read.php';
                break;
      }