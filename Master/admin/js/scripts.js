
// Show/hide meta
$(document).ready(function(){
	$('a.embed_toggle').on('click', function(e) {    
	e.preventDefault();    
	$('.hide').slideToggle(400);})		
});


// Adds tabbing to pages textarea
$(document).ready(function(e) {
  $('#textblock').keydown(function(e) {
    if(e.keyCode == 9) {
      var start = $(this).get(0).selectionStart;
      $(this).val($(this).val().substring(0, start) + "    " + $(this).val().substring($(this).get(0).selectionEnd));
      $(this).get(0).selectionStart = $(this).get(0).selectionEnd = start + 4;
      return false;
    }
  });
});


