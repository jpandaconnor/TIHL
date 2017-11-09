%include "io.inc"

SECTION .data
msg     db      'Hello World!', 0Ah 

section .text
global CMAIN

CMAIN:
    ;write your code here
    mov     edx, 13   
    mov     ecx, msg
    mov     ebx, 1
    mov     eax, 4
    int     80h