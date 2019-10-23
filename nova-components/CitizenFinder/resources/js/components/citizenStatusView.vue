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
                            v-model="citizenStatus"
                            name="status_id"
                            class="block appearance-none w-full bg-grey-lighter border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        <option value="">Виберіть статус</option>
                        <option v-for="status in statuses" :value="status">{{status.title}}</option>
                    </select>
                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="fill-current h-4 w-4">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="md:w-1/3 w-1/3 px-3 mb-8" v-if="citizenStatus.type == 'parent_committee'">
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
                        <option v-for="establishmentType in regionalEstablishmentTypes" :value="establishmentType">{{establishmentType.title}}</option>
                    </select>
                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="fill-current h-4 w-4">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="md:w-1/3 w-1/3 px-3 mb-8" v-if="citizenStatus.type == 'parent_committee' && regionalEstablishments && regionalEstablishmentType">
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
                                v-if="establishment.regional_establishment_type_id == regionalEstablishmentType.id"
                                :value="establishment"
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

            <div class="md:w-1/3 w-1/3 px-3 mb-8" v-if="citizenStatus.type == null && citizenStatus">
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
                        <option v-for="status in citizenSubStatuses"
                                v-if="status.citizens_status_id == citizenStatus.id"
                                :value="status"
                                :text="status.title">{{status.title}}</option>
                    </select>
                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="fill-current h-4 w-4">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="md:w-1/3 w-1/3 px-3 mb-8" v-if="citizenStatus.type == 'responsible'">
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
                        <option v-for="street in streets"  :value="street">{{street.title}}</option>
                    </select>
                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             class="fill-current h-4 w-4">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="md:w-1/3 w-1/3 px-3 mb-8" v-if="citizenStatus.type == 'responsible' && responsibleStreet">
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
                        <option v-for="house in houses" v-if="house.street_id == responsibleStreet.id" :value="house">{{house.title}}</option>
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
            <div class="md:w-1/3 w-1/3 px-3 mb-8" v-if="citizenStatus.type == 'responsible' && responsibleHouse">
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

        <div class="card" v-if="chosenStatuses.length">
            <div class="relative"><!---->
                <div class="overflow-hidden overflow-x-auto relative" style="">
                    <table cellpadding="0" cellspacing="0" data-testid="resource-table" class="table w-full">
                        <thead>
                            <tr>
                                <th class="text-left">
                                    <span class="cursor-pointer inline-flex items-center">ID</span>
                                </th>
                                <th class="text-left">
                                    <span class="cursor-pointer inline-flex items-center">Назва</span>
                                </th>
                                <th class="text-left"><span>Тип</span></th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(status, key) in chosenStatuses">
                                <td>
                                    <div class="text-left text-left">
                                        <span class="whitespace-no-wrap">{{status.id}}</span>
                                    </div>
                                </td>
                                <td v-if="status.params.type === 'responsible'">
                                    <div class="text-left text-left">
                                        <span class="whitespace-no-wrap">{{status.params.responsibleStreet}} {{status.params.responsibleHouse}} ({{status.params.responsibleEntrance}} під'їзд)</span>
                                    </div>
                                </td>
                                <td v-if="status.params.type === null">
                                    <div class="text-left text-left">
                                        <span class="whitespace-no-wrap">{{status.params.statusTitle}}({{status.params.subStatus}})</span>
                                    </div>
                                </td>
                                <td v-if="status.params.type === 'parent_committee'">
                                    <div class="text-left text-left">
                                        <span class="whitespace-no-wrap">{{status.params.regionalEstablishmentType}} - {{status.params.regionalEstablishment}}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-left text-left">
                                        <span class="whitespace-no-wrap">{{status.params.statusTitle}}</span>
                                    </div>
                                </td>
                                <td class="td-fit text-right pr-6">
                                    <button title="Видалити"
                                            @click="removeStatus(key)"
                                            class="appearance-none cursor-pointer text-70 hover:text-primary mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                             aria-labelledby="delete" role="presentation" class="fill-current">
                                            <path fill-rule="nonzero"
                                                  d="M6 4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6H1a1 1 0 1 1 0-2h5zM4 6v12h12V6H4zm8-2V2H8v2h4zM8 8a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0V9a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0V9a1 1 0 0 1 1-1z"></path>
                                        </svg>
                                    </button>
                                    <div class="v-portal" style="display: none;"></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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

            getEntrance() {
                let entrances = [];
                let n = 0;
                console.log(this.responsibleHouse.entrances_number);
                while (n < this.responsibleHouse.entrances_number) {
                    n++;
                    entrances.push(n);
                }
                this.entrance = entrances;
            },

            addStatus() {
                let status = {};

                if (this.citizenStatus.type === null) {
                    status = {
                        id: this.chosenStatuses.length + 1,
                        params: {
                            type: this.citizenStatus.type,
                            statusTitle: this.citizenStatus.title,
                            subStatus: this.citizenSubStatus.title
                        },
                        values: {
                            citizen_status_id: this.citizenStatus.id,
                            citizen_sub_status_id: this.citizenSubStatus.id
                        }

                    }
                } else if(this.citizenStatus.type === 'parent_committee') {
                    status = {
                        id: this.chosenStatuses.length + 1,
                        params: {
                            type: this.citizenStatus.type,
                            statusTitle: this.citizenStatus.title,
                            regionalEstablishmentType: this.regionalEstablishmentType.title,
                            regionalEstablishment: this.regionalEstablishment.title
                        },
                        values: {
                            citizen_status_id: this.citizenStatus.id,
                            regional_establishment_type_id: this.regionalEstablishmentType.id,
                            regional_establishment_id: this.regionalEstablishment.id,
                        }

                    }
                } else if(this.citizenStatus.type === 'responsible') {
                    status = {
                        id: this.chosenStatuses.length + 1,
                        params: {
                            type: this.citizenStatus.type,
                            statusTitle: this.citizenStatus.title,
                            responsibleStreet: this.responsibleStreet.title,
                            responsibleHouse: this.responsibleHouse.title,
                            responsibleEntrance: this.responsibleEntrance
                        },
                        values: {
                            citizen_status_id: this.citizenStatus.id,
                            street_id: this.responsibleStreet.id,
                            house_id: this.responsibleHouse.id,
                            entrance: this.responsibleEntrance,
                        }

                    }
                }
                this.chosenStatuses.push(status);
                this.citizenStatus = '';
                this.$emit('assignStatusesChild', this.chosenStatuses);
            },

            removeStatus(key) {
                this.chosenStatuses.splice(key,1)
                this.$emit('assignStatusesChild', this.chosenStatuses);
            }
        },
        mounted() {
            this.getInfo();
        },
    }
</script>