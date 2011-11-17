<div id="fields">
    <?= form_open('stories/map');?>
    <table id="map_table">
        <thead>
        <tr>
            <td>Our Fields</td>
            <td>Your Fields</td>
        </tr>
        </thead>
        <? foreach($fields AS $field) : ?>
          <tr>
              <th><?= ucfirst($field); ?></th>
              <td><select name="<?= $field; ?>">
                  <? 
                        $index = similar_field($field, $user_fields);
                        foreach($user_fields AS $field):
                        $x = ($index == $field ? ' selected' : false);
                        print $x;
                   ?>
                   <option value="<?= $field; ?>"<?= $x; ?>><?= $field; ?></option>
                   <? endforeach; ?>
                   </td>
          </tr>
        <? endforeach; ?>
        <tr>
            <td colspan="2"><input type="submit" name="submit" id="submit_map" /></td>
        </tr>
    </table>
</div>
