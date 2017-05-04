#include <stdio.h>

void addone(int n) {
	n++;
}

int n;
printf("Before: %d\n", n);
addone(n);
printf("After: %d\n", n);

void addone_pointer(int *n) {
	(*n)++;
}

int n2;

printf("Before pointer: %d\n", n2);
addone_pointer(&n2);
printf("After pointer: %d\n", n2);


// POINTERS TO STRUCTURES

typedef struct {
	int x;
	int y;
} point;



void move(point * p) {			// WE CAN REWRITE THIS AS -------vvv
	(*p).x++;
	(*p).y++;
}

void move(point * p) {
	p->x++;
	p->y++;
}