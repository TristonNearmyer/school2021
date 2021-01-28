// JavaScript Document
//for converting decimals to fractions
let gcd = function(a,b){
	if (b < 0.0000001) return a;
			
	return gcd(b, Math.floor(a % b));
	}		
		
//set cookie function
		
function setCookie(cName, cValue){
	let now = new Date();
	now.setTime(now.getTime() + 1 * 3600 * 1000);
	document.cookie = cName + "=" + cValue + "; expires=" + now.toUTCString();
}
		
//get cookie function
		
function getCookie(cName){
			
	let name = cName + "=";
	let ca = document.cookie.split(';');
	for (let i = 0; i < ca.length; i++){
		let c = ca[i];
		while (c.charAt(0) == ' '){
			c = c.substring(1);
			}
		if(c.indexOf(name) == 0){
			return c.substring(name.length, c.length);
			}
		}
			
	return "";
			
	}
		
// function to display chili recipe

function displayChiliRecipe(){

	localStorage.getItem("chiliRecipe");
	let recipeServing = chiliRecipe.serves;
	let recipePrepTime = chiliRecipe.preparationTime;
	let recipeCookTime = chiliRecipe.cookingTime;
	let servingSize = getCookie("serving quantity");
	
		if(servingSize == "half"){
			recipeServing = recipeServing / 2;
			recipePrepTime = recipePrepTime / 2;
			recipeCookTime = recipeCookTime / 2;
		}
			
		if(servingSize == "double"){
			recipeServing = recipeServing * 2;
			recipePrepTime = recipePrepTime * 2;
			recipeCookTime = recipeCookTime * 2;
		}
				
	document.querySelector(".image > img").setAttribute("src", chiliRecipe.image);
	document.querySelector(".recipe > h1").innerHTML = chiliRecipe.name;
	document.querySelector("#serves").innerHTML = recipeServing;
	document.querySelector("#prepTime").innerHTML = recipePrepTime + " " + chiliRecipe.preparationTimeUnit;
	document.querySelector("#cookTime").innerHTML = recipeCookTime + " " + chiliRecipe.cookingTimeUnit;
	document.querySelector("#ingredients").innerHTML = "";
	document.querySelector("#instructions").innerHTML = "";
	document.querySelector("#notes").innerHTML = "";
				

	for(let i=0; i < chiliRecipe.ingredient.length; i++){
		let node = document.createElement("li");                 // Create a <li> node
		let ingredientNumber = chiliRecipe.ingredientAmount[i];
					
			if(servingSize == "half"){
						
				ingredientNumber = chiliRecipe.ingredientAmount[i] / 2;
			}
		
			if (servingSize == "double"){

				ingredientNumber = chiliRecipe.ingredientAmount[i] * 2;

					}
					
			if(ingredientNumber % 1 != 0){
						
				let fraction = ingredientNumber;
				let len = fraction.toString().length - 2;

				let denominator = Math.pow(10, len);
				let numerator = fraction * denominator;

				let divisor = gcd(numerator,denominator);

				numerator /= divisor;
				denominator /= divisor;

				ingredientNumber = Math.floor(numerator) + '/' + Math.floor(denominator);
						
			}
					
			let textnode = document.createTextNode(ingredientNumber + " " + chiliRecipe.ingredientMeasurement[i] + " " + chiliRecipe.ingredient[i]);         // Create a text node
			node.appendChild(textnode);                              // Append the text to <li>
			document.querySelector("#ingredients").appendChild(node);     // Append <li> to <ul> with id="myList"
			}

	for(let i=0; i < chiliRecipe.instructions.length; i++){
		let node = document.createElement("li");                 // Create a <li> node
					
		let instructions = chiliRecipe.instructions[i];
					
			if (servingSize == "half"){
						
				let findNumber = /\d+/g;
						
				let number = instructions.match(findNumber);
						
				if(number != null){
							
					for(let x = 0; x < number.length; x++){
						let newNumber = number[x] / 2;
								
						instructions = instructions.replace(number[x], newNumber);
						}
					}
							
				}
					
			if (servingSize == "double"){
						
				let findNumber = /\d+/g;
						
				let number = instructions.match(findNumber);
						
				if(number != null){
							
					for(let x = 0; x < number.length; x++){
						let newNumber = number[x] * 2;
								
						instructions = instructions.replace(number[x], newNumber);
						}
					}
							
				}
					
			let textnode = document.createTextNode(instructions);         // Create a text node
			node.appendChild(textnode);                              // Append the text to <li>
			document.querySelector("#instructions").appendChild(node);     // Append <li> to <ul> with id="myList"
		}

		for(let i=0; i < chiliRecipe.notes.length; i++){
			let node = document.createElement("li");                 // Create a <li> node
					
			let notes = chiliRecipe.notes[i];
					
			if (servingSize == "half"){
						
				let findNumber = /\d+/g;
						
				let number = notes.match(findNumber);
						
				if(number != null){
							
					for(let x = 0; x < number.length; x++){
								
						let newNumber = number[x] / 2;
								
						notes = notes.replace(number[x], newNumber);
						}
					}
							
				}
					
			if (servingSize == "double"){
						
				let findNumber = /\d+/g;
						
				let number = notes.match(findNumber);
						
				if(number != null){
							
					for(let x = 0; x < number.length; x++){
								
						let newNumber = number[x] * 2;
								
						notes = notes.replace(number[x], newNumber);
						}
					}
							
				}
					
			let textnode = document.createTextNode(notes);         // Create a text node
			node.appendChild(textnode);                              // Append the text to <li>
			document.querySelector("#notes").appendChild(node);     // Append <li> to <ul> with id="myList"
		}
				
		setCookie("current recipe","chili");
				
	};
			
//for cornbread recipe
			
function displayCornbreadRecipe(){
	localStorage.getItem("cornBreadRecipe");
	let recipeServing = cornBreadRecipe.serves;
	let recipePrepTime = cornBreadRecipe.preparationTime;
	let recipeCookTime = cornBreadRecipe.cookingTime;
	let servingSize = getCookie("serving quantity");
				
		if(servingSize == "half"){
			recipeServing = recipeServing / 2;
			recipePrepTime = recipePrepTime / 2;
			recipeCookTime = recipeCookTime / 2;
		}
			
		if(servingSize == "double"){
			recipeServing = recipeServing * 2;
			recipePrepTime = recipePrepTime * 2;
			recipeCookTime = recipeCookTime * 2;
		}
			
	document.querySelector(".image > img").setAttribute("src", cornBreadRecipe.image);
	document.querySelector(".recipe > h1").innerHTML = cornBreadRecipe.name;
	document.querySelector("#serves").innerHTML = recipeServing;
	document.querySelector("#prepTime").innerHTML = recipePrepTime + " " + cornBreadRecipe.preparationTimeUnit;
	document.querySelector("#cookTime").innerHTML = recipeCookTime + " " + cornBreadRecipe.cookingTimeUnit;
	document.querySelector("#ingredients").innerHTML = "";
	document.querySelector("#instructions").innerHTML = "";
	document.querySelector("#notes").innerHTML = "";

	for(i=0; i < cornBreadRecipe.ingredient.length; i++){
		let node = document.createElement("li"); // Create a <li> node
		let ingredientNumber = cornBreadRecipe.ingredientAmount[i];
		let servingSize = getCookie("serving quantity");
					
		if(servingSize == "half"){
						
			ingredientNumber = cornBreadRecipe.ingredientAmount[i] / 2;
		}
		
		if (servingSize == "double"){

			ingredientNumber = cornBreadRecipe.ingredientAmount[i] * 2;

		}
					
		if(ingredientNumber % 1 != 0){
						
			let fraction = ingredientNumber;
			let len = fraction.toString().length - 2;

			let denominator = Math.pow(10, len);
			let numerator = fraction * denominator;

			let divisor = gcd(numerator,denominator);

			numerator /= divisor;
			denominator /= divisor;

			ingredientNumber = Math.floor(numerator) + '/' + Math.floor(denominator);
						
		}
				
					
		let textnode = document.createTextNode(ingredientNumber + " " + cornBreadRecipe.ingredientMeasurement[i] + " " + cornBreadRecipe.ingredient[i]);         // Create a text node
		node.appendChild(textnode);                              // Append the text to <li>
		document.querySelector("#ingredients").appendChild(node);     // Append <li> to <ul> with id="myList"
	}

	for(i=0; i < cornBreadRecipe.instructions.length; i++){
		let node = document.createElement("li");                 // Create a <li> node
					
		let instructions = cornBreadRecipe.instructions[i];
					
		if (servingSize == "half"){
						
			let findNumber = /\d+/g;
						
			let number = instructions.match(findNumber);
						
			if(number != null){
							
				for(x = 0; x < number.length; x++){
					newNumber = number[x] / 2;
								
					instructions = instructions.replace(number[x], newNumber);
					}
				}
							
			}
					
		if (servingSize == "double"){
						
			let findNumber = /\d+/g;
						
			let number = instructions.match(findNumber);
						
			if(number != null){
							
				for(x = 0; x < number.length; x++){
					newNumber = number[x] * 2;
								
					instructions = instructions.replace(number[x], newNumber);
					}
				}
							
			}					
					
		let textnode = document.createTextNode(instructions);         // Create a text node
		node.appendChild(textnode);                              // Append the text to <li>
		document.querySelector("#instructions").appendChild(node);     // Append <li> to <ul> with id="cornInstructions"
					
	}

	for(i=0; i < cornBreadRecipe.notes.length; i++){
		let node = document.createElement("li");                 // Create a <li> node
					
		let notes = cornBreadRecipe.notes[i];
					
		if (servingSize == "half"){
						
			let findNumber = /\d+/g;
						
			let number = notes.match(findNumber);
						
			if(number != null){
							
				for(x = 0; x < number.length; x++){
					console.log(number[x]);
								
					newNumber = number[x] / 2;
								
					notes = notes.replace(number[x], newNumber);
					}
				}
							
			}
					
		if (servingSize == "double"){
						
			let findNumber = /\d+/g;
						
			let number = notes.match(findNumber);
						
			if(number != null){
							
				for(x = 0; x < number.length; x++){
					console.log(number[x]);
								
					newNumber = number[x] * 2;
								
					notes = notes.replace(number[x], newNumber);
					}
				}
							
			}
					
		let textnode = document.createTextNode(notes);         // Create a text node
		node.appendChild(textnode);                              // Append the text to <li>
		document.querySelector("#notes").appendChild(node);     // Append <li> to <ul> with id="myList"
	}
				
	setCookie("current recipe","cornbread");
};

//for pecan pie recipe
			
function displayPecanPieRecipe(){
				
	localStorage.getItem("pecanPieRecipe");
	let recipeServing = pecanPieRecipe.serves;
	let recipePrepTime = pecanPieRecipe.preparationTime;
	let recipeCookTime = pecanPieRecipe.cookingTime;
	let servingSize = getCookie("serving quantity");
	
	if(servingSize == "half"){
		recipeServing = recipeServing / 2;
		recipePrepTime = recipePrepTime / 2;
		recipeCookTime = recipeCookTime / 2;
	}
			
	if(servingSize == "double"){
		recipeServing = recipeServing * 2;
		recipePrepTime = recipePrepTime * 2;
		recipeCookTime = recipeCookTime * 2;
	}
			
	document.querySelector(".image > img").setAttribute("src", pecanPieRecipe.image);
	document.querySelector(".recipe > h1").innerHTML = pecanPieRecipe.name;
	document.querySelector("#serves").innerHTML = recipeServing;
	document.querySelector("#prepTime").innerHTML = recipePrepTime + " " + pecanPieRecipe.preparationTimeUnit;
	document.querySelector("#cookTime").innerHTML = recipeCookTime + " " + pecanPieRecipe.cookingTimeUnit;
	document.querySelector("#ingredients").innerHTML = "";
	document.querySelector("#instructions").innerHTML = "";
	document.querySelector("#notes").innerHTML = "";

	for(i=0; i < pecanPieRecipe.ingredient.length; i++){
		let node = document.createElement("li");                 // Create a <li> node
		let ingredientNumber = pecanPieRecipe.ingredientAmount[i];
		let servingSize = getCookie("serving quantity");
					
		if(servingSize == "half"){
						
			ingredientNumber = pecanPieRecipe.ingredientAmount[i]/2;
		}
		
		if (servingSize == "double"){

			ingredientNumber = pecanPieRecipe.ingredientAmount[i] * 2;

		}
					
		if(ingredientNumber % 1 != 0){
						
			let fraction = ingredientNumber;
			let len = fraction.toString().length - 2;

			let denominator = Math.pow(10, len);
			let numerator = fraction * denominator;

			let divisor = gcd(numerator,denominator);

			numerator /= divisor;
			denominator /= divisor;

			ingredientNumber = Math.floor(numerator) + '/' + Math.floor(denominator);
						
		}
					
					
		let textnode = document.createTextNode(ingredientNumber + " " + pecanPieRecipe.ingredientMeasurement[i] + " " + pecanPieRecipe.ingredient[i]);         // Create a text node
		node.appendChild(textnode);                              // Append the text to <li>
		document.querySelector("#ingredients").appendChild(node);     // Append <li> to <ul> with id="myList"
	}

	for(i=0; i < pecanPieRecipe.instructions.length; i++){
		let node = document.createElement("li");                 // Create a <li> node
					
		let instructions = pecanPieRecipe.instructions[i];
					
		if (servingSize == "half"){
						
			let findNumber = /\d+/g;
						
			let number = instructions.match(findNumber);
						
			if(number != null){
							
				for(let x = 0; x < number.length; x++){
					let newNumber = number[x] / 2;
								
					instructions = instructions.replace(number[x], newNumber);
					}
				}
							
			}
					
		if (servingSize == "double"){
						
			let findNumber = /\d+/g;
						
			let number = instructions.match(findNumber);
						
			if(number != null){
							
				for(let x = 0; x < number.length; x++){
					let newNumber = number[x] * 2;
								
					instructions = instructions.replace(number[x], newNumber);
					}
				}							
			}
					
		let textnode = document.createTextNode(instructions);         // Create a text node
		node.appendChild(textnode);                              // Append the text to <li>
		document.querySelector("#instructions").appendChild(node);     // Append <li> to <ul> with id="myList"
	}

	for(i=0; i < pecanPieRecipe.notes.length; i++){
		let node = document.createElement("li");                 // Create a <li> node
					
		let notes = pecanPieRecipe.notes[i];
					
		if (servingSize == "half"){
						
			let findNumber = /\d+/g;
						
			let number = notes.match(findNumber);
						
			if(number != null){
							
				for(let x = 0; x < number.length; x++){
								
					let newNumber = number[x] / 2;
								
					notes = notes.replace(number[x], newNumber);
					}
				}				
			}
					
		if (servingSize == "double"){
						
			let findNumber = /\d+/g;
						
			let number = notes.match(findNumber);
						
			if(number != null){
							
				for(let x = 0; x < number.length; x++){
								
					let newNumber = number[x] * 2;
								
					notes = notes.replace(number[x], newNumber);
					}
				}
							
			}
					
		let textnode = document.createTextNode(notes);         // Create a text node
		node.appendChild(textnode);                              // Append the text to <li>
		document.querySelector("#notes").appendChild(node);     // Append <li> to <ul> with id="myList"
	}

	setCookie("current recipe","pecanPie");

};
			
//function for changing the serving size

function changeServingSize(){
				
	let servingQuantity = document.querySelector("#customServingQuantity").value;
				
	setCookie("serving quantity", servingQuantity);
				
	checkCookie();
				
}
			
			
//check cookie function
		
function checkCookie(){
				
	let currentRecipe = getCookie("current recipe");
	let servingSize = getCookie("serving quantity");
				
	if(getCookie("current recipe") == ""){

		displayChiliRecipe();

	}

	if (currentRecipe == "chili"){

		displayChiliRecipe();

	}

	if (currentRecipe == "cornbread"){

		displayCornbreadRecipe();

	}

	if (currentRecipe == "pecanPie"){

		displayPecanPieRecipe();

	}
	
	if (servingSize == "normal"){
		document.querySelector("#customServingQuantity").selectedIndex = "1";
	}
	
	if (servingSize == "double"){
		document.querySelector("#customServingQuantity").selectedIndex = "0";
	}
	
	if (servingSize == "half"){
		document.querySelector("#customServingQuantity").selectedIndex = "2";
	}
}

//arrays used for temporary lists of ingredients, instructions, and notes added by the user

let userIngredientAmountArray = [];
let userIngredientMeasurementArray = [];
let userIngredientArray = [];
let userInstructionsArray = [];
let userNotesArray = [];

//functions for displaying a temporary list of ingredients, instructions, and notes that the user has entered so far

function displayUserIngredient(){
	
	let numerator = document.querySelector("#userIngredientAmount").value;
	let denominator = document.querySelector("#userIngredientAmount2").value;
	let userIngredientMeasurement = document.querySelector("#userIngredientMeasurement").value;
	let userIngredient = document.querySelector("#userIngredient").value;
	
	let validIngredient = true;
	
	document.querySelector("#amountErrMsg").innerHTML = "";
	document.querySelector("#measurementErrMsg").innerHTML = "";
	document.querySelector("#ingredientErrMsg").innerHTML = "";
	
	if (numerator == "" && denominator == ""){
		document.querySelector("#amountErrMsg").innerHTML = "please enter an amount for your ingredient";
		validIngredient = false;
	}
	
	if (numerator == "" && denominator){
		document.querySelector("#amountErrMsg").innerHTML = "please enter your amount as a fraction e.g: 1/2 or 2/1 for whole numbers";
		validIngredient = false;
	}
	
	if (numerator && denominator == ""){
		denominator = 1;
	}
	
	if (numerator == 0 || denominator == 0){
		document.querySelector("#amountErrMsg").innerHTML = "0 cannot be used in ingredient amount";
	}
	
	if (userIngredientMeasurement == ""){
		document.querySelector("#measurementErrMsg").innerHTML = "please enter a measurement e.g: tbs, tsp, cups";
		validIngredient = false;
	}
	
	if (userIngredient == ""){
		document.querySelector("#ingredientErrMsg").innerHTML = "please enter an ingredient";
		validIngredient = false;
	}
	
	if (validIngredient == true){
	
	let ingredientNumber = numerator / denominator ;
	
	userIngredientAmountArray.push(ingredientNumber);
	userIngredientMeasurementArray.push(userIngredientMeasurement);
	userIngredientArray.push(userIngredient);
	
	let node = document.createElement("li");
	node.setAttribute("class", "tempIngredient");
	let textNode = document.createTextNode(ingredientNumber + " " + userIngredientMeasurement + " " + userIngredient);
	node.appendChild(textNode);
	document.querySelector("#tempIngredientList").appendChild(node);
	
	document.querySelector("#userIngredientAmount").value = "";
	document.querySelector("#userIngredientAmount2").value = "";
	document.querySelector("#userIngredientMeasurement").value = "";
	document.querySelector("#userIngredient").value = "";
	} else {
		return;
	}
	
	
};

function displayUserInstructions(){
	
	let userInstructions = document.querySelector("#userInstructions").value;
	
	document.querySelector("#instructionErrMsg").innerHTML = "";
	
	let validInstruction = true;
	
	if (userInstructions == ""){
		document.querySelector("#instructionErrMsg").innerHTML = "please enter an instruciton";
		validInstruction = false;
	}
	
	if (validInstruction == true){
		userInstructionsArray.push(userInstructions);

		let node = document.createElement("li");
		let textNode = document.createTextNode(userInstructions);
		node.appendChild(textNode);
		document.querySelector("#tempInstructionsList").appendChild(node);

		document.querySelector("#userInstructions").value = "";
	}else{return;}
};

function displayUserNotes(){
	
	let userNotes = document.querySelector("#userNotes").value;
	document.querySelector("#notesErrMsg").innerHTML = "";
	
	let validNote = true;
	
	if (userNotes == ""){
		document.querySelector("#notesErrMsg").innerHTML = "please enter a note";
		validNote = false;
	}

	if (validNote == true){
		userNotesArray.push(userNotes);

		let node = document.createElement("li");
		let textNode = document.createTextNode(userNotes);
		node.appendChild(textNode);
		document.querySelector("#tempNotesList").appendChild(node);

		document.querySelector("#userNotes").value = "";
	}else{return;}
};

//functions for removing an ingredient, instruction, or note from temporary list that the user has entered so far

function removeUserIngredient(){
	userIngredientAmountArray.pop();
	userIngredientMeasurementArray.pop();
	userIngredientArray.pop();
	
	document.querySelector("#tempIngredientList").lastChild.remove();
}

function removeUserInstructions(){
	userInstructionsArray.pop();
	document.querySelector("#tempInstructionsList").lastChild.remove();
}

function removeUserNotes(){
	userNotesArray.pop();
	document.querySelector("#tempNotesList").lastChild.remove();
}

//for displaying user added recipe

function displayUserRecipe(){
	
	localStorage.getItem("userRecipe");
	
	let recipeServing = userRecipe.serves;
	let recipePrepTime = userRecipe.preparationTime;
	let recipeCookTime = userRecipe.cookingTime;
	let servingSize = getCookie("serving quantity");
	
	if(servingSize == "half"){
		recipeServing = recipeServing / 2;
		recipePrepTime = recipePrepTime / 2;
		recipeCookTime = recipeCookTime / 2;
	}
			
	if(servingSize == "double"){
		recipeServing = recipeServing * 2;
		recipePrepTime = recipePrepTime * 2;
		recipeCookTime = recipeCookTime * 2;
	}

	document.querySelector(".recipe > h1").innerHTML = userRecipe.name;
	document.querySelector("#serves").innerHTML = recipeServing;
	document.querySelector("#prepTime").innerHTML = recipePrepTime + " " + userRecipe.preparationTimeUnit;
	document.querySelector("#cookTime").innerHTML = recipeCookTime + " " + userRecipe.cookingTimeUnit;
	document.querySelector("#ingredients").innerHTML = "";
	document.querySelector("#instructions").innerHTML = "";
	document.querySelector("#notes").innerHTML = "";

	for(i=0; i < userRecipe.ingredient.length; i++){
		let node = document.createElement("li");                 // Create a <li> node
		let ingredientNumber = userRecipe.ingredientAmount[i];
		let servingSize = getCookie("serving quantity");
					
		if(servingSize == "half"){
						
			ingredientNumber = userRecipe.ingredientAmount[i]/2;
		}
		
		if (servingSize == "double"){

			ingredientNumber = userRecipe.ingredientAmount[i] * 2;

		}
					
		if(ingredientNumber % 1 != 0){
						
			let fraction = ingredientNumber;
			let len = fraction.toString().length - 2;

			let denominator = Math.pow(10, len);
			let numerator = fraction * denominator;

			let divisor = gcd(numerator,denominator);

			numerator /= divisor;
			denominator /= divisor;

			ingredientNumber = Math.floor(numerator) + '/' + Math.floor(denominator);
						
		}
					
					
		let textnode = document.createTextNode(ingredientNumber + " " + userRecipe.ingredientMeasurement[i] + " " + userRecipe.ingredient[i]);         // Create a text node
		node.appendChild(textnode);                              // Append the text to <li>
		document.querySelector("#ingredients").appendChild(node);     // Append <li> to <ul> with id="myList"
	}

	for(i=0; i < userRecipe.instructions.length; i++){
		let node = document.createElement("li");                 // Create a <li> node
					
		let instructions = userRecipe.instructions[i];
					
		if (servingSize == "half"){
						
			let findNumber = /\d+/g;
						
			let number = instructions.match(findNumber);
						
			if(number != null){
							
				for(let x = 0; x < number.length; x++){
					let newNumber = number[x] / 2;
								
					instructions = instructions.replace(number[x], newNumber);
					}
				}
							
			}
					
		if (servingSize == "double"){
						
			let findNumber = /\d+/g;
						
			let number = instructions.match(findNumber);
						
			if(number != null){
							
				for(let x = 0; x < number.length; x++){
					let newNumber = number[x] * 2;
								
					instructions = instructions.replace(number[x], newNumber);
					}
				}							
			}
					
		let textnode = document.createTextNode(instructions);         // Create a text node
		node.appendChild(textnode);                              // Append the text to <li>
		document.querySelector("#instructions").appendChild(node);     // Append <li> to <ul> with id="myList"
	}

	for(i=0; i < userRecipe.notes.length; i++){
		let node = document.createElement("li");                 // Create a <li> node
					
		let notes = userRecipe.notes[i];
					
		if (servingSize == "half"){
						
			let findNumber = /\d+/g;
						
			let number = notes.match(findNumber);
						
			if(number != null){
							
				for(let x = 0; x < number.length; x++){
								
					let newNumber = number[x] / 2;
								
					notes = notes.replace(number[x], newNumber);
					}
				}				
			}
					
		if (servingSize == "double"){
						
			let findNumber = /\d+/g;
						
			let number = notes.match(findNumber);
						
			if(number != null){
							
				for(let x = 0; x < number.length; x++){
								
					let newNumber = number[x] * 2;
								
					notes = notes.replace(number[x], newNumber);
					}
				}
							
			}
					
		let textnode = document.createTextNode(notes);         // Create a text node
		node.appendChild(textnode);                              // Append the text to <li>
		document.querySelector("#notes").appendChild(node);     // Append <li> to <ul> with id="myList"
	}
};

//functions for opening and closing the mobile navigation menu

function animateNavigation(){
	let navigation = document.querySelector("nav");
	let pos = -100;
	document.querySelector("nav").style.display = "flex";
	let id = setInterval(animation, 1);
	function animation(){
		if (pos == 50){
			clearInterval(id);
		} else {
			pos++;
			navigation.style.top = pos + "px";
		}
	}
};

function closeNavigation(){
	let navigation = document.querySelector("nav");
	let pos = 50;
	let id = setInterval(closeAnimation, 1);
	function closeAnimation(){
		if (pos == -100){
			clearInterval(id);
			navigation.style.display = "none";
		} else{
			pos--;
			navigation.style.top = pos + "px";
		}
	}
}