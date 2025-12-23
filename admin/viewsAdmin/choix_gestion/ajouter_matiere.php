<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Matière</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="/PROJET%20PHP/style/style_ajou.css">


</head>

<body>
    
    <nav class="navbar">
        <div class="container">
            <span class="navbar-brand">
                <i class="fas fa-plus-circle me-2"></i>
                Ajouter une Matière
            </span>
            <div class="a">
                <a href="../index_dash.php">
                    <i class="fas fa-tachometer-alt"></i> Dashboard Admin
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        
        <div class="section">
            <h2><i class="fas fa-book me-2"></i>Nouvelle Matière</h2>
            <p class="mb-0">Ajoutez une nouvelle matière</p>
        </div>

        
        <div class="content-card">
            <?php if (isset($succes) && $succes): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle me-2"></i>
                    Matière ajoutée avec succès !
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <form action="index_ajouter_matiere.php" method="POST">
                <div class="mb-3">
                    <label for="filiere" class="form-label">Filière</label>
                    <select name="filiere" id="filiere" class="form-select" required>
                        <?php
                        foreach ($res_fil as $r) {
                            echo "<option value=\"{$r['id_filiere']}\">{$r['nom_filiere']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="matiere" class="form-label">Nom de matière</label>
                    <input type="text" id="matiere" name="matiere" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="coef" class="form-label">Coefficient</label>
                    <input type="number" id="coef" name="coef" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="prof" class="form-label">Professeur responsable</label>
                    <select name='prof' id="filiere" class="form-select" required>
                        <?php
                        foreach ($prof as $p) {
                            echo "<option value=\"{$p['id_professeur']}\">{$p['nom_professeur']}</option>";
                        }
                        ?>
                    </select>   
                    </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
