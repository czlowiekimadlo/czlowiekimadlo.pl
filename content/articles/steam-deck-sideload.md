ToF II: Steam Deck sideloading guide

# ToF II: Steam Deck sideloading guide
*27/02/2024*

![Pixel art logo of game title saying Tanks of Freedom 2](/assets/images/articles/steam-deck-sideload/logo.png "Game title logo accompanied by Steam Deck logo")

Recently it came to my attention, that it is not obvious to people how to sideload ToF II onto their Steam Deck. I have decided to make a guide to help with this! (Although the process described here is not specific to my game and can be used for almost any non-Steam game.)

## Some pre-requisites

While not strictly required, I would highly advise to get some mouse and keyboard connected to your Steam Deck for this process. Be it either wireless, or wired via USB-C adapter. While it is possible to do this using native input only, it's going to be much harder.

## How to sideload a game?

The process of sideloading ToF II (or any other game) is not hard! Let's get to it!

1. Go to power options on Deck and select _Switch to Desktop_

![Progress image](/assets/images/articles/steam-deck-sideload/step1.jpg "Progress image")

2. Once in Desktop mode, use a web browser of your choice to download the game from [the itch.io page](https://czlowiekimadlo.itch.io/tanks-of-freedom-ii). Make sure to select the latest Linux version!

![Progress image](/assets/images/articles/steam-deck-sideload/step2.png "Progress image")

3. Unzip the game into a folder of your choice - make sure it is one in your user folder though! Anything that is placed outside of `/home/deck` folder can get removed upon next system update!

![Progress image](/assets/images/articles/steam-deck-sideload/step3.png "Progress image")

4. Make sure that the downloaded executable file is actually executable. Right-click on the `.x86_64` file and go into Properties.

![Progress image](/assets/images/articles/steam-deck-sideload/step4.png "Progress image")

5. Open the Steam client using icon on your desktop, then select `Games -> Add non-Steam game to My Library` (Sorry for a bad screenshot, it's hard to capture a dropdown menu)

![Progress image](/assets/images/articles/steam-deck-sideload/step5.png "Progress image")

6. In the new window use `Browse` on the bottom.

![Progress image](/assets/images/articles/steam-deck-sideload/step6.png "Progress image")

7. Select the executable file in your folder. You have to clear out default filters in order for it to show up!

![Progress image](/assets/images/articles/steam-deck-sideload/step7.png "Progress image")

8. After that, click Add in the previous window. Game is now added to your library and (hopefully) should run in both Desktop and Console modes!

![Progress image](/assets/images/articles/steam-deck-sideload/step8.png "Progress image")

## Making it pretty

Now that we have the game added, we can play it, but it does not look the best in the library. Luckily, there are some images in the game repository that we can use to make it better. Backgrounds and cover images can be found [in the docs part](https://github.com/P1X-in/tanks-of-freedom-ii/tree/master/docs/devlog/steamdeck), logo [can be found in artifacts](https://github.com/P1X-in/tanks-of-freedom-ii/blob/master/docs/artefacts/tof2_logo.png) while icon can be found in [assets](https://github.com/P1X-in/tanks-of-freedom-ii/blob/master/assets/icons/tof2_icon1024.png)

9. When you click on the gear icon and select `Manage`, in the new window you can set a name and an icon for the game.

![Progress image](/assets/images/articles/steam-deck-sideload/step9.png "Progress image")


10. Going back to the game page in library, by right-clicking on the black background on the top we can set a custom background image and logo.

![Progress image](/assets/images/articles/steam-deck-sideload/step10.png "Progress image")

11. Last element is a cover image for the library shelf. By right-clicking the empty cover on the shelf, you will find apropriate option in the menu. (There is a protrait cover image in the folder linked above.)

![Progress image](/assets/images/articles/steam-deck-sideload/step11.png "Progress image")

## Optimised game settings

Upon first start, game should detect it is being run on the Steam Deck, and modify the settings accordingly. But this might not work, so if that is the case, here are recommended settings for the game, so that it does not stutter and not eat your battery (unless you want it to):

- Enable Fullscreen
- Disable all shadows (including decorative)
- Disable MSAA
- Disable FXAA
- Disable V-sync
- Set FPS and input FPS to 60 (or 90 for Deck OLED, though I have not tested this)

## Finishing thoughts

Hopefully, once the game is finished, I'll publish it on Steam myself, so that none of this is needed.
