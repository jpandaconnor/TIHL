// Function context

// Binding a method to an object

var person = {
	name: "Connor"
};

function printname() {
	console.log(this.name);
}

var boundPrintName = printname.bind(person);
boundPrintName();

printname.call(person);