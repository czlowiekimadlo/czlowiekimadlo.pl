ToF 3D Devlog #6: Got results!

# ToF 3D Devlog #6: Got results!
*8/6/2022*

![Pixel art logo of game title saying Tanks of Freedom 2](/assets/images/articles/tof-devlog-6/tof2_logo_600.png "Game title logo")

Ah, managed to do so much work on the game it gave me the lazies again! I've been sitting on this material for over a month, but I'm finally getting to it. First of all, as you might have already noticed, we have a new logo! I wanted to make something completely new, but realised I do not have enough skills to design an entire new one. And maybe I shouldn't cut off from the ToF 1 branding just yet. So I decided to use the old logo as a basis and work from there.

As I discussed in earlier posts, there wasn't much to show off while I was working on the first campaign. Especially without spoiling it. Luckily, this is done now, and I also managed to do some work on assets and code afterwards, just to add some more polish.

(All images here can be found in original resolution on [Github](https://github.com/P1X-in/Tanks-of-Freedom-3-D/tree/master/docs/devlog))

Even though I want to keep the content spoiler-free, I guess a small sneak-peek on a map for the final mission of the Ruby Dusk campaign can't hurt.

![Progress image](/assets/images/articles/tof-devlog-6/progress_119.png "Progress image")

Here we can see how the new logo sits in the game menu. It is very similar to the old one, so the difference isn't all that striking. With first campaign done, an early version of the game could be released, so I saw it fitting to have it accompanied with a new logo. It is also present on a new splash screen for game loading.

![Progress image](/assets/images/articles/tof-devlog-6/progress_120.png "Progress image")

While working on the campaign, I sometimes felt a bit constrained with the selection of tiles. I decided to create a number of new tiles, as well as re-create some tiles from ToF 1 to fill-in the gaps. Let's start with a swamp tile.

![Progress image](/assets/images/articles/tof-devlog-6/progress_121.png "Progress image")

While playtesting the campaign maps, I have often complained that I couldn't easily tell if active abilities for a particular units are available or not without opening the radial menu. So I have added ability icons to the unit highlight. It will also show cooldowns if applicable.

![Progress image](/assets/images/articles/tof-devlog-6/progress_122.png "Progress image")

Even though there were no desert/tropical biomes in the Ruby Dusk campaign, I decided to add some palm tree tiles for future content.

![Progress image](/assets/images/articles/tof-devlog-6/progress_123.png "Progress image")

Game already had a good variety on grass, but there could always be more. In order to be a more interesting, I decided to add a couple of tall grass tile decorations. Good for wild and swampy areas.

![Progress image](/assets/images/articles/tof-devlog-6/progress_124.png "Progress image")

Following the same spirit, I have added a wheat field tile for more village detailing. Additionally, tall grass and wheat can be used to try and hide some units. There are no stealth mechanics, but some sloppy player can miss them? Maybe?

![Progress image](/assets/images/articles/tof-devlog-6/progress_125.png "Progress image")

While looking at sand tiles, I thought they looked a bit plain. I decided to add tiled detail that can be applied similarly to grass.

![Progress image](/assets/images/articles/tof-devlog-6/progress_126.png "Progress image")

In ToF 1 there were road transition tiles, that allowed to connect asphalt and dirt roads. Without them connections seemed a bit harsh. Here we can see those tiles in three different biomes.

![Progress image](/assets/images/articles/tof-devlog-6/progress_127.png "Progress image")

After some consideration, I decided to add two more swamp tiles. These are almost the same as the first one, only difference being that they have inlets and outlets for a river flow, and can be connected with other bodies of water.

![Progress image](/assets/images/articles/tof-devlog-6/progress_128.png "Progress image")

One of the most limiting tile types were Forest tiles. With only three per type, it took a bit of rotation and mixing in order to make large forests not look same-y. Here we can see a few more Forest tile types, that should help.

![Progress image](/assets/images/articles/tof-devlog-6/progress_129.png "Progress image")

Making good looking mountine tiles is a bit tiring, so I limited myself to one big rock, as this was the most lacking department.

![Progress image](/assets/images/articles/tof-devlog-6/progress_130.png "Progress image")

Some more Autumn-themed forest tiles.

![Progress image](/assets/images/articles/tof-devlog-6/progress_131.png "Progress image")

And one more palm tree, just in case.

![Progress image](/assets/images/articles/tof-devlog-6/progress_132.png "Progress image")

Here is something different. Options menu always felt cramped and limited, so I decided to re-do it. Now it has buttons on the side that allow for tab switching for even more space. Visible here is new Audio tab, that introduces volume sliders instead of a simple On/Off toggles.

![Progress image](/assets/images/articles/tof-devlog-6/progress_133.png "Progress image")

With all of that work done and me being close to creating first alpha version, I decided to ask [Rémi Verschelde](https://twitter.com/Akien) to test it a bit on his Steam Deck, as I am still waiting in a long queue for mine.

![Progress image](/assets/images/articles/tof-devlog-6/progress_134.jpg "Progress image")

While the game is playable, there are some big issues - mostly in the performance department. With that in mind I started working on some optimisations, that could help. Since my powerful desktop that I use for ToF development never had much issues, I have been testing them on my Linux laptops - one with Quadro RTX 3000, and one with integrated intel. While the nvidia card showed a bit of gains, that Intel is still dead in the water.

I have put in a lot of effort into re-working most of the tile assets, optimising them using Blender. I have traded mesh size for texture size. Overall it improved the situation, although it introduced some tiny visual glitches as well. And load times suffered a lot. I'm not yet decided on wether or not I should go back and revert that, while I still could. Especially that adding options to disable shadows makes way more difference. I have permanently disabled shadows on some tiny details, that are not visible anyway.

Overall, there were a lot of coding changes in the meantime, that were not covered by screenshots:
- fixed AI pathfinding lockup
- unit stats now show kills
- added some new controls for keyboard
- editor can disable AI for units so they can be used as decoration
- icons for Windows export
- Mobile Infantry and Scout Helicoter AI now can use their active abilities
- story scripts can pause/unpause AI for units
- story scripts can ban/unban unit production in particular buildings
- fixed AI for Infantry and Tank abilities so they will approach to use them
- AI failsafe that ends turn if AI throws itself into a loop
- settings for disabling shadows for performance
- settings for hiding small details (grass, flowers, etc.) for performance

There were also quite big changes in the sound department! Game got new soundtracks provided by [Reduz](https://twitter.com/reduzio) and they are awesome! I have also decided to challange myself and learn a bit about audio and made a bunch of new audio clips for the game. Not all of the units got them, but a lot of them did. Expect some new movement sounds (especially those that were previously harsh to the ears), new attack sounds, new ability sounds. There are also new UI clicks.

While working on sounds, they always sounded way off. It took me some time to figure that one out, but I finally found out, that it was due to positional audio. As it turned out, positional player made it so that sounds were always muffled, and heavily shifted to one side. I tried to do something about it, but whatever I did, it was always off. Because of that I decided to replace all players with their non-positional version. Now you can't hear the tank firing on the side, but that was never a priority, and everything sounds WAY clearer. I guess it must be some kind of bug in Godot, or I just don't know how to do it properly.

With all of that work done I have managed to do one more thing before the lazy got me. I have created an itch.io page for the game, with builds available! You can check it out here: [https://czlowiekimadlo.itch.io/tanks-of-freedom-ii](https://czlowiekimadlo.itch.io/tanks-of-freedom-ii). While on it, I decided to do at least a bit of work on my itch page as well: [https://czlowiekimadlo.itch.io/](https://czlowiekimadlo.itch.io/) so you can check it out if you are interested in my other games.

And that is it! For now. I'm spending some time playing games, but I can feel the itch for development will return soon. I'm still considering if I should do some more features, like save/autosave, or should I move to the second campaign. We will see.

[Read part 5.5 of the devlog](/tof-devlog-5-5)
