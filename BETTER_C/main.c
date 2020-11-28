#include <stdio.h>
#include <stdbool.h>

int main() {
    
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

    return 0;
}