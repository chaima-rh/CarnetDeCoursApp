<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Documents</title>
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
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(7, 122, 125, 0.3);
        }

        .welcome-section h2 {
            margin: 0;
            font-weight: 600;
        }

        .content-card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-top: 4px solid #077A7D;
        }

        .table th {
            background: #E9F8F9;
            color: #1f2937;
            font-weight: 600;
            padding: 15px;
        }

        .table td {
            padding: 15px;
            vertical-align: middle;
        }

        .badge-matiere {
            background: #077A7D;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 500;
        }

        .badge-secondary {
            background: #6b7280;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 500;
        }

        .btn-action {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 14px;
            margin-right: 5px;
            transition: all 0.2s;
        }

        .btn-open {
            background: #3b82f6;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s;
        }

        .btn-open:hover {
            background: #2563eb;
            transform: translateY(-1px);
        }

        .btn-edit {
            background: #10b981;
            color: white;
            border: none;
        }

        .btn-edit:hover {
            background: #059669;
            transform: translateY(-1px);
        }

        .btn-delete {
            background: #ef4444;
            color: white;
            border: none;
        }

        .btn-delete:hover {
            background: #dc2626;
            transform: translateY(-1px);
        }

        .btn-add {
            background: #077A7D;
            color: #F5EEDD;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
            border: none;
        }

        .btn-add:hover {
            background: #05595B;
            color: white;
            transform: translateY(-1px);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #6b7280;
        }

        .empty-state i {
            font-size: 64px;
            margin-bottom: 20px;
            color: #d1d5db;
        }

        .table-container {
            overflow-x: auto;
        }

        .actions-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .description-text {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .text-muted-custom {
            color: #6b7280;
            font-style: italic;
        }

        .nav-link {
            color: white !important;
            opacity: 0.8;
            transition: opacity 0.2s;
        }

        .nav-link:hover {
            opacity: 1;
        }

        .nav-link.active {
            opacity: 1;
            font-weight: 600;
        }

        .navbar-nav {
            margin-left: auto;
        }

      
        .a a {
             color: #F5EEDD !important;
             
        }
    </style>
</head>
<body>

   
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <span class="navbar-brand">
                <i class="fas fa-file-alt me-2"></i>
                Système de Gestion
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
                <h2><i class="fas fa-file-text me-2"></i>Gestion des Documents</h2>
                <p class="mb-0">Consultez et gérez tous vos documents</p>
            </div>

        
            <div class="content-card">
                <div class="actions-header">
                    <h5 class="mb-0">Liste des documents</h5>
                    <a href="index_ajout_doc.php" class="btn-add">
                        <i class="fas fa-plus me-2"></i>Ajouter Document
                    </a>
                </div>

                <hr class="my-3">

                <?php if (count($resultat) > 0): ?>
                    <div class="table-container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Matière</th>
                                    <th>Document</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($resultat as $document): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($document['id_document']) ?></td>
                                        <td>
                                            <?php if ($document['nom_matiere']): ?>
                                                <span class="badge-matiere"><?= htmlspecialchars($document['nom_matiere']) ?></span>
                                            <?php else: ?>
                                                <span class="badge-secondary">Non définie</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($document['chemin']): ?>
                                                <a href="<?= htmlspecialchars('../../../' . $document['chemin']) ?>" 
                                                   target="_blank" class="btn-open">
                                                    <i class="fas fa-external-link-alt me-1"></i>Ouvrir
                                                </a>
                                            <?php else: ?>
                                                <span class="text-muted-custom">Aucun fichier</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($document['descr']): ?>
                                                <span class="description-text" title="<?= htmlspecialchars($document['descr']) ?>">
                                                    <?= htmlspecialchars($document['descr']) ?>
                                                </span>
                                            <?php else: ?>
                                                <span class="text-muted-custom">Pas de description</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="index_update_doc.php?id=<?= $document['id_document'] ?>" 
                                               class="btn btn-action btn-edit" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="index_delete_doc.php?id=<?= $document['id_document'] ?>" 
                                               class="btn btn-action btn-delete" title="Supprimer"
                                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce document ?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        <i class="fas fa-folder-open"></i>
                        <h5>Aucun document trouvé</h5>
                        <p>Commencez par ajouter votre premier document !</p>
                        <a href="index_ajout_doc.php" class="btn-add mt-3">
                            <i class="fas fa-plus me-2"></i>Ajouter Document
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
