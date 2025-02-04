<?php include("header.php") ?>

<main class="main">
    <!-- Background Image Section -->
    <section id="categorie-listings" class="contact section">
        <div class="page-title dark-background" style="background-image: url(assets/img/fond2.jpg); background-size: cover; background-position: center; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
            <div class="container position-relative">
                <h1 class="text-white">Categorie Listings</h1>
                <p class="text-white-50">Home / Categorie Listings</p>
                <nav class="breadcrumbs d-flex justify-content-center">
                    <ol class="breadcrumb bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="/" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active text-white">Categorie Listings</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Listings Section -->
        <div class="container position-relative" style="margin-top: -100px; z-index: 2;">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3 class="card-title mb-0">Categorie Listings</h3>
                                <a href="gestionCategorie?action=new" class="btn" style="background-color:#dda15e; color:white;">
                                    <i class="bi bi-plus-circle"></i> Add New Categorie
                                </a>
                            </div>

                            <form action="gestionCategorie_p" method="post" role="form">
                                <input type="hidden" name="action" value="update">

                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Espece</th>
                                                <th>Poids min vente</th>
                                                <th>Prix vente (kg)</th>
                                                <th>Poids max</th>
                                                <th>Jour sans nourriture</th>
                                                <th>Perte poids (%)</th>
                                                <th>Quota journalier</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($result as $categorie) { ?>
                                                <tr>
                                                    <input type="hidden" name="id_categorie[]" value="<?= $categorie['id_categorie'] ?>">
                                                    <td>
                                                        <input type="text" name="nom_categorie[]" value="<?= $categorie['nom_categorie'] ?>" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="poids_min_vente[]" value="<?= $categorie['poids_min_vente'] ?>" step="0.01" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="prix_vente_kg[]" value="<?= $categorie['prix_vente_kg'] ?>" step="0.01" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="poids_max[]" value="<?= $categorie['poids_max'] ?>" step="0.01" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="j_sans_nourriture[]" value="<?= $categorie['j_sans_nourriture'] ?>" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="perte_poids[]" value="<?= $categorie['perte_poids'] ?>" step="0.01" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="quota_journalier[]" value="<?= $categorie['quota_journalier'] ?>" step="0.01" class="form-control">
                                                    </td>
                                                    <td>
                                                        <a href="gestionCategorie?action=delete&id_categorie=<?= $categorie['id_categorie'] ?>" class="btn btn-danger btn-sm">
                                                            <i class="bi bi-trash"></i> Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-lg" style="background-color:#dda15e; color:white;">
                                        <i class="bi bi-check-circle"></i> Validate Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Listings Section -->
    </section>
</main>

<?php include("footer.php") ?>
