<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Notes</title>
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
        }

        .navbar a:hover {
            color: #F5EEDD;
        }

        .main-content {
            padding: 30px;
            min-height: calc(100vh - 76px);
        }

        .page-header {
            background: linear-gradient(135deg, #077A7D, #05595B);
            color: #F5EEDD;
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(7, 122, 125, 0.3);
        }

        .page-header h2 {
            margin: 0;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .page-header h2 i {
            margin-right: 15px;
        }

        .actions-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn-primary {
            background: #077A7D;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: 500;
            box-shadow: 0 2px 4px rgba(7, 122, 125, 0.2);
            transition: all 0.2s;
            color: white;
        }

        .btn-primary:hover {
            background: #05595B;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #6b7280;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s;
            color: white;
        }

        .btn-secondary:hover {
            background: #4b5563;
            transform: translateY(-1px);
        }

        .btn-danger {
            background: #ef4444;
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
            border: none;
            transition: all 0.2s;
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: translateY(-1px);
        }

        .table-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .table thead th {
            background: #F5EEDD;
            color: #1f2937;
            font-weight: 600;
            border: none;
            padding: 20px 15px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table tbody td {
            padding: 15px;
            border-color: #e5e7eb;
            color: #374151;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: #f9fafb;
        }

        .type-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .type-cc {
            background: #dbeafe;
            color: #2563eb;
        }

        .type-tp {
            background: #d1fae5;
            color: #059669;
        }

        .type-efm {
            background: #fecaca;
            color: #dc2626;
        }

        .note-value {
            font-weight: 600;
            font-size: 16px;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #6b7280;
        }

        .empty-state i {
            font-size: 48px;
            color: #d1d5db;
            margin-bottom: 20px;
        }
        .a a {
             color: #F5EEDD !important;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="a">
                <a href="../index_dash.php">
                    <i class="fas fa-tachometer-alt"></i> Dashboard Admin
                </a>
            </div>
            <div class="profile-info">
                <span style="color: white;">Gestion des Notes</span>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <div class="page-header">
            <h2>
                <i class="fas fa-chart-bar"></i>
                Liste des Notes
            </h2>
            <p style="margin: 5px 0 0 39px; opacity: 0.9;">
                Consultez et gérez toutes les notes des étudiants
            </p>
        </div>

        <div class="actions-bar">
           
            <a href="indexNote.php?action=ajouter_note" class="btn btn-primary">
                <i class="fas fa-plus"></i> Ajouter une note
            </a>
        </div>

        
        <div class="table-container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th><i class="fas fa-user"></i> Étudiant</th>
                        <th><i class="fas fa-book"></i> Matière</th>
                        <th><i class="fas fa-tag"></i> Type</th>
                        <th><i class="fas fa-star"></i> Note</th>
                        <th><i class="fas fa-cogs"></i> Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($notes as $note): ?>
                    <tr>
                        <td><?= htmlspecialchars($note['nom_etudiant']) ?></td>
                        <td><?= htmlspecialchars($note['nom_matiere']) ?></td>
                        <td>
                            <span class="type-badge type-<?= strtolower($note['type_note']) ?>">
                                <?= htmlspecialchars($note['type_note']) ?>
                            </span>
                        </td>
                        <td><?= htmlspecialchars($note['valeur']) ?>/20</td>
                        <td>
                            <a href="indexNote.php?action=supprimer_note&id=<?= $note['id_note'] ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Voulez-vous vraiment supprimer cette note ?');">
                                <i class="fas fa-trash"></i> Supprimer
                            </a>
                             <a href="indexNote.php?action=modifier_note&id=<?= $note['id_note'] ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Voulez-vous vraiment Modifier cette note ?');">
                                <i class="fas fa-trash"></i> Modifier
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
