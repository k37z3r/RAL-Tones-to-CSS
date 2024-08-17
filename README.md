# RAL-Tones-to-CSS
![GitHub Last Commit](https://img.shields.io/github/last-commit/k37z3r/RAL-Tones-to-CSS)
![GitHub Created At](https://img.shields.io/github/created-at/k37z3r/RAL-Tones-to-CSS)
![GitHub language count](https://img.shields.io/github/languages/count/k37z3r/RAL-Tones-to-CSS)
![GitHub top language](https://img.shields.io/github/languages/top/k37z3r/RAL-Tones-to-CSS)
![GitHub repo file or directory count](https://img.shields.io/github/directory-file-count/k37z3r/RAL-Tones-to-CSS)
![GitHub repo size](https://img.shields.io/github/repo-size/k37z3r/RAL-Tones-to-CSS)




a list of color tones and the corresponding HEX RGB HSL HWB CMYK NCOL XYZ L*a*b* xyY LCh HTML/CSS Colorname

## infos
The hex codes used in this Repo are only approximations of the RAL tones.
you can look up which ral tones are supported in the [csv](csv) / [html](html) / [css](css) / [json](json) folders. the data sets are identical and only adapted to the corresponding file format

## howto use at CSS
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


## howto use direct at HTML
* download [css/ral-tones.min.css](css/ral-tones.min.css)
* download [css/c-ral-tones.min.css](css/c-ral-tones.min.css)
* download [css/bg-ral-tones.min.css](css/bg-ral-tones.min.css)
* put the downloaded files into {your-css-dir}
* open your html-file and add between ```<head>``` and ```</head>```
```html
<link rel="stylesheet" href="{your-css-dir}/c-ral-tones.css"> <!-- for text-color -->
<link rel="stylesheet" href="{your-css-dir}/bg-ral-tones.css"> <!-- for background-color -->
```
now you can use the ral tones at your css file for define background-color or text-color by using classes
```html
<div class="bg2008">this div has the background color ral2008</div>
```
**OR**
use at your html for setup color
```html
<div class="c2008">this div has the text color ral2008</div>
```
**OR**
you can also combine the classes like
```html
<div class="c7021 bg1012">this div has the text color ral7021 and background color ral1012</div>
```
## licensing
RAL-Tones-to-CSS © 2024 by Sven Minio is licensed under Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International. To view a copy of this license, visit https://creativecommons.org/licenses/by-nc-sa/4.0/
This license requires that reusers give credit to the creator. It allows reusers to distribute, remix, adapt, and build upon the material in any medium or format, for noncommercial purposes only. If others modify or adapt the material, they must license the modified material under identical terms.

## other infos
RAL tones are actually intended for solids, so it is not possible to display these tones correctly on a monitor. you can buy a color fan, color cards or other physical objects to compare RAL tones at https://www.ral-farben.de/. On this website you can also buy a fully digitized database of RAL tones as RGB values. I do not own this database, if there is a match to the official database of the company RAL gemeinnützige GmbH, this is solely due to my research, which I have done via Gemini, Google, ChatGPT and Wikipedia.
