astring = "Hello world"
astring2 = "Hello world"

print("Single quotes are ' ' ")

print(len(astring)) # Prints out 12 because 'astring' is 12 characters long
print(astring.index("o")) # Prints out 4 because the first "o" is 4 chars away from the first characters

print(astring.count("l")) # Couts the amount of 'l's' in a sentence

print(astring[3:7]) # prints out anything between them two

# [3:7:2] = [start:stop:step]
print(astring[3:7:1])

# To reverse a string
print(astring[::-1])

print(astring.upper()) # These two should make sense
print(astring.lower())

print(astring.startswith("Hello")) #Returns boolean
print(astring.endswith("Hello")) #Returns boolean

allotherwords = astring.split(" ") # Self explanitory, goes into a list