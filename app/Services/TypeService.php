<?php


namespace App\Services;


use App\Http\Requests\UpdateTypeRequest;
use App\Models\Type;


class TypeService
{

    public function storeType(UpdateTypeRequest $request): void
    {
        Type::create([
            "name" => $request->name
        ]);
    }

    public function updateType(Type $type, UpdateTypeRequest $request): void
    {
        $type->update([
            "name" => $request->name
        ]);
    }

    public function deleteType(Type $type): void
    {
        $type->delete();
    }
}
