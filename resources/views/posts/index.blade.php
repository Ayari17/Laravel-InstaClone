@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach($posts as $post)
        <div class="card mx-auto mb-3" style="max-width: 85%;height: 500px">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <a href="/profile/{{ $post->user->id }}"><img src="/storage/{{$post->image}}" style="height: 500px" class="card-img" alt="..."></a>

                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex align-items-baseline">
                                <div>
                                    <img src="{{ $post->user->profile->profileImage() }}" alt="" class="rounded-circle "
                                         style="max-width: 40px">
                                </div>
                                <div class="ml-2">
                                    <div class="font-weight-bold ">
                                        <a href="/profile/{{$post->user->id}}"
                                           class="text-dark">{{$post->user->username}}</a>

                                       {{-- <follow-button user-id="{{ $post->user->id }}" follows="{{$follows}}"  />--}}
                                    </div>
                                </div>


                            </div>
                            <hr width="90%">
                        </div>

                        <p>
                            <span class="font-weight-bold ">
                            <a href="/profile/{{$post->user->id}}" class="text-dark">{{$post->user->username}}</a>
                            </span>
                            {{$post->caption}}
                        </p>
                        <p class="card-text"><small class="text-muted">Created at {{$post->created_at}}</small></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
    </div>

@endsection
