<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Image;
use Auth;
use Mail;
use DB;

class PostsController extends Controller
{
    public function save(Request $request){

        $postBody = $request->input('post_body');
        $postTitle = $request->input('title');

        $postUrl = str_replace(" ", "-", $postTitle);
        $postUrl = strtolower( $postUrl );
        $postUrl = preg_replace('/[^A-Za-z0-9\-]/', '', $postUrl);
        
        
    	if( $request->hasFile(('main_image')) ){

            $this->validate($request, [
                'main_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $initial = "KARANI_";
    
            $image = $request->file('main_image');

            $input['imagename'] = $initial . str_random() . time().'.'.$image->getClientOriginalExtension();

            $destinationPath = base_path('assets/images/blog');
    
            $img = Image::make($image->getRealPath());
    
            $img->save($destinationPath.'/'.$input['imagename']);

            $post = new Post();
            $post->post_title = $postTitle;
            $post->post_url = $postUrl;
            $post->read_duration = $request->input('read_duration');
            $post->user_id = Auth::user()->id;
            $post->category_id = $request->input('category');
            $post->main_image = $input['imagename'];

            if( $post->save() ){
            	DB::table('posts_body')->insert([
            		'body' => $postBody,
            		'post_id' => $post->id
            	]);
            }

            $notification = array(
	            'message' => 'Post successful!', 
	            'alert-type' => 'success'
	        );

            $emailPostBody = substr($postBody, 0, 600);

            $subscribers = DB::table('newsletter')->get();

            foreach( $subscribers as $subscriber ){
                $data = array(
                    'email' => $subscriber->email,
                    'post_id' => $post->post_url,
                    'post_title' => $request->input('title'),
                    'post_body' => $emailPostBody,
                    'name' => 'Code with Karani Subscriber',
                    'f_mail' => 'hello@codewithkarani.tech',
                    'f_name' => 'Code with Karani'
                );

                Mail::send('emails.newpost', $data, function($message) use ($data) {
                    $message->to($data['email'], $data['name'])
                    // ->cc("info@shuleclick.tech")
                    // ->bcc("info@shuleclick.tech")
                    ->subject("New Post Published");
                    $message->from($data['f_mail'],$data['f_name']);
                });
            }

            return redirect()->back()->with($notification);

        }else{
            $notification = array(
	            'message' => 'Error! No image found!', 
	            'alert-type' => 'danger'
	        );

	        return redirect()->back()->with($notification);
        }

    }
}
