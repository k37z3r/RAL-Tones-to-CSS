# RAL-to-HEX-RGB-HSL-HWB-CMYK-NCOL-XYZ-Lab-xyY-LCh-HTML-CSS-Colorname
a list of color tones and the corresponding HEX RGB HSL HWB CMYK NCOL XYZ L*a*b* xyY LCh HTML/CSS Colorname

## infos
The hex codes used in codes.min.css are only approximations of the RAL tones. RAL tones are actually intended for solids, so it is not possible to display these tones correctly on a monitor. you can buy a color fan, color cards or other physical objects to compare RAL tones at https://www.ral-farben.de/. On this website you can also buy a fully digitized database of RAL tones as RGB values. I do not own this database, if there is a match to the official database of the company RAL gemeinnützige GmbH, this is solely due to my research, which I have done via Gemini, Google, ChatGPT and Wikipedia.

## howto use
open your css and write at the beginning of the file
```css
@import url("https://cdn.statically.io/gh/k37z3r/RAL-to-HEX-RGB-HSL-HWB-CMYK-NCOL-XYZ-Lab-xyY-LCh-HTML-CSS-Colorname/main/css/ral-tones.min.css");
```
now you can use the ral tones at your css file e.g. as background-color, background, color. write at your css code like
```css
span{
    background-color: var(--ral9005);
    color: var(--ral3033);
}
```
## other infos
in the samples folder you will find a data collection of the tones in different color spaces.

the data collections are packed in different formats.

html to view the colors, csv and json as a pure data collection, css for use in your website.

in the php folder you will find the file index.php, with the help of this file the html file from the samples folder was created
