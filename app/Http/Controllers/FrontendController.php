<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use DB;

class FrontendController extends Controller
{
    public function index(){

    	$posts = Post::join('posts_body', 'posts_body.post_id', '=', 'posts.id')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
    		->orderBy('posts.id', 'DESC')
    		->select(
    			'posts.id',
    			'posts.post_title',
    			'posts.post_url',
    			'posts.main_image',
    			'posts.read_duration',
    			'posts.created_at',
                'categories.category',
    			'posts_body.body'
    		)->paginate(5);

    	return view('pages.index')
    		->with('posts', $posts);
    }

    public function details($id){
        
    	$post = Post::join('posts_body', 'posts_body.post_id', '=', 'posts.id')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
    		->where('posts.post_url', $id)
    		->select(
                'posts.id',
    			'posts.post_title',
    			'posts.post_url',
    			'posts.main_image',
    			'posts.read_duration',
    			'posts.created_at',
                'categories.category',
                'posts.category_id',
    			'posts_body.body'
    		)->first();

        if( $post ){

            $title = $post->post_title;
            $ogImage = "blog/" . $post->main_image;
            $url = "https://codewithkarani.tech/collections/$id/article";

            $commentCount = DB::table('comments')
                ->where('post_id', '=', $post->id)
                ->count();

            $responseCount = DB::table('comment_response')
                ->where('post_id', $post->id)
                ->count();

            $commentCount = $commentCount + $responseCount;

            $relatedPosts = Post::where('category_id', $post->category_id)
                ->where('id', '!=', $post->id)
                ->get();

            $comments = DB::table('comments')->where('post_id', $post->id)->orderBy('id', 'DESC')->get();

            return view('pages.details')
                ->with('post', $post)
                ->with('commentCount', $commentCount)
                ->with('relatedPosts', $relatedPosts)
                ->with('comments', $comments)
                ->with('url', $url)
                ->with('title', $title)
                ->with('ogImage', $ogImage);
        }else{
            return redirect()->route('/');
        }

        
    }

    public function search(Request $request){

        $title = "Search - Perfect the skills you need for your next big project";
        $ogImage = "favicon.png";

    	$search = $request->input('search');

    	$posts = Post::join('posts_body', 'posts_body.post_id', '=', 'posts.id')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
    		->orderBy('posts.id', 'DESC')
    		->where('post_title', 'like', '%' . $search . '%')
    		->select(
    			'posts.id',
    			'posts.post_title',
    			'posts.main_image',
    			'posts.read_duration',
    			'posts.created_at',
                'categories.category',
    			'posts_body.body'
    		)->paginate(10);

    	return view('pages.index')
    		->with('posts', $posts)
            ->with('title', $title)
            ->with('ogImage', $ogImage);

    }

    public function about(){
        $title = "About - Perfect the skills you need for your next big project";
        $ogImage = "favicon.png";

        $codeExperience = (int)date('Y') - 2013;
    	return view('pages.about')
            ->with('codeExperience', $codeExperience)
            ->with('title', $title)
            ->with('ogImage', $ogImage);
    }

    public function contact(){
        $title = "Contact - Perfect the skills you need for your next big project";
        $ogImage = "favicon.png";

    	return view('pages.contact')
            ->with('title', $title)
            ->with('ogImage', $ogImage);
    }

    public function sendmail( Request $request ){
    	$data = array(
            'email' => $request->input('contact_email'),
            'name' => $request->input('contact_name'),
            'contact_phone' => $request->input('contact_phone'),
            'contact_body' => $request->input('contact_body'),
            'f_mail' => 'hello@codewithkarani.tech',
            'f_name' => 'Code with Karani'
        );

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->to('geoffrey.kamundi@gmail.com', $data['name'])
            // ->cc("info@shuleclick.tech")
            // ->bcc("info@shuleclick.tech")
            ->subject("Contact form request");
            $message->from($data['f_mail'],$data['f_name']);
        });

        Mail::send('emails.contact-thankyou', $data, function($message) use ($data) {
            $message->to($data['email'], $data['name'])
            // ->cc("info@shuleclick.tech")
            // ->bcc("info@shuleclick.tech")
            ->subject("Contact form request");
            $message->from($data['f_mail'],$data['f_name']);
        });

        return redirect()->back()
            ->with('success', 'Your message is successfully sent. I will get back to you soonest. Thank you.');
    }


    public function newsletter(Request $request){

    	$email = $request->get('email');

    	$exists = DB::table('newsletter')->where('email', '=', $email)->first();

    	if( !$exists ){
    		DB::table('newsletter')->insert([
	    		'email' => $email
	    	]);

	    	$data = array(
	            'email' => $email,
	            'f_mail' => 'hello@codewithkarani.tech',
	            'f_name' => 'Code with Karani'
	        );

	        Mail::send('emails.newsletter', $data, function($message) use ($data) {
	            $message->to($data['email'], 'Newsletter Subscriber')
	            // ->cc("info@shuleclick.tech")
	            ->bcc("codewithkarani@gmail.com")
	            ->subject("Newsletter Subscription");
	            $message->from($data['f_mail'],$data['f_name']);
	        });

	    	$message = "success";

    	}else{
    		$message = "exists";
    	}

    	return json_encode($message);

    }

    public function categories(){
        $title = "Categories - Perfect the skills you need for your next big project";
        $ogImage = "favicon.png";

        $categories = DB::table('categories')->inRandomOrder()->get();
        return view('pages.categories')
            ->with('categories', $categories)
            ->with('title', $title)
            ->with('ogImage', $ogImage);
    }


    public function comment(Request $request){

        $postId = $request->get('postId');
        $commentName = $request->get('commentName');
        $commentEmail = $request->get('commentEmail');
        $commentBody = $request->get('commentBody');

        $exists = DB::table('comments')
            ->where('post_id', '=', $postId)
            ->where('full_name', '=', $commentName)
            ->where('email', '=', $commentEmail)
            ->where('comment', '=', $commentBody)
            ->first();

        if( !$exists ){
            DB::table('comments')->insert([
                'full_name' => $commentName,
                'email' => $commentEmail,
                'comment' => $commentBody,
                'post_id' => $postId
            ]);

            $message = "success";
            $comments = DB::table('comments')
                ->where('post_id', $postId)
                ->orderBy('id', 'DESC')
                ->get();

            $commentCount = DB::table('comments')
                ->where('post_id', $postId)
                ->count();

            $responseCount = DB::table('comment_response')
                ->where('post_id', $postId)
                ->count();

            $commentCount = $commentCount + $responseCount;

            $data = array(
                'admin_email' => 'codewithkarani@gmail.com',
                'user_email' => $commentEmail,
                'user_name' => $commentName,
                'comment' => $commentBody,
                'f_mail' => 'hello@codewithkarani.tech',
                'f_name' => 'Code with Karani',
                'post_id' => $postId
            );

            Mail::send('emails.usercomment', $data, function($message) use ($data) {
                $message->to($data['user_email'], 'Site User')
                // ->cc("info@shuleclick.tech")
                ->bcc("codewithkarani@gmail.com")
                ->subject("New Comment");
                $message->from($data['f_mail'],$data['f_name']);
            });


            Mail::send('emails.admincomment', $data, function($message) use ($data) {
                $message->to($data['admin_email'], 'Site User')
                // ->cc("info@shuleclick.tech")
                ->bcc("codewithkarani@gmail.com")
                ->subject("New Comment");
                $message->from($data['f_mail'],$data['f_name']);
            });

            $context = [
                'message' => $message,
                'comments' => $comments,
                'commentCount' => $commentCount
            ];
            
        }else{
            $message = "exists";

            $context = [
                'message' => $message
            ];
        }

        return json_encode($context);        
    }


    public function commentresp(Request $request){
        $commentId = $request->get('commentId');
        $name = $request->get('name');
        $comment = $request->get('comment');

        $commentDetails = DB::table('comments')
            ->where('id', $commentId)
            ->first();

        $data = array(
            'email' => $commentDetails->email,
            'post_id' => $commentDetails->post_id,
            'comment_author' => $commentDetails->full_name,
            'response_author' => $name,
            'f_mail' => 'hello@codewithkarani.tech',
            'f_name' => 'Code with Karani'
        );

        Mail::send('emails.commentreply', $data, function($message) use ($data) {
            $message->to($data['email'], $data['comment_author'])
            // ->cc("info@shuleclick.tech")
            // ->bcc("codewithkarani@gmail.com")
            ->subject("Comment Response");
            $message->from($data['f_mail'],$data['f_name']);
        });

        $postId = DB::table('comments')
            ->where('id', $commentId)
            ->pluck('post_id')
            ->first();

        $exists = DB::table('comment_response')
            ->where('comment_id', $commentId)
            ->where('name', $name)
            ->where('comment', $comment)
            ->first();

        if( !$exists ){
            DB::table('comment_response')->insert([
                'comment_id' => $commentId,
                'post_id' => $postId,
                'name' => $name,
                'comment' => $comment
            ]);
            $message = "success";
        }else{
            $message = "exists";
        }

        return json_encode($message);
    }


    public function notfound(){
        return view('pages.errors.404');
    }

    public function fatal(){
        return view('pages.errors.500');
    } 

}
