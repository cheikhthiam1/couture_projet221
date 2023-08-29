const inputElement = document.getElementById("fournisseur");
const checkboxContainer = document.getElementById("checkboxContainere");

document.addEventListener("DOMContentLoaded", () => {
  const selectedSuppliers = JSON.parse(localStorage.getItem("selectedSuppliers")) || [];
  loadSelectedSuppliers(selectedSuppliers);
});

async function fetchSuppliersContaining(letters) {
  const response = await fetch("http://localhost:8000/api/fournisseur");
  const fournisseurs = await response.json();

  const matchingSuppliers = fournisseurs.filter(
    fournisseur => fournisseur.prenom.toLowerCase().includes(letters.toLowerCase())
  );

  return matchingSuppliers;
}


const selectedCheckboxes = new Set();

function loadSelectedSuppliers(selectedSuppliers) {
  checkboxContainer.innerHTML = ""; // Clear existing checkboxes

  selectedSuppliers.forEach(selectedSupplier => {
    createSupplierCheckbox(selectedSupplier.id, selectedSupplier.name, true);
  });
}



function createSupplierCheckbox(supplierId, supplierPrenom, isChecked) {
  if (selectedCheckboxes.has(supplierId)) {
    return; // Skip adding the checkbox if it's already selected
  }

  const checkbox = document.createElement("input");
  checkbox.type = "checkbox";
  checkbox.name = "selectedSuppliers";
  checkbox.value = supplierId;
  checkbox.checked = isChecked;
  checkbox.setAttribute("data-supplier-id", supplierId); // Use the correct attribute name

  const label = document.createElement("label");
  label.textContent = supplierPrenom;

  checkbox.addEventListener("change", updateSelectedSuppliers);

  selectedCheckboxes.add(supplierId);
  checkboxContainer.appendChild(checkbox);
  checkboxContainer.appendChild(label);
}

function updateSelectedSuppliers() {
  const checkboxes = document.querySelectorAll('input[name="selectedSuppliers"]');
  
  checkboxes.forEach(checkbox => {
    if (checkbox.checked) {
      selectedCheckboxes.add(checkbox.value);
    } else {
      selectedCheckboxes.delete(checkbox.value);
    }
  });

  localStorage.setItem("selectedSuppliers", JSON.stringify([...selectedCheckboxes]));
}

inputElement.addEventListener("input", async (event) => {
  const lettersTyped = event.target.value.trim();
  
  checkboxContainer.innerHTML = ""; // Clear existing checkboxes

  const selectedCheckboxes = Array.from(checkboxContainer.querySelectorAll('input[type="checkbox"]:checked'));
  selectedCheckboxes.forEach(checkbox => {
    createSupplierCheckbox(checkbox.value, checkbox.nextSibling.textContent, true);
  });

  if (lettersTyped === "") {
    return;
  }

  const matchingSuppliers = await fetchSuppliersContaining(lettersTyped);

  if (matchingSuppliers.length > 0) {
    matchingSuppliers.forEach(supplier => {
      const isSelected = selectedCheckboxes.some(checkbox => checkbox.value === supplier.id);
      createSupplierCheckbox(supplier.id, supplier.prenom, isSelected);
    });
  } else {
    // Update the message without clearing the checkboxes
    checkboxContainer.textContent = "Fournisseur introuvable!!!";
    const selectedSuppliers = JSON.parse(localStorage.getItem("selectedSuppliers")) || [];
    loadSelectedSuppliers(selectedSuppliers);
  }
});

// Update selected suppliers when checkboxes are changed
checkboxContainer.addEventListener("change", updateSelectedSuppliers);