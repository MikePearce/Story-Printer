<div class="noprint actions">
    <a href="#" onClick="javascript:window.print();">Print these stories</a> | 
    <a href="/stories/clear" id="clearStories">Delete all these</a> | 
    <a href="/stories/add">Add another story</a> |
    <a href="/stories/view/<?= $template; ?>">View as <?= $template ?></a>
    
</div>
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