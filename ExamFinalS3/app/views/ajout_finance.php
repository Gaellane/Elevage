<?php include("header.php") ?>

<main class="main">
    <section id="finance" class="finance section">
        <!-- Background Image Section -->
        <div class="page-title dark-background" style="background-image: url(assets/img/fond2.jpg); background-size: cover; background-position: center; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
            <div class="container position-relative">
                <h1 class="text-white">Ajouter un Mouvement Financier</h1>
                <p class="text-white-50">Accueil / Ajouter Mouvement</p>
                <nav class="breadcrumbs d-flex justify-content-center">
                    <ol class="breadcrumb bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="/" class="text-white">Accueil</a></li>
                        <li class="breadcrumb-item active text-white">Ajouter Mouvement</li>
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
                            <h3 class="card-title text-center mb-4">Ajouter un Mouvement</h3>
                            <form action="financeP" method="post" role="form">
                                <input type="hidden" name="action" value="add">

                                <!-- Montant -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="montant">
                                        Montant
                                    </label>
                                    <input type="number" id="montant" name="montant" placeholder="Entrer le montant" required class="form-control">
                                </div>

                                <!-- Type de Mouvement -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="type">
                                        Mouvement
                                    </label>
                                    <select name="type" id="type" class="form-control" required>
                                        <?php foreach ($mouvement as $mvt) { ?>
                                            <option value="<?= $mvt['id_mouvement'] ?>"><?= $mvt['type_mouvement'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <!-- Description -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                        Description
                                    </label>
                                    <textarea name="description" id="description" cols="30" rows="5" placeholder="Entrer une description" required class="form-control"></textarea>
                                </div>

                                <!-- Buttons -->
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-lg" style="background-color:#dda15e; color:white;">
                                        <i class="bi bi-check-circle"></i> Valider
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
    </section><!-- /Finance Section -->
</main>

<?php include("footer.php") ?>