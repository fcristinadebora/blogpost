<template>
    
</template>

<script>
    export default {
        props: ['css', 'action', 'method', 'enctype', 'token'],
        computed:{
        	defineMethod: function(){
        		switch(this.method.toLowerCase()){
        			case 'get':
        			case 'post':
        			case 'put':
        			case 'delete':
        				return 'this.method.toLowerCase()';
        				break;
        			default:
        				return 'post';
        			break;
        		}
        	}
        }
    }
</script>