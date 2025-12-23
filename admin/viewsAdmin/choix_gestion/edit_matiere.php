<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Matière</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/PROJET%20PHP/style/style_ajou.css">
  
    
</head>

<body>
   
    <nav class="navbar">
        <div class="container">
            <span class="navbar-brand">
                <i class="fas fa-edit me-2"></i>
                Modifier Matière
            </span>
            <div>
                <a href="../index_dash.php">
                    <i class="fas fa-tachometer-alt"></i> Dashboard Admin
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
      
        <div class="section">
            <h2><i class="fas fa-pen me-2"></i>Modifier la Matière</h2>
            <p class="mb-0">Modifiez les informations de la matière</p>
        </div>

        <div class="content-card">
            <form method="POST" action="index_update_matiere.php?id=<?= htmlspecialchars($matiere['id_matiere']) ?>">
                <div class="mb-3">
                    <label for="nom_matiere" class="form-label">Nom de la Matière</label>
                    <input type="text" name="nom_matiere" id="nom_matiere" class="form-control" required
                        value="<?= htmlspecialchars($matiere['nom_matiere']) ?>">
                </div>

                <div class="mb-3">
                    <label for="coefficient" class="form-label">Coefficient</label>
                    <input type="number" step="0.1" name="coefficient" id="coefficient" class="form-control" required
                        value="<?= htmlspecialchars($matiere['coefficient']) ?>">
                </div>

                <div class="mb-3">
                    <label for="professeur" class="form-label">Professeur</label>
                  <select name="professeur" id="professeur" class="form-control">

                        <?php foreach($prof as $p): ?>
                            <option value="<?= $p['id_professeur'] ?>" >
                            
                                <?= $p['nom_professeur'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
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
