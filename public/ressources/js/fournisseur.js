const inputElement = document.getElementById("fournisseur");
const checkboxContainer = document.getElementById("checkboxContainere");

async function fetchSuppliersContaining(letters) {
  const response = await fetch("http://localhost:8000/api/fournisseur");
  const fournisseurs = await response.json();

  const matchingSuppliers = fournisseurs.filter(
    fournisseur => fournisseur.prenom.toLowerCase().includes(letters.toLowerCase())
  );

  return matchingSuppliers;
}

inputElement.addEventListener("input", async (event) => {
  const lettersTyped = event.target.value.trim();
  
  if (lettersTyped === "") {
    // Clear checkboxes
    checkboxContainer.innerHTML = "";
  } else {
    const matchingSuppliers = await fetchSuppliersContaining(lettersTyped);
    
    // Clear previous checkboxes
    checkboxContainer.innerHTML = "";

    if (matchingSuppliers.length > 0) {
      matchingSuppliers.forEach(supplier => {
        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.name = "selectedSuppliers"; // Use an array to hold selected suppliers
        checkbox.value = supplier.prenom;

        const label = document.createElement("label");
        label.textContent = supplier.prenom;

        checkboxContainer.appendChild(checkbox);
        checkboxContainer.appendChild(label);
      });
    } else {
      checkboxContainer.textContent = "Pas de fournisseurs trouvé avec un prenom contenant '" + lettersTyped + "'.";
    }
  }
});
