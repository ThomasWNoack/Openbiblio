<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
  require_once("../classes/Localize.php");
  $headerLoc = new Localize(OBIB_LOCALE,"shared");
  $navLoc = new Localize(OBIB_LOCALE,"navbars"); 

// Is necessary to use TinyMCE
echo "<!DOCTYPE html>";

// code html tag with language attribute if specified.
echo "<html";
if (OBIB_HTML_LANG_ATTR != "") {
  echo " lang=\"".H(OBIB_HTML_LANG_ATTR)."\"";
}
echo ">\n";

// code character set if specified
if (OBIB_CHARSET != "") { ?>
<META http-equiv="content-type" content="text/html; charset=<?php echo H(OBIB_CHARSET); ?>">
<?php } ?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Google Font: Source Sans Pro -->
	<!--<link rel="stylesheet" href="lib/fonts/SourceSansPro.css">-->
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../lib/AdminLTE/plugins/fontawesome-free/css/all.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="../lib/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="../lib/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="../lib/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../lib/AdminLTE/dist/css/adminlte.min.css">
	<!--
	<link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
	<link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css'>
	-->
    <?php 
    // Include TinyMCE if page email_messages_edit_form.php
    if (isset($focus_form_name) && $focus_form_name == 'editMessagesForm') { ?>
        <script src="../lib/vendor/tinymce/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
          tinymce.init({
            selector: '#tinymce',
            license_key: 'gpl'
          });
        </script>
    <?php } ?> 
    
    <style type="text/css">
        <?php include("../css/style.php");?>
        body.sidebar-mini:not(.layout-fixed) .main-sidebar {
            height: 100vh !important;
        }
    </style>


    <meta name="description" content="OpenBiblio Library Automation System">
    <title><?php  
    $LibraryName = str_replace('<br />', " ", OBIB_LIBRARY_NAME);
    $LibraryName = str_replace('<br />', " ", $LibraryName);
    $LibraryName = strip_tags($LibraryName);
    // echo substr($LibraryName, 0, 20);
    echo $LibraryName;
    ?>
    </title>

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <script>
    <!--
    function popSecondary(url) {
        var SecondaryWin;
        SecondaryWin = window.open(url,"secondary","resizable=yes,scrollbars=yes,width=535,height=400");
    }
    function popSecondaryLarge(url) {
        var SecondaryWin;
        SecondaryWin = window.open(url,"secondary","toolbar=yes,resizable=yes,scrollbars=yes,width=700,height=500");
        self.name="main";
    }
    function returnLookup(formName,fieldName,val) {
        window.opener.document.forms[formName].elements[fieldName].value=val;
        window.opener.focus();
        this.close();
    }
    -->
    </script>


</head>
<body class="hold-transition sidebar-mini" 
  <?php
  if (isset($focus_form_name) && ($focus_form_name != "")) {
    if (preg_match('/^[a-zA-Z0-9_]+$/', $focus_form_name)
        && preg_match('/^[a-zA-Z0-9_]+$/', $focus_form_field)) {
      echo 'onLoad="self.focus();document.'.$focus_form_name.".".$focus_form_field.'.focus()"';
    }
  } ?> >

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include('navbar_opac.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('sidebar_opac.php'); ?>
 
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">