<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Notes</title>
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
            background: rgba(7, 122, 125, 0.05);
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
        }

        .welcome-section p {
            margin-top: 5px;
        }

        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stats-card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(7, 122, 125, 0.15);
            transition: transform 0.2s;
        }

        .stats-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(7, 122, 125, 0.3);
        }

        .stats-card i {
            font-size: 32px;
            color: #077A7D;
            margin-bottom: 15px;
        }

        .stats-card h4 {
            font-size: 28px;
            color: #1f2937;
            margin-bottom: 5px;
        }

        .stats-card p {
            color: #374151;
            margin: 0;
        }

        .notes-card {
            background: white;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 4px rgba(7, 122, 125, 0.15);
            margin-bottom: 20px;
        }

        .no-notes {
            background: white;
            border-radius: 8px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(7, 122, 125, 0.15);
            color: #374151;
        }

        .no-notes i {
            font-size: 48px;
            color: #077A7D;
            margin-bottom: 20px;
        }

        .no-notes h4 {
            margin-bottom: 15px;
        }

        .table-modern thead th {
            background: #077A7D;
            color: #F5EEDD;
            font-weight: 600;
            border: none;
            padding: 15px;
        }

        .table-modern tbody td {
            padding: 15px;
            border-color: #e5e7eb;
            vertical-align: middle;
        }

        .table-modern tbody tr:hover {
            background: #E0F2F1;
        }

        .note-value {
            font-weight: 600;
            font-size: 16px;
            color: #1f2937;
        }

        .appreciation.tres-bien {
            background: #dcfce7;
            color: #166534;
        }

        .appreciation.bien {
            background: #d9f0ff;
            color: #0c4a6e;
        }

        .appreciation.assez-bien {
            background: #fef3c7;
            color: #92400e;
        }

        .appreciation.passable {
            background: #fed7aa;
            color: #ea580c;
        }

        .appreciation.insuffisant {
            background: #fecaca;
            color: #dc2626;
        }

        .matiere-tag {
            background: #d9f0ff;
            color: #0c4a6e;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .type-note {
            background: #f1f5f9;
            color: #475569;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center w-100">
            <div>
                <a href="index2.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="indexNoteEtu.php" class="active"><i class="fas fa-chart-bar"></i> Notes</a>
            </div>
            <div class="profile-info">
                <span style="color: white;"><?= htmlspecialchars($_SESSION['user']['nom']) ?></span>
                <img src="/PROJET PHP/images/<?= htmlspecialchars($_SESSION['user']['photo_profil']) ?>" alt="Photo Profil" style="border-radius:50%; width:50px; height:50px;">
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidebar">
             <h5><img src="/PROJET PHP/images/a.jpg" alt="" style="width:80px; height:80px;border-radius:50%;"><br></i>Mon Carnet</h5>
            
            <a href="indexCoursEtu.php"><i class="fas fa-book"></i> Cours</a>
            <a href="indexNoteEtu.php" class="active"><i class="fas fa-chart-bar"></i> Notes</a>
            <a href="indexEmploiEtu.php"><i class="fas fa-clock"></i> Emploi du temps</a>
            <a href="index.php"><i class="fas fa-comments"></i> Forum</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
        </div>

        <div class="col-md-9 main-content">
            <div class="welcome-section">
                <h3><i class="fas fa-chart-bar me-2"></i>Mes Notes</h3>
                <p>Bienvenue, <?= htmlspecialchars($_SESSION['user']['nom']) ?></p>
            </div>

            <?php if (empty($mes_notes)): ?>
                <div class="no-notes">
                    <i class="fas fa-chart-line"></i>
                    <h4>Aucune note disponible</h4>
                    <p>Aucune évaluation n'a encore été enregistrée pour votre profil.</p>
                </div>
            <?php else: ?>
                <!-- Statistiques -->
                <div class="stats-cards">
                    <div class="stats-card">
                        <i class="fas fa-calculator"></i>
                        <h4>
                            <?php 
                                $total_points = 0;
                                $total_coeff = 0;
                                foreach ($mes_notes as $note) {
                                    $total_points += $note['valeur'] * $note['coefficient'];
                                    $total_coeff += $note['coefficient'];
                                }
                                $moyenne_generale = $total_coeff > 0 ? round($total_points / $total_coeff, 2) : 0;
                                echo $moyenne_generale;
                            ?>/20
                        </h4>
                        <p>Moyenne Générale</p>
                    </div>
                    <div class="stats-card">
                        <i class="fas fa-list-ol"></i>
                        <h4><?php echo count($mes_notes); ?></h4>
                        <p>Total Notes</p>
                    </div>
                    <div class="stats-card">
                        <i class="fas fa-trophy"></i>
                        <h4>
                            <?php 
                                $meilleure_note = 0;
                                foreach ($mes_notes as $note) {
                                    if ($note['valeur'] > $meilleure_note) {
                                        $meilleure_note = $note['valeur'];
                                    }
                                }
                                echo $meilleure_note;
                            ?>/20
                        </h4>
                        <p>Meilleure Note</p>
                    </div>
                </div>

                <!-- Tableau des notes -->
                <div class="notes-card">
                    <div class="table-responsive">
                        <table class="table table-modern mb-0">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-book me-2"></i>Matière</th>
                                    <th><i class="fas fa-clipboard-check me-2"></i>Type d'Évaluation</th>
                                    <th><i class="fas fa-star me-2"></i>Note</th>
                                    <th><i class="fas fa-weight-hanging me-2"></i>Coefficient</th>
                                    <th><i class="fas fa-user-tie me-2"></i>Professeur</th>
                                    <th><i class="fas fa-thumbs-up me-2"></i>Appréciation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($mes_notes as $note): ?>
                                    <tr>
                                        <td>
                                            <span class="matiere-tag">
                                                <?= htmlspecialchars($note['nom_matiere']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="type-note">
                                                <?= htmlspecialchars($note['type_note']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="note-value">
                                                <?= $note['valeur']; ?>/20
                                            </span>
                                        </td>
                                        <td>
                                            <strong><?= $note['coefficient']; ?></strong>
                                        </td>
                                        <td>
                                            <i class="fas fa-user me-1"></i>
                                            <?= htmlspecialchars($note['nom_professeur']); ?>
                                        </td>
                                        <td>
                                            <?php 
                                                $appreciation_text = "";
                                                $appreciation_class = "";
                                                
                                                if ($note['valeur'] >= 16) {
                                                    $appreciation_text = "Très bien";
                                                    $appreciation_class = "tres-bien";
                                                } elseif ($note['valeur'] >= 14) {
                                                    $appreciation_text = "Bien";
                                                    $appreciation_class = "bien";
                                                } elseif ($note['valeur'] >= 12) {
                                                    $appreciation_text = "Assez bien";
                                                    $appreciation_class = "assez-bien";
                                                } elseif ($note['valeur'] >= 10) {
                                                    $appreciation_text = "Passable";
                                                    $appreciation_class = "passable";
                                                } else {
                                                    $appreciation_text = "Insuffisant";
                                                    $appreciation_class = "insuffisant";
                                                }
                                            ?>
                                            <span class="appreciation <?= $appreciation_class; ?>">
                                                <?= $appreciation_text; ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
