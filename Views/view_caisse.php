<?php if (isset($_SESSION["connected"]) && $_SESSION["connected"]==True) : ?>
  <?php require "view_begin_connected.php";?>
<?php else : ?>
  <?php require "view_begin.php";?>
<?php endif ?>

<!-- Implémenter un truc de vérification session aussi, si c'est bien un admin-->
<h1>Caisse enregistreuse</h1>

<div>
    <p> Panier du client </p>
    <ul>
        <li>2 x Kinder Bueno (exemple)</li>
        <!-- 
            Affichage des produits ici, genre 2x Kinder bueno etc
        -->
    </ul>
    <p>TOTAL : <span id="totalprix"></span></p>
</div>

<form>
    <!--Les produits seront ajoutés ici, mais en type=hidden-->
    <!--
        exemple:
        <input type="hidden" name="produit1" value="ID_PRODUIT_ICI" />
        <input type="hidden" name="produit2" value="ID_PRODUIT_ICI" />
    -->
    <!--Méthode de paiement-->
    <input type="hidden" name="Paiement" required />

    <!--Responsable de la vente-->
    <input type="hidden" name="id_admin" value="<?=e($admin)?>" required />

    <!--Validation du panier-->
    <input type="submit" value="Valider" />
</form>

<hr>

<!-- boutons produits-->
<table>
    <tr id="snacks">
        <th>Snacks</th>
        <?php foreach ($snacks as $ligne): ?>
        <td>
            <div class="produit">
                <div><img src="Content/img/<?=e($ligne["Img_produit"])?>" alt="Image <?=e($ligne["Nom"])?>" height="60" /></div>
                <div><?=e($ligne["Nom"])?></div>
                <div><?=e($ligne["Prix"])?> €</div>
            </div>
        </td>
        <?php endforeach ?>
    </tr>
    <tr id="boissons">
        <th>Boissons</th>
        <?php foreach ($boissons as $ligne): ?>
        <td>
            <ul class="produit">
                <li><img src="Content/img/<?=e($ligne["Img_produit"])?>" alt="Image <?=e($ligne["Nom"])?>" height="60" /></li>
                <li><?=e($ligne["Nom"])?></li>
                <li><?=e($ligne["Prix"])?> €</li>
            </ul>
        </td>
        <?php endforeach ?>
    </tr>
    <tr id="boissons">
        <th>Sodas</th>
        <?php foreach ($sodas as $ligne): ?>
        <td>
            <ul class="produit">
                <li><img src="Content/img/<?=e($ligne["Img_produit"])?>" alt="Image <?=e($ligne["Nom"])?>" height="60" /></li>
                <li><?=e($ligne["Nom"])?></li>
                <li><?=e($ligne["Prix"])?> €</li>
            </ul>
        </td>
        <?php endforeach ?>
    </tr>
    <tr id="sirops">
        <th>Sirops</th>
        <?php foreach ($sirops as $ligne): ?>
        <td>
            <ul class="produit">
                <li><img src="Content/img/<?=e($ligne["Img_produit"])?>" alt="Image <?=e($ligne["Nom"])?>" height="60" /></li>
                <li><?=e($ligne["Nom"])?></li>
                <li><?=e($ligne["Prix"])?> €</li>
            </ul>
        </td>
        <?php endforeach ?>
    </tr>
</table>

<script src="Utils/caisse_enregist.js"></script>

<?php require "view_end.php";?>