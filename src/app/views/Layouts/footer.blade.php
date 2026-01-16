<style>
    .smooth-footer {
        background-color: #000;
        border-top: 1px solid var(--border);
        padding: 80px 40px 40px 40px;
        margin-top: auto; /* Pousse le footer vers le bas */
    }

    .footer-grid {
        max-width: 1400px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 2fr 1fr 1fr;
        gap: 60px;
    }

    .footer-logo {
        font-size: 1.4rem;
        font-weight: 800;
        color: white;
        text-decoration: none;
        display: block;
        margin-bottom: 20px;
    }

    .footer-logo span { color: var(--primary-red); }

    .footer-desc {
        color: var(--text-gray);
        line-height: 1.6;
        font-size: 0.95rem;
        max-width: 350px;
    }

    .footer-title {
        color: white;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 2px;
        margin-bottom: 25px;
        font-weight: 700;
    }

    .footer-links {
        list-style: none;
    }

    .footer-links li { margin-bottom: 12px; }

    .footer-links a {
        color: var(--text-gray);
        text-decoration: none;
        font-size: 0.9rem;
        transition: 0.3s;
    }

    .footer-links a:hover {
        color: var(--primary-red);
        padding-left: 8px;
    }

    .footer-bottom {
        max-width: 1400px;
        margin: 60px auto 0 auto;
        padding-top: 30px;
        border-top: 1px solid rgba(255,255,255,0.03);
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #555;
        font-size: 0.8rem;
    }
</style>

<footer class="smooth-footer">
    <div class="footer-grid">
        <div class="footer-section">
            <a href="/" class="footer-logo">Smooth<span>One-Line</span></a>
            <p class="footer-desc">
                La plateforme de référence pour le suivi pédagogique et la validation de compétences web. 
                Structurez votre apprentissage, ligne par ligne.
            </p>
        </div>
        
        <div class="footer-section">
            <h4 class="footer-title">Navigation</h4>
            <ul class="footer-links">
                <li><a href="#">Référentiels</a></li>
                <li><a href="#">Sprints en cours</a></li>
                <li><a href="#">Statistiques</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4 class="footer-title">Support</h4>
            <ul class="footer-links">
                <li><a href="#">Aide & FAQ</a></li>
                <li><a href="#">Contact Admin</a></li>
                <li><a href="#">Mentions Légales</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2026 SmoothOne-Line. Tous droits réservés.</p>
        <p>Expertise & Innovation Pédagogique</p>
    </div>
</footer>

</body>
</html>