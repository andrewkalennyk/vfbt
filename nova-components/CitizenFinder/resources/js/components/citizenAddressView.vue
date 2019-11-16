<template>
    <div id="citizenAddressView">

        <h2>Адреса</h2>

        <div class="flex flex-wrap -mx-3 mb-2 mt-3">
            <div class="md:w-1/3 w-1/3 px-3 mb-8">
                <label for="grid-elective-plot" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Дільниця
                </label>
                <div class="relative">
                    <select id="grid-elective-plot"
                            v-model="electivePlot"
                            @change="changeElectivePlot"
                            name="elective_plot_id"
                            class="block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        <option value="">Виберіть дільницю</option>
                        <option v-for="electivePlot in electivePlots"
                                :value="electivePlot">{{electivePlot.title}}</option>
                    </select>
                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="fill-current h-4 w-4">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="md:w-1/3 w-1/3 px-3 mb-8">
                <label for="grid-street-plot" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Вулиця
                </label>
                <div class="relative">
                    <select id="grid-street-plot"
                            v-model="street"
                            @change="changeStreet"
                            name="street_id"
                            class="block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        <option value="">Виберіть вулицю</option>
                        <option v-for="street in streets"
                                :value="street">{{street.title}}</option>
                    </select>
                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="fill-current h-4 w-4">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="md:w-1/3 w-1/3 px-3 mb-8" v-if="street">
                <label for="grid-house-plot" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Дім
                </label>
                <div class="relative">
                    <select id="grid-house-plot"
                            v-model="house"
                            @change="changeHouse"
                            name="house_id"
                            class="block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        <option value="">Виберіть дім</option>
                        <option v-for="house in houses"
                                v-if="house.street_id == street.id"
                                :value="house">{{house.title}}</option>
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

        <div class="flex flex-wrap -mx-3 mb-2 mt-3" v-if="house">
            <div class="md:w-1/3 w-1/3 px-3 mb-6 md:mb-0">
                <label for="grid-flat-name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Квартира
                </label>
                <input id="grid-flat-name" name="flat_number" type="text" placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
            </div>
            <div class="md:w-1/3 w-1/3 px-3 mb-8" v-if="house.entrances_number">
                <label for="grid-entrance" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Під'їзд
                </label>
                <div class="relative">
                    <select id="grid-entrance"
                            name="entrance"
                            class="block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        <option value="">Під'їзд</option>
                        <option v-for="entrance in parseInt(house.entrances_number)"
                                :value="entrance">{{entrance}}</option>
                    </select>
                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="fill-current h-4 w-4">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="md:w-1/3 w-1/3 px-3 mb-8" v-if="house.floors_number">
                <label for="grid-floor" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Поверх
                </label>
                <div class="relative">
                    <select id="grid-floor"
                            name="floor"
                            class="block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        <option value="">Поверх</option>
                        <option v-for="floor in parseInt(house.floors_number)"
                                :value="floor">{{floor}}</option>
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
    </div>
</template>

<script>
    export default {
        name: 'citizenAddressView',
        data() {
            return {
                electivePlots: [],
                streets: [],
                filteredStreets: [],
                houses: [],
                filteredHouses: [],

                electivePlot: '',
                street: '',
                house: '',
            }
        },
        methods: {
            getInfo() {
                Nova.request()
                    .post(
                        '/get-info-for-new',
                    )
                    .then(({data}) => {
                        this.electivePlots = data.elective_plots;
                        this.streets = data.streets;
                        this.houses = data.houses;
                    })
            },

            changeStreet() {
                if (this.electivePlot === '') {
                    Nova.request()
                        .post(
                            '/get-related-entities-by-street',
                            {
                                street_id: this.street.id,
                            }
                        )
                        .then(({data}) => {
                            this.electivePlots = data.elective_plots;
                        })
                }
            },
            changeHouse() {
                let electivePlotChosen = '',
                    house = this.house;

                if (house && this.electivePlots.length) {
                    this.electivePlots.forEach(function(value, key){
                        if (value.id === parseInt(house.elective_plot_id)) {
                            electivePlotChosen = value;
                        }
                    });

                    this.electivePlot = electivePlotChosen;

                }

                this.$emit('assignAddressChild', {
                    elective_plot_id: this.electivePlot.id,
                    street_id: this.street.id,
                    house_id: this.house.id,
                });

            },
            changeElectivePlot() {
                if (this.street === '') {
                    Nova.request()
                        .post(
                            '/get-related-entities-by-elective-plot',
                            {
                                elective_plot_id: this.electivePlot.id,
                            }
                        )
                        .then(({data}) => {
                            this.streets = data.streets;
                        })
                }

            },

        },
        mounted() {
            this.getInfo();
        },
    }
</script>