$(document).ready(function() {

$(function () {
       $('input#checkAll').click(function (event) {
           var selected = this.checked;
           // Iterate each checkbox
           $(':checkbox').each(function () {    this.checked = selected; });
       });
    });

});