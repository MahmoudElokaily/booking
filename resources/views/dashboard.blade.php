@php
    $users = \App\Models\User::where('id' , '!=' , Auth::id())->get();
@endphp
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
                    <a type="button" href="{{route("admin.create-owner-post")}}" class="btn btn-dark btn-lg m-3">Add Owner Post</a>
                    <a type="button" href="{{route("admin.create-tenant-post")}}" class="btn btn-dark btn-lg m-3">Add tenant Post</a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table id="example" class="table table-striped datatable" style="width:100%">
                        <caption>Select User to Chat</caption>
                        <title>Selcet User to chat</title>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td><a type="button" class="btn btn-primary" href="{{route('chat' , $user->id)}}">Chat</a></td>
                        </tr>
                            <p></p>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="py-12">
        @php
            $user = \Illuminate\Support\Facades\Auth::user();
            $posts = $user->posts;
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

@push('js')
    <script type="text/javascript">
        new DataTable('#example');
    </script>
@endpush


</x-app-layout>
