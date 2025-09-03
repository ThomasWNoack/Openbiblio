<?php 

/************************************************************************
 * Session_mbr-Request with reference to login and logout button 
 ************************************************************************/   
if (isset($_SESSION["mbrid"])) {
    $sess_mbrid = $_SESSION["mbrid"];
} else {
    $sess_mbrid = "";
}
if (isset($_SESSION["mbrFirstName"])) {
     $sess_mbrFirstName = $_SESSION["mbrFirstName"];
} else {
    $sess_mbrFirstName = "";
}
if (isset($_SESSION["mbrLastName"])) {
    $sess_mbrLastName = $_SESSION["mbrLastName"];
} else {
    $sess_mbrLastName = "";
}

/************************************************************************
 * Session staff-Request: Is a staff member logged in?
 *  ************************************************************************/ 
if (isset($_SESSION["userid"])) {
    $sess_userid = $_SESSION["userid"];
} else {
    $sess_userid = NULL;
}
if (isset($_SESSION["firstName"])) {
     $sess_firstName = $_SESSION["firstName"];
 } else {
     $sess_firstName = "";
 }
 if (isset($_SESSION["lastName"])) {
     $sess_lastName = $_SESSION["lastName"];
 } else {
     $sess_lastName = "";
 }

$loc2 = new Localize(OBIB_LOCALE,$tab); // for sidebar menu purposes, named loc2 so as not to conflict with $loc
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo H(OBIB_OPAC_URL); ?>" class="brand-link">
        <?php 

        if (OBIB_LIBRARY_IMAGE_URL != "") {
            echo '<img src="' . H(OBIB_LIBRARY_IMAGE_URL) . '" alt="'.OBIB_LIBRARY_NAME.'" class="brand-image img-circle elevation-3" style="opacity: .8">';
        }

        ?>
      <span class="brand-text font-weight-light"><?php // echo OBIB_LIBRARY_NAME ?>&nbsp;</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <?php if(OBIB_MBR_ACCOUNT_ONLINE != TRUE && empty($sess_userid)) { echo '<!--'; } ?>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" >
        <div class="image">
          <img src="../lib/AdminLTE/dist/img/neutral3.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <?php 
          if (OBIB_MBR_ACCOUNT_ONLINE == TRUE && !empty($sess_mbrid)) {
            echo '<a href="#" class="d-block">'.$sess_mbrFirstName . ' ' . $sess_mbrLastName.'</a>'; 
          } elseif ($sess_userid > NULL ) {
            echo '<a href="#" class="d-block">'.$sess_firstName . ' ' . $sess_lastName.'</a>'; 
          } elseif (OBIB_MBR_ACCOUNT_ONLINE == TRUE && empty($sess_mbrid)) {
            echo '<a href="../opac/loginform.php" class="d-block">'.$navLoc->getText("userlogin").'</a>';
          }
          ?>
          </div>
        </div>
        <?php if(OBIB_MBR_ACCOUNT_ONLINE != TRUE && empty($sess_userid)) { echo '-->'; } ?>

      <!-- SidebarSearch Form -->
      <!--
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      -->

      <!-- Sidebar Menu -->
	  <nav class="mt-2">
<?php
// Menu configuration array

// icon conventions
// Level 1: custom
// Level 2: fas fa-circle (solid circle)
// Level 3: far fa-circle (regular/outlined circle)
// Level 4: far fa-dot-circle (solid dot inside circle)
// Level 5: fas fa-dot-circle (solid thick dot inside circle)
// Level 6: fas fa-circle-notch (circle with a gap/notch)

$menu_items = [
    OBIB_MBR_ACCOUNT_ONLINE == TRUE && !empty($sess_mbrid) ? [
        'title' => $navLoc->getText("memberaccount"),
        'url' => '../opac/mbr_account.php?mbrid='.HURL($sess_mbrid),
        'icon' => 'fas fa-home',
        'children' => [
            [
                'title' => $navLoc->getText("PwdReset"),
                'url' => '../opac/mbr_pwd_reset_form.php?mbrid='.HURL($sess_mbrid),
                'icon' => 'fas fa-key'
            ],
            // $nav == "PwdReset" && basename($_SERVER['PHP_SELF']) == "mbr_pwd_reset.php" ? [
            //     'title' => $loc2->getText("PwdResetSuccessfully"),
            //     'url' => '../opac/mbr_pwd_reset.php?mbrid='.HURL($sess_mbrid),
            //     'icon' => 'fas fa-key'
            // ] : null,
        ]
    ] : null,
    [
        'title' => $navLoc->getText("catalogSearch"), // Bibliography
        'url' => '../opac/index.php'.(isset($lookup) && $lookup == 'Y' ? "?lookup=Y" : ""),
        'icon' => 'fas fa-home',
        'children' => [
            $nav == 'search' ? [
                'title' => $navLoc->getText("catalogResults"),
                'url' => '../shared/biblio_search.php',
                'icon' => 'fas fa-circle'
            ] : null,
            $nav == 'view' ? [
                'title' => $navLoc->getText("catalogBibInfo"),
                'url' => '../shared/biblio_view.php?bibid='.HURL($bibid).'&tab=opac',
                'icon' => 'fas fa-circle'
            ] : null,
        ]
    ],
    $nav == "pwdforget" ? [
        'title' => $navLoc->getText("PwdNewSet"),
        'url' => '../opac/mbr_pwd_reset_form.php?mbrid='.HURL($sess_mbrid),
        'icon' => 'fas fa-key'
    ] : null,
];

require_once('sidebar_functions.php');

// echo renderSidebarMenu($menu_items);
// echo renderSidebarMenuWithActive($menu_items);
echo renderSidebarMenuWithActiveClickableParents($menu_items);
?>

      </nav>
	  <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
