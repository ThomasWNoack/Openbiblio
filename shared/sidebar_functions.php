<?php

function renderSidebarMenu($menu_items, $level = 0) {
    // First level gets the main menu classes
    $ul_class = ($level === 0) 
        ? 'nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"' 
        : 'nav nav-treeview';
        
    $html = '<ul class="' . $ul_class . '">';
    
    foreach ($menu_items as $item) {
        $has_children = !empty($item['children']);
        
        $html .= '<li class="nav-item' . ($has_children ? ' has-treeview' : '') . '">';
        
        // Build the link
        $html .= '<a href="' . htmlspecialchars($item['url']) . '" class="nav-link">';
        $html .= '<i class="nav-icon ' . htmlspecialchars($item['icon']) . '"></i>';
        $html .= '<p>';
        $html .= htmlspecialchars($item['title']);
        
        // Add arrow if item has children
        if ($has_children) {
            $html .= '<i class="fas fa-angle-left right"></i>';
        }
        
        $html .= '</p>';
        $html .= '</a>';
        
        // Recursively render children if they exist
        if ($has_children) {
            $html .= renderSidebarMenu($item['children'], $level + 1);
        }
        
        $html .= '</li>';
    }
    
    $html .= '</ul>';
    return $html;
}

function isMenuItemActive($item) {
    $current_page = basename($_SERVER['PHP_SELF']);

    if ($item['url'] === $current_page) {
        return true;
    }

    // Also check if the item URL ends with the current page (for relative URLs)
    $REQUEST_URI = $_SERVER['REQUEST_URI'];
    if (strpos($REQUEST_URI, str_replace("../","", $item['url'])) !== false) {
        return true;
    }
    
    if (!empty($item['children'])) {
        // Filter out null values from children before checking
        $item['children'] = array_filter($item['children'], function($child) {
            return $child !== null;
        });
        
        foreach ($item['children'] as $child) {
            if (isMenuItemActive($child)) {
                return true;
            }
        }
    }
    
    return false;
}

function renderSidebarMenuWithActive($menu_items, $level = 0) {
    // Remove null values from the current level
    $menu_items = array_filter($menu_items, function($item) {
        return $item !== null;
    });
    $base_padding = 6; // Base padding in pixels 12px
    $level_padding = $level * 7; // 15px additional padding per level
    
    // If no items after filtering, return empty string
    if (empty($menu_items)) {
        return '';
    }
    
    $ul_class = ($level === 0) 
        ? 'nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"' 
        : 'nav nav-treeview';
        
    $html = '<ul class="' . $ul_class . '">';
    
    foreach ($menu_items as $item) {
        // Filter children if they exist
        if (isset($item['children'])) {
            $item['children'] = array_filter($item['children'], function($child) {
                return $child !== null;
            });
        }
        
        $has_children = !empty($item['children']);
        $is_active = isMenuItemActive($item);
        
        $html .= '<li class="nav-item' . ($has_children ? ' has-treeview' : '') . 
                 ($is_active ? ' menu-open' : '') . '">';
        
        $html .= '<a href="' . htmlspecialchars($item['url']) . '" class="nav-link' . 
                 ($is_active ? ' active' : '') . '" style="padding-left: ' . ($base_padding + $level_padding) . 'px">';
        $html .= '<i class="nav-icon ' . htmlspecialchars($item['icon']) . '"></i>';
        $html .= '<p>';
        $html .= htmlspecialchars($item['title']);
        
        if ($has_children) {
            $html .= '<i class="fas fa-angle-left right"></i>';
        }
        
        $html .= '</p>';
        $html .= '</a>';
        
        if ($has_children) {
            $html .= renderSidebarMenuWithActive($item['children'], $level + 1);
        }
        
        $html .= '</li>';
    }
    
    $html .= '</ul>';
    return $html;
}

function renderSidebarMenuWithActiveClickableParents($menu_items, $level = 0) {
    // Remove null values from the current level
    $menu_items = array_filter($menu_items, function($item) {
        return $item !== null;
    });
    $base_padding = 6; // Base padding in pixels 12px
    $level_padding = $level * 7; // 15px additional padding per level
    
    // If no items after filtering, return empty string
    if (empty($menu_items)) {
        return '';
    }
    
    $ul_class = ($level === 0) 
        ? 'nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"' 
        : 'nav nav-treeview';
        
    $html = '<ul class="' . $ul_class . '">';
    
    foreach ($menu_items as $item) {
        // Filter children if they exist
        if (isset($item['children'])) {
            $item['children'] = array_filter($item['children'], function($child) {
                return $child !== null;
            });
        }
        
        $has_children = !empty($item['children']);
        $is_active = isMenuItemActive($item);
        $has_href = !empty($item['url']) && $item['url'] !== '#';
        
        $html .= '<li class="nav-item' . ($has_children ? ' has-treeview' : '') . 
                 ($is_active ? ' menu-open' : '') . '">';
        
        // Always use the actual URL, even if it's '#'
        $href = $item['url'];
        
        $html .= '<a href="' . htmlspecialchars($href) . '" class="nav-link' . 
                 ($is_active ? ' active' : '') . '" style="padding-left: ' . ($base_padding + $level_padding) . 'px">';
        $html .= '<i class="nav-icon ' . htmlspecialchars($item['icon']) . '"></i>';
        $html .= '<p>';
        $html .= htmlspecialchars($item['title']);
        
        if ($has_children) {
            $html .= '<i class="fas fa-angle-left right" style="padding: 8px; margin: -8px; cursor: pointer; border-radius: 3px; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor=\'rgba(255,255,255,0.1)\'" onmouseout="this.style.backgroundColor=\'transparent\'"></i>';
        }
        
        $html .= '</p>';
        $html .= '</a>';
        
        if ($has_children) {
            $html .= renderSidebarMenuWithActiveClickableParents($item['children'], $level + 1);
        }
        
        $html .= '</li>';
    }
    
    $html .= '</ul>';
    return $html;
}

?>