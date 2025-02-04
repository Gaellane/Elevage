<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add categorie</title>
    <script src="assets/js/jquery-3.6.4.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font/bootstrap-icons.css">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <form class="max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="gestionCategorie_p" method="post">

            <input type="hidden" name="action" value="add">
            <h2 class="text-2xl mb-6 text-center font-bold text-gray-700">Add New Categorie</h2>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nom_categorie">
                    Nom categorie
                </label>
                <input type="text" id="nom_categorie" name="nom_categorie" placeholder="Enter categorie name" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="poids_min_vente">
                    Poids min vente
                </label>
                <input type="number" id="poids_min_vente" name="poids_min_vente" step="0.01" placeholder="Enter poids min" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="prix_vente_kg">
                    Prix de vente (kg)
                </label>
                <input type="number" id="prix_vente_kg" name="prix_vente_kg" step="0.01" placeholder="Enter pirx de vente par kg" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="poids_max">
                    Poids max
                </label>
                <input type="number" id="poids_max" name="poids_max" step="0.01" placeholder="Enter poids max" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="j_sans_nourriture">
                    Jour sans nourriture
                </label>
                <input type="number" id="j_sans_nourriture" name="j_sans_nourriture" step="1" placeholder="Enter jours sans nourriture" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="perte_poids">
                    Perte poids
                </label>
                <input type="number" id="perte_poids" name="perte_poids" step="0.01" placeholder="Enter perte poids" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Create categorie
                </button>
                <button type="reset"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Reset
                </button>
            </div>
        </form>
    </div>
</body>


</html>