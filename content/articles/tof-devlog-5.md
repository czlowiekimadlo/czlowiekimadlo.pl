ToF 3D Devlog #5: Hibernation

# ToF 3D Devlog #5: Hibernation
*02/2/2022*

![Pixel art logo of game title saying Tanks of Freedom](/assets/images/articles/tof-devlog-5/tof_logo.png "Game title logo")

You know, project time flows differently when you have a lot of stuff to do outside of it. I know I promised more updates and did not delivered. But it's not like I was slacking off. In fact, after the last devlog I have worked quite a lot on developing ToF, it's just that I didn't managed to write a devlog before I got distracted with other stuff. There will be less artifacts here, but they are substantial, so I hope that will somehow compensate the wait.

Trello board looks much more managable than last time, although things left in it are mostly biggies: campaigns, multiplayer, map sharing, etc. Let's not get discouraged though!

(All images here can be found in original resolution on [Github](https://github.com/P1X-in/Tanks-of-Freedom-3-D/tree/master/docs/devlog))

Map assets are coming along nicely. With buildings and units finished for all sides, I started adding some details that were present in the old game. First on the list was ground damage, that happens during battles. Creating varied "holes" in the ground by hand turned out to be quite slow to do, and the results are far from ideal. I tried to do them as a model - like everything else - but it made them portrude from terrain and look a bit awkward. I though about trying decals, but never got to it. Did a couple of passes on the damage models.

![Progress image](/assets/images/articles/tof-devlog-5/progress_092.png "Progress image")

Ground damage turned out to actually be the most difficult. In 2D it was easy - just overlay a sprite over the tile, so it obscures everything with a "hole". In 3D, anything that is there will just poke through geometry if it is taller than the "hole", and culling anything that intersects with the "hole" would require some serious amount of coding - certainly way more than I was willing to put into this feature.

Next on the list were buildings. There are a lot, and they already exist, so instead of coming up with new "holes", I had to start modyfing existing assets. I have decided to start with the statue, since it is a central piece of Crossroad map, and is fairly small. After some experimentation on how to do damage, I had two stages for it - just like in original ToF.

![Progress image](/assets/images/articles/tof-devlog-5/progress_093.png "Progress image")

Another small object ripe for destruction was the tiny fountain I made for parks. Looks like it got hit.

![Progress image](/assets/images/articles/tof-devlog-5/progress_094.png "Progress image")

After that came the small buildings. Working on small homes showed an interesting hurdle: they had no interior, being solid blocks inside instead. First stage of damage only adds bullet holes to walls, roofs, windows, fences, and anything that happened to be nearby. For the second stage though, I had to hollow them out, so that big holes in walls didn't just show solid black inside. There were a lot of them, so this step took some time, though I did it mostly live on Twitch, so I had some company to talk to.

![Progress image](/assets/images/articles/tof-devlog-5/progress_095.png "Progress image")

Large buildings, while requiring more work per asset, were a bit more interesting to do - they didn't have copy-pasted models, and allowed for more creative damage with their bigger volume.

![Progress image](/assets/images/articles/tof-devlog-5/progress_096.png "Progress image")

Having damage coded in, it was now possible to have a map, that is completely destroyed. I have also added an option in the editor to change the level of damage on a building, so that it is possible to create pre-destroyed maps.

Going stron on assets, I have moved on to creating heroes. Heroes! A great improvement upon original ToF, now it would be possible to have unique and powerful units, that can make a big impact on the battlefield, instead of just heaps of disposable clones. After multiple sessions working on models, each side gained three more units: an NPC-type leader, that can not fight, but can be used as an escort objective, or just for dialogue; the other type was two different heroes, that are meant to be used in battle.

![Progress image](/assets/images/articles/tof-devlog-5/progress_097.png "Progress image")

They are a bit small, but unique enough to be able to tell them apart. Now, in order to actually use them, we have to be able to recruit them in skirmish battles. In campaigns, they will be provided for free. Each side will be limited to only having single hero deployed at any given time.

![Progress image](/assets/images/articles/tof-devlog-5/progress_098.png "Progress image")

Each and every Hero has exactly the same stats - not exactly the uniqness I was aiming for. I wanted Heroes to be both unique and predictable - like every other unit, so the differenciating factor was going to be skills.

Every Hero has two Abilities: a passive one, and an active one. Passive ability gives the player benefits simply because the Hero is on the battlefield. The active one can give some tactical advantage when used at the right moment. I have started going through my heroes, one by one, implementing their unique traits. Some of them meant that I had to modify some game mechanics to adapt these abilities. Luckily, it was way easier than it seemed.

<iframe width="600" height="320" src="https://www.youtube.com/embed/sIGVbpTv0b8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
</iframe>

Some of these abilities are meant to be tactical or supportive: drop a unit, give a buff, heal some damage, etc. Other are meant to be offensive: deal some serious damage to your target.

<iframe width="600" height="320" src="https://www.youtube.com/embed/KR0e_hiIgeA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
</iframe>

It took some time, but the results are really great. I wasn't done yet with abilities, but I needed to do something different for a change. I have decided to go for settings menu. Added a simple one with a handful of options, allowing user to toggle fullscreen and turn off music and sound. Not much, but it is a good start.

![Progress image](/assets/images/articles/tof-devlog-5/progress_101.png "Progress image")

I have also worked on the campaign selection menu. ToF only had a single campaign, alternating missions for both sides of the conflict. For the new one I wanted to improve upon that. New menu came along with creation of campaign file format and campaign management logic. Game will populate the menu based on the campaigns that are actually attached to the game, making it very easy to put new ones - no need to change the code, just drop a new campaign folder with proper files! And it also works outside of the project, meaning that anyone can create a new campaign using game map editor and text editor, and distribute it. Placing such campaign next to ToF binary file will read it and load into the menu as well.

Campaigns can define unlock requirements, so, for example, a Prologue needs to be completed before first full campaign unlocks.

![Progress image](/assets/images/articles/tof-devlog-5/progress_102.png "Progress image")

Selecting a campaign displays a map of the world with flags representing locations where missions take place. Player can select their mission and go into a simple briefing screen. So far, the map is always the same, but I would like for each campaign to be able to provide their own image for the map, as well as for the camapign cover icon.

![Progress image](/assets/images/articles/tof-devlog-5/progress_103.png "Progress image")

Going back to abilities now, there was still some work to do: units. Having units be able to do some significant actions from time to time makes them more valuable, even if they are damaged. Since I wanted to tie abilities with levels, I had to implement this fully as well. Units can gain levels from killing enemies (or Hero abilities), which give them access to their ability, improve armour and allow to move a bit more.

I have also made significant change to Mobile Rocket Artillery unit, making it not be able to attack anyone directly, or counterattack, but giving it powerful ability from the get-go.

<iframe width="600" height="320" src="https://www.youtube.com/embed/X3rN-670rb8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
</iframe>

So many mechanics and systems were put in place for this moment! I have started working on a first campaign, that happens to be a tutorial. Mission selection, scripting and Heroes provided a very nice backbone for building boot camp scenarios meant to introduce players to various mechanics.

![Progress image](/assets/images/articles/tof-devlog-5/progress_105.png "Progress image")

Tutorial is made of four scenarios: basic, heroes, levels and buildings. These should cover everything that is needed.

Next step was to create very first part of the game story: the Prologue campaign. It is very small, only having two short scenarios. There is nothing particularly original in there aside from the game story, so I will not show anything to avoid spoilers. Prologue served another purpose - to see if all of my systems are sufficient to create story-driven campaigns. Being short meant that I didn't have to commit to a lot of content at this stage.

I have realised, that to do full campaigns I would need another feature, that old ToF had - biomes. Old maps do have a setting that gives them a time of year - you could set your map to be summer, winter or autumn styled, as well as place some sand tiles. This made it easy to swap entire map from green to snow in a click, but it also made it impossible to mix greenery with said snow.

New implementation simply adds different biome tiles to the set, so that they can be used together. Autumn is missing, and I currently have no plans on bringing it back. It was a bit muddy, and I do not have enough colours to make it look good. Maybe I will create some yellow-orange-red trees in the future though.

First thing I did was to simply re-colour tiles white to make them look like winter.

![Progress image](/assets/images/articles/tof-devlog-5/progress_106.png "Progress image")

w84death pointed out, that the river looked a bit bad when fully covered with ice, so I broken it up and now it looks great!

![Progress image](/assets/images/articles/tof-devlog-5/progress_107.png "Progress image")

Next was desert. Again, re-coloured some tiles to look like sand. Here are some new things though: cacti forests to replace trees, and sand dunes.

![Progress image](/assets/images/articles/tof-devlog-5/progress_108.png "Progress image")

I wasn't happy with how these dunes looked, so tried to make them tile instead of being on their own. A bit better, but still not what I wanted.

![Progress image](/assets/images/articles/tof-devlog-5/progress_109.png "Progress image")

Switched gears for a bit and created a big bridge tiles, so that islands can be connected without the need for some awkward land lines.

![Progress image](/assets/images/articles/tof-devlog-5/progress_110.png "Progress image")

Since I still wasn't happy with my dunes, I gave them another go. This time, they came out quite good.

![Progress image](/assets/images/articles/tof-devlog-5/progress_111.png "Progress image")

Another small detail: fences. So far, all sides used the same, wired fence for their buildings. Now ther are additional ones: laser and wall. No unique fence for Ruby Dusk, they will use wire for now.

![Progress image](/assets/images/articles/tof-devlog-5/progress_112.png "Progress image")

There are a couple more changes implemented, like unit stats view, so that player can tell what is the state of any unit on the map, and a stone version of a big bridge, so that retro-styled nations do not have to use the modern one. There is also wooden road bridge for rivers.

That is it for now. I have motivation, energy and a list of tasks, so, hopefully, next devlog is not going to take me months to make!

[Read part 4 of the devlog](/tof-devlog-4)
