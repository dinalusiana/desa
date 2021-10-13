<div class="col-md-10 col-sm-11 display-table-cell valign-top">
    <div class="row">
        <header id="nav-header" class="clearfix">
            <div class="col-md-5">
                <nav class="navbar-default pull-left">
                    <button class="navbar-toggle collapsed" type="button" data-toggle="offcanvas" data-target="#side-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </nav>
                <button id="navshow" type="button">
                    <span>
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </span>
                </button>
                <button id="navhide" type="button">
                    <span>
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </span>
                </button>

                <input type="text" class="hidden-xs hidden-sm" id="header-search-field" placeholder=" ">
            </div>

            <div class="col-md-7">
                <ul class="pull-right">
                    <li id="welcome" class="hidden-xs"><strong>Welcome, <?= $this->session->userdata('nama'); ?> to admin area</strong></li>

                    <li>
                        <a href="<?= base_url('auth/logout'); ?>" class="logout">
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                            Log out
                        </a>
                    </li>
                </ul>
            </div>
        </header>
    </div>