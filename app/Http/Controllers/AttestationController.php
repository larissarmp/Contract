<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attestation;

class AttestationController extends Controller
{
    public function index(Resquest $request)
    {
        $attestation = Attestation::query()->get();
        
        return view('contract', compact('attestation', 'request'));
    }
    
    public function show($Id) {
        try {
            $attestation = Attestation::findOrFail($Id);

            return view('contract_single', compact('attestation'));
        } catch (ModelNotFoundException $e) {

            return redirect()
                ->route("contract.index")
                ->withErrors("não encontrado.");
        }
    }

    public function store(Request $request) {

        try {
            
           /** @var string $fantasy_name */
            /** @var string $fantasy_name */
            extract($request->all());
            
            $attestation = new Attestation();
            $attestation->contract_id = $request->contract_id;
            $integration->fantasy_name = $request->fantasy_name;
            $integration->integration = $request->integration;
            

            \DB::transaction(function () use ($integration) {

                $integration->save();
            });

            return redirect()->route("contract.show", $integration->id)
                ->withFlashSuccess("criado com Sucesso");

        } catch (\Throwable $exception) {
            return redirect_back_with($exception);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            
            /** @var string $fantasy_name */
            /** @var string $fantasy_name */
            extract($request->all());
            
            $attestation = new Attestation();
            $attestation->contract_id = $request->contract_id;
            $integration->fantasy_name = $request->fantasy_name;
            $integration->integration = $request->integration;
            

            \DB::transaction(function () use ($integration) {

                $integration->save();
            });

            return redirect()->route("contract.show", $integration->id)
                ->withFlashSuccess("criado com Sucesso");

        } catch (\Throwable $exception) {
            return redirect_back_with($exception);
        }

    }

    public function destroy($id)
    {
        try {

            /** @var Integration $integration */
            $integration = Integration::findOrFail($id);
            $integration->delete();

            return redirect()->route("contract.index")
                ->withFlashSuccess("deletado com sucesso.");
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route("contract.index")
                ->withErrors("não encontrado.");
        }
    }
}
