<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Académique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: #F5EEDD;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background: #077A7D;
            padding: 1rem;
        }

        .navbar-brand {
            color: #F5EEDD !important;
            font-weight: 600;
        }

        .main-content {
            padding: 30px;
        }

        .welcome-section {
            background: linear-gradient(135deg, #077A7D, #05595B);
            color: #F5EEDD;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(7, 122, 125, 0.3);
            text-align: center;
        }

        .welcome-section h2 {
            margin: 0;
            font-weight: 600;
        }

        .gestion-card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            height: 100%;
            border-top: 4px solid #077A7D;
        }

        .gestion-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .card-icon {
            font-size: 48px;
            color: #077A7D;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 24px;
            color: #1f2937;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .card-description {
            color: #6b7280;
            margin-bottom: 20px;
        }

        .action-list {
            list-style: none;
            padding: 0;
            margin-bottom: 25px;
        }

        .action-list li {
            padding: 8px 0;
            color: #374151;
        }

        .action-list li i {
            color: #077A7D;
            margin-right: 10px;
            width: 16px;
        }

        .btn-action {
            background: #077A7D;
            color: white;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
            display: inline-block;
        }

        .btn-action:hover {
            background: #05595B;
            color: white;
            transform: translateY(-1px);
        }

        .back-btn {
            background: #6b7280;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 20px;
            display: inline-block;
            transition: background 0.2s;
        }

        .back-btn:hover {
            background: #4b5563;
            color: white;
        }
        .a a {
             color: #F5EEDD !important;
        }
    </style>
</head>

<body>
  
    <nav class="navbar">
        <div class="container-fluid">
            <span class="navbar-brand">
                <i class="fas fa-cogs me-2"></i>
                Gestion Académique
            </span>
            <div class="a">
                <a href="../index_dash.php">
                    <i class="fas fa-tachometer-alt"></i> Dashboard Admin
                </a>
            </div>
        </div>
    </nav>

    
    <div class="container-fluid">
        <div class="main-content">
            
           

          
            <div class="welcome-section">
                <h2>Gestion des Matières et Documents</h2>
                <p>Choisissez l'action que vous souhaitez effectuer</p>
            </div>

            <div class="row g-4">
              
                <div class="col-lg-6">
                    <div class="gestion-card">
                        <div class="text-center">
                            <i class="fas fa-book-open card-icon"></i>
                            <h3 class="card-title">Gestion des Matières</h3>
                            <p class="card-description">
                                Administrez toutes vos matières
                            </p>
                        </div>

                        <ul class="action-list">
                            <li><i class="fas fa-plus-circle"></i> Ajouter une matière</li>
                            <li><i class="fas fa-edit"></i> Modifier une matière</li>
                            <li><i class="fas fa-trash-alt"></i> Supprimer une matière</li>
                            <li><i class="fas fa-list"></i> Voir toutes les matières</li>
                        </ul>

                        <div class="text-center">
                            <a href="index_liste_matiere.php" class="btn-action">
                                <i class="fas fa-arrow-right me-2"></i>
                                Gérer les Matières
                            </a>
                        </div>
                    </div>
                </div>

                
                <div class="col-lg-6">
                    <div class="gestion-card">
                        <div class="text-center">
                            <i class="fas fa-file-alt card-icon"></i>
                            <h3 class="card-title">Gestion des Documents</h3>
                            <p class="card-description">
                                Gérez tous vos documents PDF
                            </p>
                        </div>

                        <ul class="action-list">
                            <li><i class="fas fa-upload"></i> Ajouter un document</li>
                            <li><i class="fas fa-edit"></i> Modifier un document</li>
                            <li><i class="fas fa-trash-alt"></i> Supprimer un document</li>
                            <li><i class="fas fa-folder-open"></i> Voir tous les documents</li>
                        </ul>

                        <div class="text-center">
                            <a href="index_liste_doc.php" class="btn-action">
                                <i class="fas fa-arrow-right me-2"></i>
                                Gérer les Documents
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
