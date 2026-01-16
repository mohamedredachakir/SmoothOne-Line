<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - SmoothOne-Line | Page Introuvable</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #0a0a0a;
            --primary-red: #e63946;
            --text-white: #ffffff;
            --text-gray: #a0a0a0;
            --line-color: rgba(230, 57, 70, 0.3);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-white);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        
        .background-svg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
        }

        .container {
            position: relative;
            z-index: 10;
            text-align: center;
            padding: 20px;
        }

        .error-code {
            font-size: 12rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 0;
            background: linear-gradient(to bottom, #ffffff 50%, var(--primary-red));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -8px;
        }

        .divider {
            width: 80px;
            height: 4px;
            background-color: var(--primary-red);
            margin: 20px auto;
        }

        h1 {
            font-size: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 5px;
            margin-bottom: 15px;
            font-weight: 300;
        }

        p {
            color: var(--text-gray);
            max-width: 450px;
            margin: 0 auto 40px auto;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        
        .btn-action {
            display: inline-block;
            padding: 15px 40px;
            background-color: var(--primary-red);
            color: white;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            border: 1px solid var(--primary-red);
        }

        .btn-action:hover {
            background-color: transparent;
            color: var(--primary-red);
            transform: scale(1.05);
            box-shadow: 0 0 30px rgba(230, 57, 70, 0.4);
        }

        
        .animated-line {
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            animation: drawLine 5s linear infinite;
        }

        @keyframes drawLine {
            to { stroke-dashoffset: 0; }
        }

    </style>
</head>
<body>

    <svg class="background-svg" viewBox="0 0 1440 800" xmlns="http://www.w3.org/2000/svg">
        <path class="animated-line" d="M-50,400 C200,100 400,700 720,400 C1040,100 1200,700 1500,400" 
              fill="none" stroke="var(--line-color)" stroke-width="1" />
    </svg>

    <div class="container">
        <h1 class="error-code">404</h1>
        <div class="divider"></div>
        <h1>Ligne Interrompue</h1>
        <p>
            Le chemin que vous tentez de suivre n'existe pas ou a été déplacé. 
            Retournez à la source pour continuer votre apprentissage.
        </p>
        
        <a href="/" class="btn-action">Retour au Dashboard</a>
    </div>

</body>
</html>