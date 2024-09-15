
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creer chapitre</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
    :root {
      --primary-color: #007bff;
      --secondary-color: #6c757d;
    }

    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }

    .btn-secondary {
      background-color: var(--secondary-color);
      border-color: var(--secondary-color);
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="{{ route('welcome') }}">Guide Pro</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="{{ route('cours', Session::get('idchapitre')) }}" class="nav-link active">Cours</a>
        </li>

        <li class="dropdown nav-item">  
  <button class="btn btn-default dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">  
    Chapitre  
  </button>  
  <ul class="dropdown-menu dropdown-menu-end">  
    <li><a class="dropdown-item" href="{{ route('creerchapter') }}">Retour aux chapitres</a></li>  
    <li><a class="dropdown-item" href="{{ route('chapters', Session::get('idmodule') ) }}">Creer un chapitre</a></li>  
  </ul>  
      </li>

        <li class="dropdown nav-item">  
  <button class="btn btn-default dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">  
    Module  
  </button>  
  <ul class="dropdown-menu dropdown-menu-end">  
    <li><a class="dropdown-item" href="{{ route('creermodule') }}">Creer une</a></li>  
    <li><a class="dropdown-item" href="{{ route('modules') }}">Voir liste</a></li>  
  </ul>  
      </li>

          <li class="nav-item">
            <a class="nav-link active btn btn-light text-primary bg-white" href="#">Profil</a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="post" class="nav-item">
              @method('delete')
              @csrf
              <button class="nav-link">Se deconnecter</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="alert alert-primary">
    <center>CHAPITRE : <strong>{{Session::get('nomchapitre')}}</strong></center>
  </div>

  <!-- Modal pour la création d'un module de formation -->
  <div class="row" style="padding-left:20%; padding-right:20%">
    <center>
          <h5 class="modal-title" id="createModuleModalLabel">Créer un cours</h5>

          <form action="/create-cours" method="post">
          {{ csrf_field() }}
            <div class="mb-3">
              <em class="text-danger" style="font-size:10px">
                                    @error("titrecours")
                                     {{ $message }}
                                    @enderror
                                </em>
              <input type="hidden" name="idchapitre" value="{{ Session::get('idchapitre') }}">
              <input type="text" name="titrecours" class="form-control" id="moduleTitle" placeholder="Entrez le titre du cours" style="border: 1px solid gray;" required><br>
              <em class="text-danger" style="font-size:10px">
                                    @error("contenucours")
                                     {{ $message }}
                                    @enderror
                                </em>
              <textarea name="contenucours" class="form-control" id="contenucours" style="border: 1px solid gray;" required placeholder="Saisissez le contenu du cours ici"></textarea>
            </div>
          <button type="submit" class="btn btn-primary" style="width: 100%;">Valider</button>
        </form>
    </center>
  </div><br><hr><br>
  <center><em>
    <a href="{{ route('cours', Session::get('idchapitre')) }}">Voir les cours existants</a>
  </em></center>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
