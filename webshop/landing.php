<div class='container'>
<label style='margin-bottom: 15px;'><h4>Termékek</h4></label>
<?php
$sql = "SELECT * FROM termekek";
$result = $conn->query($sql);
$result->fetch_assoc();
?>
<div class="row row-cols-1 row-cols-md-3 g-4">
<?php foreach ($result as $product): ?>
  <div class="col" style='margin-bottom: 30px;'>
    <div class="card h-100">
    <a href="index.php?page=product&id=<?=$product['id']?>">
    <img src="images/<?=$product['image']?>" class="card-img-top" width="300" height="300" alt="<?=$product['megnevezes']?>">
      </a>
      <div class="card-body">
      <h5 class="card-title"><?=$product['megnevezes']?> - <?=number_format($product['ar'])?> ft</h5>
      <p class="card-text"><?=$product['leiras']?></p>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
</br>
</div>