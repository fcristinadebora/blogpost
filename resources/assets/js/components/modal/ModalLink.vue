<template>
    <button v-if="!tipo || (tipo == 'button') || (tipo != 'button' && tipo != 'link')" type="button" v-bind:class="css || 'btn btn-info'" data-toggle="modal" v-bind:data-target="'#' + nome">
    {{titulo}}
	</button>

	<a v-else-if="tipo == 'link'" href="#" data-toggle="modal" v-bind:class="css || ''" v-bind:data-target="'#' + nome">{{titulo}}</a>
</template>

<script>
    export default {
        props: ['tipo', 'nome', 'titulo', 'css']
    }
</script>