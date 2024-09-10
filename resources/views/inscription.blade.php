@extends('base')

@section('content_body')

<header class="bg-light py-2">
        <div class="container text-center">
            <h1 class="display-6 text-primary">Bienvenue sur <span class="text-success">Guide Pro</span></h1>
            <p class="lead">La plateforme de gestion de formation en ligne conçue pour les formateurs professionnels</p>
        </div>
    </header>
<center>
      @if(session('inscription_soumis'))
      <div class="alert alert-success">
        {{session('inscription_soumis')}}
      </div>
      @endif
</center>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Inscription</h3>
                    </div>
                    <div class="card-body">
                        <form action="/inscription" method="post">
                        {{ csrf_field() }}
                            <div class="form-group mb-3">
                            <em class="text-danger" style="margin-left:40%">
                                    @error("username")
                                     {{ $message }}
                                    @enderror
                                </em>
                                <input type="text" class="form-control" id="username" name="username" placeholder="" value="{{old('username')}}" required>
                                <label for="email">Username</label>
                            </div>
                            <div class="form-group mb-3">
                            <em class="text-danger" style="margin-left:40%">
                                    @error("email")
                                     {{ $message }}
                                    @enderror
                                </em>
                                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="form-group mb-3">
                            <em class="text-danger" style="margin-left:40%">
                                    @error("password")
                                     {{ $message }}
                                    @enderror
                                </em>
                                <input type="password" class="form-control" id="password" name="password" placeholder="">
                                <label for="password">Mot de passe</label>
                            </div>
                            <div class="form-group mb-3">
                            <em class="text-danger" style="margin-left:100px">
                                    @error("password_confirmation")
                                     {{ $message }}
                                    @enderror
                                </em>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="">
                                <label for="password_confirmation">Confirmation du mot de passe</label>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">M'inscrire</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row" style="text-align: center;">
                <br>
                <h5><a href="{{ route('connexion') }}">Plutot vous connecter ?</a></h5>
            </div>
        </div>
    </div>
    

 @endsection