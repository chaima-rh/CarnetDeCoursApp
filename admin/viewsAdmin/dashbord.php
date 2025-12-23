<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["user"])) {
    header("Location: indexlog.php");
    exit();
}

// بيانات تجريبية للعرض - يمكن ربطها بقاعدة البيانات حسب تطبيقك

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard Administrateur</title>
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

        .navbar a:hover {
            color: #F5EEDD;
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
            color: #F5EEDD;
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(7, 122, 125, 0.3);
        }

        .welcome-section h3 {
            margin: 0;
            font-weight: 600;
        }

        .stats-card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            height: 200px;
            width: 250px;
            border-top: 4px solid #077A7D;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .stats-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .stats-card i {
            font-size: 36px;
            color: #077A7D;
            margin-bottom: 15px;
        }

        .stats-card h4 {
            font-size: 32px;
            color: #1f2937;
            margin-bottom: 5px;
            font-weight: 700;
        }

        .stats-card p {
            color: #6b7280;
            margin: 0;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .profile-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #e5e5e5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #077A7D;
            font-weight: bold;
            font-size: 24px;
        }

        .profile-info {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div>
                <a href="dashboardAdmin.php"><i class="fas fa-tachometer-alt"></i> Dashboard Admin</a>
            </div>
            <div class="profile-info">
                <span>Admin - <?= htmlspecialchars($_SESSION['user']['nom'] ?? 'Administrateur') ?></span>
                <div class="profile-img">
                    <i class="fas fa-user-shield"></i>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar">
                <h5><i class="fas fa-cogs me-2"></i>Administration</h5>
                <a href="etudiant/indexEtu.php" class="active"><i class="fas fa-users"></i> Gestion Utilisateurs</a>
                <a href="choix_gestion/choix_gestion.php"><i class="fas fa-book"></i> Gestion Cours</a>
                <a href="note/indexNote.php"><i class="fas fa-chalkboard-teacher"></i> Gestion Notes</a>
                <a href="emploi_du_temps/indexliste.php"><i class="fas fa-bell"></i>Emploi du temps</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
            </div>

            <div class="col-md-9 main-content">
                <div class="welcome-section">
                    <h3>Bienvenue, <?= htmlspecialchars($_SESSION['user']['nom'] ?? 'Administrateur') ?></h3>
                    <p>Voici un aperçu global de la plateforme</p>
                </div>

                <div class="d-flex flex-wrap gap-4 justify-content-start">
                    <div class="stats-card">
                        <i class="fas fa-users"></i>
                        <h4><?= $nombre_etu?></h4>
                        <p>Utilisateurs inscrits</p>
                    </div>
                    <div class="stats-card">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <h4><?= $nombre_prof ?></h4>
                        <p>Professeurs actifs</p>
                    </div>
                    <div class="stats-card">
                        <i class="fas fa-bell"></i>
                        <h4><?= $nombre_documents  ?></h4>
                        <p>Document</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
