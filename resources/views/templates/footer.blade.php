<footer class="footer text-center py-2 theme-bg-dark">   
    <small class="copyright">Copyright @<?php echo(date('Y')) ?>
    	<a href="{{ route('/') }}">
    		<img class="profile-image mx-auto" src="/assets/images/logo.png" alt="Code with Karani" style="width:8em;">
    	</a>
    </small>   
</footer>
    
</div>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/assets/plugins/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/demo/style-switcher.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114305287-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-114305287-2');
</script>

<script>
  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>


<script type="text/javascript">

    $('body').on('click','#subscribe_newsletter',function(){

        var email = $('#newsletter').val();

        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if(email == ""){
                $('.empty-email').show();
        }else{
            if( regex.test(email) == false ){
                $('.invalid-email').show();
        }else{
            $('.invalid-email').hide();
            $('.empty-email').hide();
                $.ajax({
                    method: 'POST',
                    url:'{{ route("newsletter") }}',
                    dataType:'json',
                    data:{
                        "_token": "{{ csrf_token() }}",
                        email:email
                    },
                    success: function(res){
                        if(res == 'success'){
                            $('.news-success').show();
                            $('.news-exists').hide();
                            $('#newsletter').val('');
                        }else if(res == 'exists'){
                            $('.news-success').hide();
                            $('.news-exists').show();
                        }
                    }
                });
            }
        }
    });



    $('body').on('click','#send_comment',function(){

        var commentName = $('#comment_name').val();
        var commentEmail = $('#comment_email').val();
        var commentBody = $('#comment_body').val();
        var postId = $('#post_id').val();

        if( commentName == "" || commentEmail == "" || commentBody == "" ){
            $('#exists').hide();
            $('#data-missing').show();
            $('#invalid-cemail').hide();
            $('.good-content').hide();
        }else{
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if( regex.test(commentEmail) == false ){
                $('#exists').hide();
                $('#data-missing').hide();
                $('#invalid-cemail').show();
                $('.good-content').hide();
            }else{
                $('#exists').hide();
                $('#data-missing').hide();
                $('#invalid-cemail').hide();
                $('.good-content').show();
                $('#comm_email').html(commentEmail);
                
                $.ajax({
                    method: 'POST',
                    url:'{{ route("comment") }}',
                    dataType:'json',
                    data:{
                        "_token": "{{ csrf_token() }}",
                        postId:postId,
                        commentName:commentName,
                        commentEmail:commentEmail,
                        commentBody:commentBody
                    },
                    success: function(res){

                        if(res.message == 'exists'){
                            $('#exists').show();
                            $('.good-content').hide();
                        }else{

                            $('#ajax_comments').html('');

                            $.each(res.comments, function( index, value ) {

                                comments = '<div class="item mb-2 post-item" style="border:1px solid #5BC3D5; border-radius: 10px;"><div class="media"><div class="media-body"><i style="font-size: 1.2em; color: #5BC3D5;" class="fa fa-comment-dots"></i><span style="color:#5BC3D5; font-style: italic; font-size: 0.8em;">'+value.full_name+':</span><span class="intro" style="font-size: 0.9em;">'+ value.comment+'</span></div></div></div>';

                                $('#ajax_comments').append( comments );
                            });

                            $('.comment-count').html(res.commentCount);
                            $('#exists').hide();
                            $('.good-content').show();
                        }
                    }
                });
            }

        }

    });


    $('body').on('click','.comment-reply',function(){
        var commentId = $(this).attr('id');
        var commentIdNum = commentId.substr(commentId.indexOf("-") + 1);

        $('#comment_res-' + commentIdNum).slideToggle();
        $('#clicked-comment-id-' + commentIdNum).val(commentIdNum);
        $('#send_reply-' + commentIdNum).attr('data', commentIdNum);
    });

    $('body').on('click','.send_reply',function(){

        var commentId = $(this).attr('data');
        var name = $('#reply_name-' + commentId).val();
        var comment = $('#reply_message-' + commentId).val();

        if(name == "" || comment == ""){
            $('#data-missing-' + commentId).show();
            $('.good-content-' + commentId).hide();
            $('#exists-' + commentId).hide();
        }else{
            $('#data-missing-' + commentId).hide();
            $('.good-content-' + commentId).show();
            $('#exists-' + commentId).hide();

            $.ajax({
                    method: 'POST',
                    url:'{{ route("comment-response") }}',
                    dataType:'json',
                    data:{
                        "_token": "{{ csrf_token() }}",
                        commentId:commentId,
                        name:name,
                        comment:comment
                    },
                    success: function(res){
                        if( res == 'exists'){
                            $('.good-content-' + commentId).hide();
                            $('#exists-' + commentId).show();
                        }
                    }
                });

        }

    });

    

</script>
    
</body>
</html>