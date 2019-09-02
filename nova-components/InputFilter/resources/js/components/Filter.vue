<template>
    <div>
        <h3 class="text-sm uppercase tracking-wide text-80 bg-30 p-3">{{ filter.name }}</h3>

        <div class="p-2">
            <input type="text"
                   class="block w-full rounded border border-60 form-control-sm"
                   @change="handleChange"
                   :value="value"
                   :dusk="filter.name + '-filter-select'"
            >
        </div>
    </div>
</template>

<script>
export default {
    props: {
        resourceName: {
            type: String,
            required: true,
        },
        filterKey: {
            type: String,
            required: true,
        },
    },

    methods: {
        handleChange(event) {
            let inputValue = escape(event.target.value);
            console.log('aaaa - '+ inputValue);
            this.$store.commit(`${this.resourceName}/updateFilterState`, {
                filterClass: this.filterKey,
                value: inputValue,
            })

            this.$emit('change')
        },
    },

    computed: {
        filter() {
            return this.$store.getters[`${this.resourceName}/getFilter`](this.filterKey)
        },

        value() {
            console.log(this.filter.currentValue);
            return this.filter.currentValue
        },
    },
}
</script>
