# RAL-Tones-to-CSS
![GitHub Created At](https://img.shields.io/github/created-at/k37z3r/RAL-Tones-to-CSS)
![GitHub Last Commit](https://img.shields.io/github/last-commit/k37z3r/RAL-Tones-to-CSS)
![GitHub language count](https://img.shields.io/github/languages/count/k37z3r/RAL-Tones-to-CSS)
![GitHub top language](https://img.shields.io/github/languages/top/k37z3r/RAL-Tones-to-CSS)
![GitHub repo size](https://img.shields.io/github/repo-size/k37z3r/RAL-Tones-to-CSS)
![GitHub repo file or directory count (in path)](https://img.shields.io/github/directory-file-count/k37z3r/RAL-Tones-to-CSS/css?label=CSS-files)
![GitHub repo file or directory count (in path)](https://img.shields.io/github/directory-file-count/k37z3r/RAL-Tones-to-CSS/json?label=JSON-files)
![GitHub repo file or directory count (in path)](https://img.shields.io/github/directory-file-count/k37z3r/RAL-Tones-to-CSS/csv?label=CSV-files)
![GitHub repo file or directory count (in path)](https://img.shields.io/github/directory-file-count/k37z3r/RAL-Tones-to-CSS/html?label=HTML-files)
![GitHub repo file or directory count (in path)](https://img.shields.io/github/directory-file-count/k37z3r/RAL-Tones-to-CSS/php?label=PHP-files)
![GitHub repo file or directory count (in path)](https://img.shields.io/github/directory-file-count/k37z3r/RAL-Tones-to-CSS/js?label=JS-files)
![jsDelivr hits (GitHub)](https://img.shields.io/jsdelivr/gh/hd/k37z3r/RAL-Tones-to-CSS)
![jsDelivr hits (GitHub)](https://img.shields.io/jsdelivr/gh/hw/k37z3r/RAL-Tones-to-CSS)
![jsDelivr hits (GitHub)](https://img.shields.io/jsdelivr/gh/hm/k37z3r/RAL-Tones-to-CSS)
![jsDelivr hits (GitHub)](https://img.shields.io/jsdelivr/gh/hy/k37z3r/RAL-Tones-to-CSS)
![GitHub Repo stars](https://img.shields.io/github/stars/k37z3r/RAL-Tones-to-CSS?label=Repo-Stars)
![GitHub User's stars](https://img.shields.io/github/stars/k37z3r?label=my%20Stars)


a list of color tones and the corresponding HEX RGB HSL HWB CMYK NCOL XYZ L*a*b* xyY LCh HTML/CSS Colorname

## infos
The hex codes used in this Repo are only approximations of the RAL tones. you can look up which ral tones are supported in the [csv](csv) / [html](html) / [css](css) / [json](json) folders. the data sets are identical and only adapted to the corresponding file format

> [!TIP]
> ## the easiest way to use RAL-Tones-to-CSS is with my jquery-plugin
> write in head-section after jquery
> ```html
> <script src="https://cdn.jsdelivr.net/gh/k37z3r/RAL-Tones-to-CSS@main/js/ral-tones.min.js"></script>
> ```
> now you can use it like:
> ```js
> $(`#myDiv`).ral({color:"ral9021", backgroundColor:"ral4000", border: "1px solid ral1016"});
> ```

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
## howto use with js
* execute the first steps ([howto use at CSS](?plain=0#howto-use-at-css))

use pure js
```js
const ral2008 = getComputedStyle(document.documentElement).getPropertyValue("--ral2008");
document.getElementById('myDiv');
myDiv.style.backgroundColor = ral2008;
```
**OR**

use [jBase](https://github.com/k37z3r/jBase)
```js
$(document).ready(function() {
  $('#myDiv').css('background-color', getComputedStyle(document.documentElement).getPropertyValue('--ral2008'));
});
```
**OR**

use jquery
```js
$(document).ready(function() {
  $('#myDiv').css('background-color', getComputedStyle(document.documentElement).getPropertyValue('--ral2008'));
});
```
## howto use direct at HTML
if you need all 10 css-class-files
* download [css/ral-tones.min.css](css/ral-tones.min.css)
* download [css/classes/all-ral-tones.min.css](css/classes/all-ral-tones.min.css)
* put the downloaded files into {your-css-dir}
* open your html-file and add between ```<head>``` and ```</head>```
```html
<link rel="stylesheet" href="{your-css-dir}/ral-tones.min.css"> <!-- for ral-tones -->
<link rel="stylesheet" href="{your-css-dir}/all-ral-tones.min.css"> <!-- for all in one class file -->
```

otherwise
* download [css/ral-tones.min.css](css/ral-tones.min.css)
* download [css/classes/ac-ral-tones.min.css](css/classes/ac-ral-tones.min.css)
* download [css/classes/bbc-ral-tones.min.css](css/classes/bbc-ral-tones.min.css)
* download [css/classes/bc-ral-tones.min.css](css/classes/bc-ral-tones.min.css)
* download [css/classes/bg-ral-tones.min.css](css/classes/bg-ral-tones.min.css)
* download [css/classes/blc-ral-tones.min.css](css/classes/blc-ral-tones.min.css)
* download [css/classes/brc-ral-tones.min.css](css/classes/brc-ral-tones.min.css)
* download [css/classes/btc-ral-tones.min.css](css/classes/btc-ral-tones.min.css)
* download [css/classes/c-ral-tones.min.css](css/classes/c-ral-tones.min.css)
* download [css/classes/cc-ral-tones.min.css](css/classes/cc-ral-tones.min.css)
* download [css/classes/oc-ral-tones.min.css](css/classes/oc-ral-tones.min.css)
* put the downloaded files into {your-css-dir}
* open your html-file and add between ```<head>``` and ```</head>```
```html
<link rel="stylesheet" href="{your-css-dir}/ral-tones.min.css"> <!-- for ral-tones -->
<link rel="stylesheet" href="{your-css-dir}/ac-ral-tones.min.css"> <!-- for accent-color -->
<link rel="stylesheet" href="{your-css-dir}/bbc-ral-tones.min.css"> <!-- for border-bottom-color -->
<link rel="stylesheet" href="{your-css-dir}/bc-ral-tones.min.css"> <!-- for border-color -->
<link rel="stylesheet" href="{your-css-dir}/bg-ral-tones.min.css"> <!-- for background-color -->
<link rel="stylesheet" href="{your-css-dir}/blc-ral-tones.min.css"> <!-- for border-left-color -->
<link rel="stylesheet" href="{your-css-dir}/brc-ral-tones.min.css"> <!-- for border-right-color -->
<link rel="stylesheet" href="{your-css-dir}/btc-ral-tones.min.css"> <!-- for border-top-color -->
<link rel="stylesheet" href="{your-css-dir}/c-ral-tones.min.css"> <!-- for text-color -->
<link rel="stylesheet" href="{your-css-dir}/cc-ral-tones.min.css"> <!-- for caret-color -->
<link rel="stylesheet" href="{your-css-dir}/oc-ral-tones.min.css"> <!-- for outline-color -->
```

now you can use the ral tones at your css file for define background-color or text-color by using classes
```html
<div class="bgcolor2008">this div has the background color ral2008</div>
```
**OR**
```html
<div class="color2008">this div has the text color ral2008</div>
```
**OR**
```html
<div class="outlinecolor2008" style="outline-width:1px;outline-style:solid;">this div has a border with color ral2008</div>
```
**OR**
```html
<div class="bordercolor2008" style="border-width:1px;border-style:solid;">this div has a border with color ral2008</div>
```
**OR**
```html
<div class="borderleftcolor2008" style="border-left-width:1px;border-style:solid;">this div has a left border with color ral2008</div>
```
**OR**
```html
<div class="bordertopcolor2008" style="border-top-width:1px;border-style:solid;">this div has a top border with color ral2008</div>
```
**OR**
```html
<div class="borderrightcolor2008" style="border-right-width:1px;border-style:solid;">this div has a right border with color ral2008</div>
```
**OR**
```html
<div class="borderbottomcolor2008" style="border-bottom-width:1px;border-style:solid;">this div has a bottom border with color ral2008</div>
```
**OR**
```html
<input class="caretcolor2008"><!-- this input has a caret-color ral2008 -->
<input class="caretcolor2008" type="date"><!-- this input has a caret-color ral2008 -->
<input class="caretcolor2008" type="datetime-local"><!-- this input has a caret-color ral2008 -->
<input class="caretcolor2008" type="email"><!-- this input has a caret-color ral2008 -->
<input class="caretcolor2008" type="month"><!-- this input has a caret-color ral2008 -->
<input class="caretcolor2008" type="number"><!-- this input has a caret-color ral2008 -->
<input class="caretcolor2008" type="password"><!-- this input has a caret-color ral2008 -->
<input class="caretcolor2008" type="search"><!-- this input has a caret-color ral2008 -->
<input class="caretcolor2008" type="tel"><!-- this input has a caret-color ral2008 -->
<input class="caretcolor2008" type="time"><!-- this input has a caret-color ral2008 -->
<input class="caretcolor2008" type="url"><!-- this input has a caret-color ral2008 -->
<input class="caretcolor2008" type="week"><!-- this input has a caret-color ral2008 -->
```
**OR**
```html
<input class="accentcolor" type="checkbox"><!-- this input has a accent-color ral2008 -->
<input class="accentcolor" type="radio"><!-- this input has a accent-color ral2008 -->
<input class="accentcolor" type="range"><!-- this input has a accent-color ral2008 -->
<progress class="accentcolor"><!-- this input has a accent-color ral2008 -->
```
**OR**
you can also combine the classes like
```html
<div class="color7021 bgcolor1012">this div has the text color ral7021 and background color ral1012</div>
```
## licensing
RAL-Tones-to-CSS © 2024 by Sven Minio is licensed under Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International. To view a copy of this license, visit https://creativecommons.org/licenses/by-nc-sa/4.0/ This license requires that reusers give credit to the creator. It allows reusers to distribute, remix, adapt, and build upon the material in any medium or format, for noncommercial purposes only. If others modify or adapt the material, they must license the modified material under identical terms.

## other infos
RAL tones are actually intended for solids, so it is not possible to display these tones correctly on a monitor. you can buy a color fan, color cards or other physical objects to compare RAL tones at https://www.ral-farben.de/. On this website you can also buy a fully digitized database of RAL tones as RGB values. I do not own this database, if there is a match to the official database of the company RAL gemeinnützige GmbH, this is solely due to my research, which I have done via Gemini, Google, ChatGPT and Wikipedia.
