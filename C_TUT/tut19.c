#include <stdio.h>
#include <stdlib.h>

// Function Pointers

// void (*pf)(int);

void someFunctionHere(int arg) {
	printf("Function being called here");
}

int main() {
	void (*pf)(int);
	pf = &someFunctionHere;
	(pf)(5);
}

// A more complex example

int compare(const void *left, const void *right) {
	return (*(int*) right - *(int*)left);
}

main() {
	int (*cmp) (const void*, const void*);
	cmp = &compare;
	
	int iarray[] = {1,2,3,4,5,6,7,8,9};
	qsort(iarray, sizeof(iarray) / sizeof(*iarray), sizeof(*iarray), cmp);
}