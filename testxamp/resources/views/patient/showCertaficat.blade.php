




<div>

    <div class="container px-4 py-8 mx-auto">

        <div id="certificat" class="certificat">
            <img src="/storage/images/logo.png" alt="logo" class="w-20 mx-auto" width="50px" />

            @foreach ($Certaficat as $item)
            <div class="certificat-header">
                <h1 class="certificat-title">Certificat Professionnel</h1>
                <p class="certificat-date">Date: {{ $item->date_consultation }}</p>
            </div>
            <div class="certificat-content">
                <p class="certificat-text"><span class="bold">Ce certificat est décerné à :</span> {{ $item->patient->cin }}</p>
                <p class="certificat-text"><span class="bold">Ce certificat est décerné à :</span> {{ $item->patient->name }}</p>
                <p class="certificat-text"><span class="bold">Par Médecin :</span> {{ $item->medecin->name }}</p>
                <p class="certificat-text"><span class="bold">Nombre de jours :</span> {{ $item->nomberjr }} jours</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
<style>
    /* Stylisation du certificat */
#certificat {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.certificat-header {
    margin-bottom: 20px;
}

.certificat-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
}

.certificat-date {
    font-size: 14px;
    color: #888;
}

.certificat-content {
    margin-bottom: 20px;
}

.certificat-text {
    font-size: 16px;
    margin-bottom: 10px;
}

.bold {
    font-weight: bold;
}

/* Stylisation du logo */
#logo {
    width: 100px; /* ou toute autre largeur souhaitée */
    height: auto; /* pour conserver les proportions */
    margin-bottom: 20px; /* espace supplémentaire en bas */
}

</style>
