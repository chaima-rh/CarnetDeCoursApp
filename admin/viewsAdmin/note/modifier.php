<?php
$pdo = new PDO("mysql:host=localhost;dbname=projet", "root", "");

// Charger les données dynamiques
$etudiants = $pdo->query("SELECT id_etudiant, nom FROM etudiants")->fetchAll(PDO::FETCH_ASSOC);
$matieres = $pdo->query("SELECT id_matiere, nom_matiere FROM matieres")->fetchAll(PDO::FETCH_ASSOC);

// Récupération de la note à modifier (ex: depuis controller)
$id_note = $_GET['id'] ?? null;
$stmt = $pdo->prepare("SELECT * FROM notes WHERE id_note = ?");
$stmt->execute([$id_note]);
$note = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Note</title>
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
            justify-content: flex-start;
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

        .form-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 30px;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-label {
            color: #1f2937;
            font-weight: 600;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-label i {
            margin-right: 8px;
            color: #077A7D;
        }

        .form-control, .form-select {
            border: 1px solid #d1d5db;
            border-radius: 6px;
            padding: 12px 15px;
            font-size: 14px;
            transition: all 0.2s;
            margin-bottom: 20px;
        }

        .form-control:focus, .form-select:focus {
            border-color: #077A7D;
            box-shadow: 0 0 0 3px rgba(7, 122, 125, 0.1);
        }

        .btn-submit {
            background: #10b981;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            transition: all 0.2s;
            box-shadow: 0 2px 4px rgba(16, 185, 129, 0.2);
        }

        .btn-submit:hover {
            background: #059669;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(5, 150, 105, 0.3);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .required {
            color: #ef4444;
            margin-left: 4px;
        }

        .form-note {
            background: #E9F8F9;
            border: 1px solid #BAE6FD;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 25px;
            color: #05595B;
            font-size: 14px;
        }

        .form-note i {
            margin-right: 8px;
            color: #077A7D;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div>
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
                <i class="fas fa-edit"></i>
                Modifier une Note
            </h2>
            <p style="margin: 5px 0 0 39px; opacity: 0.9;">
                Modifiez les informations de la note sélectionnée
            </p>
        </div>

        <div class="actions-bar">
            <a href="indexNote.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
        </div>

        <div class="form-container">
            <div class="form-note">
                <i class="fas fa-info-circle"></i>
                Tous les champs marqués d'un astérisque (*) sont obligatoires
            </div>

            <form method="post" action="indexNote.php?action=modifier_note&id=<?= $note['id_note'] ?>">
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-user"></i>
                        Étudiant <span class="required">*</span>
                    </label>
                    <select name="id_etudiant" class="form-select" required>
                        <?php foreach ($etudiants as $etudiant): ?>
                            <option value="<?= $etudiant['id_etudiant'] ?>" <?= $etudiant['id_etudiant'] == $note['id_etudiant'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($etudiant['nom']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-book"></i>
                        Matière <span class="required">*</span>
                    </label>
                    <select name="id_matiere" class="form-select" required>
                        <?php foreach ($matieres as $matiere): ?>
                            <option value="<?= $matiere['id_matiere'] ?>" <?= $matiere['id_matiere'] == $note['id_matiere'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($matiere['nom_matiere']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-tag"></i>
                        Type de note <span class="required">*</span>
                    </label>
                    <select name="type_note" class="form-select" required>
                        <option value="CC" <?= $note['type_note'] == 'CC' ? 'selected' : '' ?>>CC - Contrôle Continu</option>
                        <option value="TP" <?= $note['type_note'] == 'TP' ? 'selected' : '' ?>>TP - Travaux Pratiques</option>
                        <option value="EFM" <?= $note['type_note'] == 'EFM' ? 'selected' : '' ?>>EFM - Examen de Fin de Module</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-star"></i>
                        Note sur 20 <span class="required">*</span>
                    </label>
                    <input type="number" 
                           name="valeur" 
                           class="form-control" 
                           step="0.01" 
                           min="0" 
                           max="40" 
                           value="<?= htmlspecialchars($note['valeur']) ?>" 
                           placeholder="Ex: 15.50"
                           required>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i>
                    Enregistrer les modifications
                </button>
            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>