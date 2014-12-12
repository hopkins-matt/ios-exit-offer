# iOS Exit Offer
### Reducing iOS cart abandonment rates one user at a time...

**Prettier Version of this: [http://hopkins-matt.github.io/ios-exit-offer/](http://hopkins-matt.github.io/ios-exit-offer/)**

iOS Exit Offer allows you to offer users you are navigating out of your site a coupon code or other offer. iOS Exit Offer is a free to use (both personal and commercial) javascript script, just keep the credit intact at the top of the script. Those who really like the script are encouraged to link back to techsock.com or donate via techsock.com

##How does it work?
iOS Exit Offer utilizes cookies to meet specific criteria before displaying the prompt.
* Should not prompt on a refresh
* Only prompt once the user has visited the same page twice
* Prompt should not fire on internal navigation

Once these criteria are met, iOS Exit Offer will display this prompt:

![iOS Exit Offer Prompt](https://techsock.com/content/public/upload/ios-exit-prompt.png)

##Installation
1. Copy script into your chosen directory
2. Change variables at begin of script
3. Call script on each page you want to possible offer the script

`<script src="ios-exit.js"></script>`

#####Wordpress & Similar CMS Users (Alternate Installation Option):
Use php version and add the following to the footer of you theme:

`<?php include_once("ios-exit.php") ?>`

Update the above code with the correct location of the iOS Exit Offer script.

**Trying to debug?** Just uncomment the console.log lines
