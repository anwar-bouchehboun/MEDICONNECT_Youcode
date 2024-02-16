<style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #204be7; }
        /* .cta-btn { color: #2db8d0; }
        .upgrade-btn { background: #ee9c19; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; } */
        .a{ background: #0f9db6;}
</style>


<aside class="relative hidden w-64 h-screen shadow-xl bg-sidebar sm:block">
    <nav class="pt-3 text-base font-semibold text-white">
        @auth


        @if (Auth::user()->role == 'admin')
        <a href="{{ route('admin') }}" class="flex items-center py-4 pl-6 mb-3 text-white a active-nav-link nav-item">
            Dashboard
        </a>
        <a href="{{ route('profile.edit') }}" class="flex items-center py-4 pl-6 mb-3 text-white a active-nav-link nav-item">
            Profile
        </a>
        <a href="{{ route('medicament.index') }}" class="flex items-center py-4 pl-6 mb-3 text-white a active-nav-link nav-item">
           Medicament
        </a>
        <a href="{{ route('specialite.index') }}" class="flex items-center py-4 pl-6 mb-3 text-white a active-nav-link nav-item">
            Spécialité
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="inline-block ml-7">
                            @csrf
                            <button type="submit" class="px-12 py-2 text-white bg-red-500 rounded hover:bg-red-600">
                                Log Out
                            </button>
                        </form>
    @endif
    @if (Auth::user()->role == 'patient')
    <a href="{{ route('patient.index') }}" class="flex items-center py-4 pl-6 mb-3 text-white a active-nav-link nav-item">
        Dashboard
    </a>
    <a href="{{ route('doctor') }}" class="flex items-center py-4 pl-6 mb-3 text-white a active-nav-link nav-item">
        List Doctor
    </a>
    <a href="{{ route('profile.edit') }}" class="flex items-center py-4 pl-6 mb-3 text-white a active-nav-link nav-item">
        Profile
    </a>
    <a href="{{ route('reservation.index') }}" class="flex items-center py-4 pl-6 mb-3 text-white a active-nav-link nav-item">
     Urgence
    </a>
    <a href="{{ route('favoris') }}" class="flex items-center py-4 pl-6 mb-3 text-white a active-nav-link nav-item">
        Favoris
       </a>
    <form action="{{ route('logout') }}" method="POST" class="inline-block ml-7">
        @csrf
        <button type="submit" class="px-12 py-2 text-white bg-red-500 rounded hover:bg-red-600">
            Log Out
        </button>
    </form>
    @endif
    @if (Auth::user()->role == 'medecin')
    <a href="{{ route('medecin.index') }}" class="flex items-center py-4 pl-6 mb-3 text-white a active-nav-link nav-item">
        Dashboard
    </a>
    <a href="{{ route('medicament.index') }}" class="flex items-center py-4 pl-6 mb-3 text-white a active-nav-link nav-item">
        Medicament
     </a>
     <a href="{{ route('Reserve') }}" class="flex items-center py-4 pl-6 mb-3 text-white a active-nav-link nav-item">
        Reservation Patient
    </a>
    <a href="{{ route('profile.edit') }}" class="flex items-center py-4 pl-6 mb-3 text-white a active-nav-link nav-item">
        Profile
    </a>

    <form action="{{ route('logout') }}" method="POST" class="inline-block ml-7">
        @csrf
        <button type="submit" class="px-12 py-2 text-white bg-red-500 rounded hover:bg-red-600">
            Log Out
        </button>
    </form>
    @endif




    @endauth
        <!-- Autres liens -->
    </nav>
    <!-- Bouton de mise à niveau -->
    <a href="#" class="absolute bottom-0 flex items-center justify-center w-full py-4 text-white upgrade-btn active-nav-link">
        <i class="mr-3 fas fa-arrow-circle-up"></i>
    </a>
</aside>
