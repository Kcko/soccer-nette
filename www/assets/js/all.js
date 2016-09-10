$(function(){

	$.nette.init();

	$(document).on("click", ".match-edit", function(e){
		
		e.preventDefault();

		var $this = $(this);
		$this.closest("tr").next("tr").slideToggle();

	});

});