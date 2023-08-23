const photo = document.querySelector('#image');
const libelle = document.getElementById('libelle');
const prix = document.getElementById('prix');
const categorie = document.getElementById('categorieSelect');
const fournisseur = document.getElementById('fournisseur');
const quantite = document.getElementById('quantite');
const unite = document.getElementById('unite');
// Event
photo.addEventListener('change', onChangeImage);
addForm.addEventListener('submit', function (e) {
 e.preventDefault();
 //Champs requis
 checkRequired([libelle, prix, categorie]);
})


//Functions
function onChangeImage() {
 let f = new FileReader();
 f.readAsDataURL(photo.files[0]);
 f.onloadend = function (event) {
  const path = event.target.result;
  document.querySelector('#photo').setAttribute('src', path);
 }
}
function showSuccess(input) {
 const parent = input.parentElement;
 parent.className = 'col-md-6 position-relative formC  success'
}
function showError(input, errorMessage) {
 const parent = input.parentElement;
 parent.className = 'col-md-6 position-relative formC  error';
 const small = parent.querySelector('small');
 small.innerText = errorMessage;
}
function checkRequired(inputArray) {
 inputArray.forEach(input => {
  if (input.value.trim() === '') {
   const name = input.id.charAt(0).toUpperCase() + input.id.slice(1);
   showError(input, `${name} is required!!!`); // Add 'error' class
  } else {
   showSuccess(input);// Add 'success' class
  }
 })
}


var selectedOption = null;

function updateCheckbox() {
  var selectElement = document.getElementById("categorieSelect");
  var checkboxContainer = document.getElementById("checkboxContainer");
  var selectedValue = selectElement.value;

  // Remove previous checkbox
  checkboxContainer.innerHTML = "";

  if (selectedValue !== "") {
    selectedOption = selectedValue;
    var checkbox = document.createElement("input");
    checkbox.type = "checkbox";
    checkbox.checked = true; // Checked by default

    // Update selectedOption and re-render on checkbox click
    checkbox.addEventListener("change", function (event) {
      if (!checkbox.checked) {
        selectedOption = null;
        updateCheckbox();
      }
    });

    var checkboxLabel = document.createElement("label");
    checkboxLabel.textContent = selectElement.options[selectElement.selectedIndex].text;

    checkboxContainer.appendChild(checkbox);
    checkboxContainer.appendChild(checkboxLabel);
  }
}

// Attach the updateCheckbox function to the select element's change event
document.getElementById("categorieSelect").addEventListener("change", updateCheckbox);

// Initial call to set up the initial checkbox
updateCheckbox();