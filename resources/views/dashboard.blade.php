<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a type="button" href="{{route("admin.create-post")}}" class="btn btn-dark btn-lg">Add Post</a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        @php
            $user = \Illuminate\Support\Facades\Auth::user();
            if ($user->role == "owner"){
                $posts = \Illuminate\Support\Facades\Auth::user()->OnwerPosts;
            }
            else if ($user->role == "tenant"){
                $posts = \Illuminate\Support\Facades\Auth::user()->TenantPosts;
            }
            else {
                $ownerPosts = \App\Models\OnwerPost::all();
                $tenantPosts = \App\Models\TenantPost::all();

                $posts = $ownerPosts->merge($tenantPosts);
            }
        @endphp
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Description</th>
                    <th scope="col">From</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $index => $post)
                    <tr>
                        <th scope="row">{{++$index}}</th>
                        <td class="text-truncate" style="max-width: 200px;">{{$post->description}}</td>
                        <td>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</td>
                        <td>
                            <a type="button" href="{{route('admin.delete-post' , $post->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>




</x-app-layout>
