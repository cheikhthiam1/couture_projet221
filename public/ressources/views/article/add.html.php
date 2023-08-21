<div class="container mt-5 col-md-8">
  <div class="card mt-5">
    <div class="card-body bg-white">
      <h4 class="card-title"> Ajouter des Articles </h4>
      <form class="row gx-4 gy-3" novalidate id="addForm">
        <div class="col-md-6 position-relative formC">
          <label for="validationTooltip01" class="form-label">Libelle</label>
          <input type="text" name="libelle" class="form-control" id="libelle" value="">
          <small class="error-message">Error message</small>
        </div>
        <div class="col-md-6 position-relative formC">
          <label for="validationTooltip02" class="form-label">Prix Achat</label>
          <input type="text" class="form-control" name="prixAchat" id="prix" value="">
          <small class="error-message">Error message</small>
        </div>

        <div class="col-md-6 position-relative formCa">
          <label for="validationTooltip04" class="form-label">Categorie</label>
          <select class="form-select" id="categorieSelect" name="categorieId">
            <option selected disabled value="">Selectionnez une categorie</option>
          </select>
          <small class="error-message">Error message</small>
        </div>
        <div id="checkboxContainer" class="check"></div>
        <a href="#" class="clickable-icon" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          <span class="material-symbols-outlined plus">
            add_circle
          </span>
        </a>
        <div class="image">
          <label for="" class="form-label">Photo
            <input type="file" id="image" style="display:none;">
            <label for="image">
              <img id="photo" src="<?= AssetImg("no_image.jpg
              ") ?>">
            </label>
          </label>
        </div>
        <div class="col-md-6 position-absolute formC four">
          <label for="validationTooltip03" class="form-label">Fournisseur</label>
          <input type="text" name="fournisseurId" class="form-control" id="fournisseur">
          <div id="feedbackMessage"></div>
          <small class="error-message">Error message</small>
        </div>
        <div id="checkboxContainere" class="checked"></div>
        <a href="#" class="clickable-icon3" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <span class="material-symbols-outlined plusf">
            add_circle
          </span>
        </a>

        <div class="col-md-2 position-absolute formC quantite">
          <label for="validationTooltip02" class="form-label">Quantite</label>
          <input type="number" class="form-control" name="QteStock" id="quantite" value="">
          <small class="error-message">Error message</small>
        </div>
        <div class="col-md-4 position-absolute formC unite ms-n3">
          <label for="validationTooltip02" class="form-label">Unite</label>
          <select class="form-select" id="uniteSelect">
            <option selected disabled value="">Selectionnez une unite</option>
          </select>
          <small class="error-message">Error message</small>
        </div>
        <a href="#" class="clickable-icon2">
          <span class="material-symbols-outlined plusu">
            add_circle
          </span>
        </a>
        <div class="col-12">
          <button class="btn btn2 btn-dark" type="submit">Submit form</button>
        </div>

        <!-- <input type="hidden" name="path" value="store-article"> -->
      </form>
    </div>
  </div>
</div>
<!-- Categorie Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ajouter une categorie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form novalidate id="categorie">
        <div class="modal-body">
          <div class="mb-3">
            <label for="libelle" class="form-label">Libelle</label>
            <input type="text" class="form-control" id="libelle">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Fournisseur Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un fournisseur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form novalidate id="addFournisseur">
        <div class="modal-body">
          <div class="mb-3">
            <label for="libelle" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="prenom">
          </div>
          <div class="mb-3">
            <label for="libelle" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="module" src="<?= AssetJs("/categorie/script.js") ?>">
</script>
<script src="<?= AssetJs("script.js") ?>"></script>
<script src="<?= AssetJs("article.js") ?>"></script>
<script src="<?= AssetJs("vente.js") ?>"></script>
<script src="<?= AssetJs("fournisseur.js") ?>"></script>