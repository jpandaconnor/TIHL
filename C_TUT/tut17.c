#include <stdio.h>

// UNIONS

// UNIONS ARE STRUCTS BUT ALLOW MULTIPLE NAMES FOR THE SAME VARIABLE

union intParts {
	int theInt;
	char bytes[sizeof(int)];
}

union intParts parts;
parts.theInt = 5968145;

printf("The int is %i\nThe bytes are [%i, %i, %i, %i]\n",
parts.theInt, parts.bytes[0], parts.bytes[1], parts.bytes[2], parts.bytes[3]);

// vs

int theInt = parts.theInt;
printf("The int is %i\nThe bytes are [%i, %i, %i, %i]\n",
theInt, *((char*)&theInt+0), *((char*)&theInt+1), *((char*)&theInt+2), *((char*)&theInt+3));

// or with array syntax which can be a tiny bit nicer sometimes

printf("The int is %i\nThe bytes are [%i, %i, %i, %i]\n",
    theInt, ((char*)&theInt)[0], ((char*)&theInt)[1], ((char*)&theInt)[2], ((char*)&theInt)[3]);


// CREATING A TAGGED UNION

struct operator { // A LOT OF MEMORY
	int intNum;
	float floatNum;
	int type;
	double doubleNum;
}

// VS

typedef struct better_operator { // KIND OF LIKE NESTED CLASSES IN JAVA
	int type;
	union {
		int intNum;
		float floatNum;
		double doubleNum;
	} types;
}

better_operator.type = 0;
better_operator.types.intNum = 352;

/*

Another way of doing this

*/

union Coins {
	struct
	{
		int quater;
		int dime;
		int nickel;
		int penny;
	};
	int coins[4];
}

union Coins change;

printf("There are %i quarters, %i dimes, %i nickels, and %i pennies\n",
    change.quarter, change.dime, change.nickel, change.penny);