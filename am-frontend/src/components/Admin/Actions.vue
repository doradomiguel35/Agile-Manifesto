<template>
    <div class="d-flex">
        <b-form-select v-model="selected" :options="options"></b-form-select>
        <b-button varian="success" class="ml-2" v-b-modal.form-modal @click="$emit('selectType', 'create')">Create</b-button>
    </div>
</template>

<script>
export default {
    data(){
        return {
            selected: 1,
            options: [
                { value: 1, text: 'Values' },
                { value: 2, text: 'Principles' }
            ]
        }
    },
    created(){
        this.$emit('actionSelected', this.selected)
    },
    watch: {
        selected: function(val){
            console.log(val)
            this.$emit('actionSelected', val)
        },
    }
}
</script>

<style>

</style>