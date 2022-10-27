<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        // dd(request('tag'));
        // dd(request()->tag);
        return view('listings.index', [
            'heading' => 'Latest Listing',
            // 'listings' => Listing::all()
            // Without Pagination
            // 'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
            // 'listings' => Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(8)
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // Show one listing
    public function show(Listing $listing)
    {
        return view('listings.show',  [
            'heading' => 'Listing by ' . $listing['company'],
            'listing' => $listing
        ]);
    }

    // Show create listing
    public function create()
    {
        return view('listings.create');
    }

    // Store a listing
    public function store(Request $request)
    {
        // $formValues = $request->all();
        // dd($formValues);
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }


        $formFields['user_id'] = auth()->id();
        // Will not work without a protected fillable property in the model, due to mass creation...
        // Or Model::unguard(); in the boot method of the AppServiceProvider Class
        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully !');
    }

    // Show Edit
    public function edit(Listing $listing)
    {
        // dd($listing->title);
        if ($listing->user_id === auth()->id()) {
            return view('listings.edit', ['listing' => $listing]);
        } else {
            abort(403, 'Unhauthorized Action');
        }
    }

    // Update Listing Data
    public function update(Request $request, Listing $listing)
    {
        // $formValues = $request->all();
        // dd($formValues);

        // Make sure logged user is owner
        if ($listing->user_id === auth()->id()) {
            $formFields = $request->validate([
                'title' => 'required',
                'company' => 'required',
                'location' => 'required',
                'website' => 'required',
                'email' => ['required', 'email'],
                'tags' => 'required',
                'description' => 'required'
            ]);

            if ($request->hasFile('logo')) {
                $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            }

            // Will not work without a protected fillable property in the model, due to mass creation...
            // Or Model::unguard(); in the boot method of the AppServiceProvider Class
            $listing->update($formFields);

            return to_route('home')->with('message', 'Listing updated successfully !');
        } else {
            abort(403, 'Unhauthorized Action');
        }
    }

    // Delete Listing
    public function destroy(Listing $listing)
    {
        if ($listing->user_id === auth()->id()) {
            $listing->delete();
            return redirect('/')->with('message', 'Listing deleted successfully !');
        } else {
            abort(403, 'Unhauthorized Action');
        }
    }

    // See manage view
    public function manage()
    {
        $user = auth()->user();
        return view('listings.manage', ['listings' => $user->listings()->get()]);
    }
}
