<?php


namespace App\Services;



use App\Models\Type;


class TypeService
{

    public function storeType(array $formFields): void
    {
        Type::create($formFields);
    }

    public function updateType(Type $type, array $formFields): void
    {
        $type->update($formFields);
    }

    public function deleteType(Type $type): void
    {
        $type->delete();
    }
}
