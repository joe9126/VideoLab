<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Videolab.com</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
            </ul>
            <form class="navbar-form navbar-left" id="searchform" role="search">
                <div class="form-group input-group">
                    <input type="text" class="form-control" placeholder="Search.." id="searchpage">
                    <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <?php if(Auth::check()): ?>
                    <li>
                        <a href="<?php echo e(url('logout')); ?>" onclick="logout()">
                            <?php echo e(Auth::user()->name); ?> |
                            <span class="glyphicon glyphicon-off"></span> Logout
                         </a>
                    </li>

                <?php else: ?>
                   <!-- <li><a href="<?php echo e(url('signup')); ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
                    <li><a href="<?php echo e(url('sign-in')); ?>"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>
                <?php endif; ?>
             </ul>
     </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\videolab\resources\views/partials/header.blade.php ENDPATH**/ ?>