/*	gallery */
$(document).ready(function(){
    $(".filter-button").click(function(){
        var value = $(this).attr("data-filter");
        
        if(value == "all")
        {
            $(".filter").show(350);
        }
        else
        {
            $(".filter").not("."+value).fadeOut(350);
            $(".filter").filter("."+value).fadeIn(350);

        }

	        	if ($(".filter-button").removeClass("active")) {
			$(this).removeClass("active");
		    }
		    	$(this).addClass("active");
	    	});
});
/*	end gallery */
  