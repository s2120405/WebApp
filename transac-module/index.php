<!--Index of the transaction page--->

<?php
include_once 'classes/transacClass.php';
/* instantiate class object */
$transacs = new Transac();
?>

<?php
      switch($subpage){
                case 'add':
                    require_once 'transac-add.php';
                break;
                case 'edit':
                    require_once 'transac-edit.php';
                break;
                default:
                    require_once 'transac-read.php';
                break;
      }