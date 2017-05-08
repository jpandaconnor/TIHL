# Loops

primes = [2, 3, 5, 7]
for prime in primes:
	print(prime)
	
# Something fanicer using range

for x in range(5):
	print(x)

for x in range(3, 6):
	print(x) # Prints 3, 4, 5
	
for x in range(3, 8, 2): #Start, end, step
	print(x)
	
# While loops, easy

count = 0
while count < 5:
	print(count)
	count += 1
	
	# And continue and break stuff still applies
	
# Now we have else clause for loops, very new

for i in range(1, 10):
	if(i % 5 == 0):
		break
	print(i)
else:
	print("This isn't printed because it broke and didn't fail")