$(function() {

    $('[data-trigger="upsert-from-egs-game"], [data-trigger="generate-search-master"], [data-trigger="generate-statistic-master"]').on('click', function(e) {
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

});