@extends('base')

@section('content_body')

<header class="bg-light py-2">
        <div class="container text-center">
            <h1 class="display-6 text-primary">Bienvenue sur <span class="text-success">Guide Pro</span></h1>
            <p class="lead">La plateforme de gestion de formation en ligne conçue pour les formateurs professionnels</p>
        </div>
    </header>

    <div class="container mt-3">  
        <div class="row justify-content-center">  
            <div class="col-md-6">  
                <div class="card">  
                    <div class="card-header bg-primary text-white">  
                        <h3 class="mb-0">Connexion</h3>  
                    </div>  
                    <div class="card-body">  
                        <form action="/connexion" method="post">  
                        {{ csrf_field() }}  
                            <div class="form-group mb-5  mt-3">  
                            <em class="text-danger" style="margin-left:40%">
                                    @error("email")
                                     {{ $message }}
                                    @enderror
                                </em>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required placeholder="">  
                                <label for="email">Email</label>  
                            </div>  
                            <div class="form-group mb-5">  
                            <em class="text-danger" style="margin-left:40%">
                                    @error("password")
                                     {{ $message }}
                                    @enderror
                                </em>
                                <input type="password" class="form-control" id="password" required name="password" placeholder="">  
                                <label for="password">Mot de passe</label>  
                            </div>  
                            <div class="d-grid">  
                                <button type="submit" class="btn btn-primary">Se connecter</button>  
                            </div>  
                        </form>  
                    </div>  
                </div>  
            </div>
            <div class="row" style="text-align:center">
                <br>
                <h5><a href="{{ route('inscription') }}">Plutot vous inscrire ?</a></h5>
            </div>
        </div>
    </div>
@endsection