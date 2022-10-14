<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreatePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;
use App\Models\Product;
use App\Services\PartnerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

class PartnerController extends Controller
{

    private PartnerService $partnerService;

    public function __construct(PartnerService $partnerService)
    {
        $this->partnerService = $partnerService;
    }

    public function index(): View
    {
        return view('partner.index', [
            "partners" => Partner::latest()->paginate(6)
        ]);
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

    public function store(CreatePartnerRequest $request): RedirectResponse
    {
        try {
            $this->partnerService->storePartner($request);
            return redirect('/manage/partners')->with('message', 'Partner created successfully');
        } catch (Throwable $exception) {
            report($exception);
            return redirect('/manage/partners')->with('message', 'Partner create failed');
        }
    }

    public function edit(Partner $partner): View
    {
        return view('partner.edit', [
            'partner' => $partner
        ]);
    }

    public function update(UpdatePartnerRequest $request, Partner $partner): RedirectResponse
    {
        try {
            $this->partnerService->updatePartner($partner, $request);
            return redirect('/manage/partners')->with('message', 'Partner updated successfully');
        } catch (Throwable $exception) {
            report($exception);
            return redirect('/manage/partners')->with('message', 'Partner updated failed');
        }
    }

    public function destroy(Partner $partner): RedirectResponse
    {
        try {
            $this->partnerService->deletePartner($partner);
            return redirect('/manage/partners')->with('message', 'Partner deleted successfully');
        } catch (Throwable $exception) {
            report($exception);
            return redirect('/manage/partners')->with('message', 'Partner delete failed');
        }
    }
}
