<?php 
require "view_begin.php";
$title = 'Accueil';
?>

<h1> Bienvenue au Stand de confiseries du BDE de l'IUT de Villetaneuse !</h1>

<!-- Diaporama -->

<!-- Produits populaires -->
<!--
  TODO Pour l'instant en format table,
  adapter à un format "carte produit"
  genre un petit bloc carré jsp
-->
<h2>Nos produits du moment</h2>
<table>
  <!-- Ligne image produit -->
  <tr>
  <?php foreach ($popular_prod as $v): ?>
    <!-- <td>Image</td> -->
    <td>
      <img src="<?=$v['Img_produit']?>" alt="img_<?=e($v['Nom'])?>">
    </td>

  <?php endforeach ?>
  </tr>
  <!-- Ligne infos produit -->
  <tr>
  <?php foreach ($popular_prod as $v): ?>
    <td> <?=e($v["Nom"])?> - <?=e($v["Prix"])?> € </td>
  <?php endforeach ?>
  </tr>
</table>

<br>

<!-- Nouveau produits -->
<h2>Nos nouveautés</h2>
<table>
  <!-- Ligne image produit -->
  <tr>
  <?php foreach ($nouv_prod as $np): ?>
    <td>Image</td>
    <!--<td> < ? = e($v["Img_produit"])?> </td> -->
  <?php endforeach ?>
  </tr>
  <!-- Ligne infos produit -->
  <tr>
  <?php foreach ($nouv_prod as $np): ?>
    <td> <?=e($np["Nom"])?> - <?=e($np["Prix"])?> € </td>
  <?php endforeach ?>
  </tr>
</table>

<?php require "view_end.php";?>
