// Pure functions

import std.stdio;

int x 10;
immutable int y = 30;
const int* p;

pure int purefunction(int i, const char* q, immutable int* s) {
	debug writeln("in foo()");
	i = y;
	auto myvar = new int;
	return i;
}

void void main()
{
	writeln("Value returned from pure function: ", purefunction(x, null, null));
	writeln("Added value is: ", add(10, 20));
}

// Nothrow Functions

int add(int a, int b) nothrow {
	int result;

	try {
		writeln("Adding");
		result = a + b;
	} catch (Exception error) {

	}

	return result;
}