ToF II Devlog #11: Going back Online

# ToF II Devlog #11: Going back Online
*02/02/2024*

![Pixel art logo of game title saying Tanks of Freedom 2](/assets/images/articles/tof-devlog-11/tof2_logo_600.png "Game title logo")

New year, new update. This time I tried to actually work instead of just slacking off. We have quite a lot of changes to discuss this time, though not much in terms of screenshots.

This time I have focused on functional changes, bugfixes and improvements. The list of tasks on the board shrunk down significantly, and I think there is light at the end of that tunnel.

Since Godot Engine development never stops, there is always new version to update to, just around the corner. This time we have moved from 4.1.2 to 4.2.1. Not that big of a change, but changes were significant enough that I suspect a couple of things might have broken silently. I already suspect Steam Deck detection might be broken, but since this is a recent find, I will address this in next version.

I have also added Multiplayer to the game! For the third time!

(All images here can be found in original resolution on [Github](https://github.com/P1X-in/Tanks-of-Freedom-3-D/tree/master/docs/devlog))

![Progress image](/assets/images/articles/tof-devlog-11/progress_205.png "Progress image")

This development period started with something simpler (but still signigicant!). It always bugged me that in order to change the sound volume, player has to abandon current match and go back to the main menu. Transplanting the settings window into the game itself was easy enough, but presented me with some additional challange.

Some of the game settings were not applied right away, and needed a scene reload. Some of them were applied only once, at match start, and could not change without restart. This prompted me to use a signal, that gets propagated every time any setting changes. It allows various parts of the game to react to the settings that impact them.

While at the topic of settings, I have added an option to set FPS to 90, so that it better serves new version of Steam Deck.

I did get some reports from players that using just LMB drag for camera movement is not enough. And I agreed! This was mostly a leftover from ToF 1, where it was tuned to work with touchscreens, but since this game is not meant to be played on a touchscreen, it made little sense. I have started looking into what could be improved, and decided to add an RMB drag, as well as screen edge pan - quite common in strategy games. That pan option can be disabled in settings, just in case someone does not like it.

![Progress image](/assets/images/articles/tof-devlog-11/progress_206.png "Progress image")

Another common issue was that some people didn't like how you had to hold down mouse wheel to end a turn, and it was completely impossible to end a turn on a touchscreen (I know I don't support it, but still...). I decided to merge this with another issue - that people often did not understand (and failed to read tutorial) how to use unit abilities. As a result, I have added a few new buttons to the game UI. These show up only if a player uses a mouse, and allow them to end turn, open unit stats screen, and access unit abilities.

Another small improvement for mouse users is that all radial menus can now be closed by clicking away from it. Previously these only closed when clicked RMB or the *Close* option in the menu. Small thing, but helpful. I have also found a couple of bugs with radials along the way and fixed them (You can now unban units in editor).

In the previous update I have added LAN multiplayer option, which was awesome, but lacked one important feature - AI players. It's cool to be able to team up with your friend against AI, and this was only possible if playing in hot-seat. Adding AI required some rework of the lobby screen, new rules on when the game is ready to be started, and some new methods for game actions sync. AI does not perform it's actions exactly how players do, so previous click syncs did not work. Most issues were around skill usage, where it would not propagate to other clients.

Along the way I have found a source of an annoying bug where camera would sometimes fail to show the units moving during AI turn, and fixed it! I have also made an attempt to fix a bug where units would fail to animate their movement path fully, resulting in visually misaligned models. This is very confusing, as logically the are placed where they should, but player clicks on empty tiles where they see units. I can't really reproduce this, so my attempt here is blind, so we will see how it works out.

I could have prepared some screens or recordings of AI working, I think I was too lazy to do it, or just forgot.

With that important feature working, I have started another big feature - Multiplayer! But this time it's online. The LAN implementation is great, but it requires players to be able to "see" the host - meaning that they need to have public IP address if they want to play over the internet. Not great. After thinking about this for a bit, I came up with somewhat crude, but working solution.

Since responsiveness is not that important in this game, I have decided to create a very simple relay server using Node.js. It's inner workings are really simple - it's just a chat with private rooms. Game host requests a new room, then others join in using provided code. After the session is established, clients talk to each other by sending each other messages.

It took a bit of trial-and-error to figure out how to connect a Godot client to this server using websockets, but in the end it worked quite well.

On the client side, I did a bit of a lazy approach, where I duplicated both lobby and multiplayer game board scenes, and then started replacing native multiplayer features with a relay connector. Implementing that connector was the most time consuming part. One of the things that caused most issues was numeric values getting turned into strings (because communication uses json) and not getting properly translated back on the other end. Because of this, I had to add a bunch of int casts.

But, overall, the conversion from LAN P2P to the internet relay server went smoothly, and I had a working game in just a couple of days.

<iframe width="600" height="320" src="https://www.youtube.com/embed/3OtmunqY4KM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
</iframe>

This looks just like the LAN version of multiplayer, but here we can see the output of the relay server as well. This relay was hosted on another machine in my LAN though. Putting it on my public server was another thing.

Ever since I have added online features to ToF 1, I have been hosting my own server on a VPS. It worked well over the years, but because I have performed a distro upgrade on it just once, it was a bit outdated. And dependabot on Github was scolding me that it used very old and not secure dependencies. It was time to start upgrading.

I have started with the server code. I expected this part to be quite painful, but... it was fine. Easy even. I have updated all dependencies to their latest versions. Then, deployed the code to my local box that I used for relay testing. There I have repeated the steps listed in my Readme on how to install the server, and it just worked! It was quite amazing, really, because the core code did not require a single change, despite applying years of dependencies upgrades to it. I guess Python, and specifically Flask, devs really care about not breaking compatibility.

As for the VPS itself - as I mentioned - the distro was old. It required three distro-upgrades in a row. Knowing how many things could go wrong, I have created a snapshot of the machine and got to work. After first upgrade, I have managed to break some stuff. First, I have purged some database data, that I wanted to keep, and secondly, I have botched a kernel upgrade, bricking the VPS.

Luckily, I had that backup! Started over, this time knowing what I did wrong, and the update went well! Three new distros later, the server was running, and half of the stuff still worked! The other half did not, but I expected worse, so it was fine.

Blog host with PHP worked just fine, the ToF server did not start. As it turned out, MySQL was no longer being distributed, so upgrade removed it. I have installed MariaDB instead. It picked up the old databases, just like that! Next, I had to remove old virtualenv, created new one, then installed new deps. Server started and worked flawlessly.

Last part of the upgrade was to set up the relay for ToF II. Everything I needed was available in repos. I have added process manager (because node.js is quite bad at managing itself), and set it all up. Switched my game clients to this remote relay, and the game worked!

![Progress image](/assets/images/articles/tof-devlog-11/progress_208.png "Progress image")

A small improvement to the multiplayer settings to decouple the client from official servers. It is now possible to input address and port of own, custom server and relay. Now players don't have to rebuild the client just to play on their own instance.

![Progress image](/assets/images/articles/tof-devlog-11/progress_209.png "Progress image")

Another small change was to add an end turn confirmation prompt if player performed no moves, as well as a new setting allowing them to shorten the end turn progress bar.

I have also added a few new tiles dedicated to building railway bridges, and a new mud decoration. These were not significant enough to take a screenshot of.

This is all I had for version 0.6.0, which is now available on itch. There is also a new post: [https://czlowiekimadlo.itch.io/tanks-of-freedom-ii/devlog/675546/version-060-is-out](https://czlowiekimadlo.itch.io/tanks-of-freedom-ii/devlog/675546/version-060-is-out)

[Read part 10 of the devlog](/tof-devlog-10)
