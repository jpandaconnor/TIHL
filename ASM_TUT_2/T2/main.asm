%include "io.inc"

SECTION .data
msg     db      'Hello World!', 0Ah

section .text
global CMAIN
CMAIN:
    mov edx,13
    mov ecx,msg
    mov ebx,1
    mov eax,4
    int 80h
    
    mov ebx,0
    mov eax,1
    int 80h