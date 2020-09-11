@include('templates.header')
@include('templates.nav')

<div class="main-wrapper">
<section class="cta-section theme-bg-light py-5">
    <div class="container text-center">
        <h2 class="heading">
            <span style="color:#000000;">A good programmer is someone who <span class="text-info">always looks both ways</span> before crossing <span class="text-info">a one-way street</span>.</span>
        </h2>
        <div class="intro">Here you learn how re-usable code is written. Remember, for it to be re-usable, it must be usable!</div>
        <form class="signup-form form-inline justify-content-center pt-3" action="{{ route('search') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="sr-only" for="search">Looking for Something?</label>
                <input type="text" id="search" name="search" class="form-control mr-md-1 search" placeholder="What are you looking for?" required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div><!--//container-->
</section>
<section class="blog-list px-3 py-5 p-md-5">
    <div class="container" style="min-height:500px;">

        @unless (count($posts))
            <p style="color:#949494; font-size: 1.4em;">No posts found!</p>
        @endunless

        @foreach( $posts as $post )
            @php
                $commentCount = DB::table('comments')
                    ->where('post_id', '=', $post->id)
                    ->count();

                $responseCount = DB::table('comment_response')
                    ->where('post_id', $post->id)
                    ->count();

                $commentCount = $commentCount + $responseCount;

            @endphp
            <div class="item mb-2 post-item">
                <div class="media">
                    <a href="{{ route('details', $post->post_url) }}">
                        <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="/assets/images/blog/{{ $post->main_image }}" alt="image">
                    </a>
                    <div class="media-body">
                        <h3 class="title mb-1"><a href="{{ route('details', $post->post_url) }}">{{ $post->post_title }}</a></h3>
                        <div class="meta mb-1">
                            <span class="date"><a href="#">{{ $post->category }}</a></span>
                            <span class="date">Published {{ date('M d, Y', strtotime( $post->created_at )) }}</span>
                            <span class="time">{{ $post->read_duration }} min read</span>
                            <span class="comment"><a href="#">{{ $commentCount }} comments</a></span>
                        </div>
                        <div class="intro"> {!! str_limit($post->body, 270, '...') !!} </div>
                        <a class="more-link" href="{{ route('details', $post->id) }}">Read more &rarr;</a>
                    </div>
                </div>
            </div>
        @endforeach

        {{ $posts->links() }}

    </div>
</section>

@include('templates.newsletter')
@include('templates.footer')