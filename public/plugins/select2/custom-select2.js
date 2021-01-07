$(".basic").select2({
  dropdownParent: $('#AddmakanModal')
});

$("#rias").select2({
  dropdownParent: $('#AddpaketModal')
});

$("#mc").select2({
	dropdownParent: $('#AddpaketModal')
});

$("#hib").select2({
	dropdownParent: $('#AddpaketModal')
});

$("#dek").select2({
	dropdownParent: $('#AddpaketModal')
});

$("#dok").select2({
	dropdownParent: $('#AddpaketModal')
});

var formSmall = $(".form-small").select2({ tags: true });
formSmall.data('select2').$container.addClass('form-control-sm')

$(".nested").select2({
	tags: true
});

$(".tagging").select2({
	tags: true
});
$(".disabled-results").select2();




function formatState (state) {
  if (!state.id) {
    return state.text;
  }
  var baseClass = "flaticon-";
  var $state = $(
    '<span><i class="' + baseClass + state.element.value.toLowerCase() + '" /> ' + state.text + '</i> </span>'
  );
  return $state;
};

$(".templating").select2({
  templateSelection: formatState
});