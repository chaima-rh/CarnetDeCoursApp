<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un cours</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="/PROJET%20PHP/style/style_ajou.css">



   
</head>

<body>
   
    <nav class="navbar">
        <div class="container">
            <span class="navbar-brand">
                <i class="fas fa-book-open me-2"></i>
                Ajouter un Cours
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
            <h1><i class="fas fa-plus-circle me-2"></i>Ajouter un cours</h1>
            <p class="mb-0">Ajoutez un nouveau cours</p>
        </div>

      
        <div class="content-card">
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="matiere" class="form-label">Matière</label>
                    <select name="matiere" id="matiere" class="form-select" required>
                        <option value="" disabled selected>Choisissez une matière</option>
                        <?php foreach ($matieres as $matiere) : ?>
                            <option value="<?= $matiere['id_matiere'] ?>"><?= htmlspecialchars($matiere['nom_matiere']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Choisissez un fichier :</label>
                    <input type="file" name="cours" id="cours" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="descr" class="form-label">Ajouter une description</label>
                    <textarea name="descr" id="descr" class="form-control" rows="5" placeholder="Décrivez le contenu du cours..."></textarea>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Envoyer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
