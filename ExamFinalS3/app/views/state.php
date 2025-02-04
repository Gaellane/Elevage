<?php include("header.php") ?>
<main class="main">
    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(assets/img/farmland.jpg); background-size: cover; background-position: center; min-height: 50vh; display: flex; align-items: center;">
        <div class="container position-relative">
            <h1 class="text-center text-white">Animal Status</h1>
            <nav class="breadcrumbs d-flex justify-content-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white">Status</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Blog Posts 2 Section -->
    <section id="blog-posts-2" class="blog-posts-2 section">
        <div class="container mt-4">
            <!-- Form Controls -->
            <form id="myForm" class="mb-4 p-4 bg-white shadow-sm rounded">
                <div class="row align-items-end">
                    <div class="col-md-4">
                        <label for="dateInput" class="form-label">Select Date</label>
                        <input type="date" id="dateInput" name="date" class="form-control">
                    </div>
                    <div class="col-md-8">
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-primary">
                                <i class="bi bi-check-circle me-2"></i>Valider
                            </button>
                            <a href="reset" class="btn btn-danger">
                                <i class="bi bi-arrow-counterclockwise me-2"></i>Reset Data
                            </a>
                            <a href="financeG?action=form" class="btn btn-warning">Deposer argent</a>
                        </div>
                    </div>
                </div>
            </form>
            
            <div id="valiny" class="row gy-4">
                <!-- Les animaux seront affichés ici -->
            </div>
        </div>
    </section>
</main>

<style>
.post-img {
    height: 250px;
    overflow: hidden;
    border-radius: 8px 8px 0 0;
}

.post-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

article {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
}

article:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.15);
}

article:hover .post-img img {
    transform: scale(1.1);
}

.meta {
    background: rgba(255, 255, 255, 0.9);
    padding: 15px;
    margin: -50px 20px 20px;
    border-radius: 6px;
    position: relative;
    z-index: 2;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
}

.post-content {
    padding: 0 20px 20px;
}

.post-title {
    font-size: 1.25rem;
    margin-bottom: 15px;
    color: #333;
}

.readmore {
    color: #4154f1;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.readmore:hover {
    color: #717ff5;
}

.readmore i {
    margin-left: 5px;
    transition: transform 0.3s ease;
}

.readmore:hover i {
    transform: translateX(5px);
}
</style>


    <script>
        var but = document.querySelector("button");
        var valiny = document.getElementById("valiny");

        but.addEventListener("click", () => {
            let form = document.getElementById("myForm");
            var formData = new FormData(form);
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        try {
                            let jsonResponse = JSON.parse(xhr.responseText);
                            valiny.innerHTML = "";

                            jsonResponse.forEach(animal => {
                                let col = document.createElement("div");
                                col.className = "col-lg-4";

                                let article = document.createElement("article");
                                article.className = "position-relative h-100";

                                let postImg = document.createElement("div");
                                postImg.className = "post-img position-relative overflow-hidden";
                                let img = document.createElement("img");
                                img.src ="assets/img/animaux/"+animal.image;
                                img.className = "img-fluid";
                                postImg.appendChild(img);

                                let meta = document.createElement("div");
                                meta.className = "meta d-flex align-items-end";
                                meta.innerHTML = `
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">${animal.nom}</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">${animal.categorie.nom}</span>
                                    </div>
                                `;

                                let postContent = document.createElement("div");
                                postContent.className = "post-content d-flex flex-column";
                                let h3 = document.createElement("h3");
                                h3.className = "post-title";
                                h3.textContent = `${animal.nom} - Poids: ${animal.poids} kg `;
                                if(animal.isAlive){
                                    h3.textContent += "En vie";
                                } else {
                                    h3.textContent += "Mort le "+animal.date_mort.date
                                }
                                let p = document.createElement("p");
                                p.textContent = `Poids min vente: ${animal.categorie.poids_min_vente} kg`;
                                if(animal.isVendu){
                                    p.textContent += " Vendu "+animal.date_vente.date;
                                } else {
                                    p.textContent += " En Cours Vente"
                                }
                                let a = document.createElement("a");
                                a.href = "#";
                                a.className = "readmore stretched-link";
                                a.innerHTML = "Voir plus <i class='bi bi-arrow-right'></i>";

                                postContent.appendChild(h3);
                                postContent.appendChild(p);
                                postContent.appendChild(a);

                                article.appendChild(postImg);
                                article.appendChild(meta);
                                article.appendChild(postContent);
                                col.appendChild(article);
                                valiny.appendChild(col);
                            });
                        } catch (e) {
                            console.error("Erreur lors du parsing JSON :", e);
                        }
                    } else {
                        console.error("Erreur serveur, statut :", xhr.status);
                    }
                }
            };

            xhr.open("POST", "state", true);
            xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            xhr.send(formData);
        });
    </script>

<?php include("footer.php") ?>

