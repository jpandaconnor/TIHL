#include <stdio.h>

void adding2Integers();

int main() {
    printf("Hello, World!\n");
    adding2Integers();
    return 0;
}

/**
 * Algorithm 1
 *
 * Step 1: Start
 * Step 2: Declare variables num1, num2 and sum.
 * Step 3: Read values num1 and num2.
 * Step 4: Add num1 and num2 and assign the result to sum - sum←num1+num2
 * Step 5: Display sum
 * Step 6: Stop
 */
void adding2Integers() {
    int num1 = 148;
    int num2 = 362;

    int sum = num1 + num2;

    char sum_string[50];
    sprintf(sum_string, "%d", sum);

    printf("Algorithm 1: %s\n", sum_string);
}
