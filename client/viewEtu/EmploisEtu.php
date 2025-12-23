<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Mon Emploi du Temps</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<style>
    body {
        background: #F5EEDD; /* خلفية فاتحة دافئة */
        font-family: 'Segoe UI', sans-serif;
        color: #05595B; /* نص تيل داكن */
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

    .profile-info {
        display: flex;
        align-items: center;
        gap: 15px;
        color: #D1F1EF;
        font-weight: 700;
    }

    .profile-info img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #D1F1EF;
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

    .schedule-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(7,122,125,0.1);
        overflow: hidden;
        color: #05595B;
    }

    .schedule-header {
        background: #D1F1EF;
        padding: 20px 25px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 700;
        font-size: 1.25rem;
        border-bottom: 2px solid #077A7D;
        color: #05595B;
    }

    .day-section {
        border-bottom: 1px solid #D1F1EF;
    }

    .day-header {
        background: #E4F1F2;
        padding: 18px 25px;
        border-left: 5px solid #077A7D;
        font-weight: 700;
        color: #077A7D;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .day-icon {
        width: 22px;
        text-align: center;
        color: #077A7D;
    }

    .badge {
        margin-left: auto;
        font-weight: 700;
        background-color: #077A7D;
        color: #D1F1EF;
        padding: 4px 14px;
        border-radius: 20px;
        font-size: 0.9rem;
    }

    .course-item {
        background: #E4F1F2;
        padding: 18px 25px;
        border-bottom: 1px solid #D1F1EF;
        transition: background-color 0.3s ease-in-out;
        color: #05595B;
        border-radius: 8px;
        margin: 10px 20px;
    }

    .course-item:hover {
        background-color: #C9E4E7;
    }

    .course-time {
        font-weight: 700;
        color: #05595B;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .course-subject {
        font-weight: 900;
        color: #077A7D;
        font-size: 1.15rem;
        margin: 6px 0 4px 0;
    }

    .course-details {
        color: #05595B;
        font-size: 0.95rem;
        display: flex;
        gap: 24px;
        flex-wrap: wrap;
    }

    .course-detail-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .no-schedule {
        background: #D1F1EF;
        color: #077A7D;
        border-radius: 12px;
        padding: 40px;
        text-align: center;
        box-shadow: none;
    }

    .no-schedule i {
        font-size: 50px;
        margin-bottom: 20px;
    }

    .no-schedule h4 {
        margin-bottom: 10px;
    }
</style>

</head>
<body>

<nav class="navbar">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center w-100">
            <div>
                <a href="index2.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </div>
            <div class="profile-info">
                <span><?= htmlspecialchars($_SESSION['user']['nom']) ?></span>
                <img src="/PROJET PHP/images/<?= htmlspecialchars($_SESSION['user']['photo_profil']) ?>" alt="Photo Profil" />
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidebar">
             <h5><img src="/PROJET PHP/images/a.jpg" alt="" style="width:80px; height:80px;border-radius:50%;"><br></i>Mon Carnet</h5>
            
            <a href="indexCoursEtu.php"><i class="fas fa-book"></i> Cours</a>
            <a href="indexNoteEtu.php"><i class="fas fa-chart-bar"></i> Notes</a>
            <a href="indexEmploiEtu.php" class="active"><i class="fas fa-clock"></i> Emploi du temps</a>
            <a href="index.php"><i class="fas fa-comments"></i> Forum</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
        </div>

        <div class="col-md-9 main-content">
            <div class="welcome-section">
                <h3><i class="fas fa-clock me-2"></i> Mon Emploi du Temps</h3>
                <p>Bienvenue, <?= htmlspecialchars($_SESSION['user']['nom']) ?></p>
            </div>

            <?php if (empty($emploi_temps)): ?>
                <div class="no-schedule">
                    <i class="fas fa-calendar-times"></i>
                    <h4>Aucun cours planifié</h4>
                    <p>Aucun cours planifié pour votre filière pour le moment.</p>
                </div>
            <?php else: ?>
                <div class="schedule-card">
                    <div class="schedule-header">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Planning de la Semaine</span>
                    </div>

                    <?php
                    // Grouper les cours par jour
                    $cours_par_jour = [];
                    foreach ($emploi_temps as $cours) {
                        $jour = $cours['jour'];
                        if (!isset($cours_par_jour[$jour])) {
                            $cours_par_jour[$jour] = [];
                        }
                        $cours_par_jour[$jour][] = $cours;
                    }
                    ?>

                    <?php foreach ($cours_par_jour as $jour => $cours_du_jour): ?>
                        <div class="day-section">
                            <div class="day-header">
                                <i class="<?= $jours_icons[$jour] ?? 'fas fa-calendar' ?> day-icon"></i>
                                <?= htmlspecialchars($jour) ?>
                                <span class="badge"><?= count($cours_du_jour) ?> cours</span>
                            </div>

                            <?php foreach ($cours_du_jour as $cours): ?>
                                <div class="course-item">
                                    <div class="course-time">
                                        <i class="fas fa-clock"></i>
                                        <?= htmlspecialchars($cours['heure_debut']) ?> - <?= htmlspecialchars($cours['heure_fin']) ?>
                                    </div>
                                    <div class="course-subject">
                                        <?= htmlspecialchars($cours['nom_matiere']) ?>
                                    </div>
                                    <div class="course-details">
                                        <div class="course-detail-item">
                                            <i class="fas fa-user"></i>
                                            <?= htmlspecialchars($cours['nom_professeur']) ?>
                                        </div>
                                        <div class="course-detail-item">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <?= htmlspecialchars($cours['salle']) ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
