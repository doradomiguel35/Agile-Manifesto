import Table from '../../src/components/Admin/Table.vue'

import { shallowMount } from '@vue/test-utils'
import flushPromises from 'flush-promises'
import axios from 'axios'

jest.mock('axios')

let mockValues = [
  { id: 1, value: "Value 1" },
  { id: 2, value: "Value 2" }
]

let mockPrinciples = [
  { id: 1, principle: "Principle 1" },
  { id: 2, principle: "Principle 2" },
  { id: 3, principle: "Principle 3" },
]

describe('Table.vue', () => {
  /* selected: 
      1 = Values
      2 = Principles

  */

  const wrapper = shallowMount(Table)

  function axiosMockGetResolved(data){
    axios.get.mockReturnValue(Promise.resolve({ data }))
  }

  function axiosMockDeleteResolved(){
    axios.delete.mockReturnValue(Promise.resolve())
  }

  function expectToBe(expected, received){
    expect(expected).toBe(received)
  }

  function expectWithStrictEqual(expected, received){
    expect(expected).toStrictEqual(received)
  }

  test('Picks Values to be displayed in the table', async () => {
    wrapper.setProps({
        selected: 1
    })

    axiosMockGetResolved(mockValues)

    await flushPromises()

    /* Since in the mockValues variable, we assigned
       an array with 2 objects as a mock response for /value request,
       now is assigned to the items data, which we expect to only have 2
    */
    expectToBe(wrapper.vm.items.length, 2)
  })

  test('Picks Principles to be displayed in the table', async () => {
    wrapper.setProps({
        selected: 2
    })

    axiosMockGetResolved(mockPrinciples)

    await flushPromises()

    /* Same explanation on the previous test, since mockPrinciples was assigned to have an
       array of 3 objects as a mock response for /principles request,
       can be used to differentiate if Principles are displayed in the table 
    */
    expectToBe(wrapper.vm.items.length, 3)
  })

  test('Form Modal for edditing Values is triggered by triggering the edit method', () => {
    wrapper.setProps({  
      selected: 1
    })
    
    wrapper.vm.editItem(mockValues[0])

    /* Emits the data being chosen for editting, and
       sets the type of action of the form modal whether it will create or edit a value
    */
    expectWithStrictEqual(wrapper.emitted('dataInput')[0], [ { id: 1, value: "Value 1" } ])
    expectWithStrictEqual(wrapper.emitted('selectType')[0], [ 'edit' ])
  })
  
  test('Form Modal for editting Principles is triggered by triggering the edit method', () => {
    wrapper.setProps({
      selected: 2
    })

    wrapper.vm.editItem(mockPrinciples[0])

    expectWithStrictEqual(wrapper.emitted('dataInput')[1], [ { id: 1, principle: "Principle 1" } ])
    expectWithStrictEqual(wrapper.emitted('selectType')[1], [ 'edit' ])
  })

  test('Delete a Value', async () => {
    wrapper.setProps({
      selected: 1
    })

    axiosMockDeleteResolved()

    /* Spy on getItems() method if it is called within deleteItem,
       this signals that the delete request is successfull
    */
    let getItems = jest.spyOn(wrapper.vm, 'getItems')

    wrapper.vm.deleteItem(1)
    await flushPromises()

    expect(getItems).toHaveBeenCalled()

  })

  test('Delete a Principle', async () => {
    wrapper.setProps({
      selected: 2
    })

    let getItems = jest.spyOn(wrapper.vm, 'getItems')

    wrapper.vm.deleteItem(1)
    await flushPromises()

    expect(getItems).toHaveBeenCalled()
  })
})