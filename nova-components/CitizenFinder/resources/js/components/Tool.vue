<template>
    <div>
        <heading class="mb-6">Citizen Finder</heading>

        <card class="bg-white flex flex-col rounded" style="min-height: 300px">
            <form class="px-8 pt-6 pb-8" @submit.prevent="processFind">
                <div class="flex mb-4">
                    <div class="w-1/3 mt-2 ml-2 mr-2">
                        <label class="block text-grey-darker text-sm font-bold m-2" for="lastName">
                            Прізвище
                        </label>
                        <input class="shadow appearance-none border bg-grey-lighter rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                               id="lastName"
                               v-model="lastName"
                               placeholder="Прізвище"
                               type="text">
                    </div>
                    <div class="w-1/3 bg-grey h-12 mt-2 mr-2">
                        <label class="block text-grey-darker text-sm font-bold m-2" for="first_name">
                            Ім'я
                        </label>
                        <input class="shadow appearance-none border bg-grey-lighter rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                               id="first_name"
                               type="text"
                               name="first_name"
                               v-model="firstName"
                               placeholder="Ім'я">
                    </div>
                    <div class="w-1/3 bg-grey-light h-12 mt-2 mr-2">
                        <label class="block text-grey-darker text-sm font-bold m-2" for="patronymic_name">
                            По-Батькові
                        </label>
                        <input class="shadow appearance-none border bg-grey-lighter rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                               id="patronymic_name"
                               type="text"
                               name="patronymic_name"
                               v-model="patronymicName"
                               placeholder="По-Батькові">
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="w-1/3 mt-2 ml-2 mr-2">
                        <label class="block text-grey-darker text-sm font-bold m-2" for="phone">
                            Телефон
                        </label>
                        <input class="shadow appearance-none border bg-grey-lighter rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                               v-model="phone"
                               id="phone"
                               v-mask="'+380##-###-##-##'"
                               name="phone"
                               placeholder="+380__-___-__-__"
                               type="text"
                        />
                    </div>
                    <div class="w-1/3 mt-2 ml-2 mr-2">
                        <label class="block text-grey-darker text-sm font-bold m-2" for="birth_date">
                            Дата Народження
                        </label>
                        <input class="shadow appearance-none border bg-grey-lighter rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                               v-model="birthDate"
                               id="birth_date"
                               v-mask="'##-##-####'"
                               name="birthDate"
                               placeholder="__-__-____"
                               type="text"
                        />
                    </div>
                    <div class="w-1/3 mt-2 ml-2 mr-2">
                        <label class="block text-grey-darker text-sm font-bold m-2" for="certificate_number">
                            Номер посвідчення
                        </label>
                        <input class="shadow appearance-none border bg-grey-lighter rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                               v-model="certificateNumber"
                               id="certificate_number"
                               name="certificateNumber"
                               type="text"
                        />
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="w-1/3 mt-2 ml-2 mr-2">
                        <label class="block text-grey-darker text-sm font-bold m-2" for="grid-elective-plot">
                            Дільниця
                        </label>
                        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                @change="changeElectivePlot"
                                id="grid-elective-plot"
                                v-model="electivePlotId"
                                name="elective_plot_id"
                        >
                            <option value="">Виберіть дільницю</option>
                            <option v-for="electivePlot in electivePlots" :value="electivePlot.id">{{electivePlot.title}}</option>
                        </select>
                    </div>
                    <div class="w-1/3 bg-grey h-12 mt-2 mr-2">
                        <label class="block text-grey-darker text-sm font-bold m-2" for="grid-elective-plot">
                            Вулиця
                        </label>
                        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                @change="changeStreet"
                                id="grid-street"
                                v-model="streetId"
                                name="street_id"
                        >
                            <option value="">Виберіть вулицю</option>
                            <option v-for="street in streets" :value="street.id">{{street.title}}</option>
                        </select>
                    </div>
                    <div class="w-1/3 bg-grey h-12 mt-2 mr-2">
                        <label class="block text-grey-darker text-sm font-bold m-2" for="grid-house" v-if="houses.length">
                            Будинок
                        </label>
                        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                v-if="houses.length"
                                @change="changeHouse"
                                id="grid-house"
                                v-model="houseId"
                                name="house_id"
                        >
                            <option value="">Виберіть будинок</option>
                            <option v-for="house in houses" :value="house.id">{{house.title}}</option>
                        </select>
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="w-1/3 mt-2 ml-2 mr-2"></div>
                    <div class="w-1/3 bg-grey h-12 mt-2 mr-2"></div>
                    <div class="w-1/3 bg-grey-light h-12 mt-2 mr-2 align-content-end">
                        <button class="flex-no-shrink bg-teal hover:bg-teal-dark border-teal hover:border-teal-dark text-sm border-4 text-white py-1 px-2 rounded"
                                :disabled="working"
                                type="submit">
                            Пошук
                        </button>
                        <a class="flex-no-shrink bg-blue hover:bg-blue-dark text-white text-sm font-bold py-2 px-4 rounded ml-4 cursor-pointer"
                           @click="openForm">
                            Новий
                        </a>
                    </div>
                </div>
            </form>

            <div class="px-8 pt-6 pb-8 bg-grey-lighter" v-if="this.findCitizens.length">
                <h2>Результати</h2>
                <a href="javascript:void(0)"
                   v-for="citizen in findCitizens"
                   @click="choseCitizen"
                   :id="citizen.id"
                   class="block px-4 py-2 hover:bg-20 text-80 no-underline"
                >{{ citizen.last_name }} {{ citizen.first_name }} {{ citizen.patronymic_name }}</a>
            </div>
        </card>

        <citizen-view :citizen="this.citizen"/>

        <new-citizen-view
                @assignCitizenChild="assignCitizen"
                :newCitizenForm="this.newCitizenForm"
                :citizen="this.citizen" />
    </div>
</template>

<script>
import {mask} from 'vue-the-mask'
import citizenView from './citizenView';
import newCitizenView from './newCitizenView';

export default {
    directives: {mask},
    mounted() {
        this.getInfo();
    },
    data() {
        return {
            fullData:{},
            working:false,
            citizen: false,
            noCitizens: false,
            newCitizenForm: false,
            electivePlotId: '',
            streetId: '',
            houseId: '',
            electivePlots: [],
            streets: [],
            houses:[],
            findCitizens: [],
        }
    },
    components: {
        citizenView,
        newCitizenView
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
                        phone: this.phone,
                        date_birth: this.birthDate,
                        certificate_number: this.certificateNumber,
                        elective_plot_id: this.electivePlotId,
                        street_id: this.streetId,
                        house_id: this.houseId,
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

        getInfo() {
            Nova.request()
                .post(
                    '/get-info-for-new',
                )
                .then(({data}) => {
                    this.electivePlots = data.elective_plots;
                    this.streets = data.streets;
                })
        },

        changeStreet() {
            Nova.request()
                .post(
                    '/get-related-entities-by-street',
                    {
                        street_id: this.streetId,
                    }
                )
                .then(({data}) => {
                    this.electivePlots = data.elective_plots;
                    this.houses = data.houses;
                    console.log(this.houseId);
                })
        },

        changeHouse() {
            let house = '';
            let id = this.houseId;
            let electivePlots = this.electivePlots;
            let electivePlotChosen = '';
            console.log('changeHouse');
            this.houses.forEach(function(value, key){
                if (value.id === parseInt(id)) {
                    house = value;
                }
            });

            if (house && this.electivePlotId === '') {
                electivePlots.forEach(function(value, key){
                    if (value.id === parseInt(house.elective_plot_id)) {
                        electivePlotChosen = house.elective_plot_id;
                    }
                });
                this.electivePlotId = electivePlotChosen;
            }

        },

        changeElectivePlot() {
            Nova.request()
                .post(
                    '/get-related-entities-by-elective-plot',
                    {
                        elective_plot_id: this.electivePlotId,
                    }
                )
                .then(({data}) => {
                    this.streets = data.streets;
                })
        },

         openForm() {
            this.citizen = false;
            this.newCitizenForm = true;
        },

        assignCitizen(citizen) {
            this.citizen = citizen;
            this.newCitizenForm = false;
        },

    }
}
</script>

<style>
    *,:after,:before {
        border: 0 solid #dae1e7;
    }
    .bg-grey-lighter {
        background-color: #f1f5f8
    }
    .bg-blue {
        background-color: #3490dc;
    }
    .border-teal {
        border-color: #4dc0b5;
    }

    .bg-teal {
        background-color: #4dc0b5;
    }
</style>
