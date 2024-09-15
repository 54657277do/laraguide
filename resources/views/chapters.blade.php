
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
            <a class="nav-link" href="{{ route('creerchapter') }}">Nouveau chapitre</a>
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
  <div class="alert alert-primary">
    <center>MODULE : <strong>{{Session::get('nommodule')}}</strong></center>
  </div>


  <div class="container my-5">
  @if(session('success'))
  <center>
    <h5 class="text text-success" style="font-weight: bold">Nouveau chapitre ajouté {{ session('success') }}</h5>
  </center>
    @endif
    @if(session('successDelete'))
  <center>
    <h5 class="text text-danger" style="font-weight: bold">Chapitre supprimé {{ session('successDelete') }}</h5>
  </center>
    @endif
    @if(session('successupdate'))
  <center>
    <h5 class="text text-success" style="font-weight: bold">{{ session('successupdate') }}</h5>
  </center>
    @endif

    <center>
         <div class="row">
              @error("nomchapitre")
                <div class="text text-danger">
                 Erreur de donnée. Veuillez reessayer
                </div>
              @enderror
         </div>
       </center>

    @if($module)
    <h4 class="text-primary">Liste des chapitres</h4>  
    <div class="row my-3">
    @foreach($chapters as $chapter)
      <div class="col-md-6" style="padding: 10px;">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $chapter->nomchapitre }}</h5>
            <div class="d-flex justify-content-between align-items-center">
              <div style="display: flex;">
              <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{$chapter->idchapitre}}">Modifier</a>
              <form action="{{ route('deletechapter') }}" method="post" class="nav-item" style="margin-left: 15px;">
                @method('delete')
                @csrf
                <input type="hidden" name="idchapitre" value="{{ $chapter->idchapitre }}">
              <button class=" btn btn-danger" onclick="return confirmer()">Supprimer</button>
            </form>
            <form action="{{ route('cours', $chapter->idchapitre) }}" method="post" class="nav-item" style="margin-left: 15px;">
              @method('get')
                @csrf
                <input type="hidden" name="idchapitre" value="{{ $chapter->idchapitre }}">
              <button class="btn btn-dark">Gerer -></button>
            </form>


<!-- Modal pour la modification d'un chapitre de formation -->
<div class="modal fade" id="{{$chapter->idchapitre}}" tabindex="-1" aria-labelledby="createModuleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Formulaire d'édition</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="/updatechapter" method="post">
          {{ csrf_field() }}
          @method('post')
            <div class="mb-3">
            <em class="text-danger" style="font-size:10px">
                                    @error("nomchapitre")
                                     {{ $message }}
                                    @enderror
                                </em>
              <label for="moduleTitle" class="form-label">Nouveau nom</label>
              <input type="text" name="nomchapitre" value="{{$chapter->nomchapitre}}" class="form-control" id="moduleTitle" placeholder="Saisir ici ..." required minlength="4">
            </div>
            <input type="hidden" name="idchapitre" value="{{$chapter->idchapitre}}">
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Valider</button>
          <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        </div>
        </form>

        </div>
      </div>
    </div>
  </div>



              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
 @endif
  
  <script>
      function confirmer(){
       return confirm("Voulez vous supprimer ?");
      }
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
