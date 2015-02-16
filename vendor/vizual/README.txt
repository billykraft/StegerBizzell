INSTRUCTIONS FOR VIZUAL
===

USE IN WEB PAGE FILE:

1.0) add the following line at the END of your web page file:

<script src='vizual/vizual.js'></script>

(*NOTE: see instructions on data storing for 1 adjustment to this tag needed for storing data)

1.1) update the "editableScriptPage" variable at the top of vizual.js to the correct path to vizual.php from the root directory

2.0) tag the inner-most element tags surrounding text with:

class="vizual-txt"

2.1) tag div elements that contain background images with:

class="vizual-img"

2.1.0) a note on using div's with background images instead of "img" tags:

<div style="height:____; width:____; background-image:url(http://www.google.com/*path*); background-size:cover; background-position:center;"></div>

background-size:cover
AND
background-position:center
ARE BOTH USED AUTOMATICALLY WITH NEWLY-UPLOADED IMAGES

3.0) most pictures have crap on top that will cover up the edit icon.  the tag:

class="vizual-ignore"

will hide any element with that tag when editing

3.1) sometimes elements to be changed are clickable, and the resulting action screws things up (e.g. "vizual-txt" for a link).  the tag:

class="vizual-noclick"

will disable the click action when editing

4.0) to customize edit-mode css for a body of HTML, wrap the body in:

<div class="vizual-edit" id="whatever_you_want">
...
</div>

then, add:

vizual-id="whatever_you_want-normal"

to the body's main tag.  Then, in a .css file, you can add custom css for the edit-mode version of the body as follow:

#whatever_you_want-edit {
	...
}

5.0) to pull the page's components from the database, simply include "vizualize.php" at the top of the page:

<?php
include "$root/$pathToVizual/vizualize.php";
?>

from there, you simply need to do:

<h1><?php echo $texts[0];?></h1>

or

<div style="background-image:url(<?php echo $pics[0]; ?>); ..."></div>

to get the 0th texts/picture

5.1) there are 2 files (vizual_include.sh & vizual_remove.sh) that automatically add/remove the needed php includes to the tops of all .blade.php files.  To use, simple put in the root directory of the website and run "./vizual_include.sh" (or remove.sh) in the terminal

6.0)

there are 2 functions at the bottom of vizual.js that can be used to do any custom javascript on start/stop of edit-mode (editableOnEdit/editableOffEdit)

===

STORING DATA

data is stored automatically and the page is redirected to the page that was being edited.  the only things you need to do are:

1- ensure the requirements for "sql.php" are met, which entails only a "credentials.php" file exists in the folder above the website's root folder which follows the format of the given example