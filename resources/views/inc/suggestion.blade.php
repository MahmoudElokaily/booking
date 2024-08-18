@php
    $authenticatedUser = auth()->check() ? auth()->user() : null;
        $usersQuery = \App\Models\User::query();

        if ($authenticatedUser) {
            $usersQuery->where('id', '!=', $authenticatedUser->id);
        }

        $users = $usersQuery->inRandomOrder()
            ->limit(4)
            ->get();

@endphp

<div class="sticky-top" style="top:-470px;z-index: 999;">
    <div class="card border-0   mb-3 mt-3 ">
        <div class="card-header   border-0" style="font-size:1.25rem;font-weight: 700;">
            Suggest to Connect with</div>
        <div class="card-body border-0 p-2" style="background-color:#f8f9fc">

            <!--
user module -->
            @foreach($users ?? [] as $user)
                <div class="user-list-item p-3 border-bottom">
                    <card href="">
                        <div class="d-flex">
                            <div>
                                <img src="@if(isset($user->photo)) {{asset('images/' . $user->name . "/" . $user->photo)}} @else {{asset('images/default/default.jpg')}} @endif"
                                     style="width:3rem;height:3rem" class="mr-2 rounded-circle">
                            </div>
                            <div>
                                <div class="d-flex ">
                                    <div>
                                        <div style="line-height: 0.6rem;">
                                            <a href="#/amyzhang1zzfiltech">
                                                <strong class="v-text no-link">{{$user->name}}</strong></a>
                                        </div>
                                        <div> <span class="small"> </span></div>
                                    </div>
                                    <div class="ml-auto">
                                        <a type="button" href="{{route('chat' , $user->id ?? "")}}"
                                                class="btn btn-outline-primary rounded-pill font-weight-bold btn-sm follow-btn"
                                                dataf="user"
                                                datau="amyzhang1zzfiltech">Connect</a>
                                    </div>
                                </div>
                                <div><span>{{$user->email}}</span></div>
                            </div>



                        </div>
                    </card>
                </div>
            @endforeach
        </div>
        <div class="card-footer   border-0"><a href="{{route('dashboard')}}">show more...</a></div>
    </div>

</div>
