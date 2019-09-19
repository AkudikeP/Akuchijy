$(document).ready(function () {
    
    $('#btnSubmit').click(function() {
        var emailFriend = document.getElementById('emailFriend');
        var emailOwn = document.getElementById('emailOwn');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        
        if (!filter.test(emailFriend.value)) {
            $('#emailFriend').removeClass('emailNormal');
            $('#emailFriend').addClass('emailError');
            emailFriend.focus;
            var valFriend = false;
        }
        else {
            $('#emailFriend').removeClass('emailError');
            $('#emailFriend').addClass('emailNormal');
        }
        
        if (!filter.test(emailOwn.value)) {
            $('#emailOwn').removeClass('emailNormal');
            $('#emailOwn').addClass('emailError');
            emailOwn.focus;
            var valOwn = false;
        }
        else {
            $('#emailOwn').removeClass('emailError');
            $('#emailOwn').addClass('emailNormal');
        }
        
        if (valFriend == false || valOwn == false) {
            return false;
        }
        
        $.post('../PHP_Code/BL/tellyourfriendsubmit.php', $('#frmSubmit').serialize(), function(result) {
            $('#mainContent').removeClass('mainContent');
            $('#mainContent').addClass('mainContentHide');
            if (result == true) {
                $('#summaryContent').removeClass('summaryContentHide');
                $('#summaryContent').addClass('summaryContent');
                $('#duplicateEmail').addClass('duplicateHide');
                $('#completeEmail').removeClass('completeHide');
            }
            else {
                $('#summaryContent').removeClass('summaryContentHide');
                $('#summaryContent').addClass('summaryContent');
            }
        });
    });
    
    $('.back').click(function() {
        $('#summaryContent').removeClass('summaryContent');
        $('#summaryContent').addClass('summaryContentHide');
        $('#mainContent').removeClass('mainContentHide');
        $('#mainContent').addClass('mainContent');
        
        document.getElementById('emailFriend').value = '';
        document.getElementById('emailOwn').value = '';
    });
});