@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @forelse ($posts as $post)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $post->title }}
                    </div>

                    <div class="panel-body">
                        {{ $post->body }}
                    </div>
                    @if (Auth::check())
                        <div class="panel-footer">
                        @if ($favoritePosts->contains($post->id))
                            <form action="{{ url('unfavorite/'. $post->id) }}" method="POST">
                        @endif
                            <form action="{{ url('favorite/'. $post->id) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit">
                                    <i class="fa fa-{{ ($favoritePosts->contains($post->id)) ? 'heart' : 'heart-o' }}"></i>
                                </button>
                            </form>
                            {{-- <favorite></favorite>
                            <span>23</span> --}}
                        </div>
                    @endif
                </div>
            @empty
                <p>No post created.</p>
            @endforelse

           {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
