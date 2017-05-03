/*

There are a range of datatypes in C

Integer (Can both be positive and negative) - char, int, short, long, long long

Unsigned integers (Can only be positive) - unsigned char, unsigned int,
	unsigned long, unsigned long long

Floating point numbers - float, double

And there's structures

Each one has different ranges
*/

// In C there's no boolean type. We can do this instead

#include <stdio.h>

#define BOOL char
#define FALSE 0
#define TRUE 1

int foo;
int bar = 1;

int a = 0, b = 1; // And so on here

a = b * 20;

print("%d", a); // Printer number here