<?php $__env->startSection('title'); ?>
   Sign in - Videolab.com
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">

                <div id="logbox">
                    <div class="alert alert-success alert-block statusmsg"  >
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong> <span id="msg" class="text-success"></span></strong>
                    </div>
                            <form id="signin" method="post" action="">
                                <h1>Sign in</h1>

                                <input name="loginemail" id="loginemail" type="email" placeholder="Email address" class="input pass" required data-parsley-trigger="keyup" data-parsley-required-message="We'll need your email!"/>
                                <input name="pword" id="pword" type="password" placeholder="Enter password"  class="input pass" required data-parsley-trigger="keyup" data-parsley-required-message="We need the password!"/>
                                <input type="submit" id="loginbtn" value="Sign me in!" class="inputButton"/>
                                <div class="text-center">
                                    Not registered? <a href="<?php echo e(url('signup')); ?>" id="login_id">Signup</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>

        </div>

    </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\videolab\resources\views/user/login.blade.php ENDPATH**/ ?>