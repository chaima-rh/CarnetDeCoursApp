<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ajouter un Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="/PROJET%20PHP/style/style_ajou.css">
   
</head>
<body>
   
    <nav class="navbar">
        <div class="container">
            <span class="navbar-brand">
                <i class="fas fa-calendar-plus me-2"></i>
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
            <h2><i class="fas fa-calendar-plus me-2"></i>Ajouter un nouveau cours</h2>
            <p class="mb-0">Planifiez un nouveau cours dans l'emploi du temps</p>
        </div>

       
        <div class="content-card">
            <?php if (!empty($matieres)): ?>
                <form method="post" novalidate>
                    
                    <div class="row">
                        <div class="mt-4">
                                <label for="id_filiere" class="form-label">
                                    <i class="fas fa-graduation-cap"></i> Filière
                                </label>
                            <select name="filiere" id="id_filiere" class="form-select" required>
                            <option value="">-- Choisir une filière --</option>
                            <?php foreach ($filieres as $f) { ?>
                                <option value="<?= $f['id_filiere'] ?>"><?= htmlspecialchars($f['nom_filiere']) ?></option>
                            <?php } ?>
                        </select>
                            </div>
                        <div class="col-md-6">
                            <label for="jour" class="form-label">
                                <i class="fas fa-calendar-day"></i>Jour
                            </label>
                            <select name="jour" id="jour" class="form-select" required>
                                <option value="">-- Choisir un jour --</option>
                                <option value="Lundi">Lundi</option>
                                <option value="Mardi">Mardi</option>
                                <option value="Mercredi">Mercredi</option>
                                <option value="Jeudi">Jeudi</option>
                                <option value="Vendredi">Vendredi</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="salle" class="form-label">
                                <i class="fas fa-door-open"></i>Salle
                            </label>
                            <input type="text" name="salle" id="salle" class="form-control" placeholder="Ex: A101" required>
                        </div>
                    </div>

                  
                    <div class="time-section">
                      
                        <div class="row">
                            <div class="col-md-6">
                                <label for="heure_debut" class="form-label">
                                    <i class="fas fa-play"></i>Heure Début
                                </label>
                                <input type="time" name="heure_debut" id="heure_debut" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="heure_fin" class="form-label">
                                    <i class="fas fa-stop"></i>Heure Fin
                                </label>
                                <input type="time" name="heure_fin" id="heure_fin" class="form-control" required>
                            </div>
                        </div>
                    </div>

                   
                    <div class="mt-4">
                        <label for="id_matiere" class="form-label">
                            <i class="fas fa-book"></i>Matière
                        </label>
                        <select name="id_matiere" id="id_matiere" class="form-select" required>
                            <option value="">-- Choisir une matière --</option>
                            <?php foreach($matieres as $m): ?>
                                <option value="<?= $m['id_matiere'] ?>"><?= htmlspecialchars($m['nom_matiere']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                   
                    <div class="d-flex justify-content-between mt-5">
                        <a href="indexliste.php" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Annuler
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Ajouter
                        </button>
                    </div>
                </form>
            <?php else: ?>
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <h5 class="mb-2">Aucune matière disponible</h5>
                    <p class="mb-0">Vous devez d'abord ajouter des matières avant de pouvoir créer un emploi du temps.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>