<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
   <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../home/index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <h1 class="brand-text font-weight-light" style="margin: auto; font-size: 24px; font-weight: 700; color: <?php echo OBIB_ALT2_BG ?>;">
      <?php echo OBIB_LIBRARY_NAME ?>
    </h1>

    <!-- Right navbar links -->
    <!-- <ul class="navbar-nav ml-auto"> -->
    <ul class="navbar-nav">
      <!-- Navbar Search -->
      <li class="nav-item" style="display:none">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
	  <li class="nav-item dropdown" style="display:none">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../lib/AdminLTE/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../lib/AdminLTE/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../lib/AdminLTE/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown" style="display:none">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>

      <!-- Library Information Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-info-circle"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- Date -->
          <div class="dropdown-item py-2">
            <div class="d-flex align-items-center">
              <div class="d-flex align-items-center justify-content-center mr-3" style="width:24px;">
                <i class="far fa-calendar-alt fa-lg text-primary"></i>
              </div>
              <div>
                <div class="dropdown-item-title mb-0 font-weight-bold"><?php echo $headerLoc->getText("headerTodaysDate"); ?></div>
                <div class="text-sm text-muted"><?php echo H(date($headerLoc->getText("headerDateFormat")));?></div>
              </div>
            </div>
          </div>

          <div class="dropdown-divider my-0" <?php if (OBIB_LIBRARY_HOURS != "") { ?> style="display:block" <?php } else { ?> style="display:none" <?php } ?>></div>

          <!-- Hours -->
          <div class="dropdown-item py-2" <?php if (OBIB_LIBRARY_HOURS != "") { ?> style="display:block" <?php } else { ?> style="display:none" <?php } ?>>
            <div class="d-flex align-items-center">
              <div class="d-flex align-items-center justify-content-center mr-3" style="width:24px;">
                <i class="far fa-clock fa-lg text-warning"></i>
              </div>
              <div>
                <div class="dropdown-item-title mb-0 font-weight-bold"><?php if (OBIB_LIBRARY_HOURS != "") echo $headerLoc->getText("headerLibraryHours");?></div>
                <div class="text-sm text-muted"><?php if (OBIB_LIBRARY_HOURS != "") echo H(OBIB_LIBRARY_HOURS);?></div>
              </div>
            </div>
          </div>

          <div class="dropdown-divider my-0" <?php if (OBIB_LIBRARY_PHONE != "") { ?> style="display:block" <?php } else { ?> style="display:none" <?php } ?>></div>

          <!-- Phone -->
          <div class="dropdown-item py-2" <?php if (OBIB_LIBRARY_PHONE != "") { ?> style="display:block" <?php } else { ?> style="display:none" <?php } ?>>
            <div class="d-flex align-items-center">
              <div class="d-flex align-items-center justify-content-center mr-3" style="width:24px;">
                <i class="fas fa-phone-alt fa-lg text-success"></i>
              </div>
              <div>
                <div class="dropdown-item-title mb-0 font-weight-bold"><?php if (OBIB_LIBRARY_PHONE != "") echo $headerLoc->getText("headerLibraryPhone");?></div>
                <div class="text-sm text-muted"><?php if (OBIB_LIBRARY_PHONE != "") echo H(OBIB_LIBRARY_PHONE);?></div>
              </div>
            </div>
          </div>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item" style="display:none">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item">
        <?php if(empty($_SESSION["userid"])) { 
          echo '
        <a class="nav-link" href="../shared/loginform.php" role="button" title="'.$navLoc->getText("Login").'">
          <i class="fas fa-sign-in-alt"></i>
        </a>';
        } else {
          echo '
        <a class="nav-link" href="../shared/logout.php" role="button" title="'.$navLoc->getText("Logout").'">
          <i class="fas fa-sign-out-alt"></i>
        </a>';
        } ?>
      </li>
    </ul>
  </nav>
  