// Pushing and popping

var myStack = [];

myStack.push(1);
myStack.push(2);
myStack.push(3);
console.log(myStack);

// Prints out 1,2 ,3

// Can now remove the variable from the end

console.log(myStack.pop());
console.log(myStack);

// Queues using shifting and unshifting

/*

shift and unshift methods are similar to push and pop, but they start from the
start of the list

*/

var que = [];
que.push(1);
que.push(2);
que.push(3);

console.log(que.shift()); // 1
console.log(que.shift()); // 2
console.log(que.shift()); // 3

// Unshift will add a variable at the beginning of the array

var ar = [1, 2, 3];
ar.unshift(0);
console.log(ar); // Will print 0, 1, 2, 3

// Splicing

var a = [0 ,1, 2, 3, 4, 5, 6, 7, 8, 9];
var splice = a.splice(3, 5); // Splits into new array

console.log(splice); // will print out 3,4,5,6,7
console.log(a);		// will print out 0,1,2,8,9