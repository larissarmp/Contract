<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unity;

class UnityController extends Controller
{
    public function index(Resquest $request)
    {
        $unity = Unity::query()->get();
        
        return view('contract', compact('unity', 'request'));
    }
    
    public function show($Id) {
        try {

            $unity = Unity::findOrFail($Id);

            return view('contract_single', compact('unity'));
        } catch (ModelNotFoundException $e) {

            return redirect()
                ->route("contract.index")
                ->withErrors("não encontrado.");
        }
    }

    public function store(Request $request) {

        try {
            
            /** @var string $fantasy_name */
            /** @var string $integration */
            /** @var string $email */
            extract($request->all());
            
            $unity = new Unity();
            $unity->integration = $request->integration;
            $unity->fantasy_name = $request->fantasy_name;
            $unity->city = $request->city;
            $unity->state_abbr = $request->state_abbr;
            $unity->email = $request->email;
            $unity->status = Unity::ENABLED;
            if (isset($image)) {
                $unity->image = $request->image;
            }
            

            \DB::transaction(function () use ($unity) {

                $unity->save();
            });

            return redirect()->route("contract.show", $unity->id)
                ->withFlashSuccess("criado com Sucesso");

        } catch (\Throwable $exception) {
            return redirect_back_with($exception);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            
            /** @var string $fantasy_name */
            /** @var string $integration */
            /** @var string $email */
            extract($request->all());
            
            $unity = new Unity();
            $unity->integration = $request->integration;
            $unity->fantasy_name = $request->fantasy_name;
            $unity->city = $request->city;
            $unity->state_abbr = $request->state_abbr;
            $unity->email = $request->email;
            $unity->status = Unity::ENABLED;
            if (isset($image)) {
                $unity->image = $request->image;
            }
            

            \DB::transaction(function () use ($unity) {

                $unity->save();
            });

            return redirect()->route("contract.show", $unity->id)
                ->withFlashSuccess("atualizado com Sucesso");

        } catch (\Throwable $exception) {
            return redirect_back_with($exception);
        }

    }

    public function destroy($id)
    {
        try {

            /** @var Unity $unity */
            $unity = Unity::findOrFail($id);
            $unity->delete();

            return redirect()->route("contract.index")
                ->withFlashSuccess("deletado com sucesso.");
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route("contract.index")
                ->withErrors("não encontrado.");
        }
    }
}
