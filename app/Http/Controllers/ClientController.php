<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;

class ClientController extends Controller
{
    public function index(Resquest $request)
    {
        $client = Client::query()->get();
        
        return view('contract', compact('client', 'request'));
    }
    
    public function show($Id) {
        try {
            
            $client = Client::findOrFail($Id);

            return view('contract_single', compact('client'));
        } catch (ModelNotFoundException $e) {

            return redirect()
                ->route("contract.index")
                ->withErrors("não encontrado.");
        }
    }

    public function store(Request $request) {

        try {
            
            /** @var string $cpf */
            /** @var string $fantasy_name */
            /** @var string $name */
            extract($request->all());
            
            $client = new Client();
            $client->cpf = $request->cpf;
            $client->fantasy_name = $request->fantasy_name;
            $client->name = $request->name;
            

            \DB::transaction(function () use ($client) {

                $client->save();
            });

            return redirect()->route("contract.show", $client->id)
                ->withFlashSuccess("criado com Sucesso");

        } catch (\Throwable $exception) {
            return redirect_back_with($exception);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            
            /** @var string $cpf */
            /** @var string $fantasy_name */
            /** @var string $name */
            extract($request->all());
            
            $client = new Client();
            $client->cpf = $request->cpf;
            $client->fantasy_name = $request->fantasy_name;
            $client->name = $request->name;
            

            \DB::transaction(function () use ($client) {

                $client->save();
            });

            return redirect()->route("contract.show", $client->id)
                ->withFlashSuccess("criado com Sucesso");

        } catch (\Throwable $exception) {
            return redirect_back_with($exception);
        }

    }

    public function destroy($id)
    {
        try {

            /** @var Client $client */
            $client = Client::findOrFail($id);
            $client->delete();

            return redirect()->route("contract.index")
                ->withFlashSuccess("deletado com sucesso.");
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route("contract.index")
                ->withErrors("não encontrado.");
        }
    }
}
