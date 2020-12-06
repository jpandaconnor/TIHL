local PrintMore
function ENT:Initialize() -- This is a function that is called when the printer is created.
        self:SetModel("models/props_c17/consolebox01a.mdl") -- Here we set the model. This is a model you can find in the Q menu ingame.
        self:PhysicsInit(SOLID_VPHYSICS) -- We want the money printer to be affected by physics, such as gravity. This is automatically taken care of by the engine when we set this.
        self:SetMoveType(MOVETYPE_VPHYSICS) -- This defines how the money printer reacts to movement.
        self:SetSolid(SOLID_VPHYSICS) -- Here we set whether or not the printer is solid or not.
        local phys = self:GetPhysicsObject() -- PhysicsInit above gave the printer a physic object, which we retrieve here.
        if phys:IsValid() then phys:Wake() end -- We check that everything went according to plan, then we wake the physic object up (it'll fly midair unless we do this).
        self.sparking = false -- This is a variable we'll be using later.
        self.damage = 100 -- This is the health of the printer.
        self.IsMoneyPrinter = true
        timer.Simple(27, PrintMore, self) -- We start the first print cycle. Notice that it's set to 27 seconds.
end

function ENT:OnTakeDamage(dmg) -- This function is called when the printer takes damage.
        if self.burningup then return end -- If the printer is already burning, we "return", meaning we interrupt the script, thus disallowing damage to the printer.

        self.damage = (self.damage or 100) - dmg:GetDamage() -- Here we use the variable `.damage` that was set in Initialize, then apply the received damage.
        if self.damage <= 0 then -- if the health of our printer is equal to or less than 0...
                local rnd = math.random(1, 10) -- pick a random number between 1 and 10, and store it in the "rnd" variable
                if rnd < 3 then -- if the random number we picked is less than 3 then we...
                        self:BurstIntoFlames() -- put it on fire!
                else -- but if the number was 3 or higher then we..
                        self:Destruct() -- explode it
                        self:Remove() -- and remove it!
                end
        end
end

function ENT:Destruct() -- This is a custom function that is called when we want to blow the printer up.
        -- We'll create a custom effect of an explosion.
        local vPoint = self:GetPos() -- First, we get the position of our printer, and store that in vPoint for later use
        local effectdata = EffectData() -- Then we create the effect...
        effectdata:SetStart(vPoint) -- set its position using vPoint
        effectdata:SetOrigin(vPoint) -- this is also setting its position
        effectdata:SetScale(1) -- this is how big the explosion will appear
        util.Effect("Explosion", effectdata) -- We've finished defining our explosion, time to put it into action. util.Effect(effect-type, settings)
        Notify(self.dt.owning_ent, 1, 4, "Your money printer has exploded!") -- we give the player a heads up, that their printer has blown up.
end

function ENT:BurstIntoFlames() -- This is a custom function that is called when we want to put the printer on fire.
        Notify(self.dt.owning_ent, 1, 4, "Your money printer is overheating!") -- we start off by giving the player a heads up that their printer is on fire!
        self.burningup = true -- We prevent the printer from taking more damage, so it can burn in peace (see ENT:OnTakeDamage())
        local burntime = math.random(8, 18) -- we pick a random number between 8 and 18, which will be how long it will burn
        self:Ignite(burntime, 0) -- we put the printer on fire..
        timer.Simple(burntime, self.Fireball, self) -- .. and after that duration we call the ENT:Fireball() function, which will blow the printer up.
end

function ENT:Fireball() -- This is a custom function that is called after the printer has been burning for a while
        if not self:IsOnFire() then return end -- If the printer isn't on fire, this must have been called by a mistake. Abort abort!
        local dist = math.random(20, 280) -- Explosion radius.
        self:Destruct() -- We call the ENT:Destruct() function to create the explosion effect.
        for k, v in pairs(ents.FindInSphere(self:GetPos(), dist)) do -- We search the surrounding vicinity of the printer, and for each item we find we..
                if not v:IsPlayer() and not v.IsMoneyPrinter then v:Ignite(math.random(5, 22), 0) end -- check that the item is not a player or another printer, then we put it on fire for a random duration between 5 and 22 seconds.
        end
        self:Remove() -- All done! The printer has gone KABOOM and ignited other random things in the area. Now we can remove the printer.
end

PrintMore = function(ent) -- This is an alternative version of creating a function. Don't be alarmed, it works exactly the same.
        if ValidEntity(ent) then -- if the printer still exists..
                ent.sparking = true -- we make the printer spark, like it does when its about to print money
                timer.Simple(3, ent.CreateMoneybag, ent) -- after 3 seconds it will attempt to create money. Notice: 27 seconds first time + 3 seconds - 30 seconds from spawn. Always.
        end
end

function ENT:CreateMoneybag() -- This is a custom function that we call when we want the printer to attempt printing money
        if not ValidEntity(self) then return end -- Printer no longer exist! Abort abort!
        if self:IsOnFire() then return end -- Printer is burning! Abort abort!
        local MoneyPos = self:GetPos() -- All is well, we proceed to figure out where the money should be spawned. We use the location of the printer.

        if math.random(1, 22) == 3 then self:BurstIntoFlames() end -- We make a random number between 1, and 22. And if that number is 3 exactly, we put the printer on fire! >:3

        local amount = GetConVarNumber("mprintamount") -- We check the server CVAR for how much money we should print
        if amount == 0 then -- if server cvar is somehow set to 0 (probably broken), we default to 250
                amount = 250
        end

        DarkRPCreateMoneyBag(Vector(MoneyPos.x + 15, MoneyPos.y, MoneyPos.z + 15), amount) -- We actually create the money.
        self.sparking = false -- we are done creating money. No need to spark anymore.
        timer.Simple(math.random(100, 350), PrintMore, self) -- We start the next print cycle, between 100-350 seconds from now.
end

function ENT:Think() -- This is an engine function, which is called every "frame" or FPS that the server is alive on (i.e extremely often)
        if not self.sparking then return end -- if we aren't busy printing money, we have no further business here. We stop the script.

        -- the following is creating the spark effect the printer makes when its about to print money. As defined in PrintMore, it'll continue to do so for 3 whole seconds.
        local effectdata = EffectData()
        effectdata:SetOrigin(self:GetPos())
        effectdata:SetMagnitude(1)
        effectdata:SetScale(1)
        effectdata:SetRadius(2)
        util.Effect("Sparks", effectdata)
end
