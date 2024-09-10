
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guide Pro - Mes Formations</title>
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
            <a class="nav-link" href="{{ route('creermodule') }}">Créer une Formation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profil</a>
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

  <div class="container my-5">
  @if(session('success'))
  <center>
    <h5 class="text text-success" style="font-weight: bold">Nouveau module ajouté {{ session('success') }}</h5>
  </center>
    @endif
    @if(session('successDelete'))
  <center>
    <h5 class="text text-danger" style="font-weight: bold">Module supprimé {{ session('successDelete') }}</h5>
  </center>
    @endif
    <h1 class="text-primary">Mes Formations</h1>  
    <p class="lead">Consultez et gérez vos formations existantes.</p>

    <div class="row my-5">
    @foreach($modules as $module)
      <div class="col-md-6" style="padding: 10px;">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{$module->nommodule}}</h5>
            <em><span style="font-weight: bold; color:green; font-style:normal; text-decoration:underline">Préréquis</span> : {{ $module->prerequis }}</em>
            <p class="card-text">{{$module->description}}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div style="display: flex;">

              <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModuleModal">Modifier</a>
              
              <form action="{{ route('delete') }}" method="post" class="nav-item" style="margin-left: 15px;">
                @method('delete')
                @csrf
                <input type="hidden" name="idmodule" value="{{ $module->idmodule }}">
              <button class=" btn btn-danger" onclick="return confirmer()">Supprimer</button>
            </form>

            <form action="{{ route('chapters', $module->idmodule) }}" method="post" class="nav-item" style="margin-left: 15px;">
              @method('get')
                @csrf
                <input type="hidden" name="idmodule" value="{{ $module->idmodule }}">
              <button class="btn btn-dark">Gerer -></button>
            </form>

              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <!-- Modal pour la modification d'un module de formation -->
  <div class="modal fade" id="createModuleModal" tabindex="-1" aria-labelledby="createModuleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModuleModalLabel">Formulaire d'édition</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="/create-module" method="post">
          {{ csrf_field() }}
            <div class="mb-3">
              <label for="moduleTitle" class="form-label">Titre</label>
              <input type="text" name="nommodule" class="form-control" id="moduleTitle" placeholder="Entrez le titre du module" required>
            </div>
            <div class="mb-3">
              <label for="modulePrerequisites" class="form-label">Prérequis</label>
              <textarea class="form-control" name="prerequis" id="modulePrerequisites" rows="3" placeholder="Entrez les prérequis du module (Optionel) "></textarea>
            </div>
            <div class="mb-3">
              <label for="moduleDescription" class="form-label">Description</label>
              <textarea class="form-control" name="description" id="moduleDescription" rows="3" placeholder="Entrez la description du module" required></textarea>
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

  <script>
      function confirmer(){
       return confirm("Voulez vous supprimer ?");
      }
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
