function loadTable(name) {
    $(document).ready(function () {
       $('#' + name).DataTable({
           "info": false,
           "searching": false
       })
    });
}

function loadSite(div, link) {
    $('.click').click(function() {
        // get the contents of the link that was clicked
        var linkText = link;

        // replace the contents of the div with the link text
        $('#' + div).html(linkText);

        // cancel the default action of the link by returning false
        return false;
    });
}
