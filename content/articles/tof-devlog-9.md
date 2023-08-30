ToF 3D Devlog #9: Content complete! (Almost)

# ToF 3D Devlog #9: Content complete! (Almost)
*29/8/2023*

![Pixel art logo of game title saying Tanks of Freedom 2](/assets/images/articles/tof-devlog-9/tof2_logo_600.png "Game title logo")

Time flies! And it's already the end of summer vacations, meaning it was a good time to get back to work. And I'm ready for a new update as well!

This update might be a bit smaller than previous one, but nevertheless it is an important one. I have finished the last campaign (plus epilogue), meaning that the core game content is complete! Well, almost, as there are still some custom maps to be made. But that should be easier.

The fourth pre-release version brings the conclusion of the story, with an Amber Noon campaign. It is slightly shorter than the previous ones, but comes with a tiny Epilogue. Overall, it adds similar amounts of gameplay as the previous update.

But unlike the 0.3.0, the 0.4.0 version is not bringing much in terms of features that would be visible to players (although there are some!). There was a small 0.3.1 release that addressed a fullscreen bug. It has also brought two improvements that I will present here.

(All images here can be found in original resolution on [Github](https://github.com/P1X-in/Tanks-of-Freedom-3-D/tree/master/docs/devlog))

![Progress image](/assets/images/articles/tof-devlog-8/progress_171.png "Progress image")

Let's start with options menu improvements. The old menu was getting too cramped with all the stuff I wanted to put in, so I enlarged it, and moved some stuff around so that tabs make more sense. This was part of 0.3.1 release.

![Progress image](/assets/images/articles/tof-devlog-8/progress_172.png "Progress image")

The next thing that came in 0.3.1 was on-screen buttons help, that could be toggled on or off in settings. I have caught myself forgetting some of the keys. How then I could expect players to quickly remind them all when the mapping is only viewable in the main menu? Now it can be displayed in the game and in the map editor to help. You still have to go to the settings to toggle it though...

From that point I have focused on the campaign content. And, as usual, I wanted for each mission to have some unique trait going for it. So here we go.

Oh! Be aware, that these screenshots will contain pretty heavy spoilers!

![Progress image](/assets/images/articles/tof-devlog-8/progress_173.png "Progress image")

We start the campaign with Prince Tybalt running some laps. This is the only mission in the campaign where Amber and Jade forces fight agains each other while player controls the Amber side, but it is only a 'mock' battle (explosions still look very much real).

![Progress image](/assets/images/articles/tof-devlog-8/progress_174.png "Progress image")

This update contains a number of new tiles, some of which we can see here - a square of sandbags that is meant to be a form of a roadblock. There already was a literal roadblock tile, but this mission needed something more fitting for a military training area.

![Progress image](/assets/images/articles/tof-devlog-8/progress_175.png "Progress image")

In the second mission, we see Amber Noon forces preparing to defend a city. It is here that we see a pretty big story reveal, which sets up the tone for the rest of the campaign.

The secret is not yet revealed on this screenshot, but surely will be on some later ones. And it is that secret what makes this mission stand out.

![Progress image](/assets/images/articles/tof-devlog-8/progress_176.png "Progress image")

Here we can see another meeting between General Cyrus and Commando Blake. The last one didn't go very well for Cyrus, but hopefully this one will be better? But there is something odd about this one... Also isn't this an Amber Noon campaign?

This particular mission made me develop new AI/scripting tool that allows for a unit to be "tethered" to a specific tile, so that it will not leave designated area. It was needed because otherwise AI hero was too eager to wander off from an area he was supposed to be defending.

![Progress image](/assets/images/articles/tof-devlog-8/progress_177.png "Progress image")

Here we can see some of Tybalt's forces being sneaky in the mountains. There are no new mechanics, but the story can bring a few interesting twists. Overall it is a bit basic.

![Progress image](/assets/images/articles/tof-devlog-8/progress_178.png "Progress image")

Here we have the secret finally fully revealed - the fifth faction! Well, I think I did reveal it in one of the previous devlogs, but here we can see them in the field.

In the fifth mission Tybalt comes to help Jade Admiral Torsten, and finally rescue King Ludwig. In an unusual manner, Captain Claude gives the command of him and his forces to the Prince, so we will see some of the Jade units in yellow colours.

We can also see heavy use of the sandbags tiles here, in order to create a "city under siege" vibe.

![Progress image](/assets/images/articles/tof-devlog-8/progress_179.png "Progress image")

This one is the final mission of the campaign (but not the game). I didn't want to show too much, but I can reveal, that it is the only mission in the game where there are all five nations present. All heroes as well.

I'm not too happy about this mission, as it is not too interesting - it's just a grind till you win. I might re-do it later. I might not.

![Progress image](/assets/images/articles/tof-devlog-8/progress_180.png "Progress image")

While I was preparing to create the Epilogue, I decided that some new tiles were needed. Here we can see wall tiles, which are actually returning from ToF 1. This time these are stylised as castle walls, but I want to add other styles later.

![Progress image](/assets/images/articles/tof-devlog-8/progress_181.png "Progress image")

The walls had a bit too high tower density, so I have added a few additional straight and T-shaped sections in order to give towerless options.

![Progress image](/assets/images/articles/tof-devlog-8/progress_182.png "Progress image")

With all the tiles I needed, I was ready to create the true final mission of the game. Which is also a one-mission Epilogue campaign dedicated to the fifth nation.

It is a heavily scripted mission comparable to the Prologue defense one. There is a strong emphasis on the story, with little strategy involved - player is not able to produce new units, and resources are very limited. It is still very important to make good tactial decisions in order to win.

In addition, I have fixed a couple of bugs that I found along the way.

The new version is, as always, available on itch: [https://czlowiekimadlo.itch.io/tanks-of-freedom-ii](https://czlowiekimadlo.itch.io/tanks-of-freedom-ii)

If you visit the Trello board, there are a few more tasks now, mostly related to the engine migrations - which is my next goal. I have also added more notes on new units ideas, that I think might add a lot of nice alternatives to the game.

I think I might try to hire someone to review the mission content I have created so far, both for text and translation correction, as well as for actual storyline improvements. If I manage to find someone, then I will do another content pass to apply this. I might also use this opportunity to use some newer tiles on older missions, as quite a lot of new ones showed up since Grim decided to send some of the recruits to attack Ruby Dawn for "training".

See you in the next one!

[Read part 8 of the devlog](/tof-devlog-8)
