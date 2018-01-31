<template>
	<div>


		<div class="form-inline">
			<a v-if="criar" v-bind:href="criar">Criar</a>
			
			<div class="form-group pull-right">
				<input type="search" placeholder="Buscar" class="form-control" v-model="buscar">
			</div>
		</div>

		<table class="table table-stripped table-hover">
			<thead>
			  <tr>
				<th v-for="(titulo, index) in titulos" v-on:click="ordenaColuna(index)" class="link">{{titulo}}</th>
				<th v-if="detalhe || editar || deletar">Ações</th>
			  </tr>
			</thead>
			<tbody>
			  <tr v-for="(item, index) in lista">
				<td v-for="i in item">{{i}}</td>
				
				<td v-if="detalhe || editar || deletar">

					<form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post">
						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="_token" v-bind:value="token">	

						<a v-if="detalhe" v-bind:href="detalhe">Detalhes</a>
						<a v-if="editar" v-bind:href="editar">| Editar</a>
						<a v-if="deletar" href="#" v-on:click="executaForm(index)">| Excluir</a>
					</form>

					<span v-if="!(deletar && token)">
						<a v-if="detalhe" v-bind:href="detalhe">Detalhes</a>
						<a v-if="editar" v-bind:href="editar">| Editar</a>
						<a v-if="deletar" v-bind:href="deletar">| Excluir</a>
					</span>
				</td>
			  </tr>
			</tbody>
		</table>
	</div>
</template>

<script>
	export default {
		props: ['titulos', 'itens', 'ordem', 'ordemCol', 'criar', 'detalhe', 'editar', 'deletar', 'token'],
		data: function(){
			return {
				buscar:'',
				ordemAux: this.ordem || "desc",
				ordemAuxCol: this.ordemCol || 0
			}
		},
		methods:{
			executaForm: function(index){
				document.getElementById(index).submit();
			},
			ordenaColuna: function(coluna){
				this.ordemAuxCol = parseInt(coluna);

				if(this.ordemAux.toLowerCase() == "asc")
					this.ordemAux = "desc";
				else
					this.ordemAux = "asc";
			}
		},
		computed: {
			lista: function(){
				let busca = this.buscar;

				let ordem = this.ordemAux;
				let ordemCol = this.ordemAuxCol;

				ordem = ordem.toLowerCase();
				ordemCol = parseInt(ordemCol);

				if(ordem == "asc"){
					this.itens.sort(function(a,b){
						if(a[ordemCol] > b[ordemCol]) return 1;
						else if(a[ordemCol] < b[ordemCol]) return -1;
						return 0;
					});	
				}else{
					this.itens.sort(function(a,b){
						if(a[ordemCol] < b[ordemCol]) return 1;
						else if(a[ordemCol] > b[ordemCol]) return -1;
						return 0;
					});
				}

				return this.itens.filter(res => {
					for(let i = 0; i < res.length; i++){
						if(res[i].toString().toLowerCase().indexOf(busca.toLowerCase()) != -1) return true;
					}
					
					return false;
				});

				return this.itens;
			}
		}
	}
</script>

<style>
	.link{
		cursor: pointer;
	}
</style>
