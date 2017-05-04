#include <stdio.h>

// DYNAMIC ALLOCATION

typedef struct {
	char * name;
	int age;
}, person;

person * myperson = malloc(sizeof(person)); // Dynamically allocation
myperson->name = "Connor"; // Editing the member
myperson->age = 18;

free(myperson);		// Freeing the dynamically allocated struct