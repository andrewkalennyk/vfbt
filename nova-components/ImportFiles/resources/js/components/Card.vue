<template>
    <card class="flex flex-col items-center justify-center">
        <div class="px-3 py-3">
            <div class="py-2 w-full block text-xs uppercase tracking-wide text-center text-80 dim font-bold focus:outline-none">
                Імпорт Людей
            </div>
            <form @submit.prevent="processImport" ref="form">
                <div class="py-4">
                    <span class="form-file mr-4">
                        <input
                                ref="fileField"
                                class="form-file-input"
                                type="file"
                                :id="inputName"
                                :name="inputName"
                                @change="fileChange"
                        />
                        <label :for="inputName" class="form-file-btn btn btn-default btn-primary">
                            {{__('Choose File')}}
                        </label>
                    </span>
                    <span class="text-gray-50">
                        {{ currentLabel }}
                    </span>
                    <button
                            :disabled="working"
                            type="submit"
                            class="btn btn-default btn-primary ml-auto mt-auto"
                            v-if="file"
                    >
                        <loader v-if="working" width="30"></loader>
                        <span v-else>{{__('Import')}}</span>
                    </button>
                </div>

                <div class="flex">
                    <div v-if="errors">
                        <p class="text-danger mb-1" v-for="error in errors">{{error[0]}}</p>
                    </div>
                </div>
            </form>
        </div>
        <!--<div class="px-3 py-3">
            <div class="py-2 w-full block text-xs uppercase tracking-wide text-center text-80 dim font-bold focus:outline-none">
                Експорт регіональних довідників
            </div>
            <a href="" class="btn btn-default btn-primary">
                Створити
            </a>
        </div>-->
    </card>
</template>

<script>
export default {
    props: [
        'card',
    ],
    data() {
        return {
            fileName: '',
            file: null,
            label: 'Файл відсутній',
            working: false,
            errors: null,
        };
    },
    methods: {
        fileChange(event) {
            let path = event.target.value;
            this.fileName = path.match(/[^\\/]*$/)[0];
            this.file = this.$refs.fileField.files[0];
        },
        processImport() {
            if (!this.file) {
                return;
            }
            this.working = true;
            let formData = new FormData();
            formData.append('file', this.file);
            Nova.request()
                .post(
                    '/import-general-info',
                    formData
                )
                .then(({data}) => {
                    this.$toasted.success(data.message);
                    this.$parent.$parent.$parent.$parent.getResources();
                    this.errors = null;
                })
                .catch(({response}) => {
                    if (response.data.danger) {
                        this.$toasted.error(response.data.danger);
                        this.errors = null;
                    } else {
                        this.errors = response.data.errors;
                    }
                })
                .finally(() => {
                    this.working = false;
                    this.file = null;
                    this.fileName = '';
                    this.$refs.form.reset();
                });
        },
    },
    mounted() {
        //
    },
    computed: {
        /**
         * The current label of the file field
         */
        currentLabel() {
            return this.fileName || this.label;
        },

        firstError() {
            return this.errors ? this.errors[Object.keys(this.errors)[0]][0] : null;
        },

        inputName() {
            return 'file-import-input-general-info';
        },
    },
}
</script>
