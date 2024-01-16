//definir les variables
var myInput = document.getElementById("pass");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

//lorsque l'utilisateur clique sur le champ de mot de passe, affichez la boîte de dialogue
myInput.onfocus = function () {
	document.getElementById("message").style.display = "block";
};

//lorsque l'utilisateur clique en dehors du champ de mot de passe, masquez la boîte de dialogue
myInput.onblur = function () {
	document.getElementById("message").style.display = "none";
};

//lorsque l'utilisateur commence à taper quelque chose à l'intérieur du champ de mot de passe
myInput.onkeyup = function () {
	//=====================================================================================================
	//valider les lettres minuscules
	var lowerCaseLetters = /[a-z]/g;
	if (myInput.value.match(lowerCaseLetters)) {
		//si le  mdp contient une lettre minuscule enleve la classe invalid et ajoute la classe valid
		letter.classList.remove("invalid");
		letter.classList.add("valid");
	} else {
		//si non enleve la classe valid et ajoute la classe invalid "invalid"
		letter.classList.remove("valid");
		letter.classList.add("invalid");
	}
	//=====================================================================================================
	//valider les lettres majuscule
	var upperCaseLetters = /[A-Z]/g;
	if (myInput.value.match(upperCaseLetters)) {
		//si le  mdp contient une lettre majuscule enleve la classe invalid et ajoute la classe valid
		capital.classList.remove("invalid");
		capital.classList.add("valid");
	} else {
		//si non enleve la classe valid et ajoute la classe invalid "invalid"
		capital.classList.remove("valid");
		capital.classList.add("invalid");
	}
	//=====================================================================================================
	//valider les nombres
	var numbers = /[0-9]/g;
	if (myInput.value.match(numbers)) {
		//si le  mdp contient un chiffre enleve la classe invalid et ajoute la classe valid
		number.classList.remove("invalid");
		number.classList.add("valid");
	} else {
		//si non enleve la classe valid et ajoute la classe invalid "invalid"
		number.classList.remove("valid");
		number.classList.add("invalid");
	}
	//=====================================================================================================
	//valider le nb de caractères
	var numbers = /[0-9]/g;
	if (myInput.value.length >= 8) {
		//si le  mdp contient 8 caractères enleve la classe invalid et ajoute la classe valid
		length.classList.remove("invalid");
		length.classList.add("valid");
	} else {
		//si non enleve la classe valid et ajoute la classe invalid "invalid"
		length.classList.remove("valid");
		length.classList.add("invalid");
	}
};
