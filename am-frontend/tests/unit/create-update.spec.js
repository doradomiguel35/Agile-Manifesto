import FormModal from '../../src/components/Admin/FormModal'

import { shallowMount, createLocalVue } from '@vue/test-utils'
import flushPromises from 'flush-promises'
import axios from 'axios'

import VueRouter from 'vue-router'

const localVue = createLocalVue()
localVue.use(VueRouter)
const router = new VueRouter()

jest.mock('axios')

describe('FormModal.vue', () => {
    /* Legend
    
       selected:
       1 = Value
       2 = Principle

       type: 
       1 = create
       2 = edit
    */
    
    const wrapper = shallowMount(FormModal, {
        localVue, router
    })

    function axiosMockPostResolved(data){
        axios.post.mockReturnValue(Promise.resolve({ data }))
    }

    function expectWithStrictEqual(expected, received){
        expect(expected).toStrictEqual(received)
    }

    test("Add a Value", async () => {
        /* Set appropriate props so that it will satisfy the condition for 
           making a request for creating a value
        */
        wrapper.setProps({
            selected: 1,
            type: 'create'
        })

        wrapper.setData({
            form: {
                input: "Sample Value"
            }
        })

        axiosMockPostResolved({
            data: {
                message: 'Added value'
            }
        })

        const button = wrapper.find('#formSubmit')
        button.trigger('click')
        await flushPromises()

        expectWithStrictEqual(wrapper.emitted('success')[0], [{ data: {message: 'Added value' }}])
    })

    test("Edits a Value", async () => {
        wrapper.setProps({
            selected: 1,
            type: 'edit',
            dataInput: {
                id: 1,
                value: "Update value"
            }
        })

        axiosMockPostResolved({
            data: {
                message: 'Updated value'
            }
        })

        const button = wrapper.find('#formSubmit')
        button.trigger('click')
        await flushPromises()

        expectWithStrictEqual(wrapper.emitted('success')[1], [{ data: {message: 'Updated value' }}])
    })

    test("Adds a Principle", async () => {
        wrapper.setProps({
            selected: 2,
            type: 'create',
        })

        wrapper.setData({
            form: {
                input: "Sample Principle"
            }
        })

        axiosMockPostResolved({
            data: {
                message: 'Added principle'
            }
        })

        const button = wrapper.find('#formSubmit')
        button.trigger('click')
        await flushPromises()

        expectWithStrictEqual(wrapper.emitted('success')[2], [{ data: { message: 'Added principle' } }])
    })

    test("Edits a principle", async () => {
        wrapper.setProps({
            selected: 2,
            type: 'edit',
            dataInput: {
                id: 1,
                principle: "Update principle"
            }
        })

        axiosMockPostResolved({
            data: {
                message: 'Updated principle'
            }
        })

        const button = wrapper.find('#formSubmit')
        button.trigger('click')
        await flushPromises()

        expectWithStrictEqual(wrapper.emitted('success')[3], [{ data: { message: 'Updated principle' } }])
    })

})