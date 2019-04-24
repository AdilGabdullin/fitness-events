function changePageTemplate() {
    var pageType = $("#page_category_id").val();
    if (pageType == 1) {
        $('#url').val('/');
        $('#url').attr('readonly', 'true');
    } else if(pageType == 3) {
        $('#url').val('/contact-us');
        $('#url').attr('readonly', 'true');
    } else if(pageType == 2) {
        $('#url').prop('readonly', false);
    } else if(pageType == 4) {
        $('#url').val('/event/sport_tag');
        $('#url').attr('readonly', 'true');
    }
}