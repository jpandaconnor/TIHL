// Loops

var i;

for (i = 0; i < 3; i = i + 1)
{
    console.log(i);
}

var myArray = ["A", "B", "C"];
for (var i = 0; i < myArray.length; i++)
{
    console.log("The member of myArray in index " + i + " is " + myArray[i]);
}

// While statements

var i = 99;
while (i > 0)
{
    console.log(i + " bottles of beer on the wall");
    i -= 1;
}

// Break and continue statements

var i = 99;
while (true)
{
    console.log(i + " bottles of beer on the wall");
    i -= 1;
    if (i == 0)
    {
        break;
    }
}

for (var i = 0; i < 100; i++)
{
    // check that the number is even
    if (i % 2 == 0)
    {
         continue;
    }
    // if we got here, then i is odd.
    console.log(i + " is an odd number.");
}