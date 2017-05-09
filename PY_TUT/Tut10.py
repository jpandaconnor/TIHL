# Classes

class MyClass:
	variable = "Test"
	
	def function(self):
		print("This message is inside a class")
		

# Access Object Variables

thisobject = MyClass()
newobject = MyClass()

newobject.variable = "Test;

print(thisobject.variable)
print(newobject.variable)

# Access Object Functions

thisobject.function()