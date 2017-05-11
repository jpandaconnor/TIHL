// Object Oriented JavaScript

// new Keyword will create a new object

function Person(firstname, lastname) {
	this.firstname = firstname;
	this.lastname = lastname;
	
	this.fullname = function() {
			return this.firstname + " " + this.lastname;
	}
}

var person = new MyPerson("Connor", "Brady");
console.log(person.fullname());

// We can also create another person but this style creates a new object there and then

var child = {
	firstname: "Connor",
	lastname: "Brady",
	
	fullname : function() {
		return this.firstname + " " + this.lastname;
	}
}