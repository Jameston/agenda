<?php

namespace App\Http\Controllers\Contatos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ContatosController extends Controller
{

  public function contatosIndex()
  {
    $contatos = DB::connection('pgsql')->select("SELECT * FROM public.tb_contatos order by id desc");
    return response()->json($contatos, 200);
  }

  public function contatoHist(Request $request)
  {
    $id = $request['id'];
    $historico = DB::connection('pgsql')->select("SELECT * FROM public.tb_contatos where id = '$id' order by id desc");
    return response()->json($historico, 200);
  }

  public function NewContController(Request $request)
  {
    $dados = $request->all();
    $nome = $dados['nome'];
    $email = $dados['email'];
    $endereco = $dados['endereco'];
    $update_cont = DB::connection('pgsql')->select("INSERT INTO public.tb_contatos(
      nome, email, endereco)
      VALUES ('$nome', '$email', '$endereco')");

    return response()->json([
      'update_cont' => $update_cont,
    ], 200);
  }

  public function EditContController(Request $request)
  {
    $dados = $request->all();
    $id = $dados['id'];
    $nome = $dados['nome'];
    $email = $dados['email'];
    $endereco = $dados['endereco'];

    $update_cont = DB::connection('pgsql')->select("UPDATE public.tb_contatos
      SET id='$id', nome='$nome', email='$email', endereco='$endereco'
      WHERE id = '$id';");

    return response()->json([
      'update_cont' => $update_cont,
    ], 200);
  }

  public function RemoveContController(Request $request)
  {
    $dados = $request->all();
    $id = $dados['id'];

    $rm_cont = DB::connection('pgsql')->select("DELETE FROM public.tb_contatos
    WHERE id= $id;");

    return response()->json([
      'rm_cont' => $rm_cont,
    ], 200);
  }
}
