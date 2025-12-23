<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Emploi du Temps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
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

        .btn-success {
            background: #10b981;
            border: none;
            padding: 12px 30px;
            border-radius: 6px;
            color: #F5EEDD;
            font-weight: 600;
            transition: background 0.3s;
        }

        .btn-success:hover {
            background: #059669;
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
        }

        .table-header {
            background: linear-gradient(135deg, #077A7D, #0B4F51);
            color: #F5EEDD;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            margin-bottom: 0;
            text-align: center;
            box-shadow: 0 2px 6px rgba(7, 122, 125, 0.3);
        }

        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(7, 122, 125, 0.15);
        }

        .table-dark {
            background: #2C3E40;
        }

        .jour-badge {
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.9em;
            color: #F5EEDD;
            display: inline-block;
            background: #0B4F51;
        }

        .time-badge {
            background: #E0F2F1;
            color: #077A7D;
            padding: 6px 10px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.9em;
            display: inline-block;
        }

        .badge {
            background: #77C9D4;
            color: #054A50;
            padding: 6px 10px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.9em;
        }

        .salle-badge {
            background: #77C9D4;
            color: #054A50;
            padding: 6px 10px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.9em;
        }

        .alert-info {
            background: #DFF6F5;
            border: 1px solid #077A7D;
            color: #054A50;
            border-radius: 8px;
            text-align: center;
            padding: 30px;
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
                <i class="fas fa-calendar-alt me-2"></i>
                Emploi du Temps
            </span>
            <div>
                <a href="../index_dash.php">
                    <i class="fas fa-tachometer-alt"></i> Dashboard Admin
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
       
        <div class="welcome-section">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2><i class="fas fa-calendar-week me-2"></i>Emploi du Temps</h2>
                    <p class="mb-0">Planning hebdomadaire des cours</p>
                </div>
                <a href="indexajouter.php" class="btn btn-success">
                    <i class="fas fa-plus me-2"></i>Ajouter un cours
                </a>
            </div>
        </div>

        <?php
        $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];

        if (!empty($cours)):
           
            $cours_par_jour = [];
            foreach ($cours as $c) {
                $cours_par_jour[$c['jour']][] = $c;
            }

          
            $ordre_jours = array_flip($jours);
            uksort($cours_par_jour, function ($a, $b) use ($ordre_jours) {
                return $ordre_jours[$a] - $ordre_jours[$b];
            });
        ?>
           
            <div class="table-header">
                <h3><i class="fas fa-table me-2"></i>Planning Complet de la Semaine</h3>
            </div>

          
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Jour</th>
                            <th>Heure Début</th>
                            <th>Heure Fin</th>
                            <th>Matière</th>
                            <th>Salle</th>
                            <th>filiere</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cours_par_jour as $jour => $cours_du_jour): ?>
                            <?php foreach ($cours_du_jour as $index => $c): ?>
                                <tr>
                                    <?php if ($index === 0): ?>
                                        <td rowspan="<?= count($cours_du_jour) ?>" class="align-middle">
                                            <?= htmlspecialchars($jour) ?>
                                        </td>
                                    <?php endif; ?>
                                    <td><span class="time-badge"><?= substr($c['heure_debut'], 0, 5) ?></span></td>
                                    <td><span class="time-badge"><?= substr($c['heure_fin'], 0, 5) ?></span></td>
                                    <td><span class="badge"><?= htmlspecialchars($c['nom_matiere']) ?></span></td>
                                    <td><span class="salle-badge"><?= htmlspecialchars($c['salle']) ?></span></td>
                                    <td><span class="salle-badge"><?= htmlspecialchars($c['nom_filiere']) ?></span></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info mt-4">
                <i class="fas fa-calendar-plus fa-3x mb-3"></i>
                <h4>Aucun cours programmé</h4>
                <p class="mb-4">Commencez par ajouter votre premier cours à l'emploi du temps.</p>
                <a href="indexEmploi.php?action=emploi_ajouter" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Ajouter un cours
                </a>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
