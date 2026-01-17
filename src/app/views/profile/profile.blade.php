<?php
require_once __DIR__ . '/../Layouts/header.blade.php';
require_once __DIR__ . '/../Layouts/navbar.blade.php';
?>

<style>
    .profile-container {
        min-height: calc(100vh - var(--nav-height));
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 60px 20px;
        background: radial-gradient(circle at top right, rgba(230, 57, 70, 0.03), transparent);
    }

    .profile-card {
        width: 100%;
        max-width: 600px;
        background: #0a0a0a;
        border: 1px solid var(--border);
        border-radius: 4px;
        position: relative;
        overflow: hidden;
        animation: fadeIn 0.8s ease;
    }

   
    .profile-card::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 3px;
        background: var(--primary-red);
    }

    .profile-header {
        padding: 40px;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        gap: 25px;
    }

    .profile-avatar {
        width: 80px;
        height: 80px;
        background: #111;
        border: 1px solid var(--primary-red);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        font-weight: 800;
        color: var(--primary-red);
        border-radius: 4px;
    }

    .profile-intro h2 {
        font-size: 1.8rem;
        letter-spacing: -1px;
        margin-bottom: 5px;
    }

    .role-badge {
        display: inline-block;
        padding: 4px 12px;
        background: rgba(230, 57, 70, 0.1);
        color: var(--primary-red);
        font-size: 0.7rem;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        border-radius: 2px;
    }

    .profile-body {
        padding: 40px;
    }

    .info-row {
        margin-bottom: 30px;
    }

    .info-label {
        display: block;
        color: #444;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
    }

    .info-value {
        font-size: 1.1rem;
        color: var(--text-white);
        padding-bottom: 8px;
        border-bottom: 1px solid #111;
        display: block;
    }

    .profile-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 40px;
    }

    .btn-logout {
        padding: 12px 30px;
        background: transparent;
        border: 1px solid #333;
        color: #888;
        font-weight: 700;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-logout:hover {
        border-color: var(--primary-red);
        color: var(--primary-red);
        background: rgba(230, 57, 70, 0.05);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="profile-container">
    <div class="profile-card">
        
        <div class="profile-header">
            <div class="profile-avatar">
                <?= strtoupper(substr($_SESSION['user']['name'], 0, 1)) ?>
            </div>
            <div class="profile-intro">
                <h2><?= htmlspecialchars($_SESSION['user']['name']) ?></h2>
                <span class="role-badge"><?= htmlspecialchars($_SESSION['user']['role']) ?></span>
            </div>
        </div>

        <div class="profile-body">
            <div class="info-row">
                <span class="info-label">Email Personnel</span>
                <span class="info-value"><?= htmlspecialchars($_SESSION['user']['email']) ?></span>
            </div>

            <div class="info-row">
                <span class="info-label">Membre depuis</span>
                <span class="info-value">
                    <?= date('d F Y', strtotime($_SESSION['user']['created_at'])) ?>
                </span>
            </div>

            <div class="profile-actions">
                <p style="color: #444; font-size: 0.8rem;">ID Compte: #00<?= $_SESSION['user']['id'] ?></p>
                
                <form action="/logout" method="POST">
                    <button type="submit" class="btn-logout">Déconnexion</button>
                </form>
            </div>
        </div>

    </div>
</div>
<?php
require_once __DIR__ . '/../Layouts/footer.blade.php';
?>