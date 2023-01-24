ToF 3D Devlog #8: Features all around

# ToF 3D Devlog #8: Features all around
*24/1/2023*

![Pixel art logo of game title saying Tanks of Freedom 2](/assets/images/articles/tof-devlog-8/tof2_logo_600.png "Game title logo")

Welcome to the new year and new devlog to share! And there is a lot of it. I guess me drinking more coffee helped? Or maybe because I didn't distract myself with big games this time.

The main focus was on Jade Twilight campaign, but I planned to do some features after it was complete, that would fit in the new release as well. Once I got going, I managed to build way more than I originally anticipated!

Because I want to keep a good balance of content and feature work that I do, after finishing the Sapphire Dawn campaign I wanted to switch gears. Version 0.2.0 came out right after the content was done, so all the features, that would come afterwards, were relegated to 0.3.0. It's one of the reasons this blog post has so many!

(All images here can be found in original resolution on [Github](https://github.com/P1X-in/Tanks-of-Freedom-3-D/tree/master/docs/devlog))

![Progress image](/assets/images/articles/tof-devlog-8/progress_148.png "Progress image")

First, big feature I did was to implement translations into the game. After doing that in ToF 1 I kinda dreaded this task. It used to be very tedious and error prone. Not so this time. Turns out, that Godot 3.5 is way better in that regard, helping with a lot of automation. And it supports having translation files split per language - something I did not do in Godot 2.1. Maybe I just didn't knew it was possible?

I have started with translations of the main menu interface, then the game part interface. All of that went, overall, pretty smoothly. A lot of changes in labels. I actually didn't really had to do it, I could have used the original, en text as translation keys. But that didn't feel like a right thing to do, so I added some work for myself to replace them with abstract translation keys.

I have also translated the game to PL. Any other languages would have to be contributed, so we will see if someone is willing.

There is one cool, new feature, that ToF 1 didn't have. I have learned how to set up new translations in game runtime. This allowed me to modify my campaign structure to include translations file. Now, when someone makes a custom campaign, they will be able to add translations for it as well!

This means, that I had to go back and translate the entirety of existing campaigns (tutorial and prologue included).

Aside from translations, I have added other, smaller features, that I did not document with screenshots.

There is now "Restart mission" button in the menu if you want to quickly re-start current mission.

A great suggestion from raven67854 was to add a "Next mission" button to the mission summary screen, so that you don't have to back out to the campaign screen and select next one.

Summary screen has been slightly improved as well. Now, when in campaign mission, it says "Mission success" or "Mission failed" instead of "X won the game", which is way more fitting, as some missions don't exactly end in a victory.

When buying units or using abilities, they are now greyed-out with appropriate text info if player does not have enough AP. No more confusion why you can't buy a unit! There is also a popup informing a player that they spent all of their AP, so that they know they have to end the turn.

AI got some improvements. I have fixed a bug that prevented it from recruiting heroes. Oops! It is also capable of "saving up" AP for next turn to buy bigger units and heroes if it does not have enough, instead of spending it all on smaller ones.

![Progress image](/assets/images/articles/tof-devlog-8/progress_149.png "Progress image")

Another UI improvement - active abilities now have a secondary "range" that is being drawn to show where it works. For offensive abilities, these are usually the same, but for area buffs, the real ability range is zero (cast on self), but it affects some area around hero (as shown in screen).

![Progress image](/assets/images/articles/tof-devlog-8/progress_150.png "Progress image")

Some units have more unique range, like the Tank only being able to shoot in straight lines. This is supported as well.

With the Jade Twilight campaign, I feel like every single mission introduces something new and unique, that was never done in previous campaigns. I hope, that these quirks are going to keep players interested and engaged.

![Progress image](/assets/images/articles/tof-devlog-8/progress_151.png "Progress image")

First mission has a side-area that exists only for a cut-scene. It's not strictly connected with the mission, but I have no way to do any kind of off-screen ones, so it's there, tucked in a corner.

But the unique thing about this mission is that the player has two heroes at the same time. Because of this, I have re-implemented how passive abilities are being handled, so that now multiple can apply.

![Progress image](/assets/images/articles/tof-devlog-8/progress_152.png "Progress image")

Second mission has some time pressure, because at certain points it modifies the map in small, but significant ways. It is the first time when a story script adds or removes ground itself.

![Progress image](/assets/images/articles/tof-devlog-8/progress_153.png "Progress image")

No screenshot for the third mission, but instead we can see changes in the Skirmish setup window. And this is because this particular mission, for the first time, introduces two AI players co-operating with each other! For this, I had to implement team-play into the game, and support it for Skirmishes as well.

It was only a bit buggy and painful, as there were multiple places that kept breaking due to bad friend-foe detection.

You might remember, that the second campaign had player co-operate with an AI player, but then the AI was separated from player to avoid them fighting each other. No need for such things now.

![Progress image](/assets/images/articles/tof-devlog-8/progress_154.png "Progress image")

This mission has a unique quirk of requiring player to NOT attack the enemy base. It is a spin on earlier "hold ground" idea, but this time, instead of scripted waves, there is an untouchable AI base for more organic attacks.

Also, it is the first time Jade Twilight faces agains Ruby Dusk.

![Progress image](/assets/images/articles/tof-devlog-8/progress_155.png "Progress image")

Mission 5 does not introduce anything new in terms of mechanics, but it is the very first one, where all four nations are present on the map (technically, at least).

![Progress image](/assets/images/articles/tof-devlog-8/progress_156.png "Progress image")

Around this time, I have added a couple of "cheat buttons" into the game, that work only in debug builds. Made it easier to test certain scenarios without having to re-play entire missions. (Forshadowing later paragraphs in this post, saving and loading helped with this as well!)

In this mission, player will be faced with the same enemy hero multiple times. It will not be simply spawned from HQ, like in one of the missions before, but they will do story stuff.

It is also the first time when buildings captured by player are going to offer them different capabilities than when they were operated by AI. It greatly increases this maps difficulty.

Because of this map, I have done further AI rebalancing, that cascaded into other maps, so I had to go back and neuter AI resources in some of them, to make them playable.

![Progress image](/assets/images/articles/tof-devlog-8/progress_157.png "Progress image")

The final mission of the Jade Twilight campaign contains some banter between heroes. It's unique twist is that it is the first map where your main objective is to defeat a specific hero.

So this is it for the campaign. I think the story is engaging and the gameplay should be challanging. Let's see what kind of features I have built afterwards!

![Progress image](/assets/images/articles/tof-devlog-8/progress_158.png "Progress image")

I didn't like how the game map was limited, but it sit on this big patch of water, with land ending awkwardly. To fix this, I have added a frame to the map, scaled down the water, and added a black "void" around it. As a bonus, it gives the game more of a "board game in a box" feeling.

![Progress image](/assets/images/articles/tof-devlog-8/progress_159.png "Progress image")

Some missions happen around sea areas. I have also though about adding sea units in future. This gave me an idea to add a lighthouse into the game. And it doubles up as a Tower building. It is the first "neutral" building in the game.

![Progress image](/assets/images/articles/tof-devlog-8/progress_160.png "Progress image")

Some seaside/riverside missions have dedicated beaches, but they looked a bit barren and boring. I have added a few beach decoration tiles. These are passable, and will clip with units, but I think this is fine.

![Progress image](/assets/images/articles/tof-devlog-8/progress_161.png "Progress image")

Normal and country road connections were lacking, with only a straight connections available. That did not always fit in my idea of how road should work on the map, so I have added new ones. There are actually more than can be seen in the image, but they do not cover all possible variations. I guess I can address that in future.

![Progress image](/assets/images/articles/tof-devlog-8/progress_162.png "Progress image")

For some missions I might want to create some kind of convoy, that needs to be protected. For this, a new Truck unit is here! With four different styles. It works just like an NPC, and shares stats with them. I might change them in future to become a fully-fledged unit.

![Progress image](/assets/images/articles/tof-devlog-8/progress_163.png "Progress image")

This is a big one! It's not a looker, with only one, simple window added to the game, but it does so much. The "Save/Load" button, that has been hanging in the menu and doing nothing, now opens this new window. You can save the game at any moment - an improvement over ToF 1, which offered only autosaves at the start of the turn. It properly saves and loads the state of units, map modifications and story triggers. Autosaves are back as well, but this time at the end of the turn instead of the start.

This helped a lot with story script testing, as now I can save the game in crucial moment and test different outcomes without having to re-play entire mission. Neat.

<iframe width="600" height="320" src="https://www.youtube.com/embed/y4IdXwKH-rQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
</iframe>

Do you remember the game just showing menu when started? No more! Now we have a simple intro, with camera moving along the map to a position where it used to be for the menu view. It also brings back the ToF 1 intro jingle by Grand Beats. It is a simple sequence, but adds some character.

The intro sequence is not skippable, so to not make it too annoying, you can turn it off in game settings.

![Progress image](/assets/images/articles/tof-devlog-8/progress_166.png "Progress image")

Another big feature, that I am bringing back from the first game. Online features! Here we see a screen where player has to consent to their game being uniquely registered with the server before they can start using online features. This is required so that uploaded maps can have a specific author (and later for online play).

![Progress image](/assets/images/articles/tof-devlog-8/progress_167.png "Progress image")

Speaking of uploaded maps, first step was to re-work map picker and split it in categories. Built-in stock maps are now separate from custom creations. Downloaded ones are also in their own category. This is all still local, on the same device.

![Progress image](/assets/images/articles/tof-devlog-8/progress_168.png "Progress image")

For now, only map sharing is being added, so the buttons on top are disabled. Online menu offers options to either upload your own custom map, or download one created by someone else.

Map uploads utilise the newly modified map picker. It is limited to custom creations only, to avoid re-uploads of stock and downloaded maps without any modifications - an issue that was giving me headache in ToF 1.

![Progress image](/assets/images/articles/tof-devlog-8/progress_169.png "Progress image")

For map downloads, I have done even more modifications to the map picker! The system of downloading maps using codes is back, but this time there is no need to use your web browser to get them! I mean, you still can - the online browser has been updated! But the listing is now also done in-game, with "Latest" and "Top downloads" filters.

When map is selected, it's code is filled into an input. It is also possible to input the code directly if you have it.

Map thumbnails are different here - in order to not download every single map content to show them, they are the same PNG files used by the web browser being loaded in.

![Progress image](/assets/images/articles/tof-devlog-8/progress_170.png "Progress image")

In order to separate new maps from the old ones, the server has a set of "v2" endpoints now. Interface between "v1" and "v2" is the same though, so it was very easy to list and download old maps.

Editor now has ToF 1 map import function, re-using the browser. It fetches old map data and feeds it into the editor, where it is being interpreted. These maps are simplistic and require a lot of fixing, but at least it is an option.

And this is it for today. Overall, I'm very proud with the amount of stuff I managed to do in the last months. As usual, new build is available on itch: [https://czlowiekimadlo.itch.io/tanks-of-freedom-ii](https://czlowiekimadlo.itch.io/tanks-of-freedom-ii)

The Trello board looks less intimidating with every task I finish. I think I'll take a very short break and get back to work!

[Read part 7 of the devlog](/tof-devlog-7)
