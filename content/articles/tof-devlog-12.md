ToF II Devlog #12: More Skirmish content

# ToF II Devlog #12: More Skirmish content
*21/05/2024*

![Pixel art logo of game title saying Tanks of Freedom 2](/assets/images/articles/tof-devlog-12/tof2_logo_600.png "Game title logo")

Spring in full swing! With a bit more motivation to work on the project, we are getting ever closer to the final release. Actually, since the last devlog we already had two!

This time there were a lot of changes that have not much in terms of interesting presentation. The biggest one is addition of story elements to the map editor, so that it no longer requires manual fiddling with JSON files. Or not as much. Another big thing is a number of new Skirmish mode maps, that can be used to play agains AI, with other players over LAN, and Online.

(All images here can be found in original resolution on [Github](https://github.com/P1X-in/Tanks-of-Freedom-3-D/tree/master/docs/devlog))

Let's start with a small, but useful, visual improvement. Units now have healthbars above them, that also show level stars. Players no longer have to hover over units to see their status. This also greatly improves gameplay if anyone decides to port the game to touchscreens in the future.

![Progress image](/assets/images/articles/tof-devlog-12/progress_210.png "Progress image")

One of my goals for the project was to rewrite all of the source code to be fully typed. Well, that did not work out as well as I wished. After that initial avalanche of warnings I have quite quickly hit a roadblock. MyT code is so convoluted, that there are way too many dependencies creating cycles, and Godot can't handle it. Since then I've got some tips on how this could be addressed, so I might revisit this, but I'm not sure.

![Progress image](/assets/images/articles/tof-devlog-12/progress_211.png "Progress image")

After that rather dissapointing detour, let's have a look at the Story Editor! It's a part of Map Editor, available from ESC menu.

It is split into three main parts: general map settings, triggers, and stories. The first and simplest one is the general settings. It contains a few things that can be changed, like initial camera position, or soundtrack.

![Progress image](/assets/images/articles/tof-devlog-12/progress_212.png "Progress image")

The Triggers tab is where the fun starts! It provides means to create triggers (duh!) that cause stories to be executed. A trigger can be a unit entering certain area, VIP getting killed, or game progressing to a certain turn. Nothing too fancy, but should cover most of map makers needs.

![Progress image](/assets/images/articles/tof-devlog-12/progress_213.png "Progress image")

This is the most complex trigger - one that detects if unit moved into an area. It gives a lot of options for configuration.

![Progress image](/assets/images/articles/tof-devlog-12/progress_214.png "Progress image")

Here we have another part of the Editor that I had to add in the meantime - a picker. This particular one allows author to select one of the existing stories to be attached to a trigger. There are a few different pickers for stories, triggers, predefined types. Another useful type of picker is one that allows author to pick a position from the map, making targetting triggers and stories much faster.

![Progress image](/assets/images/articles/tof-devlog-12/progress_215.png "Progress image")

Stories editor tab is certainly the most extensive one. It consist of two layers: list of stories and list of particular story steps. In order to edit a story, first we have to select one from the list. We can also create a new one, or delete of the existing ones.

There is no picture for step editing, but it looks just like the trigger editor!

![Progress image](/assets/images/articles/tof-devlog-12/progress_216.png "Progress image")

Story editor was a big chunk of work. So, for a change, I have attempted a tilt-shift look. I had that in my mind for a long time, but could not figure out how to do it without a complicated shader. But I've got an idea that I could scale near-blur setting of the environment together with camera zoom. This works quite well!

![Progress image](/assets/images/articles/tof-devlog-12/progress_217.png "Progress image")

Next visual improvement I wanted to do was to add custom maps for each campaign. Having the same, big map for all of them proved to be quite restraining, as most of the action happened in the middle, and sometime close to each other on a fairly zoomed out map.

In the process of making maps I have quickly figured that it would not work as well as I hoped, as most of them would have to be close to the full map anyway, due to stray flags near edges. So I have reimplemented the map to have it's own viewport and a camera, allowing for the map to be way bigger image. Now it pans to show active flags, which can be out of view!

![Progress image](/assets/images/articles/tof-devlog-12/progress_218.png "Progress image")

I took a moment to refresh credits for the project. Then I relised that there are no Credits in the game itself. So I added them. Now everyone can see who contributed to the project.

![Progress image](/assets/images/articles/tof-devlog-12/progress_219.png "Progress image")

Final big task that I set for myself was to add a number of new Skirmish maps. The game already had two 1v1 maps and one 4 player map. But these were neither good nor plentiful. In order for the players to be able to enjoy the game beyond campaign, way more was needed. Especially that there were no 3 player maps.

Here we can see some of them. This is a 1v1 map with a city theme.

![Progress image](/assets/images/articles/tof-devlog-12/progress_220.png "Progress image")

Another 1v1 with a biome-vs-biome theme. It was made with an intent to extend it into a 4p version, which also exists.

![Progress image](/assets/images/articles/tof-devlog-12/progress_221.png "Progress image")

When working on this 1v1 map I have used an Advance Wars community map with the same name as a basis. Props to _Voice of Akasha_ who is the original author.

![Progress image](/assets/images/articles/tof-devlog-12/progress_222.png "Progress image")

Making 3 player maps turned out to be a bit of a challange, as balancing these is not straightforward.

![Progress image](/assets/images/articles/tof-devlog-12/progress_223.png "Progress image")

Another 3p map, this time each player has two HQ buildings for wider variety of available heroes.

![Progress image](/assets/images/articles/tof-devlog-12/progress_224.png "Progress image")

This is a simple 3p map divided into a number of islands. A lot of air combat in the middle I guess.

![Progress image](/assets/images/articles/tof-devlog-12/progress_225.png "Progress image")

4 player maps tend to be big, and this one takes up whole editor! It is a 2v2 map, with fights happening in the mountain pockets, as well as in the middle valley.

![Progress image](/assets/images/articles/tof-devlog-12/progress_226.png "Progress image")

There were also some balancing changes and a few much needed bugfixes. This version of the game is nearly what I envisioned for version 1.0. One of the items in the backlog is to record a Let's Play series, which will also serve as a QA session. This should allow me to catch most annoying bugs before final release.

And for those interested in the list of released changes there is also a new post: [https://czlowiekimadlo.itch.io/tanks-of-freedom-ii/devlog/734112/version-070-is-out](https://czlowiekimadlo.itch.io/tanks-of-freedom-ii/devlog/734112/version-070-is-out)

[Read part 11 of the devlog](/tof-devlog-11)
