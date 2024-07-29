<?php
include_once('header.php');
?>
<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

          <!-- for searching.............. -->
          <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
          <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
              <div class="input-group">
              <form method="POST">
                <input type="text" name="table_search" class="form-control" placeholder="Search Here..." aria-label="search" aria-describedby="search">
                
                <br>

                <button type="submit" class="btn btn-primary mr-2">
                <i class="mdi mdi-account-search"></i> Search</button>
                
              </form>

              </div>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
            </li>
          </ul>
        </div>
        <!-- .................. -->
<br>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Gotra List</h4>
                  <a class="card-description" style = "color: blue;" href = "gotraadd.php">
                  <i class="mdi mdi-account-star"></i>
                    Add </a>
                  <div class="table-responsive">

<?php
include_once('footer.php');
?>