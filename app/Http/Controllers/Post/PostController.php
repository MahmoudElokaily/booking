<?php

namespace App\Http\Controllers\Post;

use App\helpers\ImageHelpers;
use App\Http\Controllers\Controller;
use App\Models\OnwerPost;
use App\Models\Post;
use App\Models\TenantPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function createPost()
    {
        $data["title"] = "Create Post";
        return view("pages.create-post" , $data);
    }

    public function storePost(Request $request) {
        $request->validate([
            "description"   => "required",
            "type"          => "required",
            "city"          => "required",
            "room"          => "required",
            "bathroom"      => "required",
            "price"         => "required",
            "area"          => "required",
            "property"      => "required"
        ]);
        $fileNames = NULL;
        $imagesName = [];
        if (isset($request->images)) {
            foreach ($request->images as $image) {
                $imageName = ImageHelpers::saveImage($image, "images/owner/" . Auth::user()->name);
                $imagesName[] = $imageName;
                sleep(1);
            }
            $fileNames = json_encode($imagesName);
        }
       Post::create([
            'description'   => $request->description,
            'user_id'       => Auth::id(),
            'fileNames'     => $fileNames,
            'type'          => $request->type,
            'city'          => $request->city,
            'room'          => $request->room,
            'price'         => $request->price,
            'bathroom'      => $request->bathroom,
            'area'          => $request->area ?? '',
            'property'      => $request->property ?? '',
            'address'       => $request->address ?? '',
        ]);
        return to_route('dashboard');
    }

    public function deletePost(Request $request) {
        $user = Auth::user();
        $post = Post::findOrFail($request->id)->delete();
        return to_route('dashboard');
    }

    public function PostsSearch(Request $request,$search) {
        $data['data'] = __("Home");
        $Postes = Post::where('description', 'LIKE', "%{$search}%")->with('user');
        if (isset($request->Room))
        {
            $Postes->where('Room',$request->Room);
            $data['Room']= (float)$request->Room;
        }
        if (isset($request->Bathroom))
        {
            $Postes->where('Bathroom',$request->Bathroom);
            $data['Bathroom']= (float)$request->Bathroom;
        }
        if (isset($request->minPrice))
        {
            $Postes->where('Price','<=', $request->minPrice);
            $data['minPrice']= (float)$request->minPrice;
        }
        if (isset($request->maxPrice))
        {
            $Postes->where('Price','>=', $request->maxPrice);
            $data['maxPrice']= (float)$request->maxPrice;
        }
        if (isset($request->city))
        {
            $Postes->where('city',$request->city);
            $data['city']= $request->city;
        }
        if (isset($request->area))
        {
            $Postes->where('area',$request->area);
            $data['area']= $request->area;
        }
        if (isset($request->address))
        {
            $Postes->where('address',$request->address);
            $data['address']= $request->address;
        }
        if (isset($request->property))
        {
            $Postes->where('property',$request->property);
            $data['property']= $request->property;
        }

        $data['posts'] = $Postes->paginate(6);
        return view('pages.search', $data);
    }
}
