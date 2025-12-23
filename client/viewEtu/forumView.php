<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Forum Collaboratif</title>
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
        .profile-info {
            display: flex;
            align-items: center;
            gap: 15px;
            color: white;
            font-weight: 600;
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

        .formulaire {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(7,122,125,0.1);
            margin-bottom: 30px;
        }

        .formulaire h4 {
            color: #05595B;
            margin-bottom: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .formulaire label {
            font-weight: 600;
            color: #05595B;
            margin-bottom: 8px;
            display: block;
        }

        .formulaire select, 
        .formulaire textarea {
            width: 100%;
            border: 1px solid #d1f1ef;
            border-radius: 6px;
            padding: 10px 15px;
            margin-bottom: 20px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .formulaire select:focus, 
        .formulaire textarea:focus {
            outline: none;
            border-color: #077A7D;
            box-shadow: 0 0 6px rgba(7,122,125,0.3);
        }

        .formulaire button {
            background-color: #077A7D;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 700;
            color: #D1F1EF;
            font-size: 14px;
            transition: background-color 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .formulaire button:hover {
            background-color: #05595B;
        }

        .post {
            background: white;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(7,122,125,0.1);
            transition: transform 0.3s ease;
        }

        .post:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(7,122,125,0.15);
        }

        .post-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #d1f1ef;
        }

        .post-subject {
            background-color: #D1F1EF;
            color: #05595B;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .post-content {
            color: #05595B;
            line-height: 1.6;
            margin-bottom: 20px;
            font-size: 15px;
        }

        .post-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #6b7280;
            font-size: 14px;
            padding-top: 15px;
            border-top: 1px solid #d1f1ef;
        }

        .post-author {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .post-date {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .alert-warning {
            background-color: #FCE9D9;
            color: #92400e;
            border: 1px solid #F9A825;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .no-posts {
            background-color: white;
            border-radius: 8px;
            padding: 40px;
            text-align: center;
            color: #6b7280;
            box-shadow: 0 2px 6px rgba(7,122,125,0.1);
        }

        .no-posts i {
            font-size: 48px;
            color: #077A7D;
            margin-bottom: 20px;
        }

        .no-posts h4 {
            color: #05595B;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .post-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
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
                <img src="../../images/<?= htmlspecialchars($_SESSION['user']['photo_profil']) ?>" alt="Photo Profil" />
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
            <a href="indexEmploiEtu.php"><i class="fas fa-clock"></i> Emploi du temps</a>
            <a href="index.php" class="active"><i class="fas fa-comments"></i> Forum</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
        </div>

        <div class="col-md-9 main-content">
            <div class="welcome-section">
                <h3><i class="fas fa-comments me-2"></i> Forum Collaboratif</h3>
                <p>Bienvenue, <?= htmlspecialchars($_SESSION['user']['nom']) ?></p>
            </div>

            <?php if (isset($_SESSION['user'])): ?>
                <div class="formulaire">
                    <h4>
                        <i class="fas fa-plus-circle"></i>
                        Ajouter un nouveau post
                    </h4>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label><i class="fas fa-book me-1"></i>Matière :</label>
                            <select name="id_matiere" required class="form-select">
                                <option value=""> Choisir une matière</option>
                                <?php foreach ($matieres as $m): ?>
                                    <option value="<?= $m['id_matiere'] ?>"><?= htmlspecialchars($m['nom_matiere']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label><i class="fas fa-edit me-1"></i>Contenu :</label>
                            <textarea name="contenu" rows="4" required class="form-control" placeholder="Partagez votre question, remarque ou information..."></textarea>
                        </div>

                        <button type="submit" class="btn">
                            <i class="fas fa-paper-plane"></i>
                            Publier
                        </button>
                    </form>
                </div>
            <?php else: ?>
                <div class="alert-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>Vous devez être connecté pour poster un message.</span>
                </div>
            <?php endif; ?>

            <?php if (empty($posts)): ?>
                <div class="no-posts">
                    <i class="fas fa-comments"></i>
                    <h4>Aucun post disponible</h4>
                    <p>Soyez le premier à publier un message sur le forum !</p>
                </div>
            <?php else: ?>
                <?php foreach ($posts as $post): ?>
                    <div class="post">
                        <div class="post-header">
                            <div class="post-subject">
                                <i class="fas fa-tag"></i>
                                <?= htmlspecialchars($post['nom_matiere']) ?>
                            </div>
                        </div>
                        
                        <div class="post-content">
                            <?= nl2br(htmlspecialchars($post['contenu'])) ?>
                        </div>
                        
                        <div class="post-meta">
                            <div class="post-author">
                                <i class="fas fa-user-circle"></i>
                                Par <strong><?= htmlspecialchars($post['nom_etudiant']) ?></strong>
                            </div>
                            <div class="post-date">
                                <i class="fas fa-calendar-alt"></i>
                                <?= $post['date_post'] ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
