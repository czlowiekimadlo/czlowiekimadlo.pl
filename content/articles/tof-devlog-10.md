ToF 3D Devlog #10: Godot upgrade and Multiplayer

# ToF 3D Devlog #10: Godot upgrade and Multiplayer
*27/11/2023*

![Pixel art logo of game title saying Tanks of Freedom 2](/assets/images/articles/tof-devlog-10/tof2_logo_600.png "Game title logo")

Have you ever fancied an idea of putting a bigger, better, stronger engine under the hood of your car and seeing it go? That's what I just done with the game! That's right! Tanks of Freedom II is now running on Godot 4! Version 4.1.3 to be exact (at the time of writing), with Version 4.2 being probably days away from release. And we will be moving to it as soon as possible, as it contains some fixes for bugs that annoy me to no end.

I did my best to make the move to new version of Godot be as transparent as possible, and I think it was a success. There are a few minor visual effects missing, and some things in visuals that I don't like, but considering how big of a change in terms of rendering it was, It's amazing how little difference there is.

Thanks to the new multiplayer functions in the engine, we now have a LAN multiplayer in the game! And a lot of other additions and improvements as well. This time there is no new story content, so I had a chance to focus on the game itself. Let's get into it!

(All images here can be found in original resolution on [Github](https://github.com/P1X-in/Tanks-of-Freedom-3-D/tree/master/docs/devlog))

Ever since Godot 4.0 got into RC stage I was planning on porting the game to it. I was a bit afraid of this though, so I kept putting it away, making excuses - mainly that I wanted the game to be published with all the campaigns and stable. And so that's what I did - version 4.0 that contained the last campaign used Godot 3.5.2. But with that out of the way, there was nothing to hide behind. And so I started the dreaded task of moving to 4.0. Well, not really. Because I was putting it off for so long, that 4.0 stable came and went, and then there were 4.0.1, 4.0.2, 4.0.3, 4.1, and 4.1.1. So instead of making one jump, I actually made two and landed on 4.1.2.

![Progress image](/assets/images/articles/tof-devlog-10/progress_183.png "Progress image")

Although that first landing was not exactly _clean_, I did manage it! After initial and automatic project conversion, there were only a few fixes needed to get the game to start. At least to the menu. As you can see, the logo is all wrong, materials all have weird colours, or not load at all.

![Progress image](/assets/images/articles/tof-devlog-10/progress_184.png "Progress image")

Getting stuff to somewhat working state wasn't all that hard, luckily. Materials and light are still way off, but there is good progress. Most of the animations in the game were broken - but I don't have all that many, so fixing them took only moderate amount of time.

I decided not to dwell on bad materials for too long, as I didn't know how to tackle them at that point. Instead, worked on fixing other stuff, like map editor, and the game board itself. A lot of things around AI became unreliable due to how *yield* behaviour changed.

Particle effects change a lot between engine versions. I could not make them identical to what they were, so had to settle on just making them look good, but different. I have also fixed a number of bugs with gamepad and mouse input along the way.

A lot of work was needed still. I have finally figured out why my materials looked bad, and was able to fix it. The bad thing was that I didn't know how to apply the same fix to the GLTF assets. I decided to re-convert everything back to OBJ. Ooooh boy...

That took a long time, but it worked better than expected. Just a reminder - we have changed from OBJ to GLTF for most assets in order to improve rendering performance. The game bloated a bit as a result, and while frames were up, loading times got worse. Moving back to OBJ shaved off about 20% from the game package size, which is nice. Loading times seem shorter as well. But even better is that the performance is awesome! But we will get to that later.

Just before starting the conversion of assets, I have moved from Godot 4.0.3 to 4.1.1. This change went smoothly - great job Godot team!

![Progress image](/assets/images/articles/tof-devlog-10/progress_185.png "Progress image")

One engine change, and a lot of assets conversions later, the game looked almost as it did back on Godot 3.5! Image here shows them side-by-side, and without knowing where to look, most people wouldn't be able to tell the difference.

Shadows look a lot better, I was able to get MSAA back on. With a few tweaks for Steam Deck, the game now ran at about 4x the performance it did previously. Where it used 10W of energy to get 30fps, not it used 5W to deliver 60 fps!

There were some nasty bugs with particle effects on Deck, that were both weird and hard to debug. In the end it turned out that some tile meshes were... _weird_... and caused particles to bug out if they ever loaded into memory.

After that, I have re-enabled missing far-dof blur, and with a few more adjustments, I have concluded the Godot 4 porting part! Yay!

After that, the working branch of the port has been merged into master, and I moved on to make actual game improvements. And there were a lot! Shame that I have not made more screenshots.

First thing was to start improving the game on the audio and quality-of-life. A few improvements to story scripting that allowed to change font size and play sounds. These are not utilised just yet, but I would love to do this in the future. At that time I would also re-work campaign maps, as now they can be defined per-campaign.

Changes to the audio samples vastly improved the feel of the gameplay, with new movements, shots, explosions and thuds. Also UI clicks changed, so now these are less offensive to the ears.

I have also added a dust particle when units move. No screenshot though. It will be visible later, as I talk about Multiplayer!

![Progress image](/assets/images/articles/tof-devlog-10/progress_186.png "Progress image")

Over time, as I made all of the campaign maps, I was making a mental list of types of tiles I would like to have. This was time to start adding them.

I have started with new buildings - both small and medium, that I could arrange into tiles. Focus here was on shops and services, as this was something that was missing from my cities.

![Progress image](/assets/images/articles/tof-devlog-10/progress_187.png "Progress image")

With buildings ready, I have used them to make a few tiles, then added damage levels.

![Progress image](/assets/images/articles/tof-devlog-10/progress_188.png "Progress image")

Railroads are usually an important part of infrastructure, but we didn't have them. These are a bit different, and required some changes in how certain tiles are treated by the editor. Instead of making a bunch of new ground tiles, these are a new decorations on top of the ground. I had to make it so that they could co-exist with some other tiles in the same space.

![Progress image](/assets/images/articles/tof-devlog-10/progress_189.png "Progress image")

Trains are useless without places to stop, so I added stops! These are dual-purpose, serving also as bus stops. Not that we have buses in the game. Or trains...

![Progress image](/assets/images/articles/tof-devlog-10/progress_190.png "Progress image")

I always found it limiting, that the only option for a monument was a dude with a flag. Took this opportunity to also make an easter egg, and put a fat rat in a hat on a pedestal.

![Progress image](/assets/images/articles/tof-devlog-10/progress_191.png "Progress image")

Another easter egg monument are two capsules from the game Boctok (Vostok).

![Progress image](/assets/images/articles/tof-devlog-10/progress_192.png "Progress image")

These tiles here are tree lanes. What is so special about these? They do not obstruct units movement, like usual tree tiles do! Can be used to decorate some roads and building approaches.

![Progress image](/assets/images/articles/tof-devlog-10/progress_193.png "Progress image")

Similarly to shops, there was another type of building missing - farms.

![Progress image](/assets/images/articles/tof-devlog-10/progress_194.png "Progress image")

Two new tiles is not much for variety, but it is enogh. Now rural areas can truly be different from sub-urban homes.

![Progress image](/assets/images/articles/tof-devlog-10/progress_195.png "Progress image")

Overall, I have created a bunch of new building tiles, including new large one for big cities. Here we can see additional small and medium ones as well, that I have not shown before.

![Progress image](/assets/images/articles/tof-devlog-10/progress_196.png "Progress image")

The castle wall I have created for the final mission was a banger, giving a lot of options. But it had a drawback - the style was only fitting for Amber Noon. So I went and created three new sets of walls - steel net, brick, and sleek white for other nations.

![Progress image](/assets/images/articles/tof-devlog-10/progress_197.png "Progress image")

This one is a minor thing - some "bubbles" for mud tiles, as up until now these were a bit barren. Looking back at these, I don't really like them. Need to make some tiling, flowing, semi-fluid "mud river" type of decoration as well.

This concludes new tiles showcase. Afterwards, I have used them to do some improvements to all of the exisitng campaigns.

Next one is AI!

![Progress image](/assets/images/articles/tof-devlog-10/progress_198.png "Progress image")

This one here is a simple map, that I have created in order to test new pieces of AI. It is intended to set up perfect scenarios for the heroes to use their abilities. Helped a lot in testing if AI would activate them - and it does!

All heroes, with the exception of the Commando, now are able to use their active skills in battle, hopefully making the battles that little bit more difficult for the players.

Commando is a special case here - his ability is teleportation, and it does not really do anything on it's own. Coding the AI so that it could consider tactial options to use it is way beyond my current capabilities. It falls into the same category as the Attack Helicopter skill of carrying troops - needs way smarter AI that actually plans something.

![Progress image](/assets/images/articles/tof-devlog-10/progress_199.png "Progress image")

The UI style is all new! This one is either huge, or not important at all, depending on your taste. Having semi-transparent rectangles and default buttons did it's job, but did not mesh well with the game style. And it also changed between engine versions, because Godot 4 decided that buttons should now look different.

The assets used for these are modified versions of ones that come from a UI pack by Kenney. Thanks, Kenney!

![Progress image](/assets/images/articles/tof-devlog-10/progress_200.png "Progress image")

What we see here is an inital design for Multiplayer menu. This is something that players wanted in ToF 1, and I didn't know if I could pull of, until I actually did.

But wait, you could say. ToF 1 did have multiplayer - both hot-seat, and online. And ToF II does have hot-seat as well. What is the difference then? Glad you asked!

![Progress image](/assets/images/articles/tof-devlog-10/progress_201.png "Progress image")

As you can probably guess by this next simple menu, this version of multiplayer is over a network! It's not the "correspondence chess" type from ToF 1, where you made your moves, then uploaded them to a central server, and waited for your opponent to respond.

It is completely live, and is intended to be used over LAN, although you can try using it over internet, as long as you are able to put the server player on a public IP.

![Progress image](/assets/images/articles/tof-devlog-10/progress_202.png "Progress image")

When hosting a game, the process is very similar to a hot-seat Skirmish - you select a map, and then see a lobby. There a differences though: only stock and online maps are allowed, so you have to publish your own creation first if you want to use it.

If a joining player does not have the online map that is being used, it will be automatically downloaded.

The lobby itself is very similar to a Skirmish screen, but with important changes. Instead of Human/AI toggle, that button allows players to join as this particular side. Once joined, all the other sides are locked out until player leaves the side. The AP and Team settings are only available to the host, with other players passively seeing what is being set.

On the bottom, there are labels with nicknames of connected players. The lobby supports dropping in and out. All players must be present and assigned a side before host can start a match. AI players are not allowed in this mode of play, I might add that later.

![Progress image](/assets/images/articles/tof-devlog-10/progress_203.png "Progress image")

Since having to input the full IP address every time is not ideal, I have implemented server autodiscovery feature, where you can see up to four servers running in your local network, and join with a single click.

This version of the screen also have configurable port, in case there was a need to change it. For the server, port is set in game settings.

<iframe width="600" height="320" src="https://www.youtube.com/embed/rBZj9EANA4s" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
</iframe>

And here it is! A short presentation of how the LAN multiplayer works. Camera is synced between players - decision I made, so that people would not miss what is happening by looking around the map while awaiting their turn.

The game also supports situation when one of the players disconnects - unless it's the host - then the game is closed and can not be restored.

There were some challanges when syncing state of the game between players - particularly on map clicks and active skills usage, but I managed.

There were other small changes and some bug fixes that I missed in this post - but they should all be in the changelog. Version 0.5.0 is now available on itch, with a new post: [https://czlowiekimadlo.itch.io/tanks-of-freedom-ii/devlog/636003/version-050-is-out](https://czlowiekimadlo.itch.io/tanks-of-freedom-ii/devlog/636003/version-050-is-out)

There are still things in the backlog that I want to add to the game, and a list of smaller fixes and improvements is growing as I test the game and get feedback. Still plenty to do!

[Read part 9 of the devlog](/tof-devlog-9)
[Read part 11 of the devlog](/tof-devlog-11)
