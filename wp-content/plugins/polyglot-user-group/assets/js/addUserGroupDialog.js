$ = jQuery;
$(function() {
    
    var groupDescription = $("#groupDescription"),
            allFields = $([]).add(groupDescription),
            tips = $(".validateTips");

    function updateTips(t) {
        tips
                .text(t)
                .addClass("ui-state-highlight");
        setTimeout(function() {
            tips.removeClass("ui-state-highlight", 1500);
        }, 500);
    }

    function checkLength(o, n, min, max) {
        if (o.val().length > max || o.val().length < min) {
            o.addClass("ui-state-error");
            updateTips("Length of " + n + " must be between " +
                    min + " and " + max + ".");
            return false;
        } else {
            return true;
        }
    }

    function checkRegexp(o, regexp, n) {
        if (!(regexp.test(o.val()))) {
            o.addClass("ui-state-error");
            updateTips(n);
            return false;
        } else {
            return true;
        }
    }
    //add user group dialog
    $("#dialog-form").dialog({
        autoOpen: false,
        height: 300,
        width: 350,
        modal: true,
        buttons: {
            "Add Group": function() {
                var that = this;
                var description = groupDescription.val();
                var ajaxurl = '../wp-content/plugins/polyglot-user-group/assets/ajax/saveUserGroup.php';
                var data = {
                    action: 'my_action_callback',
                    description: description
                };
                
                $.post(ajaxurl, data, function(response) {
            		$("#groupDescription").val('');
                        $(that).dialog("close");
                        location.reload();
                        
                });
            },
            Cancel: function() {
                $(this).dialog("close");
            }
        },
        close: function() {
            allFields.val("").removeClass("ui-state-error");
        }
    });

    //delete user group dialog
    $("#delete-dialog-form").dialog({
        autoOpen: false,
        height: 300,
        width: 350,
        modal: true,
        buttons: {
            "DELETE": function() {
                var that = this;
                var groupIds = $('#rowsForDelete').html();
                var ajaxurl = '../wp-content/plugins/polyglot-user-group/assets/ajax/deleteUserGroup.php';
                var data = {
                    groupIds: groupIds
                };
                
                $.post(ajaxurl, data, function(response) {
            		$("#groupDescription").val('');
                        $(that).dialog("close");
                        location.reload();
                        
                });
            },
            Cancel: function() {
                $(this).dialog("close");
            }
        },
        close: function() {
            allFields.val("").removeClass("ui-state-error");
        }
    });
    
    //add user Sub group dialog
    $("#dialog-add-sub-group-form").dialog({
        autoOpen: false,
        height: 300,
        width: 350,
        modal: true,
        buttons: {
            "Add Sub Group": function() {
                var that = this;
                var description = $('#subGroupDescription').val();
                var groupId = $('#userGroupList').val();
                var ajaxurl = '../wp-content/plugins/polyglot-user-group/assets/ajax/userSubGroupSettings.php';
                var data = {
                    action: 'add_sub_group',
                    description: description,
                    groupId: groupId
                };
                
                $.post(ajaxurl, data, function(response) {
            		$('#subGroupDescription').val('');
                        $(that).dialog("close");
                        getUserSubGroup();
                        
                });
            },
            Cancel: function() {
                $(this).dialog("close");
            }
        },
        close: function() {
            allFields.val("").removeClass("ui-state-error");
        }
    });
    
    //delete user sub group dialog
    $("#delete-sub-group-dialog-form").dialog({
        autoOpen: false,
        height: 300,
        width: 350,
        modal: true,
        buttons: {
            "DELETE": function() {
                var that = this;
                var groupIds = $('#subGroupsIds').html();
                
                var ajaxurl = '../wp-content/plugins/polyglot-user-group/assets/ajax/userSubGroupSettings.php';
                var data = {
                    action: 'delete_sub_groups',
                    groupIds: groupIds
                };
                
                $.post(ajaxurl, data, function(response) {
                        $(that).dialog("close");
                        getUserSubGroup();
                });
            },
            Cancel: function() {
                $(this).dialog("close");
            }
        },
        close: function() {
            allFields.val("").removeClass("ui-state-error");
        }
    });
    //open add group dialog
    $("#create-user-group")
            .button()
            .click(function() {
        $("#dialog-form").dialog("open");
    });
    
    //open add group dialog
    $("#delete-user-group")
            .button()
            .click(function() {
        var openDialog = getRowsToDelete();
        if(openDialog){
            $("#delete-dialog-form").dialog("open");
        }else{
            alert('check user group first');
        }
    });
    
    //open add user Sub group dialog
    $("#create-user-subGroup")
            .button()
            .click(function() {
        $("#dialog-add-sub-group-form").dialog("open");
    });
    
    //open delete user Sub group dialog
    $("#delete-user-subGroup")
            .button()
            .click(function() {
        var openDialog = getUserSubGroupsToDelete();
        if(openDialog){
            $("#delete-sub-group-dialog-form").dialog("open");
        }else{
            alert('check user group first');
        }
    });
    
    getUserSubGroup();
});

function getRowsToDelete()
{
    var rowsToDelete = new Array();
    var rowsToDeleteToString = "";
    var checkboxes = $("#userGroupContainer").find("input[type='checkbox']");

    checkboxes.each(function(i) {
        var id = this.value;
        if (this.checked) {
            rowsToDelete.push(id);
        }
    });
    rowsToDeleteToString = rowsToDelete.join(',');
    if(rowsToDeleteToString==''){
        return false;
    }
    $('#rowsForDelete').html(rowsToDeleteToString);
    return true;
}

function getUserSubGroupsToDelete()
{
    var rowsToDelete = new Array();
    var rowsToDeleteToString = "";
    var checkboxes = $("#userSubGroupContainer").find("input[type='checkbox']");

    checkboxes.each(function(i) {
        var id = this.value;
        if (this.checked) {
            rowsToDelete.push(id);
        }
    });
    rowsToDeleteToString = rowsToDelete.join(',');
    if(rowsToDeleteToString==''){
        return false;
    }
    $('#subGroupsIds').html(rowsToDeleteToString);
    return true;
}

function getUserSubGroup()
{
    var userGroupId = $('#userGroupList').val();
    
    var ajaxurl = '../wp-content/plugins/polyglot-user-group/assets/ajax/getUserSubGroup.php';
    var data = {
        groupId: userGroupId
    };

    $.post(ajaxurl, data, function(response) {
        $('#userSubGroupContainer').html(response)
    });
}