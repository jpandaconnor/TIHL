#include <stdio.h>

// ARRAYS AND POINTERS

char c = 'A';
char *pc = &c;

char vowels[] = {'A', 'E', 'I', 'O', 'U'};
char *pvowels = &vowels;
int i;

// Print the addresses
for (i = 0; i < 5; i++) {
    printf("&vowels[%d]: %u, pvowels + %d: %u, vowels + %d: %u\n", i, &vowels[i], i, pvowels + i, i, vowels + i);
}

// Print the values
for (i = 0; i < 5; i++) {
    printf("vowels[%d]: %c, *(pvowels + %d): %c, *(vowels + %d): %c\n", i, vowels[i], i, *(pvowels + i), i, *(vowels + i));
}

// Go back over this: http://www.learn-c.org/en/Arrays_and_Pointers