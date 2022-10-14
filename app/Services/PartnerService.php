<?php


namespace App\Services;


use App\Http\Requests\CreatePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;


class PartnerService
{

    public function storePartner(CreatePartnerRequest $request): void
    {
        Partner::create([
            'name' => $request->name,
            'address' => $request->address
        ]);
    }

    public function updatePartner(Partner $partner, UpdatePartnerRequest $request): void
    {
        $partner->update([
            [
                'name' => $request->name,
                'address' => $request->address
            ]
        ]);
    }

    public function deletePartner(Partner $partner): void
    {
        $partner->delete();
    }
}
