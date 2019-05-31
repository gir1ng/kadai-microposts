@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])  
            @if (count($microposts) > 0)
                <ul class="list-unstyled">
                    @foreach ($microposts as $micropost)
                        <li class="media">
                            <img class="mr-2 rounded" src="{{ Gravatar::src($micropost->user->email, 50) }}" alt="">
                            <div class="media-body">
                                <div>
                                    {{ $micropost->user->name }}
                                    {{ $micropost->content }}
                                </div>
                                <div>
                                    <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id]) !!}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                {{ $microposts->render('pagination::bootstrap-4') }}
            @endif
        </div>
    </div>
@endsection