ToF 3D Devlog #7: Working in the background

# ToF 3D Devlog #7: Working in the background
*21/11/2022*

![Pixel art logo of game title saying Tanks of Freedom 2](/assets/images/articles/tof-devlog-7/tof2_logo_600.png "Game title logo")

Finally, another campaign complete! I had a big hiatus somewhere in the middle of it, since Xenoblade Chronicles 3 came out and I totally had to complete that game. Don't judge me. But once I was done with it, I focused back again on that Sapphire Dawn campaign, as this was my next goal.

As I mentioned couple times before, I do not want to show too many spoilers, but I want to have something to show, so there will be campaign screenshots with features I find interesting.


(All images here can be found in original resolution on [Github](https://github.com/P1X-in/Tanks-of-Freedom-3-D/tree/master/docs/devlog))

In the last devlog I have showed new tall grass tiles. These tiles inspired me to make some missions in this campaign a little bit more sneaky. There are some wilder areas covered in it, and it looks great!

![Progress image](/assets/images/articles/tof-devlog-7/progress_134.png "Progress image")

In this campaign there are a couple of maps where there is a third faction. Here we can see Amber Noon troops defending a city agains Ruby Dusk invaders. But it is Sapphire Dawn mission, so they must be there as well! Defenders here are not active, though. They are just for looks.

![Progress image](/assets/images/articles/tof-devlog-7/progress_135.png "Progress image")

In the next mission, though, not so much! It is the first one where there are three sides active. Two should be allied, but since the game does not support teams (yet), I had to create separate areas on the map, so that allies do not start fighting each other.

![Progress image](/assets/images/articles/tof-devlog-7/progress_136.png "Progress image")

This campaign goes into tropical zone, so some of the maps have different vegetation. Had to use those palm trees somewhere!

![Progress image](/assets/images/articles/tof-devlog-7/progress_137.png "Progress image")

The final mission of this campaign is very different from the first one. Instead of a big battle, it includes sneaking around and avoiding enemies. I hope players have fun here. Also expect plot twists!

![Progress image](/assets/images/articles/tof-devlog-7/progress_138.png "Progress image")

With campaign done, I have again came back to adding in new features! Alternating between these two is really great for motivation, as it helps prevent burnout. Content is really rough in this regard.

First thing I added was mission objectives list. It is populated by story steps, so it can be anything a map author wants, but it is limited to four lines. It is visible when main menu is open, and hidden when in-game, so that it does not obscure anything.

![Progress image](/assets/images/articles/tof-devlog-7/progress_139.png "Progress image")

I have added some more settings, so that game can be better configured. Anti-aliasing options visible there are actually disabled in current builds due to known issues. Sorry. But FPS caps are awesome, helped reduce power need on Steam Deck significantly. I have also added Deck detection, so that, when game first runs, it sets stuff to lower than usual. Thanks to that, game uses only about 9.5W of power. Player can change it, of course.

![Progress image](/assets/images/articles/tof-devlog-7/progress_140.png "Progress image")

In-game menu was a bit inconsisten with other radials, so I made the Back button do the same thing as in ability radials, and then added new Main Menu button.

When working on campaign maps I found it tedious to always open full Save/Load window to save changes, so I have added Quicksave option.

![Progress image](/assets/images/articles/tof-devlog-7/progress_141.png "Progress image")

Next on the list were some new tiles, because there should always be new tiles. Tall grass turned out to be super useful, so I added river/road grass versions, for even more variety.

![Progress image](/assets/images/articles/tof-devlog-7/progress_142.png "Progress image")

I have also added new decorative tiles with cut down forest, just tree stumps left. Not used much just yet, but might be very useful later.

![Progress image](/assets/images/articles/tof-devlog-7/progress_143.png "Progress image")

Hero units were always easy to miss, even without tall grass. With it, they are sometimes impossible to find. To help with that, heroes now have a banner with their side colours, to make them stand out.

![Progress image](/assets/images/articles/tof-devlog-7/progress_144.png "Progress image")

Another new tiles are additional bridge tops, that tile better. No doubled columns anymore.

![Progress image](/assets/images/articles/tof-devlog-7/progress_145.png "Progress image")

A small, but very nice UI improvement here. I disliked how campaign completion was indicated by very plain, white tick, so I drew a colorful medal. Looks more interesting. Now it clashes a bit with the rest of UI, but I think It shows, that I have to make it all pixel-art over time.

![Progress image](/assets/images/articles/tof-devlog-7/progress_146.png "Progress image")

Same medal added to campaign map, so that it is plainly visible if currently open campaign is already finished or not.

![Progress image](/assets/images/articles/tof-devlog-7/progress_147.png "Progress image")

And that is it for the changes! With all that, I have prepared new game build and published it on itch. Check it out: [https://czlowiekimadlo.itch.io/tanks-of-freedom-ii](https://czlowiekimadlo.itch.io/tanks-of-freedom-ii)!

There was an attempt to optimise 3D models further, since I have been informed about new version of Vox Cleaner plugin. Unfortunately, it turns out models made by new version bug out when imported into Godot. I might look into it more, to verify if this is plugin bug (Blender shows model correctly though), or engine bug (most likely). For now, I left these assets as they are.

I have already started working on next features, and then I'll focus on Jade Twilight campaign. See you when it's finished!

[Read part 6 of the devlog](/tof-devlog-6)
[Read part 8 of the devlog](/tof-devlog-8)
