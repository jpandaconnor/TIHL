# Conditions

name = "Connor"
age = 18

if name == "Connor" and age == 18: # Colon and there's no && just 'and'
	print("Something here")
	
# 'in' operator - Is used to check if an object exists within an iterable object container

if name in ["Connor", "Patrick"]:
	print("What I'm looking for is in here")
	
	# Don't forget about the stupid indention because code blocks....
	

# The 'is' operator - Checks for instance rather than value

x = [1, 2, 3]
y = [1, 2, 3]

print(x == y) # Returns True
print(x is y) # Returns False

# The 'not' opeartor. Just like != in whatever else you're used to

print(not False) # This will return true
print((not False) == (False)) # Prints false