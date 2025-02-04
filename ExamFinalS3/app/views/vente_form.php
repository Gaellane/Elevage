<?php include("header.php") ?>

<main class="main">

    <section id="contact" class="contact section">
        <!-- Background Image Section -->
        <div class="page-title dark-background" style="background-image: url(assets/img/farmland.jpg); background-size: cover; background-position: center; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
            <div class="container position-relative">
                <h1 class="text-white">Faire une Nouvelle Vente</h1>
                <p class="text-white-50">Home / Faire une Nouvelle Vente</p>
                <nav class="breadcrumbs d-flex justify-content-center">
                    <ol class="breadcrumb bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="/" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active text-white">Faire une Nouvelle Vente</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Form Section -->
        <div class="container" style="position: relative; z-index: 1; margin-top: -100px;">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h3 class="card-title text-center mb-4">Faire une nouvelle vente</h3>
                            <form action="gestionVente_p" method="post" role="form">
                                <input type="hidden" name="action" value="add">

                                <!-- Animal -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="animal">
                                        Animal
                                    </label>
                                    <select name="id_animal" id="animal" class="form-control" required>
                                        <option value="">Choisir un animal</option>
                                        <?php if(isset($result)) { ?>
                                           <?php foreach($result as $animal) { ?>
                                            <option value="<?= $animal['id_animal']?>"><?= $animal['nom_animal']?></option>
                                        <?php } } ?>
                                    </select>
                                </div>

                                <!-- Date Vente -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="date_vente">
                                        Date vente
                                    </label>
                                    <input type="date" id="date_vente" name="date_vente" required class="form-control">
                                </div>

                                <!-- Buttons -->
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-lg" style="background-color:#dda15e; color:white;">
                                        <i class="bi bi-cart-check"></i> Faire une vente
                                    </button>
                                    <button type="reset" class="btn btn-secondary btn-lg">
                                        <i class="bi bi-arrow-clockwise"></i> Réinitialiser
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
