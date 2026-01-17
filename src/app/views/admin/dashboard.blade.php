<?php
require_once __DIR__ . '/../Layouts/header.blade.php';
require_once __DIR__ . '/../Layouts/navbar.blade.php';
?>
<style>
    .dashboard-wrapper {
        padding: 40px;
        max-width: 1400px;
        margin: 0 auto;
    }

    .dashboard-header {
        margin-bottom: 50px;
        border-left: 4px solid var(--primary-red);
        padding-left: 20px;
    }

    .dashboard-header h1 {
        font-size: 2.8rem;
        font-weight: 800;
        letter-spacing: -2px;
        margin: 0;
    }

    .dashboard-header h1 span {
        color: var(--primary-red);
    }

    .dashboard-header p {
        color: var(--text-gray);
        font-size: 1rem;
        margin-top: 5px;
    }

    /* --- STATS GRID --- */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 60px;
    }

    .stat-card {
        background: #0a0a0a;
        border: 1px solid var(--border);
        padding: 35px 30px;
        border-radius: 4px;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        position: relative;
    }

    .stat-card:hover {
        border-color: var(--primary-red);
        transform: translateY(-5px);
        background: #0f0f0f;
    }

    .stat-label {
        display: block;
        color: var(--text-gray);
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 15px;
    }

    .stat-value {
        font-size: 3rem;
        font-weight: 800;
        color: #fff;
        line-height: 1;
    }

    .stat-value span {
        color: var(--primary-red);
        font-size: 2rem;
    }

    .actions-section {
        margin-top: 40px;
    }

    .actions-section h3 {
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-bottom: 30px;
        color: #333;
        font-weight: 800;
    }

    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 15px;
    }

    .action-item {
        background: transparent;
        border: 1px solid var(--border);
        padding: 25px 30px;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.3s ease;
        border-radius: 4px;
    }

    .action-item span {
        color: var(--text-gray);
        font-weight: 600;
        font-size: 0.95rem;
        transition: 0.3s;
    }

    .action-arrow {
        color: var(--primary-red);
        font-size: 1.4rem;
        transition: transform 0.3s ease;
    }

    .action-item:hover {
        background: #111;
        border-color: var(--primary-red);
    }

    .action-item:hover span {
        color: #fff;
    }

    .action-item:hover .action-arrow {
        transform: translateX(8px);
    }

    @media (max-width: 768px) {
        .dashboard-header h1 { font-size: 2rem; }
        .stat-value { font-size: 2.2rem; }
    }
</style>

<div class="dashboard-wrapper">
    
    <header class="dashboard-header">
        <h1>Admin <span>Dashboard</span></h1>
        <p>Gestion globale de la plateforme SmoothOne-Line</p>
    </header>

    <section class="stats-grid">
        <div class="stat-card">
            <span class="stat-label">Classes</span>
            <div class="stat-value"><?= $stats['classes_count'] ?><span>.</span></div>
        </div>

        <div class="stat-card">
            <span class="stat-label">Formateurs</span>
            <div class="stat-value"><?= $stats['teachers_count'] ?><span>.</span></div>
        </div>

        <div class="stat-card">
            <span class="stat-label">Étudiants</span>
            <div class="stat-value"><?= $stats['students_count'] ?><span>.</span></div>
        </div>

        <div class="stat-card">
            <span class="stat-label">Sprints</span>
            <div class="stat-value"><?= $stats['sprints_count'] ?><span>.</span></div>
        </div>

        <div class="stat-card">
            <span class="stat-label">Compétences</span>
            <div class="stat-value"><?= $stats['competences_count'] ?><span>.</span></div>
        </div>
    </section>

    <section class="actions-section">
        <h3>Administration des données</h3>
        
        <div class="actions-grid">
            <a href="/admin/classes" class="action-item">
                <span>Gérer les Classes</span>
                <div class="action-arrow">→</div>
            </a>

            <a href="/admin/teachers" class="action-item">
                <span>Gérer les Formateurs</span>
                <div class="action-arrow">→</div>
            </a>

            <a href="/admin/students" class="action-item">
                <span>Gérer les Étudiants</span>
                <div class="action-arrow">→</div>
            </a>

            <a href="/admin/sprints" class="action-item">
                <span>Gérer les Sprints</span>
                <div class="action-arrow">→</div>
            </a>

            <a href="/admin/competences" class="action-item">
                <span>Gérer les Compétences</span>
                <div class="action-arrow">→</div>
            </a>
        </div>
    </section>

</div>
<?php
require_once __DIR__ . '/../Layouts/footer.blade.php';
?>