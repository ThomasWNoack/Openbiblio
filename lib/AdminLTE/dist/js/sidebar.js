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