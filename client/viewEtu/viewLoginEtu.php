<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Connexion Étudiant</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
<style>
  /* نفس خلفية التدرج */
  body {
    position: relative;
    min-height: 100vh;
    margin: 0;
    padding: 20px;
    font-family: 'Segoe UI', sans-serif;
    color: #0B4F51;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #07474F 0%, #077A7D 50%, #0B4F51 100%);
    overflow: hidden;
  }

  .login-container {
    position: relative;
    background: #F5EEDD; /* بدلنا الأبيض للكريمي */
    padding: 30px 35px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    width: 100%;
    max-width: 400px;
    border-top: 6px solid #077A7D; /* لون متناسق مع التدرج */
    z-index: 1;
    color: #07474F; /* نص غامق */
  }

  .login-header {
    text-align: center;
    margin-bottom: 2rem;
  }

  .login-header .icon {
    width: 60px;
    height: 60px;
    background: #077A7D;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: #F5EEDD;
    font-size: 1.5rem;
    box-shadow: 0 0 10px rgba(7, 122, 125, 0.6);
  }

  .login-header h3 {
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #0B4F51;
  }

  .login-header p {
    color: #065a60;
    margin: 0;
    font-size: 14px;
  }

  .form-group {
    margin-bottom: 1.5rem;
  }

  .input-group-text {
    background: #077A7D;
    color: #F5EEDD;
    border: none;
    border-radius: 8px 0 0 8px;
    font-size: 1.3rem;
    padding: 0.6rem 0.85rem;
    box-shadow: 0 0 8px rgba(7, 122, 125, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: default;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .input-group-text:hover {
    background: #065a60;
    color: #dbe8e3;
    box-shadow: 0 0 12px rgba(6, 90, 96, 0.8);
  }

  .form-control {
    border: 2px solid #d1d5db;
    border-left: none;
    border-radius: 0 8px 8px 0;
    padding: 14px 16px;
    font-size: 16px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    background: #f5f7f9;
    color: #07474F;
  }

  .form-control:focus {
    border-color: #077A7D;
    box-shadow: 0 0 8px rgba(7, 122, 125, 0.5);
    background: white;
    outline: none;
  }

  .btn-login {
    background: #07474F;
    border: none;
    border-radius: 8px;
    padding: 12px 20px;
    font-weight: 700;
    color: #F5EEDD;
    font-size: 16px;
    width: 100%;
    transition: background-color 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
  }

  .btn-login:hover {
    background: #065a60;
    color: #F5EEDD;
  }

  .alert {
    border-radius: 8px;
    border: none;
    padding: 12px 15px;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: 600;
    font-size: 14px;
    background: #fdecea;
    color: #b91c1c;
    border-left: 5px solid #b91c1c;
  }

  @media (max-width: 480px) {
    .login-container {
      margin: 1rem;
      padding: 2rem;
    }
  }
</style>
</head>
<body>

<div class="login-container">
    <div class="login-header">
        <div class="icon">
            <img src="/PROJET PHP/images/a.jpg" alt="" style="width:80px; height:80px;border-radius:50%;"><br>
        </div>
        <h3>Connexion Étudiant</h3>
        <p>Accédez à votre espace personnel</p>
    </div>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-triangle"></i>
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="indexlog.php">
        <div class="form-group input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" name="email" class="form-control" placeholder="Votre adresse email" required />
        </div>

        <div class="form-group input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" name="password" class="form-control" placeholder="Votre mot de passe" required />
        </div>

        <button type="submit" class="btn-login">
            <i class="fas fa-sign-in-alt"></i>
            Se connecter
        </button>
             <div style="text-align: center; color: #065a60">
  <a href="../../index1.php">Page precedente</a>
</div>
    </form>
</div>

</body>
</html>
