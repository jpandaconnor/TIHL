#include <stdio.h>

int main() {
    
    char str[100];
    int i;

    printf("Print something here please\n");
    
    // Read 2 inputs
    scanf("%d %s", &i, &str);

    // Print what has been entered
    printf("\nEntered %d %s\n", i, str);

    return 0;
}