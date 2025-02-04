<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tea Listings</title>
    <script src="assets/js/jquery-3.6.4.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font/bootstrap-icons.css">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Categorie Listings</h1>

        <!-- Ajouter button -->
        <a href="gestionCategorie?action=new">
            <button class="bg-green-500 text-white p-2 rounded hover:bg-green-600">
                Ajouter
            </button>
        </a>

    </div>

    <form action="gestionCategorie_p" method="post">
        <table class="w-full">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 text-left">Espece</th>
                    <th class="p-3 text-left">Poids min vente</th>
                    <th class="p-3 text-left">Prix vente (kg)</th>
                    <th class="p-3 text-left">Poids max</th>
                    <th class="p-3 text-left">Jour sans nourriture</th>
                    <th class="p-3 text-left">Perte poids (%)</th>
                    <th class="p-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $categorie) { ?>
                    <tr class="border-b hover:bg-gray-50">
                        <input type="hidden" name="id_categorie" value="<?= $categorie['id_categorie'] ?>">
                        <td class="p-3"><input type="text" name="nom_categorie" value="<?= $categorie['nom_categorie'] ?>"></td>
                        <td class="p-3"><input type="number" name="poids_min_vente" value="<?= $categorie['poids_min_vente'] ?>"></td>
                        <td class="p-3"><input type="number" name="prix_vente_kg" value="<?= $categorie['prix_vente_kg'] ?>"></td>
                        <td class="p-3"><input type="number" name="poids_max" value="<?= $categorie['poids_max'] ?>"></td>
                        <td class="p-3"><input type="number" name="j_sans_nourriture" value="<?= $categorie['j_sans_nourriture'] ?>"></td>
                        <td class="p-3"><input type="number" name="perte_poids" value="<?= $categorie['perte_poids'] ?>"></td>
                        <td class="p-3 text-center">
                            <a href="gestionCategorie?action=view">
                                <button type="button" class="text-blue-500 mr-2" title="View Details">
                                    <i class="fas fa-eye">Details</i>
                                </button>
                            </a>
                            <a href="gestionCategorie?action=delete&id_categorie=<?= $categorie['id_categorie'] ?>">
                                <button type="button" class="text-red-500" title="Delete">
                                    <i class="fas fa-trash">Delete</i>
                                </button>
                            </a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <button class="px-4 py-2 bg-white border rounded" type="submit">Valider</button>
    </form>


    <!-- Section de pagination -->
    <div class="p-4 bg-gray-50 flex justify-between items-center">
        <span>Showing 1-<?= count($result) ?> of <?= count($result) ?> Categorie</span>
        <div class="space-x-2">
            <button class="px-4 py-2 bg-white border rounded">Previous</button>
            <button class="px-4 py-2 bg-white border rounded">Next</button>
        </div>
    </div>
    </div>

    </div>
</body>

</html>