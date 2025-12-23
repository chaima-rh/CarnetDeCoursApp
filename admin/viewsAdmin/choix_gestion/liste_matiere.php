
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Liste des Matières</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
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

    .badge-coeff {
      background: #077A7D;
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
      font-weight: 500;
      border: none;
      text-decoration: none;
      transition: 0.3s ease-in-out;
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

    .back-btn {
      background: #6b7280;
      color: white;
      padding: 8px 16px;
      border-radius: 6px;
      font-size: 14px;
      margin-bottom: 20px;
      display: inline-block;
      text-decoration: none;
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
        <i class="fas fa-book me-2"></i>
        Liste des Matières
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
        <h2><i class="fas fa-list me-2"></i>Gestion des Matières</h2>
        <p class="mb-0">Consultez et gérez toutes vos matières</p>
      </div>

      <div class="content-card">
        <div class="actions-header">
          <h5 class="mb-0">Liste des matières</h5>
          <a href="index_ajouter_matiere.php" class="btn-add">
            <i class="fas fa-plus me-2"></i>Ajouter une Matière
          </a>
        </div>

        <hr class="my-3"/>

        <?php if (count($matieres) > 0): ?>
          <div class="table-container">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nom Matière</th>
                  <th>Coefficient</th>
                  <th>Professeur</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($matieres as $matiere): ?>
                  <tr>
                    <td><?= htmlspecialchars($matiere['id_matiere']) ?></td>
                    <td><?= htmlspecialchars($matiere['nom_matiere']) ?></td>
                    <td><span class="badge-coeff"><?= htmlspecialchars($matiere['coefficient']) ?></span></td>
                    <td><?= htmlspecialchars($matiere['nom_professeur']) ?></td>
                    <td>
                      <a href="index_update_matiere.php?id=<?= $matiere['id_matiere'] ?>" 
                         class="btn btn-action btn-edit" title="Modifier">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="index_delete_matiere.php?id=<?= $matiere['id_matiere'] ?>" 
                         class="btn btn-action btn-delete" title="Supprimer"
                         onclick="return confirm('Voulez-vous vraiment supprimer cette matière ?')">
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
            <i class="fas fa-book-open"></i>
            <h5>Aucune matière enregistrée</h5>
            <p>Ajoutez votre première matière dès maintenant.</p>
            <a href="index_ajouter_matiere.php" class="btn-add mt-3">
              <i class="fas fa-plus me-2"></i>Ajouter une Matière
            </a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
