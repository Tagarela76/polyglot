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

    $("#dialog-form").dialog({
        autoOpen: false,
        height: 300,
        width: 350,
        modal: true,
        buttons: {
            "Add Group": function() {
                var description = groupDescription.val();
                var ajaxurl = '../wp-content/plugins/polyglot-user-group/assets/ajax/saveUserGroup.php';
                var data = {
                    action: 'my_action_callback',
                    description: description
                };
                
                $.post(ajaxurl, data, function(response) {
            		console.log(response);
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

    $("#create-user-group")
            .button()
            .click(function() {
        $("#dialog-form").dialog("open");
    });
});