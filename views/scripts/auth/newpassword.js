$(document).ready(() => {
    $("input[name=code]").val(Code);
    $("form").attr('action', $("form").attr('action') + '/ucode:' + Code)
})