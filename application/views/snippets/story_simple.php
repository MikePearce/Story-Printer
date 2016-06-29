<table cellpadding="0" cellspacing="0" class="story_table">
    <tr>
        <th>Title</th>
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
        <td id="title_<?= $i; ?>" class="edit_title edit" contenteditable="true"><?= $story['title']?></td>
        <td id="story_<?= $i; ?>" class="edit_story" contenteditable="true"><?= $story['story']?></td>
        <td id="effort_<?= $i; ?>" class="edit" contenteditable="true"><?= $story['effort']; ?></td>
        <td id="cos_<?= $i; ?>" class="edit_cos" contenteditable="true"><?= str_replace("\n", "", nl2br($story['cos'])) ;?></td>
        <td id="stakeholder_<?= $i; ?>" class="edit" contenteditable="true"><?= $story['stakeholder']; ?></td>
        <td id="release_<?= $i; ?>" class="edit" contenteditable="true"><?= $story['release']; ?></td>
        <td id="sprint_<?= $i; ?>" class="edit" contenteditable="true"><?= $story['sprint']; ?></td>
        <td><a href="/stories/clear/<?= $id; ?>" class="noprint">x</a></td>
    </tr>
<?
    $no++;
    $i++;
    endforeach;
?>
</table>