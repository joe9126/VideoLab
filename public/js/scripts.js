$(document).ready(function(){
    $(".close").on("click",function(){
        $(".statusmsg").hide();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});


$(document).ready(function(){
    $("#password2").on('keyup',function () {
        $("#confirmpworgmsg").show();
        $('#signupbtn').attr('disabled', 'disabled');
        let password  = $("#password").val();
        let password2 = $(this).val();
        if(password === password2){
            $("#confirmpworgmsg").hide();
            $('#signupbtn').attr('disabled', false);
        }

    });
})


//SUBMIT SIGNUP FORM
$(document).ready(function(){
    $("#signup").parsley();

    $("#signup").on("submit",function(event){
        event.preventDefault();

        if( $("#signup").parsley().isValid()){
           $.ajax({
               url:"post-signup",
               type:"post",
               data:$(this).serialize(),
               beforeSend:function(){
                   $('#signupbtn').attr('disabled', 'disabled');
                   $('#signupbtn').val('Hold on...');
               },
               dataType:"json",
               success:function(data){
                   $("#msq").text(data.msg);
                   $(".statusmsg").show();
                   if(data.status>0){
                       $('#signup')[0].reset();
                       $('#signup').parsley().reset();
                       $('#signupbtn').val('Signing you in...');
                       window.location.replace("/sign-in");
                   }else{
                       $('#signupbtn').attr('disabled', false);
                       $('#signupbtn').val('Sign me up!');
                       $(".statusmsg").removeClass("alert-success");
                       $(".statusmsg").addClass("alert-danger");
                       $("#msq").removeClass("text-success");
                       $("#msq").addClass("text-danger");
                   }

               }
           })
        }
    })
});

//SUBMIT LOGIN FORM
$(document).ready(function(){
    $("#signin").parsley();

    $("#signin").on("submit",function(event){
        event.preventDefault();

        if( $("#signin").parsley().isValid()){
              $.ajax({
                url: 'post-signin',
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function()
                {
                    $('#loginbtn').attr('disabled', 'disabled');
                    $('#loginbtn').val('Submitting...');
                },
                success:function(data)
                {
                    console.log(data);
                    $(".statusmsg").css("display","block");
                    if(data.status>0){
                        $(".statusmsg").removeClass("alert-danger");
                        $(".statusmsg").addClass("alert-success");
                        $("#msg").text(data.msg);

                        $('#signin')[0].reset();
                        $('#signin').parsley().reset();
                        $('#submit').val('Signing in...');
                        window.location.href = data.temp_url;
                      
                    }
                    else{
                        $(".statusmsg").removeClass("alert-success");
                        $(".statusmsg").addClass("alert-danger");

                         $("#msg").removeClass("alert-success");
                        $("#msg").addClass("alert-danger");
                        $("#msg").text(data.msg);

                        $('#loginbtn').attr('disabled', false);
                        $('#loginbtn').val('Sign me in!');
                    }

                   
                },
                error:function(data){
                    //console.log(data);
                }
            });
        }
    })
});


//USER LOGOUT

 function logout(){
   $currentpath = window.location.href;
    $.ajax({
        url:"logout",
        type:"GET",
        data:{'currentpath':$currentpath},
        dataType:"json",
        success:function(){ 
                window.location.href = currentpath;
             }
    });
}

//get video list
$(document).ready(function () {
    $.ajax({
        url:"/getvideos",
        type:"GET",
        dataType: "json",
        success:function(data){
           
            $videodata = "";
            let i=0;
            $.each(data,function (key,value) {
               
               $videodata =
               '<li>'+
                            '<div class="col-sm-3">'+
                                '<div class="well">'+
                                    '<div class="panel panel-default postedvideo">'+
                                        '<video id='+data[i].ID+' height="100px" width="100%" src='+data[i].videodir+' onclick=retriveVideo('+data[i].ID+')></video>'+
                                    '</div>'+

                                    '<div class="row vid_basics">'+
                                        '<div class="col-sm-3">'+
                                            '<div class="usericon">T</div>'+
                                        '</div>'+
                                        '<div class="col-sm-9">'+
                                            '<a href="/videoplayer?v_id='+data[i].ID+'"><label class="videotitle" onclick=retriveVideo('+data[i].ID+')>'+data[i].videoname+'</label></a>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="row">'+
                                        '<a href="#" class="text-muted user-post">'+data[i].name+'</a><br>'+
                                        '<span class="text-muted ">'+data[i].views+' views | </span>'+
                                       '<span class="text-muted">'+moment(data[i].uploaddate).format("ddd Do MMM,YYYY")+'</span>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+ 
                        '</li>' ;

                    $("#videolist").append($videodata);
                i++;
            })
        }

    })

});

function getDuration(videoUrl){
    var vid = document.createElement('video');
    document.querySelector(videoUrl).addEventListener('change', function() {
  // create url to use as the src of the video
  var fileURL = URL.createObjectURL(this.files[0]);
  vid.src = fileURL;
  // wait for duration to change from NaN to the actual duration
  vid.ondurationchange = function() {
    alert(this.duration);
  };
});
    var s = document.getElementById(videoid);
    var length = s.duration;
    return length;
}


function retriveVideo(videoid){
  $.ajax({
    type:"get",
    url:"videoplayer/"+videoid+"",
    success:function(data){
      if(!$.trim(data)){
          window.location.href = "home";
      }else{
            
             window.location.href = "videoplayer/"+encodeURIComponent(videoid);
      }
     
    }

  })
    
}
 
/*function loadComments(videoid){
 // alert("event triggered");
  $.ajax({
    type:"get",
    url:"loadcomments",
    dataType:"json",
    data:{"videoid":videoid},
    success:function(data){
      console.log(data);
        $.each(data,function(index, value){
            var usercomment = '<li>'+
                '<div class="row comment_row">'+
                  '<div class="col-sm-2 col-xs-3">'+
                    '<div class="usericon" style="background-color: #aebce1">'+
                      '<i class="fa fa-user-circle" style="font-size:24px"></i>'+
                    '</div>'+
                  '</div>'+
                  '<div class="col-sm-10 col-xs-9">'+
                    '<div class="row">'+
                      '<span class="comment_data">Gary_6996</span>'+ 
                      '<span class="comment_data">Jun 12th, 2003</span>'+
                    '</div>'+
                    '<div class="row">'+
                      '<span class="comment_data">This guy is on his level!</span>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
              '</li>';

             document.getElementById("commentList").appendChild(usercomment); 
        });
    }
  });
} */


 function likevideo(){
  $.ajax({
    type:"get",
    url:"checklogin",
    dataType:"text",
    success:function(data){
      if(data.status===1){
      
      }else{

          var popup = document.getElementById("myPopup");
          popup.classList.toggle("show");
      }
    }
  })
    
} 

$(document).ready(function(){
    $("#myPopup").click(function(){ 
      var popup = document.getElementById("myPopup");
          popup.classList.toggle("hide");
    });
});

function checkLogin(){
  var currentpath = window.location.href;
   $.ajax({
    type:"get",
    url:"checklogin",
    data:{"currentpath":currentpath},
    dataType:"json",
    success:function(data){ 
      alert(data);
      if(data.status===1){
             $("#commentsubmit").show();
      }else{
      //  window.location.href = "/sign-in";
      } 
    },
    error:function(){
     alert("error occurred");
    }
  }); 
}



//SUBMIT COMMENT POST
$(document).ready(
  function(){
  $("#comment-form").parsley();

    $("#comment-form").on("submit",function(event){
      event.preventDefault();
      $videodata = $.urlParam('xrv');
    
     if($("#comment-form").parsley().isValid()){
        
         $.ajax({
            type:"post",
            url:"post_comment",
            data:{'videodata': $videodata,'comment':$("#comment").val()},
             beforeSend:function(){
                   $('#commentsubmit').attr('disabled', 'disabled');
                   $('#commentsubmit').val('Hold on...');
               },
            dataType:"json",
            success:function(data){
                $("#msg").text(data.msg);
                 $(".statusmsg").css("display","block");
                if(data.status===1){
                        $(".statusmsg").removeClass("alert-danger");
                        $(".statusmsg").addClass("alert-success");
                        $('#comment-form')[0].reset();
                        $('#comment-form').parsley().reset();
                         $('#commentsubmit').attr('disabled', false);
                        $('#commentsubmit').val('Comment');

                         $(".alert").fadeTo(2000, 500).slideUp(500, function(){
                              $(".alert").alert('close');
                        });
                 }
          }
        });
      }
    });
  
}
);

$.urlParam = function(name){
  var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
  return results[1] || 0;
}

$(document).ready(function(){
 
});

function autoplay(){
  var videoid = document.getElementById("myvideo");
    videoid.autoplay = true;
    videoid.load();
}