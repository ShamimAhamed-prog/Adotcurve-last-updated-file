// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
     "pagingType": "simple",
      "ordering": false
  });
  $('.dataTables_length').addClass('bs-select');
});
