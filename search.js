$(document).ready(function() {
    BindControls();
});
var Books = [];
function BindControls() {
    $.get("bookList.php", function(data,status){
        Books = data;
        console.log(Books);
        $('#searchbox').autocomplete({
            source: Books,
            minLength: 0,
            scroll: true
        }).focus(function() {
            $(this).autocomplete("search", "");
        });
    });
}