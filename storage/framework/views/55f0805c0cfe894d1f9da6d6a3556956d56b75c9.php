<?php $__env->startSection('title'); ?>
    Home - Videolab.com
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 
<div class="container text-center">
    <!--<div class="row">
        <div class="col-sm-12">
            <div class="alert alert-success alert-block statusmsg" style="display: block;" >
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong> <span id="msg" class="text-success"></span></strong>
                    </div>
        </div>
    </div>-->
        <div class="row">
          
            <div class="col-sm-10">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default text-left">
                            <div class="panel-body">
                                <p contenteditable="true">Status: Feeling Blue</p>
                                <button type="button" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-thumbs-up"></span> Like
                                </button>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <ul id="videolist"> </ul>

                </div> 
            </div>

            <div class="col-sm-2 well">
                <div class="thumbnail">
                    <p>Upcoming Events:</p>
                    <img src="paris.jpg" alt="Paris" width="400" height="300">
                    <p><strong>Paris</strong></p>
                    <p>Fri. 27 November 2015</p>
                    <button class="btn btn-primary">Info</button>
                </div>
                <div class="well">
                    <p>ADS</p>
                </div>
                <div class="well">
                    <p>ADS</p>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\videolab\resources\views/pages/home.blade.php ENDPATH**/ ?>