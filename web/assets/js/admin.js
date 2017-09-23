$(function() {
    $('#egs-game-search-form').on('change', function(e) {
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