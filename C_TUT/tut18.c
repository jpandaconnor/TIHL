#include <stdio.h>

// Pointer Arithmetic

// Incrementing a pointer with ++

void increment() {
	int intarray[5] = {10, 20, 30, 40, 50};

	int *intpointer = &intarray[3];
	intpointer++;	
}

void decrement() {
	int intarray[5] = {10, 20, 30, 40, 50};

	int *intpointer = &intarray[4];
	intpointer--;	
}

void plusequals() {
	int intarray[5] = {10, 20, 30, 40, 50};

	int *intpointer = &intarray[4];
	intpointer += 2;	
}

void minusequals() {
	int intarray[5] = {10, 20, 30, 40, 50};

	int *intpointer = &intarray[4];
	intpointer -= 2;	
}