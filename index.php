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
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des cours</title>
    <style>
        body { font-family: Arial; background:#f5f5f5; padding:20px; }
        .card {
            background:white;
            padding:15px;
            margin-bottom:15px;
            border-radius:8px;
            box-shadow:0 2px 5px rgba(0,0,0,0.1);
            display:flex;
            gap:20px;
            align-items:center;
        }
        img {
            width:120px;
            height:auto;
            border-radius:5px;
        }
        h2 { margin:0; }
        .type { color:#555; font-size:14px; }
    </style>
</head>
<body>

<h1>Liste des cours</h1>

<?php foreach ($cours as $c): ?>
    <div class="card">
        <img src="images/<?= $c->getImage() ?>" alt="<?= $c->getLibelle() ?>">
        
        <div>
            <h2><?= $c->getLibelle() ?></h2>
            <div class="type">
                Type : <strong><?= $typesMap[$c->getIdType()] ?></strong>
            </div>
            <p><?= $c->getDescription() ?></p>
        </div>
    </div>
<?php endforeach; ?>

</body>
</html>
