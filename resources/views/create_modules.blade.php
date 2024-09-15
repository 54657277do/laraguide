
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guide Pro - Formateur</title>
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
            <a class="nav-link active" href="{{ route('modules') }}">Mes Formations</a>
          </li>
          
          <li class="dropdown nav-item">  
  <button class="btn btn-danger  dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">  
    Profil : {{Auth::user()->username}}  
  </button>  
  <ul class="dropdown-menu dropdown-menu-end">  
    <li><a class="dropdown-item text-primary" href="{{ route('me') }}">Mes informations</a></li>  
    <li class="dropdown-item">
            <form action="{{ route('logout') }}" method="post" class="nav-item">
              @method('delete')
              @csrf
              <button class="btn btn-danger">Se deconnecter</button>
            </form>
    </li>  
  </ul>  
      </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <!--------------------------------------------------------------------->     
       <center>
         <div class="row">
              @error("nommodule")
                <div class="alert alert-danger">
                 Le nom du module est invalide
                <br><center>Cliquez à nouveau sur le bouton et Réessayez</center>
                </div>
              @enderror
              @error("description")
                <div class="alert alert-danger">
                 la description est invalide
                <br><center>Cliquez à nouveau sur le bouton et Réessayez</center>
                </div>
              @enderror
         </div>
       </center>
         
    <div class="row my-5">
      <div class="col-md-11" style="padding: 10px;">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Créer un module de formation</h5>
            <p class="card-text">Ajoutez un nouveau module de formation avec un titre (obligatoire), une description (obligatoire) et les prérequis (optionel).</p>
            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModuleModal">Cliquer ce bouton pour créer un module de formation</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal pour la création d'un module de formation -->
  <div class="modal fade" id="createModuleModal" tabindex="-1" aria-labelledby="createModuleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModuleModalLabel">Créer un module de formation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="/create-module" method="post">
          {{ csrf_field() }}
            <div class="mb-3">
              <label for="moduleTitle" class="form-label">Titre</label>
              <em class="text-danger" style="font-size:10px">
                                    @error("nommodule")
                                     {{ $message }}
                                    @enderror
                                </em>
              <input type="text" name="nommodule" class="form-control" id="moduleTitle" placeholder="Entrez le titre du module" required>
            </div>
            <div class="mb-3">
              <label for="modulePrerequisites" class="form-label">Prérequis</label>
              <textarea class="form-control" name="prerequis" id="modulePrerequisites" rows="3" placeholder="Entrez les prérequis du module (Optionel) "></textarea>
            </div>
            <div class="mb-3">
              <label for="moduleDescription" class="form-label">Description</label>
              <em class="text-danger" style="font-size:10px">
                                    @error("description")
                                     {{ $message }}
                                    @enderror
                                </em>
              <textarea class="form-control" name="description" id="moduleDescription" rows="3" placeholder="Entrez la description du module" minlength="20" maxlength="255" required></textarea>
            </div>
      
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Créer le module</button>
        </div>
        </form>

        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
