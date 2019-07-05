<?php
    require_once "classes/Item.php";

    // create instance
    $item = new Item;


    if($_GET['action'] == 'add') {
        $itemname = $_POST['item_name'];
        $itemdescription = $_POST['item_description'];
        $itemprice = $_POST['item_price'];
        $result = $item->save($itemname, $itemdescription, $itemprice);

        if($result) {
            echo "<script>window.location.replace('items.php');</script>";
        }else {
            echo "Error!!";
        }
    }
    elseif($_GET['action'] == 'update') {
        $item_id = $_POST['user_id'];
        $category_id = $_POST['category_id'];
        $itemname = $_POST['item_name'];
        $itemprice = $_POST['item_price'];
        $result = $item->update($itemid, $categoryid, $itemname, $itemprice);

        if($result) {
            echo "<script>window.location.replace('items.php');</script>";
        }
    }
    elseif($_GET['action'] == 'delete') {
        $item_id = $_GET['item_id'];
        $result = $item->delete($item_id);
        if($result) {
            echo "<script>window.location.replace('items.php');</script>";
        }

    }

?>