<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Client;
use App\Models\Unity;
use App\Models\Attestation;
use Illuminate\Database\Eloquent\ModelNotFoundException;
// use App\Http\Controllers\Resquest;

class ContractController extends Controller
{
    public function index()
    {
        $contract = Contract::with(['client','unity','attestation'])->get();
        // dd($contract);
        return view('contract', compact('contract'));
    }
    
    public function show($Id) {
        
            $contract = Contract::findOrFail($Id);
            
            $client = Client::query()->get();
           
            $attestation = Attestation::query()->get();

            $unity = Unity::query()->get();

            return view('contract_single', compact('contract', 'client', 'attestation', 'unity'));
       
    }

    public function store(Request $request) {

        
            
            /** @var string $cnpj */
            /** @var string $fantasy_name */
            /** @var string $social_season */
            /** @var string $email */
            extract($request->all());
            
            $contract = new Contract();
            $contract->cnpj = $request->cnpj;
            $contract->fantasy_name = $request->fantasy_name;
            $contract->social_season = $request->social_season;
            $contract->email = $request->email;
            $contract->status = Contract::ENABLED;
            if (isset($image)) {
                $client->image = $request->image;
            }
            

            \DB::transaction(function () use ($contract) {

                $contract->save();
            });

            return redirect()->route("contract.show", $contract->id);

    }

    public function update(Request $request, $id)
    {
       
            
            /** @var string $cnpj */
            /** @var string $fantasy_name */
            /** @var string $social_season */
            /** @var string $email */
            extract($request->all());
            
            $contract = Contract::findOrFail($id);;
            $contract->cnpj = $cnpj;
            $contract->fantasy_name = $fantasy_name;
            $contract->social_season = $social_season;
            $contract->email = $email;
            $contract->status = Contract::ENABLED;
            if (isset($image)) {
                $client->image = $image;
            }
            

            \DB::transaction(function () use ($contract) {

                $contract->save();
            });

            return redirect()->route("contract.show", $contract->id)
                ->withFlashSuccess("criado com Sucesso");

    }

    public function destroy($id)
    {
            /** @var Contract $contract */
            $contract = Contract::findOrFail($id);
            $contract->delete();

            return redirect()->route("contract.index")
                ->withFlashSuccess("deletado com sucesso.");
      
    }
}
