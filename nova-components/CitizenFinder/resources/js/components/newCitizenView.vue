<template>
    <div id="newCitizenView">
        <div class="relative rounded overflow-hidden mb-8 shadow-lg mt-6" v-if="newCitizenForm">
            <div class=" border-grey-light p-4 flex justify-center p-8">
                <form class="w-full justify-center" id="new_citizen_form" @submit.prevent="newCitizen">
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-1/3 md:w-1/3 px-3 mb-6 md:mb-0">
                            <label for="grid-last-name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Прізвище
                            </label>
                            <input id="grid-last-name" ref="citizenValue" name="last_name" type="text" placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        </div>
                        <div class="w-1/3 md:w-1/3 px-3">
                            <label for="grid-first-name"  class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Ім'я
                            </label>
                            <input id="grid-first-name" ref="citizenValue" name="first_name" type="text" placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        </div>
                        <div class="w-1/3 md:w-1/3 px-3">
                            <label for="grid-patronymic-name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                По-Батькові
                            </label>
                            <input id="grid-patronymic-name" ref="citizenValue" name="patronymic_name" type="text" placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-1/3 md:w-1/3 px-3 mb-6 md:mb-0">
                            <label for="grid-birthdate-name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Дата Народження
                            </label>
                            <input id="grid-birthdate-name"
                                   ref="citizenValue"
                                   v-model="birthDate"
                                   v-mask="'##-##-####'"
                                   name="date_birth"
                                   type="text"
                                   placeholder="12-05-2019"
                                   class="appearance-none block w-full bg-grey-lighter text-grey-darker rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white flatpickr-input">
                        </div>
                        <div class="w-1/3 md:w-1/3 px-3">
                            <label for="grid-phone-name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Телефон
                            </label>
                            <input id="grid-phone-name"
                                   ref="citizenValue"
                                   v-model="phone"
                                   name="phone"
                                   v-mask="'+380##-###-##-##'"
                                   placeholder="+380__-___-__-__"
                                   type="text"
                                   class="appearance-none block w-full bg-grey-lighter text-grey-darker border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        </div>
                        <div class="w-1/3 md:w-1/3 px-3">
                            <label for="grid-add-phone-name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Телефон (дод.)
                            </label>
                            <input id="grid-add-phone-name"
                                   ref="citizenValue"
                                   v-model="addPhone"
                                   name="add_phone"
                                   v-mask="'+380##-###-##-##'"
                                   placeholder="+380__-___-__-__"
                                   type="text"
                                   class="appearance-none block w-full bg-grey-lighter text-grey-darker border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        </div>

                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4" >
                        <div class="w-1/3 md:w-1/3 px-3 mb-6">
                            <div class="category-select">
                                <label for="grid-category" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                    Категорія
                                </label>
                                <multiselect v-model="citizenCategoriesValue"
                                             id="grid-category"
                                             :options="citizenCategories"
                                             class="multiselect-grey"
                                             :multiple="true"
                                             :close-on-select="false"
                                             :clear-on-select="false"
                                             placeholder="Виберіть категорію"
                                             label="title"
                                             track-by="id"
                                             :preselect-first="false">
                                    <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} options selected</span></template>
                                </multiselect>
                            </div>
                        </div>
                        <div class="md:w-1/3 w-1/3 px-3 mb-6 md:mb-0">
                            <label for="is-certificagte-number" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Чи є посвідчення?
                            </label>
                            <input class="mr-2 bg-grey-lighter leading-tight"
                                   id="is-certificagte-number"
                                   v-model="isCertificateNumber"
                                   name="is_certificate"
                                   type="checkbox">
                        </div>
                        <div class="md:w-1/3 w-1/3 px-3 mb-6 md:mb-0" v-if="isCertificateNumber">
                            <label for="grid-certificagte-name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                № посвідчення
                            </label>
                            <input id="grid-certificagte-name"
                                   name="certificate_number"
                                   type="text"
                                   class="appearance-none block w-full bg-grey-lighter text-grey-darker rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white flatpickr-input">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4" >
                        <div class="w-1/3 md:w-1/3 px-3">
                            <label for="grid-comment" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Комментар
                            </label>
                            <textarea id="grid-comment"
                                   ref="citizenValue"
                                   v-model="addComment"
                                   name="comment"
                                   class="appearance-none block w-full bg-grey-lighter text-grey-darker border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey">
                            </textarea>
                        </div>
                    </div>

                    <citizen-address-view @assignAddressChild="assignAddress"/>

                    <citizen-status-view @assignStatusesChild="assignStatuses" />

                    <div class="flex flex-wrap -mx-3 mb-2">
                        <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded ml-4"
                                type="submit">
                            Зберегти
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import {mask} from 'vue-the-mask'
    import Multiselect from 'vue-multiselect'
    import citizenStatusView from './citizenStatusView';
    import CitizenAddressView from "./citizenAddressView.vue";

    export default {
        directives: {mask},
        name: 'newCitizenView',
        components: {
            CitizenAddressView,
            Multiselect,
            citizenStatusView
        },
        data() {
            return {
                citizenCategories: [],
                chosenStatuses: [],
                isCertificateNumber: '',
                citizenCategoriesValue: [],
            }
        },
        props: [ 'newCitizenForm'],
        methods: {
            getInfo() {
                Nova.request()
                    .post(
                        '/get-info-for-new',
                    )
                    .then(({data}) => {
                        this.citizenCategories = data.categories;
                        this.electivePlots = data.elective_plots;
                        this.streets = data.streets;
                        this.houses = data.houses;
                        this.statuses = data.statuses;
                    })
            },
            newCitizen() {
                let myForm = document.getElementById('new_citizen_form'),
                    data = new FormData(myForm);
                    data.append('citizenCategories', JSON.stringify(this.citizenCategoriesValue));
                    data.append('statuses', JSON.stringify(this.chosenStatuses));
                    data.append('address', JSON.stringify(this.chosenAddress));

                Nova.request()
                    .post(
                        '/save-citizen',
                        data
                    )
                    .then(({data}) => {
                        this.$toasted.success(data.message);
                        this.$emit('assignCitizenChild', data.citizen);
                    })
            },
            assignStatuses(statuses) {
                this.chosenStatuses = statuses;
            },
            assignAddress(address) {
                this.chosenAddress = address;
            }
        },
        mounted() {
            this.getInfo();
        },
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style lang="css" scoped>
    .category-select >>> .multiselect__tags {
        background: #f1f5f8;
    }
    .category-select >>> .multiselect__single {
        background: #f1f5f8;
    }

    .category-select >>> .multiselect__input {
        background: #f1f5f8;
    }

</style>