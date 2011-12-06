<? 

    // First, check we have stories
    if (is_array($stories)):
?>
<center class="noprint"><a href="#" onClick="javascript:window.print();">Print these stories</a> | 
<a href="/stories/clear" id="clearStories">Delete all these</a> | <a href="/stories/add">Add another story</a></center>
<br />
<?
        $no = 0;
        $i = 0;
        foreach($stories AS $id => $story): 
?>
<div class="story_container">
    <div class="story_box">
        <div class="story_header">
            <span class="edit" id="title_<?= $i; ?>"><?= (isset($story['title']) ? $story['title'] : false);?></span>
        </div>
        <div class="story_body">
            <div class="effort edit" id="effort_<?= $i; ?>"><?= $story['effort']; ?></div>
            <span class="story_edit edit_area" id="story_<?= $i; ?>"><?= $story['story']?></span>
        </div>
        <hr />
        <div class="cos edit_area" id="cos_<?= $i; ?>"><?= str_replace("\n", "", nl2br($story['cos'])) ;?></div>
        <div class="other" style="display:inline;">
            <b><?= $settings['stakeholders']; ?>:</b> 
                <span class="edit" id="stakeholder_<?= $i; ?>"><?= $story['stakeholder']; ?></span> |
            <b><?= $settings['releases']; ?>:</b> 
                <span class="edit" id="release_<?= $i; ?>"><?= $story['release']; ?></span> |
            <b><?= $settings['iterations']; ?>:</b> 
                <span class="edit" id="sprint_<?= $i; ?>"><?= $story['sprint']; ?></span> |
            <a href="/stories/clear/<?= $id; ?>" class="noprint">Delete Me</a>
        </div>
    </div>
</div>
<? 
        $no++;
        if ($no == 3) {
            ?> <div class="page_break"> - </div> <?
            $no = 0;
        }
        
        $i++;
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
<div id="catfish">
    <img src="/images/cool_story.png" />
    <!-- <a href="#" id="close-link">Close</a> -->
</div>