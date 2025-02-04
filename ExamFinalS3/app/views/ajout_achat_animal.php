<?php include("header.php") ?>

<main class="main">
    <section id="contact" class="contact section">
        <div class="page-title dark-background text-center py-5" style="background-image: url(assets/img/fond3.webp); position: relative; background-size : cover; height:300px">
            <div class="container position-relative">
                <h1 class="text-success">Achat Animal</h1> <!-- Titre en vert -->
                <p class="text-white-50">Home / Acheter Animal</p>
                <nav class="breadcrumbs d-flex justify-content-center">
                    <ol class="breadcrumb bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="/" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active text-white">Achat Animal</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Conteneur du formulaire avec chevauchement sur l'image -->
        <div class="container position-relative" style="margin-top: -100px; z-index: 2;">
            <div class="card shadow-lg p-4 border-0 rounded-3 mx-auto" style=" background-color: rgba(255, 255, 255, 0.9);">
                <h2 class="text-success text-center mb-4">Ajouter un animal</h2> <!-- Titre en vert -->
                <form action="achatAnimal" method="post" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add">

                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label class="form-label"><i class="bi bi-tag"></i> Nom de l'animal</label>
                            <input type="text" name="nom" class="form-control" placeholder="Nom de l'animal" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="form-label"><i class="bi bi-list"></i> Catégorie</label>
                            <select name="categorie" class="form-control">
                                <?php if (isset($categories)) {
                                    foreach ($categories as $c) { ?>
                                        <option value="<?= $c['id_categorie'] ?>"><?= $c['nom_categorie'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label"><i class="bi bi-weight"></i> Poids</label>
                        <input type="number" class="form-control" name="poids" placeholder="Poids" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label class="form-label"><i class="bi bi-calendar"></i> Date Achat</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="form-label"><i class="bi bi-cash"></i> Prix</label>
                            <input type="number" class="form-control" name="prix" placeholder="Prix" required>
                        </div>
                    </div>

                    <!-- Radio Auto Vente -->
                    <div class="form-group mb-3">
                        <label class="form-label"><i class="bi bi-cart"></i> Auto Vente</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="auto_vente" value="1" checked>
                                <label class="form-check-label">Oui</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="auto_vente" value="0">
                                <label class="form-check-label">Non</label>
                            </div>
                        </div>
                    </div>

                    <!-- Date Décès -->
                    <div class="form-group mb-3">
                        <label class="form-label"><i class="bi bi-calendar-x"></i> Date Décès</label>
                        <input type="date" class="form-control" name="date_deces">
                    </div>

                    <!-- Upload fichier -->
                    <div class="form-group mb-4">
                        <label class="form-label"><i class="bi bi-image"></i> Ajouter une image</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-4 py-2"> <!-- Bouton en vert -->
                            <i class="bi bi-plus-circle"></i> Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include("footer.php") ?>
