const categorieSelect = document.getElementById("categorieSelect");
const uniteSelect = document.getElementById("uniteSelect");


async function populateSelectWithData() {
    try {
        const response = await fetch("http://localhost:8000/api/categorie"); 
        const datas = await response.json();

        const optionElements = datas.map(data => {
            const option = document.createElement("option");
            option.value = data.id;
            option.textContent = data.libelle;
            return option;
        });

        categorieSelect.append(...optionElements);
    } catch (error) {
        console.error("Error fetching data:", error);
    }
}

populateSelectWithData();

async function populateTableWithData() {
    try {
        const response = await fetch("http://localhost:8000/api/article"); 
        const datas = await response.json();
        const tableBody = document.getElementById("categoryTableBody");

        const rows = datas.map(vente => {
            return `
                <tr>
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
                </tr>
            `;
        });

        tableBody.innerHTML = rows.join("");
    } catch (error) {
        console.error("Error fetching data:", error);
    }
}

populateTableWithData();


document.addEventListener("DOMContentLoaded", function () {
    const libelleInput = document.getElementById("libelle");
    const categorieSelect = document.getElementById("categorieSelect");
    const referenceInput = document.querySelector(".refer input");
  
    // Event listener for changes in Libelle and Categorie
    libelleInput.addEventListener("input", updateReference);
    categorieSelect.addEventListener("change", updateReference);
  
    // Function to update the Reference input
    function updateReference() {
      const libelleValue = libelleInput.value.trim().toUpperCase();
      const selectedCategorieOption = categorieSelect.options[categorieSelect.selectedIndex];
      
      // Check if the selected option is not the default one
      if (selectedCategorieOption.value !== "" && libelleValue !== "") {
        const categorieText = selectedCategorieOption.textContent.trim().toUpperCase();
        
        // Get the first three characters from Libelle and Categorie text
        const libellePrefix = libelleValue.slice(0, 3);
        const categoriePrefix = categorieText.slice(0, 3);
        
        // Combine the prefixes with hyphens
        const referenceValue = [libellePrefix, categoriePrefix,"001"].join("-");
        
        // Update the value of the Reference input
        referenceInput.value = referenceValue;
      }
    }
    
    // Initial update of the reference on page load
    updateReference();
  });
  