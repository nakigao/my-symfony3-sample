var bootBoxDialogLoadingBody= '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Loading...</div>';
bootbox.setDefaults({
    animate: false,
    backdrop: true,
    closeButton: false
});

$(function() {

    $('[data-trigger="open-information-modal"]').on('click', function(e) {
        var className = $(this).data('dialog-class-name');
        var actionUrl = $(this).data('action-url');
        var dialog = bootbox.dialog({
            className: className,
            size: 'large',
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

    $(document).on('click', '[data-trigger="reload-information-modal"]', function(e) {
        var $targetModalBody = $('.bootbox-body');
        var actionUrl = $(this).data('action-url');
        $.ajax({
            type: 'GET',
            url: actionUrl,
            dataType: 'html',
            cache: false,
            beforeSend: function(jqXHR, settings){},
            success: function(data, textStatus, jqXHR) {},
            error: function(jqXHR, textStatus, errorThrown) {},
            complete: function(jqXHR, textStatus) {
                $targetModalBody.html(jqXHR.responseText);
            }
        });
    });

    $(document).on('change', '.game-information-modal input, .game-information-modal select', function() {
        $(this).closest('tr').find('[data-trigger="create-character-base-short"]').addClass('btn-warning');
        $(this).closest('tr').find('[data-trigger="update-character-base-short"]').addClass('btn-warning');
    });

    $(document).on('click', '[data-trigger="get-new-character-base-short-form"]', function(e) {
        var $target = $(this).parents('table').find('tbody');
        var actionUrl = $(this).data('action-url');
        $.ajax({
            type: 'GET',
            url: actionUrl,
            dataType: 'html',
            cache: false,
            beforeSend: function(jqXHR, settings){},
            success: function(data, textStatus, jqXHR) {},
            error: function(jqXHR, textStatus, errorThrown) {},
            complete: function(jqXHR, textStatus) {
                $target.append(jqXHR.responseText);
                $target.append(jqXHR.responseText);
                $target.append(jqXHR.responseText);
            }
        });
    });

    $(document).on('click', '[data-trigger="create-character-base-short"]', function(e) {
        var $that = $(this);
        var actionUrl = $(this).data('action-url');
        var csrfToken = $(this).data('csrf-token');
        var $psuedoFormDom = generateCharacterBaseShortForm($(this), actionUrl, 'POST', csrfToken);
        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: $psuedoFormDom.serialize(),
            dataType: 'html',
            cache: false,
            beforeSend: function(jqXHR, settings) {},
            success: function(data, textStatus, jqXHR) {
                // EDIT用のフォームを新規挿入
                $that.parent().parent('tr').after(jqXHR.responseText);
                // NEW用のフォームは削除
                deleteNewCharacterBaseShortForm($that);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Something error occurred');
            },
            complete: function(jqXHR, textStatus) {}
        });
    });

    $(document).on('click', '[data-trigger="delete-new-character-base-short-form"]', function(e) {
        deleteNewCharacterBaseShortForm($(this));
    });

    $(document).on('click', '[data-trigger="update-character-base-short"]', function(e) {
        var $that = $(this);
        var actionUrl = $(this).data('action-url');
        var csrfToken = $(this).data('csrf-token');
        var $psuedoFormDom = generateCharacterBaseShortForm($(this), actionUrl, 'PUT', csrfToken);
        $.ajax({
            type: 'PUT',
            url: actionUrl,
            data: $psuedoFormDom.serialize(),
            dataType: 'html',
            cache: false,
            beforeSend: function(jqXHR, settings) {},
            success: function(data, textStatus, jqXHR) {
                // EDIT用のフォームを新規挿入
                $that.parent().parent('tr').after(jqXHR.responseText);
                // NEW用のフォームは削除
                deleteNewCharacterBaseShortForm($that);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Something error occurred');
            },
            complete: function(jqXHR, textStatus) {}
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

    $('[data-trigger="toggle-game-is-normal"]').on('click', function(e) {
        var $that = $(this);
        var actionUrl = $(this).data('action-url');
        $.ajax({
            type: 'PUT',
            url: actionUrl,
            dataType: 'json',
            cache: false,
            beforeSend: function(jqXHR, settings){},
            success: function(data, textStatus, jqXHR) {
                $that.removeClass('btn-danger btn-success');
                if (data.isNormal) {
                    $that.addClass('btn-success');
                } else {
                    $that.addClass('btn-danger');
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

    $('[data-trigger="search-game"]').on('change', function(e) {
        redirectTo($(this));
    });

});

/**
 *
 * @param $this
 */
function deleteNewCharacterBaseShortForm($this) {
    $this.parent().parent('tr').remove();
}

/**
 *
 * @param $this
 * @param actionUrl
 * @param method
 * @param csrfToken
 * @returns {*|jQuery}
 */
function generateCharacterBaseShortForm($this, actionUrl, method, csrfToken) {
    var $form1 = $this.parent().parent('tr');
    return $('<form />', {action: actionUrl, method: 'POST', name: 'appbundle_characterbase'}).append(
        $('<input />', {name: 'appbundle_characterbase[_token]', value: csrfToken}),
        $('<input />', {name: 'appbundle_characterbase[gameId]', value: $form1.find('input[name="game_id"]').val()}),
        $('<input />', {name: 'appbundle_characterbase[introductionPriority]', value: $form1.find('input[name="introduction_priority"]').val()}),
        $('<input />', {name: 'appbundle_characterbase[gender]', value: $form1.find('[name="gender"]').val()}),
        $('<input />', {name: 'appbundle_characterbase[name]', value: $form1.find('input[name="name"]').val()}),
        $('<input />', {name: 'appbundle_characterbase[middleName]', value: $form1.find('input[name="middle_name"]').val()}),
        $('<input />', {name: 'appbundle_characterbase[familyName]', value: $form1.find('input[name="family_name"]').val()}),
        $('<input />', {name: 'appbundle_characterbase[nameKana]', value: $form1.find('input[name="name_kana"]').val()}),
        $('<input />', {name: 'appbundle_characterbase[middleNameKana]', value: $form1.find('input[name="middle_name_kana"]').val()}),
        $('<input />', {name: 'appbundle_characterbase[familyNameKana]', value: $form1.find('input[name="family_name_kana"]').val()}),
        $('<input />', {type: 'submit', value: 'submit'})
    );
}