$(document).ready(function() {
	$('#members').DataTable( {
		"order": [[ 1, "asc" ]],
        "paging": false,
        "scrollY": 600,
        "searching": true,
		"aoColumns": [
            { "orderSequence": [ "desc", "asc" ] },
            { "orderSequence": [ "desc", "asc" ] },
        ]
    } );
});