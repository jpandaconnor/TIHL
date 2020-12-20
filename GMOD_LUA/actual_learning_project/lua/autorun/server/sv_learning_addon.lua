include("autorun/sh_learning_addon.lua")

local someName = "A name" // String
local someAge = 19 // Some number

print(someName .. " " .. someAge .. " Using Addon " .. ALA_ADDON_NAME)

local function addition(num1, num2)
  print("Addition called with value " .. (num1 + num2))
end

addition(5, 2)
