#include <stdio.h>
#include <stdbool.h>

/**
 * 
 * Argc = amount of params
 * Argv = actual of params vectors
 * 
 */
int main(int argc, char *argv[]) {
    int noOfArguments = argc;
    char *arg1 = argv[0];
    char *arg2 = argv[1];

    printf("NO: %d\n", noOfArguments);
    printf("ARGGGG: %s\n", arg1);
    printf("ARGGGG2: %s\n", arg2);


    /* All your basic things here */
    char str[100];
    int i;
    float testFloat = 1.7e4;

    _Bool testBoolean = 1; // Used for C89
    bool nicerBoolean = false; // Used >= C99, required stdbool.h

    printf("Print something here please\n");
    
    // Read 2 inputs
    scanf("%d %s", &i, &str);

    // Print what has been entered
    printf("\nEntered %d %s\n", i, str);


    /* Enums */

    // Enums are just spicy integers
    enum colours { red, yellow, blue=160 };
    enum someMoreColours { cyan, magenta, anotherYellow };

    enum colours colour = yellow;

    /* Chars */

    // All the single...nvm

    char T = 'T';
    char BIGT = 'BIG'; // This errors as it's a multi character constant

    /* Precision */

    float aVeryPreciseFloat = 3.38312853873825389;

    printf("%f", aVeryPreciseFloat);

    return 0;
}