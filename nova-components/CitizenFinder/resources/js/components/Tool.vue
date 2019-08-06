<template>
    <div id="app">
        <heading class="mb-6">Пошук</heading>

        <form class="w-full " @submit.prevent="processFind">
            <div class="flex items-center border-b border-b-2 border-teal py-2">
                <input class="appearance-none bg-transparent border-none w-full text-grey-darker mr-3 py-1 px-2 leading-tight focus:outline-none"
                       type="text"
                       name="last_name"
                       v-model="lastName"
                       placeholder="Прізвище"
                       aria-label="Full name"
                >
                <input class="appearance-none bg-transparent border-none w-full text-grey-darker mr-3 py-1 px-2 leading-tight focus:outline-none"
                       type="text"
                       name="first_name"
                       v-model="firstName"
                       placeholder="Ім'я"
                       aria-label="Full name"
                >
                <input class="appearance-none bg-transparent border-none w-full text-grey-darker mr-3 py-1 px-2 leading-tight focus:outline-none"
                       type="text"
                       name="patronymic_name"
                       v-model="patronymicName"
                       placeholder="По-Батькові"
                       aria-label="Full name"
                >
                <button class="flex-no-shrink bg-teal hover:bg-teal-dark border-teal hover:border-teal-dark text-sm border-4 text-white py-1 px-2 rounded"
                        :disabled="working"
                        type="submit">
                    Пошук
                </button>
                <a class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded ml-4"
                        @click="openForm">
                    Новий
                </a>
            </div>
            <div  class="overflow-hidden absolute w-full rounded-lg shadow-lg mt-2 mr-3 max-h-search overflow-y-auto">
                <div class="search-results-citizens">
                    <ul class="list-reset" v-if="this.findCitizens">
                        <li v-for="citizen in findCitizens">
                            <a @click="choseCitizen" :id="citizen.id" class=" cursor-pointer flex items-center hover:bg-20 block py-2 px-3 no-underline font-normal bg-20">
                                <!---->
                                <div>
                                    <p class="text-90">{{ citizen.last_name }} {{ citizen.first_name }} {{ citizen.patronymic_name }}</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </form>

        <citizen-view :citizen="this.citizen"/>
        <new-citizen-view
                @assignCitizenChild="assignCitizen"
                :newCitizenForm="this.newCitizenForm"
                :citizen="this.citizen" />

    </div>
</template>

<script>

    import citizenView from './citizenView';
    import newCitizenView from './newCitizenView';
    import MaskedInput from 'vue-masked-input'

    export default {
        name: 'app',
        mounted() {
        },
        components: {
            citizenView, newCitizenView , MaskedInput
        },
        data() {
            return {
                fullData:{},
                working:false,
                citizen: false,
                noCitizens: false,
                newCitizenForm: false,
                findCitizens: [],
            }
        },
        methods: {

            processFind() {
                this.working = true;
                Nova.request()
                    .post(
                        '/search-citizen',
                        {
                            first_name: this.firstName,
                            last_name: this.lastName,
                            patronymic_name: this.patronymicName,
                        }
                    )
                    .then(({data}) => {
                        this.findCitizens = data.citizens;
                        if (data.citizens.length === 0) {
                            this.$toasted.error('Нічого не знайдено!');
                        } else {
                            this.$toasted.success(data.message);
                        }
                        this.working = false;
                    })
            },

            choseCitizen(event) {
                let citizen = false;
                this.findCitizens.forEach(function(value, key){
                    if (value.id === parseInt(event.currentTarget.id)) {
                        citizen = value;
                    }
                });
                this.citizen = citizen;
                this.findCitizens = [];
                this.newCitizenForm = false;
            },

            openForm() {
                this.citizen = false;
                this.newCitizenForm = true;
            },

            assignCitizen(citizen) {
                this.citizen = citizen;
                this.newCitizenForm = false;
            },

        },
    }
</script>

<style>
/* Scoped Styles */
</style>
