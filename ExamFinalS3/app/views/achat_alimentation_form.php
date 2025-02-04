
    <?php include("header.php"); ?>
    
    <main class="main">
        <section id="achat-alimentation" class="section">
            <div class="page-title dark-background text-center py-5" style="background-image: url(assets/img/fond2.jpg); background-size: cover; height:300px">
                <div class="container position-relative">
                    <h1 class="text-success">Achat Alimentation</h1>
                    <p class="text-white-50">Home / Ajouter Achat Alimentation</p>
                </div>
            </div>

            <div class="container position-relative" style="margin-top: -100px; z-index: 2;">
                <div class="card shadow-lg p-4 border-0 rounded-3 mx-auto" style="background-color: rgba(255, 255, 255, 0.9);">
                    <h2 class="text-success text-center mb-4">Ajouter un achat alimentation</h2>
                    <form action="gestionAchatAlimentation_p" method="post">
                        <input type="hidden" name="action" value="add">

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-box"></i> Alimentation</label>
                            <select name="id_alimentation" class="form-control">
                                <option value="">Sélectionner</option>
                                <?php foreach ($result['alimentation'] as $alimentation) { ?>
                                    <option value="<?= $alimentation['id_alimentation'] ?>"><?= $alimentation['nom_alimentation'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-currency-dollar"></i> Prix</label>
                            <input type="number" name="prix" class="form-control" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-stack"></i> Quantité</label>
                            <input type="number" name="quantite" class="form-control" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-calendar"></i> Date Achat</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-4 py-2">
                                <i class="bi bi-plus-circle"></i> Ajouter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    
    <?php include("footer.php"); ?>
