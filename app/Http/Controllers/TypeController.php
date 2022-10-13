<?php


namespace App\Http\Controllers;


use App\Models\Type;
use App\Services\TypeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TypeController extends Controller
{
    private TypeService $typeService;

    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }

    public function create(): View
    {
        return view('type.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $formFields = $request->validate([
            'name' => 'required'
        ]);

        $this->typeService->storeType($formFields);
        return redirect('/manage/types')->with('message', 'Type created successfully');
    }

    public function edit(Type $id): View
    {
        return view('type.edit', [
            'type' => $id
        ]);
    }

    public function update(Request $request, Type $type): RedirectResponse
    {
        $formFields = $request->validate([
            'name' => 'required'
        ]);

        $this->typeService->updateType($type, $formFields);
        return redirect('/manage/types')->with('message', 'Type updated successfully');
    }

    public function destroy(Type $type): RedirectResponse
    {
        $this->typeService->deleteType($type);
        return redirect('/manage/types')->with('message', 'Type deleted successfully');
    }
}
