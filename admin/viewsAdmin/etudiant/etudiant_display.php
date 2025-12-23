<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #F5EEDD, #077A7D);
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background: linear-gradient(90deg, #077A7D, #055B5D);
            padding: 1rem;
        }

        .navbar-brand {
            color: #F5EEDD !important;
            font-weight: 600;
        }

        .welcome-section {
            background: linear-gradient(135deg, #077A7D, #055B5D);
            color: #F5EEDD;
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .content-card {
            background: #F5EEDD;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-top: 4px solid #077A7D;
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            background: #F5EEDD;
            border-top: none;
            color: #055B5D;
            font-weight: 600;
            padding: 15px;
        }

        .table td {
            padding: 15px;
            vertical-align: middle;
        }

        .profile-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #D1D5DB;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.875rem;
            border-radius: 4px;
        }

        .btn-primary {
            background: #077A7D;
            border: none;
        }

        .btn-primary:hover {
            background: #055B5D;
        }

        .btn-warning {
            background: #FBBF24;
            border: none;
            color: white;
        }

        .btn-warning:hover {
            background: #F59E0B;
            color: white;
        }

        .btn-danger {
            background: #EF4444;
            border: none;
        }

        .btn-danger:hover {
            background: #DC2626;
        }

        .btn-success {
            background: #F5EEDD;
            color: #055B5D;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: 600;
        }

        .btn-success:hover {
            background: #E5DDCC;
            color: #055B5D;
        }

        .badge {
            font-size: 0.875rem;
            padding: 8px 12px;
        }

        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .stats-card {
            background: #F5EEDD;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-align: center;
            border-top: 4px solid #077A7D;
        }

        .stats-number {
            font-size: 2rem;
            font-weight: bold;
            color: #077A7D;
        }
        .a a {
             color: #F5EEDD !important;
        }
        .champ-recherche {
    border: 2px solid #077A7D;
    border-radius: 8px;
    padding: 12px 16px;
    font-size: 16px;
    background-color: #F5EEDD;
    color: #055B5D;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.champ-recherche::placeholder {
    color: #999;
    font-style: italic;
}

.champ-recherche:focus {
    outline: none;
    border-color: #055B5D;
    box-shadow: 0 0 5px rgba(7, 122, 125, 0.5);
    background-color: #ffffff;
}

    </style>
</head>
<body>
  
    <nav class="navbar">
        <div class="container">
            <span class="navbar-brand">
                <i class="fas fa-users me-2"></i>
                Gestion des Étudiants
            </span>
            <div class="a">
                <a href="../index_dash.php">
                    <i class="fas fa-tachometer-alt"></i> Dashboard Admin
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
      
        <div class="welcome-section">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2><i class="fas fa-graduation-cap me-2"></i>Liste des Étudiants</h2>
                    <p class="mb-0">Gérez les informations des étudiants inscrits</p>
                </div>
                <div class="col-md-4 text-end">
                    <div class="stats-card">
                        <div class="stats-number"><?= count($resultat ?? []) ?></div>
                        <div>Étudiants</div>
                    </div>
                </div>
            </div>
        </div>

       
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">
                <i class="fas fa-list me-2"></i>Liste complète
            </h4>
            <a href="create.php" class="btn btn-success">
                <i class="fas fa-plus me-2"></i>Ajouter un étudiant
            </a>
        </div>

       <input type="text" id="champRecherche" placeholder="Rechercher un étudiant..." class="form-control champ-recherche mb-4">

        <div class="content-card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><i class="fas fa-id-card me-2"></i>ID</th>
                                <th><i class="fas fa-hashtag me-2"></i>N° Étudiant</th>
                                <th><i class="fas fa-user me-2"></i>Nom</th>
                                <th><i class="fas fa-envelope me-2"></i>Email</th>
                                <th><i class="fas fa-image me-2"></i>Photo</th>
                                <th><i class="fas fa-graduation-cap me-2"></i>Filière</th>
                                <th><i class="fas fa-cog me-2"></i>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultat as $etudiant): ?>
                                <tr>
                                    <td>
                                        <span class="badge bg-secondary"><?= htmlspecialchars($etudiant['id_etudiant']) ?></span>
                                    </td>
                                    <td>
                                        <strong><?= htmlspecialchars($etudiant['num_etudiant']) ?></strong>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-user-circle me-2 text-muted"></i>
                                            <?= htmlspecialchars($etudiant['nom']) ?>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="mailto:<?= htmlspecialchars($etudiant['email']) ?>" class="text-decoration-none">
                                            <?= htmlspecialchars($etudiant['email']) ?>
                                        </a>
                                    </td>
                                    <td>
                                        <img src="../../../images/<?= htmlspecialchars($etudiant['photo_profil']) ?>" 
                                             class="profile-img" 
                                             alt="Photo de <?= htmlspecialchars($etudiant['nom']) ?>">
                                    </td>
                                    <td>
                                        <span class="badge bg-success"><?= htmlspecialchars($etudiant['nom_filiere']) ?></span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="edite.php?id=<?= $etudiant['id_etudiant'] ?>" 
                                               class="btn btn-warning btn-sm" 
                                               title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="delete.php?id=<?= $etudiant['id_etudiant'] ?>" 
                                               class="btn btn-danger btn-sm" 
                                               title="Supprimer"
                                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
         
   <script>
   
    document.getElementById("champRecherche").addEventListener("input", function() {
        const texteRecherche = this.value.toLowerCase();
        const lignes = document.querySelectorAll("table tbody tr");

        lignes.forEach(ligne => {
            const nomCell = ligne.cells[2]; 
            if (nomCell) {
                const nom = nomCell.textContent.toLowerCase();
                ligne.style.display = nom.includes(texteRecherche) ? "" : "none";
            }
        });
    });
</script>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
