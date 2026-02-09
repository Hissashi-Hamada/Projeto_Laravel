<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoRequest;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }
    public function confirmar($id)
    {
        // exemplo: buscar o produto
        $produto = Produto::findOrFail($id);

        // fazer alguma lógica e retornar uma view
        return view('vendas.confirmar', compact('produto'));
    }


    public function create()
    {

        return view('produtos.create');
    }

    public function store(StoreProdutoRequest $request)
    {

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:122880',
            'descricao' => 'nullable|string',
            'valor' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:0',
            'status' => 'required|boolean',
        ]);

        $data = $request->validated();

        // Verifica se tem imagem antes de tentar fazer upload
        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('produtos', 'public');
        }

        Produto::create($data);

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }



    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.show', compact('produto'));
    }

    public function vendas()
    {
        $produtos = Produto::all();
        return view('vendas.index', compact('produtos'));
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:128800',
            'descricao' => 'nullable|string|max:50',
            'valor' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:0',
            'status' => 'required|boolean',
        ]);

        // Faz upload da nova imagem se existir
        if ($request->hasFile('imagem')) {
            // Remove a imagem antiga se existir
            if ($produto->imagem && Storage::disk('public')->exists($produto->imagem)) {
                Storage::disk('public')->delete($produto->imagem);
            }
            $validated['imagem'] = $request->file('imagem')->store('produtos', 'public');
        }

        $produto->update($validated);

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }


    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso!');
    }
}
