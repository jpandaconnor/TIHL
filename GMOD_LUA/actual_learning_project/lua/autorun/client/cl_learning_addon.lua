include("autorun/sh_learning_addon.lua")

hook.Add(ALA_HOOK_HUDPAINT, "ALA_HUDPaint", function()
  -- Screen width and height
  local width, height = ScrW(), ScrH()

  -- Size of box
  local boxWidth, boxHeight = width * .25, height * .1

  surface.SetDrawColor(0, 0, 0, 100)
  surface.DrawRect(
    width / 2 - boxWidth / 2,
    height / 2 - boxHeight / 2,
    boxWidth, boxHeight)




    -- Health Box
    local hbWidth = width * .2
    local hbHeight = height * .04

    surface.SetDrawColor(0, 0, 0, 200)
    surface.DrawRect(
      width / 2 - width * .49,
      height / 2 - height * .49,
      hbWidth,
      hbHeight
    )
end)
