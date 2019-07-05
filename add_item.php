<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="card">
      <div class="card-body">
        <form action="item_action.php?action=add" method="post">
        <div class="form-group">
            <label>Item Name</label>
            <input type="text" name="itemname" class="form-control">
        </div>

        <div class="form-group">
        <label>Category</label>
        <select name="category" id="" class="form-group">
        <?php
            require_once "classes/Category.php";

            $category = new Category;
            $get_categories = $category->selectAll();
            foreach($get_categories as $key => $row) {
                $category_id = $row['category_id'];
                $category_name = $row['category_name'];
                echo "<option value='$category_id'>$category_name</option>";
            }
        ?>
        </select>
        </div>

        <div class="form-group">
            <label>Item Description</label>
            <input type="text" name="itemdescription" class="form-control">
        </div>

        <div class="form-group">
            <label>Item Price</label>
            <input type="text" name="itemprice" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary" name="add">Save</button>
        
        </form>
      </div>
      </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>