const categorieSelect = document.getElementById("categorieSelect");
const uniteSelect = document.getElementById("uniteSelect");


async function populateSelectWithData() {
    try {
        const response = await fetch("http://localhost:8000/api/categorie"); 
        const datas = await response.json();

        datas.forEach(data => {
            const option = document.createElement("option");
            option.value = data.id;
            option.textContent = data.libelle;
            categorieSelect.appendChild(option);
        });
    } catch (error) {
        console.error("Error fetching data:", error);
    }
}
populateSelectWithData();

async function populateSelectWithData1() {
 try {
     const response = await fetch("http://localhost:8000/api/unite"); 
     const datas = await response.json();

     datas.forEach(data => {
         const option = document.createElement("option");
         option.value = data.id;
         option.textContent = data.unite_libelle;
         uniteSelect.appendChild(option);
     });
 } catch (error) {
     console.error("Error fetching data:", error);
 }
}
populateSelectWithData1();

async function populateSelectWithData2() {
    try {
        const response = await fetch("http://localhost:8000/api/article"); 
        const datas = await response.json();
        const tableBody = document.getElementById("categoryTableBody");

        datas.forEach(vente => {
            const row = document.createElement("tr");
            row.innerHTML = `
                  <td>${vente.id}</td>
                  <td>${vente.libelle}</td>
                  <td>${vente.prixAchat}</td>
                  <td>${vente.qteStock}</td>
                  <td>${vente.idCategorie}</td>
                  <td>${vente.idFournisseur}</td>
                  <td>
                    <a class="btn btn-light" href="#" role="button">Edit</a>
                    <a class="btn btn-danger" href="#" role="button">Delete</a>
                  </td>
                `;
            tableBody.appendChild(row);
           });        
    } catch (error) {
        console.error("Error fetching data:", error);
    }
}
populateSelectWithData2();
