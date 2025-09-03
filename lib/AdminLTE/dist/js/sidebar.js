/*!
 * Added by pvd to auto open sidebar menu
 * according to:
 * https://github.com/ColorlibHQ/AdminLTE/issues/2068
 */
	/** add active class and stay opened when selected */
	var url = window.location.href;

	// for sidebar 1st level menu
	$('ul.nav-sidebar a').filter(function() {
		// return this.href == url;
		return url.startsWith(this.href) && this.href.length > 0;
	}).addClass('active');

	// for treeview parents
	$('ul.nav-treeview a').filter(function() {
		// return this.href == url;
		return url.startsWith(this.href);
	}).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
	
	// for treeview node
	$('ul.nav-treeview a').filter(function() {
		// return this.href == url;
		return url.startsWith(this.href);
	}).addClass('active');

    // Disable AdminLTE's default treeview behavior
    $('[data-widget="treeview"]').off('click.treeview');
    
    
	// the below funtions are to be used when using the renderSidebarMenuWithActiveClickableParents function, othwerwsie comment out
	// Handle angle icon clicks with complete event isolation
    $(document).on('click', '.nav-sidebar .nav-item.has-treeview .fas.fa-angle-left', function(e) {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        
        var $navItem = $(this).closest('.nav-item');
        
        // Always toggle the menu state, regardless of active state
        if ($navItem.hasClass('menu-open')) {
            // Close this menu and all descendant menus
            $navItem.removeClass('menu-open');
            // Close ALL descendant treeview menus recursively
            $navItem.find('.nav-item.has-treeview').each(function() {
                $(this).removeClass('menu-open');
            });
            // Also ensure all nested treeview containers are hidden
            $navItem.find('.nav-treeview').each(function() {
                $(this).hide();
            });
        } else {
            $navItem.addClass('menu-open');
            // Show the immediate child treeview container
            $navItem.find('> .nav-treeview').show();
        }
        
        return false;
    });
    
    // Handle parent menu items with href - open child menu when clicked
    $(document).on('click', '.nav-sidebar .nav-item.has-treeview > .nav-link', function(e) {
        // Don't handle if the click was on the angle icon
        if ($(e.target).hasClass('fas') && $(e.target).hasClass('fa-angle-left')) {
            return;
        }
        
        var $navItem = $(this).parent();
        var href = $(this).attr('href');
        
        // If the href is not '#' and not empty, let it navigate but also open the menu
        if (href && href !== '#' && href !== '') {
            // Prevent AdminLTE's default treeview behavior for items with real URLs
            e.stopPropagation();
            
            // Open the menu first
            $navItem.addClass('menu-open');
            
            // Then navigate after a small delay
            setTimeout(function() {
                window.location.href = href;
            }, 100);
        }
    });