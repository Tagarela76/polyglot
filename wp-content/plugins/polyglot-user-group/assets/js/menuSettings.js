/*function getSubGroupList()
{
    var groupId = $('#menuSettingGroupList').val();
    var ajaxurl = '../wp-content/plugins/polyglot-user-group/assets/ajax/menuSettings.php';
    var data = {
        groupId: groupId,
        action: 'getSubGroupList'
    };

    $.post(ajaxurl, data, function(response) {
        //console.log(response);
        $('#menuSettingSubGroupList').html(response);
    });
}

function saveSubGroupMenuSettings()
{
    var menuItems = new Array();
    var subGroupId = $('#menuSettingSubGroupList').val();
    
    var checkboxes = $("#menuItemsSetting").find("input[type='checkbox']");
    checkboxes.each(function(i) {
        var id = this.value;
        if (this.checked) {
            menuItems.push(id);
        }
    });
    menuItems = menuItems.join(',');
    
    var ajaxurl = '../wp-content/plugins/polyglot-user-group/assets/ajax/menuSettings.php';
    var data = {
        menuItems: menuItems,
        subGroupId: subGroupId,
        action: 'saveUserGroupMenuSettings'
    };

    $.post(ajaxurl, data, function(response) {
       console.log(response);
    });
}*/