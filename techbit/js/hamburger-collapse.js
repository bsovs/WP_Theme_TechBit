$('#menu-toggle').toggle(
function(){
  $(this).addClass('open');
  $('#navbar input').prop( "checked", true );
  $('#navbar .nav_links').css('visibility','visible');
},
function(){
	$(this).removeClass('open');
	$('#navbar input').prop( "checked", false );
	$('#navbar .nav_links').css('visibility','hidden');
}
);
