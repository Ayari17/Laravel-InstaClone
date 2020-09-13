@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card mx-auto mb-3" style="max-width: 85%;max-height: 720px">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <img src="/storage/{{$post->image}}" class="card-img" alt="...">
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

                                        {{--<a href="#" class="pl-3">Follow</a>--}}
                                        <div class="d-inline-block"><follow-button user-id="{{ $post->user->id }}" follows="{{$follows}}"  /></div>


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
    </div>

@endsection
