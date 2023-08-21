<div class="container mt-5">
  <form class="row g-3" novalidate id="addForm">
    <div class="col-md-4">
      <label for="validationDefault01" class="form-label">Libelle</label>
      <input type="text" class="form-control" name="libelle" id="libelle" value="">
    </div>

    <div class="col-md-3" style="margin-top: 48px;">

      <button class="btn btn-dark" type="submit">Enregistrer</button>
    </div>
  </form>
  <div class="card mt-5">
    <div class="card-body bg-light">
      <h4 class="card-title">Liste des Categories</h4>
      <div class="table-responsive">
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Libelle</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody id="tbody">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="module" src="<?= AssetJs("/categorie/script.js") ?>">
</script>

<!-- <script>
  async function fetchCategories() {
    try {
      const response = await fetch("http://localhost:8000/api/categorie");
      const categories = await response.json();
      const tableBody = document.getElementById("categoryTableBody");

      categories.forEach(category => {
        const row = document.createElement("tr");
        row.innerHTML = `
          <td>${category.id}</td>
          <td>${category.libelle}</td>
          <td>
            <a class="btn btn-light" href="#" role="button">Edit</a>
            <a class="btn btn-danger" href="#" role="button">Delete</a>
          </td>
        `;
        tableBody.appendChild(row);
      });
    } catch (error) {
      console.error("Error fetching categories:", error);
    }
  }

  fetchCategories();

  document.getElementById('addPost').addEventListener('submit', (e) => 
  {
    e.preventDefault();
    let libelle = document.getElementById('libelle').value;
    fetch("http://localhost:8000/api/categorieadd", {
        method: 'POST',
        headers: {
          'Accept': 'application/json, text/plain, /',
          'Content-type': 'application/json'
        },
        body: JSON.stringify({
          libelle: libelle 
        })
      })
  
  });
</script> -->