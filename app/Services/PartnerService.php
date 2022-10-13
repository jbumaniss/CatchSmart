<?php


namespace App\Services;


use App\Models\Partner;


class PartnerService
{

    public function storePartner(array $formFields): void
    {
        Partner::create($formFields);
    }

    public function updatePartner(Partner $partner, array $formFields): void
    {
        $partner->update($formFields);
    }

    public function deletePartner(Partner $partner): void
    {
        $partner->delete();
    }
}
