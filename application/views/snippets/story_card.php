<?
        $no = 0;
        $i = 0;
        foreach($stories AS $id => $story): 
?>
<div class="story_container">
    <div class="story_box">
        <div class="story_header">
            <span class="edit_title edit" contenteditable="true" id="title_<?= $i; ?>"><?= (isset($story['counter']) ? $story['counter'] .': ' : false);?><?= (isset($story['title']) ? $story['title'] : false);?></span>
        </div>
        <div class="story_body">
            <div class="effort edit edit_effort" contenteditable="true" id="effort_<?= $i; ?>"><?= $story['effort']; ?></div>
            <span class="story_edit edit_story" contenteditable="true" id="story_<?= $i; ?>"><?= $story['story']?></span>
        </div>
        <hr />
        <div class="cos edit_cos" contenteditable="true" id="cos_<?= $i; ?>"><?= str_replace("\n", "", nl2br($story['cos'])) ;?></div>
        <div class="other" style="display:inline;">
            <b><?= $settings['stakeholders']; ?>:</b> 
                <span class="edit" contenteditable="true" id="stakeholder_<?= $i; ?>"><?= $story['stakeholder']; ?></span> |
            <b><?= $settings['releases']; ?>:</b> 
                <span class="edit" contenteditable="true" id="release_<?= $i; ?>"><?= $story['release']; ?></span> |
            <b><?= $settings['iterations']; ?>:</b> 
                <span class="edit" contenteditable="true" id="sprint_<?= $i; ?>"><?= $story['sprint']; ?></span> |
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