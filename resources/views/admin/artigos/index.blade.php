@extends('layouts.app')

@section('content')
  <pagina tamanho="10">
    <painel titulo="Lista de Artigos">
      <breadcrumb v-bind:lista="{{$breadcrumbList}}"></breadcrumb>
      
      <modal-link nome="testeModal" tipo="link" titulo="Criar"></modal-link>

      <tabela-lista
        v-bind:titulos="['#','Título']"
        v-bind:itens="[
          ['1','Curso de PHP'],
          ['2','Curso de View']
        ]"
        ordem="asc" ordemCol="2"
        criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="6"
        ></tabela-lista>
      
    </painel>

  </pagina>

  <modal nome="testeModal">Horay!</modal>
@endsection
