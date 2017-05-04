#include <stdio.h>

typedef struct node {
	int val;
	struct node * next;
} node_t;


// Creating the first varialbe in the list
node_t * head = NULL;
head = malloc(sizeof(node_t));

if(head == NULL) {
	return 1;
}

head->val = 1;
// Adding a variable to the end of the list or just head->next = NULL;

head->next = malloc(sizeof(note_t));
head->next->val = 2;
head->next->next = NULL;

// Iterating over the list
void print_list(node_t * head) {
	node_t * current = head;

	while(current != NULL) {
		printf("%d\n", current->val);
		current = current->next;
	}
}

// Adding an item to the end of the list
void push_to_end_of_the_list(node_t * head, int val) {
	node_t * current = head;

	while(current->next != NULL) {
		current = current->next;
	}

	// Now creating the new variable
	current->next = malloc(sizeof(node_t));
	current->next->val = val;
	current->next->next = NULL;
}

// Adding an item to the start of the list
void push_to_start_of_the_list(node_t ** head, int val) {
	node_t * new_node;
	new_node = malloc(sizeof(node_t));

	new_node->val = val;
	new_node->nexty = *head;
	*head = new_node;
}

// Remove the first item - POP
int remove_start_of_list(node_t ** head) {
	int retval = -1;
	node_t * next_node = NULL;

	if(*head == NULL) {
		return -1;
	}

	next_node = (*head)->next;
	retval = (*head)->val;
	free(*head);
	*head = next_node;

	return retval;
}

// Removing the last item
int remove_last(node_t * head) {
	int retval = 0;

	if(head->next == NULL) {
		retval = head->val;
		free(head);
		return retval;
	}

	node_t * current = head;
	while(current->next->next != NULL) {
		curent = current->next;
	}

	retval = current->next->val;
	free(current->next);
	current->next = NULL;
	return retval;
}

// Removing item by index

int remove_by_index(node_t ** head, int n) {
	int i = 0;
	int retval = -1;
	node_t * current = *head;
	node_t * temp_node = NULL;

	if(n == 0) {
		return remove_start_of_list(head);
	}

	for(int i = 0; i < n-1; i++) {
		if(current->next == NULL) {
			return -1;
		}
		current = current->next;
	}

	temp_node = current->next;
	retval = temp_node->val;
	current->next = temp_node->next;
	free(temp_node);

	return retval;
}