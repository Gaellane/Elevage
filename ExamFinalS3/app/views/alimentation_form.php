<?php include("header.php") ?>

<main class="main">
    <!-- Page Title -->
    <section id="contact" class="contact section">
        <div class="page-title dark-background text-center py-5" style="background-image: url(assets/img/fond3.webp); position: relative; background-size: cover; background-position: center; height: 300px;">
            <div class="container position-relative">
                <h1 class="text-success">Ajouter /Modifier Alimentation</h1> <!-- Titre en vert -->
                <p class="text-white-50">Home / Alimentation</p>
                <nav class="breadcrumbs d-flex justify-content-center">
                    <ol class="breadcrumb bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active text-white">Alimentation</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Conteneur du formulaire avec chevauchement sur l'image -->
        <div class="container position-relative" style="margin-top: -100px; z-index: 2;">
            <div class="card shadow-lg p-4 border-0 rounded-3 mx-auto" style="background-color: rgba(255, 255, 255, 0.9);">
                <h2 class="text-success text-center mb-4">Ajout / Modification Alimentation</h2> <!-- Titre en vert -->
                <form action="alimentation" method="post" role="form">
                    <?php if (isset($alimentation)) { ?>
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id_alimentation" value="<?= $alimentation['id_alimentation'] ?>">
                    <?php } else { ?>
                        <input type="hidden" name="action" value="add">
                    <?php } ?>

                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label class="form-label"><i class="bi bi-tag"></i> Nom de l'alimentation</label>
                            <input type="text" name="nom" class="form-control" placeholder="Nom de l'alimentation" value="<?= isset($alimentation) ? $alimentation['nom_alimentation'] : '' ?>" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label class="form-label"><i class="bi bi-list"></i> Catégorie</label>
                            <select name="categorie" class="form-control">
                                <?php if (isset($alimentation)) { ?>
                                    <option value="<?= $alimentation['id_categorie'] ?>"><?= $alimentation['nom_categorie'] ?></option>
                                <?php } ?>
                                <?php if (isset($categories)) {
                                    foreach ($categories as $c) { ?>
                                        <option value="<?= $c['id_categorie'] ?>"><?= $c['nom_categorie'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label"><i class="bi bi-weight"></i> Gain de Poids</label>
                        <input type="number" class="form-control" name="gain_poids" value="<?= isset($alimentation) ? $alimentation['gain_poids'] : '' ?>" placeholder="Gain de Poids" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-4 py-2">
                            <i class="bi bi-pencil-square"></i> <?= isset($alimentation) ? 'Modifier' : 'Ajouter' ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include("footer.php") ?>
