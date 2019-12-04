// This is JavaScript file for hovering the page and to show the childpage of it in desktop while for mobile devices it shows the child pages of it at the time of click

jQuery(function() {
// tabbed content

    $(".feature-tab-outer").hide();
    $(".feature-tab-outer:first").show();

  /* tab mode */
    $("ul.tab-links li").hover(function() {
		var i=1;
      $(".feature-tab-outer").hide();
      var activeTab = $(this).attr("rel"); 
      $("#"+activeTab).stop().fadeIn();		
		
      $("ul.tab-links li").removeClass("tab1");
      $(this).addClass("tab1");

	  $(".tab_drawer_heading").removeClass("d_active");
	  $(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active"); 
	  

    });

    /* if in drawer mode */

    $(".tab_drawer_heading").click(function() {

      $(".feature-tab-outer").hide();
      var d_activeTab = $(this).attr("rel"); 
      $("#"+d_activeTab).stop().fadeIn();
	  
	  $(".tab_drawer_heading").removeClass("d_active");
      $(this).addClass("d_active");
	  
	  $("ul.tab-links li").removeClass("tab1");
	  $("ul.tab-links li[rel^='"+d_activeTab+"']").addClass("tab1");
    });
	
	 
	/* Extra class "tab_last" 
	   to add border to right side
	   of last tab */ 
	$('ul.tab-links li').last().addClass("tab_last");
});