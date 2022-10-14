<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreateTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Type;
use App\Services\TypeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

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

    public function store(CreateTypeRequest $request): RedirectResponse
    {
        try {
            $this->typeService->storeType($request);
            return redirect('/manage/types')->with('message', 'Type created successfully');
        }catch(Throwable $exception){
            report($exception);
            return redirect('/manage/types')->with('message', 'Type create failed');
        }
    }

    public function edit(Type $type): View
    {
        return view('type.edit', [
            'type' => $type
        ]);
    }

    public function update(UpdateTypeRequest $request, Type $type): RedirectResponse
    {
        try {
            $this->typeService->updateType($type, $request);
            return redirect('/manage/types')->with('message', 'Type updated successfully');
        }catch(Throwable $exception){
            report($exception);
            return redirect('/manage/types')->with('message', 'Type update failed');
        }
    }

    public function destroy(Type $type): RedirectResponse
    {
        try {
            $this->typeService->deleteType($type);
            return redirect('/manage/types')->with('message', 'Type deleted successfully');
        }catch(Throwable $exception){
            report($exception);
            return redirect('/manage/types')->with('message', 'Type delete failed');
        }
    }
}
