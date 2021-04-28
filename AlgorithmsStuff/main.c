// Basic algorithms from https://www.programiz.com/dsa/algorithm

#include <stdio.h>

void adding2Integers();

int main() {
    printf("Hello, World!\n");
    adding2Integers();
    return 0;
}


/**
 * Algorithm 1
 */
void adding2Integers() {
    int num1 = 148;
    int num2 = 362;

    int sum = num1 + num2;

    char sum_string[50];
    sprintf(sum_string, "%d", sum);

    printf("Algorithm 1: %s\n", sum_string);
}

/**
 * Algorithm 2
 */
void largestOutOf3Integers() {

}