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
                <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded ml-4"
                        :disabled="working"
                        type="submit">
                    Новий
                </button>
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

        <div class="relative rounded overflow-hidden mb-8 shadow-lg mt-6">
            <div class=" border-grey-light p-4 flex justify-center p-8">
                <form class="w-full justify-center">
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                            <label for="grid-first-name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Прізвище
                            </label>
                            <input id="grid-first-name" type="text" placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        </div>
                        <div class="md:w-1/3 px-3">
                            <label for="grid-last-name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Ім'я
                            </label>
                            <input id="grid-last-name" type="text" placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        </div>
                        <div class="md:w-1/3 px-3">
                            <label for="grid-patronymic-name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                По-Батькові
                            </label>
                            <input id="grid-patronymic-name" type="text" placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker border-grey-lighter rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">

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

    },
    data() {
        return {
            fullData:{},
            working:false,
            findCitizens: [],
            citizen: false,
            noCitizens: false
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
                    console.log(data.citizens.length);
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
        }
    },
}
</script>

<style>
/* Scoped Styles */
</style>
