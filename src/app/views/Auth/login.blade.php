<?php
require_once __DIR__ . '/../Layouts/header.blade.php';
require_once __DIR__ . '/../Layouts/navbar.blade.php';
?>
<style>
    .login-container {
        display: flex;
        min-height: 100vh;
        background: #000;
        overflow: hidden;
    }

   
    .login-visual {
        flex: 1.2;
        background: linear-gradient(135deg, #050505 0%, #0f0f0f 100%);
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 80px;
        position: relative;
        border-right: 1px solid rgba(255,255,255,0.05);
    }

    .login-visual::before {
        content: '';
        position: absolute;
        width: 150px;
        height: 1px;
        background: var(--primary-red);
        top: 80px;
        left: 80px;
    }

    .visual-content h2 {
        font-size: 3.5rem;
        font-weight: 800;
        line-height: 1;
        letter-spacing: -2px;
        margin-bottom: 20px;
    }

    .visual-content h2 span {
        display: block;
        color: var(--primary-red);
    }

    .visual-content p {
        color: #555;
        font-size: 1.1rem;
        max-width: 400px;
    }

    
    .login-form-side {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #050505;
        padding: 40px;
    }

    .form-box {
        width: 100%;
        max-width: 380px;
    }

    .form-box h3 {
        font-size: 1.5rem;
        margin-bottom: 40px;
        font-weight: 400;
        letter-spacing: 1px;
    }

    
    .input-group {
        position: relative;
        margin-bottom: 45px;
    }

    .input-group input {
        width: 100%;
        padding: 10px 0;
        background: transparent;
        border: none;
        border-bottom: 1px solid #222;
        color: white;
        font-size: 1rem;
        transition: 0.4s;
    }

    .input-group label {
        position: absolute;
        top: 10px;
        left: 0;
        color: #444;
        pointer-events: none;
        transition: 0.3s;
        text-transform: uppercase;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 1.5px;
    }

    
    .input-group input:focus ~ label,
    .input-group input:valid ~ label {
        top: -20px;
        font-size: 0.7rem;
        color: var(--primary-red);
    }

    .input-group .bar {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 1px;
        width: 0;
        background: var(--primary-red);
        transition: 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .input-group input:focus ~ .bar {
        width: 100%;
    }

    
    .submit-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 50px;
    }

    .btn-submit {
        background: var(--primary-red);
        color: white;
        border: none;
        padding: 16px 35px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-submit:hover {
        background: white;
        color: black;
        transform: scale(1.05);
    }

    .forgot-link {
        color: #444;
        text-decoration: none;
        font-size: 0.8rem;
        transition: 0.3s;
    }

    .forgot-link:hover {
        color: var(--primary-red);
    }

    @media (max-width: 900px) {
        .login-visual { display: none; }
    }
</style>

<div class="login-container">
    <div class="login-visual">
        <div class="visual-content">
            <h2>Tracez votre<span>Propre Ligne.</span></h2>
            <p>Accédez à la plateforme pédagogique de nouvelle génération dédiée au développement web.</p>
        </div>
    </div>

    <div class="login-form-side">
        <div class="form-box">
            <h3>Identification</h3>
            
            <form action="/login" method="POST">
                <div class="input-group">
                    <input type="email" name="email" required autocomplete="off">
                    <span class="bar"></span>
                    <label>Email Professionnel</label>
                </div>

                <div class="input-group">
                    <input type="password" name="password" required>
                    <span class="bar"></span>
                    <label>Mot de passe</label>
                </div>

                <div class="submit-container">
                    <a href="#" class="forgot-link">Mot de passe oublié ?</a>
                    <button type="submit" class="btn-submit">Entrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/../Layouts/footer.blade.php';
?>