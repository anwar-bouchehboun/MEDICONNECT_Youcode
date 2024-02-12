<x-app-layout>
    <div class="flex">
        <x-sidebar/>
        <div class="flex flex-row mt-2 ms-2">
            <div>
                <img src="https://readymadeui.com/profile_2.webp" class="w-28 h-28 rounded-full shadow-[0_2px_22px_-4px_rgba(93,96,127,0.6)] border-2 border-white" />
                <div class="mt-4">
                    <h4 class="text-sm font-extrabold ms-4">{{ $medecin->name }}</h4>
                    <p class="mt-1 text-xs font-bold text-gray-400 ms-4">{{ $medecin->genre }}</p>
                </div>
                <h3 class="text-xl font-semibold ms-4">{{ $medecin->specialite->specialite }}</h3>
                <label for="message" class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white ms-2">Votre message</label>
                <textarea id="message" rows="4" class="block p-2.5 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 placeholder-gray-400" placeholder="Écrivez vos pensées ici..."></textarea>
                <button class="py-1 mt-3 text-white bg-red-600 rounded w-60">Ajouter un commentaire</button>
                <button class="py-1 mt-2 text-white bg-blue-600 rounded w-60">Réserver</button>
                <div class="flex items-center mt-4">
                    <label for="rating" class="block mr-2 text-sm font-medium text-gray-700">Note :</label>
                    <div class="flex">
                        <input type="radio" id="heart5" name="rating" value="1" class="hidden" />
                        <label for="heart5" class="text-2xl cursor-pointer">&hearts;</label>
                        <input type="radio" id="heart4" name="rating" value="2" class="hidden" />
                        <label for="heart4" class="text-2xl cursor-pointer">&hearts;</label>
                        <input type="radio" id="heart3" name="rating" value="3" class="hidden" />
                        <label for="heart3" class="text-2xl cursor-pointer">&hearts;</label>
                        <input type="radio" id="heart2" name="rating" value="4" class="hidden" />
                        <label for="heart2" class="text-2xl cursor-pointer">&hearts;</label>
                        <input type="radio" id="heart1" name="rating" value="5" class="hidden" />
                        <label for="heart1" class="text-2xl cursor-pointer">&hearts;</label>
                    </div>
                    </div>
                </div>
            </div>
            <div class="ps-5">
                <h3 class="text-3xl uppercase">Commentaires :</h3>
                <p>Nom : azertyui</p>
                <p>Nom : sdfgh</p>
            </div>
        </div>


    </div>
   
    <script>
        const ratingButtons = document.querySelectorAll('input[type="radio"]');
        const ratings = document.querySelector('.ratings');

        ratingButtons.forEach(button => {
            button.addEventListener('change', () => {
                const selectedRating = parseInt(button.value);

                ratingButtons.forEach(btn => {
                    const btnValue = parseInt(btn.value);
                    if (btnValue <= selectedRating) {
                        btn.nextElementSibling.style.color = 'red';
                    } else {
                        btn.nextElementSibling.style.color = 'initial';
                    }
                });
            });
        });
    </script>

</x-app-layout>
