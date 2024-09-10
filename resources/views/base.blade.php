<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-group {
            position: relative;
        }
        .form-group label {
            position: absolute;
            top: -10px;
            left: 15px;
            background-color: white;
            padding: 0 5px;
            font-size: 14px;
            color: #6c757d;
            transition: all 0.3s ease;
        }
        .form-group input:focus + label,
        .form-group input:not(:placeholder-shown) + label {
            top: -20px;
            font-size: 12px;
        }
        .card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .feature-icon {
            transition: transform 0.3s ease-in-out;
        }
        .feature-icon:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}">Guide Pro</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('welcome') }}">Accueil</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('modules') }}">Mes Formations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('creermodule') }}">Créer une Formation</a>
                    </li>
                    @endauth 
                </ul> 
                @guest
                <ul class="navbar-nav me-auto">   
                </ul>
                @endguest

                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light me-2 btn-success text-light" href="{{ route('connexion') }}">Connexion</a>
                    </li><br>
                    <li class="nav-item">
                        <a class="nav-link btn btn-light text-primary" href="{{ route('inscription') }}">Inscription</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post" class="nav-item">
                     @method('delete')
                     @csrf
                     <button class="nav-link text-dark">Se deconnecter</button>
                    </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @yield('content_body');

    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2024 Guide Pro. Tous droits réservés.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>