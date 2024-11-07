<!-- store_detail.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail du Magasin </title>
    <link rel="stylesheet" href="/assets/css/style.css">

</head>
<body>
    <h1>Détails du Magasin</h1>
    <div class="store-list">
        <?php if ($store): ?>
            <div class="store-card">
                <h2><?php echo htmlspecialchars($store->getName() ?? 'Nom non disponible'); ?></h2>
                <p><strong>Localisation:</strong> <?php echo htmlspecialchars($store->getLocation() ?? 'Localisation non disponible'); ?></p>
                <p><strong>Catégorie:</strong> <?php echo htmlspecialchars($store->getCategory() ?? 'Catégorie non disponible'); ?></p>
                <p><strong>ID:</strong> <?php echo htmlspecialchars($store->getId() ?? 'ID non disponible'); ?></p>
            </div>
        <?php else: ?>
            <p>Magasin non trouvé.</p>
        <?php endif; ?>
    </div>

</body>
</html>