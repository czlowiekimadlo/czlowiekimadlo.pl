ToF 3D Devlog #5.5: The not shiny one

# ToF 3D Devlog #5.5: The not shiny one
*18/3/2022*

![Pixel art logo of game title saying Tanks of Freedom](/assets/images/articles/tof-devlog-5-5/tof_logo.png "Game title logo")

Welp, a bit over a month is not 'months' per se, so I did well? I guess? This one is still going to be shorter though. I have arrived at that point, where I had to start creating missions for story content, and it is a *slog*. But we will get there.

(All images here can be found in original resolution on [Github](https://github.com/P1X-in/Tanks-of-Freedom-3-D/tree/master/docs/devlog))

Some players, especially in asian markets, loooove their stats. Even if it is not very meaningful, they just want that number. Also, being able to fully asses unit state and capabilities is good. So I made stats screen for units. It shows current HP and MP, and it even includes level bonuses and hero buffs. It also shows available skills. I think I could add some descriptions later on. For now, this will do.

![Progress image](/assets/images/articles/tof-devlog-5-5/progress_113.png "Progress image")

Controlls for the game are becoming more and more complicated, with many options for both gameplay and editor being hidden away, or not otherwise obvious. [Kenney](https://kenney.nl) created an awesome image pack with various buttons that is ideal for telling player what to do. Here is a new menu that shows all of the current controls.

![Progress image](/assets/images/articles/tof-devlog-5-5/progress_114.png "Progress image")

ToF1 had an Autumn season theme available for maps. It wasn't very good - mostly muddy brown elements. It looked dull, but what can you do with 32 colours. In order to accomodate some of it, I have created re-coloured leaf trees with yellows, oranges and reds. This is mostly meant for maps that are located in the Ruby Dusk nation territory, as it will be more on the Autumn-Winter side.

Looking at that screenshot makes me think, that I could try adduing some muddy ground tiles. I expect them to come out dull, but that is half the point. Could think about sickly-green swamp. Some tall grass maybe?

Also, created this map to show it off, I think I could add it as a stock skirmish map. Oh, and there is a big stone bridge! It is a low-tech alternative to the metal one. Have you noticed it?

![Progress image](/assets/images/articles/tof-devlog-5-5/progress_115.png "Progress image")

After some short concideration, I have decided, that flying units not being able to fly is a weird and unintuitive design decision. So I decided to make them fly. Somewhat. I have added special "air" tiles, that only units with flying capability can occupy. It also introduced new, special type of tiles, that are visible in editor, but not in game. Not sure what else it could be useful for, but we will see. Sea units maybe?

I decided to go this way instead of just allowing helis to fly anywhere over the water, because I do not want players to go off into the distance with their units.

![Progress image](/assets/images/articles/tof-devlog-5-5/progress_116.png "Progress image")

Here we can see it in action in-game: tiles are not visible, but a red Attack Helicopter can fly over to the other side. This also opens new tactical possibilities, that can be designed on maps. Surprise back attacks are in.

After that, I have introduced one more change. Flying units can now cross over any terrain: forests, cities, mountains, etc. They can't occupy tiles with these, though. Also, they can't fly over playable buildings and enemy units. I am yet to see if this huge increase in mobility is going to make hit-and-run tactics gamebreaking or not.

![Progress image](/assets/images/articles/tof-devlog-5-5/progress_117.png "Progress image")

As I mentioned in the beginning, I have started working on Ruby Dusk campaign. I have decided, that each campaign should have around 10 missions. This one is going to have 9, because running out of ideas is a thing. So far, I was able to create 5 of them!

I will not be showing too much here though, because I do not want to spoil the story. If someone is interested, you can either look it up in the documentation, or have a look at the code. Or, even better, go and play it! In order to unlock it, Prologue needs to be completed first.

![Progress image](/assets/images/articles/tof-devlog-5-5/progress_118.png "Progress image")

Real talk now. Creating story content is hard. Coming up with balanced and interesting maps is hard. Writing dialogues is hard. Unless you are good at those things, you should seriously consider getting help with this. Spread the workload, get more ideas, different perspectives, professional opinions. Tanks of Freedom is just my open-source hobby, and I can't afford to hire help, so I will do it on my own, even if I am not very good at it. Resulting campaign might not be very good or interesting, and it's fine. I will learn.

Building campaigns is going to take time, and there isn't going to be much to show during this time. I intend to alternate between campaigns and some other work, just to be able to screenshot something. I already have a number of ideas to implement after Ruby Dusk is done, but before starting Sapphire Dawn story.

Current world events are making me a bit stressed and anxious, which is messing me up a bit. But there is work that needs to be done. So I'll be fine. I didn't want the second game to be as political as the first one, but now I am considering doing some of that content, probably as a DLC campaign. And this time it would not be as mild as the first one, since all bets are off. No promises though, because making maps and stories and dialogues is draining for me.

[Read part 5 of the devlog](/tof-devlog-5)
[Read part 6 of the devlog](/tof-devlog-6)
