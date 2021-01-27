<template>
    <div class="container mt-3">
        <b-card bg-variant="light" class="align-items-start">
            <actions @actionSelected="getSelected" @selectType="getType"></actions>
        </b-card>
        <admin-table :selected="selected" @selectType="getType" @dataInput="getDataInput" :dataAdded="dataAdded"></admin-table>
        <form-modal :type="type" :selected="selected" :dataInput="item" @success="valueAdded"></form-modal>
    </div>
</template>

<script>
import Actions from '../components/Admin/Actions'
import Table from '../components/Admin/Table'
import FormModal from '../components/Admin/FormModal'

export default {
    components: {
        'actions': Actions,
        'admin-table' : Table,
        'form-modal': FormModal
    },
    data(){
        return{
            selected: null,
            type: 'create',
            item: null,
            dataAdded: {}
        }
    },
    methods: {
        getSelected(val){
            this.selected = val
        },
        getType(val){
            this.type = val
        },
        getDataInput(val){
            this.item = val
        },
        valueAdded(item){
            this.dataAdded = item
        }
    }
}
</script>

<style>

</style>