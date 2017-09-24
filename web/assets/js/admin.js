$(function() {

    var bootBoxDialogLoadingBody= '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Loading...</div>';

    bootbox.setDefaults({
        animate: false,
        backdrop: true,
        closeButton: false
    });

    $('[data-trigger="open-infomation-modal"]').on('click', function(e) {
        var actionUrl = $(this).data('action-url');
        var dialog = bootbox.dialog({
            message: bootBoxDialogLoadingBody,
            onEscape: function() {
                bootbox.hideAll();
            }
        });
        dialog.init(function() {
            $.ajax({
                type: 'GET',
                url: actionUrl,
                dataType: 'json',
                cache: false,
                beforeSend: function(jqXHR, settings){},
                success: function(data, textStatus, jqXHR) {},
                error: function(jqXHR, textStatus, errorThrown) {},
                complete: function(jqXHR, textStatus) {
                    dialog.find('.bootbox-body').html(jqXHR.responseText);
                }
            });
        });
    });

    $('#game-search-form').on('change', function(e) {
        redirectTo($(this));
    });

});

/**
 * リダイレクトする(フォーム用)
 *
 * @param $form 必須:data-action-url
 */
function redirectTo ($form) {
    location.href = $form.data('action-url') + '?' + $form.serialize();
}