// variables 

var validation = document.getElementById("bouton_envoi"); // bouton envoi
validation.addEventListener("click", control); // évenement de type clic et la fonction control

var reference = document.getElementById("reference");
var reference_manquante = document.getElementById("reference_manquante");
var reference_regex = /[\p{L}0-9 -]+/u;

var categorie = document.getElementById("categorie");
var categorie_manquante = document.getElementById("categorie_manquante");

var libelle = document.getElementById("libelle");
var libelle_manquant = document.getElementById("libelle_manquant");
var libelle_regex = /[\p{L}0-9 -]+/u;

var description = document.getElementById("description");
var description_manquante = document.getElementById("description_manquante");

var prix = document.getElementById("pix");
var prix_manquant = document.getElementById("prix_manquant");

var stock = document.getElementById("stock");
var stock_manquant = document.getElementById("quantite_manquant");

var couleur = document.getElementById("couleur");
var couleur_manquante = document.getElementById("couleur_manquante");
var couleur_regex = /[a-z]/;


function control(e) {
 
    if (reference.validity.valueMissing) {
        e.preventdefault(); 
        reference_manquante.textContent = "Veillez saisir une référence."
        reference_manquante.style.color = "red";

    } else if (reference_regex.test(reference.value) = false) {
        e.preventdefault();
        identifiant_manquant.textContent = "Veillez saisir un identifiant.";
        identifiant_manquant.style.color = "red";
    }

    if (categorie.validity.valueMissing) {
        e.preventdefault();
        categorie_manquante.textContent = "Veillez entrer une catégorie.";
        categorie_manquante.style.color = "red";
    }

    if (libelle.validity.valueMissing) {
        e.preventdefault();
        libelle_manquant.textContent = "Veillez saisir le nom du produit.";
        libelle_manquant.style.color = "red";
    } else if (libelle_regex.test(libell.value) = false) {
        e.preventdefault();
        libelle_manquant.textContent = "Veillez saisir le nom du produit.";
        libelle_manquant.style.color = "red";
    }

    if (description.validity.valueMissing) {
        e.preventdefault();
        description_manquante.textContent = "Veillez ajouter une description";
        description_manquante.style.color = "red";
    }

    if (prix.validity.valueMissing) {
        e.preventdefault();
        prix_manquant.textContent = "Veillez ajouter une description";
        prix_manquant.style.color = "red";
    }

    if (stock.validity.valueMissing) {
        e.preventdefault()
        quantite_manquante.textContent = "Veillez ajouter une description";
        quantite_manquante.style.color = "red";
    }

    if (couleur.validity.valueMissing) {
        e.preventdefault();
        couleur_manquante.textContent = "Veillez indiquer une couleur.";
        couleur_manquante.style.color = "red";

    } else if (couleur_regex.text(couleur.value) = false) {
        e.preventdefault();
        couleur_manquante.textContent = "Veillez indiquer une couleur.";
        couleur_manquante.style.color = "red";
    }

    if (date.validity.valueMissing) {
        e.preventdefault();
        date_manquante.textContent = "Veillez entrer une date valide.";
        date_manquante.style.color = "red";


    }
};


