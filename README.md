# RAL-Tones-to-CSS
a list of color tones and the corresponding HEX RGB HSL HWB CMYK NCOL XYZ L*a*b* xyY LCh HTML/CSS Colorname

## infos
The hex codes used in this Repo are only approximations of the RAL tones.
you can look up which ral tones are supported in the [csv](csv) / [html](html) / [css](css) / [json](json) folders. the data sets are identical and only adapted to the corresponding file format

## howto use
* open your css
* write at the top of your file
```css
@import url("https://cdn.statically.io/gh/k37z3r/RAL-Tones-to-CSS/main/css/ral-tones.min.css");
```
**OR**
* open your css
* write at the top of your file
```css
@import url("https://cdn.jsdelivr.net/gh/k37z3r/RAL-Tones-to-CSS@main/css/ral-tones.min.css");
```
**OR**
* download [css/ral-tones.min.css](css/ral-tones.min.css)
* save ral-tones.min.css at the same dir as your css
* open your css
* write at the top of your css-file
```css
@import url("ral-tones.min.css");
```


now you can use the ral tones at your css file e.g. as background-color, background, color. write at your css code like
```css
span{
    background-color: var(--ral9005);
    color: var(--ral3033);
}
```
**OR**
write at your html code like
```html
<div class="bg2008">this div has the background color ral2008</div>
```
## licensing
RAL-Tones-to-CSS © 2024 by Sven Minio is licensed under Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International. To view a copy of this license, visit https://creativecommons.org/licenses/by-nc-sa/4.0/
This license requires that reusers give credit to the creator. It allows reusers to distribute, remix, adapt, and build upon the material in any medium or format, for noncommercial purposes only. If others modify or adapt the material, they must license the modified material under identical terms.

## other infos
RAL tones are actually intended for solids, so it is not possible to display these tones correctly on a monitor. you can buy a color fan, color cards or other physical objects to compare RAL tones at https://www.ral-farben.de/. On this website you can also buy a fully digitized database of RAL tones as RGB values. I do not own this database, if there is a match to the official database of the company RAL gemeinnützige GmbH, this is solely due to my research, which I have done via Gemini, Google, ChatGPT and Wikipedia.
