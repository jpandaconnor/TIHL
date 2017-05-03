#include <stdio.h>

int marks[10];
char vowels[] = {'A', 'E', 'I', 'O', 'U'};

char vowelss[][5] {
	{'A', 'E', 'I', 'O', 'U'},
	{'A', 'E', 'I', 'O', 'U'}
};

int i;
int j;

for(i = 0; i < 2; i++) {
	for(j = 0; j < 5; j++) {
		printf("Address of vowels[%d][%d]", i, j, &vowels[i][j]);
		// Remember & = Address location
	}
	printf("\n");
}