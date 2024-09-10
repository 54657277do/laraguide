@extends('base')

@section('content_body')

    <header class="bg-light py-5">
        <div class="container text-center">
            <h1 class="display-4 text-primary">Bienvenue sur <span class="text-success">Guide Pro</span></h1>
            <p class="lead">La plateforme de gestion de formation en ligne conçue pour les formateurs professionnels</p>
        </div>
    </header>

    <main class="container my-5">
        <section class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-primary">
                    <div class="card-body">
                        <h2 class="card-title h4 text-primary">RAPIDE</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-success">
                    <div class="card-body">
                        <h2 class="card-title h4 text-success">FLEXIBLE</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-info">
                    <div class="card-body">
                        <h2 class="card-title h4 text-info">SANS LIMITE</h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5">
            <h2 class="text-center mb-4 text-primary">Comment utiliser Guide Pro ?</h2>
            <div class="row">
                <div class="col-md-3 text-center mb-4">
                    <div class="bg-primary text-white p-3 rounded-circle d-inline-block mb-3 feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                    </div>
                    <h3 class="h5">1. Inscrivez-vous</h3>
                    <p>Créez votre compte formateur en quelques clics</p>
                </div>
                <div class="col-md-3 text-center mb-4">
                    <div class="bg-success text-white p-3 rounded-circle d-inline-block mb-3 feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                            <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                        </svg>
                    </div>
                    <h3 class="h5">2. Créez votre formation</h3>
                    <p>Structurez vos modules, chapitres et cours</p>
                </div>
                <div class="col-md-3 text-center mb-4">
                    <div class="bg-warning text-dark p-3 rounded-circle d-inline-block mb-3 feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                            <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                        </svg>
                    </div>
                    <h3 class="h5">3. Ajoutez du contenu</h3>
                    <p>Intégrez vos cours et créez des QCM</p>
                </div>
                <div class="col-md-3 text-center mb-4">
                    <div class="bg-info text-white p-3 rounded-circle d-inline-block mb-3 feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z"/>
                        </svg>
                    </div>
                    <h3 class="h5">4. Suivez vos statistiques</h3>
                    <p>Analysez la performance de vos formations</p>
                </div>
            </div>
        </section>
    </main>

   

@endsection 