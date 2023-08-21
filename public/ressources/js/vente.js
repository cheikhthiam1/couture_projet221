// const feedbackElement = document.getElementById("feedbackMessage");
// const inputElement = document.getElementById("fournisseur");
// const checkboxContainer = document.getElementById("checkboxContainer");

// async function checkVenteExistence(fournisseur) {
//   const response = await fetch("http://localhost:8000/api/fournisseur");
//   const fournisseurs = await response.json();

//   const fournisseurExists = fournisseurs.some(fournisseure => fournisseure.prenom === fournisseur);

//   return fournisseurExists;
// }

// inputElement.addEventListener("input", async (event) => {
//   const fournisseur = event.target.value;
//   const exists = await checkVenteExistence(fournisseur);

//   feedbackElement.textContent = exists ? "Supplier exists" : "Supplier doesn't exist";
  
//   // Clear previous checkboxes
//   checkboxContainer.innerHTML = "";

//   if (exists) {
//     const checkbox = document.createElement("input");
//     checkbox.type = "checkbox";
//     checkbox.name = "selectedSupplier";
//     checkbox.value = fournisseur;
    
//     const label = document.createElement("label");
//     label.textContent = fournisseur;

//     checkboxContainer.appendChild(checkbox);
//     checkboxContainer.appendChild(label);
//   }
// });
