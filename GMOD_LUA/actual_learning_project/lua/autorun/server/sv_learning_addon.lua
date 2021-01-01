include("autorun/sh_learning_addon.lua")

print("Addon loading: STARTED")

local DATABASE_HOST = "localhost"
local DATABASE_PORT = 3306
local DATABASE_NAME = "gmod"
local DATABASE_USERNAME = "root"
local DATABASE_PASSWORD = "teamo14"




hook.Add(ALA_HOOK_PLAYERSAY, "ALA_PlayerSay", function(sender, text, teamChat)
  -- Check if player has bypass permissions
  -- if (sender:IsAdmin()) then return end

  if string.find(text, "fuck") then
    print("This player is a right cheeky cunt")
  end
end)

print("Addon loading: FINISHED")
