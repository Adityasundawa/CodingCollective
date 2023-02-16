<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Candidate;
use Validator;
use App\Http\Resources\CandidateResource;
use Illuminate\Support\Facades\Auth;

class CandidateController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::all();

        return $this->sendResponse(CandidateResource::collection($candidates), 'Candidate successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'education' => 'required',
            'birthday' => 'required|date',
            'experience' => 'required|numeric',
            'last_position' => 'required',
            'applied_position' => 'required',
            'skills' => 'required',
            'email' => 'required|email|unique:candidates,email',
            'phone' => 'required',
            'resume' => 'required|mimes:pdf',
        ]);


        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        if (Auth::user()->role_id == 1){
            $input['resume'] = time().'.'.$request->resume->extension();  
            $request->resume->move(public_path('upload/pdf'),  $input['resume']);
            $candidate = Candidate::create($input);
        }else{
            return response()->json([
                'message' => 'User is not allowed to adding candidate!'
           ], 400);
        }
      

        return $this->sendResponse(new CandidateResource($candidate), 'Candidate created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidate = Candidate::find($id);

        if (is_null($candidate)) {
            return $this->sendError('Candidate not found.');
        }

        return $this->sendResponse(new CandidateResource($candidate), 'Candidate retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        $input = $request->all();


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'education' => 'required',
            'birthday' => 'required|date',
            'experience' => 'required|numeric',
            'last_position' => 'required',
            'applied_position' => 'required',
            'skills' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'resume' => 'required|mimes:pdf',
        ]);


        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        if (Auth::user()->role_id == 1){
            $input['resume'] = time().'.'.$request->resume->extension();  
            $request->resume->move(public_path('upload/pdf'),  $input['resume']);
            $candidate->name = $input['name'];
            $candidate->education = $input['education'];
            $candidate->birthday = $input['birthday'];
            $candidate->experience = $input['experience'];
            $candidate->last_position = $input['last_position'];
            $candidate->applied_position = $input['applied_position'];
            $candidate->skills = $input['skills'];
            $candidate->email = $input['email'];
            $candidate->phone = $input['phone'];
            $candidate->update();
            return $this->sendResponse(new CandidateResource($candidate), 'Candidate Update successfully.');
        }else{
             return response()->json([
                'message' => 'User role is not allowed to updating candidate!'
           ], 400);
        }
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();

        return $this->sendResponse([], 'Candidate deleted successfully.');
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
          'message' => 'Successfully loggedout'
        ], 200);
    }
}
