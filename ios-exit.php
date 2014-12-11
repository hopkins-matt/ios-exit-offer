<script>
/*****************************************************/
///////////////////////////////////////////////////////
//    iOS Exit Offers - http://bit.ly/iosexit        //
//    Copyright (c) 2014 Matthew Hopkins.            //
//    If you wish to remove this attribution,        //
//    please email info@tecksock.com for details.    //
///////////////////////////////////////////////////////
/*****************************************************/

var exitmsg = "Shhh! Don\'t tell anyone, but we\'ll give you a coupon to save 15%.\n\nCopy your coupon code from the space below.\n\nCoupon Code:";
var exitcode = "ABCD123";
var siteurl = "techsock.com"; //No http:// needed

var iOS = (navigator.userAgent.match(/(iPad|iPhone|iPod)/g) ? true : false);

function setOne() {
    document.cookie = "internal=one;domain=" + siteurl + ";path=/";
    //console.log('oned');
}

//Change internal cookie to "one" on internal navigation
function internalLinks() {
    var elements = document.getElementsByTagName('a');
    for (var i = 0, len = elements.length; i < len; i++) {
        elements[i].setAttribute("onMouseDown", "setOne();");
    }
}
internalLinks(); //Add OnClick Event to all Internal Links

function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start !== -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end === -1) c_end = document.cookie.length;
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return "";
}

function setCookie(c_name, value, expiredays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + expiredays);
    document.cookie = c_name + "=" + escape(value) +
        ((expiredays === null) ? "" : ";path=/;expires=" + exdate.toUTCString());
}

function exitOffer() {
    //Show Coupon Code in Text Field within Prompt for iOS Users
    if (iOS === true) {
        //Check to see if user has been shown coupon before
        couponcode = getCookie('couponcode');
        if (couponcode !== null && couponcode !== "") {

        } else {
            coup_timer = window.setTimeout(function() {
                var conf = prompt(exitmsg, exitcode);
                if (conf) {
                    //User tapped OK
                    setCookie('couponcode', 'prompt-yes', 3);
                    //Might utilize these cookies at a later date
                } else {
                    //User tapped cancel
                    setCookie('couponcode', 'prompt-no', 1);
                    //Might utilize these cookies at a later date
                }
            }, 700);
        }
    }
}

function checkInternal() {
    //Check to see if internal link was followed
    internal = getCookie('internal');
    if (internal !== null && internal !== "") {
        if (internal === "zero") {
            exitOffer();
        } else {
            window.setTimeout(function() {
                document.cookie = "internal=zero;domain=" + siteurl + ";path=/";
            }, 500);
            //console.log('zeroed');
        }
    } else {
        window.setTimeout(function() {
            document.cookie = "internal=zero;domain=" + siteurl + ";path=/";
        }, 500);
        //console.log('zeroed');
    }
}

var title = document.getElementsByTagName("title")[0].innerHTML;
var nospacetitle = title.replace(/\W/g, '');
var cleantitle = nospacetitle.replace(/ /g, '');

function checkCookie() {
    //Fire Exit Offer on Second Time a Page Loads
    pagename = getCookie(cleantitle);
    if (pagename !== null && pagename !== "") {
        lastpage = getCookie('lastpage');
        if (lastpage !== null && lastpage !== "" && lastpage === cleantitle) {
            //console.log('samepage-refreshed');
            setCookie('lastpage', cleantitle, 1);
        } else {
            //console.log('navigated-from-dif');
            setCookie('lastpage', cleantitle, 1);
            checkInternal();
        }
    } else {
        //console.log('no-page-cookies-yet');
        setCookie(cleantitle, 'pagename', 1);
        setCookie('lastpage', cleantitle, 1);
        window.setTimeout(function() {
            document.cookie = "internal=zero;domain=" + siteurl + ";path=/";
        }, 500);
    }
}
checkCookie();

//Force iOS to run exit offers on backward navigation
if (iOS === true) {
    window.onpageshow = function(evt) {
        //If persisted then it is in the page cache, call JS function again.
        if (evt.persisted) {
            checkCookie();
        }
    };
}
</script>
