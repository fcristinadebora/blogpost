@extends('layouts.app')

@section('content')
  <pagina tamanho="10">
    <painel titulo="Dashboard">
      
      <breadcrumb v-bind:lista="{{$breadcrumbList}}"></breadcrumb>

      <div class="row">
        <div class="col-md-4">
          <label>SELECT FUCKING 2, MOTHERFUCKER</label>

          <form method="GET" action="#">
            <select2
              name="select2"
              :options="[
                { id: 1, text: 'Hello' },
                { id: 2, text: 'World' }
              ]">
              <option disabled value="0">Select one</option>
            </select2>
            <button type="submit">Test it!</button>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <caixa qtd="80" titulo="Artigos" url="{{route('artigos.index')}}" cor="orange" icone="ion ion-pie-graph"></caixa>
        </div>
        <div class="col-md-4">
          <caixa qtd="1500" titulo="Usuários" url="#" cor="blue" icone="ion ion-person-stalker"></caixa>
        </div>
        <div class="col-md-4">
          <caixa qtd="3" titulo="Autores" url="#" cor="red" icone="ion ion-person"></caixa>
        </div>
      </div>
    </painel>

  </pagina>
@endsection
