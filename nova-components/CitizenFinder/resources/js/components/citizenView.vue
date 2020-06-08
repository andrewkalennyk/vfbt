<template>
    <div id="citizenView">
        <div class="mt-6  rounded overflow-hidden shadow-lg" v-if="citizen">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-4">{{ citizen.last_name }} {{ citizen.first_name }} {{ citizen.patronymic_name }}</div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Дата Народження</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ citizen.birthDay }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Телефон</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ citizen.phone }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Телефон (дод.)</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ citizen.add_phone }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12"># посв</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.certificate_number }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Список</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.type_list }}</div>
                </div>
                <div class="flex -mb-3" v-if="this.citizen.type_list && this.citizen.list_reason">
                    <div class="w-1/3 bg-grey-light h-12">Повідомлення</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.list_reason }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Комментар</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.comment }}</div>
                </div>

                <div class="font-bold text-xl mb-4">Категорії </div>

                <div class="flex -mb-3" v-if="citizen.search_categories.length" v-for="category in citizen.search_categories">
                    <div class="w-1/3 bg-grey-light h-12"></div>
                    <div class="w-1/3 bg-grey h-12"></div>
                    <div class="w-1/3 bg-grey-light h-12">{{ category }}</div>
                </div>

                <div class="font-bold text-xl mb-4">Статуси </div>

                <div class="flex -mb-3" v-if="citizen.statuses.length" v-for="status in citizen.statuses">
                    <div class="w-1/3 bg-grey-light h-12"></div>
                    <div class="w-1/3 bg-grey h-12"></div>
                    <div class="w-1/3 bg-grey-light h-12">{{ status }}</div>
                </div>

                <div class="font-bold text-xl mb-4">Адресса </div>

                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Громадська приймальня</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ citizen.office }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Дільниця</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ citizen.elective_plot }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Bулиця</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ citizen.street }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-1/3 bg-grey-light h-12">Дім</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ citizen.house }}</div>
                </div>
                <div class="flex -mb-3" v-if="this.citizen.flat">
                    <div class="w-1/3 bg-grey-light h-12">Квартира</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.flat }}</div>
                </div>
                <div class="flex -mb-3" v-if="this.citizen.entrance">
                    <div class="w-1/3 bg-grey-light h-12">Під'їзд</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.entrance }}</div>
                </div>
                <div class="flex -mb-3" v-if="this.citizen.floor">
                    <div class="w-1/3 bg-grey-light h-12">Поверх</div>
                    <div class="w-1/3 bg-grey h-12"> — </div>
                    <div class="w-1/3 bg-grey-light h-12">{{ this.citizen.floor }}</div>
                </div>
                <div class="flex -mb-3">
                    <div class="w-2/3 bg-grey-light h-12"></div>
                    <div class="w-1/3 bg-grey-light h-12 py-6">
                        <a class="flex-no-shrink bg-blue hover:bg-blue-dark text-white text-sm font-bold py-2 px-4 rounded ml-4 cursor-pointer"
                           @click="showAttachPromotion"
                           v-if="this.userRole ==='worker'"
                        >
                        Прив'язати Акцію
                    </a></div>
                </div>

                <div class="font-bold text-xl mb-4">Акції</div>

                <div class="flex -mb-3" v-if="citizen.promotions" v-for="citizenPromotion in citizen.promotions">
                    <div class="w-2/3 bg-grey-light h-12">{{citizenPromotion.title}}</div>
                    <div class="w-1/3 bg-grey-light h-12"></div>
                </div>
            </div>
        </div>
        <div class="relative rounded overflow-hidden mb-8 shadow-lg mt-6" v-if="this.showAttachPromotionForm">
            <div class=" border-grey-light p-4 flex justify-center p-8">
                <form class="w-full justify-center" id="attach_promotion_form" @submit.prevent="attachPromotion">
                    <div class="flex flex-wrap -mx-3 mb-4" >
                        <div class="w-1/3 md:w-1/3 px-3">
                            <label for="grid-promotion" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                                Виберіть Акцію
                            </label>
                            <div class="relative">
                                <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                        @change="changeElectivePlot"
                                        id="grid-promotion"
                                        v-model="promotionId"
                                        name="promotion_id"
                                >
                                    <option value="">Виберіть акцію</option>
                                    <option v-for="promotion in this.promotions" :value="promotion.id">{{promotion.title}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-1/3 md:w-1/3 px-3">
                            <div class="flex flex-wrap -mx-3 mt-6">
                                <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded ml-4"
                                        type="submit">
                                    Зберегти
                                </button>

                                <a class="flex-shrink-0 border-transparent border-4 text-info hover\:bg-info-dark text-sm py-1 px-2 rounded cursor-pointer"
                                   @click="hideAttachPromotion"
                                >
                                    Відмінити
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'citizenView',
        props: [ 'citizen', 'userRole'],
        data() {
            return {
                showAttachPromotionForm: false,
                promotionId: '',
                promotions: [],
            }
        },
        mounted() {
            this.getPromotions();
        },
        methods: {
            showAttachPromotion()
            {
                this.showAttachPromotionForm = true;
            },
            hideAttachPromotion()
            {
                this.showAttachPromotionForm = false;
            },
            getPromotions()
            {
                Nova.request()
                    .post('/get-promotions')
                    .then(({data}) => {
                        this.promotions = data.promotions;
                    })
            },
            attachPromotion() {

                let myForm = document.getElementById('attach_promotion_form'),
                    data = new FormData(myForm);
                    data.append('citizen_id', JSON.stringify(this.citizen.id));

                Nova.request()
                    .post(
                        '/attach-promotion-citizen',
                        data
                    )
                    .then(({data}) => {
                        if (data.status) {
                            this.$toasted.success(data.message);
                            this.citizen = data.citizen;
                        } else {
                            this.$toasted.error(data.message);
                        }

                    })
            },

        }
    }
</script>