$(document).ready(function() {
    naslov = $(document).find("title").text();
    switch (naslov) {
        case "Home":
            $('#tablica1').dataTable({
                "aaSorting": [[0, "asc"], [1, "asc"]],
                "bPaginate": true,
                "bLengthChange": true,
                "bFilter": true,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": true
            });
            $('#tablica2').dataTable({
                "aaSorting": [[0, "asc"], [1, "asc"], [2, "asc"], [3, "asc"]],
                "bPaginate": true,
                "bLengthChange": true,
                "bFilter": true,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": true
            });
            $('#tablica3').dataTable({
                "aaSorting": [[0, "asc"], [1, "asc"], [2, "asc"], [3, "asc"]],
                "bPaginate": true,
                "bLengthChange": true,
                "bFilter": true,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": true
            });
            $('#tablica4').dataTable({
                "aaSorting": [[0, "asc"], [1, "asc"], [2, "asc"], [3, "asc"], [4, "asc"], [5, "asc"], [6, "asc"]],
                "bPaginate": true,
                "bLengthChange": true,
                "bFilter": true,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": true
            });
            $('#tablica5').dataTable({
                "aaSorting": [[0, "asc"], [1, "asc"], [2, "asc"], [3, "asc"], [4, "asc"]],
                "bPaginate": true,
                "bLengthChange": true,
                "bFilter": true,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": true
            });
            break;
        case "Moderatori":
            $('#tablicaModeratori').dataTable({
                "aaSorting": [[0, "asc"], [1, "asc"], [2, "asc"], [3, "asc"]],
                "bPaginate": true,
                "bLengthChange": true,
                "bFilter": true,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": true
            });
            break;
    }
});