<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ZoneFacility;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function index()
{
    // Retrieve only users who have at least one zoneFacility record
    $users = User::whereHas('zoneFacilities')->with('zoneFacilities')->get();

    return view('admin.responses.index', compact('users'));
}

    public function showResponse(User $user)
    {
        $zoneFacilities = ZoneFacility::where('user_id', $user->id)->get();

        foreach ($zoneFacilities as $facility) {
            $facility->item_name = str_replace('_', ' ', $facility->item_name);
            $facility->image_url = $facility->image ? asset($facility->image) : null;
        }

        return view('admin.responses.show', [
            'zoneFacilities' => $zoneFacilities,
            'user' => $user
        ]);
    }

    public function deleteFacilities(User $user)
    {
        // Delete all ZoneFacility records associated with the user
        ZoneFacility::where('user_id', $user->id)->delete();

        return redirect()->route('admin.responses')->with('success', 'All related facilities have been deleted for this user.');
    }
}
