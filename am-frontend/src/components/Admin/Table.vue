<template>
  <b-table
    :items="items"
    :fields="selected == 1 ? fieldsValues : fieldsPrinciples"
    :responsive="true"
  >
    <template v-slot:cell(actions)="row">
      <b-button size="sm" variant="light" v-b-modal.form-modal @click="editItem(row.item)">
        <b-icon icon="pencil-fill"></b-icon>
      </b-button>  
      <b-button size="sm" variant="danger" @click="deleteItem(row.item.id)">
        <b-icon icon="x"></b-icon>
      </b-button>  
    </template>

  </b-table>
</template>

<script>
import axios from 'axios'
export default {
    props: [
      'selected',
      'dataAdded'
    ],
    data(){
      return {
        fieldsValues: [
          { key: 'value', label: 'Value' },
          { key: 'actions', label: 'Actions', sortable: false }
        ],
        fieldsPrinciples: [
          { key: 'principle', label: 'Principle' },
          { key: 'actions', label: 'Actions', sortable: false }
        ],
        items: []
      }
    },
    created(){
      this.getItems()
    },
    watch: {
      selected: function(){
        this.getItems()
      },
      dataAdded: function(){
        this.getItems()
        this.dataAdded = null
      }
    },
    methods: {
      getItems(){
        if(this.selected == 1){
          axios.get('/values')
          .then(res => {
            this.items = res.data
          }).catch(() =>{
            this.items = []
          })
        } 
        else{
          axios.get('/principles')
          .then(res => {
            this.items = res.data
          }).catch(() =>{
            this.items = []
          })
        }
      },
      editItem(item){
        this.$emit('dataInput', item)
        this.$emit('selectType', 'edit')
      },
      deleteItem(id){
        if(this.selected == 1){
          axios.delete(`/values/${id}/delete`)
          .then(() => {
            this.getItems()
          })
        } else {
          axios.delete(`/principles/${id}/delete`)
          .then(() => {
            this.getItems()
          })
        }
      }
    }
}
</script>

<style>

</style>