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

           /** @var string $fantasy_name */
            /** @var string $integration */
            extract($request->all());
            
            $attestation = new Attestation();;

            $attestation->integration = $request->integration;
            $attestation->fantasy_name = $request->fantasy_name;
            $attestation->contract_id = $request->contract_id;
            

            \DB::transaction(function () use ($attestation) {

                $attestation->save();
            });

            return redirect()->route("contract.show", $attestation->id)
                ->withFlashSuccess("criado com Sucesso");
    }

    public function update(Request $request, $id)
    {
       
            
            /** @var string $fantasy_name */
            /** @var string $integration */
            extract($request->all());
            
            $attestation =Attestation::findOrFail($id);;
            $attestation->contract_id = $request->contract_id;
            $attestation->fantasy_name = $fantasy_name;
            $attestation->integration = $request->integration;
            

            \DB::transaction(function () use ($attestation) {

                $attestation->save();
            });

            return redirect()->route("contract.show", $attestation->id)
                ->withFlashSuccess("criado com Sucesso");


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
