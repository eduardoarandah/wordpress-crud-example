<?php

function sinetiks_schools_update() {
    global $wpdb;
    $table_name = $wpdb->prefix . "school";
    $id = $_GET["id"];
    $name = $_POST["name"];
//update
    if (isset($_POST['update'])) {
        $wpdb->update(
                $table_name, //table
                array('name' => $name), //data
                array('ID' => $id), //where
                array('%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = %s", $id));
    } else {//selecting value to update	
        $schools = $wpdb->get_results($wpdb->prepare("SELECT id,name from $table_name where id=%s", $id));
        foreach ($schools as $s) {
            $name = $s->name;
        }
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/sinetiks-schools/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Schools</h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>School deleted</p></div>
            <a href="<?php echo admin_url('admin.php?page=sinetiks_schools_list') ?>">&laquo; Back to schools list</a>

        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>School updated</p></div>
            <a href="<?php echo admin_url('admin.php?page=sinetiks_schools_list') ?>">&laquo; Back to schools list</a>

        <?php } else { ?>
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed'>
                    <tr><th>Name</th><td><input type="text" name="name" value="<?php echo $name; ?>"/></td></tr>
                </table>
                <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
                <input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('&iquest;Est&aacute;s seguro de borrar este elemento?')">
            </form>
        <?php } ?>

    </div>
    <?php
}