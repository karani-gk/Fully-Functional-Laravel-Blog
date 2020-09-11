@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">ALL POSTS</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped table-sm">
                        <?php $counter = 0; ?>
                        @foreach($posts as $post)
                        <?php $counter++; ?>
                            <tr>
                                <td>{{ $counter }}.</td>
                                <td><p style="color:#151617; font-size: 0.8em;">{{ $post->post_title }}</p></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>


        <div class="col-md-8">
            <div class="card">
                <div class="card-header">CREATE POST</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('save-post') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-9">
                                <label>TITLE</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Post title" required>
                            </div>

                            <div class="col-md-3">
                                <label>CATEGORY</label>
                                <select class="form-control" name="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br/>

                        <div class="row">
                            <div class="col-md-6">
                                <label>READ DURATION</label>
                                <input type="text" name="read_duration" id="read_duration" class="form-control" placeholder="Estimated read time" required>
                            </div>

                            <div class="col-md-6">
                                <label>MAIN IMAGE</label>
                                <input type="file" name="main_image" id="main_image" class="form-control" required>
                            </div>
                        </div>

                        <br/>

                        <div class="row">
                            <div class="col-md-12">
                                <label>BODY</label>
                                <textarea id="post_body" name="post_body"></textarea>
                            </div>
                        </div>

                        <br/>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-block">Save</button>
                            </div>
                        </div>

                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
