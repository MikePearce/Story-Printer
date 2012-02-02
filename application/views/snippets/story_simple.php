<table cellpadding="0" cellspacing="0" class="story_table">
    <tr>
        <th>ID</th>
        <th>Story</th>
        <th>Effort</th>
        <th>CoS</th>
        <th><?= $settings['stakeholders']; ?></th>
        <th><?= $settings['releases']; ?></th>
        <th><?= $settings['iterations']; ?></th>        
        <th>&nbsp;</th>
    </tr>
<?
        $no = 0;
        $i = 0;
        foreach($stories AS $id => $story): 
?>
    <tr>
     <td><?= (isset($story['counter']) ? $story['counter'] : false);?><?= (isset($story['title']) ? $story['title'] : false);?></td>
     <td id="story_<?= $i; ?>" class="edit_story"><?= $story['story']?></td>
     <td id="effort_<?= $i; ?>" class="edit"><?= $story['effort']; ?></td>
     <td id="cos_<?= $i; ?>" class="edit_cos"><?= str_replace("\n", "", nl2br($story['cos'])) ;?></td>
     <td id="stakeholder_<?= $i; ?>" class="edit"><?= $story['stakeholder']; ?></td>
     <td id="release_<?= $i; ?>" class="edit"><?= $story['release']; ?></td>
     <td id="sprint_<?= $i; ?>" class="edit"><?= $story['sprint']; ?></td>
     <td><a href="/stories/clear/<?= $id; ?>" class="noprint">x</a></td>
    </tr>
<? 
        $no++;
        $i++;
        endforeach; 
?>