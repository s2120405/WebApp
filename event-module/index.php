<!--Index of the event page--->
<?php
include_once 'classes/eventClass.php';
/* instantiate class object */
$events = new Event();
?>

<?php
      switch($subpage){
                case 'add':
                    require_once 'event-add.php';
                break;
                case 'edit':
                    require_once 'event-edit.php';
                break;
                case 'readt':
                    require_once 'type-read.php';
                break;
                case 'addt':
                    require_once 'type-add.php';
                break;
                case 'editt':
                    require_once 'type-edit.php';
                break;
                default:
                    require_once 'event-read.php';
                break;
      }