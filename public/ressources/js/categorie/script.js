import { Api } from "./../core/api.js";
import { WEB_URL } from "./../core/bootstrap.js";
const fournisseur = document.getElementById("fournisseur");


  const addCategorie = document.getElementById('categorie');
  const categorieSelect = document.getElementById('categorieSelect');
  const libelle1 = document.getElementById('libelle1');
  const unitedefaut = document.getElementById('unitedefaut');
  const conversion = document.getElementById('conversion');

  document.getElementById('submitBtn').addEventListener('click', async (e) => {
    e.preventDefault();
    const value = libelle1.value;
    const value1 = unitedefaut.value.trim();
    const value2 = conversion.value.trim();
  
    try {
      // Your API call and form reset logic here
      await Api.postData(`${WEB_URL}/categorieadd`, { libelle1: value, unitedefaut: value1, conversion: value2 });
  
      const newOption = document.createElement('option');
      newOption.value = value;
      newOption.textContent = value;
      categorieSelect.appendChild(newOption);
  
      categorieSelect.value = value;
      uniteSelect.removeAttribute('disabled');
      addCategorie.reset();
  
      // Close the Bootstrap modal using its method
      const modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
      modal.hide();
  
      // Redirect the user after a short delay
      setTimeout(() => {
        window.location.href = 'http://localhost:8000/article_add';
      }, 500); // Adjust the delay as needed
    } catch (error) {
      console.error('An error occurred:', error);
    }
  });
   


addFournisseur.onsubmit = async (e) => {
  e.preventDefault();
  const value1 = prenom.value;
  const value2 = nom.value;
// console.log(value);
  try {
    await Api.postData(`${WEB_URL}/fournisseur_add`, { prenom: value1,nom: value2 });
    
    // Reset the form
    addFournisseur.reset();
  } catch (error) {
    console.error('An error occurred:', error);
  }
};

addForm.onsubmit = async (e) => {
  e.preventDefault();
  const value1 = libelle.value;
  const value2 = quantite.value;
  const value3 = prix.value;
  const value4 = categorieSelect.value;
  const value5 = fournisseur.value;
  try {
    await Api.postData(`${WEB_URL}/article_add`, { libelle: value1,quantite: value2,prix: value3,categorieSelect: value4,fournisseur: value5});
    // Reset the form
    addForm.reset();
  } catch (error) {
    console.error('An error occurred:', error);
  }
};
