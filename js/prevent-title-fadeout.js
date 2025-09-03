/**
 * Prevent Navbar Title FadeOut
 * This script prevents the navbar title (h1.brand-text) from fading out
 * when the AdminLTE sidebar toggle button is clicked
 */

(function() {
    'use strict';
    
    // Function to ensure the navbar title stays visible
    function keepTitleVisible() {
        const navbarTitle = document.querySelector('.main-header h1.brand-text');
        if (navbarTitle) {
            // Force the title to stay visible
            navbarTitle.style.animation = 'none';
            navbarTitle.style.webkitAnimation = 'none';
            navbarTitle.style.visibility = 'visible';
            navbarTitle.style.opacity = '1';
            navbarTitle.style.display = 'block';
            
            // Remove any fadeOut classes that might be added
            navbarTitle.classList.remove('fadeOut');
            navbarTitle.classList.remove('fade-out');
            
            // Add a class to mark this element as protected
            navbarTitle.classList.add('title-protected');
        }
    }
    
    // Function to continuously monitor and protect the title
    function monitorTitle() {
        const navbarTitle = document.querySelector('.main-header h1.brand-text');
        if (navbarTitle) {
            // Create a MutationObserver to watch for style changes
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'style') {
                        // Force the title to stay visible whenever styles change
                        keepTitleVisible();
                    }
                });
            });
            
            // Start observing the title element
            observer.observe(navbarTitle, {
                attributes: true,
                attributeFilter: ['style', 'class']
            });
            
            // Also watch for changes to the body element (for sidebar state changes)
            const bodyObserver = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                        // When body classes change (sidebar state), ensure title stays visible
                        setTimeout(keepTitleVisible, 50);
                    }
                });
            });
            
            bodyObserver.observe(document.body, {
                attributes: true,
                attributeFilter: ['class']
            });
        }
    }
    
    // Function to handle sidebar toggle clicks
    function handleSidebarToggle() {
        document.addEventListener('click', function(e) {
            if (e.target && e.target.getAttribute('data-widget') === 'pushmenu') {
                // When sidebar toggle is clicked, ensure title stays visible
                setTimeout(keepTitleVisible, 100);
                setTimeout(keepTitleVisible, 300);
                setTimeout(keepTitleVisible, 500);
            }
        });
    }
    
    // Function to continuously check and protect the title
    function continuousProtection() {
        setInterval(function() {
            const navbarTitle = document.querySelector('.main-header h1.brand-text');
            if (navbarTitle && !navbarTitle.classList.contains('title-protected')) {
                keepTitleVisible();
            }
        }, 1000); // Check every second
    }
    
    // Initialize when DOM is ready
    function init() {
        // Wait a bit for AdminLTE to initialize
        setTimeout(function() {
            keepTitleVisible();
            monitorTitle();
            handleSidebarToggle();
            continuousProtection();
        }, 500);
        
        // Also try immediately
        keepTitleVisible();
    }
    
    // Run initialization
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
    
    // Also run on window load to catch any late changes
    window.addEventListener('load', function() {
        setTimeout(init, 1000);
    });
    
})();
