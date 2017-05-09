# Dictionaries

phonebook = {}
phonebook["Connor"] = 12321
phonebook["Patrick"] = 638121

print(phonebook)

# OR

phonebook2 = {
	"Connor" : 41253,
	"John": 39132,
}

print(phonebook2)

# Iterating

for name, number in phonebook.items():
	print("Phone number of %s is: %d" % (name, number))

if "Connor" not in phonebook:
	print("Connor is not in the phonebook")
	
# Remove a values

del phonebook["Connor"]
print(phonebook)

	# OR
	
phonebook.pop("Patrick")
print(phonebook)