<template>
    <default-field :field="field" :errors="errors">
        <template slot="field" class="nova-items-field">
            <div class="nova-items-field-input-wrapper flex border border-40 p-4" v-if="field.placeInputBefore">
                <input 
                    v-model="newItem"
                    :type="field.inputType"
                    :placeholder="field.placeholder"
                    class="flex-1 form-control form-input form-input-bordered"
                />
                <a @click="addItem" class="btn btn-default btn-primary ml-3 cursor-pointer" v-html="field.createButtonValue"/>
            </div>
            <ul v-if="items.length" :id="field.name" class="nova-items-field-input-items list-reset border border-40 p-4 pb-0">
                <li v-for="(item, index) in items" :key="index" :class="errorClasses" class="nova-items-field-input-wrapper-item flex py-1 pb-4">
                    <input 
                        :value="item" 
                        :type="field.inputType"
                        v-on:keyup="updateItem(index, $event)"
                        :name="field.name + '['+ index +']'" 
                        class="flex-1 form-control form-input form-input-bordered"
                    >
                    <span 
                        @click="removeItem(index)" 
                        class="ml-4 mr-2 font-thin text-2xl cursor-pointer hover:font-normal"
                        v-html="field.deleteButtonValue"
                    />
                </li>
            </ul>
             <div class="nova-items-field-input-wrapper flex border border-40 p-4"  v-if="field.placeInputBefore == false">
                <input
                    v-model="newItem"
                    :type="field.inputType"
                    :placeholder="field.placeholder"
                    class="flex-1 form-control form-input form-input-bordered"
                />
                <a @click="addItem" class="btn btn-default btn-primary ml-3 cursor-pointer" v-html="field.createButtonValue"/>
            </div>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    data: function() {
        return {
            value: '',
            items: [],
            newItem: ''
        }
    },

    methods: {

        setInitialValue() {

            this.value = this.field.value || '';

            this.$nextTick(() => {
                this.items = (this.value)
                    ? JSON.parse(this.value)
                    : [];
            });
            
        },

        fill(formData) {
            formData.append(this.field.attribute, this.value || '')
        },

		addItem() {
            const item = this.newItem.trim()
            
			if (item) {
				this.items.push(item)
				this.newItem = ''
			}
        },

        updateItem(index, event)
        {
            this.$set(this.items, index, event.target.value)
        },

		removeItem (index) {
			this.items.splice(index, 1)
		}
    },
    watch: {
        'items': {
            handler: function (items) {
                this.value = JSON.stringify(items);
            },
            deep: true
        }
    }
}
</script>
