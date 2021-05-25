$(document).ready(() => {
    $(".user-info .lead-text").text(User[0]['DisplayName']);
    $(".user-info .user-name").text(User[0]['DisplayName']);
    $(".user-info .sub-text").text(User[0]['Email']);
})