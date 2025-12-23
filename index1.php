<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mon Carnet de Cours - Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
      body {
    background: linear-gradient(135deg, #07474F 0%, #077A7D 50%, #0B4F51 100%);
    font-family: 'Segoe UI', sans-serif;
    color: #0B4F51;
    min-height: 100vh;
    margin: 0;
    padding: 0;
}

.navbar {
    background-color: #077A7D;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 90px;
}

.navbar h1 {
    color: #F5EEDD;
    margin: 0;
    font-size: 29px;
    font-weight: 700;
}

.container {
    max-width: 1000px;
    margin: 50px auto;
    padding: 20px;
    color: #0B4F51;
}

/* خلفيات بيضاء نقية بدل الكريمي */
.welcome-box, .stats-section, .access-card {
    background: #ffffff;  /* أبيض */
    color: #0B4F51;       /* نص غامق واضح */
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.welcome-box {
    padding: 40px;
    text-align: center;
    margin-bottom: 40px;
}

.welcome-box h2 {
    margin-bottom: 15px;
    font-weight: 600;
}

.welcome-box p {
    color: #065a60;
    font-size: 18px;
    margin: 0;
}

.stats-section {
    padding: 30px;
    margin-bottom: 40px;
}

.stats-section h4 {
    text-align: center;
    margin-bottom: 20px;
    font-weight: 700;
}

.stats-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.stat-box {
    background: #e9f0ef;
    padding: 20px;
    border-radius: 12px;
    text-align: center;
    color: #077A7D;
    transition: background 0.3s;
}

.stat-box:hover {
    background: #cde1de;
}

.stat-box i {
    font-size: 2rem;
    color: #07474F;
    margin-bottom: 10px;
}

.stat-box h6 {
    margin-bottom: 5px;
    font-weight: 600;
}

.stat-box p {
    margin: 0;
    font-size: 14px;
}

.cards-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

.access-card {
    padding: 30px;
    text-align: center;
    transition: transform 0.3s, background 0.3s, color 0.3s;
    border-top: 6px solid #077A7D;
}

.access-card:hover {
    transform: translateY(-5px);
    background: #f0f7f9;
    color: #065a60;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
}

.access-card img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 20px;
    border: 3px solid #077A7D;
    object-fit: cover;
}

.access-card h5 {
    margin-bottom: 15px;
    font-weight: 700;
}

.access-card p {
    margin-bottom: 25px;
    font-size: 16px;
}

.btn-access {
    background: #07474F;
    color: #F5EEDD;
    padding: 12px 30px;
    border-radius: 8px;
    text-decoration: none;
    display: inline-block;
    transition: background 0.3s ease;
    font-weight: 700;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.btn-access:hover {
    background: #065a60;
    color: #F5EEDD;
}

.btn-admin {
    background: #077A7D;
}

.btn-admin:hover {
    background: #05595B;
}

    </style>
</head>

<body>
    <nav class="navbar">
        <h1><img src="images/a.jpg" alt="" style="width:80px; height:80px;border-radius:50%"></i>Mon Carnet de Cours</h1>
    </nav>

    <div class="container">
        <div class="welcome-box">
            <h2>Bienvenue sur la plateforme</h2>
            <p>Choisissez votre mode d'accès pour commencer</p>
        </div>

        <div class="stats-section">
            <h4>Fonctionnalités</h4>
            <div class="stats-row">
                <div class="stat-box">
                    <i class="fas fa-users"></i>
                    <h6>Gestion</h6>
                    <p>Étudiants & Cours</p>
                </div>
                <div class="stat-box">
                    <i class="fas fa-book"></i>
                    <h6>Cours</h6>
                    <p>Contenu Interactif</p>
                </div>
                <div class="stat-box">
                    <i class="fas fa-chart-line"></i>
                    <h6>Suivi</h6>
                    <p>Notes & Progrès</p>
                </div>
                <div class="stat-box">
                    <i class="fas fa-calendar"></i>
                    <h6>Planning</h6>
                    <p>Emploi du temps</p>
                </div>
            </div>
        </div>

        <div class="cards-container">
            <div class="access-card">
                <img src="images/OIP.jpg" alt="Admin" />
                <h5><i class="fas fa-user-shield me-2"></i>Administrateur</h5>
                <p>Accès complet à la gestion de la plateforme</p>
                <a href="admin/viewsAdmin/indexlog.php" class="btn-access btn-admin">
                    <i class="fas fa-cog me-2"></i>Accéder
                </a>
            </div>

            <div class="access-card">
                <img src="images/OIP.png" alt="Étudiant" />
                <h5><i class="fas fa-user-graduate me-2"></i>Étudiant</h5>
                <p>Espace personnel d'apprentissage</p>
                <a href="client/viewEtu/indexLog.php" class="btn-access">
                    <i class="fas fa-book me-2"></i>Accéder
                </a>
            </div>
        </div>
    </div>
</body>

</html>
