
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creer QCM</title>
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
            <a href="{{ route('qcm', Session::get('idchapitre')) }}" class="nav-link active">QCM</a>
        </li>

        <li class="dropdown nav-item">  
  <button class="btn btn-default dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">  
    Cours  
  </button>  
  <ul class="dropdown-menu dropdown-menu-end">  
    <li><a class="dropdown-item" href="{{ route('creercours') }}">Creer cours</a></li>  
    <li><a class="dropdown-item" href="{{ route('cours', Session::get('idchapitre') ) }}">Voir les cours</a></li>  
  </ul>  
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
    <center>CHAPITRE : <strong>{{Session::get('nomchapitre')}}</strong></center>
  </div>

  <div class="row" style="padding-left:20%; padding-right:20%">
    <center>
          <h5 class="modal-title" id="createModuleModalLabel">Créer un qcm</h5><br>

          <form action="/create-qcm" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class=" bg-light text-light" style="padding: 25px 30px 10px 30px; box-shadow:0px 2px 5px 5px lightblue ">
          <em class="text-danger" style="font-size:15px">
                                    @error("illus")
                                     {{ $message }}
                                    @enderror
                                </em>
            <input type="file" name="illus" class="form-control"><br>
            <em class="text-danger" style="font-size:20px">
          <em class="text-danger" style="font-size:15px">
                                    @error("libelle")
                                     {{ $message }}
                                    @enderror
                                </em>
            <input type="text" name="libelle" class="form-control" id="moduleTitle" placeholder="Saisir ici le libellé ..." required minlength="1"><br>
            <em class="text-danger" style="font-size:20px">
                                    @error("option1")
                                     {{ $message }}
                                    @enderror
                                </em>
              <input type="text" name="option1" class="form-control" id="moduleTitle" placeholder="Saisir ici l'option 1 ..." required minlength="1"><br>
              <em class="text-danger" style="font-size:20px">
                                    @error("option2")
                                     {{ $message }}
                                    @enderror
                                </em>
              <input type="text" name="option2" class="form-control" id="moduleTitle" placeholder="Saisir ici l'option 2 ..." required minlength="1"><br>
              <em class="text-danger" style="font-size:20px">
                                    @error("option3")
                                     {{ $message }}
                                    @enderror
                                </em>
              <input type="text" name="option3" class="form-control" id="moduleTitle" placeholder="Saisir ici l'option 3 ..." required minlength="4"><br>
              <em class="text-danger" style="font-size:20px">
                                    @error("reponse")
                                     {{ $message }}
                                    @enderror
                                </em>
              <input type="text" name="reponse" class="form-control" id="moduleTitle" placeholder="Saisir ici la reponse..." required minlength="4">
              <input type="hidden" name="idchapitre" value="{{ Session::get('idchapitre') }}">
            </div>
          <button type="submit" class="btn btn-primary" style="width: 100%; border-radius:0">Valider</button>
        </form>
    </center>
  </div><br>
  <center><em>
    <a href="{{ route('cours', Session::get('idchapitre')) }}">Voir les cours existants</a>
  </em></center>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
