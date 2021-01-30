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
      }
    },
    methods: {
      async getItems(){
        if(this.selected == 1){
          try{
            const res = await axios.get('/values')
            this.items = res.data     
          }

          catch(e){
            this.items = []
          }
        } 
        else{
          try{
            const res = await axios.get('/principles')
            this.items = res.data
          }
          
          catch(e){
            this.items = []
          }

        }
      },
      editItem(item){
        this.$emit('dataInput', item)
        this.$emit('selectType', 'edit')
      },
      async deleteItem(id){
        if(this.selected == 1){
          try{
            await axios.delete(`/values/${id}/delete`)
            this.getItems()
            this.successToast('Value deleted')
          }
          
          catch(e){
            this.$bvToast.toast('Value not found', {
              variant: 'danger'
            })
          }
        } else {
          try{
            await axios.delete(`/principles/${id}/delete`)
          
            this.getItems()
            this.successToast('Principle deleted')
          }
          catch(e){
            this.$bvToast.toast('Principle not found', {
              variant: 'danger'
            })
          }
        }
      },
      successToast(msg){
        this.$bvToast.toast(msg, {
          title: 'Successful',
          variant: 'success'
        })
      },
    }
}
</script>

<style>

</style>