// Call backs

/*

Callbacks are a part of asynchronous programming, enables callback when
code finishes a long task

*/

var callback = function() {
	console.log("Done");
}

setTimeout(callback, 5000);

// Or define callbacks as anonymous functions

setTimeout(function() {
	console.log("Done");
}, 5000);