ToF 3D Devlog #1: The beginnings

# ToF 3D Devlog #1: The beginnings
*25/09/2020*

![Pixel art logo of game title saying Tanks of Freedom](/assets/images/articles/tof-devlog-1/tof_logo.png "Game title logo")

It's that time again, where I become motivated and inspired to do some gamedev of my own, as opposed to just playing games. That happens to me sometimes, and then I create titles like [Tanks of Freedom](https://w84death.itch.io/tanks-of-freedom) and [Rat is fat](https://w84death.itch.io/rat-is-fat) and [SNAFU](https://gotm.io/p1x-in/snafu). There were also other gamejam games, but nothing really came out of that. I guess I might write separate post about my other games if there will be interest.

But this post is about a new project! _Tanks of Freedom_ is a game I made together with my friends as P1X team. It is a simple, 2D, turn-based strategy, where two players fight each other with Infantry, Tanks and Helicopters. Decently-long campaign, some rudimentary online multiplayer and map editor made it somewhat popular, and it has a lot of potential. Unfortunatelly, it being our very first project ever made in Godot Engine, code isn't exactly "clean". It started on engine version 1.0 and went through upgrades to 1.1, 2.0 and 2.1. Right now the latest version it works with appears to be 2.1.6, but that is as far as it goes. Old Godot version caused some issues on Android, messy code made it difficult both to develop the game further, and to port it to version 3.x. There are some community initiatives to do this, but results so far are limited at best. It took about 3 years of not-very-intensive development to make the game in the first place, so there simply wasn't any willpower to go on with it anymore. Wermooz wasn't very interested in the last stages, as I tried to carry this project on my own. w84death moved on to tinker with other stuff, as he often does.

With this short summary on where we are with ToF, let us see what I'm working on now. As I mentioned, game has a lot of potential, but it's just not feasible to work with it anymore - at least for me. The biggest issues are:

- 2D pixel art is hard, and I can't do this on my own
- code is a mess, it would take way too much time to clean up
- old Godot version is not cutting it anymore

![Example of a match in ToF, with tanks and infantry fighting in a town](/assets/images/articles/tof-devlog-1/tof_gameplay.png "ToF gameplay example")

So because of this, I decided it was time to start anew. Godot Engine 3.2.3 is the current version at the time of writing, and I'm using it. It was important to upgrade it, as I decided to move the game to 3D to make it more modern and attractive. It should also help with migration to version 4.0 and Vulkan renderer when the time comes.

As it turned out, working with 3D assets was much easier for me. I knew I could not make good looking low-poly art in Blender without huge time investment, so I turned to voxel art. I decided on MagicaVoxel as an editor. Making assets in it turned out to be fairly quick and straightforward. It's similar to 2D pixel art, but I can skimp on a lot of details, shading, etc. and it still looks passable. I will return to those assets later on, maybe even re-do many of them, once I gain more skill. But so far I have achieved way more than I ever could in 2D, and that makes me very happy!

GDScript changed in Godot version 3.0 so much, that many parts of old game simply could not be ported without complete re-write. So why not re-write whole game while I'm at it? This should allow me to do stuff like input, AI, maps and many others much better - more flexible and performant - than they were.

All of that means that I will have to spend A LOT of time developing this new project before it gets anywhere near to feature parity with old one, but I am ready for this. Maybe Wermooz and w84death will help somewhere along the way as well. We shall see.


## Bootstrapping the project

Looking back at the chaos that happened in ToF, I'm still amazed how far it got. This time, I want to do even better, and that is why I decided I need to have a design document for the game before I start developing it. Actually, that's not exactly right. I got inspired to make a low-poly version of ToF and did some research. During that research I found some nice looking voxel games. At the time I have also played The Touryst, which is a gorgeous voxel art game made in MagicaVoxel (hence the tool choice). I made a simple tank and placed it in an empty environment in Godot, just to see if I could go with it. And I could.

With that in mind, I went on and started writing my design document. I have filled it with reference images of different assets and games. I was still not entirely decided on voxel vs. low-poly, so there are both. Writing a document is tedious and boring though, so it took quite some time to motivate myself to push through this phase. It was painful, but I hope it will pay-off in the long run, as now I know what I want to do. Document itself is still a bit rough and lacks a lot of detail, that will be added later, as the project clarifies itself. For now, I'm happy with what I've got. For reference, [ToF 3D Design Document](https://github.com/P1X-in/Tanks-of-Freedom-3-D/blob/master/docs/DESIGN.md) can be found in the project repository on Github. It does contains spoilers for the game story, so be warned! Unless I change it.

Writing the initial design took about 16 months! That's right, that is how much I slacked off before I really started working on this. It was actually about 13 months of me doing irrelevant details, outlines and adding examples. The real work happened in the last three months, and that was still filled with slack, just to create something that would satisfy my needss and allow to move on to actual development. I guess this shows how much I don't like writing documentations. I think I am yet to see someone who does, so there is that.

For this part I don't really have any original advice. Just do it. Make a schedule. Grit your teeth. Have a look at _Getting things done_ or Pomodoro technique or some other methodologies. Writing documents sucks, but it should pay off in the future.


## Actual progress

Once I started creating assets and putting them together in the editor, progress seems to be going at a very good pace! For this part, there is actually quite a lot to show, so that is nice as well.

First step was to learn how Gridmap node even works. So I created a simple tile block and put it into the scene, with my poorly made tank and soldier assets. I have added a stock MagicaVoxel girl with an axe for a good measure.

(All images here can be found in original resolution on [Github](https://github.com/P1X-in/Tanks-of-Freedom-3-D/tree/master/docs/devlog))

![Progress image](/assets/images/articles/tof-devlog-1/progress_001.png "Progress image")

Not a bad start, but colors were way off. I started working with environment, lighting, import settings and other such things to try and make it better.

![Progress image](/assets/images/articles/tof-devlog-1/progress_002.png "Progress image")

This looks more like it, though green is a bit strong. It will stay like that for a while. I had a good and long look at my poor attempt at a tank and a soldier vs. magicka stock asset characters, and some tanks from examples I found. So I started working on that, and made them a bit better. These will do for now.

![Progress image](/assets/images/articles/tof-devlog-1/progress_003.png "Progress image")

![Progress image](/assets/images/articles/tof-devlog-1/progress_004.png "Progress image")

Then w84death gave me a good hint, that I can make the tank all metalic and shiny, so I did!

![Progress image](/assets/images/articles/tof-devlog-1/progress_005.png "Progress image")

It looks decently good like that. Now it was time to make a helicopter, so I could have all the same units as the first ToF game.

![Progress image](/assets/images/articles/tof-devlog-1/progress_006.png "Progress image")

![Progress image](/assets/images/articles/tof-devlog-1/progress_007.png "Progress image")

I'm moderately happy with how it turned out, so it was time to start working on terrain. I had a good look at old tiles and determined I could try and replicate their look in voxels. I have re-done green "grass" tile and made some actual grass frames for it. I have also positioned units on actual tiles to see how would the look in-game.

![Progress image](/assets/images/articles/tof-devlog-1/progress_008.png "Progress image")

Some more grass and logs.

![Progress image](/assets/images/articles/tof-devlog-1/progress_009.png "Progress image")

And some more flowers here and there.

![Progress image](/assets/images/articles/tof-devlog-1/progress_010.png "Progress image")

Created a small leaf tree, a large leaf tree and a tall leaf tree. Plus three different bushes. Not a lot, but enough to create a bit of variety.

![Progress image](/assets/images/articles/tof-devlog-1/progress_011.png "Progress image")

Some pines and firs for good measure. These came out better than expected.

![Progress image](/assets/images/articles/tof-devlog-1/progress_012.png "Progress image")

Then it was time for some mountains. This was a bit more difficult, as mountains actually needed a lot of voxels to be placed due to their volume. I have made about four stone templates and smashed them together to make bigger stuff. Somewhat worked.

![Progress image](/assets/images/articles/tof-devlog-1/progress_013.png "Progress image")

One of the fun things in old ToF was that buildings got damaged and destroyed when combat happened near them. I'm not yet making damaged versions, but some buildings are a good start.

![Progress image](/assets/images/articles/tof-devlog-1/progress_014.png "Progress image")

Add another small building to that, and one medium-sized, and we can make a decent town.

![Progress image](/assets/images/articles/tof-devlog-1/progress_015.png "Progress image")

I tried to add some details to them this time, to make them more interesting to look at.

![Progress image](/assets/images/articles/tof-devlog-1/progress_016.png "Progress image")

![Progress image](/assets/images/articles/tof-devlog-1/progress_017.png "Progress image")

Overall, not a bad look for about of week of work, that brought most of these assets.

![Progress image](/assets/images/articles/tof-devlog-1/progress_018.png "Progress image")


## In summary

So this is it for now. I will try to continue to work at this pace, but I shall see if my inner laziness will not stop me again. I have a nice Trello board for this, so at least there is a plan in place. I am also tempted to do a video devlog on youtube, but I don't think I want to spend time on producing videos, as I can work on a game instead. Also, I don't have good enough camera for now.

Well, see you in the next devlog, whenever that happens!
