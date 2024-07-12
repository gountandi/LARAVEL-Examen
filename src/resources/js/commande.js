//variables
let produit=[];
let dataLigneCommande=[];
let tableau_lignes_commandes_element=document.getElementById("tableau_lignes_commandes");
let btn_ajouter_element=document.getElementById("btn_ajouter")
let nb_ligne=0;
const produit_element=document.getElementById("produit_id")
const quantite_element=document.getElementById("quantite_id")

console.log(tableau_lignes_commandes_element);

//functions
btn_ajouter_element.addEventListener("click",ajouterLigneCommande);

function getLine(id_produit,libelle,quantite){
    nb_ligne +=1;
    let id_ligne='ligne_commande_${nb_ligne}';
    return `<tr id="${id_ligne}" class="bg-gray-100"> 
                <td class="py-3 px-6">
                    <input hidden type="text" value="" name="produitd_id[]"sid="">

                    ${libelle}
                </td>
                <td class="py-3 px-6">
                    <input hidden type="text" value="" name="quantite_id[]"sid="">

                    ${quantite}
                </td>
                <td class="py-3 px-6">
                </td>
                <td class="py-3 px-6">
                    <a href="">
                        <button class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">Editer</button>
                    </a>
                    <a href="">
                        <button class="bg-red-600 hover:bg-red-500 text-white text-sm px-3 py-2 rounded-md" onclick="supprimerLicneCommande(${id_ligne})">Supprimer</button>
                    </a>
                </td>
            </tr> `
}

function ajouterLigneCommande(){
    let id=produit_element.value;
    let libelle=produit_element.options[produit_element.selectedIndex].innerText;
    let quantite=quantite_element.value;
    tableau_lignes_commandes_element.innerHTML+=getLine(id,libelle,quantite);
}

function supprimerLicneCommande(id_ligne_tableau){
    const ligne = document.getElementById(id_ligne_tableau);
    ligne.remove();
}

function editerLicneCommande(id_ligne_tableau){

}

function rafrechireTable(){

}

