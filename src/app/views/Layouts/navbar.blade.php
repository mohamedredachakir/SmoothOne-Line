<style>
    .smooth-nav {
        width: 100%;
        height: var(--nav-height);
        background-color: rgba(5, 5, 5, 0.9);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid var(--border);
        position: fixed;
        top: 0;
        z-index: 1000;
    }

    .nav-container {
        max-width: 1400px;
        height: 100%;
        margin: 0 auto;
        padding: 0 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        font-size: 1.5rem;
        font-weight: 800;
        text-decoration: none;
        color: var(--text-white);
        letter-spacing: -1px;
    }

    .logo span { color: var(--primary-red); }

    .nav-menu {
        display: flex;
        align-items: center;
        gap: 30px;
    }

    .nav-link {
        text-decoration: none;
        color: var(--text-gray);
        font-size: 0.9rem;
        font-weight: 500;
        transition: 0.3s ease;
    }

    .nav-link:hover { color: var(--primary-red); }

    .nav-btn {
        padding: 10px 22px;
        border-radius: 4px;
        font-size: 0.85rem;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-login {
        background-color: var(--primary-red);
        color: white;
        border: 1px solid var(--primary-red);
    }

    .btn-login:hover {
        background-color: var(--primary-hover);
        box-shadow: 0 0 20px rgba(230, 57, 70, 0.3);
        transform: translateY(-2px);
    }

    .btn-outline {
        border: 1px solid var(--border);
        color: var(--text-white);
    }

    .btn-outline:hover {
        border-color: var(--primary-red);
        color: var(--primary-red);
    }
</style>

<nav class="smooth-nav">
    <div class="nav-container">
        <a href="/" class="logo">Smooth<span>One-Line</span></a>

        <div class="nav-menu">
            <?php if(isset($_SESSION['user'])): ?>
                
                <?php 
                    $role = $_SESSION['user']['role']; 
                ?>

                <?php if($role === 'ADMIN'): ?>
                    <a href="/briefs" class="nav-link">Briefs</a>
                    <a href="/admin" class="nav-btn btn-outline">Dashboard</a>

                <?php elseif($role === 'TEACHER'): ?>
                    <a href="/classes" class="nav-link">Classes</a>
                    <a href="/briefs" class="nav-link">Briefs</a>

                <?php elseif($role === 'STUDENT'): ?>
                    <a href="/promotions" class="nav-link">Promotions</a>
                    <a href="/briefs" class="nav-link">Briefs</a>
                <?php endif; ?>

                <a href="/profile" class="nav-btn btn-login">Profil</a>

            <?php else: ?>
                <a href="/login" class="nav-btn btn-login">Se Connecter</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<div style="height: var(--nav-height);"></div>