<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OldLoan;
use Illuminate\Http\Request;

class OldLoanController extends Controller
{

  public function store(Request $request)
  {

    if ($request->hasFile("signature")) {
      $signature = $request->file("signature");
      $signature_save = $signature->storeAs('files', $signature->getClientOriginalName());

      if ($signature_save){
        $loan = OldLoan::create([
          'firstName' => $request->firstName,
          'lastName' => $request->lastName,
          'otherName' => $request->otherName,
          'email' => $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
          'lgArea' => $request->lgArea,
          'state' => $request->state,
          'loanPurpose' => $request->loanPurpose,
          'loanDuration' => $request->loanDuration,
          'amount' => $request->ammount,
          'bvn' => $request->bvn,
          'bank' => $request->bank,
          'accountNumber' => $request->accountNumber,
          'signature' => $signature->getClientOriginalName()
        ]);
    
        if ($loan) return response()->json([
          'status'   => 'Submitted',
          'responce' => 'Your application has been submitted, you will be reached back to you shortly'
        ]);
      }
    }
    else {
      return response()->json([
        'status'   => '2',
        'responce' => "please select to upload the file you'd like to Submit"
      ]);
    }

  }
  
  public function show($id)
  {
    return response()->json(OldLoan::find($id));
  }
  
  public function all()
  {
    return response()->json(OldLoan::all());
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\OldLoan  $oldLoan
   * @return \Illuminate\Http\Response
   */
  public function destroy(OldLoan $oldLoan)
  {
    //
  }
}
