<template>
  <b-modal id="form-modal" hide-footer :title="title">
    <b-form >
      <b-form-textarea
        id="input"
        type="text"
        v-model="form.input"
        required
      ></b-form-textarea>

      <b-button id="formSubmit" type="submit" variant="primary mt-4" @click="submit">Submit</b-button>
  </b-form>
  </b-modal>
</template>

<script>
import axios from 'axios'
export default {
  props: [
    'selected',
    'type',
    'dataInput'
  ],
  data(){
    return {
        form: {
            id: null,
            input: null
        }
    }
  },
  computed: {
    title: function(){
      return this.selected == 1 && this.type == 'create' ? 'Add Value' :
        this.selected == 1 && this.type == 'edit' ? 'Edit Value' :
        this.selected == 2 && this.type == 'create' ? 'Add Principle' : 
        this.selected == 2 && this.type == 'edit' ? 'Edit Principle' : ''
    },
  },
  watch: {
    dataInput: function(val){
      if(this.type == 'edit'){
        this.form.id = val.id
        if(this.selected == 1){
          this.form.input = val.value
        } else{
          this.form.input = val.principle
        }
      }
        
    },
    type: function(val){
      if(val == 'create'){
        this.form.input = null
      }
    }
  },
  methods: {
    async submit(e){
      e.preventDefault()

      if(this.selected == 1 && this.type == 'create'){
        const res = await axios.post('/values/create', this.form)
        this.hideModal()
        this.$emit('success', res.data)
        this.successToast('Added a value')
      }

      else if(this.selected == 1 && this.type == 'edit'){
        const res = await axios.post(`/values/${this.form.id}/update`, this.form)
        this.hideModal()
        this.$emit('success', res.data)
        this.successToast('Editted value')
      }

      else if(this.selected == 2 && this.type == 'create'){
        const res = await axios.post('/principles/create', this.form)
        this.hideModal()
        this.$emit('success', res.data)
        this.successToast('Added a principle')
      }

      else if(this.selected == 2 && this.type == 'edit'){
        const res = await axios.post(`/principles/${this.form.id}/update`, this.form)
        this.hideModal()
        this.$emit('success', res.data)
        this.successToast('Editted principle')
      }
    },
    hideModal(){
      this.$bvModal.hide('form-modal')
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