<template>
    <div id="citizenStatusView">
        <h2>Статус</h2>

        <div class="flex flex-wrap -mx-3 mb-2 mt-3">
            <div class="md:w-1/3 w-1/3 px-3 mb-8">
                <label for="grid-citizen-status"
                       class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Статус
                </label>
                <div class="relative">
                    <select id="grid-citizen-status"
                            @change="changeStatuses"
                            v-model="citizenStatus"
                            name="status_id"
                            class="block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
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
            <div class="md:w-1/3 w-1/3 px-3 mb-8" v-if="type == 'parent_committee'">
                <label for="grid-regional-establishment-type"
                       class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Тип Районого закладу
                </label>
                <div class="relative">
                    <select id="grid-regional-establishment-type"
                            v-model="regionalEstablishmentType"
                            name="regional_establishment_type_id"
                            class="block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        <option value="">Виберіть тип</option>
                        <option v-for="establishmentType in regionalEstablishmentTypes" :value="establishmentType.id">{{establishmentType.title}}</option>
                    </select>
                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="fill-current h-4 w-4">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="md:w-1/3 w-1/3 px-3 mb-8" v-if="type == 'parent_committee' && regionalEstablishments && regionalEstablishmentType">
                <label for="grid-regional-establishment"
                       class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Районний заклад
                </label>
                <div class="relative">
                    <select id="grid-regional-establishment"
                            v-model="regionalEstablishment"
                            name="regional_establishment_id"
                            class="block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        <option value="">Виберіть заклад</option>
                        <option v-for="establishment in regionalEstablishments"
                                v-if="establishment.regional_establishment_type_id == regionalEstablishmentType"
                                :value="establishment.id"
                        >{{establishment.title}}</option>
                    </select>
                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="fill-current h-4 w-4">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="md:w-1/3 w-1/3 px-3 mb-8" v-if="type == null && citizenStatus">
                <label for="grid-citizen-sub-status"
                       class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Cтатус 2 категорія
                </label>
                <div class="relative">
                    <select id="grid-citizen-sub-status"
                            v-model="citizenSubStatus"
                            name="citizen_sub_status_id"
                            class="block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        <option value="">Виберіть cтатус</option>
                        <option v-for="status in citizenSubStatuses" v-if="status.citizens_status_id == citizenStatus" :value="status.id" :text="status.title">{{status.title}}</option>
                    </select>
                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="fill-current h-4 w-4">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="md:w-1/3 w-1/3 px-3 mb-8" v-if="type == 'responsible'">
                <label for="grid-street"
                       class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Вулиця
                </label>
                <div class="relative">
                    <select id="grid-street"
                            v-model="responsibleStreet"
                            name="responsible_street"
                            class="block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        <option value="">Виберіть вулицю</option>
                        <option v-for="street in streets"  :value="street.id">{{street.title}}</option>
                    </select>
                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="fill-current h-4 w-4">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="md:w-1/3 w-1/3 px-3 mb-8" v-if="type == 'responsible' && responsibleStreet">
                <label for="grid-house"
                       class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Вулиця
                </label>
                <div class="relative">
                    <select id="grid-house"
                            v-model="responsibleHouse"
                            @change="getEntrance"
                            name="responsible_house"
                            class="block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        <option value="">Виберіть будинок</option>
                        <option v-for="house in houses" v-if="house.street_id == responsibleStreet" :value="house.id">{{house.title}}</option>
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
        <div class="flex flex-wrap -mx-3 mb-2 mt-3">
            <div class="md:w-1/3 w-1/3 px-3 mb-8" v-if="type == 'responsible' && responsibleHouse">
                <label for="grid-entrance"
                       class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Під'їзд
                </label>
                <div class="relative">
                    <select id="grid-entrance"
                            v-model="responsibleEntrance"
                            name="responsible_entrance"
                            class="block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        <option value="">Виберіть під'їзд</option>
                        <option v-for="n in entrance" :value="n">{{n}}</option>
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
        <div class="flex flex-wrap -mx-3 mb-2 mt-3">
            <div class="md:w-1/3 w-1/3 px-3 mb-8"></div>
            <div class="md:w-1/3 w-1/3 px-3 mb-8"></div>
            <div class="md:w-1/3 w-1/3 px-3 mb-8">
                <a href="javascript:void(0)"
                   @click="addStatus"
                   class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    Добавить статус
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'citizenStatusView',
        data() {
            return {
                citizenStatus: '',
                citizenSubStatus: '',
                type: '',
                statusObj: '',
                regionalEstablishmentType: '',
                regionalEstablishment: '',
                responsibleStreet: '',
                responsibleHouse: '',

                entrance: [],
                statuses : [],
                chosenStatuses: [],
                regionalEstablishmentTypes : [],
                regionalEstablishments : [],
                regionalEstablishmentsAll : [],
                citizenSubStatuses : [],
                streets: [],
                houses: [],


            }
        },
        methods: {
            getInfo() {
                Nova.request()
                    .post(
                        '/get-info-for-new',
                    )
                    .then(({data}) => {
                        this.statuses = data.statuses;
                        this.regionalEstablishmentTypes = data.regional_establishment_types;
                        this.regionalEstablishments = data.regional_establishments;
                        this.citizenSubStatuses = data.citizen_sub_statuses;
                        this.streets = data.streets;
                        this.houses = data.houses;
                    })
            },

            changeStatuses() {
                let statusId = this.citizenStatus;
                let obj = '';
                this.statuses.forEach(function(value, key) {
                    if (value.id === parseInt(statusId)) {
                        obj = value;
                    }
                });

                if (obj) {
                    this.type = obj.type;
                }

                this.statusObj = obj;

            },

            getEntrance() {
                let house = '';
                let entrances = [];
                let houseId = this.responsibleHouse;
                this.houses.forEach(function(value, key) {
                    if (value.id === parseInt(houseId)) {
                        house = value;
                    }
                });

                let n = 0;
                while (n < house.entrances_number) {
                    n++;
                    entrances.push(n);
                }
                this.entrance = entrances;
            },

            addStatus() {
                let status = {};

                if (this.type === null) {
                    status = {
                        id: this.chosenStatuses.length + 1,
                        params: {
                            type: this.getTitleOfSelected(this.type, 'chosenStatuses'),
                            subStatus: this.citizenSubStatus.text
                        }

                    }
                }
                this.chosenStatuses.push(status);
            },
            getTitleOfSelected(id, model) {
                let items = [];
                if (model === 'chosenStatuses') {
                    items = this.statuses;
                }
                console.log(items);
                console.log(id);
                items.forEach(function(value, key) {
                    if (value.id === parseInt(id)) {
                        return value.title;
                    }
                });
            }

        },
        mounted() {
            this.getInfo();
        },
    }
</script>