A MINI RSS AGGREGATOR
======================

A small and quite simple PHP package using SimplePie to aggregate and display excerpts of recent posts from selected blogs on a single web page. Could be used to showcase a number of blogs on a certain topic, or to display on a static website recent posts from your own blog.

For a working example with multiple feeds see http://sharonhoward.org/crime/

It's a self-contained and lightweight package. It simply needs a web server with PHP installed: preferably PHP 5; it *may* be OK with PHP 4 but hasn't been tested. If you're familiar with PHP there are a lot of variables that can be adjusted (see the SimplePie documentation at http://simplepie.org). If you don't know PHP at all, a few key variables can be adjusted in the prefs.php file.

While you shouldn't need to know any PHP to get this working, you do need to be reasonably familiar with RSS feeds, as well as editing text files and uploading files to a webserver etc.


**** ETIQUETTE / COPYRIGHT ****

Please note that the purpose of this mini-aggregator is to use RSS feeds to showcase blogs on a related theme (or a single blog), in order to encourage readers to visit them. It's configured to display only short excerpts of blog post content and prominently feature links to each post and to the blog posts come from.


**** CONTENTS ****

/cache/
feeds.txt - list of feeds to be displayed **you will need to edit this
functions.php
index.php - displays the feeds in your browser
prefs.php ** you will need to edit at least some settings in this
README.txt (this file)
/simplepie/ - contains the core SimplePie files, documented at simplepie.org
style.css * you will probably want to edit this!


**** INSTRUCTIONS ****

Download/unzip the package. (Ideally you'll have a local development server where you can test it before you upload it to the web. Try XAMPP/WAMP on Windows, MAMP on Mac.)

1. Adjust your preferences (title of page, number of items to be displayed) in prefs.php

2. Edit the feeds.txt file - **ONE URL PER LINE**. It comes with a selection of example URLs which you can use for initial testing if you want to; these need to be replaced with your own choices.

You can use feed URLs or blog URLs, or a mix of both, but occasionally the autodiscovery mechanism in SimplePie fails so feed URLs can be the safest bet.

3. Edit style.css to change the visual styling (optional, but it is a bit ugly).

Then upload all the files and folders to your chosen web location and in a browser navigate to index.php.


**** FILE AND FOLDER PERMISSIONS ****

**If you get error messages that the cache is not writeable, try changing the /cache/ folder permissions to 775 or 777.

I usually set permissions on .php files at 600 and other text files at 644.


**** CAVEATS ****

** SimplePie doesn't deal well with RSS feeds that (for whatever reason) don't have dates for feed items. If you include a feed of this nature, the items will display in random order. It's a well-known SimplePie issue and there isn't a simple fix for it (though if you search the SimplePie support there are some not-very simple suggestions floating around...).

** Even though feeds are cached by Simplepie, there are in practice limits to how many feeds you can include. In my experience, up to 30-40 feeds should be fine (even on a local development server), but after that you may need to proceed with some caution and test the page regularly for slow loading/timing out. This method is NOT recommended if you want to aggregate hundreds of feeds!