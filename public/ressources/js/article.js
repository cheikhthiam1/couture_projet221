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
         option.textContent = data.libelle;
         uniteSelect.appendChild(option);
     });
 } catch (error) {
     console.error("Error fetching data:", error);
 }
}
populateSelectWithData1();


