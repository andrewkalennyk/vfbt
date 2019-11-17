<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <checkbox
                    class="py-2"
                    @input="toggle"
                    :id="field.attribute"
                    :name="field.name"
                    :checked="checked"
                    :disabled="isReadonly"
            />
        </template>
    </default-field>
</template>

<script>
    import { Errors, FormField, HandlesValidationErrors } from 'laravel-nova'

    export default {
        mixins: [HandlesValidationErrors, FormField],

        props: ['resourceName', 'resourceId', 'field'],

        data: () => ({
            value: false,
            parentValue: null
        }),

        mounted() {
            this.watchedComponents.forEach(component => {
                let attribute = 'value';
                if (component.field.component === 'belongs-to-field') {
                    attribute = 'selectedResource';
                }

                component.$watch(attribute, (value) => {
                    console.log(value);
                    this.parentValue = value;

                    this.updateOptions();
                }, { immediate: true });
            });

        },

        methods: {
            setInitialValue() {
                this.value = this.field.value || false
            },

            fill(formData) {
                formData.append(this.field.attribute, this.trueValue)
            },

            toggle() {
                this.value = !this.value
            },
            notWatching() {
                return this.field.parent_attribute === undefined;
            },
            updateOptions() {
                this.loaded = false;

                if(this.notWatching() || (this.parentValue != null && this.parentValue != '')) {
                    Nova.request().get(this.endpoint)
                        .then(response => {
                            this.loaded = true;
                            this.value = response.data;
                        })
                }
            },
            isWatchingComponent(component) {
                return component.field !== undefined
                    && component.field.attribute === this.field.parent_attribute;
            }

        },

        computed: {
            watchedComponents() {
                return this.$parent.$children.filter(component => {
                    return this.isWatchingComponent(component);
                })
            },
            endpoint() {
                let parentValue = '';
                if (this.parentValue) {
                    parentValue = (typeof(this.parentValue) === 'object') ? this.parentValue.value : this.parentValue;
                }

                return this.field.endpoint
                    .replace('{resource-name}', this.resourceName)
                    .replace('{resource-id}', this.resourceId ? this.resourceId : '')
                    .replace('{'+ this.field.parent_attribute +'}', parentValue)
            },
            checked() {
                return Boolean(this.value)
            },

            trueValue() {
                return +this.checked
            },
        },
    }
</script>
