<?php

namespace App\Http\Controllers;


use App\Models\Partner;
use App\Models\Product;
use App\Services\PartnerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartnerController extends Controller
{

    private PartnerService $partnerService;

    public function __construct(PartnerService $partnerService)
    {
        $this->partnerService = $partnerService;
    }

    public function index(): View
    {
        return view('partner.index',[
            "partners" => Partner::latest()->get()
        ] );
    }

    public function show(Partner $partner): View
   {
       return view('partner.show', [
           'partner' => $partner,
           'products' => Product::latest()->get(),
           'orders' => $partner->order()->get(),
       ]);
   }

    public function create(): View
    {
        return view('partner.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $formFields = $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        $this->partnerService->storePartner($formFields);
        return redirect('/manage/partners')->with('message', 'Partner created successfully');
    }

    public function edit(Partner $id): View
    {
        return view('partner.edit', [
            'partner' => $id
        ]);
    }

    public function update(Request $request, Partner $partner): RedirectResponse
    {
        $formFields = $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        $this->partnerService->updatePartner($partner, $formFields);
        return redirect('/manage/partners')->with('message', 'Partner updated successfully');
    }

    public function destroy(Partner $partner): RedirectResponse
    {

        $this->partnerService->deletePartner($partner);
        return redirect('/manage/partners')->with('message', 'Partner deleted successfully');
    }

}
