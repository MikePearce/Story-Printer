<?
    if ($template == 'card'):
?>
<style type="text/css">
#main_content {
    width: 98%;
    margin: 20px;
}
</style>
<? endif;?>
<center class="noprint">
    <a href="#" onClick="javascript:window.print();">Print these stories</a> | 
    <a href="/stories/clear" id="clearStories">Delete all these</a> | 
    <a href="/stories/add">Add another story</a> |
    <a href="/stories/view/<?= $template; ?>">View as <?= $template ?></a>
    
</center>
<br />
<?
    if ($stories != false) {
        echo $stories;
    }
    else {
        echo 'No stories bro!';
    }
?>
<div id="catfish">
    <img src="/images/cool_story.png" />
    <!-- <a href="#" id="close-link">Close</a> -->
</div>