require ("mysqloo")

include("autorun/sh_learning_addon.lua")

print("Addon loading: STARTED")

local DATABASE_HOST = "127.0.0.1"
local DATABASE_PORT = 3306
local DATABASE_NAME = "gmod"
local DATABASE_USERNAME = "gmod"
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

-- Run migrations

-- Add players to the database
hook.Add(AKA_HOOK_PLAYERAUTH, "ALA_" .. AKA_HOOK_PLAYERAUTH, function(ply, steamid, uniqueid)
  local player = upsertPlayer(steamid, ply)
 
  incrementJoinCount(player)
end)

hook.Add(ALA_HOOK_PLAYERSAY, "ALA_PlayerSay", function(sender, text, teamChat)
  -- Check if player has bypass permissions
  -- if (sender:IsAdmin()) then return end

  if string.find(text, "fuck") then
    print("This player is a right cheeky get")
  end

  addPlayerChatLog(text)
end)


function upsertPlayer(steamid, ply)
  local player = getPlayer(steamid)

  local query = nil

  if player == nil then
    query = logDB:prepare("INSERT IGNORE INTO players (`steam_id`, `current_name`, `created_at`) VALUES(?, ?, ?)")

    query:setString(1, steamid)
    query:setString(2, currentName)
    query:setString(3, os.date("!%Y-%m-%d %T"))
  else 
    query = logDB:prepare("UPDATE players SET `current_name` = ? WHERE `id` = ?")

    print(player)
    print(dump(player))

    query:setString(1, ply:Name())
    query:setNumber(2, player["id"])
  end

  query:start()
  query:wait()

  if query:error() ~= "" then
    return nil
  end

  -- Refresh and get the new data
  player = getPlayer(steamid)

  return player
end

function incrementJoinCount(playerData)
  playerData["join_count"] = playerData["join_count"] + 1

  local query = logDB:prepare("UPDATE players SET `join_count` = ? WHERE `steam_id` = ?")

  query:setNumber(1, playerData["join_count"])
  query:setString(2, playerData["steam_id"])

  query:start()
  query:wait()

  if query:error() ~= "" then
    return nil
  end

  return playerData
end

function getPlayer(steamid)
  local query = logDB:prepare("SELECT * FROM players WHERE `steam_id` = ? LIMIT 1")

  query:setString(1, steamid)

  query:start()
  query:wait()

  if query:error() ~= "" then
    return nil
  end

  return query:getData()[1]
end


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
