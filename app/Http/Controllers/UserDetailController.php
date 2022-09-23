<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // get user
        $userDetail = UserDetail::latest()->paginate(5);

        return new UserResource(true, 'List User', $userDetail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // define validation rules

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // define validation rules
        $validator = Validator::make($request->all(),[
            'userId' => 'required',
            'photoUrl' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048'
        ]);

        // check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // upload image
        $image = $request->file('photoUrl');
        $image->storeAs('public/users', $image->hashName());

        // create user detail
        $userDetail = UserDetail::create([
            'user_id' => $request->userId,
            'photo_url' => $image->hashName(),
            'status_member' => 'normal',
            'favourites_destination' => 'null',
            'wallet' => 0,
            'about' => 'null',
        ]);

        // return response
        return new UserResource(true, 'user details have been added', $userDetail);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserDetail $userDetail)
    {

        // return single user as a resource
        return new UserResource(true, 'Data User', $userDetail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDetail $userDetail)
    {
          // define validation rules
          $validator = Validator::make($request->all(),[
            'userId' => 'required',
            'about'
        ]);

        // check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // check if image is not empty
        if ($request->hasFile('photoUrl')) {

            // upload image
            $image = $request->file('photoUrl');
            $image->storeAs('public/users', $image->hashName());

            // delete old image
            Storage::delete('public/users/'.$userDetail->photo_url);

            // update user with new image
            $userDetail->update([
                'user_id' => $request->userId,
                'photo_url' => $image->hashName(),
                'status_member' => 'normal',
                'favourites_destination' => 'null',
                'wallet' => 0,
                'about' => $request->about,
            ]);

        } else {

            // update user without image
            $userDetail->update([
                'user_id' => $request->userId,
                'status_member' => 'normal',
                'favourites_destination' => 'null',
                'wallet' => 0,
                'about' => $request->about,
            ]);
        }

        return new UserResource(true, 'user details have been successfuly update!', $userDetail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDetail $userDetail)
    {

         //delete image
         Storage::delete('public/posts/'.$userDetail->photo_url);

         //delete user
         $userDetail->delete();

         //return response
         return new UserResource(true, 'Data User Success Deleted!', null);
    }
}
