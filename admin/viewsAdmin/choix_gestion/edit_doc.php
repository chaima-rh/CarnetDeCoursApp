<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="/PROJET%20PHP/style/style_ajou.css">

  
</head>

<body>
  
    <nav class="navbar">
        <div class="container">
            <span class="navbar-brand">
                <i class="fas fa-edit me-2"></i>
                Modifier Document
            </span>
        </div>
    </nav>

    <div class="container mt-4">
      
        <div class="section">
            <h2><i class="fas fa-pen me-2"></i>Modifier le Document</h2>
            <p class="mb-0">Modifiez les informations du document</p>
        </div>

       
        <div class="content-card">
            <?php if (isset($error_message)): ?>
                <div class="alert-danger">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <?= htmlspecialchars($error_message) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="index_update_document.php?id=<?= htmlspecialchars($document['id_document']) ?>">
                <div class="mb-3">
                    <label for="matiere" class="form-label">Matière</label>
                    <select class="form-select" id="matiere" name="matiere" required>
                        <option value="">-- Choisir une matière --</option>
                        <?php if (isset($matieres)): ?>
                            <?php foreach ($matieres as $matiere): ?>
                                <option value="<?= $matiere['id_matiere'] ?>" <?= ($matiere['id_matiere'] == $document['id_matiere']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($matiere['nom_matiere']) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                          
                            <option value="1" <?= ($document['id_matiere'] ?? 1) == 1 ? 'selected' : '' ?>>Mathématiques</option>
                            <option value="2" <?= ($document['id_matiere'] ?? 1) == 2 ? 'selected' : '' ?>>Physique</option>
                            <option value="3" <?= ($document['id_matiere'] ?? 1) == 3 ? 'selected' : '' ?>>Informatique</option>
                            <option value="4" <?= ($document['id_matiere'] ?? 1) == 4 ? 'selected' : '' ?>>Français</option>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="descr" class="form-label">Description</label>
                    <textarea class="form-control" id="descr" name="descr" rows="4" placeholder="Description du document..."><?= htmlspecialchars($document['descr'] ?? 'Cours de mathématiques sur les fonctions') ?></textarea>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                   
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Modifier
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
