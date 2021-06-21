ToF 3D Devlog #4: So much progress

# ToF 3D Devlog #4: So much progress
*21/6/2021*

![Pixel art logo of game title saying Tanks of Freedom](/assets/images/articles/tof-devlog-4/tof_logo.png "Game title logo")

*It's been 54 years since last devlog...*

Well, maybe not *that* long, but still. A lot of things happened in the meantime, but the biggest reason for the delay was that my server literally burnt down. Luckily, after about 2 months OVH was able to restore my VPS (even though they were not obligated to!). Also, I was deep in script development for ToF, so there wasn't much to show off.

Last time I have ended on a note, that I was ready to create some gameplay. And gameplay we did! There is so much progress, that I might have forgotten about some details in the meantime. But that is all good!

(All images here can be found in original resolution on [Github](https://github.com/P1X-in/Tanks-of-Freedom-3-D/tree/master/docs/devlog))

First thing to do was to create a game board, that re-uses the same map, as editor, but is a completely separate thing, to avoid mixing editor code with game code. Thanks to the map code, we already can load a map from file. Here we can see new additions to the selector: it changes colour according to the current player side, and we have complementary part, that indicates an selected tile.

![Progress image](/assets/images/articles/tof-devlog-4/progress_056.png "Progress image")

Most basic action, that we can do, is to select and move units around. For this purpose I have implemented Depth-First Search algorithm, that aims to find all of the reachable tiles, within a set range. Those tiles are marked with a frame. Frames also get coloured for context. Unit can move to a green field and still retain counter-attack. White fields use up all of the unit action points and no further actions are possible. Blue fields indicate possibility to claim a building, while red are for battles!

![Progress image](/assets/images/articles/tof-devlog-4/progress_057.png "Progress image")

When standing next to an enemy, and unit has enough action points and attacks available, a rotating, red indicator is shown. ToF 1 had a crosshair, which can't be easily replicated here, but this one is intended to be similar.

![Progress image](/assets/images/articles/tof-devlog-4/progress_058.png "Progress image")

I tried to figure out how to do the green arrow indicator for claiming buildings, but I decided it would be difficult to have it look right, as it would, most likely, clip with buildings. So I re-used the attack one instead, by simply turning it blue.

![Progress image](/assets/images/articles/tof-devlog-4/progress_059.png "Progress image")

Something, that older game lacked, was visualisation of a path, that unit is going to take. So I added it. The DFS search now additionally builds shortest path to every tile it discovers, and keeps them in temporary cache. This helps a lot, as I don't have to perform path search every time a player highlights a tile.

Also, on this screenshot, we can see an AW camera for the first time!

![Progress image](/assets/images/articles/tof-devlog-4/progress_060.png "Progress image")

A bit of code, and now arrows point correctly to the next tile in a path.

![Progress image](/assets/images/articles/tof-devlog-4/progress_061.png "Progress image")

Another new feature is that now units actually move between tiles instead of just teleporting to their destination. This was possible thanks to the path we previously plotted. Additionally, this shows a difference from old ToF: units can now pass through other allied units. This makes it more in line with how AW works, and also makes movement more intuitive.

<iframe width="600" height="320" src="https://www.youtube.com/embed/i9B_ygDRqsY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
</iframe>

If we can move towards the enemy, then we can fight! This next video shows already finished battles, with a bit of smoke particles and counter-attacking. Units are not balanced yet, but will be at the end of this part of devlog.

<iframe width="600" height="320" src="https://www.youtube.com/embed/lRDHZXb_DYw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
</iframe>

Here we can see a still image of the puff of smoke, that happens, when unit is destroyed.

![Progress image](/assets/images/articles/tof-devlog-4/progress_064.png "Progress image")

After some coding work I have added other missing gameplay loop mechanics: claiming buildings, gaining resources and building new units. It is also possible to win by claiming enemy HQ. The game is fully playable!

<iframe width="600" height="320" src="https://www.youtube.com/embed/U8kEfeR9z0Q" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
</iframe>

One of the goals of new version of ToF is to have more players. Technically there can be as many players in the match, as many GDScript can fit objects in an array, but I have only prepared four colours and styles, so I think this might be a limit for now.

To show this off, I have taken the classic Crossroad map and expanded it to now sport four sides!

![Progress image](/assets/images/articles/tof-devlog-4/progress_066.png "Progress image")

Having four players is nice, but the game needs to be also available for solo play. The AI implementation took some time, and I did not produce almost any devlog artefacts during that work. Instead, I just hunkered down and got to it. Here we can see final results in action.

<iframe width="600" height="320" src="https://www.youtube.com/embed/PwXwUU7fzkg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
</iframe>

We can play the game, but the map, and list of players, is currently hardcoded into the game board itself, and this simply will not do. It is time to create simple menu for the game, that will allow us to set up games, and also go into editor.

Here we have a map, that will serve as the background for the menu.

![Progress image](/assets/images/articles/tof-devlog-4/progress_068.png "Progress image")

The original logo has been re-created in voxels as well, so that I can use it in 3D space instead of having it just as an overlay.

![Progress image](/assets/images/articles/tof-devlog-4/progress_069.png "Progress image")

Using these assets I have built a simple menu. It allows for a Skirmish battle, and provides access to the Editor. Campaign and Settings options are also included, but disabled, and they do not do anything.

![Progress image](/assets/images/articles/tof-devlog-4/progress_070.png "Progress image")

I really liked the cinematic bars for AI turn, they help to visually indicate, that user input is not required at this time.

<iframe width="600" height="320" src="https://www.youtube.com/embed/PuIQy-SrY88" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
</iframe>

Next step was to start building out scripting for campaign. The goal was to present player with characters, dialogs, move elements of the map, etc. Here we have a simple dialog window, that can show any text and can be dismissed.

![Progress image](/assets/images/articles/tof-devlog-4/progress_072.png "Progress image")

Building out scripting capabilities took significant amount of time and procastrination. Again, as with AI, it was mostly code work, with little to no assets required, so I did not produce any images for this. It did, however, have visible results on a moving board, so I have prepared a short clip presenting most of the tools, that can be used for cutscene creation.

<iframe width="600" height="320" src="https://www.youtube.com/embed/9ADhLBLvsmI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
</iframe>

Since that clip I have improved camera movements and zoom, but was too lazy to re-record.

After that big chunk of work I got tired of coding for a bit, so I decided to switch to assets. Unique styles for green and yellow players were still needed, so I went with that.

Green nation theme is Futuristic. Their vehicles hover, and are equipped with high-tech railguns.

I guess I forgot to take make progress artifacts for green Infantry, Tank and Helicopter, but these will be visible later. Here we have a Hoverbike for Mobile Infantry.

![Progress image](/assets/images/articles/tof-devlog-4/progress_074.png "Progress image")

And a Hovertank Rocket Artillery, with a Scout Tricopter drone.

![Progress image](/assets/images/articles/tof-devlog-4/progress_075.png "Progress image")

Green HQ is a big administration building, with a Grasshopper Infantry!

![Progress image](/assets/images/articles/tof-devlog-4/progress_076.png "Progress image")

Futuristic Barracks building.

![Progress image](/assets/images/articles/tof-devlog-4/progress_077.png "Progress image")

And a Futuristic Factory, this time with a Hovertank being assembled, and a deployed one in front of it.

![Progress image](/assets/images/articles/tof-devlog-4/progress_078.png "Progress image")

Green Airfield is a big tower with a landing pad, and some storage area underneath.

![Progress image](/assets/images/articles/tof-devlog-4/progress_079.png "Progress image")

Radar Station serving as a Tower for green nation.

![Progress image](/assets/images/articles/tof-devlog-4/progress_080.png "Progress image")

Good! Now take a breath, and keep going!

Yellow nation style is medieval/feudal. Their infantry consists of Feudal Knights armed with crossbows and a small cannon.

![Progress image](/assets/images/articles/tof-devlog-4/progress_081.png "Progress image")

Keeping in theme, the Tank is a mobile Outpost with a huge cannon!

![Progress image](/assets/images/articles/tof-devlog-4/progress_082.png "Progress image")

Helicopter is a re-purposed boat with propellers, equipped with a crossbow and some bombs.

![Progress image](/assets/images/articles/tof-devlog-4/progress_083.png "Progress image")

Mobile Infantry is riding Horse Motorbikes! I hope Nintendo does not sue me for stealing their idea from Mariokart Link!

![Progress image](/assets/images/articles/tof-devlog-4/progress_084.png "Progress image")

Rocket Artillery uses the same Mobile Outpost frame as the Tank, but this time it is a huge ballista, that shoots rockets. Because that makes sense.

![Progress image](/assets/images/articles/tof-devlog-4/progress_085.png "Progress image")

Feudal Scout has been built according to plans made by DaVinci himself. It is armed with two small crossbows, just in case.

![Progress image](/assets/images/articles/tof-devlog-4/progress_086.png "Progress image")

All units for all nations are now complete. At least for now, as I will probably revise them later. In the meantime, enjoy the full set.

![Progress image](/assets/images/articles/tof-devlog-4/progress_087.png "Progress image")

We still need some Feudal buildings. It is only fitting for the HQ to be a castle, which we can see in the background. In front we can see Feudal Barracks, decorated with some shields.

![Progress image](/assets/images/articles/tof-devlog-4/progress_088.png "Progress image")

Feudal heavy units have huge parts that are cast in this Feudal Forge.

![Progress image](/assets/images/articles/tof-devlog-4/progress_089.png "Progress image")

Airships are built in the Airshipwright Construction Yard

![Progress image](/assets/images/articles/tof-devlog-4/progress_090.png "Progress image")

Feudal Tower is literally a tower. It came out a bit small though, so I want to re-do it later. Maybe a Wizard lives there?

All buildings are ready, and present nicely in that set screenshot.

![Progress image](/assets/images/articles/tof-devlog-4/progress_091.png "Progress image")

That was a lot of very good progress, and I am motivated to go on. Trello board looks a bit intimidating, but I believe, step by step, I can do it.

I have looked at my commit history on Github and could not believe that ToF repository is 2 years old! Serious work started about a year ago. I guess I have to focus more.


[Read part 3 of the devlog](/tof-devlog-3)
