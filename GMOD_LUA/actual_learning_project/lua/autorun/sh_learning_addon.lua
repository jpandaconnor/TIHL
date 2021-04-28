ALA_ADDON_NAME = "A Learning Addon"

ALA_HOOK_PLAYERSAY = "PlayerSay"
ALA_HOOK_HUDPAINT = "HUDPaint"
AKA_HOOK_PLAYERAUTH = "PlayerAuthed"

local dontError = "dontError"

function addition(num1, num2)
  print("Addition called with value " .. (num1 + num2))
end

-- Loops break/continue

local someData = {
  "DB1",
  "DB2",
  "DB3"
}

for k,v in ipairs(someData) do
  print(v)
end
