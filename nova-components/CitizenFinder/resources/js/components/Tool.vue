<template>
    <div id="app">
        <heading class="mb-6">Let's find them</heading>

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

        <div class="mt-6  rounded overflow-hidden shadow-lg" v-if="this.citizen">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-4">{{ this.citizen.last_name }} {{ this.citizen.first_name }} {{ this.citizen.patronymic_name }}</div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Дата Народження</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.birthDay }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Телефон</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.phone }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Категория</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.category }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12"># посв</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.certificate_number }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Чорний список</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.black_list }}</div>
                </div>

                <div class="font-bold text-xl mb-4">Адресса </div>

                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Громадська приймальня</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.office }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Дільниця</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.elective_plot }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Bулиця</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.street }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Дім</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.house }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Квартира</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.flat }}</div>
                </div>
            </div>
        </div>

        <div class="relative rounded overflow-hidden mb-8 shadow-lg mt-6" v-if="this.newCitizenForm">
            <div class=" border-grey-light p-4 flex justify-center p-8">
                <form class="w-full justify-center" id="new_citizen_form" @submit.prevent="newCitizen">
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                            <label for="grid-last-name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Прізвище
                            </label>
                            <input id="grid-last-name" ref="citizenValue" name="last_name" type="text" placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        </div>
                        <div class="md:w-1/3 px-3">
                            <label for="grid-first-name"  class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Ім'я
                            </label>
                            <input id="grid-first-name" ref="citizenValue" name="first_name" type="text" placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        </div>
                        <div class="md:w-1/3 px-3">
                            <label for="grid-patronymic-name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                По-Батькові
                            </label>
                            <input id="grid-patronymic-name" ref="citizenValue" name="patronymic_name" type="text" placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                            <label for="grid-birthdate-name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Дата Народження
                            </label>
                            <input id="grid-birthdate-name" ref="citizenValue" name="date_birth" type="text" placeholder="12-05-2019" class="appearance-none block w-full bg-grey-lighter text-grey-darker rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white flatpickr-input">
                        </div>
                        <div class="md:w-1/3 px-3">
                            <label for="grid-phone-name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Телефон
                            </label>
                            <input id="grid-phone-name" ref="citizenValue" name="phone" type="text" placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        </div>
                        <div class="md:w-1/3 px-3 mb-8">
                            <label for="grid-category" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Категорія
                            </label>
                            <div class="relative">
                                <select id="grid-category" ref="citizenValue" v-model="citizenCategory" name="citizens_category_id" class="block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                                    <option value="">Виберіть категорію</option>
                                    <option v-for="category in citizenCategories" :value="category.id">{{category.title}}</option>
                                </select>
                                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                         class="fill-current h-4 w-4">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2" v-if="citizenCategory">
                        <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                            <label for="grid-certificagte-name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                № посвідчення
                            </label>
                            <input id="grid-certificagte-name" name="certificate_number" type="text" class="appearance-none block w-full bg-grey-lighter text-grey-darker rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white flatpickr-input">
                        </div>
                    </div>

                    <h2>Адреса</h2>

                    <div class="flex flex-wrap -mx-3 mb-2 mt-3">
                        <div class="md:w-1/3 px-3 mb-8">
                            <label for="grid-category" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Дільниця
                            </label>
                            <div class="relative">
                                <select id="grid-elective-plot" v-model="electivePlotId" @change="filterStreets" name="elective_plot_id" class="block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                                    <option value="">Виберіть дільницю</option>
                                    <option v-for="electivePlot in electivePlots" :value="electivePlot.id">{{electivePlot.title}}</option>
                                </select>
                                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                         class="fill-current h-4 w-4">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-1/3 px-3 mb-8" v-if="electivePlotId">
                            <label for="grid-category" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Вулиця
                            </label>
                            <div class="relative">
                                <select id="grid-street-plot" v-model="streetId" @change="filterHouses" name="street_id" class="block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                                    <option value="">Виберіть вулицю</option>
                                    <option v-for="street in filteredStreets" :value="street.id">{{street.title}}</option>
                                </select>
                                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                         class="fill-current h-4 w-4">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-1/3 px-3 mb-8" v-if="streetId">
                            <label for="grid-category" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Дім
                            </label>
                            <div class="relative">
                                <select id="grid-house-plot" v-model="houseId" name="house_id" class="block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                                    <option value="">Виберіть дім</option>
                                    <option v-for="house in filteredHouses" :value="house.id">{{house.title}}</option>
                                </select>
                                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                         class="fill-current h-4 w-4">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-2 mt-3" v-if="houseId">
                        <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                            <label for="grid-flat-name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Квартира
                            </label>
                            <input id="grid-flat-name" name="flat_number" type="text" placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        </div>
                        <div class="md:w-1/3 px-3 mb-8">
                            <label for="grid-category" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Статус
                            </label>
                            <div class="relative">
                                <select id="grid-status"  name="status_id" class="block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                                    <option value="">Виберіть статус</option>
                                    <option v-for="status in statuses" :value="status.id">{{status.title}}</option>
                                </select>
                                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                         class="fill-current h-4 w-4">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

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
export default {
    name: 'app',
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
            findCitizens: [],
            citizenCategories: [],
            electivePlots: [],
            streets: [],
            filteredStreets: [],
            houses: [],
            filteredHouses: [],
            statuses: [],
            electivePlotId: '',
            streetId: '',
            houseId: '',
            citizenCategory: '',
        }
    },
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

        newCitizen() {
            let myForm = document.getElementById('new_citizen_form'),
            data = new FormData(myForm);

            Nova.request()
                .post(
                    '/save-citizen',
                    data
                )
                .then(({data}) => {
                    this.$toasted.success(data.message);
                    this.citizen = data.citizen;
                    this.closeForm();
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

        filterStreets()
        {
            let streets = [],
            electivePlotId = this.electivePlotId;
            this.streets.forEach(function(value, key){
                if (value.elective_plot_id === parseInt(electivePlotId)) {
                    streets.push(value);
                }
            });
            this.filteredStreets = streets;
        },

        filterHouses()
        {
            let houses = [],
                streetId = this.streetId,
                electivePlotId = this.electivePlotId;
            this.houses.forEach(function(value, key){
                if (value.street_id === parseInt(streetId) && value.elective_plot_id === parseInt(electivePlotId)) {
                    houses.push(value);
                }
            });
            this.filteredHouses = houses;
        },

        openForm() {
            this.citizen = false;
            this.newCitizenForm = true;
        },

        closeForm() {
            this.newCitizenForm = false;
        }
    },
}
</script>

<style>
/* Scoped Styles */
</style>
