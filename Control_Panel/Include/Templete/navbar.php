
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2980b9;" >
  <a class="navbar-brand" href="#"><img src="Layout/Image/kfsIcon.png" width="130" height="95" class="rounded float-left" alt="..."> <?php echo lang('WEBSIT_NAME') ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#app-nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="app-nav">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Teaching Staff</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="staff.php"><?php echo lang('MANAGESTAFF') ?></a>
            <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="staff.php?do=ManageStudent"><?php echo lang('MANAGESTUDENT') ?></a>
            <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="staff.php?do=Add"><?php echo lang('ADDPAGE') ?></a>
        </div>
      </li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="service.php">Display Service</a>
            <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="service.php?do=Add">Add Service</a>
            <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="staff.php?do=Add"><?php echo lang('ADDPAGE') ?></a>
        </div>
      </li>
        <li class="nav-item"><a class="nav-link" href="#"><?php echo lang('NEWS_Faculty') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="Requests.php?do=Add">Request Padge</a></li>
        <li class="nav-item"><a class="nav-link" href="dashboard.php"><?php echo lang('DASHOARD') ?></a></li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="staff.php?do=Edit&Student_ID=<?php echo $_SESSION['Student_ID']?>"><?php echo lang('EDIT_PROFILE') ?></a>
          <a class="dropdown-item" href="#"><?php echo lang('SETTING') ?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php"><?php echo lang('LOGOUT') ?></a>
        </div>
      </li>
  </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="<?php echo lang('SEARCH') ?>" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><?php echo lang('SEARCH') ?></button>
    </form>
  </div>
    
</nav>
