<template>
    <DefaultField :field="currentField" :full-width-content="currentField.fullWidth" :show-help-text="showHelpText">
        <template #field>
            <div class="nova-items-field-input-wrapper flex border border-40 p-4" v-if="currentField.listFirst === false && ! maxReached">
                <input
                    v-model="newItem"
                    :type="currentField.inputType"
                    :placeholder="currentField.placeholder"
                    autocomplete="new-password"
                    @keydown.enter.prevent="addItem"
                    class="flex-1 form-control form-input form-input-bordered"
                />
                <button
                    type="button"
                    @click="addItem"
                    v-html="currentField.createButtonValue"
                    v-if="currentField.hideCreateButton === false"
                    class="ml-3 cursor-pointer shadow relative bg-primary-500 hover:bg-primary-400 active:bg-primary-600 text-white dark:text-gray-900 cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring inline-flex items-center justify-center h-9 px-3 shadow relative bg-primary-500 hover:bg-primary-400 active:bg-primary-600 text-white dark:text-gray-900"
                />
            </div>
            <ul ref="novaitemslist" :style="maxHeight" v-if="items.length" class="nova-items-field-input-items list-reset border border-40 py-2">
                <draggable v-model="items" :item-key="currentField.attribute + '.' + index" :options="{ disabled: currentField.draggable === false, handle: '.sortable-handle' }">
                    <template #item="{ element }">
                        <li class="py-2">
                            <div class="nova-items-field-input-wrapper-item flex py-1 gap-2">
                                <button type="button" class="cursor-move sortable-handle px-4"><Icon type="view-list" /></button>
                                <input
                                    :value="element"
                                    :type="currentField.inputType"
                                    v-on:keyup="updateItem(index, $event)"
                                    :name="currentField.name + '['+ index +']'"
                                    autocomplete="new-password"
                                    :class="{'border-danger': hasErrors(currentField.attribute + '.' + index)}"
                                    class="flex-1 form-control form-input form-input-bordered"
                                >
                                <button
                                    type="button"
                                    @click="removeItem(index)"
                                    class="px-4 text-xl font-bold focus:outline-none focus:ring"
                                    v-html="currentField.deleteButtonValue"
                                />
                            </div>
                            <div v-if="hasErrors(currentField.attribute + '.' + index)" class="help-text error-text -mt-2 text-danger py-2">
                                <p v-html="arrayErrors[currentField.attribute + '.' + index][0]" />
                            </div>
                        </li>
                    </template>
                </draggable>
            </ul>
             <div class="nova-items-field-input-wrapper flex border border-40 p-4"  v-if="currentField.listFirst && ! maxReached">
                <input
                    v-model="newItem"
                    :type="currentField.inputType"
                    :placeholder="currentField.placeholder"
                    class="flex-1 form-control form-input form-input-bordered"
                    @keypress.enter.prevent="addItem"
                />
                 <button
                     type="button"
                     @click="addItem"
                     v-html="currentField.createButtonValue"
                     v-if="currentField.hideCreateButton === false"
                     class="ml-3 cursor-pointer shadow relative bg-primary-500 hover:bg-primary-400 active:bg-primary-600 text-white dark:text-gray-900 cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring inline-flex items-center justify-center h-9 px-3 shadow relative bg-primary-500 hover:bg-primary-400 active:bg-primary-600 text-white dark:text-gray-900"
                 />
            </div>
        </template>
    </DefaultField>
</template>

<style scoped>
</style>

<script>
import draggable from 'vuedraggable'
import { DependentFormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [DependentFormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    components: { draggable },

    data() {
        return {
            value: '',
            items: [],
            newItem: '',
            arrayErrors: []
        };
    },

    methods: {
        setInitialValue() {
            this.value = this.field.value || [];
            this.items = this.field.value || [];
        },

        fill(formData) {
            formData.append(this.field.attribute, this.value || [])
        },

		addItem() {
            const item = this.newItem.trim();
			if (item && ! this.maxReached) {
				this.items.push(item)
                this.newItem = ''

                this.$nextTick(() => {
                    if(this.field.maxHeight){
                        this.$refs.novaitemslist.scrollTop = this.$refs.novaitemslist.scrollHeight;
                    }
                })
			}
        },

        updateItem(index, event) {
            this.$set(this.items, index, event.target.value)
        },

		removeItem (index) {
			this.items.splice(index, 1)
        },

        hasErrors(key) {
            return this.arrayErrors.hasOwnProperty(key);
		}
    },
    computed: {
        maxHeight() {
            if (this.field.maxHeight === false) {
                return '';
            }

            return `max-height: ${this.field.maxHeight}px; overflow: auto;`;
        },
        maxReached() {
            return this.field.max !== false && this.items.length + 1 > this.field.max;
        }
    },
    watch: {
        'items': {
            handler: function (items) {
                this.value = JSON.stringify(items);
            },
            deep: true
        },
        'errors': {
            handler: function (errors) {
                if(errors.errors.hasOwnProperty(this.field.attribute)) {
                    this.arrayErrors = errors.errors[this.field.attribute][0]
                }
            },
            deep: true
        }
    }
}
</script>
