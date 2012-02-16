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
              <td>
                  <select name="<?= $field; ?>">
                      <option value="">--</option>
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
            <td colspan="2" align="right">
                <label for="status_ready">Import only 'ready' stories</label>
                <input type="checkbox" name="status_ready" id="status_ready" value="1" />
                <br />
                <label for="status_done">Exclude 'done' stories</label>
                <input type="checkbox" name="status_done" id="status_done" value="1" />
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="submit" id="submit_map" /></td>
        </tr>
    </table>
</div>
<script type="text/javascript">
    // Track uploads as a goal
    _gaq.push(['_trackEvent', 'Uploads', 'CSV']);
</script>
