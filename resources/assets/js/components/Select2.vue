<template>
	<select :name="name" class="form-control">
		<slot></slot>
	</select>
</template>

<script>
	export default {
		props: ['name', 'options', 'value'],
		mounted: function () {
			var vm = this
			$(this.$el)
			// init select2
			.select2({ data: this.options })
			.val(this.value || 0)
			.trigger('change')
			// emit event on change.
			.on('change', function () {
				vm.$emit('input', this.value)
			})
		},
		watch: {
			value: function (value) {
				// update value
				$(this.$el).val(value)
			},
			options: function (options) {
				// update options
				$(this.$el).empty().select2({ data: options })
			}
		},
		destroyed: function () {
			$(this.$el).off().select2('destroy')
		}
	}
</script>