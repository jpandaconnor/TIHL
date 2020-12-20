include("autorun/sh_learning_addon.lua")

local someName = "A name" // String
local someAge = 19 // Some number

print(someName .. " " .. someAge .. " Using Addon " .. ALA_ADDON_NAME)

-- COMMENTS

addition(5, 2)

-- Boolean stuff down here
-- and OR or if you want


-- Loops
-- while true do end

-- for i = 1, 10 do end
local inventory = {}
inventory[1] = "weapon_crowbar"
inventory[2] = "weapon_smg1"

print(inventory) -- Prints address

-- To iterate through the keys anv values of the table
for key,value in pairs(inventory) do
  print(value)
end

-- Anothetr way by getting the max size
for i = 1, #inventory do
  print(inventory[i])
end
