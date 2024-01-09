'use strict';

$(document).ready(function() {
    var formData = $('#myForm').serializeArray();
    // debugger
    $.ajax({
        type: 'POST',
        url: '{{ src("engineer_skill.js", $user->id) }}',
        data: formData,
        success: function(response) {
            // 成功時の処理
            console.log(response);
        },
        error: function(error) {
            // エラー時の処理
            console.log(error);
        }
    });
});
