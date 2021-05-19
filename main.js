/* 
 * Logic for the header menu goes here
 */

$('document').ready(() => {
    $('.nav > p:eq(0)').on('mouseenter', () => {
        $('.menu').slideDown(100);
    });
    $('.menu').on('mouseleave', () => {
        $('.menu').slideUp(100);
    });
    $('#back').on('click', () => {
        window.history.back();
    });
    $('#logout').on('click', () => {
        window.location.replace("../login/logout.php");
    });
    $('.menu').children().on('mouseenter', event => {
        $(event.currentTarget).addClass('selected');
    });
    $('.menu').children().on('mouseleave', event => {
        $(event.currentTarget).removeClass('selected');
    });
});
