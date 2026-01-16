<?php
require_once __DIR__ . '/../Layouts/header.blade.php';
require_once __DIR__ . '/../Layouts/navbar.blade.php';
?>

<style>
    
    .hero-section {
        min-height: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: radial-gradient(circle at 10% 20%, rgba(230, 57, 70, 0.05) 0%, transparent 40%),
                    radial-gradient(circle at 90% 80%, rgba(230, 57, 70, 0.05) 0%, transparent 40%);
        padding: 0 40px;
        text-align: center;
    }

    .hero-content {
        max-width: 900px;
    }

    .hero-tagline {
        color: var(--primary-red);
        text-transform: uppercase;
        letter-spacing: 4px;
        font-weight: 700;
        font-size: 0.85rem;
        margin-bottom: 20px;
        display: block;
    }

    .hero-content h1 {
        font-size: clamp(2.5rem, 8vw, 5rem);
        font-weight: 800;
        line-height: 0.9;
        margin-bottom: 30px;
        letter-spacing: -3px;
    }

    .hero-content h1 span {
        color: var(--primary-red);
        background: linear-gradient(to right, #ffffff, var(--primary-red));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-content p {
        color: var(--text-gray);
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 40px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    
    .section-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 100px 40px;
    }

    .grid-features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 60px;
    }

    .feature-card {
        background: #0a0a0a;
        border: 1px solid var(--border);
        padding: 50px 40px;
        border-radius: 4px;
        transition: all 0.4s ease;
        position: relative;
    }

    .feature-card:hover {
        border-color: var(--primary-red);
        transform: translateY(-10px);
        background: #0f0f0f;
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: var(--primary-red);
        transform: scaleX(0);
        transition: transform 0.4s ease;
        transform-origin: left;
    }

    .feature-card:hover::before {
        transform: scaleX(1);
    }

    .feature-card h3 {
        font-size: 1.5rem;
        margin-bottom: 20px;
        color: white;
    }

    .feature-card p {
        color: var(--text-gray);
        font-size: 0.95rem;
        line-height: 1.7;
    }

    .feature-icon {
        width: 50px;
        height: 50px;
        background: rgba(230, 57, 70, 0.1);
        border-radius: 4px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-red);
        font-weight: 800;
    }

    
    .cta-banner {
        background: linear-gradient(45deg, #0d0d0d, #050505);
        border: 1px solid var(--border);
        padding: 80px 40px;
        text-align: center;
        margin-bottom: 100px;
        border-radius: 8px;
    }

    .btn-large {
        padding: 18px 45px;
        font-size: 1rem;
        display: inline-block;
    }

    .title-large {
        font-size: 3rem;
        font-weight: 800;
        text-align: center;
    }
</style>

<main>
    <section class="hero-section">
        <div class="hero-content">
            <span class="hero-tagline">Promotion Développeur Web 2026</span>
            <h1>Structurez votre <span>Avenir Tech.</span></h1>
            <p>
                Découvrez <b>SmoothOne-Line</b>, l'écosystème pédagogique qui transforme chaque ligne de code en une compétence maîtrisée.
            </p>
            <div style="display: flex; justify-content: center;">
                <a href="/login" class="nav-btn btn-login btn-large">Rejoindre la formation</a>
            </div>
        </div>
    </section>

    <section class="section-container">
        <h2 class="title-large">Une formation <span>Inspirée.</span></h2>
        
        <div class="grid-features">
            <div class="feature-card">
                <div class="feature-icon">01</div>
                <h3>Sprints Organisés</h3>
                <p>Progressez à travers des cycles intensifs et structurés, conçus pour simuler le rythme réel des entreprises technologiques.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">02</div>
                <h3>Briefs Métiers</h3>
                <p>Travaillez sur des projets concrets et validez vos compétences transversales par une mise en pratique immédiate.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">03</div>
                <h3>Suivi Précis</h3>
                <p>Visualisez votre montée en compétence selon trois niveaux de maîtrise : Imiter, S'adapter et Transposer.</p>
            </div>
        </div>
    </section>

    <section class="section-container">
        <div class="cta-banner">
            <h2 style="margin-bottom: 20px;">Prêt à tracer votre chemin ?</h2>
            <p style="color: var(--text-gray); margin-bottom: 40px; max-width: 500px; margin-left: auto; margin-right: auto;">
                Connectez-vous pour accéder à vos briefs, vos évaluations et votre historique de débriefing.
            </p>
            <a href="/login" class="nav-btn btn-login btn-large">Accéder au Dashboard</a>
        </div>
    </section>
</main>

<?php
require_once __DIR__ . '/../Layouts/footer.blade.php';
?>