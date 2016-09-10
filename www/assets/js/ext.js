(function($, undefined) {

$.nette.ext('test', 
{

	start: function (jqXHR, settings) 
	{

		console.log(settings.nette);

		   // if (settings.nette) {
     //        var id = settings.nette.el.attr('id');
     //        alert( id );
     //    }
	}
}, 
{

});

})(jQuery);