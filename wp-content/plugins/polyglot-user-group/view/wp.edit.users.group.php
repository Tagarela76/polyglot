<?php
$polyglotUserGroups = getPolyglotUserGroups();


?>
<script type="text/javascript">
    var userGroupDialog = new UserGroupDialog();
</script>

<table>
    <tr>
        <td>
            Group ID
        </td>
        <td>
            Group Name
        </td>
    </tr>
    <?php foreach($polyglotUserGroups as $polyglotUserGroup){?>
        <tr>
            <td>
                <?php echo $polyglotUserGroup->getId(); ?>
            </td>
            <td>
                <?php echo $polyglotUserGroup->getDescription(); ?>
            </td>
        </tr>
            
    <?php } ?>
</table>
<input type="button" value="Add New Group" class="btn-danger" onclick="userGroupDialog.AddUserGroup.openDialog()">
<div id='addInspectionPersonContainer' title="Add New Inspection Person" style="display:none;">Loading ...</div>