<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function __construct()
    {
        $this->resetId('produtos');
    }
    public function createProduto(Request $request)
    {
        $produto = [
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
            'preco_compra' => $request->input('preco_compra'),
            'preco-revenda' => $request->input('preco_revenda')
        ];

        Produto::insert($produto);
        return response()->json(['message' => 'produto cadastrado com sucesso']);
    }

    public function removeProduto($id)
    {
        Produto::delete($id);
        return response()->json(['message' => 'Produto excluído com sucesso']);
    }

    public function editProduto(Request $request, $id)
    {

        $produto = [];

        $nome = $request->input('nome');
        if ($nome !== null) {
            $produto['nome'] = $nome;
        }

        $descricao = $request->input('descricao');
        if ($descricao !== null) {
            $produto['descricao'] = $descricao;
        }

        $preco_compra = $request->input('preco_compra');
        if ($preco_compra !== null) {
            $produto['preco_compra'] = $preco_compra;
        }

        $preco_revenda = $request->input('preco_revenda');
        if($preco_revenda !== null){
            $produto['preco_revenda'] = $preco_revenda;
        }

        Produto::findOrFail($id)->update($produto)->save();
        return response()->json(['message' => 'produto editado com sucesso']);
    }

    public function getProdutoById($id)
    {
        return response()->json(['message' => 'produto encontrado', Produto::findOrFail($id)]);
    }
}
