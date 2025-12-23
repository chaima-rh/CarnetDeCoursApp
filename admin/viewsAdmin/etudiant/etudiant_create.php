<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ajouter Étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="/PROJET%20PHP/style/admin/style_ajou.css">
    <style>
        body {
            background: #F5EEDD;
            font-family: 'Segoe UI', sans-serif;
            color: #1F2937;
        }

        .navbar {
            background: #077A7D;
            padding: 1rem;
        }

        .navbar-brand {
            color: #F5EEDD !important;
            font-weight: 600;
        }

        .welcome-section {
            background: linear-gradient(135deg, #077A7D, #0B4F51);
            color: #F5EEDD;
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .content-card {
            background: #FFFFFF;
            padding: 35px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(7, 122, 125, 0.15);
            border-top: 4px solid #077A7D;
            max-width: 800px;
            margin: 0 auto;
            color: #1F2937;
        }

        .form-control, .form-select {
            padding: 12px 15px;
            border-radius: 6px;
            border: 1px solid #A1C4C7;
            margin-bottom: 20px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus, .form-select:focus {
            border-color: #077A7D;
            box-shadow: 0 0 0 3px rgba(7, 122, 125, 0.15);
            outline: none;
        }

        .btn-primary {
            background: #077A7D;
            border: none;
            padding: 12px 30px;
            border-radius: 6px;
            color: #F5EEDD;
            font-weight: 600;
            transition: background 0.3s;
        }

        .btn-primary:hover {
            background: #0B4F51;
            color: #F5EEDD;
        }

        .form-label {
            font-weight: 600;
            color: #1F2937;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }

        .form-label i {
            color: #077A7D;
            margin-right: 8px;
        }
        .a a {
             color: #F5EEDD !important;
        }
    </style>
</head>
<body>
   
    <nav class="navbar">
        <div class="container">
            <span class="navbar-brand">
                <i class="fas fa-user-plus me-2"></i>
                Ajouter Étudiant
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
            <h2><i class="fas fa-user-plus me-2"></i>Ajouter un nouvel étudiant</h2>
            <p class="mb-0">Remplissez les informations de l'étudiant dans le formulaire ci-dessous</p>
        </div>

       
        <div class="content-card">
            <form action="etudiant_store.php" enctype="multipart/form-data" method="POST">
             
                <div class="row">
                    <div class="col-md-6">
                        <label for="num" class="form-label">
                            <i class="fas fa-hashtag"></i>Numéro étudiant
                        </label>
                        <input type="text" class="form-control" id="num" name="num" required />
                    </div>
                    
                    <div class="col-md-6">
                        <label for="nom" class="form-label">
                            <i class="fas fa-user"></i>Nom complet
                        </label>
                        <input type="text" class="form-control" id="nom" name="nom" required />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i>Adresse email
                        </label>
                        <input type="email" class="form-control" id="email" name="email" required />
                    </div>

                    <div class="col-md-6">
                        <label for="filiere" class="form-label">
                            <i class="fas fa-graduation-cap"></i>Filière
                        </label>
                        <select class="form-select" id="filiere" name="filiere" required>
                            <option value="">-- Choisir une filière --</option>
                            <?php
                            $pdo = connection_bd(); 
                            $stmt = $pdo->prepare("SELECT id_filiere, nom_filiere FROM filieres");
                            $stmt->execute();
                            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach($res as $f): ?>
                                <option value="<?= $f['id_filiere'] ?>">
                                    <?=$f['nom_filiere'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

            
                <div class="mt-4">
                    <label class="form-label">
                        <i class="fas fa-camera"></i>Photo de profil
                    </label>
                    
                    <div class="photo-section">
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required />
                    </div>
                </div>

              
                <div class="mt-4">
                    <label for="pswd" class="form-label">
                        <i class="fas fa-lock"></i>Mot de passe
                    </label>
                    <input type="password" class="form-control" id="pswd" name="pswd" />
                </div>

               
                <div class="d-flex justify-content-end mt-5">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
