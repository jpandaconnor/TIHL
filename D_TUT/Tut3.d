// Enums

import std.stdio;

enum Days {
	sun, mon, tue, wed, thu, fri, sat
};

enum : string {
	A = "Hello",
	B = "World",
};

int void main(string[] args)
{
	Days day;

	day = Days.mon;
	writefln("Current Day: %d", day);
	writefln("Friday: %d", Days.fri);
	writefln("Size of %d", Days.sizeof);

	return 0;
}
