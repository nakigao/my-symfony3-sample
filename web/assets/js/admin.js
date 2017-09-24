$(function() {

    var bootBoxDialogLoadingBody= '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Loading...</div>';

    bootbox.setDefaults({
        animate: false,
        backdrop: true,
        closeButton: false
    });

    $('[data-trigger="open-information-modal"]').on('click', function(e) {
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
                dataType: 'html',
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

    $('[data-trigger="upsert-from-egs-game"]').on('click', function(e) {
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
                success: function(data, textStatus, jqXHR) {
                    dialog.find('.bootbox-body').html(data.message);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    dialog.find('.bootbox-body').html('error');
                },
                complete: function(jqXHR, textStatus) {}
            });
        });
    });

    $('[data-trigger="toggle-game-is-done"]').on('click', function(e) {
        var $that = $(this);
        var actionUrl = $(this).data('action-url');
        $.ajax({
            type: 'PUT',
            url: actionUrl,
            dataType: 'json',
            cache: false,
            beforeSend: function(jqXHR, settings){},
            success: function(data, textStatus, jqXHR) {
                $that.removeClass('btn-default btn-success');
                if (data.isDone) {
                    $that.addClass('btn-success');
                } else {
                    $that.addClass('btn-default');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {},
            complete: function(jqXHR, textStatus) {}
        });
    });

    $('[data-trigger="toggle-game-is-deleted"]').on('click', function(e) {
        var $that = $(this);
        var actionUrl = $(this).data('action-url');
        $.ajax({
            type: 'PUT',
            url: actionUrl,
            dataType: 'json',
            cache: false,
            beforeSend: function(jqXHR, settings){},
            success: function(data, textStatus, jqXHR) {
                $that.removeClass('btn-default btn-danger');
                if (data.isDeleted) {
                    $that.addClass('btn-danger');
                } else {
                    $that.addClass('btn-default');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {},
            complete: function(jqXHR, textStatus) {}
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