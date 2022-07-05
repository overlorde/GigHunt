<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Validation\Rule;



class ListingController extends Controller
{
    //Show all listings
    public function index(){
	return view('listings.index', [
	    'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(8)
	]);

    }
    // Show single listing

    public function show(Listing $listing){

	return view('listings.show',[
	    'listing' => $listing
	]);
    }


    // Show create form

    public function create(){
	return view('listings.create');
    }

    // Store listing data

    public function store(Request $request){
	$formFields = $request->validate([
	    'title' => 'required',
	    'company' => ['required', Rule::unique('listings', 'company')],
	    'location' => 'required',
	    'website' => 'required',
	    'email' => ['required', 'email'],
	    'tags' => 'required',
	    'description' => 'required',

	]);
	if($request->hasFile('logo')){
	    $formFields['logo'] = $request->file('logo')->store('logos', 'public');
	}
	//dd($formFields);
	Listing::create($formFields);



	return redirect('/')->with('message', 'Listing created successfully!');
    }
    // Show Edit Form

    public function edit(Listing $listing){
	return view('listings.edit', ['listing'=>$listing]);
    }

    //Update Listing Data
    public function update(Request $request, Listing $listing){
	$formFields = $request->validate([
	    'title' => 'required',
	    'company' => ['required'],
	    'location' => 'required',
	    'website' => 'required',
	    'email' => ['required', 'email'],
	    'tags' => 'required',
	    'description' => 'required',

	]);
	if($request->hasFile('logo')){
	    $formFields['logo'] = $request->file('logo')->store('logos', 'public');
	}
	//dd($formFields);
	$listing->update($formFields);



	return back()->with('message', 'Listing Updated Successfully!');
    }

    // Delete Listing

    public function destroy(Listing $listing){

	$listing->delete();
	return redirect('/')->with('message', 'Listing Deleted Successfully.');

    }
}
