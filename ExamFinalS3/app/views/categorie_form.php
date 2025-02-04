<?php include("header.php") ?>

<main class="main">

    <section id="contact" class="contact section">
        <!-- Background Image Section -->
        <div class="page-title dark-background" style="background-image: url(assets/img/fond2.jpg); background-size: cover; background-position: center; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
            <div class="container position-relative">
                <h1 class="text-white">Add New Categorie</h1>
                <p class="text-white-50">Home / Add New Categorie</p>
                <nav class="breadcrumbs d-flex justify-content-center">
                    <ol class="breadcrumb bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="/" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active text-white">Add New Categorie</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Form Section -->
        <div class="container" style="position: relative; z-index: 1; margin-top: -200px;">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h3 class="card-title text-center mb-4">Add New Categorie</h3>
                            <form action="gestionCategorie_p" method="post" role="form">
                                <input type="hidden" name="action" value="add">

                                <!-- Nom Categorie -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nom_categorie">
                                        Nom categorie
                                    </label>
                                    <input type="text" id="nom_categorie" name="nom_categorie" placeholder="Enter categorie name" required
                                        class="form-control">
                                </div>

                                <!-- Poids Min Vente -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="poids_min_vente">
                                        Poids min vente
                                    </label>
                                    <input type="number" id="poids_min_vente" name="poids_min_vente" step="0.01" placeholder="Enter poids min" required
                                        class="form-control">
                                </div>

                                <!-- Prix de Vente (kg) -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="prix_vente_kg">
                                        Prix de vente (kg)
                                    </label>
                                    <input type="number" id="prix_vente_kg" name="prix_vente_kg" step="0.01" placeholder="Enter prix de vente par kg" required
                                        class="form-control">
                                </div>

                                <!-- Poids Max -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="poids_max">
                                        Poids max
                                    </label>
                                    <input type="number" id="poids_max" name="poids_max" step="0.01" placeholder="Enter poids max" required
                                        class="form-control">
                                </div>

                                <!-- Jour sans Nourriture -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="j_sans_nourriture">
                                        Jour sans nourriture
                                    </label>
                                    <input type="number" id="j_sans_nourriture" name="j_sans_nourriture" step="1" placeholder="Enter jours sans nourriture" required
                                        class="form-control">
                                </div>

                                <!-- Perte Poids -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="perte_poids">
                                        Perte poids
                                    </label>
                                    <input type="number" id="perte_poids" name="perte_poids" step="0.01" placeholder="Enter perte poids" required
                                        class="form-control">
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="quota_journalier">
                                        Quota journallier
                                    </label>
                                    <input type="number" id="quota_journalier" name="quota_journalier" step="0.01" placeholder="Entrer un quota" required
                                        class="form-control">
                                </div>

                                <!-- Buttons -->
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-lg" style="background-color:#dda15e; color:white;">
                                        <i class="bi bi-check-circle"></i> Create Categorie
                                    </button>
                                    <button type="reset" class="btn btn-secondary btn-lg">
                                        <i class="bi bi-arrow-clockwise"></i> Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Form Section -->

    </section><!-- /Contact Section -->
</main>

<?php include("footer.php") ?>
