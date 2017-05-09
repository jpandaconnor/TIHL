// Objects

var empObject = {};

var personObject = {
	firstname : "Connor",
	lastname : "Brady"
}

personObject.age = 23;
personObject["salary"] = 10000;

// Iteration

for(var member in personObject) {
	if(personObject.hasOwnProperty(member)) { // Check memeber belongs to the object
		console.log("the member " + member + " of personObject is " + personObject[member])
    }
}

