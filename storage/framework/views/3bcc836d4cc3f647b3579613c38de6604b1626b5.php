
<?php $__env->startSection('title'); ?>
  Watching <?php $__currentLoopData = \Crypt::decrypt($videodata); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($item->videoname); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> - Videolab.com
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		 	<?php if(isset($videodata)): ?>
		 	<?php else: ?> <script>window.location = "/home";</script>
		 	<?php endif; ?>
		<div class="row">
			<div class="col-sm-8">
				 <div class="row" style="background-color: black;">
				 	<div class="col-sm-12">

				 		<video class="afterglow vidplayer" id="myvideo" controls="true" autoPlay="true" preload="auto" width="720" height="200" onload="autoPlay()">								
							<source src="<?php $__currentLoopData = \Crypt::decrypt($videodata); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($item->videodir); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" type="video/mp4">
						</video>


				 	</div>
				 </div>

				  <div class="row">
					<div class="col-sm-12 videoinfo">
					 
						<div class="row post_title" >
							<label class="playervideotitle" id="playervideotitle">
								<?php $__currentLoopData = \Crypt::decrypt($videodata); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($item->videoname); ?>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</label>
						</div>
						<div class="row videodata">
						<div class="col-sm-6 col-xs-6">
							<?php $__currentLoopData = \Crypt::decrypt($videodata); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($item->views); ?>  views 
							<i class="fa fa-circle" style="font-size:10px"></i> 
							 <?php echo e(\Carbon\Carbon::parse($item->uploaddate)->format('M d,Y')); ?>

							 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
						<div class="col-sm-3 col-xs-3 likeicon">
							<a class="link" onclick="likevideo()"><i class="fa fa-thumbs-o-up" style="font-size:20px"></i> 
								<?php $__currentLoopData = \Crypt::decrypt($videodata); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($item->likes); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</a>
							<a class="link" onclick="likevideo()"><i class="fa fa-thumbs-o-down" style="font-size:20px">
								<?php $__currentLoopData = \Crypt::decrypt($videodata); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($item->dislikes); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</i> </a>
							<span class="popuptext" id="myPopup">
								<?php if(!Auth::check()): ?>
									Please sign in!
								 <a href="<?php echo e(url('/sign-in')); ?>" class="btn btn-info">Sign in</a>
								 <?php endif; ?>
							</span>
						</div>
						<div class="col-sm-3 col-xs-3 likeicon">
							 
							 	<i class='fa fa-share-alt' style="font-size:24px"></i>
							 	<a href="#"><i class="fa fa-facebook-f" style="font-size:24px"></i></a>
							 	<button class="btn btn-link"></button>
						  
						</div>
					</div>

					<div class="row user-metadata">
						<div class="col-sm-9" style="display: table-row;">
							<div class="usericon">
								<i class='fa fa-user-circle' style='font-size:24px'></i>
							</div>	
							 <div class="user-data">
								<a class="user-def" href="#"><?php $__currentLoopData = \Crypt::decrypt($videodata); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($item->name); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></a>
								<i class="fa fa-circle" style="font-size:10px"></i> 
							   10,215 followers
						   </div>						
						 
						</div>						
						
						<div class="col-sm-3 followdiv" >
							<button class="btn btn-sm follow">Follow</button>
						</div>
					</div>

					<div class="row ">
						<div class="col-sm-12 vid_description">
							<?php $__currentLoopData = \Crypt::decrypt($videodata); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($item->description); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
						
					</div>

					<div class="row" style="border-top: 1px solid grey; margin-top: 8px;">
						<div class="col-sm-6 col-xs-6" >
							<label class="modal-title section-title">
								<?php $__currentLoopData = \Crypt::decrypt($videodata); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($item->comments); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> Comments
							</label>
						</div>
						<div class="col-sm-6 col-xs-6">
							  <div class="alert alert-success statusmsg" style="display:none;margin-top: 5px;" >
                        		<button type="button" class="close" data-dismiss="alert">x</button>
                        		<strong> <span id="msg" class="text-success"></span></strong>
                    		</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-2">
							<div class="usericon" style="background-color: #aebce1">
								<i class='fa fa-user-circle' style='font-size:24px'></i>
							</div>
						</div>
						<div class="col-sm-10">
							<form id="comment-form" method="post" action="" >
								<input type="text" name="comment" autocomplete="off" id="comment"class="usercomment" placeholder="Add your opinion" required data-parsley-trigger="keyup" data-parsley-required-message="" onclick="checkLogin()"/>
								 
								<button class="btn btn-primary btn-sm comment-submit" id="commentsubmit">
									Comment
								</button>


							</form>
							
						</div>
						
					</div>

					<div class="row" style="border-top: 1px solid #616060 ; margin-top: 10px;">
						<div class="col-sm-12">
						  <ul id="commentList">
						  	<?php $__currentLoopData = \Crypt::decrypt($videocomments); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						  
							 <li>
								<div class="row comment_row">
									<div class="col-sm-2 col-xs-3">
										<div class="usericon" style="background-color: #aebce1">
											<i class='fa fa-user-circle' style='font-size:24px'></i>
										</div>
									</div>
									<div class="col-sm-10 col-xs-9">
										<div class="row">
											<span class="comment_data"><?php echo e($comment->name); ?></span> 
											<span class="comment_date"><?php echo e(\Carbon\Carbon::parse( $comment->created_at )->format('M d,Y')); ?></span>
										</div>
										<div class="row">
											<span class="comment_meta"><?php echo e($comment->comment); ?></span>
										</div>
										
									</div>
								</div>
							</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
						</div>
						
					</div>

				</div>
			</div>
			</div>

			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel panel-title">You might also like</div>
					<div class="panel panel-body"></div>
				</div>
			</div>
		</div>
		
	</div>
	<div class="col-sm-1"></div>
</div>
</div>

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\videolab\resources\views/pages/videoplayer.blade.php ENDPATH**/ ?>