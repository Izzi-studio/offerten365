<?php
namespace App\Traits;

use App\Models\Proposal;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;

trait ReviewTrait{

    /**
     * Create review.
     * @param  Request $request
     * @param  User $user
     * @param  Proposal $proposal
     * @return \Illuminate\Http\RedirectResponse
     */

    public function writeReview(Request $request, User $user, Proposal $proposal){

        $request->flash();

        $this->validate($request, [
            'message' => ['required'],
            'rating' => ['integer','required','min:1','max:5'],
        ]);

        return Review::create([
            'message'=> $request->message,
            'user_id_from'=> auth()->user()->id,
            'user_id_to'=> $user->id,
            'rating'=> $request->rating,
            'proposal_id'=>$proposal->id,
        ]) == true ? back()->with('success', true) : back();

    }

}
