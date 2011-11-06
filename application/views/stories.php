
<? 
    // First, check we have stories
    if (is_array($stories)):
?>
<center><button onClick="javascript:window.print();" class="noprint">PRINT THAT SHIZZLE!</button><br />
<a href="/stories/clear" id="clearStories">Delete all these</a></center>
<?
        $no = 0;
        foreach($stories AS $story): 
?>
<div class="story_container">
    <div class="story_box">
        <div class="story_header">
        </div>
        <div class="story_body">
            <div class="effort edit"><?= $story['effort']; ?></div>
            <span class="edit"><?= $story['story']?></span>
        </div>
        <hr />
        <div class="cos edit">
            <?= nl2br($story['cos']);?>
        </div>
        <div class="other">
            <b>Stakeholder:</b> <span class="edit"><?= $story['stakeholder']; ?></span> |
            <b>Release:</b> <span class="edit"><?= $story['release']; ?></span> |
            <b>Sprint:</b> <span class="edit"><?= $story['sprint']; ?></span>
        </div>
    </div>
</div>
<? 
        $no++;
        if ($no == 3) {
            ?> <div class="page_break"> - </div> <?
            $no = 0;
        }
        endforeach; 
    else:
?>
    <div class="info">
        <h3>Sorry</h3>
        <p>
            I don't remember any stories, please try and <a href="/">upload 
            some</a> or <a href="/">paste some in</a>.
        </p>
    </div>
<?
  endif;
?>
