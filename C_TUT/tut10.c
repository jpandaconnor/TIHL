#include <stdio.h>

// Structures, kind of like an Object in OOP but it isn't

int main() {

	return 0;
}

struct point {
	int x;
	int y;
}

struct point p;
p.x = 10;
p.y = 5;

void draw(int x, int y) {
	// Draw something here
}

void draw_struct(point p) {
	// Draw something here
}

// WITH OUT TYPEDEF, YOU WOULD HAVE TO USE THE STRUCT MODIFIER, NOW LET'S USE
// THE TYPEDEF KEYWORD

typedef struct {
	int x;
	int y;
} point2 ;

point2 point; // NO STRUCT KEYWORD HERE

typedef struct {
	char * brand;
	int model;
} vehicle;

vehicle mycar;
mycard.brand = "Ford";
mycar.model = 2017;