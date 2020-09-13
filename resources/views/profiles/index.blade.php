@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3" style="padding-left: 30px">
            <img src="{{$user->profile->profileImage() }}" alt="User Avatar" class="rounded-circle img-fluid p-4" style="width: 100%;">

        </div>
        <div class="col-9 pt-4">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-baseline pb-3">
                    <div class="h4">{{ $user->username }}</div>

                <follow-button user-id="{{$user->id}}" follows="{{ $follows }}" button="{{true}}"/>


                </div>


                @can('update',$user->profile)
                <a href="/p/create" class="btn btn-primary">Add a new Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{$user->id}}/edit">Edit Profile </a>
            @endcan
            <div class="d-flex ">
                <div class="pr-5" ><strong>{{$postsCount}} </strong> posts</div>
                <div class="pr-5" ><strong>{{$followersCount}} </strong> followers</div>
                <div class="pr-5" ><strong>{{$followingCount}} </strong> following</div>
            </div>
            <div class="pt-3 font-weight-bold">
                {{ $user->profile->title ?? 'Not added Yet' }}
            </div>
            <div>
                {{ $user->profile->description ?? 'Not added Yet'}}
            </div>
            <div>
                <a href="{{ $user->profile->url ?? '#' }}">{{ $user->profile->url ?? 'Not added Yet' }}</a>
            </div>
        </div>
    </div>

    <div class="row pt-5">

        @foreach($user->posts as $post)
           <div class="col-4 py-2">
               <a href="/p/{{$post->id}}">
               <img src="/storage/{{$post->image}}" alt="" style="width: 100%" >
               </a>
           </div>
        @endforeach
    </div>


    </div>

@endsection
