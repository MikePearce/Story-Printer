<?
        $no = 0;
        $i = 0;
        foreach($stories AS $id => $story): 
?>
<div class="story_container">
    <div class="story_box">
        <div class="story_header">
            <span class="edit_title" id="title_<?= $i; ?>"><?= (isset($story['counter']) ? $story['counter'] .': ' : false);?><?= (isset($story['title']) ? $story['title'] : false);?></span>
        </div>
        <div class="story_body">
            <div class="effort edit_effort" id="effort_<?= $i; ?>"><?= $story['effort']; ?></div>
            <span class="story_edit edit_story" id="story_<?= $i; ?>"><?= $story['story']?></span>
        </div>
        <hr />
        <div class="cos edit_cos" id="cos_<?= $i; ?>"><?= str_replace("\n", "", nl2br($story['cos'])) ;?></div>
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
?>