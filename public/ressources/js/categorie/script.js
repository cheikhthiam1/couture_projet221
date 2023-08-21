import { Api } from "./../core/api.js";
import { WEB_URL } from "./../core/bootstrap.js";
const fournisseur = document.getElementById("fournisseur");

document.addEventListener('DOMContentLoaded', () => {
  const addCategorie = document.getElementById('categorie');
  const libelle = document.getElementById('libelle');
  addCategorie.onsubmit = async (e) => {
    e.preventDefault();
    const value = libelle.value.trim();
    console.log(value);
    try {
      // Your API call and form reset logic here
      await Api.postData(`${WEB_URL}/categorieadd`, { libelle: value });
    addCategorie.reset();
    } catch (error) {
      console.error('An error occurred:', error);
    }
  };
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
