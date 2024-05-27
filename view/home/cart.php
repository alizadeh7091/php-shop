<?php
include "./include/layout/header.php";

// echo"hi";
include "./include/db.php";

$query = "SELECT * FROM products";
$products = $conn->query($query);

foreach ($_COOKIE as $key => $value) {
   $id[] = $key;
   $count[] = $value;
}
// $id1 = $id;

foreach ($id as $item) {
   $item = intval($item);
   $stmt = $conn->prepare("SELECT * FROM products WHERE id = $item");
   $stmt->execute();
   // $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
   $result[]= ($stmt->fetchAll());
}

var_dump($result);

?>

<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Your <span>orders</span>
         </h2>
      </div>
      <table id="table" class="display" style="width:100%">
         <thead>
            <tr>
               <th>#</th>
               <th>Name</th>
               <th>Price</th>
               <th>Count</th>
               <th>Total</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($result as $item) { ?>
               <tr id="p<?= $item['id'] ?>">
                  <td><?= ($item['id']) ?></td>
                  <td><?= ($item['name']) ?></td>
                  <td><?= ($item['price']) ?></td>
                  <td id="qty"></td>
               </tr>
            <?php } ?>
         </tbody>
         <tfoot>
            <tr>
               <th>#</th>
               <th>Name</th>
               <th>Price</th>
               <th>Count</th>
               <th>Total</th>
               <th>Action</th>
            </tr>
         </tfoot>
      </table>
   </div>
</section>

<?php
include "./include/layout/footer.php";

?>