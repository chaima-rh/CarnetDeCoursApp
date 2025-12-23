<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Mes Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        body {
            background: #F5EEDD;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background: #077A7D;
            padding: 1rem;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-weight: 600;
        }

        .navbar a:hover,
        .navbar a.active {
            color: #F5EEDD;
            text-decoration: underline;
        }
   .sidebar {
            background: white;
            min-height: calc(100vh - 76px);
            padding: 20px;
            border-right: 1px solid #e5e7eb;
        }

        .sidebar h5 {
            color: #1f2937;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .sidebar a {
            display: block;
            color: #374151;
            text-decoration: none;
            padding: 10px 15px;
            margin-bottom: 5px;
            border-radius: 6px;
            transition: all 0.2s;
        }

        .sidebar a:hover, .sidebar a.active {
            background: #D9EEE9;
            color: #077A7D;
        }

        .sidebar a i {
            margin-right: 10px;
            width: 16px;
        }
        .main-content {
            padding: 30px;
            background: #F5EEDD;
        }

        .welcome-section {
            background: linear-gradient(135deg, #077A7D, #05595B);
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(7, 122, 125, 0.3);
            color: #F5EEDD;
        }

        .welcome-section h3 {
            margin: 0;
            font-weight: 600;
        }

        .welcome-section p {
            margin: 5px 0 0 0;
            opacity: 0.9;
        }

        .course-card {
            background: white;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .course-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(7, 122, 125, 0.2);
        }

        .course-title {
            color: #1f2937;
            font-weight: 600;
            font-size: 20px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .course-title i {
            color: #077A7D;
            margin-right: 10px;
            font-size: 24px;
        }

        .course-professor {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .course-professor i {
            color: #077A7D;
            margin-right: 8px;
        }

        .course-description {
            color: #6b7280;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .download-btn {
            background: #077A7D;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.2s;
            border: none;
            display: inline-flex;
            align-items: center;
            font-weight: 600;
        }

        .download-btn:hover {
            background: #05595B;
            color: white;
        }

        .download-btn i {
            margin-right: 8px;
        }

        .no-courses {
            background: white;
            border-radius: 8px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(7, 122, 125, 0.15);
            color: #6b7280;
        }

        .no-courses i {
            font-size: 48px;
            color: #077A7D;
            margin-bottom: 20px;
        }

        .no-courses h4 {
            color: #1f2937;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .profile-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile-info img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div>
                    <a href="index2.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    <a href="indexCoursEtu.php" class="active"><i class="fas fa-book"></i> Cours</a>
                </div>
                <div class="profile-info">
                    <span><?= htmlspecialchars($_SESSION['user']['nom']) ?></span>
                    <img src="/PROJET PHP/images/<?= htmlspecialchars($_SESSION['user']['photo_profil']) ?>" alt="Profil" />
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar">
                 <h5><img src="/PROJET PHP/images/a.jpg" alt="" style="width:80px; height:80px;border-radius:50%;"><br></i>Mon Carnet</h5>

                <a href="indexCoursEtu.php" class="active"><i class="fas fa-book"></i> Cours</a>
                <a href="indexNoteEtu.php"><i class="fas fa-chart-bar"></i> Notes</a>
                <a href="indexEmploiEtu.php"><i class="fas fa-clock"></i> Emploi du temps</a>
                <a href="index.php"><i class="fas fa-comments"></i> Forum</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
            </div>

            <div class="col-md-9 main-content">
                <div class="welcome-section">
                    <h3><i class="fas fa-book me-2"></i>Mes Cours</h3>
                    <p>Bienvenue, <?= htmlspecialchars($_SESSION['user']['nom']) ?></p>
                </div>

                <!-- Affichage des cours -->
                <?php if (empty($mes_cours)): ?>
                    <div class="no-courses">
                        <i class="fas fa-book-open"></i>
                        <h4>Aucun cours disponible</h4>
                        <p>Aucun document trouvé pour votre filière pour le moment.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($mes_cours as $cours): ?>
                        <div class="course-card">
                            <div class="course-title">
                                <i class="fas fa-book"></i><?= htmlspecialchars($cours['nom_matiere']); ?>
                            </div>
                            <div class="course-professor">
                                <i class="fas fa-user"></i>Professeur: <?= htmlspecialchars($cours['nom_professeur']); ?>
                            </div>
                            <div class="course-description">
                                <?= htmlspecialchars($cours['descr']); ?>
                            </div>
                            <a href="<?= htmlspecialchars($cours['chemin']); ?>" class="download-btn" target="_blank" rel="noopener noreferrer">
                                <i class="fas fa-download"></i>Télécharger le cours
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
