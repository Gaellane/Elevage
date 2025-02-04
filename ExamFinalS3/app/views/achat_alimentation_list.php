<?php include("header.php") ?>

<main class="main">
    <!-- Background Image Section -->
    <section id="modifier-alimentation" class="contact section">
        <div class="page-title dark-background" style="background-image: url(assets/img/fond2.jpg); background-size: cover; background-position: center; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
            <div class="container position-relative text-center">
                <h1 class="text-white">Modifier Alimentation</h1>
                <p class="text-white-50">Home / Alimentation</p>
                <nav class="breadcrumbs d-flex justify-content-center">
                    <ol class="breadcrumb bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active text-white">Alimentation</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Form Section -->
        <div class="container position-relative" style="margin-top: -100px; z-index: 2;">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h3 class="card-title mb-4">Modifier Alimentation</h3>
                            <form action="gestionAchatAlimentation" method="GET">
                                <input type="hidden" name="action" value="">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <select name="id_alimentation" class="form-control">
                                            <option value="">Toutes</option>
                                            <?php foreach($result['alimentation'] as $alimentation){ ?>
                                                <option value="<?= $alimentation['id_alimentation'] ?>"><?= $alimentation['nom_alimentation'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="id_categorie" class="form-control">
                                            <option value="">Toutes</option>
                                            <?php foreach($result['categorie'] as $categorie){ ?>
                                                <option value="<?= $categorie['id_categorie'] ?>"><?= $categorie['nom_categorie'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" name="min_price" step="0.01" placeholder="Prix Min" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" name="max_price" step="0.01" placeholder="Prix Max" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" name="date_min" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" name="date_max" class="form-control">
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg" style="background-color:#dda15e; color:white;">
                                            <i class="bi bi-check-circle"></i> Ajouter
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Form Section -->

        <!-- Table Section -->
        <div class="container mt-5">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h3 class="card-title mb-4">Liste des Aliments</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th>Nom alimentation</th>
                                    <th>Nom catégorie</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result['achat_alimentation'] as $achat) { ?>
                                    <tr>
                                        <td><?= $achat['nom_alimentation'] ?></td>
                                        <td><?= $achat['nom_categorie'] ?></td>
                                        <td><?= $achat['prix'] ?></td>
                                        <td><?= $achat['quantite'] ?></td>
                                        <td><?= $achat['date_achat'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- End Table Section -->
    </section>
</main>

<?php include("footer.php") ?>