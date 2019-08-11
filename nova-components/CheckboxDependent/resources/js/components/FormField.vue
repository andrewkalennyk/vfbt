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

        data: () => ({
            value: false,
            parentValue: null
        }),

        mounted() {
            this.value = this.field.value || false

            this.field.fill = formData => {
                formData.append(this.field.attribute, this.trueValue)
            }

            this.watchedComponents.forEach(component => {
                let attribute = 'value'

                component.$watch(attribute, (value) => {
                    this.parentValue = value;

                    this.updateOptions();
                }, { immediate: true });
            });

        },

        methods: {
            toggle() {
                this.value = !this.value
            },
            notWatching() {
                return this.field.parent_attribute === undefined;
            },
            updateOptions() {
                this.loaded = false;
                console.log(this.endpoint);
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
                return this.field.endpoint
                    .replace('{resource-name}', this.resourceName)
                    .replace('{resource-id}', this.resourceId ? this.resourceId : '')
                    .replace('{'+ this.field.parent_attribute +'}', this.parentValue ? this.parentValue : '')
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
