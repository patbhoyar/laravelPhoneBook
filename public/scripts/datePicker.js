jQuery(document).ready(function($) {

    $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        maxDate: "-5Y",
        dateFormat: "yy-mm-dd"
    });
});