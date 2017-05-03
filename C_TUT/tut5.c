#include <stdio.h>

// STRINGs

char * name = "Connor Brady";

char correct_name[] = "Connor Brady";

int age = 18;

printf("%s is %d years old.\n", name, age);
printf("%d\n", strlen(name));

char* newname = "Connor";

if(strncmp(newname, "Connor", 6) == 0) {
	printf("Hello, Connor!\n");
} else {
	printf("You are not Connor.\n");
}