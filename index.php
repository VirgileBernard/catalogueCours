<?php
require_once "classes/CoursDAO.class.php";
require_once "classes/TypeDAO.class.php";

// Récupération des données
$cours = CoursDAO::findAll();
$types = TypeDAO::findAll();

// Création d’un tableau associatif idType → libelle
$typesMap = [];
foreach ($types as $t) {
    $typesMap[$t->getIdType()] = $t->getLibelle();
}

$idType = $_POST['id_type'] ?? 'all';

if ($idType === 'all') {
    $cours = CoursDAO::findAll();
} else {
    $cours = CoursDAO::findByType($idType);
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des cours</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<h1>Liste des cours</h1>

<form action="" method="post">
    <select name="id_type" id="" onchange="this.form.submit()">
        <option value="all">Tous les types</option>
        <?php foreach ($types as $t): ?>
            <option value="<?= $t->getIdType() ?>"
                <?= (isset($_POST['id_type']) && $_POST['id_type'] == $t->getIdType()) ? 'selected' : '' ?>>
                <?= $t->getLibelle() ?>
            </option>
        <?php endforeach; ?>
        </select>
</form>


<div class = "coursContainer">

<?php foreach ($cours as $c): ?>
    <div class="card">
        <div class = "imageContainer">
        <img src="images/<?= $c->getImage() ?>" alt="<?= $c->getLibelle() ?>">
        </div>
        
        <div class="infoContainer">
<!--            <h2>--><?php //= $c->getLibelle() ?><!--</h2>-->
            <div class="type">
                <strong><?= $typesMap[$c->getIdType()] ?></strong>
            </div>
            <div class="description">
            <p><?= $c->getDescription() ?></p>
            </div>
            <!-- Badge en bas -->
         <div class="badge-type">
             <?= $typesMap[$c->getIdType()] ?>
              </div>
        </div>
    </div>
<?php endforeach; ?>
</div>

</body>
</html>
