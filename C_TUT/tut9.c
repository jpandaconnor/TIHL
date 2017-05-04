#include <stdio.h>

/*

Point holds the memory address
\0 = Null terminator

*/

char * name = "Connor";

// Dereferencing - refers to there the pointer is pointing as instead
// of the address

int a = 1;
int * pointer_to_a = &a;

printf("The value of A is %d\n", a);
printf("The value of A is also %d\n", *pointer_to_a);

// Changing the varialbe of A and pointer_of_a

a += 1;
*pointer_to_a += 1;

printf("The value of A is now%d\n", a);