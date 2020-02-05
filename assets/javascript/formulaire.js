var validation = document.getElementById("bouton_envoi"); // bouton envoi
    
var nom = document.getElementById("nom"); // id du nom
var nom_m = document.getElementById("nom_manquant");
var nom_regex = /^[a-zA-ZéèîïÊËÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÊËÎÏ][a-zéèêàçîï])?/; // accepte les majuscules, minuscules, lettres accentués et prénom composé


var prenom = document.getElementById("prenom"); // id du prenom
var prenom_m = document.getElementById("prenom_manquant"); // id <span> de prenom
var prenom_regex = /^[a-zA-ZéèîïÊËÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÊËÎÏ][a-zéèêàçîï])?/; // accepte les majuscules, minuscules, lettres accentués et prénom composé

var date = document.getElementById("date"); // id de la date
var date_m = document.getElementById("date_manquante"); // id du <span> de la date
var date_regex = /^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/; // date au format dd/mm/yy

var pscode = document.getElementById("pscode"); // id du code postal
var pscode_m = document.getElementById("pscode_manquant"); // id <span> du code postal
var pscode_regex = /^(?:[0-8]\d|9[0-8])\d{3}$/; // code postal en france metropolitaine, corse non comprise

var adresse = document.getElementById("adresse"); // id de l'adresse
var adresse_m = document.getElementById("adresse_manquante"); // id de la <span> adresse
var adresse_regex = /^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/ // caractères alphabétique, numériques autorisées

var ville = document.getElementById("ville"); // id de la ville
var ville_m = document.getElementById("ville_manquante"); // id du <span> de la ville
var ville_regex = /^[a-zA-ZéèîïÊËÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÊËÎÏ][a-zéèêàçîï])?/ // le nom doit commencer par une lettre suivit de une ou plusieurs lettres pouvant être précédée(s) par un caractère spécial

var couriel = document.getElementById("couriel"); // id de l'adresse mail
var couriel_m = document.getElementById("couriel_manquant"); // id du <span> de l'adresse mail
var couriel_regex = /^[_a-z0-9-]+(.[_a-z0-9-]+)@[a-z0-9-]+(.[a-z0-9-]+)(.[a-z]{2,3})$/; // format n-p@domaine.fr

var votre_question = document.getElementById("votre_question"); // id de votre quesion
var votre_question_m = document.getElementById("votre_question_manquante"); // id de votre question_manquante

validation.addEventListener("click", control); // évenement de type clic et la fonction control

function control(e){
    if (nom.validity.valueMissing) { // si aucun nom est rentré
    e.preventDefault(); // annul l'envoie du formulaire
    nom_m.textContent = "Nom manquant."; // affiche un message en cas que le nom n'est pas renseigner
    nom_m.style.color = "red"; // affiche le message en rouge

    } else if (nom_regex.test(nom.value) == false) { // si la valeur renseiger ne correspond pas
        e.preventDefault(); // annul l'envoie du formulaire
        nom_m.textContent = "Format incorrect, caractères alphabétiques et ou accentués uniquement autorisés."; // affiche un message en cas que le prenom ne correspond pas
        nom_m.style.color = "red";  // affiche le message en rouge

    }

    if (prenom.validity.valueMissing) { // si aucun prénom est rentré
        e.preventDefault(); // annul l'envoie du formulaire
        prenom_m.textContent = "Prenom manquant."; // affiche un message en cas que le prenom n'est pas renseigner
        prenom_m.style.color = "red"; // affiche le message en rouge

    }else if (prenom_regex.test(prenom.value)== false){ // si la valeur renseigner ne correspond pas
        e.preventDefault();
        prenom_m.textContent = "Format incorrect, caractères alphabétiques et ou accentués uniquement autorisés."; // afiche un message en cas que le prenom ne correspond pas
        prenom_m.style.color = "red";  // affiche le message en rouge
    }

    if (date.validity.valueMissing) { // si la date de naissance n'est pas renseignée
        e.preventDefault(); // annul l'envoi du formulaire
        date_m.textContent = "Date de naissance manquante."; // affiche un message en cas de date de naissance non renseigner
        date_m.style.color = "red"; // affiche le message en rouge

    }else if (date_regex.test(date.value) == false) { // si la date ne naissance ne correspond pas
        e.preventDefault() // annul l'envoi du formulaire
        date_m.textContent = "Format incorrecte, format autorisé jj/mm/aaaa."; // affiche un message en cas de format de date ne correspond pas
        date_m.style.color = "red"; // affiche le message en rouge
    }

    if (pscode.validity.valueMissing) { // si le code postal n'est pas renseigner
        e.preventDefault(); // annul l'envoi du formulaire
        pscode_m.textContent = "Code postal manquant."; // affiche un message en cas de code postal non renseigner
        pscode_m.style.color = "red"; // affiche le message en rouge

    }else if (pscode_regex.test(pscode.value) == false) {// si le code postal ne correspond pas
        e.preventDefault(); // annul l'envoi du formulaire
        pscode_m.textContent = "Code postal incorrect."; // affiche un message si le code postal ne correspond pas
        pscode_m.style.color = "red"; // affiche le message en rouge
    }

    if (adresse.validity.valueMissing) { // si l'adresse n'est pas renseigner
        e.preventDefault(); // annul l'envoi du formulaire
        adresse_m.textContent = "Adresse manquante."; // affiche un message en cas d'adresse non renseigner
        adresse_m.style.color = "red"; // affiche le message en rouge

    }else if (adresse_regex.test(adresse.value) == false) { // si l'adresse ne correspond pas
        e.preventDefault(); // annul l'envoi du formulaire
        adresse_m.textContent = "Adresse incorrecte, veillez entrer une adresse valide." // affiche un message si l'adresse ne correspond pas
        adresse_m.style.color = "red"; // affiche le message en rouge
    }

    if (ville.validity.valueMissing) { // si la ville n'est pas renseigner
        e.preventDefault(); // annul l'envoi du formulaire
        ville_m.textContent = "Ville manquante."; // affiche un message si la ville n'est pas renseigner
        ville_m.style.color = "red";  // affiche le message en rouge

    }else if (ville_regex.test(ville.value) == false) { // si la ville ne correspond pas
        e.preventDefault(); // annul l'envoi du formulaire
        ville_m.textContent = "Ville incorrecte."; // affiche un message si la ville ne correspond pas
        ville_m.style.color = "red"; // affiche le message en rouge
    }

    if (couriel.validity.valueMissing) { // si l'adresse mail n'est pas renseigner
        e.preventDefault(); // annul l'envoi du formulaire
        couriel_m.textContent = "Adresse mail manquante." // affiche un message si l'adresse mail n'est pas reseigner
        couriel_m.style.color = "red";
    }else if (couriel_regex.test(couriel.value) == false) { // si l'adresse mail ne correspond pas
        e.preventDefault(); // annul l'envoi du formulaire
        couriel_m.textContent = "Adresse mail incorrecte, veillez entrer une adresse mail valide."; // affiche un message si l'adresse mail ne correspond pas
        couriel_m.style.color = "red"; // affiche le message en rouge
    }

    else if (votre_question == " ") { // si aucune information n'a était rentré
        e.preventDefault(); // annul l'envoi du formulaire
        votre_question_m.textContent = "Veillez indiquez votre problème merci." // affiche un message si aucune question n'a était inscrite
        votre_question_m.style.color = "red"// affiche le message en rouge;

    }
    else {

    }
};