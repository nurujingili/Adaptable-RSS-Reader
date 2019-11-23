<?php
/**
 *displays help information and frequently asked questions
 *
 * @Nuru Jingili
 * @copyright 2010
 */
require_once('header.php');//call file to with header and footer functions
require_once('member.php');//call file to diplay user details
echo "<div id=header>"; 
do_html_header('Adapatable RSS Reader');//display header
echo "</div>";
 echo "<div id=feeds>"; 
require_once('feeds.php');
echo "</div>";
?>
div id=content>
    <h3>Help:</h3>
    <p><b>Adding new subscription</b></p>
    <p>Click on the link add subscription, then you need to write the URL of your feed or
    you can copy the URL and paste it on the text box provided and click add subscription.<p>
    <p><b>Why does it say can not read url?</b></p>
    <p>This is because adaptable rss reader has been designed to read only xml feeds (rss).
    Feeds that are in other format cannot be read.
    <p><b>Adding new folder</b>
            <p>from the main menu click on -->Manage Folders-->New folder. 
    Putting subscription into folder
    <p><b>How can i put subscription into folder?</b>
        <p>from the main menu, click -->manage folder-->add subsription.
        select the subscription and folder you want to put it in. then click submit</p>
        
    <p><b>can i put more than one subscription into one folder?</b>
        <p>Yes you can. just click on the link >manage folder>add subsription and select
        the subscription and folder you want to put it in and click submit.</p>
        <p><b>can subscription be in more than one folder</b>
            <p> No. Subscription can only be in one folder. if you add to a folder a subscription which
            is already in another folder it will move the subscription to the new folder<p>
            <p><b>what happens to my subscriptions if I delete a folder which has subscription</b>
                <p> your subscriptions will not be affected. just the folder is going to be deleted.
                and you will see your subscription on the screen but not in folder<p>
                <p><b>can i remove subscription from folder?</b>
                    <p>Yes you can. click on the folder,below each subscription there is a link
                    "Remove subscription from folder".clicking on it it will do just that.
    Remove subscription from folder
    Delete subscription
    <p><b>What happens to the feeditems when I delete subscription</b>
        <p>when you delete subscription all the feed items will be deleted as well.
        <p><b>how can I view related items</b>
            below each feeditem,there is a link "related related feeds".
            when you click on the plus sign you can expand it and view the related items
            <p><b>how do I mark items as read?</b>
                <p>you can mark all items as read or individual item.
                to <ul><li>mark all items as read,click on the subscription you want its items to be marked as read
                then click on the link "Mark all as read".
                <li>to mark single item as read click on the link "Mark item as read" below the feed item. You should
                keep in mind also when you click on the items link,the item is automatically marked as read. 
            </ul>
            <p><b>can I mark items as unread</b>
                <p>yes.This option is available for marking all items as unread for a given subscription.To mark items unread,
                select the subscription then click on the link "Mark all as unread"
                
                
    <p><b>can I search for feeds?</b>
        <p>Yes you can. you can enter a search keyword on the provided textfield and click search feeds.
    

</div>
<?php
    do_html_footer();
?>


