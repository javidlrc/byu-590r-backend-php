<?php

namespace App\Http\Controllers\API;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ArtistController extends BaseController
{
    public function index()
    {
       $artists = Artist::get();

       foreach($artists as $artist){
        $artist ->file = $this->getS3url($artist->file);
       }

       return $this->sendResponse($artists, 'Artists');
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes',
            'description' => 'sometimes',
            'favoriteSong' => 'sometimes',
            'favAlbum' => 'sometimes',
            'country' => 'sometimes',
            'genre_id' => 'sometimes'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $artist = Artist::findOrFail($id);

        $artist->name = $request->name ?? 'Test';
        $artist->description = $request->description ?? 'Test description';
        $artist->favoriteSong = $request->favoriteSong;
        $artist->favAlbum = $request->favAlbum;
        $artist->country = $request->country;
        $artist->genre_id = $request->genre_id ?? 2;

        // if(isset($artist->file)){
        //     $artist->file = $this->getS3Url($artist->file);
        // }

        $artist->save();

        $success['artist'] = $artist;
        return $this->sendResponse($success, 'Artist Updated');
    }



    public function destroy($id)
    {
        $artist = Artist::findOrFail($id);
        $artist->delete();

        $success['artist'] = $artist;
        return $this->sendResponse($success, 'Artist Deleted');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'favoriteSong' => 'required',
            'favAlbum' => 'required',
            'country' => 'required',
            'genre_id' => 'required',
            'file' => 'required|image'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $artist = new Artist();
        $artist->name = $request->name;
        $artist->description = $request->description;
        $artist->favoriteSong = $request->favoriteSong;
        $artist->favAlbum = $request->favAlbum;
        $artist->country = $request->country;
        $artist->genre_id = $request->genre_id;

        if ($request->hasFile('file')) {
        
            $extension  = request()->file('file')->getClientOriginalExtension(); //This is to get the extension of the image file just uploaded
            $image_name = time() .'_artist_cover.' . $extension;
            $path = $request->file('file')->storeAs(
                'images',
                $image_name,
                's3'
            );
            Storage::disk('s3')->setVisibility($path, "public");
            if(!$path) {
                return $this->sendError($path, 'artist cover failed to upload!');
            }
            
            $artist->file = $path;

        }

        $artist->save();
        $success['artist'] = $artist;

        return $this->sendResponse($success, 'Artist Created');
    }

}
