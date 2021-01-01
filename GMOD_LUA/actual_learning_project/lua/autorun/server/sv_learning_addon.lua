require ("mysqloo")

include("autorun/sh_learning_addon.lua")

print("Addon loading: STARTED")

local DATABASE_HOST = "127.0.0.1"
local DATABASE_PORT = 3306
local DATABASE_NAME = "gmod"
local DATABASE_USERNAME = "root"
local DATABASE_PASSWORD = "teamo14"

logDB = mysqloo.connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, DATABASE_PORT)

function logDB:onConnectionFailed( err )
  print( "Connection to database failed!" )
  print( "Error:", err )
end

function logDB:onConnected()
  print( "Database has connected!" )
end

logDB:connect()
logDB:wait()


hook.Add(ALA_HOOK_PLAYERSAY, "ALA_PlayerSay", function(sender, text, teamChat)
  -- Check if player has bypass permissions
  -- if (sender:IsAdmin()) then return end

  if string.find(text, "fuck") then
    print("This player is a right cheeky cunt")
  end

  addPlayerChatLog(text)
end)

function addPlayerChatLog(text)
  local preparedQuery = logDB:prepare("INSERT INTO logs_player_chat (`text`, `created_at`) VALUES(?, ?)")

  preparedQuery:setString(1, text)
  preparedQuery:setString(2, os.date("!%Y-%m-%d %T"))
  preparedQuery:start()

  function preparedQuery:onSuccess(data)
    print("Rows inserted successfully!")
  end
  
  function preparedQuery:onError(err)
    print("An error occured while executing the query: " .. err)
  end
end

print("Addon loading: FINISHED")
