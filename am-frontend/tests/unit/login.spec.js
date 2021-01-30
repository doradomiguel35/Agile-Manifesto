import Login from '../../src/views/Login'

import { shallowMount, createLocalVue } from '@vue/test-utils'
import flushPromises from 'flush-promises'
import axios from 'axios'

import VueRouter from 'vue-router'

const localVue = createLocalVue()
localVue.use(VueRouter)
const router = new VueRouter()

jest.mock('axios')

describe("Login.vue", () => {
  const wrapper = shallowMount(Login, {
    localVue, router
  })
  
  wrapper.setData({
    form: {
      email: "admin@am.com",
      password: "admin@123"
    }
  })

  test('Correct credentials', async () => {

    // Mock post method of axios that returns a resolved promise with sample token
    axios.post.mockReturnValue( 
      Promise.resolve({
        data: {
          token: 'Sample Token'
        }
      })
    )

    const button = wrapper.find('#loginBtn')
    button.trigger('click')
    await flushPromises()

    expect(wrapper.vm.$data.isAuthenticated).toBe(true)    
  })

  test('Incorrect credentials', async () => {

    /** Mock post method of axios that returns a rejected promise, 
     *  assuming inputted credentials are incorrect*/ 
    axios.post.mockReturnValue(Promise.reject())

    const button = wrapper.find('#loginBtn')
    button.trigger('click')
    await flushPromises()

    expect(wrapper.vm.$data.isAuthenticated).toBe(false)    
  })
})

