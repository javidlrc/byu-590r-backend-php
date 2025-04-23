<?php

namespace App\Http\Controllers\API;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class ArtistController extends BaseController
{
    public function index()
    {
       $artists = Artist::with('genre')->get(); // eager load the genre

       foreach($artists as $artist){
        $artist ->file = $this->getS3url($artist->file);
       }

       return $this->sendResponse($artists, 'Artists');
    }

    public function update(Request $request, Artist $artist)
{
    // no need for findOrFail
    Log::info('🎯 ArtistController@update HIT!');

    $artist->fill([
        'name' => $request->get('name', $artist->name),
        'description' => $request->get('description', $artist->description),
        'favoriteSong' => $request->get('favoriteSong', $artist->favoriteSong),
        'favAlbum' => $request->get('favAlbum', $artist->favAlbum),
        'country' => $request->get('country', $artist->country),
        'genre_id' => $request->get('genre_id', $artist->genre_id),
    ]);

    if ($request->hasFile('file')) {
        $extension = $request->file('file')->getClientOriginalExtension();
        $image_name = time() . '_artist_cover.' . $extension;
        $path = $request->file('file')->storeAs('images', $image_name, 's3');
        Storage::disk('s3')->setVisibility($path, 'public');
        $artist->file = $path;
    }

    $artist->save();
    $artist->load('genre');
    $artist->file = $this->getS3url($artist->file);

    return $this->sendResponse(['artist' => $artist], 'Artist Updated');
}




    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artist = Artist::findOrFail($id);
        Storage::disk('s3')->delete($artist->file);
        $artist->delete();

        $success['artist']['id'] = $artist;
        return $this->sendResponse(['id' => $artist->id], 'Artist Deleted');
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
